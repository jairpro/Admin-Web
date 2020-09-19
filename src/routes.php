<script src="<?php echo updateCache('js/API.js'); ?>"></script>
<script>
  api = API;
  api.url = "<?php echo API_URL; ?>";
</script>

<?php
  require_once "../modules/express-php-lite/autoload.php";
  $router = new Router();

  $router->get("/", ["Home","index"]);
  $router->get("/admin/forgot_password", ["ForgotPassword","index"]);
  $router->get("/admin/reset_password", ["ResetPassword","index"]);
