<?php defined('SYSPATH') OR die('No direct script access.');
class Site_Auth {
    const AUTH_NO = 'no';
    const AUTH_DENIED = 'denied';
    const AUTH_DISABLED = 'disabled';
    const AUTH_BANNED = 'banned';
    const AUTH_PREMODERATE = 'premoderate';
    const AUTH_OK = 'ok';
    
    /**
     * @var Site_Auth_User
     */
    protected $_authUser;
    
    /**
     *
     * @var self
     */
    protected static $_instance;
    
    private function __construct() {
        $this->_authUser = Site_Auth_User::instance();
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
    
    public function checkAccess(Controller_Site $controller, $rights = null, $action){
        
        if (is_null($rights)) $rights = Site_Access::ACCESS_VIEW;
        //$controller->request->action();
        ///Route::url('admin', array('controller' => 'auth_denied', 'action' => 'qqq', 'id' => 2 ));

        if (!$this->_authUser->logged_in()) return new Site_Auth_Result(self::AUTH_NO);
        if ($this->_authUser->get_user()->isDisabled()) return new Site_Auth_Result(self::AUTH_DISABLED);
        if ($this->_authUser->get_user()->hasGroup('premoderate')) return new Site_Auth_Result(self::AUTH_PREMODERATE);
        if ($this->_authUser->get_user()->hasGroup('banned')) return new Site_Auth_Result(self::AUTH_BANNED);
        
        $res = $this->getRights($controller, $rights, $action);
        if (!$res->result) return new Site_Auth_Result(self::AUTH_DENIED, $res);
        else return new Site_Auth_Result(self::AUTH_OK, $res);
    }
    
    public function getRights(Controller_Site $controller, $rights = Site_Access::ACCESS_NO, $action = null, $instance = null){
        $options = array(
        'user' => $this->_authUser->get_user(),
        'action' => is_null($action) ? $controller->request->action() : $action,
        'controller' => get_class($controller),
        'instance' => $instance,		
        );
        
        $access = Site_Auth_Access::getInstance();
        return $access->check($options, $rights);
    }
    
    
    
    /**
     * @return Site_Auth_User
     */
    public function getAuthUser(){
        return $this->_authUser;
    }
    
    
}
