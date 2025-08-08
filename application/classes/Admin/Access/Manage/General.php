<?php
class Admin_Access_Manage_General extends Admin_Access_Manage_Global {

	protected $_modelNames = array( 'Controller_Admin_Groups'     => 'Admin_Group',
									'Controller_Admin_Users'      => 'Admin_User',
									'Controller_Admin_SiteGroups' => 'Site_Group',
									'Controller_Admin_SiteUsers'  => 'Site_User',);
	
}