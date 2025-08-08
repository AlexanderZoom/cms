<?php defined('SYSPATH') OR die('No direct script access.');
class Site_Widget_Data {
    protected $_data = array();
    
    public function set($data){
        $this->_data = $data;
    }
    
    public function get(){
        return $this->_data;
    }
}