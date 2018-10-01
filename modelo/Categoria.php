<?php


class Categoria{
  private $id;
  private $name;
  private $description;
  private $status;


  public function setId($id){
    $this->id = $id;
  }

  public function getId(){
    return $this->id;
  }

  public function setName($name){
    $this->name = $name;
  }

  public function setDescription($description){
    $this->description = $description;
  }

  public function setStatus($status){
    $this->status = $status;
  }

  public function getStatus(){
    return $this->status;
  }

  public function getName(){
    return $this->name;
  }

  public function getDescription(){
    return $this->description;
  }


}

?>
