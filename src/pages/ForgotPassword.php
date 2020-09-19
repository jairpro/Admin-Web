<?php

class ForgotPassword {

  function index($req, $res) {
?>

<div id=container>
  <a class=logo href="/">
    <img 
      src="/imagens/logo.jpg"
      alt="<?php echo APP_NAME; ?>"
      title="Página inicial"
    >
  </a>
  
  <h1>Recupere sua senha</h1>
  
  <p>Digite seu nome de usuárioe e clique em 'Enviar'  para receber no seu e-mail as instruções de recuperação da senha:</p>
  <br>

  <div id="message" class="info message hidden"></div>

  <form id="form" onsubmit="submitForgot(event)">
    <input type="text" name="user" placeholder="Nome de usuário" required autofocus>
    <button class="submit" type="submit">Enviar</button>
  </form>
</div>

<script>
  function submitForgot(e) {
    e.preventDefault();

    api.post("/admin/forgot_password", {
      data: {
        user: form.user.value,
      },
      success(result) {
        processResult(result);
      },
      error(error, message) {
        processError(error, message);
      }
    });
    /*
    $.ajax("<?php //echo API_URL; ?>/admin/forgot_password", {
      method: 'POST',
      dataType: 'json',
      async: true,
      data: {
        user: form.user.value,
      },
      crossDomain: true,
      success(result) {
        var text = result.message ? result.message : result.error;
        alert(text);
      },
      error(error, message) {
        var text = !error.responseJSON ? (message+':\n\n'+(!error ? 'Request failed.' : error.responseError)) : (error.responseJSON.message ? error.responseJSON.message : error.responseJSON.error);
        alert(text);
      }
    });
    */
  }
</script>

<?php
  }
}