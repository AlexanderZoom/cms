<?php defined('SYSPATH') OR die('No direct script access.'); ?>
<div class="panel panel-default">
<form class="form-horizontal" method="POST" action="" novalidate>
<div class="panel-body">
<div class="col-lg-9">

  <div class="form-group">
      <label><?php echo ___('Title'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['title'])) echo $errors['title']; ?></p>
      <input type="text" required class="form-control" name="title" value="<?php echo HTML::entities(Arr::get($data, 'title')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
  </div>
  
  <div class="form-group">
      <label><?php echo ___('Slug'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['slug'])) echo $errors['slug']; ?></p>
      <input type="text" required class="form-control" name="slug" value="<?php echo HTML::entities(Arr::get($data, 'slug')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
  </div>
  
  <div class="form-group">
   <textarea id="mytextarea" name="text"><?php echo HTML::entities(Arr::get($data, 'text')); ?></textarea>
  </div>
  
  </div>
  
  <div class="col-lg-3">
  <div class="form-group form-group-fix">
     <label><?php echo ___('Published At'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['published_at'])) echo $errors['published_at']; ?></p>
     
     <div class='input-group date' id='datetimepickerpages'>
     <input type="text" required class="form-control" name="published_at" value="<?php echo HTML::entities(Arr::get($data, 'published_at')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>" />
     <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span> </span>
     </span> 
     
     </div>
     </div>
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
	$('#datetimepickerpages').datetimepicker({
	    format: 'YYYY-MM-DD HH:mm:ss'
	  });
	//$('.multiselect').multiselect({numberDisplayed: 7});
    //$("input,select,textarea").not("[type=submit]").jqBootstrapValidation({semanticallyStrict: true});
});
</script>
