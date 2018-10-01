<?php

class DAOTicket{

  private $pdo;

  function DAOTicket(){
    $this->pdo = new Conexao();
    $this->pdo = $this->pdo->getPdo();
  }

  public function queryInsert(Ticket $ticket){
    try {
      $sql = "INSERT INTO ticket("
                     . "title,"
                     . "type,"
                     . "priority,"
                     . "message,"
                     . "status,"
                     . "user_id,"
                     . "date_sent"
                     . ") VALUES ("
                     . ":title,"
                     . ":type,"
                     . ":priority,"
                     . ":message,"
                     . ":status,"
                     . ":user_id,"
                     . "now())";
      $t_sql = $this->pdo->prepare($sql);
      $t_sql -> bindValue(":title", $ticket->getTitle());
      $t_sql -> bindValue(":type", $ticket->getType());
      $t_sql -> bindValue(":priority", $ticket->getPriority());
      $t_sql -> bindValue(":message", $ticket->getMessage());
      $t_sql -> bindValue(":status", $ticket->getStatus());
      $t_sql -> bindValue(":user_id", $ticket->getUserId());
      // $t_sql -> bindValue(":date_sent", '');

      // $t_sql -> bindValue(":data_envio", $ticket->getDataEnvio());
        return $t_sql->execute();
    } catch (Exception $e) {
      echo "Error:".$e->getMessage();
    }
  }

  public function queryDelete(Ticket $ticket){
    try {
      $this->pdo->beginTransaction();

      $sql = "DELETE FROM replyticket WHERE ticket_id = :id";
      $t_sql = $this->pdo->prepare($sql);
      $t_sql -> bindValue(":id", $ticket->getId());
      $t_sql->execute();

      $sql = "DELETE FROM ticket WHERE id = :id";
      $t_sql = $this->pdo->prepare($sql);
      $t_sql -> bindValue(":id", $ticket->getId());
      $t_sql->execute();

      return $this->pdo->commit();
    } catch (PDOException $e) {
      $this->pdo->rollBack();
      echo "Error".$e;
    }
  }

  public function querySelectAll(){
    try {
      $sql = "SELECT * FROM `ticket` ORDER BY date_sent DESC";
      $result = $this->pdo->query($sql);
      $list = $result->fetchAll(PDO::FETCH_ASSOC);
      $list_array = array();

      foreach ($list as $item) {
        $list_array[] = $this->fillArray($item);
      }
      return $list_array;
    } catch (Exception $e) {
      echo "Error".$e->getMessage();
    }
  }

  public function querySelectTicketFromUser(Ticket $ticket){
    try {
      $sql = "SELECT * FROM ticket WHERE user_id = :user_id";
      $t_sql = $this->pdo->prepare($sql);
      $t_sql->bindValue(":user_id", $ticket->getUserId());
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


  public function querySelectTicket(Ticket $ticket){
    try {
      $sql = "SELECT * FROM ticket WHERE id = :ticket_id";
      $t_sql = $this->pdo->prepare($sql);
      $t_sql->bindValue(":ticket_id", $ticket->getId());
      $t_sql->execute();
      $ticket = $t_sql->fetch(PDO::FETCH_ASSOC);

      return $ticket;
    } catch (Exception $e) {

    }

  }

  public function queryConverterUser($user_id){
    try {
      $sql = "SELECT login FROM usuario WHERE id = :user_id";
      $t_sql = $this->pdo->prepare($sql);
      $t_sql -> bindValue(":user_id", $user_id);
      $t_sql -> execute();

      $user = $t_sql->fetch(PDO::FETCH_ASSOC);
      return $user['login'];
    } catch (Exception $e) {
      echo "Erro:".$e->getMessage();
    }
  }

  // public function queryUpdateStatus(Ticket $ticket){
  //   try {
  //     $sql = "UPDATE ticket SET "
  //       . "status = :status "
  //       . "WHERE id = :id";
  //     $t_sql = $this->pdo->prepare($sql);
  //     $t_sql -> bindValue(":id", $ticket->getId());
  //     $t_sql -> bindValue(":status", $ticket->getStatus());
  //     // var_dump($ticket);
  //     $t_sql->execute();
  //     return $t_sql->rowCount();
  //   } catch (Exception $e) {
  //     echo "Erro:".$e->getMessage();
  //   }
  // }

  public function queryUpdate(Ticket $ticket){
    try {
      $sql = "UPDATE ticket SET "
        . "title = :title,"
        . "type = :type,"
        . "message = :message,"
        . "user_id = :user_id,"
        . "status = :status "
        . "WHERE id = :id";
        $t_sql = $this->pdo->prepare($sql);
        $t_sql->bindValue(":title", $ticket->getTitle());
        $t_sql->bindValue(":message", $ticket->getMessage());
        $t_sql->bindValue(":type", $ticket->getType());
        $t_sql->bindValue(":user_id", $ticket->getUserId());
        $t_sql->bindValue(":id", $ticket->getId());
        $t_sql->bindValue(":status", $ticket->getStatus());
        return $t_sql->execute();
    } catch (Exception $e) {
      echo "Erro:".$e->getMessage();
    }
  }

  public function queryUpdateStatus(Ticket $ticket){
    try {
      $sql = "UPDATE ticket SET "
      .   "admin_id = :admin_id,"
        . "status = :status "
        . "WHERE id = :id";
        $t_sql = $this->pdo->prepare($sql);
        $t_sql->bindValue(":status", $ticket->getStatus());
        $t_sql->bindValue(":admin_id", $ticket->getAdminId());
        $t_sql->bindValue(":id", $ticket->getId());
        $t_sql->execute();
        return $t_sql->rowCount();
    } catch (Exception $e) {
      echo "Erro:".$e->getMessage();
    }
  }


    public function fillArray($row){
      $ticket = new Ticket();

      $ticket->setId($row['id']);
      $ticket->setType($row['type']);
      $ticket->setTitle($row['title']);
      $ticket->setPriority($row['priority']);
      $ticket->setMessage($row['message']);
      $ticket->setUserId($row['user_id']);
      $ticket->setDateSent($row['date_sent']);
      $ticket->setStatus($row['status']);

      return $ticket;
    }



}
?>
