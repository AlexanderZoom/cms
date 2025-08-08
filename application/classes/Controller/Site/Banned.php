<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Site_Banned extends Controller_Site {
	protected $authCheck = false;
    
    public function action_index(){     
    		$this->template->title[] = 'Account banned';
            $this->template->content = View::factory('site/auth/banned');
            $auth = Site_Auth::getInstance()->getAuthUser();
            if ($auth->logged_in()) $auth->logout(true, true);
        
    }
}