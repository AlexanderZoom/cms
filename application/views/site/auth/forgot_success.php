<?php defined('SYSPATH') OR die('No direct script access.'); ?>
<?php echo ___('Reset password'); ?>
<?php echo ___('New password was set');?>. <?php echo ___('Page for signin');?> 
<a href="<?php echo URL::site(Route::url('site', array('controller'=>'login', 'lang' => $lang, 'action'=>'index')));?>"><?php echo ___('click here');?></a>.</p>