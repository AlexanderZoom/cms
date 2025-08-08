<?php defined('SYSPATH') or die('No direct script access.');
class Util_Loger {
    private $fileName = '';
    private $prefixLog = '';

    public function __construct($fileName, $prefixLog = ''){
        
        $logDir = dirname($fileName);
        if(!file_exists($logDir))
        {
            @mkdir($logDir, 0777, true);
            @chmod($logDir, 0777);
        }
        
        if (!file_exists($fileName)) @touch($fileName);

        if (is_writable($fileName))
        {
            @chmod($fileName, 0766);
        }
        else
        {
            throw new Exception("File is not writable {$fileName}\n");
        }

        $this->fileName = $fileName;
        $this->prefixLog = $prefixLog;
    }
    
    public function getFileName(){
        return $this->fileName;
    }

    public function write($str){
        $this->writeLog($str);
    }

    private function writeLog($str){
        $dateFormat = date("[Y-m-d H:i:s]");
        
        $prefixPart = '';
        if ($this->prefixLog)
        {
            $prefixPart = "{$this->prefixLog}\t";
        }
        
        $str = "{$dateFormat}\t{$prefixPart}{$str}\n";

        if (!$handle = fopen($this->fileName, 'a+'))
        {
            throw new Exception("Can not open file log: {$this->fileName}");
        }


        if (fwrite($handle, $str) === FALSE)
        {
            throw new Exception("Can not write to file log: {$this->fileName} \n");
        }

        fclose($handle);
    }
    
    
    public function cleanWrite($str){

        $this->cleanWriteLog($str);
    }
    
    private function cleanWriteLog($str){
        $str = "{$str}\n";

        if (!$handle = fopen($this->fileName, 'a+'))
        {
            throw new Exception("Can not open file log: {$this->fileName}");
        }


        if (fwrite($handle, $str) === FALSE)
        {
            throw new Exception("Can not write to file log: {$this->fileName} \n");
        }

        fclose($handle);
    }
}
?>