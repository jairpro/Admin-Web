<?php
    spl_autoload_register('appAutoload');

    function appAutoload($classname) {
      $dir = dirname(__FILE__)."/";
  
      $lista = array();
      $lista[] = $dir . "../modules/$classname.php";
      $lista[] = $dir . "pages/$classname.php";
      $lista[] = $dir . "$classname.php";

      foreach ($lista as $php) {
        if (file_exists($php)) {
          require_once $php;
        }
      }
    }