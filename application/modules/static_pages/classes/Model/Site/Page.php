<?php defined('SYSPATH') or die('No direct script access.');
class Model_Site_Page extends ORM {
	protected $_table_name = 'site_page';
	protected $_primary_key = 'id';
	protected $_created_column = array('column' => 'created_at', 'format' => 'Y-m-d H:i:s');
	protected $_updated_column = array('column' => 'updated_at', 'format' => 'Y-m-d H:i:s');
	
	public function create(Validation $validation = NULL)
	{
		$this->updated_at = date('Y-m-d H:i:s', time());	
		parent::create($validation);
	}
}