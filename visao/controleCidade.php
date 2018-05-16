<?php

require_once "../modelo/Cidade.php";
require_once "../DAO/DAOCidade.php";
require_once "../DAO/mySQL.class.php";

if(!empty($_GET['tipo'])){

  $cidade = new Cidade();
  $daoCidade = new DAOCidade();

  switch ($_GET['tipo']) {
    case 'inserir':
      if(isset($_POST["nome"]) && isset($_POST["estado"])){
        try {
          $cidade->setNome($_POST["nome"]);
          $cidade->setIdEstado($_POST["estado"]);
          $daoCidade->queryInsert($cidade);
          header("Location: http://localhost/admin/cidade_lista.php?status=sucessfull");
        }catch (Exception $e) {
          echo "Erro:".$e;
        }
      }
      break;

    case 'excluir':
      if(isset($_GET['id'])){
        try {
            $id = $_GET['id'];
            $daoCidade->queryDelete($id);
            header("Location: http://localhost/admin/cidade_lista.php?status=removed");
        }catch (Exception $e) {
          echo "Error: ".$e;
        }
      }
      break;

    case 'update':
      if(isset($_POST["id"]) && isset($_POST["nome"]) && isset($_POST["estadoid"])){
        try {
            $cidade->setID($_POST['id']);
            $cidade->setNome($_POST['nome']);
            $cidade->setIdEstado($_POST['estadoid']);
            $daoCidade->queryUpdate($cidade);
            header("Location: http://localhost/admin/cidade_lista.php?status=updated");
          } catch (Exception $e) {
            echo "Error: ".$e;
        }
      }
      break;
  }
}
?>
