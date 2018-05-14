<?php
class DAOEstado{

  private $pdo;

    function DAOEstado(){
      $this->pdo = new Conexao();
      $this->pdo = $this->pdo->getPdo();
    }

    public function queryInsert(Estado $estado){
      try {
        $sql = "INSERT INTO estado("
                      . "nome,"
                      . "sigla"
                      . ") VALUES ("
                      . ":nome,"
                      . ":sigla)";
      $t_sql = $this->pdo->prepare($sql);
      $t_sql -> bindValue(":nome", $estado->getNome());
      $t_sql -> bindValue(":sigla", $estado->getSigla());
      return $t_sql->execute();
      } catch (PDOException $e) {
        echo "Error".$e;
      }
    }

    public function queryUpdate(Estado $estado){
      try {
        $sql = "UPDATE estado SET "
          . "nome = :nome,"
          . "sigla = :sigla "
          . "WHERE id = :id";
          $t_sql = $this->pdo->prepare($sql);
          $t_sql -> bindValue(":id", $estado->getID());
          $t_sql -> bindValue(":nome", $estado->getNome());
          $t_sql -> bindValue(":sigla", $estado->getSigla());
          return $t_sql->execute();
      } catch (PDOException $e) {
        echo "Error: ".$e;
      }
    }

    public function queryDelete($id){
      try {
        $sql = "DELETE FROM estado WHERE id = :id";
        $t_sql = $this->pdo->prepare($sql);
        $t_sql -> bindValue(":id", $id);
        return $t_sql->execute();
      } catch (PDOException $e) {
        echo "Error: ".$e;
      }
  }

  public function selectAll(){
    try {
      $sql = "SELECT * FROM estado ORDER BY estado.nome";
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

  public function selectAllWhere(){
    try {
      $sql = "SELECT * FROM estado WHERE id != :id ORDER BY estado.nome";
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
      $estado = new Estado();
      $estado ->setID($row['id']);
      $estado ->setNome($row['nome']);
      $estado ->setSigla($row['sigla']);
      return $estado;
  }

}
?>
