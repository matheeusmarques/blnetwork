<?php
  include_once "../DAO/DAOPessoa.php";
  include_once "../modelo/Pessoa.php";
  include_once "../DAO/mySQL.class.php";

  try {
    $pessoa = new Pessoa();
    $daoPessoa = new DAOPessoa();

    if(isset($_POST['nome'])){
      $pessoa->setNome($_POST['nome']);
    }

    if(isset($_POST['sexo'])){
      $pessoa->setSexo($_POST['sexo']);
    }

    if(isset($_POST['datanascimento'])){
      $pessoa->setDataNascimento($_POST['datanascimento']);
    }

    if(isset($_POST['rg'])){
      $pessoa->setRg($_POST['rg']);
    }

    if(isset($_POST['cpf'])){
      $pessoa->setCpf($_POST['cpf']);
    }

    if(isset($_POST['cidade'])){
      $pessoa->setCidadeId($_POST['cidade']);
    }

    $daoPessoa->queryInsert($pessoa);
    header("Location: http://localhost/admin/pessoa.php?status=sucessful");
  } catch (Exception $erro){
    header("Location: http://localhost/admin/pessoa.php?status=error");
    }
?>
