<?php defined('SYSPATH') OR die('No direct script access.');

$warning = Admin_Session::instance()->get_once('FLASH_WARNING');
$error = Admin_Session::instance()->get_once('FLASH_ERROR');
$notice = Admin_Session::instance()->get_once('FLASH_NOTICE');

$title_page = $title;
if (is_array($title)){
    foreach ($title as $idx => $item)    $title[$idx] = ___($item);
    $title = array_reverse($title);
    $title_page = $title[0];
    $title = implode($title_separator, $title);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo HTML::entities($title); ?></title>

        <?php foreach ($_css as $item):?>
        <link href="<?php echo $item; ?>" rel="stylesheet" type="text/css" />
        <?php endforeach;?>
        <script src="/admin-content/lib/jquery/jquery.min.js"></script>
        
        <?php foreach ($_js as $item):?>
        <script src="<?php echo $item; ?>"></script>
        <?php endforeach;?>
       
        </head>

        <body>
<?php echo $content; ?>
   <?php foreach ($_js_bottom as $item):?>
    <script src="<?php echo $item; ?>"></script>
   <?php endforeach;?>
  </body>
</html>