<?php defined('SYSPATH') OR die('No direct script access.'); ?>
<div class="col-lg-12">
  <div class="form-group">
      <label><?php echo ___('Site name'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['site.main.name'])) echo $errors['site.main.name']; ?></p>
      <input type="text" required class="form-control" name="site#main#name" value="<?php echo HTML::entities(Arr::get($post, 'site.main.name')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <p class="help-block"><?php echo ___('site name will be display on title'); ?></p>
  </div>
  
  <div class="form-group">
      <label><?php echo ___('Site url'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['site.main.url'])) echo $errors['site.main.url']; ?></p>
      <input type="text" required class="form-control" name="site#main#url" value="<?php echo HTML::entities(Arr::get($post, 'site.main.url')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <p class="help-block"><?php echo ___('site url'); ?></p>
  </div>
  
  <div class="form-group">
      <label><?php echo ___('Site name separator'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['site.main.name_separator'])) echo $errors['site.main.name_separator']; ?></p>
      <input type="text" required class="form-control" name="site#main#name_separator" value="<?php echo HTML::entities(Arr::get($post, 'site.main.name_separator')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <p class="help-block"><?php echo ___('site name separator will be display on title'); ?></p>
  </div>
 
  <div class="form-group">
      <label><?php echo ___('Site description'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['site.main.description'])) echo $errors['site.main.description']; ?></p>
      <input type="text" class="form-control" name="site#main#description" value="<?php echo HTML::entities(Arr::get($post, 'site.main.description')); ?>">
      <p class="help-block"><?php echo ___('site description use for meta tag description'); ?></p>
  </div>
  
  <div class="form-group">
      <label><?php echo ___('Site keywords'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['site.main.keyword'])) echo $errors['site.main.keyword']; ?></p>
      <input type="text" class="form-control" name="site#main#keyword" value="<?php echo HTML::entities(Arr::get($post, 'site.main.keyword')); ?>">
      <p class="help-block"><?php echo ___('site keywords for meta tag keyword, enumeration words through comma'); ?></p>
  </div>
  
  <div class="form-group">
      <label><?php echo ___('Feedback email'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['site.main.feedback_email'])) echo $errors['site.main.feedback_email']; ?></p>
      <input type="email" class="form-control" required name="site#main#feedback_email" value="<?php echo HTML::entities(Arr::get($post, 'site.main.feedback_email')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
       data-validation-email-message="<?php echo ___('Not a valid email address'); ?>"
      >
      <p class="help-block"><?php echo ___('this email is used for feedback messages'); ?></p>
  </div>
  
  <div class="form-group">
      <label><?php echo ___('Module Main Page'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['site.main.default_module'])) echo $errors['site.main.default_module']; ?></p>
      <input type="text" class="form-control" required name="site#main#default_module" value="<?php echo HTML::entities(Arr::get($post, 'site.main.default_module')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <p class="help-block"><?php echo ___('default module'); ?></p>
  </div>
  
  <div class="form-group">
      <label><?php echo ___('Default Language'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['site.main.default_language'])) echo $errors['site.main.default_language']; ?></p>
      <input type="text" class="form-control" required name="site#main#default_language" value="<?php echo HTML::entities(Arr::get($post, 'site.main.default_language')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <p class="help-block"><?php echo ___('default language'); ?></p>
  </div>
  
  <?php $optReg = array('simple', 'verification', 'premoderate'); ?>
  <div class="form-group">
      <label><?php echo ___('Registration type'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['site.main.register_type'])) echo $errors['site.main.register_type']; ?></p>
      <select class="form-control" required name="site#main#register_type">
      <?php foreach ($optReg as $sel):?>
      <option value="<?php echo HTML::entities($sel);?>" <?php if ($sel == Arr::get($post, 'site.main.register_type')):?>selected<?php endif;?>><?php echo HTML::entities($sel);?></option>
      <?php endforeach;?>
      </select>
      <p class="help-block"><?php echo ___('registration type'); ?></p>
  </div>
  
  <div class="form-group">
      <label><?php echo ___('Format date'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['site.main.format_date'])) echo $errors['site.main.format_date']; ?></p>
      <input type="text" class="form-control" required name="site#main#format_date" value="<?php echo HTML::entities(Arr::get($post, 'site.main.format_date')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <p class="help-block"><?php echo ___('format date'); ?></p>
  </div>
  
  <div class="form-group">
      <label><?php echo ___('Format time'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['site.main.format_time'])) echo $errors['site.main.format_time']; ?></p>
      <input type="text" class="form-control" required name="site#main#format_time" value="<?php echo HTML::entities(Arr::get($post, 'site.main.format_time')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <p class="help-block"><?php echo ___('format time'); ?></p>
  </div>
</div>  