<?php
  require_once "../src/init.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo APP_NAME?></title>
  <base href="<?php echo $base_url; ?>">
  <link rel="stylesheet" href="<?php echo updateCache('css/app.css'); ?>">
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="<?php echo updateCache('js/util.js'); ?>"></script>
</head>

<body>
  <div id="app"></div>
  <?php 
    require_once "../src/app.php";
  ?>
</body>

</html>