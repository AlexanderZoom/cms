<?php defined('SYSPATH') OR die('No direct script access.');
class Admin_Setting_Pages implements ISetting {
	public static function getTabName(){
		return 'Site Pages';
	}
	
	public static function getTabDescription(){
		return '';
	}
	
	public static function getPositionTab(){
		return 2;
	}
	
	public static function getView(){
		return 'admin/static_pages_setting';
	}
	
	public static function save($data){
		$fields = array('site.pages.default_path');
		
		foreach ($fields as $name){
			$newValue = Arr::get($data, $name);
			$value = Model_Setting::get($name);
			if (strcasecmp($value, $newValue)) Model_Setting::set($name, $newValue);
		}
	}
	
	public static function setValidatorRule(Validation $validator){
		$validator->label('site.pages.default_path', 'Pages default path');
		
		
		
		$validator->rule('site.pages.default_path', 'not_empty');
		
	}
	
	public static function setDefaults(){
		$data = array(
			'site.pages.default_path' => 'pages'	
				
		);
		
		if (!Model_Setting::get('site.pages.default_path'))
		foreach ($data as $key => $val){
			Model_Setting::set($key, $val);
		}
	}
	
	//additional way get data
	public static function getData(){
		return array();
	}
}