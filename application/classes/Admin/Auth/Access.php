<?php defined('SYSPATH') OR die('No direct script access.');
class Admin_Auth_Access {
    
	protected static $_instance;
	
	
	private function __construct() {
		
	}
	
	private function __clone() {
	
	}
	
	/**
	 * @return self
	 */
	public static function getInstance() {
		if (null === self::$_instance) {
			self::$_instance = new self();
		}
	
		return self::$_instance;
	}
	
    protected $_defaultOptions = array(
        'user' => null,
        'action' => null,
        'controller' => null,
    	'instance' => null,	
        );
    
    protected $_cacheRights = array();
    protected $_userGroupsId = array();
    protected $accessInfoByController = array();
    
    /**
     * Get access number
     * @param unknown $options
     * @return Admin_Auth_Result
     */
    public function check($options = array(), $maskPattern = Admin_Access::ACCESS_NO){
        $options = array_merge($this->_defaultOptions, $options);
        $result = $this->_check($options, $maskPattern);
        return $result;
    }
    
    protected function _check($options, $maskPattern){
    	
    	
        $mask = Admin_Access::ACCESS_NO;
        if (empty($options['user']) || !($options['user'] instanceof Model_Admin_User) ){
            return new Admin_Auth_Result($maskPattern ? ((bool) ($mask & $maskPattern)) : $mask);
        }
        
        if (empty($options['controller'])){
            return new Admin_Auth_Result($maskPattern ? ((bool) ($mask & $maskPattern)) : $mask);
        }
               
        $package = '';
        $structure = '';
        $manageClassName = '';
        $result = Admin_Access::getAccessListByController($options['controller']);
        
        if ($result){
        	$package = $result['package'];
        	$structure = $result['structure'];
        	if (!empty($result['class_manage'])) $manageClassName = $result['class_manage'];
        }
        
        $action = empty($options['action']) ? null : $options['action'];
        
        $priorityAclList = array('structure', 'package', 'global');
        $currentAcl = null;
        $currentLevelRights = '';
        
        //search package and structure by controller
        $rignts = $this->getRightsFromDB($options['user']);
        
        
        
        foreach ($priorityAclList as $priority){
        	switch ($priority){        		        			
        		case 'structure':
        			if ($structure && $package){	
        				$idxName = "{$package}%{$structure}";
        				if (isset($rignts['structure'][$idxName])) $currentAcl = $rignts['structure'][$idxName];
        			}	 
        		break;
        		
        		
        		case 'package':
        			if ($package){
        				$idxName = "{$package}";
        				if (isset($rignts['package'][$idxName])) $currentAcl = $rignts['package'][$idxName];
        			}
        		break;
        		
        		case 'global':
        			$currentAcl = $rignts['global'];
        		break;
        	}
        	
        	if (!is_null($currentAcl)){
        		$currentLevelRights = $priority;
        		$mask = $currentAcl;
        		break;
        	}
        }
        
        // admin mode
        $isAdmin = false;
        if ($options['user']->hasGroup('admin')){        	 
        	$mask = PHP_INT_MAX;    
        	$isAdmin = true;
        }
        
        
        $manageParams = array(
        	'user' => $options['user'],
        	'action' => $options['action'],
        	'controller' => $options['controller'],
        	'package' => $package,
        	'structure' => $structure,	
        	'instance' => array(),
        	'instance_current' => $options['instance'],
        	'instance_manage' => isset($result['instance']) ? true : false,
        	'instance_inherit' => false,		
        	'rights_request' => $maskPattern,
        	'rights' => $mask,	
        	'rights_level' => $currentLevelRights,
        	'is_admin' => $isAdmin,	
        			
        );
        
        $idxStructName = "{$package}%{$structure}";
        if (isset($rignts['structure_info'][$idxStructName]['instance_inherit'])){        	
        	$manageParams['instance_inherit'] = (bool) $rignts['structure_info'][$idxStructName]['instance_inherit'];
        }
        
        if ($options['user']->hasGroup('admin')){
        	$manageParams['instance_inherit'] = true;
        }
        
        if (count($rignts['instance'])){
        	foreach ($rignts['instance'] as $iIdx => $iData){
        		if (strstr($iIdx, "{$package}%{$structure}%")){
        			$lstIdx = explode('%', $iIdx);
        			
        			$manageParams['instance'][$lstIdx[count($lstIdx)-1]] = $iData;
        		}
        	}
        }
        
        
        $instances = array();
        
        $manageClass = Admin_Access_Manage_Global::factory($manageClassName);
        list($result, $instances, $queryRights) = $manageClass->execute($manageParams);

        
        if ($maskPattern) $result = (bool) ($result & $maskPattern);
        
        
        $result = new Admin_Auth_Result($result, $manageClass, $instances);
        $result->manageParams = $manageParams;
        $result->queryRights = $queryRights;
        
        
        
        return $result;
    }
    
    
    /**
     *
     * @param Controller_Admin $controller
     * @return Admin_Auth_Access
     */
    static public function findByController(Controller_Admin $controller){
    	throw new Admin_Exception_Access("NA");
        $name = str_replace('Controller_Admin_', '', get_class($controller));
        return self::_getAccessByControllerName($name);
    }
    
