<?php defined('SYSPATH') OR die('No direct script access.');
abstract class Media_Storage_Data {
    
    const TYPE_DATA_PUBLIC  = 'public';
    const TYPE_DATA_PRIVATE = 'private';
    
    /**
     * @var Model_Media_Storage_Data`
     */
    protected $_model;
    
    protected $_config;
    
    public static $_cacheDataStorage = array();
    
    
    /**
     * 
     * @param unknown $typeData
     * @throws Exception
     * @return Media_Storage_Data
     */
    public static function find($typeData){
    	$modelData = Model::factory('Media_Storage_Data');
    	$modelsData = $modelData->findByTypeData($typeData);
    	
    	$modelDataCurrent = null;
    	$modelDataCurrentDSize = 0;
    	foreach ($modelsData as $model){
    		$diskSize = $model->getSize();
    		if ($diskSize > $modelDataCurrentDSize){
    			$modelDataCurrent = $model;
    			$modelDataCurrentDSize = $diskSize;
    		}
    	}
    	
    	if (!$modelDataCurrent) {
    		throw new Media_Storage_Exception_Data("Data storage for data type {$typeData} not found");
    	}
    	
        $class = null;
	    switch ($modelDataCurrent->type){
	        case 'local':
	            $class = new Media_Storage_Data_Local($modelDataCurrent);
	        break;

	        default:
	        	throw new Media_Storage_Exception_Data("Data storage for type {$modelDataCurrent->type} not found");
	        break;	
	    }	    	    
	    
	    return $class;
	}
	
	public static function findByCode($code){
		if (isset(self::$_cacheDataStorage[$code]))return self::$_cacheDataStorage[$code];
		
		$modelData = Model::factory('Media_Storage_Data');
		$modelData = $modelData->findByCode($code);
		 
		
		if (!$modelData) {
			throw new Media_Storage_Exception_Data("Data storage for data type {$typeData} not found");
		}
		 
		$class = null;
		switch ($modelData->type){
			case 'local':
				$class = new Media_Storage_Data_Local($modelData);
				break;
	
			default:
				throw new Media_Storage_Exception_Data("Data storage for type {$modelData->type} not found");
				break;
		}
		 
		self::$_cacheDataStorage[$code] = $class;
		return $class;
	}
	
	
	
	public function __construct(Model_Media_Storage_Data $model){
	    $this->_model = $model;	    
	    $this->_config = Kohana::$config->load('media_storage');
	}
	
	
	
	public function getCode(){
	    return $this->_model->code;
	}
	
	
	public function getFolderMax(){
	    return $this->_config->folder_max;
	}
	
	public function getSubFolderMax(){
	    return $this->_config->subfolder_max;
	}
	
	public function getFileMax(){
	    return $this->_config->file_max;
	}
	
	public function getFileLength(){
	    return $this->_config->file_length;
	}
	
	public function getFreeSpace(){
	    return $this->_model->getSize();
	}
	
	public function getDownloadUrl(){
	    return $this->_model->getUrl();
	}
	
	public function getThumbWidth(){
		return $this->_config->thumb_width;
	}
	
	public function getThumbHeight(){
		return $this->_config->thumb_height;
	}
		
	/**
	 * Create empty file
	 */
	public function generateFileName($extension, $path, $length){
		$attempts = 7;
		while ($attempts--){
			$fileName = $this->_generateFileName($length) . '.' . $extension;
			$fullFilename = $path . DIRECTORY_SEPARATOR . $fileName;
			if (touch($fullFilename)){
				if (filesize($fullFilename) == 0) return $fileName;
			}
		}
	
		throw new Media_Storage_Exception_Data('Can not generate file name');
	}
	
	protected function _generateFileName($length){
		$chars = 'abcdefghijklmnopqrstuvwxyz1234567890';
		$name = '';
	
		if ($length < 1) return $name;
	
		$charsLength = (strlen($chars) - 1);
		for($i = 0; $i < $length; $i++){
			$name .= $chars{rand(0, $charsLength)};
		}
	
		return $name;
	}
	
}