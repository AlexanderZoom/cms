<?php defined('SYSPATH') or die('No direct script access.');
class Model_Media_Storage_File extends ORM {
    protected $_table_name = 'media_storage_file';
    protected $_primary_key = 'id';
    protected $_created_column = array('column' => 'created_at', 'format' => 'Y-m-d H:i:s');
    protected $_updated_column = array('column' => 'updated_at', 'format' => 'Y-m-d H:i:s');
    protected $_load_with = array('extra');
    
    
    protected $_has_one = array(
        'extra' => array(
            'model' => 'Media_Storage_FileExtra',
            'foreign_key' => 'file_id',
        ),
    );
    
    protected $_isFolderRoot = false;
    
    
    const FILE_STATUS_OK         = 'ok';
    const FILE_STATUS_TEMP         = 'temp';
    const FILE_STATUS_NOTFOUND   = 'notfound';
    const FILE_STATUS_BANNED     = 'banned';
    const FILE_STATUS_DELETED    = 'deleted';
    
    
    const FILE_TYPE_FOLDER = 0;
    const FILE_TYPE_NORMAL = 10000;
    const FILE_TYPE_THUMB = 50000;
    
    
    public function rules(){
        
        $statusRegexp = '/(' . implode('|', $this->getStatusesFile()) . ')/';
        
        return array(
            'data_code' => array(
                array('not_empty'),
                array('max_length', array(':value', 50)),
            ),
        
            'category_code' => array(
                array('not_empty'),
                array('max_length', array(':value', 50)),
            ),
        	
        	'path' => array(
        		array('not_empty'),
        		array('max_length', array(':value', 200)),
        	),        		
        
            'path_data' => array(
                array('not_empty'),
                array('max_length', array(':value', 200)),
            ),
        
            'file_name' => array(
                array('not_empty'),
                array('max_length', array(':value', 100)),
            ),
        
            'file_extension' => array(
                array('not_empty'),
                array('max_length', array(':value', 10)),
            ),
            
            'file_size' => array(
                array('not_empty'),
                array('digit'),
            ),
            
            'file_mime' => array(
                array('not_empty'),
                array('max_length', array(':value', 100)),
            ),
            
            'name' => array(
                array('not_empty'),
                array('max_length', array(':value', 75)),
            ),                       
            
            'status' => array(
                array('not_empty'),
                array('max_length', array(':value', 40)),
                array('regex', array(':value', $statusRegexp)),
            ),
        );
    }
    
    
    
    
    
    public function isFile(){
        return ($this->loaded() && $this->status != Model_Media_Storage_File::FILE_STATUS_OK
                && $this->type < Model_Media_Storage_File::FILE_TYPE_NORMAL);
    }
    
    public function delete(){
        
        if ( ! $this->_loaded)
            throw new Kohana_Exception('Cannot delete :model model because it is not loaded.', array(':model' => $this->_object_name));
        
        if ($this->type == self::FILE_TYPE_FOLDER){
            //check contains
            $fileModel = DB::select(DB::expr('COUNT(`id`) AS `total`'))->from($this->table_name());
    	    $fileModel->where('category_code', '=', $this->category_code);
    	    $fileModel->and_where('path', 'LIKE', "{$this->path}{$this->name}%");
    	    $fileModel->and_where('status', '<>', self::FILE_STATUS_DELETED);    	    
    	    $fileModel->limit(1);
    	    if ($fileModel->execute()->get('total')){
    	        throw new Media_Storage_Exception_File_NotEmpty('Cannot delete :model model because it is folder not empty', array(':model' => $this->_object_name));
    	    }
        }
        
        if ($this->extra->loaded()) $this->extra->delete();
        parent::delete();
    }
    
   
    
    /**
     *
     * @return array $statuses:
     */
    public function getStatusesFile(){
        $statuses = array();
        $constantPrefix = 'FILE_STATUS';
        $reflectionClass = new ReflectionClass(get_class($this));
        foreach ($reflectionClass->getConstants() as $constantName => $constantValue){
            if (strpos($constantName, $constantPrefix) !== false) $statuses[] = $constantValue;
        }
        return $statuses;
    }
    
    
    
    public function create(Validation $validation = NULL)
    {

        if (is_null($this->type)) $this->type = self::FILE_TYPE_NORMAL;
        
        $this->updated_at = date('Y-m-d H:i:s', time());
        
        $try = 7;
        if (!$this->id){
            
            while ($try > 0){
                $this->id = Util_UUID::v4();
                try {
                    parent::create($validation);
                    break;
                }
                catch (Database_Exception $e){
                    if($e->getCode() == 23000 && strpos($e->getMessage(), $this->id) !== FALSE){
                        ;
                    }
                    else throw $e;
                }
                $try--;
            }
                
        }
        else parent::create($validation);
        
        if ($try < 1) parent::create($validation);
        
    }
}