<?php defined('SYSPATH') OR die('No direct script access.');
class Admin_Auth {
    const AUTH_NO = 'no';
    const AUTH_DENIED = 'denied';
    const AUTH_DISABLED = 'disabled';
    const AUTH_OK = 'ok';
    
    /**
     * @var Admin_Auth_User
     */
    protected $_authUser;
    
    /**
     *
     * @var self
     */
    protected static $_instance;
    
    private function __construct() {
        $this->_authUser = Admin_Auth_User::instance();
    }
    
    private function __clone() {
    
    }
    
    /**
     * @return self
     */
    public static function getInstance() {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }
    
        return self::$_instance;
    }
    
    public function checkAccess(Controller_Admin $controller, $rights = null, $action){
        
        if (is_null($rights)) $rights = Admin_Access::ACCESS_VIEW;
        //$controller->request->action();
        ///Route::url('admin', array('controller' => 'auth_denied', 'action' => 'qqq', 'id' => 2 ));

        if (!$this->_authUser->logged_in()) return new Admin_Auth_Result(self::AUTH_NO);
        if ($this->_authUser->get_user()->isDisabled()) return new Admin_Auth_Result(self::AUTH_DISABLED);
        
        
        $res = $this->getRights($controller, $rights, $action);
        if (!$res->result) return new Admin_Auth_Result(self::AUTH_DENIED, $res);
        else return new Admin_Auth_Result(self::AUTH_OK, $res);
    }
    
    public function getRights(Controller_Admin $controller, $rights = Admin_Access::ACCESS_NO, $action = null, $instance = null){
        $options = array(
        'user' => $this->_authUser->get_user(),
        'action' => is_null($action) ? $controller->request->action() : $action,
        'controller' => get_class($controller),
        'instance' => $instance,		
        );
        
        $access = Admin_Auth_Access::getInstance();
        return $access->check($options, $rights);
    }
    
    
    
    /**
     * @return Admin_Auth_User
     */
    public function getAuthUser(){
        return $this->_authUser;
    }
    
    
}
