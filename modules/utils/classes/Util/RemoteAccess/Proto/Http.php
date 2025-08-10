<?php defined('SYSPATH') or die('No direct script access.');
class Util_RemoteAccess_Proto_Http {
    public static function get($url, $referer='', $userAgent='',
                               $cookiePath=''){
        return Util_Curl_Preset::get($url, $referer, $userAgent, $cookiePath);
    }
    
    public static function post($url, $postData = array(), $referer='',
                                $userAgent='', $cookiePath=''){
        return Util_Curl_Preset::post($url, $postData, $referer, $userAgent, $cookiePath);
    }
}