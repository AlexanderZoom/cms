<?php defined('SYSPATH') or die('No direct script access.');
class Task_Cron_Crawler extends Task_Cron {
    
    protected $_options = array(
    // param name => default value
        'verbose'=> 0,
        'site' => '',
        'project' => '',
        'resume'  => 1,
        'cleandb' => 0,
        'cleancache' => 0,
    );
    
    protected $_fileLog = 'crawler.log';
    protected $_filePid = 'crawler.pid';
    protected $_dirNamePidTime = 'crawler';
    
    protected $_pidTimeOut = 0;
    
    protected function _process(array $params){
    	exit('plz check codes before runing');
        $dirCrawler = Kohana::$config->load('main.dir_crawler');
        $proxy = Kohana::$config->load('main.dir_data') . '/proxy/lst.txt';
        
        $project = Arr::get($params, 'project');
        $handlerLog = '';
        if ($this->_loger) $handlerLog = array($this, 'writeLog');
        $cLoger = new Util_Crawler_Log($handlerLog);
        
        $cHandler = new Util_Crawler_Handler_Site($cLoger);
        $cHandler->siteUrl = Arr::get($params, 'site');
        
        $cLinkDb  = new Util_Crawler_DbLink_Sqlite($cLoger, $project);
        
        $cConfig = new Util_Crawler_Config();
        $cConfig->readFromCacheOn()
        ->setUserAgent(Util_UserAgent::getUserAgent())
        ->setProject($project)
        ->setFolder($dirCrawler)
        ->setLoger($cLoger)
        ->resumeOn()
        ->saveToCacheON()
        ->readFromCacheOn()
        ->executeOnceOff()
        ->setLinkDb($cLinkDb)
        ->setCrawlerHandler($cHandler);
        
        if (file_exists($proxy)) $cConfig->setProxyFile($proxy);
        
        if (Arr::get($params, 'resume')) $cConfig->resumeOn();
        else $cConfig->resumeOff();
        
        if (Arr::get($params, 'cleandb')) $cConfig->cleanDbLinkOn();
        else $cConfig->cleanDbLinkOff();
        
        if (Arr::get($params, 'cleancache')) $cConfig->cleanCacheOn();
        else $cConfig->cleanCacheOff();
        
        $crawler = new Util_Crawler($cConfig);
        $crawler->run();
    }
    
    public function build_validation(Validation $validation)
    {
        return parent::build_validation($validation)
        ->rule('project', 'not_empty')
        ->rule('site', 'not_empty');
    }
}