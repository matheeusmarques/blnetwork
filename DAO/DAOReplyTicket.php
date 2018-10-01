<?php

class DAOReplyTicket{

  private $pdo;

  function DAOReplyTicket(){
    $this->pdo = new Conexao();
    $this->pdo = $this->pdo->getPdo();
  }

  public function queryInsert(ReplyTicket $replyticket){
    try {
      $sql = "INSERT INTO replyticket("
                     . "message,"
                     . "ticket_id,"
                     . "date_sent,"
                     . "user_id"
                     . ") VALUES ("
                     . ":message,"
                     . ":ticket_id,"
                     . "now(),"
                     . ":user_id)";
      $t_sql = $this->pdo->prepare($sql);

      $t_sql -> bindValue(":message", $replyticket->getMessage());
      $t_sql -> bindValue(":ticket_id", $replyticket->getTicketId());
      $t_sql -> bindValue(":user_id", $replyticket->getUserId());
      // $daoTicket = new DAOTicket();
      // $ticket = new Ticket();
      // $ticket->setStatus("1");
      // $ticket->setAdminId($_SESSION['id']);

      return $t_sql->execute();
    } catch (Exception $e) {
      echo "Error:".$e->getMessage();
    }
  }

  public function querySelectTicket(ReplyTicket $replyticket){
    try {
      $sql = "SELECT * FROM replyticket WHERE ticket_id = :id ORDER BY date_sent DESC";
      $t_sql = $this->pdo->prepare($sql);
      $t_sql -> bindValue(":id", $replyticket->getTicketId());
      $t_sql -> execute();

      $list = $t_sql->fetchAll(PDO::FETCH_ASSOC);
      $list_array = array();

      foreach ($list as $item) {
        $list_array[] = $this->fillArray($item);
      }

      return $list_array;
    } catch (Exception $e) {

    }

  }

  public function queryConverterUser(ReplyTicket $replyticket){
    try {
      $sql = "SELECT login FROM usuario WHERE id = :user_id";
      $t_sql = $this->pdo->prepare($sql);
      $t_sql -> bindValue(":user_id", $replyticket->getUserId());
      $t_sql -> execute();

      $data = $t_sql->fetch(PDO::FETCH_ASSOC);
      return $data['login'];
    } catch (Exception $e) {
      echo "Erro:".$e->getMessage();
    }
  }

  public function fillArray($row){
    $replyticket = new ReplyTicket();

    $replyticket->setId($row['id']);
    $replyticket->setMessage($row['message']);
    $replyticket->setUserId($row['user_id']);
    $replyticket->setTicketId($row['ticket_id']);
    $replyticket->setDateSent($row['date_sent']);

    return $replyticket;
  }


}
?>
