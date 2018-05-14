<?php

class DAOCategoria{

  private $pdo;

  function DAOCategoria(){
    $this->pdo = new Conexao();
    $this->pdo = $this->pdo->getPdo();
  }


  public function queryInsert(Categoria $categoria){
    try {
      $sql = "INSERT INTO categoria("
        . "nome,"
        . "descricao,"
        . "status"
        . ") VALUES ("
          . ":nome,"
          . ":descricao,"
          . ":status)";
          $t_sql = $this->pdo->prepare($sql);
          $t_sql -> bindValue(":nome", $categoria->getNome());
          $t_sql -> bindValue(":descricao", $categoria->getDescricao());
          $t_sql -> bindValue(":status", $categoria->getStatus());
          return $t_sql->execute();
    } catch (Exception $e) {
      echo "Error:".$e;
    }
  }

  public function selectAll(){
    try {
      $sql = "SELECT * FROM categoria ORDER BY categoria.nome";
      $result = $this->pdo->query($sql);
      $list = $result->fetchAll(PDO::FETCH_ASSOC);
      $list_array = array();

      foreach ($list as $l) {
        $list_array[] = $this->fillArray($l);
      }

      return $list_array;
    } catch (PDOException $e) {
      echo "Error: ".$e;
    }
  }

  public function fillArray($row){
    $categoria = new Categoria();

    $categoria->setId($row['id']);
    $categoria->setNome($row['nome']);
    $categoria->setDescricao($row['descricao']);
    $categoria->setStatus($row['status']);

    return $categoria;
  }


}

?>
