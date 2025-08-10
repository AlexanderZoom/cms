<?php defined('SYSPATH') or die('No direct script access.');
abstract class Util_Crawler_DbLink {
    
    /**
     *
     * @var Util_Crawler_Log
     */
    protected $loger;
    
    protected $project;
    
    public function __construct(Util_Crawler_Log $loger, $project){
        $this->loger = $loger;
        $this->project = $project;
    }
    
    abstract public function getLinks($limit);
    
    abstract public function removeLinks();
    
    abstract public function saveLink(Util_Crawler_Link $link);
    
    abstract protected function insertLink(Util_Crawler_Link $link);
    
    abstract protected function updateLink(Util_Crawler_Link $link);
    
    abstract public function getLink($url);
}