<?php

class ReplyTicket{
  private $id;
  private $message;
  private $user_id;
  private $ticket_id;
  private $admin_id;
  private $date_sent;
  private $status;


  public function setId($id){
    $this->id = $id;
  }

  public function setMessage($message){
    $this->message = $message;
  }

  public function setUserId($user_id){
    $this->user_id = $user_id;
  }

  public function setAdminId($admin_id){
    $this->admin_id = $admin_id;
  }

  public function setDateSent($date_sent){
    $this->date_sent = $date_sent;
  }

  public function setStatus($status){
      $this->status = $status;
  }

  public function setTicketId($ticket_id){
    $this->ticket_id = $ticket_id;
  }

  public function getTicketId(){
    return $this->ticket_id;
  }

  public function getStatus(){
    return $this->status;
  }

  public function getMessage(){
    return $this->message;
  }

  public function getId(){
    return $this->id;
  }

  public function getAdminId(){
    return $this->admin_id;
  }

  public function getDateSent(){
    return $this->date_sent;
  }

  public function getUserId(){
    return $this->user_id;
  }

}
?>
