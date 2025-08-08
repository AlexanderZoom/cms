<?php defined('SYSPATH') OR die('No direct script access.');

$warning = Site_Session::instance()->get_once('FLASH_WARNING');
$error = Site_Session::instance()->get_once('FLASH_ERROR');
$notice = Site_Session::instance()->get_once('FLASH_NOTICE');
$lang = Site_Language::get();

$title_page = $title;
if (is_array($title)){
    foreach ($title as $idx => $item)    $title[$idx] = ___($item);
    $title = array_reverse($title);
    $title_page = $title[0];
    $title = implode(' ' . $title_separator . ' ', $title);
}

$header = View::factory('site/main_header')
->bind('warning', $warning)
->bind('error', $error)
->bind('notice', $notice)
->bind('title', $title)
->bind('lang', $lang)
->bind('menus', $menus)
->bind('controller', $controller)
->bind('current_user', $current_user)
->bind('is_logged', $is_logged);


$footer = View::factory('site/main_footer')
 ->bind('warning', $warning)
 ->bind('error', $error)
 ->bind('notice', $notice)
 ->bind('title', $title)
 ->bind('lang', $lang)
 ->bind('menus', $menus)
 ->bind('controller', $controller)
 ->bind('current_user', $current_user)
 ->bind('is_logged', $is_logged);

$sidebar = View::factory('site/main_sidebar')
->bind('warning', $warning)
->bind('error', $error)
->bind('notice', $notice)
->bind('title', $title)
->bind('lang', $lang)
->bind('menus', $menus)
->bind('controller', $controller)
->bind('current_user', $current_user)
->bind('is_logged', $is_logged);

if ($content){
$content->bind('sidebar', $sidebar)
->bind('warning', $warning)
->bind('error', $error)
->bind('notice', $notice)
;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title><?php echo $title; ?></title>

<!-- VK -->
<meta name="title" content="<?php echo $title; ?>">
<meta name="description" content="<?php echo $title_description;?>">
<link rel="image_src" href="">

<!-- FACEBOOK -->
<meta property="og:title" content="<?php echo $title; ?>">
<meta property="og:description" content="<?php echo $title_description;?>">
<meta property="og:image" content="">
  
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed|Open+Sans:400,300,700|Yesteryear" rel="stylesheet" type="text/css" />
<link href="/css/style.css" rel="stylesheet" type="text/css" media="screen" />
<?php foreach ($_css as $item):?>
<link href="<?php echo $item; ?>" rel="stylesheet" type="text/css" />
<?php endforeach;?>

<!--jQuery -->
<script src="/js/jquery.min.js"></script>

<?php foreach ($_js as $item):?>
<script src="<?php echo $item; ?>"></script>
<?php endforeach;?>
</head>
<body>
<?php echo $header; ?>
<div id="menu-wrapper">
	<div id="menu">
		<ul>
			<?php $menus = Site_Menu::get('TOPMENU', '');
			      array_shift($menus['line']);
			foreach ($menus['line'] as $menu):?>
			<li><a href="<?php echo $menu['url'];?>" target="_<?php echo $menu['target'];?>"><?php echo ___($menu['name']);?></a></li>
			<?php endforeach;?>
		</ul>
	</div>
	<!-- end #menu -->
</div>
<div id="wrapper">
	<!-- end #header -->
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<?php echo $content;?>
				<div style="clear: both;">&nbsp;</div>
			</div>
		</div>
	</div>
	<!-- end #page -->
</div>
<?php echo $footer; ?>
<!-- end #footer -->
<?php foreach ($_js_bottom as $item):?>
<script src="<?php echo $item; ?>"></script>
<?php endforeach;?>
</body>
</html>