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
    $title = implode($title_separator, $title);
}
?>
<?php echo $content;?>