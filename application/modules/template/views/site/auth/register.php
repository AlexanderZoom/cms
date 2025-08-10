<?php defined('SYSPATH') OR die('No direct script access.');
?>
<div id="content_plain">
<div class="post_text">
<h2 class="title"><?php echo ___('Sign On');?></h2>
<div class="login-page">
  <div class="form">
    <form class="register-form" method="post">
      <p class="message_top"><?php echo ___($warning);?> </p>
      
      <?php if (isset($errors['email'])): ?> <p class="message_error"><?php echo $errors['email']; ?></p><?php endif;?>
      <input name="email" type="text" value="<?php echo HTML::entities(Arr::get($data, 'email')); ?>" placeholder="<?php echo ___('email'); ?>"/>
      
      <?php if (isset($errors['password'])): ?> <p class="message_error"><?php echo $errors['password']; ?></p><?php endif;?>
      <input name="password" type="password" placeholder="<?php echo ___('password'); ?>"/>
      
      <?php if (isset($errors['repassword'])): ?> <p class="message_error"><?php echo $errors['repassword']; ?></p><?php endif;?>
      <input name="repassword" type="password" placeholder="<?php echo ___('retype password'); ?>"/>
      
      <?php if (isset($errors['nickname'])): ?> <p class="message_error"><?php echo $errors['nickname']; ?></p><?php endif;?>
      <input name="nickname" type="text" value="<?php echo HTML::entities(Arr::get($data, 'nickname')); ?>" placeholder="<?php echo ___('nickname'); ?>"/>
      
      <?php if (isset($errors['ccode'])): ?> <p class="message_error"><?php echo $errors['ccode']; ?></p><?php endif;?>
      <div>
      <img width="160" height="80" src="<?php echo URL::site(Route::url('site', array('controller'=>'register', 'lang' => $lang, 'action'=>'captcha')));?>?<?php echo mt_rand(1000000, 1000000000);?>"/>
      <input name="ccode" type="text" value="" placeholder="<?php echo ___('captcha code'); ?>"/>
      </div>
      <button name="reg" type="submit"><?php echo ___('create'); ?></button>
      <p class="message"><?php echo ___('Already registered?'); ?> <a href="<?php echo URL::site(Route::url('site', array('controller'=>'login', 'lang' => $lang, 'action'=>'index')));?>"><?php echo ___('Sign In'); ?></a></p>
    </form>
  </div>
</div>	
</div>					
<div style="clear: both;">&nbsp;</div>
</div>