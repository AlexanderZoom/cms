<?php defined('SYSPATH') OR die('No direct script access.');
class Media_Storage_Category {
	
	/**
	 * 
	 * @var Model_Media_Storage_Category
	 */
	protected $_model;
	
	/**
	 * 
	 * @param unknown $code
	 * @throws Exception
	 * @return Media_Storage_Category
	 */
	public static function findByCode($code){
		$model = Model::factory('Media_Storage_Category');
		$model = $model->findByCode($code);
			
	
		if (!$model) {
			throw new Media_Storage_Exception_Category_NotFound("Category storage for code {$code} not found");
		}
		
		return new Media_Storage_Category($model);			
		
	}
	
	public function __construct(Model_Media_Storage_Category $model){
		$this->_model = $model;
	}
	
	public function getFolder($path, $preview = true){
		$out = array();
		$model = new Model_Media_Storage_File();
		$models = $model->where('category_code', '=', $this->_model->code)
			  			->and_where('path', '=', $path)
			  			-> find_all();
		
		if (!$models && $path != '/'){
			list($pathNew, $name) = $this->_parsePath($path);
			
			$modelIn = new Model_Media_Storage_File();
			$modelIn = $modelIn->where('category_code', '=', $this->_model->code)
			  				   ->and_where('path', '=', $pathNew)
			  			       ->and_where('name', '=', $name)
			  			       -> find();
			if ($modelIn && $modelIn->type == Model_Media_Storage_File::FILE_TYPE_FOLDER) return $out;
			else throw new Media_Storage_Exception_Category_FolderNotFound();
		}
		else if (!$models && $path == '/') return $out;
		else {
			foreach ($models as $model){
				$isDir = ($model->type == Model_Media_Storage_File::FILE_TYPE_FOLDER);
				$cpath = $this->_assemblyPath($isDir,$model->path, $model->name);
				
				
				$previewPic = '';
				$created = $model->created_at;
				$updated = $model->updated_at;
				$filemtime = strtotime($model->updated_at);
				$width = null;
				$height = null;
				$filesize = null;
				$realPath = '';
				
				if ($isDir){	
					$previewPic = '/admin-content/images/fileicons/_Open.png';
				}
				else {
					$filesize = $model->file_size;
					$dataStorage = Media_Storage_Data::findByCode($model->data_code);
					$realPath = $dataStorage->getFileUrl($model->path_data, $model->file_name);
					if (strpos($model->file_mime, 'image') !== FALSE){
						$width = $model->extra->width;
						$height = $model->extra->height;
						if ($preview) $previewPic = $dataStorage->getThumbUrl($model->path_data, $model->file_name);
						else $previewPic = $dataStorage->getFileUrl($model->path_data, $model->file_name);
					}
					else {
						
						$previewPic = '/admin-content/images/fileicons/' . $model->file_extension . '.png';
						//$previewPic = $dataStorage->getFileUrl($model->path_data, $model->file_name);
					}
				}
				
				$ext = $model->file_extension;
				
				$out[$model->id] = array(
						'Path' 		=>  $cpath,
						'RealPath'  =>  $realPath,
						'Filename' 	=>  $model->name,
						'File Type' =>  $ext,
						'Protected'	=> 0,
						'Preview'	=> $previewPic,
						'Properties'=> array(
							'Date Created' 	=> $created,
							'Date Modified' => $updated,
							'filemtime' 	=> $filemtime,
							'Height' 		=> $height,
							'Width' 		=> $width,
							'Size' 			=> $filesize,
						),						
				);
			}
		}
		
		return $out;
	}
	
	public function addfolder($path, $name){
		$this->getFolder($path);
		$model = new Model_Media_Storage_File();
		$model->name = $name;
		$model->path = $path;
		$model->category_code = $this->_model->code;
		$model->data_code = '__DIR__';
		$model->path_data = $path . '__DIR__' . $model->category_code;
		$model->file_name = $name;
		$model->file_extension = 'dir';
		$model->file_size = 0;
		$model->file_mime = 'dir';
		$model->type = Model_Media_Storage_File::FILE_TYPE_FOLDER;
		$model->status = Model_Media_Storage_File::FILE_STATUS_OK;
		
		try {
			$model->save();
		}
		catch (Database_Exception $e){
			if($e->getCode() == 23000){
				throw new Media_Storage_Exception_Category_FolderExists();
			}
			else throw $e;
		}	
		
		return array('Parent' => $model->path, 'Name' => $model->name);
	}
	
