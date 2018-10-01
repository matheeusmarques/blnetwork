<?php
include_once "../DAO/DAOUsuario.php";
include_once "../DAO/mySQL.class.php";
require_once "../modelo/Usuario.php";


if(!empty($_GET['action'])){

  $usuario = new Usuario();
  $daoUsuario = new DAOUsuario();

  switch ($_GET['action']) {
    case 'insert':
      try {
        if(isset($_POST['login']) && isset($_POST['pessoa_id']) && isset($_POST['senha'])
        && isset($_POST['email']) && isset($_POST['tipo'])) {
          $usuario->setLogin($_POST['login']);
          $usuario->setSenha($_POST['senha']);
          $usuario->setEmail($_POST['email']);
          $usuario->setTipo($_POST['tipo']);
          $usuario->setSaldo(0.0);
          $usuario->setPessoaId($_POST['pessoa_id']);
          $usuario->setStatus(1);
          $daoUsuario->queryInsert($usuario);
          header("Location: http://localhost/admin/usuario.php?status=sucessful");

        }
      }catch(Exception $e){
          echo "Error:".$e;
      }
      break;

    case 'register':
    echo "teste";
      try {
        if(isset($_POST['login'])) {
          // echo "test2e";
          var_dump($_POST);
          $usuario->setLogin($_POST['login']);
          $usuario->setSenha($_POST['password']);
          $usuario->setEmail($_POST['email']);
          // $usuario->setTipo($_POST['tipo']);
          $usuario->setTipo("membro");
          $usuario->setSaldo(0.0);
          // $usuario->setPessoaId($_POST['pessoa_id']) ;
          $usuario->setStatus(1);
          $daoUsuario->queryRegister($usuario);
          // var_dump($daoUsuario->queryRegister($usuario));
          header("Location: http://localhost/admin/login.php#signin");

        }
      }catch(Exception $e){
          echo "Error:".$e;
      }
      break;

    case 'delete':
      if(isset($_GET['id'])){
        try {
            $daoUsuario->queryDelete($_GET['id']);
            header("Location: http://localhost/admin/usuario.php?status=removed");
        }catch (Exception $e) {
          echo "Error:".$e;
        }
      }
    break;

    case 'update':
      try {
        if(isset($_POST['id'])){
          $usuario->setLogin($_POST['login']);
          // $usuario->setSenha($_POST['senha']);
          $usuario->setEmail($_POST['email']);
          $usuario->setId($_POST['id']);
          $usuario->setTipo($_POST['tipo']);
          // $usuario->setSaldo($_POST['saldo']);
          $usuario->setPessoaId($_POST['pessoa_id']);
          $usuario->setStatus($_POST['status']);

          $daoUsuario->queryUpdate($usuario);
          header("Location: http://localhost/admin/usuario.php?status=updated");

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
            $_SESSION['tipo'] = $currentuser->getTipo();
            $_SESSION['saldo'] = $currentuser->getSaldo();
            $_SESSION['status'] = $currentuser->getStatus();
            $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
            $_SESSION['p_id'] = $currentuser->getPessoaId();
            $_SESSION['last_activity'] = time();
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
            session_start();
            session_destroy();
            header("Location: http://localhost/admin/login.php");
        break;
    }
  }
 ?>
