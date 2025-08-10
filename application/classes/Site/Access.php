<?php defined('SYSPATH') OR die('No direct script access.');
class Site_Access {
	const ACCESS_NO        = 0;
	const ACCESS_VIEW      = 0x1;
	const ACCESS_CREATE    = 0x2;
	const ACCESS_MODIFY    = 0x4;
	const ACCESS_DELETE    = 0x8;
	
	const ACCESS_VIEWAUTH = 0x20;
	const ACCESS_MODERATOR = 0x40;
	const ACCESS_RESERVED3 = 0x80;
	const ACCESS_RESERVED4 = 0x100;
	
	protected static $tblGroupAccess = 'site_group_access';
	protected static $cacheListAccess = array();
	protected static $cacheListAccessByController = array();
	
	protected static $delimAccessIdx = '%';
	protected static $emptyWordAccess = 'EMPTY';
	
	public static function getAccessClasses(){
		return Modules::getSiteAccessClasses();
	}
	
	public static function getGroupAccess($id){
		$query = DB::select('*')->from(self::$tblGroupAccess)->where('group_id', '=', $id);
		$rows = DB::query ( Database::SELECT, $query )->as_assoc()->execute()->as_array();
		
		return $rows;
	}
	
	public static function  setGroupAccessRight($groupId, $accessList){
		
		$date = date('Y-m-d H:i:s', time());
		$cols = array('group_id', 'package', 'structure', 'instance', 'rights', 'except', 'created_at', 'updated_at', 'instance_inherit', 'instance_invert');
		foreach ($accessList as $data){
			$vals = array($groupId, $data['package'], $data['structure'], 
						  $data['instance'], $data['rights'], $data['except'], 
						  $date, $date, $data['instance_inherit'], $data['instance_invert']);
			DB::insert(self::$tblGroupAccess)->columns($cols)->values($vals)->execute();
			
		}
	}
	
	public static function deleteGroupAccessRight($groupId, $package = '', $structure = '', $instance = ''){
		$q = DB::delete(self::$tblGroupAccess)->where('group_id', '=', $groupId);
		
		if ($package) $q->and_where('package', '=', $package);
		if ($structure) $q->and_where('structure', '=', $structure);
		if ($instance){
			if ($instance == 'EMPTY') $q->and_where('instance','=', '');
			else $q->and_where('instance', is_array($instance) ? 'in' :'=', $instance);
		}
		
		$q->execute();
		
	}
	
	public static function getGroupAccessInstance($group, $package, $structure, $instance = ''){
		$query = DB::select('*')->
		from(self::$tblGroupAccess)->
		where('group_id', '=', $group)->
		and_where('package', '=', $package)->
		and_where('structure', '=', $structure);
		if ($instance) $query->and_where('instance', is_array($instance) ? 'in' : '=', $instance);
		
	
		$rows = DB::query ( Database::SELECT, $query )->as_assoc()->execute()->as_array();
	
		return $rows;
	}
	
	
	
	
	public static function getListAccess(){
		if (count(self::$cacheListAccess)) return self::$cacheListAccess;
		
		$delim = self::$delimAccessIdx;
		$emptyWord = self::$emptyWordAccess; 
		
		$listAccessClasses = Modules::getSiteAccessClasses();
		$listAccessData = array();
		foreach ($listAccessClasses as $accessClass){
			$package = $accessClass::$package;
			$rights = $accessClass::$rights;
			$classManage = $accessClass::$manage;
			$structure = $emptyWord;
			$instance = $emptyWord;
			 
			$idx = "{$package}{$delim}{$structure}{$delim}{$instance}";
			$listAccessData[$idx] = array(
					'rights' => $rights,
					'structure' => '',
					'instance'  => '',
					'package'   => $package,
					'class'     => $accessClass,
					'class_manage' => $classManage,
			);
			 
			foreach ($accessClass::$structure as $structName => $structData){
		
				$rights = $structData['rights'];
				$structure = $structName;
				$instance = $emptyWord;
				 
				$idx = "{$package}{$delim}{$structure}{$delim}{$instance}";
				$listAccessData[$idx] = array(
						'rights' => $rights,
						'structure' => $structure,
						'instance'  => !empty($structData['instance']) ? $structData['instance'] : '',
						'package'   => $package,
						'class'     => $accessClass,
						'class_manage' => $classManage,
				);
				
				foreach ($structData['controller'] as $ctrlName){
					self::$cacheListAccessByController[$ctrlName] = $idx;
				}
				
				
			}
		}
		
		self::$cacheListAccess = $listAccessData;
		return $listAccessData;
	}
	
	public static function getAccessByParams($package, $structure = '', $instance = '' ){
		$delim = self::$delimAccessIdx;
		$emptyWord = self::$emptyWordAccess;
		$isInstance = $instance ? true : false;
		$instance = '';
		
		$acl = self::getListAccess($delim, $emptyWord);
		
		$structure = empty($structure) ? $emptyWord : $structure;
		$instance = empty($instance) ? $emptyWord : $instance;
		
		$idx = "{$package}{$delim}{$structure}{$delim}{$instance}";
		if ($isInstance && !empty($acl[$idx]['instance'])){
			return $acl[$idx]['instance'];
		}
		elseif (!empty($acl[$idx])) return $acl[$idx];
		else;
	
		return null;
	}
	
	public static function getAccessListByController($ctrlName){
		$acl = self::getListAccess();
		
		if (isset(self::$cacheListAccessByController[$ctrlName])){
			return $acl[self::$cacheListAccessByController[$ctrlName]];
		}
		
		return null;
	}
}