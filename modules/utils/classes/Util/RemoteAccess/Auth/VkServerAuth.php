<?php defined('SYSPATH') or die('No direct script access.');
class Util_RemoteAccess_Auth_VkServerAuth extends Util_RemoteAccess_Auth{
    private $_login;
    private $_password;
    private $_curlFile;
    
    private $_action;
    private $_actionRef;
    
    
    public function __construct($login, $password, $curlFile=''){
        $this->_login = $login;
        $this->_password = $password;
        $this->_curlFile = $curlFile;
    }
    
    public function checkAuth(){
        $this->_clearError();
        
        if ($this->_isLogin()) return true;
        
        if (!$this->_action){
            throw new Util_RemoteAccess_Exception('Auth action failed (vk_auth)');
        }
        
        
        $postData = array(
            'email'    => $this->_login,
            'pass' => $this->_password
        );
        
        
        $cw = Util_RemoteAccess_Proto_Http::post($this->_action, $postData, $this->_actionRef, '', $this->_curlFile);
        $cw->setOption('CURLOPT_FOLLOWLOCATION', true);
        $cw->setOption('CURLOPT_MAXREDIRS', 5);
        
        $out = $cw->run(array(200,302));
                
        if (preg_match('/<form/i', $out['data'])){
            $this->_lastError = 'AuthError: Check login and password';
            return false;
        }
        
        return true;
    }
    
    protected function _isLogin(){
        $this->_action = null;
        $this->_actionRef = null;
        $url = 'https://vk.com/';
        
        $cw = Util_RemoteAccess_Proto_Http::get($url, '', '', $this->_curlFile);
        $cw->setOption('CURLOPT_FOLLOWLOCATION', true);
        $cw->setOption('CURLOPT_MAXREDIRS', 5);
        
        $out = $cw->run(array(200,302));
        
        if (preg_match('/<form method="post" action="(.*?)"/i', $out['data'], $match)){
            $this->_action = $match[1];
            $this->_actionRef = $out['curl_info']['url'];
            return false;
        }
        
        return true;
    }

}