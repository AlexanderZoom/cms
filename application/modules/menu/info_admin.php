<?php defined('SYSPATH') OR die('No direct script access.');
return array(
   
    'access_declare_class' => 'Admin_Access_Declare_Menu',
	
	'setting_class' => '',
    'admin_menu' => new Admin_Menu(array(
        'name' => 'Menu',
        'position' => 1000,
        'controller' => 'Controller_Admin_Menu',
        'action' => 'index',
        'access' => Admin_Access::ACCESS_VIEW,
        'extra' => array('icon' => '<i class="fa fa-font fa-bars"></i>'),
        'child' => array(),
    	'set-parent' => 'Site',
    )),
);