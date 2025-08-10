<?php defined('SYSPATH') or die('No direct script access.');
class Util_Crawler_Handler_Test extends Util_Crawler_Handler {
        
    public function process(Util_Crawler_Link $link, $data){
        $links = array();
        $this->loger->info('Util_Crawler_Handler_Test ' . print_r($data, true));
        
        return $links;
    }
    
    public function getFirstLink(){
        $link = new Util_Crawler_Link ();
        $link->url = 'http://google.com';
        $link->ref = '';
        return $link;
    }
    
    public function setup(){
        throw new Util_Crawler_ExceptionHandler('Handler not configured');
    }
    
    public function clear(){
        
    }
}