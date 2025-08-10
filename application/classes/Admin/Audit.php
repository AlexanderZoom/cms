<?php defined('SYSPATH') OR die('No direct script access.');
class Admin_Audit {
	
	const TYPE_LOGIN = 'login';
	const TYPE_ADD = 'add';
	const TYPE_EDIT = 'edit';
	const TYPE_DELETE = 'delete';
	const TYPE_SEND = 'send';
	
	
	public static function add($type, $message, Model_Admin_User $user){
		
		$model = ORM::factory('Admin_Audit');
		$model->type = $type;
		$model->message = $message;
		$model->user = $user->login;
		$model->save();
	}
	
	public static function get($params){
		$defParams = array(
				'limit' => 1000,
				'offset' => 0,								
				'count' => false,
		);
		
		$params = array_merge($defParams, $params);
		
		$count = $params['count'];
		$limit = $params['limit'];
		$offset = $params['offset'];
		
		$modelAudit = ORM::factory('Admin_Audit');
		$modelAuditTbl = $modelAudit->table_name();
		
		$query = DB::select("{$modelAuditTbl}.*");
		
		if ($count) $query = DB::select(DB::expr("count(`{$modelAuditTbl}`.`id`) `cnt`"));
		
		$query
		->from($modelAuditTbl);
		
		if(!$count){
			
			$query->order_by("{$modelAuditTbl}.created_at", 'desc');
			$query->limit($limit);
			if ($offset) $query->offset($offset);
		}
		
		$result = $query->as_assoc()->execute()->as_array();
		
		if ($count){
			return isset($result[0]['cnt']) ? $result[0]['cnt'] : 0;
		}
		
		return $result;
	}
}