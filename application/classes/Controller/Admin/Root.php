<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Admin_Root extends Controller_Admin {

    public function action_index(){
        $auth = Admin_Auth::getInstance()->getAuthUser();
        
        $this->redirect(URL::site(Route::url('admin', array('controller'=>'home', 'lang' => I18n::lang()))));
        
        //if ($auth->get_user()->hasGroup('admin')) $this->redirect(URL::site(Route::url('admin', array('controller'=>'home', 'lang' => I18n::lang()))));
        //else $this->redirect(URL::site(Route::url('admin', array('controller'=>'pages', 'lang' => I18n::lang()))));
        exit();
    }
    
}