<?php defined('SYSPATH') or die('No direct script access.');
class Model_Media_Storage_Category extends ORM {
    protected $_table_name = 'media_storage_category';
    protected $_primary_key = 'code';
    protected $_created_column = array('column' => 'created_at', 'format' => 'Y-m-d H:i:s');
    protected $_updated_column = array('column' => 'updated_at', 'format' => 'Y-m-d H:i:s');
    
    
    public function rules(){
        return array(
            'code' => array(
                array('not_empty'),
                array('max_length', array(':value', 50)),
            ),
                
            'type_data' => array(
        		array('not_empty'),
        		array('max_length', array(':value', 20)),
        		array('regex', array(':value', '/^(public|private)$/')),
        	),
            
        );
    }
    
    public function findByCode($code){
    	return $this->where('code', '=', $code)->find();
    }
    
}