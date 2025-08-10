<?php defined('SYSPATH') OR die('No direct script access.');

class Site_HTTP_Exception_404 extends Site_HTTP_Exception {

	/**
	 * @var   integer    HTTP 404 Not Found
	 */
	protected $_code = 404;
	
	protected $template = 'site/errors/404';

}
