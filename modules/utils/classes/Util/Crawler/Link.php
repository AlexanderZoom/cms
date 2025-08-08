<?php defined('SYSPATH') or die('No direct script access.');
class Util_Crawler_Link {
    public $id;
    public $url;
    public $ref;
    public $extra;
    public $status;
    public $cache;
    
    public function __construct(){
        $this->setStatusAdded();
    }
    
    public function setUrl($url){
        $this->url = $url;
    }
    
    public function setRef($ref){
        $this->ref = $ref;
    }
    
    public function setExtra($extra){
        $this->extra = $extra;
    }
    
    public function setStatusProcessed(){
        $this->status = 'processed';
    }
    
    public function setStatusAdded(){
        $this->status = 'added';
    }
    
    public function setCache($file){
        $this->cache = $file;
    }
}