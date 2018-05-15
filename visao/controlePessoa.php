<?php
require_once "../modelo/Pessoa.php";
require_once "../DAO/DAOPessoa.php";
require_once "../DAO/mySQL.class.php";

if(!empty($_GET['tipo'])){

  $pessoa = new Pessoa();
  $daoPessoa = new DAOPessoa();

  switch ($_GET['tipo']) {
    case 'inserir':
      try
        if( isset($_POST['nome']) && isset($_POST['cpf']) && isset($_POST['rg']) ){
          $pessoa->setNome($_POST['nome']);
          $pessoa->setRg($_POST['rg']);
          $pessoa->setCpf($_POST['cpf']);
          $pessoa->setSexo($_POST['sexo'];
          $pessoa->setDataNascimento($_POST['datanascimento']);
          $pessoa->setStatus($_POST['status']);
          $pessoa->setCidadeId($_POST['cidade']);

          $daoPessoa->queryInsert($pessoa);

    } catch (Exception $e) {
        echo "Error:".$e;
    }
    break;

    case 'excluir':
      try {
        if (isset($_GET['id'])){
          $daoPessoa->queryDelete($_POST['id']);
        }
      } catch (Exception $e) {
          echo "Error: ".$e;
      }
      break;

    case 'update':
      try {
        if(isset($_POST['id'])){
          $pessoa->setId($_POST['id']);
          $pessoa->setNome($_POST['nome']);
          $pessoa->setRg($_POST['rg']);
          $pessoa->setCpf($_POST['cpf']);
          $pessoa->setSexo($_POST['sexo'];
          $pessoa->setDataNascimento($_POST['datanascimento']);
          $pessoa->setStatus($_POST['status']);
          $pessoa->setCidadeId($_POST['cidade']);
          $daoPessoa->queryUpdate($pessoa);
        }else {
          header("Location: http://localhost/admin/pessoa_lista.php?status=erro");
        }
      } catch (Exception $e) {
          echo "Error: ".$e;
      }
    break;


      }
  }
?>