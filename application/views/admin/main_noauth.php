<?php defined('SYSPATH') OR die('No direct script access.');
if (is_array($title)){
    foreach ($title as $idx => $item)    $title[$idx] = ___($item);
    $title = array_reverse($title);
    $title = implode(' ' . $title_separator . ' ', $title);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title><?php echo HTML::entities($title); ?></title>
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="/admin-content/img/metis-tile.png" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/admin-content/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/admin-content/lib/animate.css/animate.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="/admin-content/css/main.css">
    
    <!--jQuery -->
    <script src="/admin-content/lib/jquery/jquery.min.js"></script>

    <!--Bootstrap -->
    <script src="/admin-content/lib/bootstrap/js/bootstrap.js"></script>
    
  </head>
  <?php echo $content;?>
</html>