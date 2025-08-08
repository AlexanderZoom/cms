<?php defined('SYSPATH') OR die('No direct script access.');
class Admin_Access_Declare_General {
	public static $manage = 'Admin_Access_Manage_General';
    public static $package = 'general';
    public static $description = 'general';
    public static $rights = array(
    	'view'   => Admin_Access::ACCESS_VIEW,
       	'insert' => Admin_Access::ACCESS_CREATE,
        'edit'   => Admin_Access::ACCESS_MODIFY,
        'delete' => Admin_Access::ACCESS_DELETE,
    );
    public static $structure = array(
        'main' => array(
            'controller' => array('Controller_Admin_Logout','Controller_Admin_Root',
                                  'Controller_Admin_Home', 'Controller_Admin_Notification'
            
            ),
            'rights' => array(
                'view'   => Admin_Access::ACCESS_VIEW,
                'insert' => Admin_Access::ACCESS_CREATE,
                'edit'   => Admin_Access::ACCESS_MODIFY,
                'delete' => Admin_Access::ACCESS_DELETE,
            ),
            'description' => 'common controllers',
        ),
    		
    	'admin' => array(
    				'controller' => array('Controller_Admin_Modules',
    									  'Controller_Admin_Settings',
    									  'Controller_Admin_Cron',
    									'Controller_Admin_Audit'
    				),
    				'rights' => array(
    						'view'   => Admin_Access::ACCESS_VIEW,
    						'insert' => Admin_Access::ACCESS_CREATE,
    						'edit'   => Admin_Access::ACCESS_MODIFY,
    						'delete' => Admin_Access::ACCESS_DELETE,
    				),
    				'description' => 'admin pages',
    	),
    		
    	'user' => array(
    			'controller' => array('Controller_Admin_Users'),
    				'rights' => array(
    						'view'   => Admin_Access::ACCESS_VIEW,
    						'insert' => Admin_Access::ACCESS_CREATE,
    						'edit'   => Admin_Access::ACCESS_MODIFY,
    						'delete' => Admin_Access::ACCESS_DELETE,
    				),
    				'description' => 'admin user',
    			
    			'instance' => array(
    					'id' => 'id',
    					'cols' => array('id', 'login'),
    					'model' => 'Admin_User',
    					'search' => 'login',
    					'rights' => array(
    							'view'   => Admin_Access::ACCESS_VIEW,
    							'edit'   => Admin_Access::ACCESS_MODIFY,
    							'delete' => Admin_Access::ACCESS_DELETE,
    					),
    			),
    	),
    		
    	'siteuser' => array(
    				'controller' => array('Controller_Admin_SiteUsers'),
    				'rights' => array(
    						'view'   => Admin_Access::ACCESS_VIEW,
    						'insert' => Admin_Access::ACCESS_CREATE,
    						'edit'   => Admin_Access::ACCESS_MODIFY,
    						'delete' => Admin_Access::ACCESS_DELETE,
    				),
    				'description' => 'site user',
    				 
    				'instance' => array(
    						'id' => 'id',
    						'cols' => array('id', 'login'),
    						'model' => 'Site_User',
    						'search' => 'login',
    						'rights' => array(
    								'view'   => Admin_Access::ACCESS_VIEW,
    								'edit'   => Admin_Access::ACCESS_MODIFY,
    								'delete' => Admin_Access::ACCESS_DELETE,
    						),
    				),
    		),
    		
    	'group' => array(
    			'controller' => array('Controller_Admin_Groups'
    			),
    			'rights' => array(
   						'view'   => Admin_Access::ACCESS_VIEW,
   						'insert' => Admin_Access::ACCESS_CREATE,
   						'edit'   => Admin_Access::ACCESS_MODIFY,
   						'delete' => Admin_Access::ACCESS_DELETE,
    			),
   				'description' => 'admin group',
    			
    			'instance' => array(
    				'id' => 'id',
    				'cols' => array('id', 'code'),	
    				'model' => 'Admin_Group',
    				'search' => 'code',	
    				'rights' => array(
   						'view'   => Admin_Access::ACCESS_VIEW,   						
   						'edit'   => Admin_Access::ACCESS_MODIFY,
   						'delete' => Admin_Access::ACCESS_DELETE,
    				),	    					
    			),
   		),
    		
    	'sitegroup' => array(
    				'controller' => array('Controller_Admin_SiteGroups'
    				),
    				'rights' => array(
    						'view'   => Admin_Access::ACCESS_VIEW,
    						'insert' => Admin_Access::ACCESS_CREATE,
    						'edit'   => Admin_Access::ACCESS_MODIFY,
    						'delete' => Admin_Access::ACCESS_DELETE,
    				),
    				'description' => 'site group',
    				 
    				'instance' => array(
    						'id' => 'id',
    						'cols' => array('id', 'code'),
    						'model' => 'Site_Group',
    						'search' => 'code',
    						'rights' => array(
    								'view'   => Admin_Access::ACCESS_VIEW,
    								'edit'   => Admin_Access::ACCESS_MODIFY,
    								'delete' => Admin_Access::ACCESS_DELETE,
    						),
    				),
    		),
    		
    
        'group_access_list' => array(
            'controller' => array('Controller_Admin_Access'),
            'rights' => array(
                'view'   => Admin_Access::ACCESS_VIEW,
                'edit'   => Admin_Access::ACCESS_MODIFY,
            ),
            'description' => '',
        ),
    		
    	'site_access_list' => array(
    				'controller' => array('Controller_Admin_SiteAccess'),
    				'rights' => array(
    						'view'   => Admin_Access::ACCESS_VIEW,
    						'edit'   => Admin_Access::ACCESS_MODIFY,
    				),
    				'description' => '',
    	),
    
        
    );
    
}