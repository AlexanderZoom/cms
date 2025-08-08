<?php defined('SYSPATH') OR die('No direct script access.');
return array(
    'access_declare_class' => '',
	'setting_class' => '',	
	'garbage_collector_class' => 'Media_Storage_GarbageCollector',
    'admin_menu' => new Admin_Menu(array(
        'name' => 'Media',
        'position' => 1000,
        'controller' => 'Controller_Admin_Media',
        'action' => 'index',
        'access' => Admin_Access::ACCESS_VIEW,
        'extra' => array('icon' => '<i class="fa fa-picture-o fa-fw"></i>'),
        'child' => array(),
    	'set-parent' => 'Site',	
        
    )),
);