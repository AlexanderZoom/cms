<?php defined('SYSPATH') OR die('No direct script access.');
class Model_Setting extends Model {
	protected static $_codePrefix;
	private static $_data = array();
	private static $_data_empty = false;
	private static $_data_loaded = false;
	private static $_table = 'setting';
		
	
	public static function load(){
		if (self::$_data_empty) return;
		
		$query = DB::select()->from(self::$_table);
		$rows = DB::query(Database::SELECT, $query)->execute();
		foreach ($rows as $row){
			self::$_data[$row['code']] = $row['value'];
		}
	
		if (!count(self::$_data)) self::$_data_empty = true;
		
		self::$_data_loaded = true;
	}
	
	public static function set($name, $value){
		$name = static::$_codePrefix . $name;
		$kd = Kohana_Database::instance();
		
		$keyDup = $kd->quote_column('value');
		$valDup = $kd->quote($value);
		
		$dateTime = date('Y-m-d H:i:s');
		
		$keyUPDDup = $kd->quote_column('updated_at');
		$valUPDDup = $kd->quote($dateTime);
		
		$insert = DB::insert(self::$_table, array('code', 'value', 'created_at', 'updated_at'))
		->values(array($name, $value, $dateTime, $dateTime));
		
		// Выражение ON DUPLICATE KEY
		$on_duplicate = ' ON DUPLICATE KEY UPDATE '. $keyDup .'='. $valDup .', '. $keyUPDDup .'='. $valUPDDup;
		// Объединение строк и запуск запроса
		$insert_on_duplicate = DB::query(Database::INSERT, $insert.$on_duplicate)->execute();
		self::$_data[$name] = $value;
		self::$_data_empty = false;
	}
	
	public static function get($name){
		if (!self::$_data_loaded) self::load();
		return Arr::get(self::$_data, static::$_codePrefix . $name);
	}
	
	public static function getAll(){
		if (!self::$_data_loaded) self::load();
		
		if (!static::$_codePrefix) return self::$_data;
	
		$result = array();
		foreach (self::$_data as $key => $value){
			if (strpos($key, static::$_codePrefix) === 0){
				$result[$key] = $value;
			}
		}
		
		return $result;
	}
}