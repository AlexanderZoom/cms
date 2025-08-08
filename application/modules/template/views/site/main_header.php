<?php defined('SYSPATH') OR die('No direct script access.'); ?>
<div id="header-wrapper">
<div id="header">
<div id="logo">
<h1><a href="<?php echo URL::site(Route::url('default'));?>">LOGO</a></h1>
</div>
<div id="auth">
<div id="auth_container" >
<?php if ($is_logged):?>
<?php 
$logout = URL::site(Route::url('site', array('controller' => 'logout', 'lang'=> $lang, 'action'=> 'index' ))); 
$profile = URL::site(Route::url('site', array('controller' => 'profile', 'lang'=> $lang, 'action'=> 'index' )));
?>
<?php echo ___('You are logged as:').'&nbsp;';?><a href="<?php echo $profile;?>"><?php echo $current_user->nickname;?></a><br/>
<a href="<?php echo $logout;?>"><?php echo ___('Logout');?></a>
<?php else: ?>
<?php 
$signin = URL::site(Route::url('site', array('controller' => 'login', 'lang'=> $lang, 'action'=> 'index' )));
$signon = URL::site(Route::url('site', array('controller' => 'register', 'lang'=> $lang, 'action'=> 'index' )));
?>
<a href="<?php echo $signon;?>"><?php echo ___('Sign On');?></a><br/>
<a href="<?php echo $signin;?>"><?php echo ___('Sign In');?></a>
<?php endif;?>
</div>
</div>
<div style="clear: both;">&nbsp;</div>
</div>
</div>