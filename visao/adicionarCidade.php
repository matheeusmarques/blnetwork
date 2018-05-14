<?php
include_once "../DAO/DAOCidade.php";
include_once "../modelo/Cidade.php";
include_once "../DAO/mySQL.class.php";
$url = "www.google.com.br";
try {

  $cidade = new Cidade();
  $daoCidade = new DAOCidade();

  if(isset($_POST["nome"])){
    $cidade->setNome($_POST["nome"]);
  }

  if(isset($_POST["estado"])){
    $cidade->setIdEstado($_POST["estado"]);
  }

  $daoCidade->queryInsert($cidade);
  header("Location: http://localhost/admin/cidade.php?status=add");
} catch (Exception $erro){
  header("Location: http://localhost/admin/cidade.php?status=error");
  }
?>
