<?php defined('SYSPATH') or die('No direct script access.');
class Util_Crawler_Config {
    
    protected $project;
    
    protected $folder;
    
    protected $folderProject;
    
    protected $folderProjectCache;
    
    protected $proxyFile;
    
    /**
     * @var Util_Crawler_ProxyList
     */
    protected $proxyList;
    
    protected $saveToCache = false;
    
    protected $readFromCache = false;
    
    /**
     * @var Util_Crawler_DbLink
     */
    protected $linkDataBase;
    
    protected $logHandler;
    
    /**
     *
     * @var Util_Crawler_Cache
     */
    protected $cacheHandler;
    
    /**
     * @var Util_Crawler_Log
     */
    protected $loger;
    
    protected $userAgent;
    
    protected $resume = false;
    
    protected $executeOnce = false;
    
    protected $cleanDbLink = false;
    
    protected $cleanCache = false;
    
    /**
     * @var Util_Crawler_Handler
     */
    protected $crawlerHandler;
    
    protected $curlConnectionTimeout = 30; //The number of seconds to wait while trying to connect. Use 0 to wait indefinitely.
    protected $curlTimeout = 40; //The maximum number of seconds to allow cURL functions to execute.
    
    protected $memoryLimit = 104857600; //bytes , 0 - unlim

    public function __construct(){
        
    }
    
    public function init(){
        if (!$this->project) throw new Util_Crawler_Exception('Project must be defined');
        
        if (!$this->folder) throw new Util_Crawler_Exception('Folder must be defined');
        $this->_checkFolder($this->folder);
        
        $this->folderProject = $this->folder . DIRECTORY_SEPARATOR . $this->project;
        $this->_checkFolder($this->folderProject);
        
        $this->folderProjectCache = $this->folderProject . DIRECTORY_SEPARATOR . 'cache';
        $this->_checkFolder($this->folderProjectCache);
        $this->cacheHandler = new Util_Crawler_Cache($this->folderProjectCache);
        
        
        if ($this->proxyFile){
            if (!file_exists($this->proxyFile)) throw new Util_Crawler_Exception('Proxy file not exist ' . $this->proxyFile);
            if (!is_readable($this->proxyFile)) throw new Util_Crawler_Exception('Proxy file not readable ' . $this->proxyFile);
            
            $this->proxyList = new Util_Crawler_ProxyList($this->proxyFile);
            
        }
        
        if (!$this->linkDataBase) throw new Util_Crawler_Exception('Link DB not defined');
        
        if (!$this->crawlerHandler) throw new Util_Crawler_Exception('Crawler handler not defined');
            
    }
    
    public function cleanDbLinkOn(){
        $this->cleanDbLink = true;
        
        return $this;
    }
    
    public function cleanDbLinkOff(){
        $this->cleanDbLink = false;
    
        return $this;
    }
        
    public function isCleanDbLink(){
        return $this->cleanDbLink;
    }
    
    public function cleanCacheOn(){
        $this->cleanCache = true;
    
        return $this;
    }
    
    public function cleanCacheOff(){
        $this->cleanCache = false;
    
        return $this;
    }
    
    public function isCleanCache(){
        return $this->cleanCache;
    }
    
    public function executeOnceOn(){
        $this->executeOnce = true;
        
        return $this;
    }
        
    public function executeOnceOff(){
        $this->executeOnce = false;
        
        return $this;
    }
    
    public function isExecuteOnce(){
        return $this->executeOnce;
    }
    
    public function setCurlConnectionTimeout($sec){
        $this->curlConnectionTimeout = $sec;
        
        return $this;
    }
    
    public function getCurlConnectionTimeout(){
        return $this->curlConnectionTimeout;
    }
    
    public function setCurlTimeout($sec){
        $this->curlTimeout = $sec;
        
        return $this;
    }
    
    public function getCurlTimeout(){
        return $this->curlTimeout;
    }
    
    public function getCache(){
        return $this->cacheHandler;
    }
    
    public function setLinkDb(Util_Crawler_DbLink $linkdb){
        $this->linkDataBase = $linkdb;
        
        return $this;
    }
    
    public function getLinkDb(){
        return $this->linkDataBase;
    }
    
    public function resumeOn(){
        $this->resume = true;
        
        return $this;
    }
    
    public function resumeOff(){
        $this->resume = false;
        
        return $this;
    }
    
    public function isResume(){
        return $this->resume;
    }
    
    public function saveToCacheOn(){
        $this->saveToCache = true;
        
        return $this;
    }
    
    public function saveToCacheOff(){
        $this->saveToCache = false;
        
        return $this;
    }
    
    public function isSaveToCache(){
        return $this->saveToCache;
    }
    
    public function readFromCacheOn(){
        $this->readFromCache = true;
        
        return $this;
    }
    
    public function readFromCacheOff(){
        $this->readFromCache = false;
        
        return $this;
    }
    
    public function isReadFromCache(){
        return $this->readFromCache;
    }
    
    public function setProject($name){
        $this->project = $name;
        
        return $this;
    }
    
    public function getProject(){
        return $this->project;
    }
    
    public function setFolder($folder){
        $this->folder = $folder;
        
        return $this;
    }
    
    public function getFolderProject(){
        return $this->folderProject;
    }
    
    public function getFolderProjectCache(){
        return $this->folderProjectCache;
    }
    
    public function setUserAgent($ua){
        $this->userAgent = $ua;
        
        return $this;
    }
    
    public function getUserAgent(){
        return $this->userAgent;
    }
    
    public function setProxyFile($file){
        $this->proxyFile = $file;
        
        return $this;
    }
    
    public function setLoger(Util_Crawler_Log $loger){
        $this->loger = $loger;
        
        return $this;
    }
    
    /**
     *
     * @return Util_Crawler_Log
     */
    public function getLoger(){
        if (!$this->loger) $this->loger = new Util_Crawler_Log();
        return $this->loger;
    }
    
    /**
     *
     * @return Util_Crawler_Proxy
     */
    public function getProxy(){
        if (!$this->proxyList) throw new Util_Crawler_Exception('Proxy not defined');
        return $this->proxyList->getProxy();
    }
    
    public function hasProxy(){
        if (!$this->proxyList) return false;
        return $this->proxyList->hasProxy();
    }
    
    public function setCrawlerHandler(Util_Crawler_Handler $handler){
        $this->crawlerHandler = $handler;
        
        return $this;
    }
    
    /**
     *
     * @return Util_Crawler_Handler
     */
    public function getCrawlerHandler(){
        return $this->crawlerHandler;
    }
    
    /**
     *
     * @return Util_Crawler_Proxy
     */
    public function nextProxy(){
        return $this->proxyList->nextProxy();
    }
    
    public function setMemoryLimit($limit){
        $this->memoryLimit = $limit;
        
        return $this;
    }
    
    public function getMemoryLimit(){
        return $this->memoryLimit;
    }
    
    
    private function _checkFolder($folder){
        if (!file_exists($folder)) {
            if (!mkdir($folder, 0777, true)) throw new Util_Crawler_Exception('Can not create folder ' . $folder);
        }
        else {
            if (!is_readable($folder)) throw new Util_Crawler_Exception('Folder not readable ' . $folder);
            if (!is_writable($folder)) throw new Util_Crawler_Exception('Folder not writable ' . $folder);
        }
    }
    
    
}

