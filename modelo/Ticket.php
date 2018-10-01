<?php
class Ticket{

  private $id;
  private $title;
  private $type;
  private $message;
  private $priority;
  private $status;
  private $user_id;
  private $admin_id;
  private $date_sent;

  public function setId($id){
    $this->id = $id;
  }

  public function setDateSent($date_sent){
    $this->date_sent = $date_sent;
  }

  public function getDateSent(){
    return $this->date_sent;
  }

  public function getType(){
    return $this->type;
  }

  public function setType($type){
    $this->type = $type;
  }

  public function getPriority(){
    return $this->priority;
  }

  public function setPriority($priority){
    $this->priority = $priority;
  }

  public function getMessage(){
    return $this->message;
  }

  public function setMessage($message){
    $this->message = $message;
  }

  public function getId(){
      return $this->id;
  }

  public function getTitle(){
    return $this->title;
  }

  public function setTitle($title){
    $this->title = $title;
  }

  public function setStatus($status){
    $this->status = $status;
  }

  public function getStatus(){
    return $this->status;
  }

  public function getUserId(){
    return $this->user_id;
  }

  public function setUserId($user_id){
    $this->user_id = $user_id;
  }

  public function getAdminId(){
    return $this->admin_id;
  }

  public function setAdminId($admin_id){
    $this->admin_id = $admin_id;
  }


}

?>
