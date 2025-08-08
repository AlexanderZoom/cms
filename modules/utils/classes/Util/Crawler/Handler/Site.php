<?php defined('SYSPATH') or die('No direct script access.');
//tail -n 10000 -f crawler.log | grep -E -i 'Get content|Link count|Parse data|WARNING|ERROR'
class Util_Crawler_Handler_Site extends Util_Crawler_Handler {

    public $siteUrl = '';
    public $allowDomains = array();
    public $retryWait = 10;
    public $retryMax  = 3;
    public $redirectMax = 5;
    
    protected $redirectCacheUrls = array();
    protected $retryCacheUrls = array();
    
    protected $folderNameContent = 'content';
    protected $pathContent;
    
    protected $fileNameUrls = 'handler_urls.txt';
    protected $fileUrls;
    
    protected $urls;
    
    /**
     * @var Util_Crawler_Link
     */
    protected $firstLink;
    
    public function process(Util_Crawler_Link $link, $data){
        $startMemory3 = $startMemory2 = memory_get_usage();
        $links = array();
        //$this->loger->info('Util_Crawler_Handler_Test ' . print_r($data, true));
        //$this->logInfo($this->getContentType($data));
        
        $link->url = $this->createFullUrl($link->url, $link->url);
        
        if ($data['error']){
            
            $dataTmp = $data;
            $dataTmp['data'] = 'DELETE DATA FOR LOG';
            $this->logWarn("DATA WITH ERROR. Url: " . $link->url . ' ' . print_r($dataTmp, true));
            if ($data['http_code'] != 200){
                if (in_array($data['http_code'], array(301, 302, 303, 307))){
                    if (isset($this->redirectCacheUrls[$link->url]) && $this->redirectCacheUrls[$link->url] >= $this->redirectMax){
                        $this->logWarn("Redirect for status {$data['http_code']} greater redirect max. Url " . $link->url);
                    }
                    else{
                        if (empty($data['header']['list']['location'])){
                            $this->logWarn("Location redirect for status {$data['http_code']} is empty Url " . $link->url);
                        }
                        else {
                            $redirectUrl  = $this->createFullUrl($data['header']['list']['location'], $link->url);
                            if (!$this->isValidUrl($redirectUrl)){
                                $this->logWarn("Unallowed url {$redirectUrl} for redirect. Url: {$link->url}");
                            }
                            else {
                                if (empty($this->redirectCacheUrls[$link->url])) $this->redirectCacheUrls[$link->url] = 0;
                                else $this->redirectCacheUrls[$link->url] ++;
                                                                
                                $newLink = new Util_Crawler_Link();
                                $newLink->setUrl($redirectUrl);
                                $newLink->setRef($link->url);
                                
                                $action = new Util_Crawler_Action();
                                $action->setLink($newLink);
                                $action->setStatus(Util_Crawler_Action::STATUS_LOAD);
                                
                                $this->logInfo('Redirect to ' . $redirectUrl);
                                return $action;
                            }
                        }
                    }
                }
                elseif ($data['http_code'] == 503){
                    if (isset($this->retryCacheUrls[$link->url]) && $this->retryCacheUrls[$link->url] >= $this->retryMax){
                        $this->logWarn("Retry for status {$data['http_code']} greater retry max. Url " . $link->url);
                    }
                    else {
                        $this->logInfo("Sleep {$this->retryWait} sec and retry url {$link->url}");
                        Minion_CLI::wait($this->retryWait);
                        if (empty($this->retryCacheUrls[$link->url])) $this->retryCacheUrls[$link->url] = 0;
                        else $this->retryCacheUrls[$link->url] ++;
                        
                        $action = new Util_Crawler_Action();
                        $action->setStatus(Util_Crawler_Action::STATUS_RETRY);
                        return $action;
                    }
                    
                }
                
                
                $this->logWarn("INCORRECT STATUS CODE {$data['http_code']} SKIP PROCESS. Url: " . $link->url);
                return $links;
                
            }
   
        }
        
        if (!strlen($data['data'])){
            $this->logWarn("DATA IS EMPTY. Skip. Url: " . $link->url);
            $this->logWarn("DATA IS EMPTY. Skip. Data INFO: " . print_r($data, true));
            return $links;
        }
        
        if (!empty($this->urls[$link->url]['file'])){
            $this->logWarn("File was download. Skip. Url: " . $link->url);
            return $links;
        }
        
        if (!$this->isValidUrl($link->url)){
            $this->logWarn("Invalid link url {$link->url}");
            return $links;
        }
        
        $fileMime      = $this->getContentType($data);
        $fileExtension = $fileMime ? Util_Crawler_Tool::getExtensionByMime($fileMime) : '';
        
        $filePath = '';
        if (!empty($this->urls[$link->url]['pre_file'])) $filePath = $this->urls[$link->url]['pre_file'];
        else {
            $filePath = $this->getFilePathByUrl($link->url, $fileExtension);
            if (!$filePath){
                $this->logWarn("Invalid link url {$link->url}");
                return $links;
            }
            else ;
        }
        
        if (in_array($this->getContentType($data), array('text/html'))){
            $this->logInfo ('MEMORY PROCESS IN TXT ' . (memory_get_usage() - $startMemory2) . ' ' . (memory_get_usage()-$startMemory3));
            $startMemory2 = memory_get_usage();
            
            $locationUrls = array(
                array('a', 'href'),
                array('img', 'src'),
                array('link', 'href'),
                array('script', 'src'),
                array('iframe', 'src'),
                array('frame', 'src'),
                array('from', 'action'),
                array('base', 'href'),
            );
            $this->logInfo("Parse data from url {$link->url}");
            $doc = Util_PhpQuery::newDocument($data['data']);
            $this->logInfo ('MEMORY PROCESS INIT DOC' . (memory_get_usage() - $startMemory2) . ' ' . (memory_get_usage()-$startMemory3));
            $startMemory2 = memory_get_usage();
            
            $htmls = $doc->find('html');
            foreach ($htmls as $html){
                $html = pq($html);
                $html->attr('html_src', $link->url);
            }
            
            foreach ($locationUrls as $locationUrl){
                $tag  = $locationUrl[0];
                $attr = $locationUrl[1];
                $elements = $doc->find($tag);
                foreach ($elements as $element){
                    $element = pq($element);
                    $value = (string) $element->attr($attr);
                    $valueSrc = $value;
                    
                    if ($tag == 'a'){
                        $valueConfirm = 'if (confirm(\'A you sure want open link ' . $valueSrc . ' ?\')){ window.open(\''. $valueSrc .'\'); return false;}';
                        $element->attr('onclick', $valueConfirm);
                        $element->attr($attr, '#');
                    }
                    
                    if (!$value) continue;
                    
                    $element->attr($attr.'_src', $value);
                    
                    if ($tag == 'base'){
                        $element->removeAttr($attr);
                        continue;
                    }
                    
                    if (strpos($value, '@') !== FALSE){
                        $this->logInfo("Unallowed url {$value} from {$link->url}");
                        continue;
                    }
                    
                    $value = $this->createFullUrl($value, $link->url);
                    if (!$value) continue;
                    
                    if (!$this->isValidUrl($value)){
                        $this->logInfo("Unallowed url {$value} from {$link->url}");
                        continue;
                    }
                    
                    $file = '';
                    if (isset($this->urls[$value])){
                        if (isset($this->urls[$value]['file'])) $file = $this->urls[$value]['file'];
                        elseif (isset($this->urls[$value]['pre_file'])) $file = $this->urls[$value]['pre_file'];
                        else $this->logWarn("URLS file or pre_file not found for url: {$value}");
                    }
                    
                    if (!$file){
                        
                        $tmpUrl = $this->createFullUrl($link->url, $link->url);
                        $file = $this->getFilePathByUrl($value, ($value == $tmpUrl ? $fileExtension : '') );
                                                
                        if (!$file){
                            $this->logWarn("Invalid link url {$value}");
                        }
                    }
                    
                    if ($file){

                        if (isset($this->urls[$value])) $this->urls[$value]['pre_file'] = $file;
                        else $this->urls[$value] = array('pre_file' => $file);
                        $this->saveUrls();
                        
                        $contentPath = $this->getContentPath($file, $filePath);
                        $valueSrc = parse_url($valueSrc);
                        if (!empty($valueSrc['fragment'])){
                            $contentPath .= '#' . $valueSrc['fragment'];
                        }
                        $element->attr($attr, $contentPath);
                        if ( ((string) $element->attr('onclick')) ) $element->removeAttr('onclick');
                    }
                    
                    $element->attr($attr.'_dst', $value);
                    
                    $newLink = new Util_Crawler_Link();
                    $newLink->url = $value;
                    $newLink->ref = $link->url;
                    $links[] = $newLink;
                    unset($element);
                }
            }
            $this->logInfo ('MEMORY PROCESS FOREACH DOC' . (memory_get_usage() - $startMemory2) . ' ' . (memory_get_usage()-$startMemory3));
            $startMemory2 = memory_get_usage();
            
            $fileData = phpQuery::getDocument($doc->getDocumentID());
            $this->saveFile($filePath, $fileData);
            
            $this->logInfo ('MEMORY PROCESS SAVE DOC' . (memory_get_usage() - $startMemory2) . ' ' . (memory_get_usage()-$startMemory3));
            $startMemory2 = memory_get_usage();
            Util_PhpQuery::unloadDocuments();
            unset($doc); unset($fileData);
            
            $this->logInfo ('MEMORY PROCESS UNSET DOC' . (memory_get_usage() - $startMemory2) . ' ' . (memory_get_usage()-$startMemory3));
            $startMemory2 = memory_get_usage();
            
            $this->logInfo('Link count: ' . count($links) . ' from url ' . $link->url);
            
            if (isset($this->urls[$link->url])) $this->urls[$link->url]['file'] = $filePath;
            else $this->urls[$link->url] = array('file' => $filePath);
            
            $this->logInfo ('MEMORY PROCESS SAVE URL' . (memory_get_usage() - $startMemory2) . ' ' . (memory_get_usage()-$startMemory3));
            $startMemory2 = memory_get_usage();

             $this->logInfo('Wait 3 secs');
             Minion_CLI::wait(3);
            
        }
        else{
            $this->saveFile($filePath, $data['data']);
            if (isset($this->urls[$link->url])) $this->urls[$link->url]['file'] = $filePath;
            else $this->urls[$link->url] = array('file' => $filePath);
            
             $this->logInfo('Wait 1 sec');
             Minion_CLI::wait(1);
        }
        
        $this->saveUrls();
        
        //$links = array();
        //throw new Util_Crawler_ExceptionHandler('s ');
        return $links;
    }
    
    
    protected function getContentPath($relativePath, $relativePathDoc){
        $relativePath = explode(DIRECTORY_SEPARATOR, $relativePath);
        $relativePathDoc = explode(DIRECTORY_SEPARATOR, $relativePathDoc);
        if ($relativePath[0] == '') array_shift($relativePath);
        if ($relativePathDoc[0] == '') array_shift($relativePathDoc);
    
    
        $fileName = array_splice($relativePath, count($relativePath)-1);
        $fileNameDoc = array_splice($relativePathDoc, count($relativePathDoc)-1);
    
        $cfile = count($relativePath);
        $cfiledoc = count($relativePathDoc);
    
    
        if ($cfiledoc == 0){
            $relativePath[] = $fileName[0];
            return implode('/', $relativePath);
        }
    
        $eqName = 0;
        foreach ($relativePathDoc as $idx => $p){
            if (!isset($relativePath[$idx])) break;
    
            if ($p == $relativePath[$idx]) $eqName ++;
            else break;
        }
    
        if ($eqName == $cfiledoc && $cfile == $cfiledoc){
            ;
        }
        elseif ($eqName == $cfiledoc && $cfile > $cfiledoc){
            array_splice($relativePath, 0, $cfiledoc);
    
        }
        elseif ($eqName < $cfiledoc){
            array_splice($relativePath, 0, $eqName);
            for ($i =0; $i < ($cfiledoc - $eqName); $i++){
                array_unshift($relativePath, '..');
            }
        }
    
        $relativePath[] = $fileName[0];
        return implode('/', $relativePath);
    }
    
