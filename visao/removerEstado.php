<?php
include_once "../DAO/DAOEstado.php";
include_once "../modelo/Estado.php";
include_once "../DAO/mySQL.class.php";
$url = "www.google.com.br";
try {

  $daoEstado = new DAOEstado();

  if(isset($_GET["id"])){

    $daoEstado->queryDelete($_GET['id']);
  }
  header("Location: http://localhost/admin/estado_lista.php?status=removed");
}catch (Exception $erro){
  header("Location: http://localhost/admin/estado_lista.php?status=error&erro=".$erro);
}
?>
