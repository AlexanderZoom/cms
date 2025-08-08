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
      <label><?php echo ___('Url'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['url'])) echo $errors['url']; ?></p>
      <input type="text" required class="form-control" name="url" value="<?php echo HTML::entities(Arr::get($data, 'url')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
  </div>
  
  <div class="form-group">
      <label><?php echo ___('Target'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['target'])) echo $errors['target']; ?></p>
      <select class="form-control" name="target">
      <?php foreach ($target as $item): ?>
      <option value="<?php echo HTML::entities($item);?>" <?php if ($item == $data['target']):?>selected<?php endif;?>><?php echo $item; ?></option>
      <?php endforeach;?>
      </select>
  </div>
  
  <div class="form-group">
      <label><?php echo ___('Parent'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['parent'])) echo $errors['parent']; ?></p>
      <select class="form-control" name="parent">
      <option value="null"><?php echo ___('No parent');?></option>
      <?php $currentPath = ''; 
      		foreach ($menu['line'] as $item): 
     
      
      if (isset($data['id']) && $data['id'] == $item['id']){
		$currentPath = $item['path'];
		continue;
	  }
	  
	  
	  if ($currentPath && (strpos($item['path'], $currentPath) !== FALSE)) continue;
      ?>
      <option value="<?php echo HTML::entities($item['id']);?>" <?php if ($item['id'] == $data['parent']):?>selected<?php endif;?>><?php echo $item['name_prefix']; ?></option>
      <?php endforeach;?>
      </select>
  </div>
  
  <div class="form-group">
      <label><?php echo ___('Position'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['position'])) echo $errors['position']; ?></p>
      <input type="text" required class="form-control" name="position" value="<?php echo HTML::entities(Arr::get($data, 'position')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
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