    protected function getFilePathByUrl($url, $extension=''){
        
        $pathOut = '';
        
        if ($extension) $extension = '.' . $this->renameExtension($extension);
        
        $url = trim($url);
        $urlSource = trim($this->firstLink->url);
        
        if (substr($url, 0, 2) == '//') $url = 'http:' . $url;
        
        $urlBkp = $url;
        $urlSourceBkp = $urlSource;
        
        $defaultList = array(
        'scheme' => '',
        'host'   => '',
        'port' => '',
        'user' => '',
        'pass' => '',
        'path' => '/',
        'query' => '',
        'fragment' => '',
        );
        
        $urlSource = array_merge($defaultList, parse_url($urlSource));
        $url = array_merge($defaultList, parse_url($url));

        $port = $url['port'] ? '.' . $url['port'] : '';
        $portSource = $urlSource['port'] ? '.' . $urlSource['port'] : '';
        $hostFolder = strtolower("{$url['scheme']}.{$url['host']}{$port}");
        $hostSourceFolder = strtolower("{$urlSource['scheme']}.{$urlSource['host']}{$portSource}");
        
        if ($hostFolder != $hostSourceFolder) $pathOut = $hostFolder;
        
        
        $path = explode('/', $url['path']);
        if ($path[count($path)-1] == ''){
            if ($url['query']) $path[count($path)-1] = Util_Crawler_Tool::getUUID() . $extension;
            else $path[count($path)-1] = 'index' . $extension;
        }
        else {
            if ($url['query']){
                if (!$extension){
                    if (preg_match('/\.([^.]+)$/i', $path[count($path)-1], $matches)){
                        $extension = '.' . $this->renameExtension($matches[1]);
                    }
                }
                
                $path[count($path)-1] = Util_Crawler_Tool::getUUID() . $extension;
            }
            else{
                if (preg_match('/(.*?)\.([^.]+)$/i', $path[count($path)-1], $matches)){
                    $extension = '.' . $this->renameExtension($matches[2]);
                    $path[count($path)-1] = $matches[1] . $extension;
                }
            }
        }
        
        if (!preg_match('/\.([^.]+)$/i', $path[count($path)-1], $matches)){
            $extension = '.' . $this->renameExtension('html');
            $path[count($path)-1] .= $extension;
        }
        
        if ($path[0] == '') array_shift($path);
        $path = implode('/', $path);
        
        $path = Util_Crawler_Tool::realisticPath($path);
        
        if ($pathOut) $pathOut .= DIRECTORY_SEPARATOR . $path;
        else  $pathOut = $path;
        
        return $pathOut;
    }
    
