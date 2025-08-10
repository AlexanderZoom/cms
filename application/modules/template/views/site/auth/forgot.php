<?php defined('SYSPATH') OR die('No direct script access.');
?>
<div id="content_plain">
<div class="post_text">
<h2 class="title"><?php echo ___('Reset password');?></h2>
<div class="login-page">
  <div class="form">
    <form class="forgot-form" method="post">
      <p class="message_top"><?php echo ___($warning);?> </p>
      
      <?php if (isset($errors['email'])): ?> <p class="message_error"><?php echo $errors['email']; ?></p><?php endif;?>
      <input name="email" type="text" value="<?php echo HTML::entities(Arr::get($data, 'email')); ?>" placeholder="<?php echo ___('email'); ?>"/>
      
      <?php if (isset($errors['ccode'])): ?> <p class="message_error"><?php echo $errors['ccode']; ?></p><?php endif;?>
      <div>
      <img width="160" height="80" src="<?php echo URL::site(Route::url('site', array('controller'=>'register', 'lang' => $lang, 'action'=>'captcha')));?>?<?php echo mt_rand(1000000, 1000000000);?>"/>
      <input name="ccode" type="text" value="" placeholder="<?php echo ___('captcha code'); ?>"/>
      </div>
      
      <button type="submit" name="doit"><?php echo ___('reset password'); ?></button>
      <p class="message"><?php echo ___('Already registered?'); ?> <a href="<?php echo URL::site(Route::url('site', array('controller'=>'login', 'lang' => $lang, 'action'=>'index')));?>"><?php echo ___('Sign In'); ?></a></p>
    </form>
  </div>
</div>			
</div>					
<div style="clear: both;">&nbsp;</div>
</div>