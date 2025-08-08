<?php defined('SYSPATH') OR die('No direct script access.');
class Admin_Auth_Result {
    
    public $result = null;
    public $instances = array();
    public $manage;
    public $manageParams;
    public $queryRights;
    
    public function __construct($result, $manage = null, $instances = array()){
        if (is_bool($result)) $result = (int) $result;
        $this->result = $result;
        $this->instances = $instances;
        $this->manage = $manage;
    }
    
    public function __toString(){
        return (string) $this->result;
    }
}