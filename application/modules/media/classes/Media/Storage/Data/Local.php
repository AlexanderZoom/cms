<?php defined('SYSPATH') OR die('No direct script access.');
class Media_Storage_Data_Local extends Media_Storage_Data {
    
    public function getRootPath(){
        return $this->_model->getPath();
    }
    
    public function getType(){
        return 'local';
    }
    
    protected function getFullFileName($relativeFile){
    	return $this->getRootPath() . DIRECTORY_SEPARATOR . $relativeFile;
    }
    
    public function isFileExist($relativeFile){
    	$res = file_exists($this->getFullFileName($relativeFile));
    	return $res;
    }
    
    public function setFileContent($relativeFile, $content){
    	$file = $this->getFullFileName($relativeFile);
    	
    	if (!$this->isFileExist($relativeFile)){
    		throw new Media_Storage_Exception_File('File not exist. File: ' . $file . ' DataCode: ' . $this->_model->code);
    	}
    	
    	$fp = fopen($file, 'wb');
    	
    	if (fwrite($fp, $content)  === FALSE){
    		throw new Media_Storage_Exception_File('Cant write content  File: ' . $file . ' DataCode: ' . $this->_model->code);
    	}
        	
    	fclose($fp);
    	
    }
    
	public function getFileContent($relativeFile, $isReturn = false, $start = null, $stop = null){
		$file = $this->getFullFileName($relativeFile);
		$res = null;
        if (!$this->isFileExist($relativeFile)){
            throw new Media_Storage_Exception_File('File not exist. File: ' . $file . ' DataCode: ' . $this->_model->code);
        }
    
        $length = $this->getFilesize($relativeFile);
        
    
        if ($fd = fopen($file, 'rb')) {
            if (!is_null($start)){
                fseek($fd, $start, SEEK_SET );
            }
    
    
            if (!is_null($stop)){
                $length = $stop - $start;
            }
    
            $defBufer = 1024;
            while($length){
                $bufer = $defBufer;
                if ($defBufer > $length) $bufer = $length;
                
                if ($isReturn) $res.= fread($fd, $bufer);
                else {
                	print fread($fd, $bufer);
                	flush(); ob_flush();
                }
                
                
                $length -= $bufer;
            }
            fclose($fd);
        }
        
        if ($isReturn) return $res;
    }
    
    public function getFilesize($relativeFile){
    	$file = $this->getFullFileName($relativeFile);
        if (!$this->isFileExist($relativeFile)){
            throw new Media_Storage_Exception_Data('File not exist. File: ' . $file . ' Data: ' . $this->_model->code);
        }
    
        return filesize($file);
    }
    
    public function getFileETag($relativeFile){
    	$file = $this->getFullFileName($relativeFile);
        if (!$this->isFileExist($relativeFile)){
            throw new Media_Storage_Exception_File('File not exist. File: ' . $file . ' Data: ' . $this->_model->code);
        }
    
        
    
        return sprintf('%x-%x-%x', fileinode($file), filesize($file), filemtime($file));
    }
    
    public function getFileLastModified($relativePathfile){
        if (!$this->isFileExist($relativePathfile)){
            throw new Media_Storage_Exception_File('File not exist. File: ' . $relativePathfile . ' Data: ' . $this->_model->code);
        }
    
        $file = $this->getFullFileName($relativePathfile);
    
        return gmdate('r', filemtime($file));
    }
    
    public function copyFile($from, $to){
    	if (!@copy($from, $to)) {
    		throw new Media_Storage_Exception_File('Can not copy file from ' . $from . ' to ' . $to);
    	}
    
    	return true;
    }
    
    public function moveFile($from, $to){
    	if (!@rename($from, $to)) {
    		throw new Media_Storage_Exception_File('Can not move file from ' . $from . ' to ' . $to);
    	}
    
    	return true;
    }
    
