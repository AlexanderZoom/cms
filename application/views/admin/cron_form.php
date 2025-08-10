<?php defined('SYSPATH') OR die('No direct script access.'); ?>
<div class="panel panel-default">
<form class="form-horizontal" method="POST" action="" novalidate>
<div class="panel-body">
<div class="col-lg-12">

  <div class="form-group">
      <label><?php echo ___('Minute'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['minute'])) echo $errors['minute']; ?></p>
      <input type="text" required class="form-control" name="minute" value="<?php echo HTML::entities(Arr::get($data, 'minute')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <?php echo ___('Minutes 0-59: *,*/3,3-5'); ?>
  </div>
  
  
 
 <div class="form-group">
    <label><?php echo ___('Hour'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['hour'])) echo $errors['hour']; ?></p>
      <input type="text" required class="form-control" name="hour" value="<?php echo HTML::entities(Arr::get($data, 'hour')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <?php echo ___('Hour 0-23: *,*/3,3-5'); ?>
 </div>
  
 <div class="form-group">
    <label><?php echo ___('Mday'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['mday'])) echo $errors['mday']; ?></p>
      <input type="text" required class="form-control" name="mday" value="<?php echo HTML::entities(Arr::get($data, 'mday')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <?php echo ___('Day of month 1-31: *,*/3,3-5'); ?>
 </div> 
 
 <div class="form-group">
    <label><?php echo ___('Month'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['month'])) echo $errors['month']; ?></p>
      <input type="text" required class="form-control" name="month" value="<?php echo HTML::entities(Arr::get($data, 'month')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <?php echo ___('Month 1-12: *,*/3,3-5'); ?>
 </div> 
 
 <div class="form-group">
    <label><?php echo ___('Wday'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['wday'])) echo $errors['wday']; ?></p>
      <input type="text" required class="form-control" name="wday" value="<?php echo HTML::entities(Arr::get($data, 'wday')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <?php echo ___('Day of week 1-7: *,*/3,3-5'); ?>
 </div> 
 
 <div class="form-group">
    <label><?php echo ___('Command'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['command'])) echo $errors['command']; ?></p>
      <input type="text" required class="form-control" name="command" value="<?php echo HTML::entities(Arr::get($data, 'command')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <?php echo ___('Command: with start slash for external programm and without slash for internal script'); ?>
 </div> 
 
 <div class="form-group">
    <label><?php echo ___('Comment'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['comment'])) echo $errors['comment']; ?></p>
      <input type="text" required class="form-control" name="comment" value="<?php echo HTML::entities(Arr::get($data, 'comment')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <?php echo ___('Comment'); ?>
 </div> 
  
  </div>
</div>
             
<div class="panel-footer">

  <?php if(($controller->getRights(Admin_Access::ACCESS_MODIFY)->result && !empty($data['id'])) || ($controller->getRights(Admin_Access::ACCESS_CREATE)->result && empty($data['id']))): ?>
  <div class="form-actions center">
  <button type="submit" name='save' class="btn btn-default"><?php if(empty($data['id'])):?><?php echo ___('Create'); ?><?php else: ?><?php echo ___('Save'); ?><?php endif; ?></button>
  </div>
  <?php endif; ?>
</div>
            
</form>
</div>

<script type="text/javascript">
$(document).ready(function() {
   // $("input,select,textarea").not("[type=submit]").jqBootstrapValidation({semanticallyStrict: true});
});
</script>
