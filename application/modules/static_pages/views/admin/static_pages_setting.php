<?php defined('SYSPATH') OR die('No direct script access.'); ?>
<div class="col-lg-12">
<div class="form-group">
      <label><?php echo ___('Pages default path'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['site.pages.default_path'])) echo $errors['site.pages.default_path']; ?></p>
      <input type="text" required class="form-control" name="site#pages#default_path" value="<?php echo HTML::entities(Arr::get($post, 'site.pages.default_path')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <p class="help-block"><?php echo ___('default path'); ?></p>
 </div>
 </div>