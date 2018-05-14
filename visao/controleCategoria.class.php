<?php
require_once "../DAO/DAOCategoria.php";
require_once "../modelo/Categoria.php";
require_once "../DAO/mySQL.class.php";

class controleCategoria{
  $categoria = new Categoria();
  $daoCategoria = new DAOCategoria();

  public function inserirCategoria(Categoria $cat){
    try {
      if(isset($_POST['nome'])){
        $categoria->setNome($cat->getNome());
      }
      if(isset($_POST['descricao'])){
        $categoria->setDescricao($cat->getDescricao);
      }
      if(isset($_POST['status'])){
        $categoria->setStatus($_POST['status']);
      }
      $daoCategoria->queryInsert($categoria);
    } catch (Exception $e) {
      echo "Error: ".$e;
    }
  }
}
?>
