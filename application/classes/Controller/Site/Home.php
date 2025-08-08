<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Site_Home extends Controller_Site {
	public function action_index(){
		$this->_checkAccess(Site_Access::ACCESS_VIEWAUTH);
		$this->template->content = View::factory('site/home');
	}
}