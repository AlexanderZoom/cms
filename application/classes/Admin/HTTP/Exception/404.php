<?php defined('SYSPATH') OR die('No direct script access.');

class Admin_HTTP_Exception_404 extends Admin_HTTP_Exception {

	/**
	 * @var   integer    HTTP 404 Not Found
	 */
	protected $_code = 404;
	
	protected $template = 'admin/errors/404';

}
