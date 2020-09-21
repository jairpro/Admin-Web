<?php

class Home {

  function index($req, $res) {
    $acessarText = "Entrar";
    $acessarWait = "Verificando...";
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

  <br>
  <div id="contentLogin" class="content">
    <div id="message" class="info message hidden"></div>
    
    <div id="containerLogin" class="content">
      <form id=formLogin onsubmit="submitLogin(event)">
        <input type="text" name="user" placeholder="Nome de usuário" required autofocus>
        <input type="password" name="password" placeholder="Senha" required>
        <button id="acessar" class="submit" type="submit"><?php echo $acessarText; ?></button>
      </form>
      <a id="forgot" class="link" href="admin/forgot_password">Esqueceu a senha?</a>
    </div>
  </div>
</div>

<script>
  function submitLogin(e) {
    e.preventDefault();

    hidden(window.message);
    window.acessar.disabled = true;
    window.acessar.innerText = '<?php echo $acessarWait; ?>';

    api.post("/admin/login",{
      data: {
        username: formLogin.user.value,
        password: formLogin.password.value
      },
      success(result) {
        hidden(window.containerLogin);
        hidden(window.formLogin.user);
        hidden(window.formLogin.password);
        if (result && result.token) {
          setCookie("token", result.token, "10i");
        }
        show(window.message);
        hidden(window.acessar);
        hidden(window.forgot);
        window.acessar.innerText = 'Bem-vindo!';

        showMessage('Bem-vindo!');
        window.location = "/admin/painel";
      },
      error(error, message) {
        show(window.message);
        show(window.acessar);
        window.acessar.innerText = '<?php echo $acessarText; ?>';
        window.acessar.disabled = false;

        processError(error, "<h3>Access denied<h3><br>"+message);
      }
    });
  }
</script>

<?php
    exit();
  }
}