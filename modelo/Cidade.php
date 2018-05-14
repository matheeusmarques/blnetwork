<?php

class Cidade{

  private $id;
  private $nome;
  private $id_estado;

  public function getID(){
    return $this->id;
  }

  public function setID($id){
    $this->id = $id;
  }

  public function getIdEstado(){
    return $this->id_estado;
  }

  public function setIdEstado($id_estado){
    $this->id_estado = $id_estado;
  }

  public function getNome(){
    return $this->nome;
  }

  public function setNome($nome){
    $this->nome = $nome;
  }

}

?>
