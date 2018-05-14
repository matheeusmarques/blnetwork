<?php

class Pessoa{

  private $id;
  private $nome;
  private $sexo;
  private $cpf;
  private $rg;
  private $cidade_id;
  private $datanascimento;
  private $status;


  public function getCidadeId(){
    return $this->cidade_id;
  }

  public function getSexo(){
    return $this->sexo;
  }

  public function setSexo($sexo){
    $this->sexo = $sexo;
  }

  public function setCidadeId($cidadeid){
    $this->cidade_id = $cidadeid;
  }

  public function setDataNascimento($datanascimento){
    $this->datanascimento = $datanascimento;
  }

  public function getDataNascimento(){
    return $this->datanascimento;
  }

  public function getId(){
    return $this->id;
  }

  public function setId($id){
    $this->id = $id;
  }

  public function setNome($nome){
    $this->nome = $nome;
  }

  public function getNome(){
    return $this->nome;
  }

  public function setCpf($cpf){
    $this->cpf = $cpf;
  }

  public function getCpf(){
    return $this->cpf;
  }

  public function setRg($rg){
    $this->rg = $rg;
  }

  public function getRg(){
    return $this->rg;
  }

  public function getStatus(){
    return $this->status;
  }

  public function setStatus($status){
    $this->status = $status;
  }

}
?>
