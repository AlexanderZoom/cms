<?php defined('SYSPATH') or die('No direct script access.');
class Model_Media_Storage_FileExtra extends ORM {
    protected $_table_name = 'media_storage_file_extra';
    protected $_primary_key = 'file_id';
    protected $_created_column = array('column' => 'created_at', 'format' => 'Y-m-d H:i:s');
    protected $_updated_column = array('column' => 'updated_at', 'format' => 'Y-m-d H:i:s');
    

    protected $_belongs_to = array(
        'file' => array(
            'model'       => 'Media_Storage_File',
            'foreign_key' => 'id',
        ),
    );
   
}