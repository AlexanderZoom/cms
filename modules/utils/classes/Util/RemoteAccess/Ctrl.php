<?php defined('SYSPATH') or die('No direct script access.');
class Util_RemoteAccess_Ctrl {
    
    protected $_cmd;
    
    /**
     * @var Util_RemoteAccess_Auth
     */
    protected $_auth;
        
    public function __construct(Util_RemoteAccess_Cmd $cmd, $auth=''){
        $this->_cmd = $cmd;
        
        if ($auth && $this->_cmd->checkAuthObj($auth)){
            $this->_auth = $auth;
        }
    }
    
    /**
     *
     * @return Util_RemoteAccess_Response
     */
    public function run($cmdMethod, $arguments = array()){
        if ($this->_auth && !$this->_auth->checkAuth()) {
            $text = $this->_auth->getError() ? $this->_auth->getError() : 'Auth failed';
            throw new Util_RemoteAccess_Exception($text);
        }
        
        if (!method_exists($this->_cmd, $cmdMethod)){
            throw new Util_RemoteAccess_Exception("Method {$cmdMethod} not found from " . get_class($this->_cmd));
        }
        
        return $this->_cmd->$cmdMethod($arguments);
    }
}