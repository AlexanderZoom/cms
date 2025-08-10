<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Proxy List file contain 'host type'
 * @author alex
 *
 */
class Util_Crawler_ProxyList {
    
    protected $proxy = array();
    protected $proxyIterator = 0;
    
    public function __construct($file){
        if (!file_exists($file)) throw new Util_Crawler_Exception('Proxy file not exist ' . $file);
        if (!is_readable($file)) throw new Util_Crawler_Exception('Proxy file not readable ' . $file);
        
        $handle = fopen($file, "r");
        $contents = fread($handle, filesize($file));
        fclose($handle);
        
        $contents = explode("\n", $contents);

        foreach ($contents as $content){
            if (!$content) continue;
            
            $content = explode(' ', $content);
            $this->proxy[] = new Util_Crawler_Proxy($content[0], strtolower($content[1]));
        }
        
        if (!$this->countProxy()) throw new Util_Crawler_Exception('Proxy list empty. Check file ' . $file);
    }
    
    /**
     *
     * @return Util_Crawler_Proxy
     */
    public function getProxy(){
        return $this->proxy[$this->proxyIterator];
    }
    
    /**
     *
     * @throws Util_Crawler_Exception
     * @return Util_Crawler_Proxy
     */
    public function nextProxy(){
        $this->proxyIterator ++;
        if ($this->proxyIterator >= $this->countProxy()) throw new Util_Crawler_Exception('Not enough proxy from list');
            
        return $this->getProxy();
    }
    
    protected function countProxy(){
        return count($this->proxy);
    }
    
    public function hasProxy(){
        return (bool) $this->countProxy();
    }
}