    public function deleteFile($file){
    	if (!@unlink($file)){
    		throw new Media_Storage_Exception_File('Can not delete file ' . $file);
    	}
    
    	return true;
    }
    
    
    /**
     * Upload file
     * @param unknown $fileInfo
     */
    public function uploadFile($fileInfo){
    
        $fileInfoDefault = array(
        'file' => null, // full path to the file on disk
        'name' => '',
        'category_code' => null, //if not token
        'path' => null
        );
        $fileInfo = array_merge($fileInfoDefault, $fileInfo);
         
        
        
        
        if (!is_readable($fileInfo['file'])){
            throw new Media_Storage_Exception_Data_UploadFile('File not exists or not readable ' . $fileInfo['file']);
        }
         
        $categoryCode = $fileInfo['category_code'];
        
        $fileName = $fileInfo['name'];
        $fileNameExt = '';
        if (preg_match('|([^/]*?)(\.(.{1,5}))?$|', $fileName, $match)){
            $fileNameExt = strtolower($match[3]);
        }
         
         
         
        $fileSize = filesize($fileInfo['file']);
         
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $fileMime = finfo_file($finfo, $fileInfo['file']);
        finfo_close($finfo);
                 
        $newFile = '';
        
        try {
            

            $path = $this->getRootPath();
            if (!file_exists($path)) $this->makeDir($path);
            $path = $this->lastDir($path);
            
            
            $fileName = $this->generateFileName($fileNameExt, $path, $this->getFileLength());
            $fileNameNew = $path . DIRECTORY_SEPARATOR . $fileName; 
            
            try {
            	$this->copyFile($fileInfo['file'], $fileNameNew);
            }
            catch (Exception $e){
            	$this->deleteFile($fileNameNew);
            	throw $e;
            }
            //////
            
            
             
            //check on dup
            $newFileTmp = str_replace($this->getRootPath(), '', $fileNameNew);
            $newFileTmp = explode('/',$newFileTmp);
            $newFileName = $newFileTmp[count($newFileTmp)-1];
            unset($newFileTmp[count($newFileTmp)-1]);
            if (!$newFileTmp[0]) unset($newFileTmp[0]);
            $newPath = implode('/', $newFileTmp);
             
            try {
                 
                $attempts = 8;
                while($attempts){
                    $attempts--;
                    try {
                        $model = ORM::factory('Media_Storage_File');
                        $model->data_code = $this->_model->code;
                        $model->category_code = $categoryCode;
                        $model->path_data = $newPath;
                        $model->path = $fileInfo['path'];
                        $model->file_name = $newFileName;
                        $model->file_extension = $fileNameExt;
                        $model->file_size = $fileSize;
                        $model->file_mime = $fileMime;
                        $model->name = $fileInfo['name'];
                        $model->type = Model_Media_Storage_File::FILE_TYPE_NORMAL;
                        $model->status = $fileInfo['file_status'];
                        $model->save();
                        
                        if (strpos($model->file_mime, 'image') !== FALSE){
                        	list($width, $height) = $this->getImageSize($model->path_data, $model->file_name);
                        	$model->extra->width = $width;
                        	$model->extra->height = $height;
                        	$model->extra->file_id = $model->pk();
                        	$model->extra->save();
                        	$this->createThumb($model->path_data, $model->file_name);
                        }
                        return $model;
                    }
                    catch (Database_Exception $e){
                        if($e->getCode() == 23000){
                            $fileName = explode('.', $fileName);
                            $fileName = $fileName[0] . '_' . rand(1, 1000) . '.' . $fileName[1];
                        }
                        else throw $e;
                    }
                     
                    if ($attempts < 1){
                        throw new Media_Storage_Exception_Data_UploadFile("Attempts for save file model excided");
                    }
                }
            }
            catch (Exception $e){
                $this->deleteFile($fileNameNew);
                throw $e;
            }
        }
        catch (Exception $e){
            throw $e;
        }
         
    }
    
    public function getFullPath($path){
    	return $path = $this->getRootPath() . $path;
    }
    
    public function countFiles($path){
    	$files = 0;
    	if ($handle = opendir($path)) {
    		while (false !== ($entry = readdir($handle))) {
    			if ($entry != "." && $entry != "..") {
    				if (is_file($path.DIRECTORY_SEPARATOR.$entry)) $files++;
    			}
    		}
    		closedir($handle);
    	}
    	else throw new Media_Storage_Exception_Data('Can not open dir ' . $path);
    
    	return $files;
    }
    
