<?php defined('SYSPATH') OR die('No direct script access.');
class Admin_Access_Declare_Global {
	public static $manage = 'Admin_Access_Manage_Global';
    public static $package = '_GLOBAL_';
    public static $description = 'system access';
    public static $rights = array(
    	'view'   => Admin_Access::ACCESS_VIEW,
       	'insert' => Admin_Access::ACCESS_CREATE,
        'edit'   => Admin_Access::ACCESS_MODIFY,
        'delete' => Admin_Access::ACCESS_DELETE,
    );
    
    public static $structure = array();
}

// package structure instance
/*
 * Правила описываются определенный способом.
 * 
 * Есть пакет со своими глобальными правилами.
 * Пакет может содержать одну или более структур, кроме глобального.
 * Структуры содержат имя или имена контроллеров, за которые отвечает данная структура, список прав и только один инстанс
 * Инстанс прдеставляет собой права доступа к табличному представлению данных для данной структуры.
 */