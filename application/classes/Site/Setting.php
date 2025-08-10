<?php defined('SYSPATH') OR die('No direct script access.');
class Site_Setting implements ISetting {
	public static function getTabName(){
		return 'Site Main';
	}
	
	public static function getTabDescription(){
		return '';
	}
	
	public static function getPositionTab(){
		return 1;
	}
	
	public static function getView(){
		return 'site/settings_main';
	}
	
	public static function save($data){
		$fields = array('site.main.name', 'site.main.description', 
				'site.main.keyword', 'site.main.feedback_email', 'site.main.default_module',
				'site.main.default_language', 'site.main.name_separator',
				'site.main.register_type', 'site.main.format_date', 'site.main.format_time',
				'site.main.url',
		);
		
		foreach ($fields as $name){
			$newValue = Arr::get($data, $name);
			$value = Model_Setting::get($name);
			if (strcasecmp($value, $newValue)) Model_Setting::set($name, $newValue);
		}
	}
	
	public static function setValidatorRule(Validation $validator){
		$validator->label('site.main.name', 'Site name');
		$validator->label('site.main.description', 'Site description');
		$validator->label('site.main.keyword', 'Site keywords');
		$validator->label('site.main.feedback_email', 'Feedback email');
		$validator->label('site.main.default_module', 'Default module');
		$validator->label('site.main.default_language', 'Default language');
		$validator->label('site.main.name_separator', 'Site name separator');
		$validator->label('site.main.register_type', 'Registration type');
		$validator->label('site.main.format_date', 'Format date');
		$validator->label('site.main.format_time', 'Format time');
		$validator->label('site.main.url', 'Site url');
		
		
		
		$validator->rule('site.main.name', 'not_empty');
		$validator->rule('site.main.url', 'not_empty');
		$validator->rule('site.main.feedback_email', 'not_empty');
		$validator->rule('site.main.feedback_email', 'email');
		$validator->rule('site.main.default_module', 'not_empty');
		$validator->rule('site.main.default_language', 'not_empty');
		$validator->rule('site.main.name_separator', 'not_empty');
		$validator->rule('site.main.register_type', 'in', array(':value', array('simple', 'verification', 'premoderate')));
		$validator->rule('site.main.format_date', 'not_empty');
		$validator->rule('site.main.format_time', 'not_empty');
	}
	
	public static function setDefaults(){
		$data = array(
			'site.main.name'	 		=> 'Home Page',
			'site.main.url'	 		=> 'localhost',
			'site.main.name_separator' => '::',
			'site.main.description'		=> 'My first site',
			'site.main.default_module'	=> 'welcome',
			'site.main.default_language' => 'ru',
			'site.main.register_type' => 'simple',
			'site.main.format_date' => 'Y-m-d',
			'site.main.format_time' => 'H:i:s'
		);
		
		if (!Model_Setting::get('site.main.name'))
		foreach ($data as $key => $val){
			Model_Setting::set($key, $val);
		}
		
	}
	
	//additional way get data
	public static function getData(){
		return array();
	}
} 