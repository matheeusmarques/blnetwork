<?php

class DAOBanco{

  function DAOBanco(){
    $this->pdo = new Conexao();
    $this->pdo = $this->pdo->getPdo();

  }

  public function queryInsert(Banco $banco){
    try {
      $sql ='INSERT INTO banco('
        . 'name,'
        . 'agency,'
        . 'account,'
        . 'user_id,'
        . 'code'
        . ') VALUES ('
          .':name,'
          . ':agency,'
          . ':account,' 
          . ':user_id,'
          . ':code)';

          $t_sql = $this->pdo->prepare($sql);

          $t_sql->bindValue(':name', $banco->name);
          $t_sql->bindValue(':agency', $banco->agency);
          $t_sql->bindValue(':account', $banco->account);
          $t_sql->bindValue(':user_id', $banco->user_id);
          $t_sql->bindValue(':code', $banco->code);
          // $t_sql->execute();
          $t_sql->execute();
        } catch (Exception $t_sql) {

        }
      }

      public function querySelectAll(Banco $banco){
        try {
          $sql = "SELECT * FROM banco WHERE user_id = :user_id ORDER BY banco.name";
          $t_sql = $this->pdo->prepare($sql);
          $t_sql->bindValue(":user_id", $banco->userid);
          $t_sql->execute();
          $list = $t_sql->fetchAll(PDO::FETCH_ASSOC);

          $list_ticket = array();

          foreach ($list as $item) {
            $list_ticket[] = $this->fillArray($item);
          }

          return $list_ticket;
        } catch (Exception $e) {
          echo "Erro:".$e->getMessage();
        }
      }

      public function queryUpdate(Banco $banco){
        try {
          $sql = "UPDATE banco SET "
            . "name = :name,"
            . "agency = :agency,"
            . "user_id = :user_id,"
            . "code = :code,"
            . "account = :account "
            . "WHERE id = :id";
            $t_sql = $this->pdo->prepare($sql);
            $t_sql->bindValue(':name', $banco->name);
            $t_sql->bindValue(':agency', $banco->agency);
            $t_sql->bindValue(':account', $banco->account);
            $t_sql->bindValue(':user_id', $banco->user_id);
            $t_sql->bindValue(':code', $banco->code);
            return $t_sql->execute();
        } catch (PDOException $e) {
          echo "Error: ".$e;
        }
      }

      public function queryDelete(Banco $banco){
        try {
          $sql = "DELETE FROM banco WHERE id = :id";
          $t_sql = $this->pdo->prepare($sql);
          $t_sql -> bindValue(":id", $banco->id);
          return $t_sql->execute();
        } catch (PDOException $e) {
          echo "Error: ".$e;
        }
      }


      public function fillArray($row){
        $banco = new Banco();

        $banco->id = $row['id'];
        $banco->name = $row['name'];
        $banco->account = $row['account'];
        $banco->agency = $row['agency'];
        $banco->user_id = $row['user_id'];
        $banco->code = $row['code'];

        return $banco;
      }



    }

    ?>
