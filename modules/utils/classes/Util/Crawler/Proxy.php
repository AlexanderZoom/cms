<?php defined('SYSPATH') or die('No direct script access.');
class Util_Crawler_Proxy {
    const TYPE_HTTP = 'http';
    const TYPE_SOCKS4 = 'socks4';
    const TYPE_SOCKS5 = 'socks5';
    
    protected $host;
    
    protected $type;
    
    public function __construct($host, $type){
        $this->host = $host;

        if (!in_array($type, $this->getTypes())) throw new Util_Crawler_Exception("Proxy type is invalid Host: {$host} Type: {$type}");
        $this->type = $type;
    }
    
    public function getHost(){
        return $this->host;
    }
    
    public function getType(){
        return $this->type;
    }
    
    public function getTypeCurl(){
        switch ($this->getType()){
            case self::TYPE_HTTP:
                return CURLPROXY_HTTP;
                break;
            
            case self::TYPE_SOCKS4:
                return CURLPROXY_SOCKS4;
                break;
                
            case self::TYPE_SOCKS5:
                return CURLPROXY_SOCKS5;
                break;

            default:
                throw new Util_Crawler_Exception("Unknown proxy type {$this->getType()} for curl");
        }
    }
    
    /**
     * get types proxy
     * @return multitype:unknown
     */
    protected function getTypes(){
        $out = array();
        $constantPrefix = 'TYPE_';
        $reflectionClass = new ReflectionClass(get_class($this));
        foreach ($reflectionClass->getConstants() as $constantName => $constantValue){
            if (strpos($constantName, $constantPrefix) !== false) $out[] = $constantValue;
        }
        return $out;
    }
    
}