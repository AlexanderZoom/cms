<?php defined('SYSPATH') or die('No direct script access.');
class Util_Crawler {
    
    /**
     * @var Util_Crawler_Config
     */
    protected $config;
    protected $fileCurlSession = 'curl_session.txt';
    protected $fileExecuteOnce = 'execute_once.txt';
    
    /**
     * @var Util_Crawler_Result
     */
    protected $resultHandler;
    
    public function __construct(Util_Crawler_Config $config){
        $this->config = $config;
    }
    
    public function init(){
        $this->getLoger()->info('INIT');
        $this->config->init();
        
        $this->resultHandler = new Util_Crawler_Result();
        
        if ($this->config->isExecuteOnce()){
            if (file_exists($this->config->getFolderProject() . DIRECTORY_SEPARATOR . $this->fileExecuteOnce)){
                throw new Util_Crawler_Exception('Crawler has already treated this task once');
            }
        }
        
        if (!is_writable($this->config->getFolderProject())) throw new Util_Crawler_Exception('Folder project not writable');
        
        $this->getHandler()->init($this, $this->config);
        
        $resume = $this->config->isResume() ? 'on' : 'off';
        $saveToCache = $this->config->isSaveToCache()  ? 'on' : 'off';
        $readFromCache = $this->config->isReadFromCache()  ? 'on' : 'off';
        $proxy = $this->config->hasProxy()  ? 'on' : 'off';
        $linkDb = get_class($this->config->getLinkDb());
        $handler = get_class($this->config->getCrawlerHandler());
        $memoryLimitHR = Util_Crawler_Tool::sizeHumanReadable($this->config->getMemoryLimit());
        $cleanDb = $this->config->isCleanDbLink() ? 'on' : 'off';
        $cleanCache = $this->config->isCleanCache() ? 'on' : 'off';
        
        $message = "project: {$this->config->getProject()}; resume: {$resume}; proxy: {$proxy}; " .
                   "save to cache: {$saveToCache}; read from cache: {$readFromCache}; " .
                   "clean db: {$cleanDb}; clean cache: {$cleanCache}; " .
                    "handler: {$handler}; linkdb: {$linkDb}; user agent: {$this->config->getUserAgent()}; " .
                    "project dir: {$this->config->getFolderProject()}; project cache dir: {$this->config->getFolderProjectCache()} " .
                    "curl timeout: {$this->config->getCurlTimeout()}; curl conn timeout: {$this->config->getCurlConnectionTimeout()}; " .
                    "memry limit: {$memoryLimitHR};"
                    ;
        $this->getLoger()->info($message);
        
        if (!$this->config->isResume()){
             $this->getLoger()->info('Clear handler');
             $this->getHandler()->clear();
             $this->getLoger()->info('Remove old link from db');
             $this->getLinkDb()->removeLinks();
             $this->getLoger()->info('Remove cache');
             $this->getCache()->clear();
             $this->getLoger()->info('Remove curl session file');
             $this->RemoveCurlSessionFile();
        }
        else{
            if ($this->config->isCleanDbLink()){
                $this->getLoger()->info('Remove link from db');
                $this->getLinkDb()->removeLinks();
            }
             
            if ($this->config->isCleanCache()){
                $this->getLoger()->info('Remove cache');
                $this->getCache()->clear();
            }
        }
    }
    
