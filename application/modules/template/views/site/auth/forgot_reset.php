<?php defined('SYSPATH') OR die('No direct script access.');
?>
<div id="content_plain">
<div class="post_text">
<h2 class="title"><?php echo ___('Reset password');?></h2>
<div class="login-page">
  <div class="form">
    <form class="forgot-form" method="post">
      <p class="message_top"><?php echo ___($warning);?> </p>
      <?php if($form_display):?>
      <input type="hidden" name="email" value="<?php echo HTML::entities(Arr::get($data, 'email')); ?>"/>
      <input type="hidden" name="hash" value="<?php echo HTML::entities(Arr::get($data, 'hash')); ?>"/>
      
      <?php if (isset($errors['password'])): ?> <p class="message_error"><?php echo $errors['password']; ?></p><?php endif;?>
      <input name="password" type="password" placeholder="<?php echo ___('password'); ?>"/>
      
      <?php if (isset($errors['repassword'])): ?> <p class="message_error"><?php echo $errors['repassword']; ?></p><?php endif;?>
      <input name="repassword" type="password" placeholder="<?php echo ___('retype password'); ?>"/>
      
      <button type="submit" name="doit"><?php echo ___('reset password'); ?></button>
      <p class="message"><?php echo ___('Already registered?'); ?> <a href="<?php echo URL::site(Route::url('site', array('controller'=>'login', 'lang' => $lang, 'action'=>'index')));?>"><?php echo ___('Sign In'); ?></a></p>
      
      <?php endif;?>
    </form>
  </div>
</div>			
</div>					
<div style="clear: both;">&nbsp;</div>
</div>