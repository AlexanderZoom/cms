<?php defined('SYSPATH') OR die('No direct script access.');
class Admin_Setting implements ISetting {
	public static function getTabName(){
		return 'Admin Main';
	}
	
	public static function getTabDescription(){
		return '';
	}
	
	public static function getPositionTab(){
		return 1000;
	}
	
	public static function getView(){
		return 'admin/settings_main';
	}
	
	public static function save($data){
		///print_r($data);
		$idxKeys = array(
				'admin.admin.title' => array('group' => 'admin', 'key'=>"['title']"),
				'admin.admin.title_separator' => array('group' => 'admin', 'key'=>"['title_separator']"),
				'admin.admin.item_on_page' => array('group' => 'admin', 'key'=>"['item_on_page']"),
				'admin.admin.language_default' => array('group' => 'admin', 'key'=>"['language_default']"),
				'admin.admin.language_list' => array('group' => 'admin', 'key'=>"['language_list']"),
				'admin.database.username' => array('group' => 'database', 'key'=>"['default']['connection']['username']"),
				'admin.database.password' => array('group' => 'database', 'key'=>"['default']['connection']['password']"),
				'admin.database.charset' => array('group' => 'database', 'key'=>"['default']['charset']"),
				'admin.encrypt.key' => array('group' => 'encrypt', 'key'=>"['default']['key']"),
				'admin.main.cookie_salt' => array('group' => 'main', 'key'=>"['cookie_salt']"),
				'admin.url.trusted_hosts' => array('group' => 'url', 'key'=>"['trusted_hosts']"),
		);
		
		foreach ($idxKeys as $idx => $arr){
			
			$gr = Kohana::$config->load($arr['group']);
			$tmp = '';
			if (isset($data[$idx])){
				if ($idx == 'admin.url.trusted_hosts'){
					
					$tmp = '$gr' . $arr['key'] . ' =  explode(\',\', $data[$idx]);';
				}
				else{
					$tmp = '$gr' . $arr['key'] . ' =  $data[$idx];';
					
				}		

				
				if ($tmp){ 
					eval($tmp);
					Kohana::$config->_write_config($arr['group'], null, null);
				}
			}
			
			
		}
		
		$dbhost = Arr::get($data, 'admin.database.host');
		$dbport = Arr::get($data, 'admin.database.port');
		$dbname = Arr::get($data, 'admin.database.dbname');
		
		$dsn = "mysql:host={$dbhost}" . ';' . ($dbport ? "port={$dbport}" . ';': '') . "dbname={$dbname}";
		
		$gr = Kohana::$config->load('database');
		
		$tmp = '$gr["default"]["connection"]["dsn"] =  $dsn;';
		if ($tmp){
			eval($tmp);
			Kohana::$config->_write_config('database', null, null);
		}
		
		
		
	}
	
	public static function setValidatorRule(Validation $validator){
		$validator->label('admin.admin.title', 'Title');
		$validator->label('admin.admin.title_separator', 'Title separator');
		$validator->label('admin.admin.item_on_page', 'Item on page');
		$validator->label('admin.admin.language_default', 'Default language');
		$validator->label('admin.admin.language_list', 'Language list');
		$validator->label('admin.database.host', 'Database host');
		$validator->label('admin.database.dbname', 'Database dbname');
		$validator->label('admin.database.port', 'Database port');
		$validator->label('admin.database.username', 'Database username');
		$validator->label('admin.database.password', 'Database password');
		$validator->label('admin.database.charset', 'Database charset');
		$validator->label('admin.encrypt.key', 'Encrypt key');
		$validator->label('admin.main.cookie_salt', 'Cookie salt');
		$validator->label('admin.url.trusted_hosts', 'Trusted hosts');
		
		$validator->rule('admin.admin.title', 'not_empty');
		$validator->rule('admin.admin.title_separator', 'not_empty');
		$validator->rule('admin.admin.item_on_page', 'not_empty');
		$validator->rule('admin.admin.item_on_page', 'digit');
		$validator->rule('admin.admin.language_default', 'not_empty');
		$validator->rule('admin.admin.language_list', 'not_empty');
		$validator->rule('admin.database.host', 'not_empty');
		$validator->rule('admin.database.dbname', 'not_empty');
		//$validator->rule('admin.database.port', 'not_empty');
		$validator->rule('admin.database.username', 'not_empty');
		$validator->rule('admin.database.password', 'not_empty');
		$validator->rule('admin.database.charset', 'not_empty');
		$validator->rule('admin.encrypt.key', 'not_empty');
		$validator->rule('admin.main.cookie_salt', 'not_empty');
		$validator->rule('admin.url.trusted_hosts', 'not_empty');
		
	}
	
	public static function setDefaults(){
		$data = array(
			'admin.main.'	
				
		);
	}
	
	//additional way get data
	public static function getData(){
		$result = array();
		$admin = Kohana::$config->load('admin');
		$database = Kohana::$config->load('database');
		$dsn = $database['default']['connection']['dsn'];
		$dsnResult = array('host' => '', 'port' => '', 'dbname' => ''); 
		$dsnArr = explode(':', $dsn);
		$dsnArr = explode(';', $dsnArr[1]);		
		foreach ($dsnArr as $key => $val){
			$val = explode('=', $val);
			if (isset($dsnResult[$val[0]])){
				$dsnResult[$val[0]] = $val[1];
			}
		}
		
		$encrypt = Kohana::$config->load('encrypt');
		$main = Kohana::$config->load('main');
		$url = Kohana::$config->load('url');
		
		$result['admin.admin.title'] = $admin['title'];
		$result['admin.admin.title_separator'] = $admin['title_separator'];
		$result['admin.admin.item_on_page'] = $admin['item_on_page'];
		$result['admin.admin.language_default'] = $admin['language_default'];
		$result['admin.admin.language_list'] = $admin['language_list'];
		$result['admin.database.host'] = $dsnResult['host'];
		$result['admin.database.dbname'] = $dsnResult['dbname'];
		$result['admin.database.port'] = $dsnResult['port'];
		$result['admin.database.username'] = $database['default']['connection']['username'];
		$result['admin.database.password'] = $database['default']['connection']['password'];
		$result['admin.database.charset'] = $database['default']['charset'];
		$result['admin.encrypt.key'] = $encrypt['default']['key'];
		$result['admin.main.cookie_salt'] = $main['cookie_salt'];
		$result['admin.url.trusted_hosts'] = implode(',', $url['trusted_hosts']);
		
		
		
		
		return $result;
	}
}