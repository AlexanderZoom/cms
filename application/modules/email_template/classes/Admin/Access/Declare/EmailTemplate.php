<?php defined('SYSPATH') OR die('No direct script access.');
class Admin_Access_Declare_EmailTemplate {
	public static $manage = 'Admin_Access_Manage_EmailTemplate';
    public static $package = 'SiteEmailTemplate';
    public static $description = '';
    public static $rights = array(
    		'view'   => Admin_Access::ACCESS_VIEW,
    		'insert' => Admin_Access::ACCESS_CREATE,
    		'edit'   => Admin_Access::ACCESS_MODIFY,
    		'delete' => Admin_Access::ACCESS_DELETE,
    );
    public static $structure = array(
        'main' => array(
            'controller' => array('Controller_Admin_EmailTemplate'),
            'rights' => array(
                'view'   => Admin_Access::ACCESS_VIEW,
                'insert' => Admin_Access::ACCESS_CREATE,
                'edit'   => Admin_Access::ACCESS_MODIFY,
                'delete' => Admin_Access::ACCESS_DELETE,
            ),
        ),
    );
}

// package structure instance
/*
 * Правила описываются определенный способом.
 * Существуют структуры в которых описаны контроллеры относящиеся к данному пакету
 * структура имеет инстансы и права
 * Контроллер должен находиться в одной структуре
 */