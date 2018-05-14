<?php

class Usuario{

  private $id;
  private $login;
  private $senha;
  private $status;
  private $saldo;
  private $tipo;
  private $email;
  private $pessoaid;


  public function getStatus(){
    return $this->status;
  }

  public function setStatus($status){
    $this->status = $status;
  }

  public function setSaldo($saldo){
    $this->saldo = $saldo;
  }

  public function getSaldo(){
    return $this->saldo;
  }

  public function setTipo($tipo){
    $this->tipo = $tipo;
  }

  public function getTipo(){
    return $this->tipo;
  }

  public function setEmail($email){
    $this->email = $email;
  }

  public function getEmail(){
    return $this->email;
  }

  public function getId(){
    return $this->id;
  }

  public function setId($id){
    $this->id = $id;
  }

  public function setLogin($login){
    $this->login = $login;
  }

  public function getLogin(){
    return $this->login;
  }

  public function setSenha($senha){
    $this->senha = $senha;
  }

  public function getSenha(){
    return $this->senha;
  }

  public function getPessoaId(){
    return $this->pessoaid;
  }

  public function setPessoaId($pessoaid){
    $this->pessoaid = $pessoaid;
  }

}

?>
