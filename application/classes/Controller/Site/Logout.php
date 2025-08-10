<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Site_Logout extends Controller_Site {

    public function action_index(){
        $auth = Site_Auth::getInstance()->getAuthUser();
        if ($auth->logged_in()) $auth->logout(true, true);
        $this->redirect(URL::site(Route::url('site', array('lang' => I18n::lang()))));
    }
    
}