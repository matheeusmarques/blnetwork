<?php
// requires
require_once "../modelo/Categoria.php";
require_once "../DAO/DAOCategoria.php";
require_once "../DAO/mySQL.class.php";

if(!empty($_GET['action'])){
  $categoria = new Categoria();
  $daoCategoria = new DAOCategoria();
  switch ($_GET['action']) {
    case 'insert':
      if(isset($_POST['name']) && isset($_POST['description']) ) {
        try {
          $categoria->setName($_POST['name']);
          $categoria->setStatus($_POST['status']);
          $categoria->setDescription($_POST['description']);
          $daoCategoria->queryInsert($categoria);
          // var_dump($_POST);
          // print_r("TESTE");
          header("Location: http://localhost/admin/categoria.php?status=add");
        } catch (Exception $e) {
          echo "Error:".$e;
        }
      }
      case 'delete':
        if(isset($_GET['id'])){
          try {
            $categoria->setId($_GET['id']);
            $daoCategoria->queryDelete($categoria);
            header("Location: http://localhost/admin/categoria.php?status=removed");
          }catch (Exception $e) {
            echo "Error:".$e;
          }
        }
      break;

    case 'update':
      try {
        if(isset($_POST['id']) ){
          $categoria->setId($_POST['id']);
          $categoria->setName($_POST['name']);
          $categoria->setStatus($_POST['status']);
          $categoria->setDescription($_POST['description']);

          $daoCategoria->queryUpdate($categoria);
          header("Location: http://localhost/admin/categoria.php?status=updated");
        }
      } catch (Exception $e) {
          echo "Error:".$e;
      }

  }
}
?>
