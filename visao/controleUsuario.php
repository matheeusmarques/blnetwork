<?php
include_once "../DAO/DAOUsuario.php";
include_once "../DAO/mySQL.class.php";
require_once "../modelo/Usuario.php";


if(!empty($_GET['tipo'])){

  $usuario = new Usuario();
  $daoUsuario = new DAOUsuario();

  switch ($_GET['tipo']) {
    case 'inserir':
      try {
        if(isset($_POST['login']) && isset($_POST['pessoa_id']) && isset($_POST['senha'])
        && isset($_POST['email']) && isset($_POST['tipo'])) {
          $usuario->setLogin($_POST['login']);
          $usuario->setSenha($_POST['senha']);
          $usuario->setEmail($_POST['email']);
          $usuario->setTipo($_POST['tipo']);
          $usuario->setSaldo($_POST['saldo']);
          $usuario->setPessoaId($_POST['pessoa_id']);
          $usuario->setStatus($_POST['status']);
          $daoPessoa->queryInsert($usuario);
        }
      }catch(Exception $e){
          echo "Error:".$e;
      }
      break;

    case 'excluir':
      if(isset($_GET['id'])){
        try {
            $daoUsuario->queryDelete($_GET['id']);
        }catch (Exception $e) {
          echo "Error:".$e;
        }
      }
    break;

    case 'update':
      try {
        if(isset($_POST['id'])){
          $usuario->setLogin($_POST['login']);
          $usuario->setSenha($_POST['senha']);
          $usuario->setEmail($_POST['email']);
          $usuario->setTipo($_POST['tipo']);
          $usuario->setSaldo($_POST['saldo']);
          $usuario->setPessoaId($_POST['pessoa_id']);
          $usuario->setStatus($_POST['status']);

          $daoUsuario->queryUpdate($usuario);
       }
       ///else{
      //   // heade;
      // }
      } catch (\Exception $e) {
          echo "Error:".$e;
      }
      break;

    case 'login':
      if(isset($_POST['login']) && isset($_POST['senha'])){
        session_start();
        $usuario = new Usuario();
        $usuario->setLogin($_POST['login']);
        $usuario->setSenha($_POST['senha']);
        try {

          $currentuser = $daoUsuario->checkCredentials($usuario);
          if(!empty($currentuser->getId())){
            // enviando dados através da sessão
            $_SESSION['id'] = $currentuser->getId();
            $_SESSION['login'] = $currentuser->getLogin();
            $_SESSION['email'] = $currentuser->getEmail();
            $_SESSION['senha'] = $currentuser->getSenha();
            $_SESSION['tipo'] = $currentuser->getTipo();
            $_SESSION['saldo'] = $currentuser->getSaldo();
            $_SESSION['status'] = $currentuser->getStatus();
            header("Location: http://localhost/admin/index.php");
          }else{
            unset ($_SESSION['login']);
            unset ($_SESSION['senha']);
            header("Location: http://localhost/admin/login.php?status=error");
          }

        } catch (Exception $e) {
            echo "Error:".$e;
        }
      }
      break;

      case 'logout':
        if(isset($_SESSION['login'])){
          try {
            session_destroy();
            header("Location: http://localhost/admin/login.php");
          } catch (Exception $e) {
              echo "Error: ".$e;
          }
        }
        break;
    }
}else{
  return header("Location: http://localhost/admin/page_403.html");
}
 ?>
