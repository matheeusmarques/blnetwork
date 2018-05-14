<?php

// requires
require_once "../DAO/DAOUsuario.php";
require_once "../DAO/mySQL.class.php";
require_once "../modelo/Usuario.php";

session_start();
$usuario = new Usuario();

if(isset($_POST['login'])){
  $usuario->setLogin($_POST['login']);
}

if(isset($_POST['senha'])){
  $usuario->setSenha($_POST['senha']);
}

try {
  // $usuario = new Usuario();
  $daoUsuario = new DAOUsuario();

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

} catch (\Exception $e) {

}


?>
