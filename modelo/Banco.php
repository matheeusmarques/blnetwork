<?php

class Banco{

  private $id;
  private $name;
  private $agency;
  private $account;
  private $code;
  private $user_id;

  public function __get($name){
    return $this->$name;
  }

  public function __set($name, $value){
    $this->$name = $value;
  }

}
?>
