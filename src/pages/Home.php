<?php

class Home {

  function index($req, $res) {
?>

<div id="container">
  <a class="logo" href="/">
    <img 
      src="/imagens/logo.jpg" 
      alt="<?php echo APP_NAME; ?>"
      title="Página inicial"
    >
  </a>

  <h1>Olá Admin <?php echo APP_NAME; ?></h1>

  <div id="message" class="info message hidden"></div>

  <form id=form onsubmit="submitLogin(event)">
    <input type="text" name="user" placeholder="Nome de usuário" required autofocus>
    <input type="password" name="password" placeholder="Senha" require>
    <button class="submit" type="submit">Acessar</button>
  </form>
  <a class="link" href="admin/forgot_password">Esqueceu a senha?</a>
</div>

<script>
  function submitLogin(e) {
    e.preventDefault();
    
    api.post("/admin/login",{
      data: {
        username: form.user.value,
        password: form.password.value
      },
      success(result) {
        showMessage('Bem-vindo!');
      },
      error(error, message) {
        processError(error, "<h3>Access denied<h3><br>"+message);
      }
    });
  }
</script>

<?php
  }

}