<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */



Route::set('admin', 'admin(/<lang>(/<controller>(/<action>(.<extension>))))', array('extension'=>'ajax', 'lang' => Kohana::$config->load('admin.language_list')))
->defaults(array(
'directory'  =>'admin',
'controller' => 'root',
'action'     => 'index',
'lang'       => '',
'extension'  => '',
));



$CtrlDefault = Model_Setting::get('site.main.default_module');
if ($CtrlDefault && class_exists('Controller_Site_'.ucfirst($CtrlDefault))){
	Route::set('default', '(<controller>(/<action>(/<id>)))')
		->defaults(array(
		'directory'  =>'site',
		'controller' => $CtrlDefault,
		'action'     => 'index',
		'lang'       => '',
		'extension'  => '',
	));
}	

Route::set('site', '(<controller>(/<action>(/<id>)))')
->defaults(array(
'directory'  =>'site',
'controller' => '',
'action'     => 'index',
'lang'       => '',
'extension'  => '',
));