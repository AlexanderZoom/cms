<?php defined('SYSPATH') or die('No direct script access.');
class Model_Media_Storage_Data extends ORM {
    protected $_table_name = 'media_storage_data';
    protected $_primary_key = 'code';
    protected $_created_column = array('column' => 'created_at', 'format' => 'Y-m-d H:i:s');
    protected $_updated_column = array('column' => 'updated_at', 'format' => 'Y-m-d H:i:s');
    
    protected $_replaceList = array();
    
    const TYPE_DATA_PUBLIC  = 'public';
    const TYPE_DATA_PRIVATE = 'private';
    
    public function rules(){
        return array(
            'code' => array(
                array('not_empty'),
                array('max_length', array(':value', 70)),
            ),
                
            'type' => array(
                array('not_empty'),
                array('max_length', array(':value', 10)),
                array('regex', array(':value', '/^(local)$/')),
            ),
        		
        	'type_data' => array(
        		array('not_empty'),
        		array('max_length', array(':value', 20)),
        		array('regex', array(':value', '/^(public|private)$/')),
        	),
        		
        	'path' => array(
        		array('not_empty'),
        		array('max_length', array(':value', 100)),
        	),	
        		
        	'url' => array(
       			array('not_empty'),
   				array('max_length', array(':value', 150)),
       		),        		
            
        );
    }
    
    public function getPath(){
    	return $this->replaceText($this->path);
    }
    
    public function getUrl(){
    	return $this->replaceText($this->url);
    }
    
    public function getSize(){
    	if ($this->loaded()) return disk_free_space($this->getPath());
    }
    
    protected function replaceText($val){
    	if (!is_string($val)) return $val;
    
    	if (!$this->_replaceList){
    		$this->_replaceList = array();
    
    		$url = URL::base(true);
    		if ($url{strlen($url)-1} == '/') $url = substr($url, 0, strlen($url)-1);
    		$this->_replaceList['%www_url%'] = $url;
    		$this->_replaceList['%www_host%'] = Arr::get($_SERVER, 'HTTP_HOST');
    		$docRoot = DOCROOT;
    		if ($docRoot{strlen($docRoot)-1} == '/') $docRoot = substr($docRoot, 0, strlen($docRoot)-1);
    		$this->_replaceList['%www_dir%'] = $docRoot;
    	}
    
    	return strtr($val, $this->_replaceList);
    
    }
    
    public function findByTypeData($typeData){
    	return $this->where('type_data', '=', $typeData)->find_all();
    }
    
    public function findByCode($code){
    	return $this->where('code', '=', $code)->find();
    }
    
}