	public function getinfo($path, $preview){
		list($pathNew, $name) = $this->_parsePath($path);
		
		
		$model = new Model_Media_Storage_File();
		$model =  $model->where('category_code', '=', $this->_model->code)
			  			->and_where('path', '=', $pathNew)
			  			->and_where('name', '=', $name)
			  			-> find();
		
		if (!$model->loaded()) throw new Media_Storage_Exception_Category_FileNotFound();
		
		$isDir = ($model->type == Model_Media_Storage_File::FILE_TYPE_FOLDER);
		$cpath = $this->_assemblyPath($isDir, $model->path, $model->name);
		
		$previewPic = '';
		$created = $model->created_at;
		$updated = $model->updated_at;
		$filemtime = strtotime($model->updated_at);
		$width = null;
		$height = null;
		$filesize = null;
		$realPath = '';
		$realSysPath = '';
		
		if ($isDir){			
			$previewPic = '/admin-content/images/fileicons/_Open.png';
		}
		else {
			$filesize = $model->file_size;
			$dataStorage = Media_Storage_Data::findByCode($model->data_code);
			$realPath = $dataStorage->getFileUrl($model->path_data, $model->file_name);
			$realSysPath = $dataStorage->getFullPath(DIRECTORY_SEPARATOR . $model->path_data . DIRECTORY_SEPARATOR . $model->file_name);
			
			if (strpos($model->file_mime, 'image') !== FALSE){
				$width = $model->extra->width;
				$height = $model->extra->height;
				if ($preview) $previewPic = $dataStorage->getThumbUrl($model->path_data, $model->file_name);
				else $previewPic = $dataStorage->getFileUrl($model->path_data, $model->file_name);
			}
			else {
				
				$previewPic = '/admin-content/images/fileicons/' . $model->file_extension . '.png';
				//$previewPic = $dataStorage->getFileUrl($model->path_data, $model->file_name);
			}
		}
		
		$ext = $model->file_extension;
		
		$out = array(
				'Path' 		=>  $cpath,
				'RealPath'  =>  $realPath,
				'RealSysPath' => $realSysPath,
				'Filename' 	=>  $model->name,
				'File Type' =>  $ext,
				'Protected'	=> 0,
				'Preview'	=> $previewPic,
				'Properties'=> array(
						'Date Created' 	=> $created,
						'Date Modified' => $updated,
						'filemtime' 	=> $filemtime,
						'Height' 		=> $height,
						'Width' 		=> $width,
						'Size' 			=> $filesize,
				),
		);

		return $out;
	}
	
	public function rename($path, $name){
		
		$oldPath = $path;
		$oldName = '';
		$newPath = '';
		$newName = $name;
		
		$isDir = $oldPath{count($oldPath) -1} == '/' ? true : false;
		
		list($pathNew, $oldName) = $this->_parsePath($path);
		$newPath = $this->_assemblyPath($isDir, $pathNew, $newName);
		
		
		$model = new Model_Media_Storage_File();
		$model =  $model->where('category_code', '=', $this->_model->code)
		->and_where('path', '=', $pathNew)
		->and_where('name', '=', $oldName)
		-> find();
		
		if (!$model->loaded()) throw new Media_Storage_Exception_Category_FileNotFound();
		
		
		if ($model->type == Model_Media_Storage_File::FILE_TYPE_FOLDER){
			$model->file_name = $name;
		}
		
		$model->name = $name;
		$model->save();
		
		$querySet = null;
		
		if ($model->type == Model_Media_Storage_File::FILE_TYPE_FOLDER){

			$querySet = array(
					'path' 		=> DB::expr("REPLACE(`path`, '{$oldPath}', '{$newPath}')"),
					'path_data' => DB::expr("REPLACE(`path_data`, '{$oldPath}', '{$newPath}')")
			);
			
			
		}
		else {
			$querySet = array(
					'path' 		=> DB::expr("REPLACE(`path`, '{$oldPath}', '{$newPath}')"),					
			);
		}
		
		
		$query = DB::update($model->table_name())
		->set($querySet)
		->where('category_code', '=', $this->_model->code)
		->and_where('path', 'LIKE', $oldPath . '%');
		$query->execute();
		
		
		
		
		
		return array(
			'Old Path' => $oldPath,
			'Old Name' => $oldName,
			'New Path' => $newPath,
			'New Name' => $newName					
		);
	}
	
	public function delete($path){
		list($pathNew, $oldName) = $this->_parsePath($path);				
		
		$model = new Model_Media_Storage_File();
		$model =  $model->where('category_code', '=', $this->_model->code)
						->and_where('path', '=', $pathNew)
						->and_where('name', '=', $oldName)
						-> find();
		
		if (!$model->loaded()) throw new Media_Storage_Exception_Category_FileNotFound();
		
		if ($model->type == Model_Media_Storage_File::FILE_TYPE_NORMAL){
			$dataStorage = Media_Storage_Data::findByCode($model->data_code);
			
			$rpath = $model->path_data . DIRECTORY_SEPARATOR . $model->file_name;
			$rpathThumb = $model->path_data . DIRECTORY_SEPARATOR . 'th_' .$model->file_name;
			
			$fullpath = $dataStorage->getRootPath() . DIRECTORY_SEPARATOR . $rpath;
			$fullpathThumb = $dataStorage->getRootPath() . DIRECTORY_SEPARATOR . $rpathThumb;
			
			if ($dataStorage->isFileExist($rpathThumb)){
				$dataStorage->deleteFile($fullpathThumb);
			}
			
			$dataStorage->deleteFile($fullpath);

		}
		
		$model->delete();
		
		return array('Path' => $path);
		
	}
	
