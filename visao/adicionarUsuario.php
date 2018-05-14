<?php
include_once "../DAO/DAOUsuario.php";
include_once "../DAO/mySQL.class.php";
require_once "../modelo/Usuario.php";

$usuario = new Usuario();
$daoUsuario = new DAOUsuario();

try {

  if(isset($_POST['login'])){
    $usuario->setLogin($_POST['login']);
  }

  if(isset($_POST['senha'])){
    $usuario->setSenha($_POST['senha']);
  }

  if(isset($_POST['email'])){
    $usuario->setEmail($_POST['email']);
  }

  if(isset($_POST['tipo'])){
    $usuario->setTipo($_POST['tipo']);
  }

  if(isset($_POST['pessoa_id'])){
    $usuario->setPessoaId($_POST['pessoa_id']);
  }


  $daoUsuario->queryInsert($usuario);
  header("Location: http://localhost/admin/usuario.php?status=sucessful");
} catch (Exception $e) {
  header("Location: http://localhost/admin/usuario.php?status=error&error=".$e);
}


?>
