<?php

ini_set("error_log", "../php_errors.log");

$base_url = (isset($_SERVER['HTTP_X_FORWARDED_PROTO'])
    ? $_SERVER['HTTP_X_FORWARDED_PROTO'] 
    : $_SERVER['REQUEST_SCHEME'])
  ."://".$_SERVER['HTTP_HOST'];

require_once "../.env.php";

function updateCache($file) {
  return $file."?".filemtime($file);
}
