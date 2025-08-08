<?php defined('SYSPATH') or die('No direct script access.');
require_once dirname(__FILE__) . '/../../vendor/domainapi/DomainAPI_class.inc.php';
class Util_DomainApi extends DomainAPI{
    
   static protected $configInstance;
   
   /**
    * get config
    * @return DomainAPIConfiguration
    */
   static public function getConfigInstance(){
       if (self::$configInstance) return self::$configInstance;
       self::$configInstance = new DomainAPIConfiguration();
       return self::$configInstance;
   }
}