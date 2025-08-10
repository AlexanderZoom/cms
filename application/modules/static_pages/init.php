<?php defined('SYSPATH') OR die('No direct script access.');
$defPath = Model_Setting::get('site.pages.default_path');
if ($defPath){
	Route::set('static_pages', $defPath.'/<slug>')
	->defaults(array(
	'directory'  =>'site',
	'controller' => 'pages',
	'action'     => 'index',
	'slug'		 =>'',
	));
}

$models = ORM::factory('Site_Page')
		->where('slug', 'like', '/%')
		->find_all();

foreach ($models as $model){
	$path = substr($model->slug, 1);
	Route::set('static_pages_'.$model->id, $path)
	->defaults(array(
	'directory'  =>'site',
	'controller' => 'pages',
	'action'     => 'index',
	'slug'		 =>$model->slug,
	));
}