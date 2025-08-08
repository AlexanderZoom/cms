<?php defined('SYSPATH') OR die('No direct script access.');
Route::set('widget', '<controller>(/<action>)', array('controller'=>'Widget_\w+'))
->defaults(array(
'controller' => 'widget_dummy',
'action'     => 'widget',
));

Route::set('admin_widget', '<controller>(/<action>)', array('controller'=>'Admin_Widget_\w+'))
->defaults(array(
'controller' => 'admin_widget_dummy',
'action'     => 'widget',
));