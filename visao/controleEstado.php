<?php
require_once "../DAO/DAOEstado.php";
require_once "../modelo/Estado.php";
require_once "../DAO/mySQL.class.php";

if(!empty($_GET['tipo'])){

  $estado = new Estado();
  $daoEstado = new DAOEstado();

  switch ($_GET['tipo']) {
    case 'inserir':
      try {
        if( isset($_POST['nome']) && isset($_POST['sigla']) ){
          $estado->setNome($_POST['nome']);
          $estado->setSigla($_POST['sigla']);
          $daoEstado->queryInsert($estado);
          header("Location: http://localhost/admin/estado.php?status=sucessful");
        }
      } catch (Exception $e) {
          echo "Error:".$e;
      }
      break;

    case 'excluir':
      try {
          if(isset($_GET['id'])){
            $daoEstado->queryDelete($_GET['id']);
            header("Location: http://localhost/admin/estado_lista.php?status=removed");
          }
      } catch (Exception $e) {
          echo "Error:".$e;
      }
      break;

    case 'update':
      try {
          if( isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['sigla']) ){
            $estado->setID($_POST['id']);
            $estado->setNome($_POST['nome']);
            $estado->setSigla($_POST['sigla']);
            $daoEstado->queryUpdate($estado);
              header("Location: http://localhost/admin/estado_lista.php?status=updated");
          }
      } catch (Exception $e) {
          echo "Error:".$e;
      }
      break;
  }
}

?>
