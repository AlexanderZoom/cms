<?php defined('SYSPATH') or die('No direct script access.');
abstract class Util_Crawler_Handler {
    /**
     *
     * @var Util_Crawler_Log
     */
    protected $loger;
    
    /**
     *
     * @var Util_Crawler
     */
    protected $crawler;
    
    /**
     *
     * @var Util_Crawler_Config
     */
    protected $config;
        
    
    public function __construct(Util_Crawler_Log $loger){
        $this->loger = $loger;
    }
    
    public function init(Util_Crawler $crawler, Util_Crawler_Config $config){
        $this->crawler = $crawler;
        $this->config = $config;
        $this->setup();
    }
    
    public function logInfo($str){
        $this->config->getLoger()->info('Handler: ' . $str);
    }
    
    public function logWarn($str){
        $this->config->getLoger()->warn('Handler: ' . $str);
    }
    
    /**
     * @return Util_Crawler_Result
     */
    public function getResultHandler(){
        return $this->crawler->getResultHandler();
    }
    
    public function getContent(Util_Crawler_Link $link, $postData = array()){
        return $this->crawler->getContent($link, $postData);
    }
    
    
    abstract public function process(Util_Crawler_Link $link, $data);
    
    abstract public function getFirstLink();
    /**
     * User init
     */
    abstract public function setup();
    
    /**
     * clear after all operation or if not resume then before run
     */
    abstract public function clear();
}