<?php defined('SYSPATH') OR die('No direct script access.');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title><?php echo HTML::entities(___('Error') . ' '. $code); ?></title>
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="/admin-content/img/metis-tile.png" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/admin-content/lib/bootstrap/css/bootstrap.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin-content/lib/components-font-awesome/css/font-awesome.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="/admin-content/css/main.css">
  </head>
  <body class="error">
    <div class="container">
        <?php echo $content;?>
    </div>
</body>
</html>