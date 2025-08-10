<?php defined('SYSPATH') OR die('No direct script access.');
class Site_Access_Declare_StaticPages {
	public static $manage = 'Site_Access_Manage_StaticPages';
    public static $package = 'pages';
    public static $description = '';
    public static $rights = array(
    	'view'   => Site_Access::ACCESS_VIEW,
    	'view_it' => self::ACCESS_VIEWIT
    );
    
    const ACCESS_VIEWIT = 0x80;
    
    public static $structure = array(
    	'pages' => array(
    			'controller' => array('Controller_Site_Pages'),
    			'rights' => array(
    					'view'   => Admin_Access::ACCESS_VIEW,
    					'view_it' => self::ACCESS_VIEWIT
    					
    			),
    			'description' => 'site pages',
    			 
    			'instance' => array(
    					'id' => 'id',
    					'cols' => array('id', 'slug'),
    					'model' => 'Site_Page',
    					'search' => 'slug',
    					'rights' => array(
    							'view_it' => self::ACCESS_VIEWIT    							
    					),
    			),
    	)	
    );
    
}