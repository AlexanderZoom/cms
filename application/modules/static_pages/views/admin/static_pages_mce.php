<?php defined('SYSPATH') OR die('No direct script access.');  $lang = I18n::lang();?>
tinymce.init({
  selector: '#mytextarea',
  forced_root_block : "",
  height: 500,
  theme: 'modern',
  relative_urls: false,
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools'
  ],
  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print media template | forecolor backcolor emoticons | preview fullscreen code',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
   
  ],
  file_browser_callback : function(field_name, url, type, win) { 

	    // from http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript
	    var w = window,
	    d = document,
	    e = d.documentElement,
	    g = d.getElementsByTagName('body')[0],
	    x = w.innerWidth || e.clientWidth || g.clientWidth,
	    y = w.innerHeight|| e.clientHeight|| g.clientHeight;

	var cmsURL = '<?php echo URL::site(Route::url('admin', array('controller'=>'media', 'lang' => $lang, 'action'=>'ind')));?>?&field_name='+field_name+'&langCode='+tinymce.settings.language;

	if(type == 'image') {           
	    cmsURL = cmsURL + "&type=images";
	}

	tinyMCE.activeEditor.windowManager.open({
	    file : cmsURL,
	    title : 'Filemanager',
	    width : x * 0.8,
	    height : y * 0.8,
	    resizable : "yes",
	    close_previous : "no"
	});         

	}
 });

