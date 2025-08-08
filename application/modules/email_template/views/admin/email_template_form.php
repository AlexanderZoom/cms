<?php defined('SYSPATH') OR die('No direct script access.'); ?>
<div class="panel panel-default">
<form class="form-horizontal" method="POST" action="" novalidate>
<div class="panel-body">
<div class="col-lg-12">

<div class="form-group">
      <label><?php echo ___('Name'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['name'])) echo $errors['name']; ?></p>
      <input type="text" required class="form-control" name="name" value="<?php echo HTML::entities(Arr::get($data, 'name')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
  </div>

  <div class="form-group">
      <label><?php echo ___('Title'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['title'])) echo $errors['title']; ?></p>
      <input type="text" required class="form-control" name="title" value="<?php echo HTML::entities(Arr::get($data, 'title')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
  </div>
  
  
  
  <div class="form-group">
   <textarea id="mytextarea" name="text"><?php echo HTML::entities(Arr::get($data, 'text')); ?></textarea>
  </div>
  
  <div class="form-group">
   %sitename% - <?php echo ___('name of site'); ?> <br/>
   %sitedomain% - <?php echo ___('site domain'); ?> <br/>
   %siteurl% - <?php echo ___('site url'); ?> <br/>
   %username% - <?php echo ___('user name'); ?> <br/>
   %sender% - <?php echo ___('sender email'); ?> <br/>
   %receiver% - <?php echo ___('reciever email'); ?> <br/>
   %login% - <?php echo ___('login for user'); ?> <br/>
   %password% - <?php echo ___('password for user'); ?> <br/>
   %verification_url% - <?php echo ___('verification url for registration with verify method'); ?> <br/>
   %current_date% - <?php echo ___('current date'); ?> <br/>
   %current_time% - <?php echo ___('current time'); ?> <br/>
  </div>
  
  </div>
  
  
  
</div>
      
      
      
      
             
<div class="panel-footer">
	
  <?php if(($controller->getRights(Admin_Access::ACCESS_MODIFY)->result && !empty($data['id'])) || ($controller->getRights(Admin_Access::ACCESS_CREATE)->result != 0 && empty($data['id']))): ?>
  <div class="form-actions center">
  <button type="submit" name='save' class="btn btn-default"><?php if(empty($data['id'])):?><?php echo ___('Create'); ?><?php else: ?><?php echo ___('Save'); ?><?php endif; ?></button>
  <button type="submit" name='savetest' class="btn btn-default"><?php echo ___('Save and Test'); ?></button>
  </div>
  <?php endif; ?>
</div>
            
</form>
</div>

<script type="text/javascript">
$(document).ready(function() {
	
	//$('.multiselect').multiselect({numberDisplayed: 7});
    //$("input,select,textarea").not("[type=submit]").jqBootstrapValidation({semanticallyStrict: true});
});
</script>
