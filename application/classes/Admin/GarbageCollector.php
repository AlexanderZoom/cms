<?php defined('SYSPATH') OR die('No direct script access.');
class Admin_GarbageCollector implements IGarbageCollector {
	public static function checkRun(){
		if (date('N') == 7 && date('H') > 20) return true;
		return false;
	}
	
	public static function Run($log){
		
		//clean notifications
		$totalRecords = Admin_Notification::clean();
		$log("Notification cleaning records: {$totalRecords}");
	}
}