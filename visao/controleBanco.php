<?php
require_once "../modelo/Banco.php";
require_once "../DAO/DAOBanco.php";
require_once "../DAO/mySQL.class.php";

if(!empty($_GET['action'])){
  $banco = new Banco();
  $daoBanco = new DAOBanco();
  switch ($_GET['action']) {
    case 'insert':
    // var_dump($_POST);
      if(isset($_POST['user_id'])){ ##
          $banco->name = $_POST['name'];
          $banco->agency = $_POST['agency'];
          $banco->account = $_POST['account'];
          $banco->code = $_POST['code'];
          $banco->user_id = $_POST['user_id'];
          // var_dump($banco);
          if($daoBanco->queryInsert($banco) !== FALSE)
            header('Location: http://localhost/admin/banco.php?status=add');
          else
            header('Location: http://localhost/admin/banco.php?status=error');
          // $daoBanco->queryInsert($banco);
      }
      break;

    case 'delete':
      if(isset($_GET['id'])){
          $banco->id = $_GET['id'];

          $daoBanco->queryDelete($banco);
      }else {
        // echo '':?
        echo 'erro';
      }
    break;

    case 'update':
      if(isset($_GET['id'])){
        $banco->id = $_GET['id'];
        $banco->name = $_POST['name'];
        $banco->agency = $_POST['agency'];
        $banco->account = $_POST['account'];
        $banco->code = $_POST['code'];
        $banco->user_id = $_POST['name'];

      }
    break;

    default:
      # code...
      break;
  }

}

?>
