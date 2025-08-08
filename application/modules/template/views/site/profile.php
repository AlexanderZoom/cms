<?php defined('SYSPATH') OR die('No direct script access.');
?>
<script>
  $( function() {
	  jQuery.datetimepicker.setLocale('<?php echo $lang; ?>');
	  jQuery('#datepicker').datetimepicker({
			  timepicker:false,
			  format:'<?php echo $format_date;?>',
			  lang:'<?php echo $lang; ?>'
	  });
  } );
  </script>
<div id="content_plain">
<div class="post_text">
<h2 class="title"><?php echo ___('Profile');?></h2>
<div class="profile-page">
  <div class="form-width form">
  <p class="message_top"><?php echo ___($warning);?> </p>
    
    <div>
    <div class="profile-avatar"><div><?php if($avatar):?><img src="<?php echo $avatar;?>"/><?php else:?>&nbsp;<?php endif;?></div></div>
    <div class="profile-avatar-upload">
    <form  method="post" enctype="multipart/form-data" action="<?php echo URL::site(Route::url('site', array('controller' => 'profile', 'lang'=> $lang, 'action'=> 'upload' )));?>">
    	<input type="file" name="file" >
    	<button name="upload" type="submit"><?php echo ___('Upload'); ?></button>   
    </form>  
    </div>
    <div style="clear: both;">&nbsp;</div>
    </div>
    
    <p>&nbsp</p>
     <form class="info-form" method="post">  
      <?php if (isset($errors['firstname'])): ?> <p class="message_error"><?php echo $errors['firstname']; ?></p><?php endif;?>
      <input name="firstname" type="text" value="<?php echo HTML::entities(Arr::get($data, 'firstname')); ?>" placeholder="<?php echo ___('firstname'); ?>"/>
      <?php if (isset($errors['lastname'])): ?> <p class="message_error"><?php echo $errors['lastname']; ?></p><?php endif;?>
      <input name="lastname" type="text" value="<?php echo HTML::entities(Arr::get($data, 'lastname')); ?>" placeholder="<?php echo ___('lastname'); ?>"/>
      <?php if (isset($errors['birthday'])): ?> <p class="message_error"><?php echo $errors['birthday']; ?></p><?php endif;?>
      <input id="datepicker" name="birthday" type="text" value="<?php echo HTML::entities(Arr::get($data, 'birthday')); ?>" placeholder="<?php echo ___('birthday'); ?>"/>
      <?php if (isset($errors['nickname'])): ?> <p class="message_error"><?php echo $errors['nickname']; ?></p><?php endif;?>
      <input name="nickname" type="text" value="<?php echo HTML::entities(Arr::get($data, 'nickname')); ?>" placeholder="<?php echo ___('nickname'); ?>"/>
      <button name="info" type="submit"><?php echo ___('Save'); ?></button>      
    </form>
    <p>&nbsp</p>
    <form class="info-form" method="post">  
      <?php if (isset($errors['old_password'])): ?> <p class="message_error"><?php echo $errors['old_password']; ?></p><?php endif;?>
      <input name="old_password" type="password" value="<?php echo HTML::entities(Arr::get($data, 'old_password')); ?>" placeholder="<?php echo ___('old password'); ?>"/>
      
      <?php if (isset($errors['password'])): ?> <p class="message_error"><?php echo $errors['password']; ?></p><?php endif;?>
      <input name="password" type="password" value="<?php echo HTML::entities(Arr::get($data, 'password')); ?>" placeholder="<?php echo ___('password'); ?>"/>
      
      <?php if (isset($errors['repassword'])): ?> <p class="message_error"><?php echo $errors['repassword']; ?></p><?php endif;?>
      <input name="repassword" type="password" value="<?php echo HTML::entities(Arr::get($data, 'repassword')); ?>" placeholder="<?php echo ___('retype password'); ?>"/>
      <button name="pass" type="submit"><?php echo ___('Change password'); ?></button>   
    </form>  
  </div>
</div>	
</div>					
<div style="clear: both;">&nbsp;</div>
</div>