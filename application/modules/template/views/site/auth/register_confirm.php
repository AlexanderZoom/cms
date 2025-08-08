<?php defined('SYSPATH') OR die('No direct script access.'); ?>
<div id="content_plain">
<div class="post_text">
<h2 class="title"><?php echo ___('Confirmation registration'); ?></h2>
<div style="clear: both;">&nbsp;</div>
<div class="entry">
<?php if($warning):?>
<p><?php echo ___($warning); ?></p>
<?php else:?>
<p>
<?php echo ___('Confirmation registration completed'); ?>
<br/>
<?php echo ___('Go to page');?> <a href="<?php echo URL::site(Route::url('site', array('controller'=>'login', 'lang' => $lang, 'action'=>'index')));?>"><?php echo ___('signin2'); ?></a></p>
<?php endif;?>
</div>		
</div>					
<div style="clear: both;">&nbsp;</div>
</div>