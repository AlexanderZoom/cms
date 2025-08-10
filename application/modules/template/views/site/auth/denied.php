<?php defined('SYSPATH') OR die('No direct script access.'); ?>
<div id="content_plain">
<div class="post_text">
<h2 class="title"><?php echo ___('Access denied'); ?></h2>
<div style="clear: both;">&nbsp;</div>
<div class="entry">
<?php if($is_logged):?>
<p><?php echo ___('You dont have access for it page');?></p>
<?php else:?>
<p><?php echo ___('This page available for registered user');?>. <a href="<?php echo URL::site(Route::url('site', array('controller'=>'login', 'lang' => $lang, 'action'=>'index')));?>"><?php echo ___('Sign In'); ?></a></p>
<?php endif;?>
</div>		
</div>					
<div style="clear: both;">&nbsp;</div>
</div>