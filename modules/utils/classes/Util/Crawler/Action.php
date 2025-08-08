<?php defined('SYSPATH') or die('No direct script access.');
class Util_Crawler_Action {
    const STATUS_RETRY = 'retry';
    const STATUS_LOAD  = 'load';
    
    protected $status;
    
    /**
     * @var Util_Crawler_Link
     */
    protected $link;
    
    public function setStatus($status){
        if (!in_array($status, $this->getStatuses())) throw new Util_Crawler_Exception('Set status for action crawler is incorrect');
        
        if ($status == self::STATUS_LOAD && !$this->link) throw new Util_Crawler_Exception('Link for action crawler not defined. Status: ' . $status);
        
        $this->status = $status;
    }
    
    public function getStatus(){
        return $this->status;
    }
    
    public function setLink(Util_Crawler_Link $link){
        $this->link = $link;
    }
    
    public function getLink(){
        return $this->link;
    }
    
    protected function getStatuses(){
        $out = array();
        $constantPrefix = 'STATUS_';
        $reflectionClass = new ReflectionClass(get_class($this));
        foreach ($reflectionClass->getConstants() as $constantName => $constantValue){
            if (strpos($constantName, $constantPrefix) !== false) $out[] = $constantValue;
        }
        return $out;
    }
}