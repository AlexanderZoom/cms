<?php defined('SYSPATH') OR die('No direct script access.');
class Admin_Notification {
	const TYPE_SYSTEM = 'system';
	const TYPE_APP    = 'application';
	
	const LEVEL_INFO = 'info';
	const LEVEL_WARNING = 'warning';
	const LEVEL_ERROR	= 'error';
	
	public static function add($params){
		$defParams = array(
			'type' => '',
			'level' => '',
			'name'  => '',
			'subject' => '',
			'message' => '',
			'group'   => null,
			'user'    => null		
		);
		
		$params = array_merge($defParams, $params);
		
		if (!in_array($params['type'], array(self::TYPE_APP, self::TYPE_SYSTEM))){
			throw new Admin_Exception('Admin_Notification:add type is incorrect');
		}
		
		if (!in_array($params['level'], array(self::LEVEL_ERROR, self::LEVEL_INFO, self::LEVEL_WARNING))){
			throw new Admin_Exception('Admin_Notification:add level is incorrect');
		}
		
		if (!$params['message']){
			throw new Admin_Exception('Admin_Notification:add message is empty');
		}
		
		if (!$params['group'] && $params['user']){
			throw new Admin_Exception('Admin_Notification:add group and user is empty');
		}
		
		$notifyModel = ORM::factory('Admin_Notification');
		$notifyModel->type = $params['type'];
		$notifyModel->level = $params['level'];
		$notifyModel->name = $params['name'];
		$notifyModel->subject = $params['subject'];
		$notifyModel->message = $params['message'];
		
		
		if ($params['group']){
			$notifyModel->gid = $params['group']->id;
		}
		
		if ($params['user']){
			$notifyModel->uid = $params['user']->id;
		}
		
		
		$notifyModel->save();
	}
	
	public static function get($params){
		$defParams = array(
				'limit' => 1000,
				'offset' => 0,
				'user'	=> null,
				'all'	=> false,
				'count' => false,
		);
		
		$params = array_merge($defParams, $params);
		
		if (!$params['user'] || !($params['user'] instanceof Model_Admin_User) || !$params['user']->loaded()){
			throw new Admin_Exception('Admin_Notification:get user is empty');
		}
		
		$count = $params['count'];
		$all  = $params['all'];
		$user = $params['user'];
		$limit = $params['limit'];
		$offset = $params['offset'];
		$groups = $user->groups->find_all();
		$groupsId = array();
		foreach ($groups as $group){
			$groupsId[] = $group->id;
		}
		
		if (!count($groupsId)){
			throw new Admin_Exception('Admin_Notification:get user group arr is empty');
		}
		
		$notifyModel = ORM::factory('Admin_Notification');
		$notifyModelTbl = $notifyModel->table_name();		
		
		$notifyModelVisit = ORM::factory('Admin_Notification_Visit');
		$notifyModelVisitTbl = $notifyModelVisit->table_name();
		
		
		
		$query = DB::select("{$notifyModelTbl}.*", "{$notifyModelVisitTbl}.visit"); 
		
		if ($count) $query = DB::select(DB::expr("count(`{$notifyModelTbl}`.`id`) `cnt`")); 
		
		$query 
			 ->from($notifyModelTbl)
			->join($notifyModelVisitTbl, 'LEFT')
			->on("{$notifyModelTbl}.id", '=', "{$notifyModelVisitTbl}.nid")	
			->on("{$notifyModelVisitTbl}.uid", '=', DB::expr($user->id))					
			->where_open()
			->where("{$notifyModelTbl}.uid", '=', $user->id)
			->or_where("{$notifyModelTbl}.gid", 'in', $groupsId)			
			->where_close()
			
			
		;
		
		if (!$all) $query->and_where("{$notifyModelVisitTbl}.visit", '=', null);
		
		if(!$count){
			$query->order_by("{$notifyModelVisitTbl}.visit", 'asc');
			$query->order_by("{$notifyModelTbl}.created_at", 'desc');
			$query->limit($limit);
			if ($offset) $query->offset($offset);
		}
		
		$result = $query->as_assoc()->execute()->as_array();
		
		if ($count){
			return isset($result[0]['cnt']) ? $result[0]['cnt'] : 0;
		}
		
		return $result;		
	}
	
	public static function setVisit($ids, $user){
		foreach ($ids as $id){
			try{
				$notifyModelVisit = ORM::factory('Admin_Notification_Visit');
				$notifyModelVisit->nid = $id;
				$notifyModelVisit->uid = $user->id;
				$notifyModelVisit->visit = 1;
				$notifyModelVisit->save();
			}
			catch(Exception $e){
				;
			}
		}
	}
	
	public static function clean(){
		
		$currentTime = time();
		$notifyOldDays = 60;
		$limit = 1000;
		
		$notifyModel = ORM::factory('Admin_Notification');
		$notifyModelTbl = $notifyModel->table_name();
		
		$notifyModelVisit = ORM::factory('Admin_Notification_Visit');
		$notifyModelVisitTbl = $notifyModelVisit->table_name();
		
		//mktime ([ int $hour = date("H") [, int $minute = date("i") [, int $second = date("s") [, int $month = date("n") [, int $day = date("j") [, int $year = date("Y") [, int $is_dst = -1 ]]]]]]] )
		$oldNotificationTime = mktime(
				date("H", $currentTime),
				date("i", $currentTime),
				date("s", $currentTime),
				date("m", $currentTime),
				date("d", $currentTime) - $notifyOldDays,
				date("Y", $currentTime)
				);
		$oldNotificationDateTime = date('Y-m-d H:i:s', $oldNotificationTime);
		
		$totalRecords = 0;
		
		do {
			$records = array();
			$query = DB::select("{$notifyModelTbl}.id")
				->from($notifyModelTbl)
				-> where('created_at', '<', $oldNotificationDateTime)
				->limit($limit);
			$records = $query->as_assoc()->execute()->as_array();
			
			$ids = array();
			foreach ($records as $record){
				$ids[] = $record['id'];
			}
			
			if (count($ids)){
				DB::delete($notifyModelVisitTbl)->where('nid', 'in', $ids)->execute();
				DB::delete($notifyModelTbl)->where('id', 'in', $ids)->execute();
			}
			
			$totalRecords += count($records);
			
		} while(count($records) >0);
		
		
		return $totalRecords;
	}
}