<?php defined('SYSPATH') or die('No direct script access.');
//Garbage coolector
class Task_Cron_Gc extends Task_Cron {
    
    protected $_options = array(
    // param name => default value
        'verbose'=> 0,
    );
    
    protected $_fileLog = 'gc.log';
    protected $_filePid = 'gc.pid';
    protected $_dirNamePidTime = 'gc';
    
    protected $_pidTimeOut = 3600;
    
    
    protected function _process(array $params){
    	foreach (Modules::getGarbageCollectorClasses() as $gcc){
    		if ($gcc::checkRun()){
    			try{
    				$gcc::Run(function($log){$this->_infoLog($log);});
    			}
    			catch (Exception $e){
    				$this->_warnLog($gcc . ': ' . $e->getCode(). ': ' .$e->getMessage() . ' Line: '. $e->getLine() . ' File:' . $e->getFile());
    			}
    		}	
    	}
    	
    }
    
    public function build_validation(Validation $validation)
    {
        return parent::build_validation($validation);
        
    }
    
   
}