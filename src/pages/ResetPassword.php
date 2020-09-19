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
  <h1>Redefina sua senha</h1>
  <div id="message" class="info message hidden"></div>

  <div id="containerReset" clas="show">
    <form id="formReset" onsubmit="submitReset(event)">
      <input type="password" name="newPassword" placeholder="Nova senha" value="<?php echo $newPassword; ?>" required autofocus>
      <input type="password" name="confirmPassword" placeholder="Confirme a senha" value="<?php echo $confirmPassword; ?>" required>
      <button class="submit" type="submit">Redefinir</button>
    </form>
  </div>

  <div id="containerResend" class="hidden">
    <form id="formResend" onsubmit="submitResend(event)">
      <button class="submit" type="submit">Reenviar Instruções</button>
    </form>
  </div>
</div>

<script>
  function submitReset(e) {
    e.preventDefault();

    classChange(window.containerResend, "show", "hidden");

    api.putToken('/admin/reset_password', {
      data: {
        newPassword: formReset.newPassword.value,
        confirmPassword: formReset.confirmPassword.value
      },
      success: function(result) {
        classChange(window.containerReset, "show", "hidden");
        processResult(result);
      },
      error: function(error, message) {
        classChange(window.containerReset, "hidden", "show");
        classChange(window.containerResend, "show","hidden");
        processError(error, message);
      }
    });
    /*
    $.ajax('<?php //echo API_URL; ?>/admin/reset_password', {
      method: "PUT",
      dataType: "json",
      async: true,
      data: {
        newPassword: formReset.newPassword.value,
        confirmPassword: formReset.confirmPassword.value
      },
      headers: {
        'Authorization': 'Bearer '+gup('token')
      },
      crossDomain: true,
      success: function(result) {
        classChange(window.containerReset, "show", "hidden");
        processResult(result);
      },
      error: function(error, message) {
        classChange(window.containerReset, "hidden", "show");
        classChange(window.containerResend, "show","hidden");
        if (error.responseJSON) {
          processResult(error.responseJSON, error.statusCode);
        }
        else {
          var complement = error.responseText ? (": "+error.responseText) : "";
          showError(message+complement);
        }
      }
    });
    */
  }

  function submitResend(e) {
    e.preventDefault();

    api.postToken("/admin/forgot_password/resend", {
      success(result) {
        processResult(result);
      },
      error(error, message) {
        processError(error, message);
      }
    });
    /*
    $.ajax("<?php echo API_URL; ?>/admin/forgot_password/resend", {
      method: 'POST',
      dataType: 'json',
      async: true,
      headers: {
        'Authorization': 'Bearer '+gup('token')
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
