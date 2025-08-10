<?php defined('SYSPATH') or die('No direct script access.');
class Model_Admin_Notification extends ORM {
    protected $_table_name = 'admin_notification';
    protected $_primary_key = 'id';
    protected $_created_column = array('column' => 'created_at', 'format' => 'Y-m-d H:i:s');
    protected $_updated_column = array('column' => 'updated_at', 'format' => 'Y-m-d H:i:s');
    
    
    public function create(Validation $validation = NULL)
    {
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