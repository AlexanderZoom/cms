<?php defined('SYSPATH') or die('No direct script access.');
class Util_Crawler_Log {
    
    const TYPE_INFO = 'INFO';
    const TYPE_WARN = 'WARNING';
    const TYPE_ERROR = 'ERROR';
    
    protected $logHandler;
    
    public function __construct($logHandler=''){
        if ($logHandler) $this->logHandler = $logHandler;
    }
    
    protected function write($log){
        if ($this->logHandler) call_user_func($this->logHandler, $log);
    }
    
    public function info($log){
        $this->write(self::TYPE_INFO . " CRAWLER:\t" . $log);
    }
    
    public function warn($log){
        $this->write(self::TYPE_WARN . " CRAWLER:\t" . $log);
    }
    
    public function error($log){
        throw new Util_Crawler_Exception(self::TYPE_ERROR . " CRAWLER:\t" . $log);
        
    }
}