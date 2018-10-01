<?php
require_once "../modelo/Pessoa.php";
require_once "../DAO/DAOPessoa.php";
require_once "../DAO/mySQL.class.php";

if(!empty($_GET['action'])){

  $pessoa = new Pessoa();
  $daoPessoa = new DAOPessoa();

  switch ($_GET['action']) {
    case 'insert':
        if( isset($_POST['nome']) && isset($_POST['cpf']) && isset($_POST['rg']) ){
          try{
            $pessoa->setNome($_POST['nome']);
            $pessoa->setRg($_POST['rg']);
            $pessoa->setCpf($_POST['cpf']);
            $pessoa->setSexo($_POST['sexo']);
            $pessoa->setDataNascimento($_POST['datanascimento']);
            $pessoa->setStatus('1');
            $pessoa->setCidadeId($_POST['cidade']);

            $daoPessoa->queryInsert($pessoa);
            header("Location: http://localhost/admin/pessoa.php?status=sucessful");

          } catch (Exception $e) {
              echo "Error:".$e;
          }
        }
    break;

    case 'delete':
        if (isset($_GET['id'])){
          try {
            $daoPessoa->queryDelete($_GET['id']);
            header("Location: http://localhost/admin/pessoa.php?status=removed");
          } catch (Exception $e) {
            echo "Error: ".$e;
          }
        }
      break;

    case 'update':
      if(isset($_POST['id'])){
        try {
          $pessoa->setNome($_POST['nome']);
          $pessoa->setId($_POST['id']);
          $pessoa->setRg($_POST['rg']);
          $pessoa->setCpf($_POST['cpf']);
          $pessoa->setDataNascimento($_POST['data_nascimento']);
          $pessoa->setCidadeId($_POST['cidade_id']);
          $pessoa->setSexo($_POST['sexo']);
          $pessoa->setStatus($_POST['status']);
          $daoPessoa->queryUpdate($pessoa);
          header("Location: http://localhost/admin/pessoa.php?status=updated");
        } catch (Exception $e) {
            echo "Error: ".$e;
          }
      }
    break;

  }
}
?>