    /**
     *
     * @return Util_Crawler_Handler_Result
     */
    public function run(){
        $startMemory = memory_get_usage();
        
        $this->getLoger()->info('START');
        
        $this->getLoger()->info('MEMORY  used ' . (memory_get_usage() - $startMemory));
        $startMemory = memory_get_usage();
        
        $this->init();
        
        $this->getLoger()->info('MEMORY INIT used ' . (memory_get_usage() - $startMemory));
        $startMemory = memory_get_usage();
        
        $this->getLoger()->info('RUN');
        
        $limit = 10;
        $links = array();
        if ($this->config->isResume()) $links = $this->getLinkDb()->getLinks($limit);
        
        if (!count($links)){
            $links[] = $this->getHandler()->getFirstLink();
            if ($this->getLinkDb()->saveLink($links[0]) == 'dup'){
                if ( ($nl = $this->getLinkDb()->getLink($links[0]->url))){
                    $links[0] = $nl;
                }
            }
        }
        
        $this->getLoger()->info('MEMORY DO used ' . (memory_get_usage() - $startMemory));
        $startMemory = memory_get_usage();
        
        do{
            foreach ($links as $link){
                
                while(1){
                    $this->checkMemoryLimit();
                    $startMemory3 = $startMemory2 = memory_get_usage();
    
                    $data = $this->getContent($link);
    
                    $this->getLoger()->info('MEMORY GETLINK used ' . (memory_get_usage() - $startMemory2) . ' ' . (memory_get_usage()-$startMemory3));
                    $startMemory2 = memory_get_usage();
                    
                    $newLinks = $this->getHandler()->process($link, $data);
                    
                    $this->getLoger()->info('MEMORY PROCESS used ' . (memory_get_usage() - $startMemory2). ' ' . (memory_get_usage()-$startMemory3));
                    $startMemory2 = memory_get_usage();
                    
                    $link->setStatusProcessed();
                    $this->getLinkDb()->saveLink($link);
                    
                    if ($newLinks instanceOf Util_Crawler_Action){
                        $this->getLoger()->info('PROCESS RETURN ACTION with status ' . $newLinks->getStatus());
                        if (!$newLinks->getStatus()) $this->getLoger()->warn('ACTION status is empty. Skip operation.');
                        else {
                            switch ($newLinks->getStatus()){
                                case Util_Crawler_Action::STATUS_RETRY:
                                    $this->removeContentCache($link);
                                break;
                                
                                case Util_Crawler_Action::STATUS_LOAD:
                                    unset($link);
                                    $link = $newLinks->getLink();
                                break;
                            }
                            
                            $this->getLoger()->info('PROCESS ACTION TO THE RUN. Status ' . $newLinks->getStatus());
                            continue;
                        }
                    }
                    
                    $this->getLoger()->info('MEMORY SAVE DB used ' . (memory_get_usage() - $startMemory2). ' ' . (memory_get_usage()-$startMemory3));
                    $startMemory2 = memory_get_usage();
                    
                    if (is_array($newLinks) && count($newLinks)){
                        foreach ($newLinks as $newLink){
                            if ($newLink instanceOf Util_Crawler_Link) $this->getLinkDb()->saveLink($newLink);
                        }
                    }
                    
                    $this->getLoger()->info('MEMORY SAVE DB NEW LINK used ' . (memory_get_usage() - $startMemory2). ' ' . (memory_get_usage()-$startMemory3));
                    $startMemory2 = memory_get_usage();
                    
                    unset($data); unset($newLinks); unset($link);
                    break;
                }
            }
            
            unset($links);
            $links = $this->getLinkDb()->getLinks($limit);
        } while(count($links));
        $this->getLoger()->info('MEMORY AFTER DO used ' . (memory_get_usage() - $startMemory));
        
        $this->getLoger()->info('ALL LINK GET');
        
         $this->getLoger()->info('Clear handler');
         $this->getHandler()->clear();
         
         if ($this->config->isCleanDbLink()){
            $this->getLoger()->info('Remove link from db');
            $this->getLinkDb()->removeLinks();
         }
         
         if ($this->config->isCleanCache()){
            $this->getLoger()->info('Remove cache');
            $this->getCache()->clear();
         }
         
         $this->getLoger()->info('Remove curl session file');
         $this->RemoveCurlSessionFile();
        
        if ($this->config->isExecuteOnce()){
            $this->getLoger()->info('Set stop file for execute once');
            $this->setExecuteOnceFile();
        }
        
        $this->getLoger()->info('STOP');
        
        return $this->getResultHandler();
    }
    
    protected function getCache(){
        return $this->config->getCache();
    }
    
    protected function getLinkDb(){
        return $this->config->getLinkDb();
    }
    
