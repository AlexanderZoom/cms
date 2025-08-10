<?php defined('SYSPATH') or die('No direct script access.');
class Model_Admin_Group extends ORM {
    protected $_table_name = 'admin_group';
    protected $_primary_key = 'id';
    protected $_created_column = array('column' => 'created_at', 'format' => 'Y-m-d H:i:s');
    protected $_updated_column = array('column' => 'updated_at', 'format' => 'Y-m-d H:i:s');
    
    protected $_has_many = array(
        'users' => array(
            'far_key' => 'admin_user_id',
            'foreign_key' => 'admin_group_id',
            'model' => 'Admin_User',
            'through' => 'admin_group_user',
        ),
    );
    
    public function rules(){
        return array(
        'code' => array(
        array('not_empty'),
        array('min_length', array(':value', 3)),
        array('max_length', array(':value', 50)),
        ),
    
        
        );
    }
    
    public function labels(){
        return array(
        
        'code' => ___('admin.model.group.code'),
        'created_at' => ___('admin.model.general.created_at'),
        'updated_at' => ___('admin.model.general.updated_at'),
    
        );
    }
}