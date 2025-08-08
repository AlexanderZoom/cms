<?php defined('SYSPATH') OR die('No direct script access.'); ?>
<div class="panel panel-default">
<form class="form-horizontal" method="POST" action="" novalidate>
<div class="panel-body">
<div class="col-lg-12">

  <div class="form-group">
      <label><?php echo ___('Code'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['code'])) echo $errors['code']; ?></p>
      <input type="text" required class="form-control" name="code" value="<?php echo HTML::entities(Arr::get($data, 'code')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
  </div>
  
  
 
 <div class="form-group">
    <div class="checkbox">
    <label>
    <input type="checkbox" value="1" name="disabled" <?php if ($data['disabled']):?>checked="checked"<?php endif;?>>
    <?php echo ___('Disable group'); ?>
    </label>
    </div>
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
