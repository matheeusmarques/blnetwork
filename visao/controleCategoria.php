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
      try {
        if(isset($_POST['nome'])){
          $categoria->setNome($_POST['nome']);
        }

        if(isset($_POST['descricao'])){
          $categoria->setDescricao($_POST['descricao']);
        }

        if(isset($_POST['status'])){
          $categoria->setStatus($_POST['status']);
        }

        $daoCategoria->queryInsert($categoria);
        
          var_dump($_POST);
        } catch (Exception $e) {
        echo "Error:".$e;
      }

    case 'excluir':
      try {
        $daoCategoria->queryDelete($_POST['id']);
      } catch (Exception $e) {
        echo "Error:".$e;
      }
    break;

    default:
      # code...
      break;
  }
}
?>
