<?php defined('SYSPATH') or die('No direct script access.');
abstract class Util_RemoteAccess_Auth {
    protected $_lastError;
    
    abstract public function checkAuth();
    
    public function getError(){
        return $this->_lastError;
    }
    
    public function hasError(){
        return (bool) $this->_lastError;
    }
    
    protected function _clearError(){
        $this->_lastError = null;
    }
}