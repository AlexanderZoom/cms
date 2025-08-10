<?php defined('SYSPATH') OR die('No direct script access.');
if (is_array($title)){
    foreach ($title as $idx => $item)    $title[$idx] = ___($item);
    $title = array_reverse($title);
    $title = implode($title_separator, $title);
}
?>
<?php echo $content;?>