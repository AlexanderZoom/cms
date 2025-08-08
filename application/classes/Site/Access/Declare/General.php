<?php defined('SYSPATH') OR die('No direct script access.');
class Site_Access_Declare_General {
	public static $manage = 'Site_Access_Manage_General';
    public static $package = 'general';
    public static $description = 'general';
    public static $rights = array(
    	'view'   => Site_Access::ACCESS_VIEW,
    	'view_auth'   => Site_Access::ACCESS_VIEWAUTH,
       	'insert' => Site_Access::ACCESS_CREATE,
        'edit'   => Site_Access::ACCESS_MODIFY,
        'delete' => Site_Access::ACCESS_DELETE,
    	'moderator' => Site_Access::ACCESS_MODERATOR,	
    );
    public static $structure = array(
    );
    
}