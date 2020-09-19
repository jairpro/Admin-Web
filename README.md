# Admin-Web
 Website de testes da [Admin-API](https://github.com/jairpro/Admin-API)


## Rotas
Rota | Descrição
---- | ---------
/ | Home com entrada do administrador
/admin/forgot_password | Esqueceu a senha? 
/admin/reset_password | Redefinição de senha


## Falta implementar:
 - Reenvio de redefinição de senha;
 - Painel do administrador;
 - Logout;
 - Alteração de senha;
 - Alteração do perfil;
 - Cadastro de administradores:
   - Listagem;
   - Visualização;
   - Alteração de dados;
   - Desativação/Reativação;
   - Exclusão;

## Melhorias:
 - Implemetar Vue com Vuex
   Ou fazer em duas versões: com/sem Vue;
   Ou uma terceira versão em ReactJS; 
 
 - Implementar Vue-axios; 
   Ou migrar/encapsular Router.php e Request.php do express-php-lite para frontend ao estilo react-router-dom (BrowserRouter, Route e Switch);

 - Implementar a Vue Router 
   Ou encapsular o ajax do jQuery para requisições ao estilo Axios;


# [MIT LICENSE](https://github.com/jairpro/Admin-Web/blob/master/LICENSE)
