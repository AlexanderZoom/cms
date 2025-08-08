<?php defined('SYSPATH') or die('No direct script access.');
class Util_Curl_Preset
{
	/**
	 *
	 * @param string $url
	 * @param string $referer
	 * @param string $userAgent
	 * @param string $cookiePath
	 * @return Util_Curl_Wrapper
	 */
    public static function get($url, $referer='', $userAgent='',
                               $cookiePath=''){

        $cw = self::init($url, $referer, $userAgent, $cookiePath);
        $cw->setOption('CURLOPT_HEADER',1);
        $cw->setOption('CURLOPT_RETURNTRANSFER', true);
        $cw->setOption('CURLOPT_SSL_VERIFYPEER', false);
        $cw->setOption('CURLOPT_SSL_VERIFYHOST', false);
             
        $cw->setOption('CURLOPT_CONNECTTIMEOUT', 30);
        

        $cw->setOption('CURLOPT_AUTOREFERER', true);
        //$cw->setOption('CURLOPT_FOLLOWLOCATION', true);
        ///$cw->setOption('CURLOPT_MAXREDIRS', 5);

        return $cw;
    }
    
    /**
     *
     * @param string $url
     * @param mixed $postData
     * @param string $referer
     * @param string $userAgent
     * @param string $cookiePath
     * @return Util_Curl_Wrapper
     */
    public static function post($url, $postData = array(), $referer='',
                                $userAgent='', $cookiePath=''){
        $cw = self::get($url, $referer, $userAgent, $cookiePath);
        $cw->setOption('CURLOPT_POST', true)
           ->setOption('CURLOPT_POSTFIELDS', $postData);

        return $cw;
    }
    
    /**
     *
     * @param string $url
     * @param string $referer
     * @param string $userAgent
     * @param string $cookiePath
     * @return Util_Curl_Wrapper
     */
    public static function init($url, $referer='', $userAgent='',
                               $cookiePath=''){
                               	
        $cw = new Util_Curl_Wrapper();
        
        $parseUrl = parse_url($url);
        if(isset($parseUrl['port']))
        {
            $cw->setOption('CURLOPT_PORT', $parseUrl['port']);
            $url = "{$parseUrl['scheme']}://" .
                    "{$parseUrl['host']}{$parseUrl['path']}" .
                    "?{$parseUrl['query']}"  ;
        }
        
        $cw->setOption('CURLOPT_URL', $url);
        $cw->setOption('CURLOPT_REFERER', $referer);
        $cw->setOption('CURLOPT_USERAGENT', $userAgent);
        
        if ($cookiePath){
            $cw->setOption('CURLOPT_COOKIEJAR', "{$cookiePath}");
            $cw->setOption('CURLOPT_COOKIEFILE', "{$cookiePath}");
        }
        return $cw;
    }
}