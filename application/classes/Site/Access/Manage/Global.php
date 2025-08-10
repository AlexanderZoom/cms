<?php
class Site_Access_Manage_Global {
	
	protected static $factoryData  = array(); 
	
	public static function factory($class = '')
	{
		
		if (!$class || !class_exists($class)){
			$class = 'Site_Access_Manage_Global';
		}
	
		if (!isset(self::$factoryData[$class])) self::$factoryData[$class] = new $class();
		
		return self::$factoryData[$class];
	}
	
	protected $_modelNames = array();
	
	/**
	 * возвращаем (список прав, список инстанций, модель с установленными критериями фильтра)
	 * @param unknown $params array(
        	'user' => $options['user'],
        	'action' => $options['action'],
        	'controller' => $options['controller'],
        	'package' => $package,
        	'structure' => $structure,	
        	'instance' => array(),
        	'instance_manage' => isset($result['instance']) ? true : false,
        	'instance_inherit' => false,		
        	'rights_request' => $maskPattern,
        	'rights' => $mask,	
        	'rights_level' => $currentLevelRights,)
        	from Site_Auth_Access::_check
	 * @return multitype:multitype: unknown
	 */
	public function execute($params){
		//print_r($params);
		return $this->_execute($params);
	}
	
	protected function _execute($params){
		$result = array();
		$model = null;
		$action4OneCheck = array('edit', 'delete');
		
		
	    //rule for one instance
		if ($params['instance_current']){
			return $this->_checkOne($params['instance_current'], $params, $model);
		}
		
		if (in_array($params['action'], $action4OneCheck)){
			$id = !empty($_REQUEST['checked'][0]) ? $_REQUEST['checked'][0] : 0;
			if (isset($_REQUEST['checked']) && count($_REQUEST['checked']) == 1){
				return $this->_checkOne($id, $params, $model);
			}
		}
		
		if (in_array($params['controller'], array_keys($this->_modelNames))){
			$model = Orm::factory($this->_modelNames[$params['controller']]);
			$result = $this->_check4Select($params, $model);
		}
		else $result = array($params['rights'], array(), $model);		
		
		return $result;
	}
	
	
	protected function _checkOne($value, $params, $model = NULL){
		$result = array(Site_Access::ACCESS_NO, array(), null);
	
		if (count($params['instance'])){
			if (isset($params['instance'][$value])){
				$result[0] = $params['instance'][$value];
			}
			elseif ($params['instance_inherit'] && !isset($params['instance'][$value])){
				$result[0] = $params['rights'];
			}
			else ;
		}
		else{
			$result[0] = $params['rights'];
		}
	
	
		if ($model){
			if ($result[0] & $params['rights_request']){
				$model->where($model->primary_key(), '=', $value);
			}
			else {
				$model->set_stop_load_result_on();
			}
	
	
			$result[2] = $model;
		}
	
		return $result;
	}
	
	protected function _check4Select($params, $model){
		$result = array($params['rights'], array(), $model);
	
		if (!count($params['instance'])){
			if ($params['rights_request'] & $params['rights']){
				return $result;
			}
			else{
				$model->set_stop_load_result_on();
				return $result;
			}
		}
	
		$instanceOk = array();
		$instanceNOk = array();
		foreach ($params['instance'] as $id => $val){
			if ($val & $params['rights_request']) $instanceOk[] = $id;
			else $instanceNOk[] = $id;
		}
	
		$arr = array_merge($instanceOk, $instanceNOk);
		if ($params['instance_inherit']){
			if ($params['rights_request'] & $params['rights']){
				$instanceOk = array();
			}
			else{
				if (!count($arr)) $model->set_stop_load_result_on();
			}
		}
		else {
			if (!count($instanceOk)){
				$model->set_stop_load_result_on();
				$instanceNOk = array();
			}
		}
			
		if (count($instanceOk)) $model->where($model->primary_key(), 'in', $instanceOk);
		if (count($instanceNOk)) $model->and_where($model->primary_key(), 'not in', $instanceNOk);
	
		return $result;
	}
}