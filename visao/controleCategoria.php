<?php
// requires
require_once "../modelo/Categoria.php";
require_once "../DAO/DAOCategoria.php";
require_once "../DAO/mySQL.class.php";

if(!empty($_GET['tipo'])){
  $categoria = new Categoria();
  $daoCategoria = new DAOCategoria();
  switch ($_GET['tipo']) {
    case 'inserir':
      if(isset($_POST['nome'] && isset($_POST['descricao'])){
        try {
          $categoria->setNome($_POST['nome']);
          $categoria->setStatus($_POST['status']);
          $categoria->setDescricao($_POST['descricao']);
          $daoCategoria->queryInsert($categoria);
        } catch (Exception $e) {
          echo "Error:".$e;
        }
      }
      case 'excluir':
        if(isset($_GET['id'])){
          try {
            $daoCategoria->queryDelete($_GET['id']);
            header("Location: http://localhost/admin/categoria_lista.php?status=removed");
          }catch (Exception $e) {
            echo "Error:".$e;
          }
        }
      break;

    case 'update':
      try {
        if(isset($_POST['id']){
          $categoria->setId($_POST['id']);
          $categoria->setNome($_POST['nome']);
          $categoria->setDescricao($_POST['descricao']);
          $categoria->setStatus($_POST['status']);

          $daoCategoria->queryUpdate($categoria);
        }
      } catch (Exception $e) {
          echo "Error:".$e;
      }

  }
}
?>
