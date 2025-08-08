<?php defined('SYSPATH') OR die('No direct script access.');
class Model_Site_User_Verify extends ORM {
    protected $_table_name = 'site_user_verify';
    protected $_primary_key = 'id';
    protected $_created_column = array('column' => 'created_at', 'format' => 'Y-m-d H:i:s');
    protected $_updated_column = array('column' => 'updated_at', 'format' => 'Y-m-d H:i:s');

    protected $_verifyType= array('forgot', 'register');
    
    public function create(Validation $validation = NULL)
    {
    	if (!in_array($this->type, $this->_verifyType)) throw new Site_Exception('Model_Site_User_Verify: type is incorrect');
    	$this->updated_at = date('Y-m-d H:i:s', time());
    	parent::create($validation);
    }
    
    public function createHash(){
        $hash = md5(sha1(uniqid(Text::random('alnum', 32), TRUE)));
        return $hash;
    }
}
