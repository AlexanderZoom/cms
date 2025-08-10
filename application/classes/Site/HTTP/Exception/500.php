<?php defined('SYSPATH') OR die('No direct script access.');

class Site_HTTP_Exception_500 extends Site_HTTP_Exception {

	/**
	 * @var   integer    HTTP 500 Internal Server Error
	 */
	protected $_code = 500;
	
	protected $template = 'site/errors/500';

}