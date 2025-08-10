<?php defined('SYSPATH') OR die('No direct script access.'); ?>
<div class="panel panel-default">
<form class="form-horizontal" method="POST" action="" novalidate>
<div class="panel-body">
<div class="col-lg-12">

  <div class="form-group">
      <label><?php echo ___('Login'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['login'])) echo $errors['login']; ?></p>
      <input type="text" required class="form-control" name="login" value="<?php echo HTML::entities(Arr::get($data, 'login')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
  </div>
  
  <div class="form-group">
      <label><?php echo ___('Password'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['password'])) echo $errors['password']; ?></p>
      <input type="password" class="form-control" name="password" value=""
       <?php if(empty($data['id'])): ?>required
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"<?php endif; ?>
      >
  </div>
  
  <div class="form-group">
      <label><?php echo ___('Retype Password'); ?></label>
      <p class="help-block help-block-error"></p>
      <input type="password"  class="form-control" name="retype_password" value=""
      <?php if(empty($data['id'])): ?>required
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"<?php endif; ?>
       data-validation-match-message='<?php echo ___('Password not matched'); ?>'
       data-validation-match-match="password"
      >
  </div>
 
 <div class="form-group">
     <label><?php echo ___('Group'); ?></label>
     <p class="help-block help-block-error"><?php if (isset($errors['group'])) echo $errors['group']; ?></p>

     <select data-placeholder="" multiple class="form-control chzn-select" tabindex="8" name="group[]">
         <?php foreach ($roles as $role):?>
         <option value="<?php echo $role->code; ?>" <?php if (in_array($role->code, $data['group'])):?> selected="selected"<?php endif;?>><?php echo $role->code; ?></option>
         <?php endforeach;?>
      </select>     

 </div>
 
 <div class="form-group">
    <div class="checkbox">
    <label>
    <input type="checkbox" value="1" name="disabled" <?php if ($data['disabled']):?>checked="checked"<?php endif;?>>
    <?php echo ___('Disable account'); ?>
    </label>
    </div>
 </div>
  
 <?php if(!empty($data['id'])):?>
 <div class="form-group">
      <label><?php echo ___('Last login date'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['last_login'])) echo $errors['last_login']; ?></p>
      <input type="text"  class="form-control"  value="<?php echo HTML::entities(Arr::get($data, 'last_login')); ?>"
       disabled
      >
 </div>
 
 <div class="form-group">
      <label><?php echo ___('Last Ip'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['last_ip'])) echo $errors['last_ip']; ?></p>
      <input type="text"  class="form-control" value="<?php echo HTML::entities(Arr::get($data, 'last_ip')); ?>"
       disabled
      >
 </div>
 
  <div class="form-group">
      <label><?php echo ___('Last Ip forward'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['last_ip_forward'])) echo $errors['last_ip_forward']; ?></p>
      <input type="text"  class="form-control" value="<?php echo HTML::entities(Arr::get($data, 'last_ip_forward')); ?>"
       disabled
      >
 </div>
 <?php endif; ?>  
  
  </div>
</div>
             
<div class="panel-footer">
	
  <?php if(($controller->getRights(Admin_Access::ACCESS_MODIFY)->result && !empty($data['id'])) || ($controller->getRights(Admin_Access::ACCESS_CREATE)->result != 0 && empty($data['id']))): ?>
  <div class="form-actions center">
  <button type="submit" name='save' class="btn btn-default"><?php if(empty($data['id'])):?><?php echo ___('Create'); ?><?php else: ?><?php echo ___('Save'); ?><?php endif; ?></button>
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
