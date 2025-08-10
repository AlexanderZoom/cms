<?php defined('SYSPATH') or die('No direct script access.');
class Util_GeoIP {
    public function __construct(){
        if (!extension_loaded('geoip')) throw new Exception('Geoip not loaded');
        $this->init();
    }
    
    protected function init(){
        
    }
    
    public function getContinentCode($hostname){
        return geoip_continent_code_by_name($hostname);
    }
    
    public function getCountryCode($hostname){
        return geoip_country_code_by_name($hostname);
    }
    
    public function getCountryCode3($hostname){
        return geoip_country_code3_by_name($hostname);
    }
    
    public function getCountryName($hostname){
        return geoip_country_name_by_name($hostname);
    }
    
    public function getDatabaseInfo($database = GEOIP_COUNTRY_EDITION){
        return geoip_database_info($database);
    }
    
    public function getRecord($hostname){
        return geoip_record_by_name($hostname);
    }
}
