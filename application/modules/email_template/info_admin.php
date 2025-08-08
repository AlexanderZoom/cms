<?php defined('SYSPATH') OR die('No direct script access.');
return array(
   
    'access_declare_class' => 'Admin_Access_Declare_EmailTemplate',
	'garbage_collector_class' => '',
	'setting_class' => '',
    'admin_menu' => new Admin_Menu(array(
        'name' => 'Email Template',
        'position' => 10000,
        'controller' => 'Controller_Admin_EmailTemplate',
        'action' => 'index',
        'access' => Admin_Access::ACCESS_VIEW,
        'extra' => array('icon' => '<i class="fa fa-font fa-file-code-o"></i>'),
        'child' => array(),
    	'set-parent' => 'Site',
    )),
);