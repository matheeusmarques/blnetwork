<?php

class DAOUsuario{

  private $pdo;

  function DAOUsuario(){
    $this->pdo = new Conexao();
    $this->pdo = $this->pdo->getPdo();
  }


  public function queryInsert(Usuario $usuario){
    try {
      $sql = "INSERT INTO usuario("
                    . "login,"
                    . "senha,"
                    . "status,"
                    . "saldo,"
                    . "tipo,"
                    . "email,"
                    . "pessoa_id"
                    . ") VALUES ("
                    . ":login,"
                    . ":senha,"
                    . ":status,"
                    . ":saldo,"
                    . ":tipo,"
                    . ":email,"
                    . ":pessoa_id)";
    $t_sql = $this->pdo->prepare($sql);
    $t_sql -> bindValue(":login", $usuario->getLogin());
    $t_sql -> bindValue(":senha", $usuario->getSenha());
    $t_sql -> bindValue(":status", $usuario->getStatus());
    $t_sql -> bindValue(":saldo", $usuario->getSaldo());
    $t_sql -> bindValue(":tipo", $usuario->getTipo());
    $t_sql -> bindValue(":email", $usuario->getEmail());
    $t_sql -> bindValue(":pessoa_id", $usuario->getPessoaId());
    return $t_sql->execute();
    } catch (PDOException $e) {
      echo "Error".$e;
    }
  }

  public function selectAll(){
    try {
      $sql = "SELECT * FROM usuario ORDER BY usuario.login";
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
      $usuario = new Usuario();

      $usuario->setId($row['id']);
      $usuario->setLogin($row['login']);
      $usuario->setStatus($row['status']);
      $usuario->setEmail($row['email']);
      $usuario->setSaldo($row['saldo']);
      $usuario->setPessoaId($row['pessoa_id']);
      $usuario->setTipo($row['tipo']);

      return $usuario;
  }

  public function checkCredentials(Usuario $usuario){
    try {
      $sql = "SELECT * FROM usuario WHERE login = :login AND senha = :senha";
      $t_sql = $this->pdo->prepare($sql);
      $t_sql -> bindValue(":login", $usuario->getLogin());
      $t_sql -> bindValue(":senha", $usuario->getSenha());
      $t_sql->execute();

      return $this->fillArray($t_sql->fetch(PDO::FETCH_ASSOC));

    } catch (Exception $e) {

    }

  }

}

?>
