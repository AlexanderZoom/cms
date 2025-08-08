<?php defined('SYSPATH') or die('No direct script access.');
class Util_Url{
    /**
     * add parameter(s) to url
     * @param string $url
     * @param array $param
     * @return string
     */
    public static function addParameter($url, array $param){
        $urlArr = self::initUrlArray(parse_url($url));

        $queryArr = array();
        if (strlen($urlArr['query'])) $queryArr = self::parseQuery($urlArr['query']);
        
        $queryArr = array_merge($queryArr, $param);
        $urlArr['query'] = http_build_query($queryArr, '', '&');
        
        return self::build($urlArr);
    }
    
    public static function addUrl($url, $query){
    	$urlArr = self::initUrlArray(parse_url($url));
    	$queryArr = self::initUrlArray(parse_url($query));
    	
    	$queryArr['scheme'] = $urlArr['scheme'];
    	$queryArr['port'] = $urlArr['port'];
    	$queryArr['user'] = $urlArr['user'];
    	$queryArr['pass'] = $urlArr['pass'];
    	$queryArr['host'] = $urlArr['host'];
    	
    	return self::build($queryArr);
    }
    
    /**
     * Add or overwrite port
     * @param unknown $url
     * @param unknown $port
     */
    public static function addPort($url, $port){
        $urlArr = self::initUrlArray(parse_url($url));
        $urlArr['port'] = $port;
        return self::build($urlArr);
    }
    
        
    public static function parseQuery($query){
        /*$query = explode('&', $query);
        $queryNew = array();
        foreach ($query as $part){
            $part = explode('=', $part);
            $queryNew[$part[0]] = isset($part[1]) ? $part[1] : '';
        }*/
        
        parse_str($query, $queryNew);
        
        return $queryNew;
    }
    
    public static function build($values){
        $values = self::initUrlArray($values);
        $values['scheme'] = empty($values['scheme']) ? 'http' : $values['scheme'];
        $values['fragment'] = empty($values['fragment']) ? '' : '#' . $values['fragment'];
        $values['port'] = empty($values['port']) ? '' : ':' . $values['port'];
        $values['query'] = empty($values['query']) ? '' : '?' . $values['query'];
        $authPart = '';
        if ($values['user']) $authPart = $values['user'];
        if ($values['pass']) $authPart .= ':' . $values['pass'];
        if ($authPart) $authPart .= '@';
        $scheme = $values['scheme'] . '://';
        if (!$values['host']){
            $scheme = '';
            $authPart = '';
            $values['port'] = '';
        }
        
        return "{$scheme}{$authPart}{$values['host']}{$values['port']}{$values['path']}{$values['query']}{$values['fragment']}";
    }
    
    protected static function initUrlArray($urlArr){
        $listArgs = array('scheme', 'host', 'user', 'pass', 'path', 'query', 'fragment', 'port');
    
        foreach ($listArgs as $arg){
            if (!isset($urlArr[$arg])){
                $urlArr[$arg] = '';
            }
        }
    
        return $urlArr;
    }
}