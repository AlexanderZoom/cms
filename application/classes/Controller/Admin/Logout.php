<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Admin_Logout extends Controller_Admin {

    public function action_index(){
        $auth = Admin_Auth::getInstance()->getAuthUser();
        if ($auth->logged_in()){
        	$this->_addAudit(Admin_Audit::TYPE_LOGIN, 'logout');
        	$auth->logout(true, true);
        }
        $this->redirect(URL::site(Route::url('admin', array('lang' => I18n::lang()))));
    }
    
}