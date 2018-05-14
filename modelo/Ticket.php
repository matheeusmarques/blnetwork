<?php
class Ticket{

  private $id;
  private $titulo;
  private $descricao;
  private $status;
  private $usuario_id;
  private $admin_id;

  public function setId($id){
    $this->id = $id;
  }

  public function getId(){
      return $this->id;
  }

}

?>
