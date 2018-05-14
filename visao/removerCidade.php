<?php
include_once "../DAO/DAOCidade.php";
include_once "../DAO/mySQL.class.php";
try {

  $daoCidade = new DAOCidade();

  if(isset($_GET["id"])){

    $daoCidade->queryDelete($_GET['id']);
    header("Location: http://localhost/admin/cidade_lista.php?status=removed");
  }
} catch (Exception $erro){
  header("Location: http://localhost/admin/cidade_lista.php?status=error");
  }
?>
