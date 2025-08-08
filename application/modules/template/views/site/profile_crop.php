<?php defined('SYSPATH') OR die('No direct script access.');
?>
<script>
  $( function() {
	  $('#cropimg').imgAreaSelect({
	        onSelectEnd: function (img, selection) {
	            $('input[name="x1"]').val(selection.x1);
	            $('input[name="y1"]').val(selection.y1);
	            $('input[name="x2"]').val(selection.x2);
	            $('input[name="y2"]').val(selection.y2);            
	        },
	        aspectRatio: '1:1', 
	        handles: true
	    });
  } );
  </script>
<div id="content_plain">
<div class="post_text">
<h2 class="title"><?php echo ___('Image crop');?></h2>
<div class="profile-page">
  <div class="form-width form">
  <p class="message_top"><?php echo ___($warning);?> </p>
    <p><?php echo ___('Please select an area for the thumbnails')?></p>
    <img src="<?php echo $tmpimg;?>" id="cropimg"/>
    <p>&nbsp</p>
    <form class="info-form" method="post" action="<?php echo URL::site(Route::url('site', array('controller' => 'profile', 'lang'=> $lang, 'action'=> 'upload' )));?>">
  <input type="hidden" name="x1" value="" />
  <input type="hidden" name="y1" value="" />
  <input type="hidden" name="x2" value="" />
  <input type="hidden" name="y2" value="" />
  <button name="crop" type="submit"><?php echo ___('Crop'); ?></button>    
  </form>
  </div>
</div>	
</div>					
<div style="clear: both;">&nbsp;</div>
</div>