    /**
     *
     * @param unknown $uri
     * @throws Admin_Exception_Access
     * @return Admin_Auth_Access
     */
    static public function findByUri($uri){
    	throw new Admin_Exception_Access("NA");
        $request = new Request($uri);
        $params = array();
        foreach (Route::all() as $name => $route)
        {
            // We found something suitable
            if ($params = $route->matches($request))
            {
                $params =  array(
                'params' => $params,
                'route' => $route,
                );
                
                break;
            }
        }
        
        if (!empty($params['params']['controller'])){
             return $this;
        }
        
        throw new Admin_Exception_Access("Control Access not found by uri {$uri}");
        
    }
    
    protected function getRightsFromDB(Model_Admin_User $user){
                
        $cacheRightsIndex = $user->id ;
        if (!empty($this->_cacheRights[$cacheRightsIndex])) return $this->_cacheRights[$cacheRightsIndex];
        
        $table = 'admin_group_access';
        
        $groupsId = $user->getGroupsId();
                
        $rights = array(
        		'global' => 0, //n\a
        		'package' => array(), //n\a
        		'structure' => array(),
        		'instance' => array(),
        		'structure_info' => array(),
        );
        
        if (!count($groupsId)) return $rights;
        
        $query = DB::select('*')->from($table)->where('group_id', 'IN', $groupsId); 
        $rows = DB::query ( Database::SELECT, $query )->as_assoc()->execute()->as_array();
        
        $rowsInstance = array();
        $structInvertInstance = array();
        
        
        foreach ($rows as $row){
        	if ($row['package'] =='_GLOBAL_'){
        		//global
        		$curDbRights = $row['rights'];
        		
        		if ($row['except']){
        			$curDbRights = self::invertAccessRights($curDbRights, '_GLOBAL_');
        		}
        		
        		$rights['global'] |= $curDbRights;
        	}
        	elseif (!empty($row['package']) && empty($row['structure']) && empty($row['instance'])){
        		//any package
        		$curDbRights = $row['rights'];
        		
        		if ($row['except']){
        			$curDbRights = self::invertAccessRights($curDbRights, $row['package']);
        		}
        		
        		if(empty($rights['package'][$row['package']])) $rights['package'][$row['package']] = 0;
        		$rights['package'][$row['package']] |= $curDbRights;
        	}
        	elseif (!empty($row['package']) && !empty($row['structure']) && empty($row['instance'])){
        		//any structure
        		$curDbRights = $row['rights'];
        	
        		if ($row['except']){
        			$curDbRights = self::invertAccessRights($curDbRights, $row['package'], $row['structure']);
        		}
        	
        		$idxName = "{$row['package']}%{$row['structure']}";
        		if(empty($rights['structure'][$idxName])) $rights['structure'][$idxName] = 0;
        		$rights['structure'][$idxName] |= $curDbRights;
        		
        		if (empty($rights['structure_info'][$idxName])){
        			$rights['structure_info'][$idxName] = array(
        				'instance_inherit' => 0,        				
        			);
        		}
        		
        		$structInvertInstance["{$row['group_id']}%{$row['package']}%{$row['structure']}"] = $row['instance_invert'];
        		
        		$rights['structure_info'][$idxName]['instance_inherit'] |= $row['instance_inherit'];        		
        	}
        	else {
        		//any instance
        		$rowsInstance[] = $row;
        		
        		
        	}
        }
        
        foreach ($rowsInstance as $row){
        	$curDbRights = $row['rights'];

        	$invertIdx = "{$row['group_id']}%{$row['package']}%{$row['structure']}";
        	if (isset($structInvertInstance[$invertIdx]) && $structInvertInstance[$invertIdx]){
        		$curDbRights = self::invertAccessRights($curDbRights, $row['package'], $row['structure'], $row['instance']);
        	}
        	 
        	$idxName = "{$row['package']}%{$row['structure']}%{$row['instance']}";
        	if(empty($rights['instance'][$idxName])) $rights['instance'][$idxName] = 0;
        	$rights['instance'][$idxName] |= $curDbRights;
        }

        //print_r($rights);
        
        $this->_cacheRights[$cacheRightsIndex] = $rights;
        
        return $this->_cacheRights[$cacheRightsIndex];
    }
    
    protected static function invertAccessRights($rights, $pakage, $structure='', $instance=''){
    	$acl = Admin_Access::getAccessByParams($pakage, $structure, $instance);
    	$aclTmpRights = 0;
    	 
    	if (!empty($acl['rights']))
    	foreach ($acl['rights'] as $right) $aclTmpRights |= $right;
    	 
    	$curDbRights = $aclTmpRights ^ $rights;
    	
    	return $curDbRights;
    }
}