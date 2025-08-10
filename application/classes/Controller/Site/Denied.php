<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Site_Denied extends Controller_Site {
    protected $authCheck = false;
    protected $ajaxMethods = array('index');
    
    public function action_index(){
        $this->template->title[] = 'Access denied';
        if ($this->template->content instanceof Site_Ajax){
            $this->template->content->setResult(Site_Ajax::RESULT_CODE_ERROR);
            $this->template->content->setErrorCode(Site_Ajax::ERROR_CODE_ACCESS_DENIED);
        }
        else{
            $this->template->content = View::factory('site/auth/denied');
        }
    }
}