<?php

class Noticia{

  private $id;
  private $titulo;
  private $tituloauxiliar;
  private $descricao;
  private $datapublicacao;
  private $categoria_id;

  public function setId($id){
    $this->id = $id;
  }

  public function setTitulo($titulo){
    $this->titulo = $titulo;
  }

  public function setTituloAuxiliar($tituloauxiliar){
    $this->tituloauxiliar = $tituloauxiliar;
  }

  public function setDescricao($descricao){
    $this->descricao = $descricao;
  }

  public function setDataPublicacao($datapublicacao){
    $this->datapublicacao = $datapublicacao;
  }

  public function setCategoriaId($categoria_id){
    $this->categoria_id = $categoria_id;
  }

  public function getCategoriaId(){
    return $this->categoria_id;
  }

  public function getTitulo(){
    return $this->titulo;
  }

  public function getTituloAuxiliar(){
    return $this->tituloAuxiliar;
  }

  public function getDescricao(){
    return $this->descricao;
  }

  public function getDataPublicacao(){
    return $this->datapublicacao;
  }

  public function getId(){
    return $this->id;
  }

}

?>
