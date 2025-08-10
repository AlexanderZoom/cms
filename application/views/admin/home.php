<?php defined('SYSPATH') OR die('No direct script access.'); ?>
<div class="row">
<h2>home</h2>
<?php 
print_r(Model_Setting::getAll());
print_r(Model_Site_Setting::getAll());
print_r(Model_Admin_Setting::getAll());

Model_Admin_Setting::set('module.pro.stat', 2345667);

print_r(Model_Admin_Setting::getAll());

$defParams = array(
		'limit' => 10,
		'offset' => 0,
		'user'	=> $current_user,
		'all'	=> false,
		'count' => false,
);

print_r(Admin_Notification::get($defParams));

$defParams = array(
		'limit' => 10,
		'offset' => 0,
		'user'	=> $current_user,
		'all'	=> true,
		'count' => false,
);

print_r(Admin_Notification::get($defParams));

$defParams = array(
		'limit' => 10,
		'offset' => 0,
		'user'	=> $current_user,
		'all'	=> false,
		'count' => true,
);

print_r(Admin_Notification::get($defParams));

$defParams = array(
		'limit' => 10,
		'offset' => 0,
		'user'	=> $current_user,
		'all'	=> true,
		'count' => true,
);

print_r(Admin_Notification::get($defParams));

$defParams = array(
		'limit' => 10,
		'offset' => 50,
		'user'	=> $current_user,
		'all'	=> false,
		'count' => false,
);

print_r(Admin_Notification::get($defParams));
?>
</div>