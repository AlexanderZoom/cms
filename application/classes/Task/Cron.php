<?php defined('SYSPATH') or die('No direct script access.');
abstract class Task_Cron extends Minion_Task {
    protected $_options = array(
    // param name => default value
        'verbose'=> 0,
    );
    
    protected $_fileLog;
    protected $_filePid;
    protected $_dirNamePidTime;
    protected $_pidTimeOut = 600;
    protected $_verbose = false;
    protected $_notificator = 'Admin_Notification';
    
    private $_groupAdmin = null;
    
    /**
     * @var Util_Loger
     */
    protected $_loger;
    
    protected function _execute(array $params)
    {
        $pidClass = 0;
        try {
            $verbose = (bool) Arr::get($params, 'verbose');
            $this->_verbose = $verbose;
             
            $dirLog = Kohana::$config->load('main.cron_logs');
            if ($dirLog && file_exists($dirLog)){
                if ($this->_fileLog){
                    $this->_loger = new Util_Loger($dirLog . DIRECTORY_SEPARATOR . $this->_fileLog);
                }
                else $this->_warnLog('File log not defined');
            }
            else $this->_warnLog('Dir log not defined or not exist');
            
            $dirPid = Kohana::$config->load('main.cron_pid');
            $dirTime = Kohana::$config->load('main.cron_time');
            if ($dirPid && file_exists($dirPid)){
                if (!$dirTime || !file_exists($dirTime)) throw new Exception('dir time not defined or not exist');
                if (!$this->_filePid) throw new Exception('pid file not defined');
                if (!$this->_dirNamePidTime) throw new Exception('dir name pid time not defined');
                
                $options = array(
                'file_pid' => $dirPid . DIRECTORY_SEPARATOR . $this->_filePid,
                'time_dir' => $dirTime . DIRECTORY_SEPARATOR . $this->_dirNamePidTime,
                'timeout' => $this->_pidTimeOut,
                );
                
                $pidClass = new Util_PidFile($options);
                $pidClass->check();
            }
            else throw new Exception('Dir pid not defined or not exist');
            
            $this->_infoLog('START PROCESS');
            $this->_process($params);
            $this->_infoLog('STOP PROCESS');
            $pidClass->deleteTimeFile();
        }
        catch (Exception $e){
            $message = get_class($e) . " #{$e->getCode()}: {$e->getMessage()} {$e->getFile()}:{$e->getLine()}";
            if ($pidClass && !($e instanceof Util_PidFile_Exception)) $pidClass->deleteTimeFile();
            
            if($e instanceof Util_PidFile_Exception_Runing) ;
            else $this->_errorLog($message);
        }
        
    }
    
    abstract protected function _process(array $params);
    
    public function writeLog($log){
        if ($this->_verbose) Minion_CLI::write($log);
        if ($this->_loger) $this->_loger->write($log);
    }
    
    protected function _infoLog($log){
        $this->writeLog("INFO:\t" . $log);
    }
    
    protected function _warnLog($log){
        $this->writeLog("WARNING:\t" . $log);
        
        if ($this->_notificator){
        	try{
        		
        		$group = $this->_getGroupAdmin();
        		$params = array(
        			'type' => Admin_Notification::TYPE_SYSTEM,
        			'level' => Admin_Notification::LEVEL_WARNING,	
        			'message' => get_class($this).' ' . $log,
        			'group'   => $group,
        		); 
        		
        		Admin_Notification::add($params);
        	}
        	catch (Exception $e){
        		$this->writeLog("WARNING:\t" . $e->getMessage());
        	}	
        }
        
    }
    
    protected function _errorLog($log){
        $this->writeLog("ERROR:\t" . $log);
        
        if ($this->_notificator){
        	try{
        
        		$group = $this->_getGroupAdmin();
        		$params = array(
        				'type' => Admin_Notification::TYPE_SYSTEM,
        				'level' => Admin_Notification::LEVEL_ERROR,
        				'message' => get_class($this).' ' . $log,
        				'group'   => $group,
        		);
        		
        		Admin_Notification::add($params);
        	}
        	catch (Exception $e){
        		$this->writeLog("WARNING:\t" . $e->getMessage());
        	}
        }
        exit();
    }
    
    private function _getGroupAdmin() {
    	if ($this->_groupAdmin){
    		return $this->_groupAdmin;	
    	}
    	
    	$this->_groupAdmin = ORM::factory('Admin_Group')->where('code', '=', 'admin')->find();
    	if (!$this->_groupAdmin->loaded()) throw new Admin_Exception('Group admin not found');
    	
    	return $this->_groupAdmin;
    	
    }
        
}