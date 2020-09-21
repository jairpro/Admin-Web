<?php
  class Painel {
    function index($req, $res) {
?>

<div id="container">
  <h1>Bem-vindo!</h1>
  <a href="/admin/logout">Sair<a>
</div>

<?php
      exit();
    }

    function destroy($req, $res) {
?>
<script>
  function logout() {
    window.location = "/";
  }

  token = getCookie('token');
  removeCookie('token');

  api.delete('/admin/logout', {
    success(result) {
      logout();
    },
    error(error, message) {
      logout();
    }
  }, token);
</script>
<?php
      exit();
    }
  }
?>
