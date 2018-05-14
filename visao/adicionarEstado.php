<?php
include_once "../DAO/DAOEstado.php";
include_once "../modelo/Estado.php";
include_once "../DAO/mySQL.class.php";
$url = "www.google.com.br";
try {

  $novoEstado = new Estado();
  $daoEstado = new DAOEstado();

  if(isset($_POST["nome"])){
    $novoEstado->setNome($_POST["nome"]);
  }

  if(isset($_POST["sigla"])){
    $novoEstado->setSigla($_POST["sigla"]);
  }

  $daoEstado->queryInsert($novoEstado);
  header("Location: http://localhost/admin/estado.php?status=sucessful");
} catch (Exception $erro){
  header("Location: http://localhost/admin/estado.php?status=error");
  }
?>
