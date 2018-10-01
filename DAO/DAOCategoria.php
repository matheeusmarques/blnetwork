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
        . "name,"
        . "description,"
        . "status"
        . ") VALUES ("
          . ":name,"
          . ":description,"
          . ":status)";
          $t_sql = $this->pdo->prepare($sql);
          $t_sql -> bindValue(":name", $categoria->getName());
          $t_sql -> bindValue(":description", $categoria->getDescription());
          $t_sql -> bindValue(":status", $categoria->getStatus());
          return $t_sql->execute();
    } catch (Exception $e) {
      echo "Error:".$e;
    }
  }

  public function selectAll(){
    try {
      $sql = "SELECT * FROM categoria ORDER BY categoria.name";
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

  public function queryUpdate(Categoria $categoria){
    try {
      $sql = "UPDATE categoria SET "
        . "name = :name,"
        . "description = :description,"
        . "status = :status "
        . "WHERE id = :id";
        $t_sql = $this->pdo->prepare($sql);
        $t_sql -> bindValue(":name", $categoria->getName());
        $t_sql -> bindValue(":description", $categoria->getDescription());
        $t_sql -> bindValue(":status", $categoria->getStatus());
        $t_sql -> bindValue(":id", $categoria->getId());
        return $t_sql->execute();
    } catch (PDOException $e) {
      echo "Error: ".$e;
    }
  }

  public function queryDelete(Categoria $categoria){
    try {
      $sql = "DELETE FROM categoria WHERE id = :id";
      $t_sql = $this->pdo->prepare($sql);
      $t_sql -> bindValue(":id", $categoria->getId());
      return $t_sql->execute();
    } catch (PDOException $e) {
      echo "Error: ".$e;
    }
}

  public function fillArray($row){
    $categoria = new Categoria();

    $categoria->setId($row['id']);
    $categoria->setName($row['name']);
    $categoria->setDescription($row['description']);
    $categoria->setStatus($row['status']);

    return $categoria;
  }


}

?>
