<?php
class DAOPessoa{

  private $pdo;

    function DAOPessoa(){
      $this->pdo = new Conexao();
      $this->pdo = $this->pdo->getPdo();
    }

    public function queryInsert(Pessoa $pessoa){
      try {
        $sql = "INSERT INTO pessoa("
                      . "nome,"
                      . "sexo,"
                      . "cidade_id,"
                      . "data_nascimento,"
                      . "cpf,"
                      . "rg,"
                      . "status"
                      . ") VALUES ("
                      . ":nome,"
                      . ":sexo,"
                      . ":cidade_id,"
                      . ":data_nascimento,"
                      . ":cpf,"
                      . ":rg,"
                      . ":status)";
      $t_sql = $this->pdo->prepare($sql);
      $t_sql -> bindValue(":nome", $pessoa->getNome());
      $t_sql -> bindValue(":sexo", $pessoa->getSexo());
      $t_sql -> bindValue(":cidade_id", $pessoa->getCidadeId());
      $t_sql -> bindValue(":data_nascimento", $pessoa->getDataNascimento());
      $t_sql -> bindValue(":cpf", $pessoa->getCpf());
      $t_sql -> bindValue(":rg", $pessoa->getRg());
      $t_sql -> bindValue(":status", $pessoa->getStatus());
      return $t_sql->execute();
      } catch (PDOException $e) {
        echo "Error".$e;
      }
    }

    public function queryUpdate(Pessoa $pessoa){
      try {
        $sql = "UPDATE estado SET "
          . "nome = :nome,"
          . "idade = :idade,"
          . "cpf = :cpf,"
          . "rg = :rg,"
          . "status = :status"
          . "WHERE id = :id";
          $t_sql = $this->pdo->prepare($sql);
          $t_sql -> bindValue(":id", $pessoa->getID());
          $t_sql -> bindValue(":nome", $pessoa->getNome());
          $t_sql -> bindValue(":idade", $pessoa->getIdade());
          $t_sql -> bindValue(":cpf", $pessoa->getCpf());
          $t_sql -> bindValue(":rg", $pessoa->getRg());
          $t_sql -> bindValue(":status", $pessoa->getStatus());
          return $t_sql->execute();
      } catch (PDOException $e) {
        echo "Error: ".$e;
      }
    }

    public function queryDelete($id){
      try {
        $sql = "DELETE FROM pessoa WHERE id = :id";
        $t_sql = $this->pdo->prepare($sql);
        $t_sql -> bindValue(":id", $id);
        return $t_sql->execute();
      } catch (PDOException $e) {
        echo "Error: ".$e;
      }
  }

  public function selectAllAvailable(){
    try {
      $sql = "SELECT * FROM pessoa WHERE status <> 1 ORDER BY pessoa.nome";
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

  public function selectAll(){
    try {
      $sql = "SELECT * FROM pessoa ORDER BY pessoa.nome";
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

  public function queryConverterCidade($cidade_id){
    try {
      $sql = "SELECT cidade.nome FROM nome WHERE id = :cidade_id";
      $t_sql = $this->pdo->prepare($sql);
      $t_sql->bindValue(":cidade_id", $cidade_id);
      $t_sql->execute();

      $list = $t_sql->fetch(PDO::FETCH_ASSOC);
      return $list['nome'];;
    }
    catch(PDOException $e){
      echo 'Error:'.$e;
    }
  }

  public function converterStatus(){
    try {
      $sql = "SELECT status FROM pessoa";
      $t_sql = $this->pdo->prepare($sql);
      $t_sql->execute();

      $list = $t_sql->fetch(PDO::FETCH_ASSOC);
      $list['status'] = str_replace("1", "Ativo", $list['status']);
      $list['status'] = str_replace("0", "Inativo", $list['status']);
    } catch (PDOException $e) {
      echo "Error: ".$e;
    }
  }

  public function fillArray($row){
      $pessoa = new Pessoa();

      $pessoa->setId($row['id']);
      $pessoa->setNome($row['nome']);
      $pessoa->setSexo($row['sexo']);
      $pessoa->setCidadeId($row['cidade_id']);
      $pessoa->setDataNascimento($row['data_nascimento']);
      $pessoa->setRg($row['rg']);
      $pessoa->setCpf($row['cpf']);
      $pessoa->setStatus($row['status']);

      return $pessoa;
  }

}
?>
