<?php defined('SYSPATH') or die('No direct script access.');
class Model_Site_Group extends ORM {
    protected $_table_name = 'site_group';
    protected $_primary_key = 'id';
    protected $_created_column = array('column' => 'created_at', 'format' => 'Y-m-d H:i:s');
    protected $_updated_column = array('column' => 'updated_at', 'format' => 'Y-m-d H:i:s');
    
    protected $_has_many = array(
        'users' => array(
            'far_key' => 'site_user_id',
            'foreign_key' => 'site_group_id',
            'model' => 'Site_User',
            'through' => 'site_group_user',
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
        
        'code' => ___('site.model.group.code'),
        'created_at' => ___('site.model.general.created_at'),
        'updated_at' => ___('site.model.general.updated_at'),
    
        );
    }
}