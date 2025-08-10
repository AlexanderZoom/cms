<?php defined('SYSPATH') OR die('No direct script access.');

class ORM extends Kohana_ORM
{
	
	protected $_stop_load_result = false;
	
    public function list_columns()
    {
        $enable = Kohana::$config->load('orm_tuning.enable');
        if (!$enable) return parent::list_columns();
        $cache_lifetime= Kohana::$config->load('orm_tuning.cache_lifetime');
        $cache_lifetime = strlen($cache_lifetime) ? $cache_lifetime : 86400;
         
        $cache_key = $this->_table_name ."structure";
        if ($result = Kohana::cache($cache_key, NULL, $cache_lifetime)) {
            $_columns_data = $result;
        }


        if( !isset($_columns_data)) {
            $_columns_data = $this->_db->list_columns($this->_table_name);
            Kohana::cache($cache_key, $_columns_data, $cache_lifetime);
        }

        return $_columns_data;
    }
    
    protected function _load_result($multiple = FALSE)
    {
    	if ($this->_stop_load_result) return $this;
    	return parent::_load_result($multiple);
    }
    
    public function set_stop_load_result_on(){
    	$this->_stop_load_result = true;
    }
    
    public function set_stop_load_result_off(){
    	$this->_stop_load_result = falses;
    }
}