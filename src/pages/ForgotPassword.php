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
  
  <h1>Recuperação de senha</h1>
  
  <div id="contentForgotPassword" class="content">
    <div id="message" class="info message hidden"></div>
    <div id="containerForgot" class="show">
      <p>Digite seu nome de usuário e clique em <strong>"Enviar"</strong> para receber no seu e-mail as instruções de recuperação da senha:</p>
      <br>

      <form id="formForgot" onsubmit="submitForgot(event)">
        <input type="text" name="user" placeholder="Nome de usuário" required autofocus>
        <button id=enviar class="submit" type="submit">Enviar</button>
      </form>
    </div>

    <div id="containerResend" class="hidden">
      <p>Verifique a mensagem na caixa de entrada do seu email.<br><span class="note">NOTA: Caso não esteja lá, aguarde um pouco ou verifique na pasta spam (lixo eletrônico).</span></p>
      <br>
      <form id="formResend" onsubmit="submitResend(event)">
        <div class="links">
          <a onclick="voltar()">Voltar</a>
          <button id=reenviar class="submit" type="submit">Reenviar</button>
          <a href="/">Entrar</a>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function voltar() {
    hidden(window.message);
    show(window.containerForgot);
    hidden(window.containerResend);
    formForgot.user.focus();
    return false;
  }

  function submitResend(e) {
    hidden(window.message);
    window.reenviar.disabled = true;
    window.reenviar.innerText = 'Reenviando...';
    submitForgot(e);
  }

  function submitForgot(e) {
    e.preventDefault();

    window.enviar.disabled = true;
    window.enviar.innerText = 'Enviando...';

    api.post("/admin/forgot_password", {
      data: {
        user: formForgot.user.value,
      },
      success(result) {
        hidden(window.containerForgot);
        show(window.containerResend);
        window.enviar.innerText = 'Enviar';
        window.enviar.disabled = false;
        window.reenviar.innerText = 'Reenviar';
        window.reenviar.disabled = false;
        processResult(result);
      },
      error(error, message) {
        window.enviar.innerText = 'Enviar';
        window.enviar.disabled = false;
        window.reenviar.innerText = 'Reenviar';
        window.reenviar.disabled = false;
        processError(error, message);
      }
    });
  }
</script>

<?php
    exit();
  }
}