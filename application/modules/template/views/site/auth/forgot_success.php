<?php defined('SYSPATH') OR die('No direct script access.'); ?>
<div id="content_plain">
<div class="post_text">
<h2 class="title"><?php echo ___('Reset password'); ?></h2>
<div style="clear: both;">&nbsp;</div>
<div class="entry">
<p><?php echo ___('New password was set');?>. <?php echo ___('Page for signin');?> 
<a href="<?php echo URL::site(Route::url('site', array('controller'=>'login', 'lang' => $lang, 'action'=>'index')));?>"><?php echo ___('click here');?></a>.</p>
</div>		
</div>					
<div style="clear: both;">&nbsp;</div>
</div>