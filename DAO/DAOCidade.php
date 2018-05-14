<?php
class DAOCidade{

  private $pdo;

    function DAOCidade(){
      $this->pdo = new Conexao();
      $this->pdo = $this->pdo->getPdo();
    }

    public function queryInsert(Cidade $cidade){
      try {
        $sql = "INSERT INTO cidade("
                      . "nome,"
                      . "id_estado"
                      . ") VALUES ("
                      . ":nome,"
                      . ":id_estado)";
      $t_sql = $this->pdo->prepare($sql);
      $t_sql -> bindValue(":nome", $cidade->getNome());
      $t_sql -> bindValue(":id_estado", $cidade->getIdEstado());
      return $t_sql->execute();
      } catch (PDOException $e) {
        echo "Error".$e;
      }
    }

    public function queryUpdate(Cidade $cidade){
      try {
        $sql = "UPDATE cidade SET "
          . "nome = :nome,"
          . "id_estado = :id_estado "
          . "WHERE id = :id";
          $t_sql = $this->pdo->prepare($sql);
          $t_sql -> bindValue(":id", $cidade->getID());
          $t_sql -> bindValue(":nome", $cidade->getNome());
          $t_sql -> bindValue(":id_estado", $cidade->getIdEstado());
          return $t_sql->execute();
      } catch (PDOException $e) {
        echo "Error: ".$e;
      }
    }

    public function queryDelete($id){
      try {
        $sql = "DELETE FROM cidade WHERE id = :id";
        $t_sql = $this->pdo->prepare($sql);
        $t_sql -> bindValue(":id", $id);
        return $t_sql->execute();
      } catch (PDOException $e) {
        echo "Error: ".$e;
      }
  }

  public function queryConverterEstado($idestado){
    try {
      $sql = "SELECT estado.nome FROM estado WHERE id = :idestado";
      $t_sql = $this->pdo->prepare($sql);
      $t_sql->bindValue(":idestado", $idestado);
      $t_sql->execute();

      $list = $t_sql->fetch(PDO::FETCH_ASSOC);
      return $list['nome'];;
    }
    catch(PDOException $e){
      echo 'Error:'.$e;
    }
  }

  public function selectAll(){
    try {
      $sql = "SELECT * FROM cidade ORDER BY cidade.nome";
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
      $cidade = new Cidade();
      $cidade ->setID($row['id']);
      $cidade ->setNome($row['nome']);
      $cidade ->setIdEstado($row['id_estado']);
      return $cidade;
  }

}
?>
