<?php defined('SYSPATH') or die('No direct script access.');
//Rotate logs
class Task_Cron_Rotatelog extends Task_Cron {
    
    protected $_options = array(
    // param name => default value
        'verbose'=> 0,
    );
    
    protected $_fileLog = 'rotatelog.log';
    protected $_filePid = 'rotatelog.pid';
    protected $_dirNamePidTime = 'rotatelog';
    
    protected $_pidTimeOut = 3600;
    
    protected $_fileSizeMax;
    
    protected function _process(array $params){
    	$this->_fileSizeMax = 10 * pow(1024, 2);
    	
    	$cmd = array(
    			'tar' => '',		
    	);
    	
    	foreach (array_keys($cmd) as $item){
    		$output = array();
    		exec('which ' . $item, $output);
    		if (count($output) && !empty($output[0])) $cmd[$item] = trim($output[0]);
    	}
    	
    	foreach($cmd as $k =>$v){
    		if (!$v) $this->_errorLog('cmd utility ' . $k . ' not found');
    	}
    	
    	$cron_logs = Kohana::$config->load('main.cron_logs');
    	
    	if (!file_exists($cron_logs)){
    		$this->_errorLog('directory cron log ' . $cron_logs . ' not exists');
    	}
    	
    	if ($handle = opendir($cron_logs)) {
    		while (false !== ($entry = readdir($handle))) {
    			if ($entry != "." && $entry != "..") {
    				$fileCurrent = $cron_logs . DIRECTORY_SEPARATOR . $entry;
    				
    				if(is_dir($fileCurrent)) continue;
    				
    				if (filesize($fileCurrent) < $this->_fileSizeMax) continue;
    				
    				$path_parts = pathinfo($fileCurrent);
    				if (!empty($path_parts['extension']) && strtolower($path_parts['extension']) == 'log'){
    				
	    				$fileTmp = $cron_logs . DIRECTORY_SEPARATOR . $entry . '.1';
	    				$fileTmpTarGz = $entry . '.1';
	    				$fileTarGz = $fileTmpTarGz. '.tar.gz';
	    				
	    				if (file_exists($fileTmp)) unlink($fileTmp);
	    				if (file_exists($fileTarGz)) unlink($fileTarGz);
	    				
	    				if (copy($fileCurrent, $fileTmp)){
	    					$fp = fopen($fileCurrent, "r+");
	    					ftruncate($fp, 0);
	    					fclose($fp);
	    					
	    					$execPack = "cd {$cron_logs} && {$cmd['tar']} -czvf {$fileTarGz} {$fileTmpTarGz}";
	    					$this->_infoLog($execPack);
	    					exec($execPack);
	    					unlink($fileTmp);
	    				}
    				}
    			}
    		}
    		closedir($handle);
    	}
    	

    }
    
    public function build_validation(Validation $validation)
    {
        return parent::build_validation($validation);
        
    }
    
   
}