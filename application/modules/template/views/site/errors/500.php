<?php defined('SYSPATH') OR die('No direct script access.'); $lang = I18n::lang();?>
<div id="content_error">
<div class="post">
<div class='error_num'>500</div>
<div class='error_text'><?php echo ___('Internal server error'); ?></div>
<div class='error_text_desc'><?php echo ___('Please, contact to technical support'); ?><br/>
<a href='<?php echo URL::site(Route::url('default', array('lang' => $lang)));?>'><?php echo ___('Go to home'); ?></a>
</div>
</div>
<div style="clear: both;">&nbsp;</div>
</div>
