<?php defined('SYSPATH') or die('No direct script access.');
class Util_Crawler_Cache {
    protected $_cacheDir;
    protected $maxSubFolders = 1024;
    protected $maxFiles = 1024;
    protected $lengthFileName = 15;
    
    public function __construct($dir){
        if (!is_readable($dir)) throw new Util_Crawler_Exception('Dir cache is not readable');
        if (!is_writable($dir)) throw new Util_Crawler_Exception('Dir cache is not writable');
        
        $this->_cacheDir = $dir;
    }
    
    public function clear(){
        self::DeleteDir($this->_cacheDir);
        mkdir($this->_cacheDir, 0777);
    }
    
    public function add($data, $file=''){
        $fileName = '';
        if ($file && is_writable($this->_cacheDir . DIRECTORY_SEPARATOR . $file)){
            $fileName = $this->_cacheDir . DIRECTORY_SEPARATOR . $file;
        }
        else{
            $path = $this->getPath();
            $name = $this->generateFileName('txt', $this->_cacheDir . DIRECTORY_SEPARATOR . $path, $this->lengthFileName);
            $file = $path . DIRECTORY_SEPARATOR . $name;
            $fileName = $this->_cacheDir . DIRECTORY_SEPARATOR . $file;
        }
        
        if ($fileName){
            $handle = fopen($fileName, "w");
            if (!$handle) throw new Util_Crawler_Exception('Can not open file ' . $fileName);
            $fwrite = fwrite($handle, $data);
            fclose($handle);
            
            if ($fwrite === false) {
                return '';
            }
            
            return $file;
        }

        return '';
    }
    
    public function get($file){
        $filename = $this->_cacheDir . DIRECTORY_SEPARATOR . $file;
        if (is_readable($filename)){
            $handle = fopen($filename, "r");
            $contents = fread($handle, filesize($filename));
            fclose($handle);
            
            return $contents;
        }
        
        return '';
    }
    
    public function delete($file){
        $filename = $this->_cacheDir . DIRECTORY_SEPARATOR . $file;
        if (is_writable($filename)){
            if (unlink($filename)) return true;
            else throw new Util_Crawler_Exception('Can not delete file ' . $fileName);
        }
        else throw new Util_Crawler_Exception('File is not writable ' . $fileName);
    }
    
    protected function getPath(){
        $pathOut = '';
        $dirs = $this->countFiles($this->_cacheDir);
        $dirFirst = 0;
        $dirFirstCount = count($dirs);
        if ($dirFirstCount){
            $dirFirst = $dirFirstCount - 1;
        }
        else $dirFirst = 0;
        
        $pathFirst = $this->_cacheDir . DIRECTORY_SEPARATOR . $dirFirst;
        if (!file_exists($pathFirst)) mkdir($pathFirst, 0777);
        
        $dirs = $this->countFiles($pathFirst);
        $dirSecond = 0;
        $dirSecondCount = count($dirs);
        if ($dirSecondCount){
            $dirSecond = $dirSecondCount -1;
        }
        else $dirSecondCount = 0;
        
        $pathSecond = $pathFirst . DIRECTORY_SEPARATOR . $dirSecond;
        if (!file_exists($pathSecond)) mkdir($pathSecond, 0777);
        
        $cntFiles = $this->countFiles($pathSecond);
        
        if ($cntFiles >= $this->maxFiles){
            $dirSecond ++;
            if ($dirSecond >= $this->maxSubFolders){
                $dirSecond = 0;
                $dirFirst ++;
                
                $pathFirst = $this->_cacheDir . DIRECTORY_SEPARATOR . $dirFirst;
                if (!file_exists($pathFirst)) mkdir($pathFirst, 0777);
            }
            $pathSecond = $pathFirst . DIRECTORY_SEPARATOR . $dirSecond;
            if (!file_exists($pathSecond)) mkdir($pathSecond, 0777);
        }
        
        $pathOut = $dirFirst . DIRECTORY_SEPARATOR . $dirSecond;
        
        return $pathOut;
    }
    
    protected function countFiles($path){
        $files = 0;
        if ($handle = opendir($path)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    $files++;
                }
            }
            closedir($handle);
        }
        else throw new Util_Crawler_Exception('Can not open dir ' . $path);
    
        return $files;
    }
    
    protected function generateFileName($extension, $path, $length){
        $attempts = 7;
        while ($attempts--){
            $fileName = $this->generateName($length) . '.' . $extension;
            $fullFilename = $path . DIRECTORY_SEPARATOR . $fileName;
            if (!file_exists($fullFilename)) return $fileName;
        }
    
        throw new Util_Crawler_Exception('Can not generate file name');
    }
    
    protected function generateName($length){
        return Util_Crawler_Tool::generateName($length);
    }
    
    
    
    
    static public function DeleteDir($path){
        return Util_Crawler_Tool::DeleteDir($path);
    }
}