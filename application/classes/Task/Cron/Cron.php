<?php defined('SYSPATH') or die('No direct script access.');
class Task_Cron_Cron extends Task_Cron {
    
    protected $_options = array(
    // param name => default value
        'verbose'=> 0,
        
    );
    
    protected $_fileLog = 'cron.log';
    protected $_filePid = 'cron.pid';
    protected $_dirNamePidTime = 'cron';
    
    protected $_pidTimeOut = 43200;
    
    protected $_refreshCronTaskSec = 60;    
    protected $_fields = array('minute', 'hour', 'mday', 'month', 'wday');
    
    protected function _process(array $params){
    	
    	while(date("s", time()) > 5){
    		sleep(1);
    	}
    	
    	$minion = dirname(__FILE__). DIRECTORY_SEPARATOR . '..' .DIRECTORY_SEPARATOR . 'minion'; 
    	
    	$refreshTimeCronTask = 0;
    	$startTime = time();
    	$crons = array();
    	while(1){
    		$currentTime = time();
    		
    		if ($currentTime - $refreshTimeCronTask > $this->_refreshCronTaskSec){
    			$refreshTimeCronTask = $currentTime;
    			$crons = array();
    			
    			$models = ORM::factory('Admin_Cron')->find_all();
    			foreach ($models as $model){
    				try {
    					$crons[] = $this->_parseCronTask($model);
    				}
    				catch (Exception $ex){
    					$this->_warnLog($ex->getMessage());
    				}
    			}
    			
    		}
    		
    		foreach ($crons as $cron){
    			if ($this->_checkStart($cron, $currentTime)){
    				$command = $cron['command'];
    				
    				if ($command{0} == '/'){
    					$fullCommand =  "{$command}". ' > /dev/null 2>&1 &';
    					exec($fullCommand);
    				}
    				else {
    					$fullCommand =  "$minion cron:{$command}" .' > /dev/null 2>&1 &';
    					exec($fullCommand);
    				}
    				
    				$model = $cron['model'];
    				$model->refreshStartedAt();
    				$model->save();
    			}
    		}
    		
    		sleep(60);
    	}
    }
    
    public function build_validation(Validation $validation)
    {
        return parent::build_validation($validation);
        
    }
    
    protected function _parseCronTask($model){
    	$result = array();
    	if (!$model->loaded()) throw new Kohana_Exception('Model CronTask not loaded');
    	
    	foreach ($this->_fields as $field){
    		$result[$field] = $this->_parseCronTaskCell($model->$field);
    		if (!count($result[$field])) throw new Kohana_Exception("Model CronTask id {$model->id} field {$field} incorrect value {$model->$field}");
    	}
    	
    	$result['command'] = $model->command;
    	$result['model'] = $model;
    	
    	return $result;
    }
    
    protected function _parseCronTaskCell($value){
    	$result = array();
    	$value = str_replace(' ', '', $value);
    	$values = explode(',', $value);
    	
    	foreach ($values as $val){
    		if (!$val) continue;
    		
    		if ($val == '*') $result[] = $val;
    		elseif (preg_match("/^\d{1,2}-\d{1,2}$/", $val)) $result[] = $val;
    		elseif (preg_match("/^\*\/\d{1,2}$/", $val))  $result[] = $val;
    		elseif (preg_match("/^\d{1,2}$/", $val))  $result[] = $val;
    		else ;
    		
    	}
    	
    	return $result;
    }
    
    protected function _checkStart($cronTask, $time){
    	$started = 1;
    	$success = 0;
    	
    	$dateTimeModif = array('minute' => 'i', 'hour' => 'G', 'mday' => 'j', 'month' => 'n', 'wday' => 'N');
    	foreach ($this->_fields as $field){
    		$data = $cronTask[$field];
    		$cval = date($dateTimeModif[$field], $time);
    		foreach ($data as $val){
    			if ($val == '*'){
    				//$this->_infoLog("{$cronTask['command']} $field $val $cval");
    				$success++;
    				break;
    			}
    			elseif (preg_match("/^(\d{1,2})-(\d{1,2})$/", $val, $matches)){
    				if ($cval >= $matches[1] && $cval <= $matches[2]){
    					//$this->_infoLog("{$cronTask['command']} $field $val $cval" . print_r($matches, true));
    					$success++;
    					break;
    				}
    			}
    			elseif (preg_match("/^\*\/(\d{1,2})$/", $val, $matches)){
    				if (($cval % $matches[1]) == 0){
    					//$this->_infoLog("{$cronTask['command']} $field $val $cval" . print_r($matches, true));
    					$success++;
    					break;
    				}
    			}
    			elseif (preg_match("/^\d{1,2}$/", $val)){
    				if ($cval == $val){
    					//$this->_infoLog("{$cronTask['command']} $field $val $cval");
    					$success++;
    					break;
    				}
    			}
    			else ;
    		}
    	}
    	
    	//$this->_infoLog("{$cronTask['command']} {$success} " . Date('Y-m-d H:i:s', $time));
    	if ($success == 5) return true;
    	
    	return false;
    } 
}