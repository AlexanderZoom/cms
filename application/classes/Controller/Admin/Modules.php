<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Admin_Modules extends Controller_Admin {

    public function action_index(){
        $this->template->title[] = 'Modules';
        $this->template->content = View::factory('admin/modules');
        $this->template->content->modules = Modules::get();
    }
    
    protected function _breadcrumbs(){
    	$lst = parent::_breadcrumbs();
    	$lst[] = array(
    			'icon' => 'fa fa-cubes',
    			'name' => 'Modules',
    			'url'  => URL::site(Route::url('admin', array('controller'=>'modules', 'lang' => $this->getLanguage(), 'action'=>'index')))
    	);
    
    	
    	return $lst;
    }
}