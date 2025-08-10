<?php defined('SYSPATH') OR die('No direct script access.'); ?>
<div class="col-lg-12">
<div class="form-group">
      <label><?php echo ___('Title'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['admin.admin.title'])) echo $errors['admin.admin.title']; ?></p>
      <input type="text" required class="form-control" name="admin#admin#title" value="<?php echo HTML::entities(Arr::get($post, 'admin.admin.title')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <p class="help-block"><?php echo ___('Title for admin panel'); ?></p>
 </div>
 
 <div class="form-group">
      <label><?php echo ___('Title separator'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['admin.admin.title_separator'])) echo $errors['admin.admin.title_separator']; ?></p>
      <input type="text" required class="form-control" name="admin#admin#title_separator" value="<?php echo HTML::entities(Arr::get($post, 'admin.admin.title_separator')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <p class="help-block"><?php echo ___('Title separator for admin panel'); ?></p>
 </div>
 
 <div class="form-group">
      <label><?php echo ___('Item on page'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['admin.admin.item_on_page'])) echo $errors['admin.admin.item_on_page']; ?></p>
      <input type="text" required class="form-control" name="admin#admin#item_on_page" value="<?php echo HTML::entities(Arr::get($post, 'admin.admin.item_on_page')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <p class="help-block"><?php echo ___('Item on page for pagination'); ?></p>
 </div>
 
 <div class="form-group">
      <label><?php echo ___('Default language'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['admin.admin.language_default'])) echo $errors['admin.admin.language_default']; ?></p>
      <input type="text" required class="form-control" name="admin#admin#language_default" value="<?php echo HTML::entities(Arr::get($post, 'admin.admin.language_default')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <p class="help-block"><?php echo ___('Default language for admin panel'); ?></p>
 </div>
 
 <div class="form-group">
      <label><?php echo ___('Language list for route'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['admin.admin.language_list'])) echo $errors['admin.admin.language_list']; ?></p>
      <input type="text" required class="form-control" name="admin#admin#language_list" value="<?php echo HTML::entities(Arr::get($post, 'admin.admin.language_list')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <p class="help-block"><?php echo ___('List of languages for admin panel route'); ?></p>
 </div>
 
 <div class="form-group">
      <label><?php echo ___('Database host'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['admin.database.host'])) echo $errors['admin.database.host']; ?></p>
      <input type="text" required class="form-control" name="admin#database#host" value="<?php echo HTML::entities(Arr::get($post, 'admin.database.host')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <p class="help-block"><?php echo ___(' '); ?></p>
 </div>
 
 <div class="form-group">
      <label><?php echo ___('Database port'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['admin.database.port'])) echo $errors['admin.database.port']; ?></p>
      <input type="text" required class="form-control" name="admin#database#port" value="<?php echo HTML::entities(Arr::get($post, 'admin.database.port')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <p class="help-block"><?php echo ___(' '); ?></p>
 </div>
 
 <div class="form-group">
      <label><?php echo ___('Database dbname'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['admin.database.dbname'])) echo $errors['admin.database.dbname']; ?></p>
      <input type="text" required class="form-control" name="admin#database#dbname" value="<?php echo HTML::entities(Arr::get($post, 'admin.database.dbname')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <p class="help-block"><?php echo ___(' '); ?></p>
 </div>
 
 <div class="form-group">
      <label><?php echo ___('Database username'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['admin.database.username'])) echo $errors['admin.database.username']; ?></p>
      <input type="text" required class="form-control" name="admin#database#username" value="<?php echo HTML::entities(Arr::get($post, 'admin.database.username')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <p class="help-block"><?php echo ___(' '); ?></p>
 </div>
 
 <div class="form-group">
      <label><?php echo ___('Database password'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['admin.database.password'])) echo $errors['admin.database.password']; ?></p>
      <input type="text" required class="form-control" name="admin#database#password" value="<?php echo HTML::entities(Arr::get($post, 'admin.database.password')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <p class="help-block"><?php echo ___(' '); ?></p>
 </div>
 
 <div class="form-group">
      <label><?php echo ___('Database charset'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['admin.database.charset'])) echo $errors['admin.database.charset']; ?></p>
      <input type="text" required class="form-control" name="admin#database#charset" value="<?php echo HTML::entities(Arr::get($post, 'admin.database.charset')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <p class="help-block"><?php echo ___(' '); ?></p>
 </div>
 
 <div class="form-group">
      <label><?php echo ___('Encrypt key'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['admin.encrypt.key'])) echo $errors['admin.encrypt.key']; ?></p>
      <input type="text" required class="form-control" name="admin#encrypt#key" value="<?php echo HTML::entities(Arr::get($post, 'admin.encrypt.key')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <p class="help-block"><?php echo ___(' '); ?></p>
 </div>
 
 <div class="form-group">
      <label><?php echo ___('Cookie salt'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['admin.main.cookie_salt'])) echo $errors['admin.main.cookie_salt']; ?></p>
      <input type="text" required class="form-control" name="admin#main#cookie_salt" value="<?php echo HTML::entities(Arr::get($post, 'admin.main.cookie_salt')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <p class="help-block"><?php echo ___(' '); ?></p>
 </div>
 
 <div class="form-group">
      <label><?php echo ___('Trusted hosts'); ?></label>
      <p class="help-block help-block-error"><?php if (isset($errors['admin.url.trusted_hosts'])) echo $errors['admin.url.trusted_hosts']; ?></p>
      <input type="text" required class="form-control" name="admin#url#trusted_hosts" value="<?php echo HTML::entities(Arr::get($post, 'admin.url.trusted_hosts')); ?>"
       data-validation-required-message="<?php echo ___('Fill the field'); ?>"
      >
      <p class="help-block"><?php echo ___('trusted hosts'); ?></p>
 </div>
 </div>