<script src="<?php echo updateCache('js/API.js'); ?>"></script>
<script>
  api = API;
  api.url = "<?php echo API_URL; ?>";
</script>

<?php
  require_once "../modules/express-php-lite/autoload.php";

  $router = new Router();

  $login = ["Home","index"];

  $router->get("/", $login);
  $router->get("/admin/forgot_password", ["ForgotPassword","index"]);
  $router->get("/admin/reset_password", ["ResetPassword","index"]);

  if (!isset($_COOKIE['token']) || !$_COOKIE['token']) {
    $router->use($login);
  }
  else {
    $router->get("/admin/painel", ["Painel","index"]);
    $router->get("/admin/logout", ["Painel","destroy"]);
  }
?>