	public function add($path, $name, $tmpFile, $fileStatus = Model_Media_Storage_File::FILE_STATUS_OK){
		$dataStorage = Media_Storage_Data::find($this->_model->type_data);
		$fileInfo = array(
				'file' => $tmpFile,
				'name' => $name,
				'category_code' => $this->_model->code, //if not token
				'path' => $path,
				'file_status' => $fileStatus
		);
		$model = $dataStorage->uploadFile($fileInfo);
		
		return array('Path' => $model->path, 'Name' => $model->name);
	}
	
	public function getFileContent($path){
		list($pathNew, $name) = $this->_parsePath($path);
		$model = new Model_Media_Storage_File();
		$model =  $model->where('category_code', '=', $this->_model->code)
		->and_where('path', '=', $pathNew)
		->and_where('name', '=', $name)
		-> find();
		
		if (!$model->loaded()) throw new Media_Storage_Exception_Category_FileNotFound();
		
		$dataStorage = Media_Storage_Data::findByCode($model->data_code);
		
		$rpath = $model->path_data . DIRECTORY_SEPARATOR . $model->file_name;
		$content = $dataStorage->getFileContent($rpath, true);
		
		$content = mb_convert_encoding($content, "UTF-8", "auto");
		
		
		
		return array(
				'Path' => $path,
				'Content' => $content
		);
		
	}
	
	public function setFileContent($path, $content){
		list($pathNew, $name) = $this->_parsePath($path);
		$model = new Model_Media_Storage_File();
		$model =  $model->where('category_code', '=', $this->_model->code)
		->and_where('path', '=', $pathNew)
		->and_where('name', '=', $name)
		-> find();
	
		if (!$model->loaded()) throw new Media_Storage_Exception_Category_FileNotFound();

		$dataStorage = Media_Storage_Data::findByCode($model->data_code);
	
		$rpath = $model->path_data . DIRECTORY_SEPARATOR . $model->file_name;
		$content = $dataStorage->setFileContent($rpath, $content);
		
		$model->file_size = $dataStorage->getFileSize($rpath);
		$model->save();
	
		return array(
				'Path' => $path
		);
	
	}
	
	public function downloadFile($path){
		list($pathNew, $name) = $this->_parsePath($path);
		$model = new Model_Media_Storage_File();
		$model =  $model->where('category_code', '=', $this->_model->code)
		->and_where('path', '=', $pathNew)
		->and_where('name', '=', $name)
		-> find();
		
		if (!$model->loaded()) throw new Media_Storage_Exception_Category_FileNotFound();
		
		if ($model->type == Model_Media_Storage_File::FILE_TYPE_FOLDER){
			throw new Media_Storage_Exception_Category();
		}
		
		$dataStorage = Media_Storage_Data::findByCode($model->data_code);
		
		$rpath = $model->path_data . DIRECTORY_SEPARATOR . $model->file_name;

		
		$start = null;
		$stop = null;
		
		if (!empty($_SERVER['HTTP_RANGE'])){
			$rangeList = Util_HTTPRange::parse($location->getFileSize($file), $_SERVER['HTTP_RANGE']);
			if (is_array($rangeList)){
				$start = $rangeList[0][0];
				$stop = $rangeList[0][1];
			}
		}
		
		if (ob_get_level()) {
			ob_end_clean();
		}
		
		if (!is_null($start)){
			header('HTTP/1.1 206 Partial Content');
			header('Accept-Ranges: bytes');
			header('Content-Range: bytes ' . $start . '-' . $stop . '/' . $location->getFileSize($file));
		}
		else {
			header($_SERVER["SERVER_PROTOCOL"] . ' 200 OK');
		}
		 
		// заставляем браузер показать окно сохранения файла
		header('Content-Description: File Transfer');
		header('Content-Type: ' . $model->file_mime);
		header('Content-Disposition: attachment; filename=' . basename($model->name));
		header('Last-Modified: ' . $dataStorage->getFileLastModified($rpath));
		header('ETag: ' . $dataStorage->getFileETag($rpath));
		header('Content-Length: ' . $dataStorage->getFileSize($rpath));
		header('Connection: close');
		
		/* NGINX SUPPORT DOWNLOAD*/
		if ($dataStorage->nginxSupportDownloadPath()){
			$file = $dataStorage->nginxSupportDownloadPath() . $rpath;
			header('X-Accel-Redirect: ' . $file);
			exit;
		}
		
		$dataStorage->getFileContent($rpath, false, $start, $stop);
		exit;
	}
	
	protected function _parsePath($path){
		$pathArr = explode('/', $path);
		if (!$pathArr[count($pathArr)-1]) array_splice($pathArr, -1);
		
		if (!count($pathArr)) array('/', '');
		
		$name = $pathArr[count($pathArr)-1];
		array_splice($pathArr, -1);
		$pathNew = implode('/', $pathArr) . '/';
		
		return array($pathNew, $name);
	}
	
	protected function _assemblyPath($isDir = true, $path = '', $name = ''){		
		return "{$path}{$name}" . ($isDir ? '/' : '');		
	}
}