    protected function createFullUrl($url, $urlSource){
        $url = trim($url);
        $urlSource = trim($urlSource);
        
        if (substr($url, 0, 2) == '//') $url = 'http:' . $url;
        
        $urlBkp = $url;
        $urlSourceBkp = $urlSource;
        
        $defaultList = array(
        'scheme' => '',
        'host'   => '',
        'port' => '',
        'user' => '',
        'pass' => '',
        'path' => '/',
        'query' => '',
        'fragment' => '',
        );
        
        $urlSource = array_merge($defaultList, parse_url($urlSource));
        $url = array_merge($defaultList, parse_url($url));
        
        
        if (preg_match('/^(http|https|ftp|ftps):\/\//i', $urlBkp)){
            return Util_Crawler_Tool::buildUrl($url);
        }
                
        $url['scheme'] = $urlSource['scheme'];
        $url['host'] = $urlSource['host'];
        $url['port'] = $urlSource['port'];
        $url['user'] = $urlSource['user'];
        $url['pass'] = $urlSource['pass'];
        
        
        if (!$url['path'] || substr($url['path'], 0, 1) != '/'){
            $path = dirname($urlSource['path']);
            $url['path'] = $path . '/' .  $url['path'];
            $url['path'] = Util_Crawler_Tool::realisticPath($url['path']);
            
        }
        
        if (!empty($url['fragment'])) unset($url['fragment']);
        
        $outUrl = Util_Crawler_Tool::buildUrl($url);
        $this->logInfo('Relative url was: ' . $urlBkp . ' be: ' . $outUrl . ' source: ' . $urlSourceBkp);
        return $outUrl;
        
    }
    
