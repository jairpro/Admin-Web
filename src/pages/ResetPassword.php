<?php

class ResetPassword {

  function index($req, $res) {
    $newPassword = "";
    $confirmPassword = "";
?>

<div id=container>
  <a class=logo href="/">
    <img 
      src="/imagens/logo.jpg" 
      alt="<?php echo APP_NAME; ?>"
      title="Página inicial"
    >
  </a>
  <h1>Redefinição de senha</h1>
  <div id=contentResetPassword class="content">
    <div id="message" class="info message hidden"></div>
    
    <div id="containerReset" class="show">
      <form id="formReset" onsubmit="submitReset(event)">
        <input type="password" name="newPassword" placeholder="Nova senha" value="<?php echo $newPassword; ?>" required autofocus>
        <input type="password" name="confirmPassword" placeholder="Confirme a senha" value="<?php echo $confirmPassword; ?>" required>
        <button id=enviar class="submit" type="submit">Redefinir</button>
      </form>
    </div>
    
    <div id="containerResend" class="hidden">
      <div id="verify" class="hidden">
        <p>Verifique a mensagem na caixa de entrada do seu email.<br><span class="note">NOTA: Caso não esteja lá, aguarde um pouco ou verifique na pasta spam (lixo eletrônico).</span></p>
        <br>
      </div>
      <form id="formResend" onsubmit="submitResend(event)">
        <div class="links">
          <a id="linkVoltar" onclick="voltar()">Voltar</a>
          <button id=reenviar class="submit" type="submit">Reenviar email</button>
          <a href="/">Entrar</a>
        </div>
      </form>
    </div>

    <button id=botaoEntrar class="hidden" onclick="entrar()" type="button">Entrar</button>
  </div>
</div>
  
<script>
  function entrar() {
    window.location = "/";
  }

  function voltar() {
    hidden(window.message);
    hidden(window.containerResend);
    show(window.containerReset);
    formReset.newPassword.focus();
    return false;
  }

  function submitResend(e) {
    e.preventDefault();

    hidden(window.message);
    hidden(window.verify);
    window.reenviar.disabled = true;
    window.reenviar.innerText = 'Reenviando...';

    var token = gup('token');
    if (!token) {
      window.location = "/admin/forgot_password";
      return false; 
    }

    api.postToken("/admin/forgot_password/resend", {
      success(result) {
        show(window.verify);
        hidden(window.linkVoltar);
        hidden(window.reenviar);
        window.reenviar.innerText = 'Reenviar email';
        window.reenviar.disabled = false;

        processResult(result);
      },
      error(error, message) {
        window.reenviar.innerText = 'Reenviar email';
        window.reenviar.disabled = false;

        processError(error, message);
      }
    });
  }

  function submitReset(e) {
    e.preventDefault();

    window.enviar.disabled = true;
    window.enviar.innerText = 'Enviando...';

    api.putToken('/admin/reset_password', {
      data: {
        newPassword: formReset.newPassword.value,
        confirmPassword: formReset.confirmPassword.value
      },
      success: function(result) {
        hidden(window.containerReset);
        hidden(window.containerResend);
        show(window.botaoEntrar);
        window.enviar.innerText = 'Redefinir';
        window.enviar.disabled = false;

        processResult(result);
      },
      error: function(error, message) {
        hidden(window.containerReset);
        show(window.containerResend);
        window.enviar.innerText = 'Redefinir';
        window.enviar.disabled = false;

        processError(error, message);
      }
    });
  }
</script>

<?php
    exit();
  }
}
