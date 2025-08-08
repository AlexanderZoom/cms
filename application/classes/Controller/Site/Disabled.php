<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Site_Disabled extends Controller_Site {
    protected $authCheck = false;
    protected $ajaxMethods = array('index');
    
    public function action_index(){
        $this->template->title[] = 'Account disabled';
        if ($this->template->content instanceof Site_Ajax){
            $this->template->content->setResult(Site_Ajax::RESULT_CODE_ERROR);
            $this->template->content->setErrorCode(Site_Ajax::ERROR_CODE_ACCESS_DISABLED);
        }
        else{
            $this->template->content = View::factory('site/auth/disabled');
            $auth = Site_Auth::getInstance()->getAuthUser();
            if ($auth->logged_in()) $auth->logout(true, true);
        }
    }
}