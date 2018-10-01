<?php
// requires
require_once "../modelo/Noticia.php";
require_once "../DAO/DAONoticia.php";
require_once "../DAO/mySQL.class.php";

if(!empty($_GET['action'])){
  $noticia = new Noticia();
  $daoNoticia = new DAONoticia();
  switch ($_GET['action']) {
    case 'insert':
      if(isset($_POST['title']) && isset($_POST['description']) ) {
        try {
          $noticia->setTitle($_POST['title']);
          $noticia->setAuxTitle($_POST['auxtitle']);
          $noticia->setDescription($_POST['description']);
          $noticia->setCategoryId($_POST['category_id']);
          $noticia->setImageCover($_POST['image_cover']);
          $noticia->setDateSent(time());
          $noticia->setUserId($_POST['user_id']);
          // var_dump($_POST);
          var_dump($daoNoticia->queryInsert($noticia));
          // print_r("TESTE");
          // header("Location: http://localhost/admin/noticia.php?status=add");
        } catch (Exception $e) {
          echo "Error:".$e;
        }
      }
      break;

    case 'update':
    // code
  }
}
?>
