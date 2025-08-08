<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Admin_Auth_Disabled extends Controller_Admin {
    protected $authCheck = false;
    protected $ajaxMethods = array('index');
    
    public function action_index(){
        $this->template->title[] = 'Access Disabled';
        if ($this->template->content instanceof Admin_Ajax){
            $this->template->content->setResult(Admin_Ajax::RESULT_CODE_ERROR);
            $this->template->content->setErrorCode(Admin_Ajax::ERROR_CODE_ACCESS_DISABLED);
        }
        else{
            $this->template->content = View::factory('admin/auth/login');
            $auth = Admin_Auth::getInstance()->getAuthUser();
            if ($auth->logged_in()) $auth->logout(true, true);
            $this->setFlashWarning('Your account has been disabled');
        }
    }
}