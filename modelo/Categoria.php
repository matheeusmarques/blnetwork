<?php


class Categoria{
  private $id;
  private $nome;
  private $descricao;
  private $status;


  public function setId($id){
    $this->id = $id;
  }

  public function getId(){
    return $this->id;
  }

  public function setNome($nome){
    $this->nome = $nome;
  }

  public function setDescricao($descricao){
    $this->descricao = $descricao;
  }

  public function setStatus($status){
    $this->status = $status;
  }

  public function getStatus(){
    return $this->status;
  }

  public function getNome(){
    return $this->nome;
  }

  public function getDescricao(){
    return $this->descricao;
  }


}

?>
