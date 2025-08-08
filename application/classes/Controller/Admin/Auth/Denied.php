<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Admin_Auth_Denied extends Controller_Admin {
    protected $authCheck = true;
    protected $ajaxMethods = array('index');
    
    public function action_index(){
        $this->template->title[] = 'Access Denied';
        if ($this->template->content instanceof Admin_Ajax){
            $this->template->content->setResult(Admin_Ajax::RESULT_CODE_ERROR);
            $this->template->content->setErrorCode(Admin_Ajax::ERROR_CODE_ACCESS_DENIED);
        }
        else{
            $this->template->content = View::factory('admin/auth/denied');
        }
    }
}