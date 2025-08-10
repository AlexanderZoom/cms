<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Site_Premoderate extends Controller_Site {
	protected $authCheck = false;
    
	
    public function action_index(){     
    
        $this->template->content = View::factory('site/auth/premoderate');
        $this->template->title[] = 'Premoderate';
            
        $auth = Site_Auth::getInstance()->getAuthUser();
        if ($auth->logged_in()) $auth->logout(true, true);
        
    }
}