    protected function isValidUrl($url){
        $url = parse_url($url);
        $urlSource = parse_url($this->firstLink->url);
        
        $host = explode('.', Arr::get($url, 'host'));
        if ($host[0] == 'www' && count($host) > 2) array_shift($host);
        
        $hostSource = explode('.', Arr::get($urlSource, 'host'));
        if ($hostSource[0] == 'www' && count($hostSource) > 2) array_shift($hostSource);
        
        
        $domain = count($host) > 1 ? $host[count($host)-2] . '.' . $host[count($host)-1] : $host[0];
        $domainSource = count($hostSource) > 1 ? $hostSource[count($hostSource)-2] . '.' . $hostSource[count($hostSource)-1]: $hostSource[0];
        
        if (!in_array($domain, array_merge(array($domainSource), $this->allowDomains))) return false;
        
        if (strnatcasecmp(Arr::get($url, 'scheme'), Arr::get($urlSource, 'scheme')) != 0 ) return false;
        if (strnatcasecmp(Arr::get($url, 'port'), Arr::get($urlSource, 'port')) != 0 ) return false;
        if (strnatcasecmp(Arr::get($url, 'user'), Arr::get($urlSource, 'user')) != 0 ) return false;
        if (strnatcasecmp(Arr::get($url, 'pass'), Arr::get($urlSource, 'pass')) != 0 ) return false;
        
        return true;
    }
    
