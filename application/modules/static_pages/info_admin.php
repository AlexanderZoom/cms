<?php defined('SYSPATH') OR die('No direct script access.');
return array(
   
    'access_declare_class' => 'Admin_Access_Declare_StaticPages',
	'garbage_collector_class' => '',
	'setting_class' => 'Admin_Setting_Pages',
    'admin_menu' => new Admin_Menu(array(
        'name' => 'Pages',
        'position' => 1000,
        'controller' => 'Controller_Admin_Pages',
        'action' => 'index',
        'access' => Admin_Access::ACCESS_VIEW,
        'extra' => array('icon' => '<i class="fa fa-font fa-fw"></i>'),
        'child' => array(),
    	'set-parent' => 'Site',
    )),
);