    protected function getHandler(){
        return $this->config->getCrawlerHandler();
    }
    
    
    protected function getLoger(){
        return $this->config->getLoger();
    }
    
    
    public function getContent(Util_Crawler_Link $link, $postData = array()){
        if ( ($data = $this->getContentCache($link)) ){
            return $data;
        }
        
                
        $cw = Util_Curl_Preset::init($link->url, $link->ref,
              $this->config->getUserAgent(),
              $this->config->getFolderProject() . DIRECTORY_SEPARATOR . $this->fileCurlSession);
        $cw->setOption('CURLOPT_HEADER',1);
        $cw->setOption('CURLOPT_RETURNTRANSFER', true);
        $cw->setOption('CURLOPT_SSL_VERIFYPEER', false);
        $cw->setOption('CURLOPT_SSL_VERIFYHOST', false);
         
        $cw->setOption('CURLOPT_CONNECTTIMEOUT', $this->config->getCurlConnectionTimeout());
        $cw->setOption('CURLOPT_TIMEOUT', $this->config->getCurlTimeout());
        
        $cw->setOption('CURLOPT_AUTOREFERER', true);
        
        if(is_array($postData) && count($postData)){
            $cw->setOption('CURLOPT_POST', true)
            ->setOption('CURLOPT_POSTFIELDS', $postData);
        }
        
        $data = '';
        
        if ($this->config->hasProxy()){
            do {
                $proxy = $this->config->getProxy();
                $cw->setOption('CURLOPT_PROXY', $proxy->getHost());
                $cw->setOption('CURLOPT_PROXYTYPE', $proxy->getTypeCurl());
                
                $message ="Get content from site with proxy. Host: {$proxy->getHost()} Type: {$proxy->getType()} Url: {$link->url}";
                $this->getLoger()->info($message);
                
                $data = $cw->run();
                
                if ($data['curl_errno'] == 0) break;
                else $this->getLoger()->warn("Curl with proxy {$proxy->getHost()} {$proxy->getType()} return error: {$data['error']} url: {$link->url}");

                try {
                    $proxy = $this->config->nextProxy();
                }
                catch (Exception $e){
                    $this->getLoger()->error($e->getMessage());
                    $proxy = null;
                    $data = null;
                }
            } while ($proxy);
        }
        else {
            $message ='Get content from site. Url: '. $link->url;
            $this->getLoger()->info($message);
            
            $data = $cw->run();
        }
        
        if (!$data['error']){
            $this->addContentCache($link, $data);
        }
        
        unset($cw);
        
        return $data;
    }
    
    protected function getContentCache(Util_Crawler_Link $link){
        if ($this->config->isReadFromCache() && $link->cache){
            $data = $this->getCache()->get($link->cache);
            if ($data){
                $data = unserialize($data);
                $data['data'] = base64_decode($data['data']);
                
                $message ='Get content from cache. Url '. $link->url;
                $this->getLoger()->info($message);
                
                return $data;
            }
        }
        
        return '';
    }
    
    protected function addContentCache(Util_Crawler_Link $link, $data){
        if ($this->config->isSaveToCache() && $link->id){
            $data['data'] = base64_encode($data['data']);
            $data = serialize($data);
            
            $message ='Add content to cache. Url '. $link->url;
            $this->getLoger()->info($message);
            $link->cache = $this->getCache()->add($data, $link->cache);
            
            $message ='Save link for cache file. Url '. $link->url;
            $this->getLoger()->info($message);
            $this->getLinkDb()->saveLink($link);
            
        }
    }
    
    protected function removeContentCache(Util_Crawler_Link $link){
        if ($link->cache){
            $this->getCache()->delete($file);
            $link->cache = '';
            $this->getLoger()->info('Delete cache for url ' . $link->url);
            $this->getLinkDb()->saveLink($link);
        }
    }
    
    protected function RemoveCurlSessionFile(){
        $fileName = $this->config->getFolderProject() . DIRECTORY_SEPARATOR . $this->fileCurlSession;
        if (file_exists($fileName)){
            unlink($fileName);
        }
    }
    
    protected function setExecuteOnceFile(){
        $file = $this->config->getFolderProject() . DIRECTORY_SEPARATOR . $this->fileExecuteOnce;
        if (!file_exists($file)) touch($file);
        
        if (!file_put_contents($file, 'stop')) $this->getLoger()->error('Can not write for file execute once. File: ' . $file);
        
        return true;
    }
    
    protected function checkMemoryLimit(){
        $memoryUsage = memory_get_usage();
        $memoryLimit = $this->config->getMemoryLimit();
    
        if ($memoryUsage && $memoryLimit && $memoryUsage > $memoryLimit){
            $this->getLoger()->error('Memory excided for crawler. Used: ' . $memoryUsage . ' Limit ' . $memoryLimit);
        }
    }
    
    /**
     * @return Util_Crawler_Result
     */
    public function getResultHandler(){
        return $this->resultHandler;
    }
}