    protected function getContentType($data){
        $ct = !empty($data['curl_info']['content_type']) ? $data['curl_info']['content_type'] : '';
        if ($ct){
            $ct = explode(';', $ct);
            return trim($ct[0]);
        }
    }
    
    protected function saveFile($relativePath, $data){
        if (!strlen($data)){
            $this->logInfo('Size data == 0 SKIP SAVE FILE ' . $relativePath);
            return false;
        }
        
        if ($relativePath[0] != DIRECTORY_SEPARATOR) $relativePath = DIRECTORY_SEPARATOR . $relativePath;;
        $fullPath = $this->pathContent . $relativePath;
        if (!file_exists($fullPath)){
            if (!file_exists(dirname($fullPath))){
                if (!mkdir(dirname($fullPath), 0777, true)) throw new Util_Crawler_ExceptionHandler('Can not create folder ' . dirname($fullPath));
            }
            
            if (!touch($fullPath)) throw new Util_Crawler_ExceptionHandler('Can not create file ' . $fullPath);
        }
        
        if (!file_put_contents($fullPath, $data)) throw new Util_Crawler_ExceptionHandler('Can not save data. File ' . $fullPath);
        
        return true;
    }
    
    protected function loadFile($relativePath){
        if ($relativePath[0] != DIRECTORY_SEPARATOR) $relativePath = DIRECTORY_SEPARATOR . $relativePath;;
        $fullPath = $this->pathContent . $relativePath;
        
        return file_get_contents($fullPath);
    }
    
    
    //////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getFirstLink(){
       
        return $this->firstLink;
    }
    
    public function setup(){
        
        if (!$this->siteUrl) throw new Util_Crawler_ExceptionHandler('Site url not defined');

        $this->firstLink = new Util_Crawler_Link ();
        $this->firstLink->url = $this->siteUrl;
        $this->firstLink->ref = '';
        
        $this->pathContent = $this->config->getFolderProject() . DIRECTORY_SEPARATOR . $this->folderNameContent;
        $this->fileUrls = $this->config->getFolderProject() . DIRECTORY_SEPARATOR . $this->fileNameUrls;
        
        
        if (!file_exists($this->pathContent)){
            if (!mkdir($this->pathContent, 0777, true)) throw new Util_Crawler_ExceptionHandler('Folder for content not created ' . $this->pathContent);
        }
        
        if (!is_readable($this->pathContent)) throw new Util_Crawler_ExceptionHandler('Folder content not readable ' . $this->pathContent);
        if (!is_writable($this->pathContent)) throw new Util_Crawler_ExceptionHandler('Folder content not writable ' . $this->pathContent);
        
        $this->urls = array();
        if (file_exists($this->fileUrls)){
            $content = file_get_contents($this->fileUrls);
            if (strlen($content)){
                $content = unserialize($content);
                if (is_array($content)) $this->urls = $content;
            }
        }
        
        register_shutdown_function(array($this, 'saveUrls'));
    }
    
    public function clear(){
        $this->urls = null;
        if (file_exists($this->fileUrls)) unlink($this->fileUrls);
    }
    
    public function saveUrls(){
        if(is_array($this->urls) && count($this->urls) && $this->fileUrls){
            if (!file_exists($this->fileUrls)) touch($this->fileUrls);
            $content = serialize($this->urls);
            file_put_contents($this->fileUrls, $content);
        }
    }
    
    protected function renameExtension($ext){
        if (!$ext) return $ext;
        if (preg_match('/php/i', $ext) || $ext == 'phtml') $ext = 'htm';

        return $ext;
    }
    
}