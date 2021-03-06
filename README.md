# Admin-Web
 Website de testes da [Admin-API](https://github.com/jairpro/Admin-API)

## Instalação:

### Configurar módulo principal:
 
 1) Copiar `/.env.example.php` para `/.env.php`;
 
 2) Configurar uma `/.env.php` para o ambiente desejado;

Constante | Descrição
--------- | ---------
API_URL | URL do deploy da Admin-API (veja instalação [aqui](https://github.com/jairpro/Admin-API#instala%C3%A7%C3%A3o)).
APP_NAME | Nome personalizado da aplicação 


## Rotas
Rota | Descrição | JWT
---- | --------- | ---
/ | Home com entrada do administrador
/admin/forgot_password | Esqueceu a senha? 
/admin/reset_password | Redefinição de senha
/admin/painel | Painel do Administrador | S
/admin/logout | Sair do Painel | S


## Falta implementar:
 - Painel do administrador;
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

 - Implementar a Vue Router;


# [MIT LICENSE](https://github.com/jairpro/Admin-Web/blob/master/LICENSE)
