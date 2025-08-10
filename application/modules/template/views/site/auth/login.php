<?php defined('SYSPATH') OR die('No direct script access.');
?>
<div id="content_plain">
<div class="post_text">
<h2 class="title"><?php echo ___('Sign In');?></h2>
<div class="login-page">
  <div class="form">
    <form class="login-form"  method="post">
      <p class="message_top"><?php echo ___($warning);?> </p>
      <input type="text" name="email" placeholder="<?php echo ___('email');?>"/>
      <input type="password" name="password" placeholder="<?php echo ___('password');?>"/>
      <button name='check_auth' type="submit"><?php echo ___('login'); ?></button>
      <p class="message"><?php echo ___('Not registered?');?> <a href="<?php echo URL::site(Route::url('site', array('controller'=>'register', 'lang' => $lang, 'action'=>'index')));?>"><?php echo ___('Create an account');?></a></p>
      <p class="message"><?php echo ___('Forgot password?');?> <a href="<?php echo URL::site(Route::url('site', array('controller'=>'forgot', 'lang' => $lang, 'action'=>'index')));?>"><?php echo ___('Reset password');?></a></p>
    </form>
  </div>
</div>			
</div>					
<div style="clear: both;">&nbsp;</div>
</div>