    protected function makeDir($name){
    	if ($name{0} != DIRECTORY_SEPARATOR){
    		$name = DIRECTORY_SEPARATOR . $name;
    		$dir = $this->getRootPath() . $name;
    	}
    	else $dir = $name;
    
    	if (!@mkdir($dir, 0777, true)){
    		throw new Media_Storage_Exception_Data_MakeDir("Directory not created {$dir}");
    	}
    
    	return true;
    }
    
    public function lastDir($path){
    	$dirs = $this->getDirNames($path);
    	$dirFirst = 0;
    	$dirFirstCount = count($dirs);
    	if ($dirFirstCount){
    		$dirFirst = $dirFirstCount - 1;
    	}
    	else $dirFirst = 0;
    
    	$pathFirst = $path . DIRECTORY_SEPARATOR . $dirFirst;
    	if (!file_exists($pathFirst)) $this->makeDir($pathFirst);
    
    	$dirs = $this->getDirNames($pathFirst);
    	$dirSecond = 0;
    	$dirSecondCount = count($dirs);
    	if ($dirSecondCount){
    		$dirSecond = $dirSecondCount -1;
    	}
    	else $dirSecondCount = 0;
    
    	$pathSecond = $pathFirst . DIRECTORY_SEPARATOR . $dirSecond;
    	if (!file_exists($pathSecond)) $this->makeDir($pathSecond);
    
    	$cntFiles = $this->countFiles($pathSecond);
    
    	if ($cntFiles >= $this->getFileMax()){
    		$dirSecond ++;
    		if ($dirSecond >= $this->getSubFolderMax()){
    			$dirSecond = 0;
    			$dirFirst ++;
    			if ($dirFirst >= $this->getFolderMax()){
    				throw new Media_Storage_Exception_Data_UploadPath("Data {$this->_model->code} excided by folders and files");
    			}
    			$pathFirst = $path . DIRECTORY_SEPARATOR . $dirFirst;
    			if (!file_exists($pathFirst)) $this->makeDir($pathFirst);
    		}
    		$pathSecond = $pathFirst . DIRECTORY_SEPARATOR . $dirSecond;
    		if (!file_exists($pathSecond)) $this->makeDir($pathSecond);
    	}
    
    	return $pathSecond;
    }
    
    protected function getDirNames($path){
    	$dirs = array();
    	if ($handle = opendir($path)) {
    		while (false !== ($entry = readdir($handle))) {
    			if ($entry != "." && $entry != "..") {
    				if (is_dir($path.DIRECTORY_SEPARATOR.$entry)) $dirs[] = $entry;
    			}
    		}
    		closedir($handle);
    	}
    	else throw new Media_Storage_Exception_Data_Directory('Can not open dir ' . $path);
    
    	return $dirs;
    }
    
    public function createThumb($relativePath, $name){
    	$img = Image::factory("{$this->getRootPath()}/{$relativePath}/{$name}");
    	$img->resize($this->getThumbWidth(), $this->getThumbHeight(), Image::AUTO);
    	$img->save("{$this->getRootPath()}/{$relativePath}/th_{$name}",80);
    }
    
    public function getImageSize($relativePath, $name){
    	$img = Image::factory("{$this->getRootPath()}/{$relativePath}/{$name}");
    	return array($img->width, $img->height);
    	
    }
    
    public function getThumbUrl($relativePath, $name){
    	$fullPath = "{$this->getRootPath()}/{$relativePath}/th_{$name}";
    	if (!file_exists($fullPath))$this->createThumb($relativePath, $name);
    	
    	return "{$this->getDownloadUrl()}/{$relativePath}/th_{$name}";
    } 
    
    public function getFileUrl($relativePath, $name){
    	return "{$this->getDownloadUrl()}/{$relativePath}/{$name}";
    }
    
    public function nginxSupportDownloadPath(){
    	return '';
    }
}