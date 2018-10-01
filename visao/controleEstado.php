<?php
require_once "../DAO/DAOEstado.php";
require_once "../modelo/Estado.php";
require_once "../DAO/mySQL.class.php";

if(!empty($_GET['action'])){

  $estado = new Estado();
  $daoEstado = new DAOEstado();

  switch ($_GET['action']) {
    case 'insert':
      if( isset($_POST['nome']) && isset($_POST['sigla']) ){
        try {
          $estado->setNome($_POST['nome']);
          $estado->setSigla($_POST['sigla']);
          $daoEstado->queryInsert($estado);
          header("Location: http://localhost/admin/estado.php?status=add");
        }catch (Exception $e) {
          echo "Error:".$e;
        }
    }
    break;

    case 'delete':
      if(isset($_GET['id'])){
        try {
          $daoEstado->queryDelete($_GET['id']);
          header("Location: http://localhost/admin/estado.php?status=removed");
        }catch (Exception $e) {
          echo "Error:".$e;
        }
      }
    break;

    case 'update':
      if( isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['sigla']) ){
        try {
          $estado->setID($_POST['id']);
          $estado->setNome($_POST['nome']);
          $estado->setSigla($_POST['sigla']);
          $daoEstado->queryUpdate($estado);
          header("Location: http://localhost/admin/estado.php?status=updated");
        }catch (Exception $e) {
          echo "Error:".$e;
        }
      }
    break;
  }
}

?>
