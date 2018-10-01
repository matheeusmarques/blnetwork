<?php

class Noticia{

  private $id;
  private $title;
  private $auxtitle;
  private $description;
  private $date_sent;
  private $image_cover;
  private $category_id;
  private $user_id;

  public function setId($id){
    $this->id = $id;
  }

  public function setTitle($title){
    $this->title = $title;
  }

  public function setImageCover($image_cover){
    $this->image_cover = $image_cover;
  }

  public function getImageCover(){
    return $this->image_cover;
  }

  public function setAuxTitle($auxtitle){
    $this->auxtitle = $auxtitle;
  }

  public function setDescription($description){
    $this->description = $description;
  }

  public function setUserId($user_id){
    $this->user_id = $user_id;
  }

  public function setDateSent($date_sent){
    $this->date_sent = $date_sent;
  }

  public function setCategoryId($category_id){
    $this->category_id = $category_id;
  }

  public function getCategoryId(){
    return $this->category_id;
  }

  public function getUserId(){
    return $this->user_id;
  }

  public function getTitle(){
    return $this->title;
  }

  public function getAuxTitle(){
    return $this->auxtitle;
  }

  public function getDescription(){
    return $this->description;
  }

  public function getDateSent(){
    return $this->date_sent;
  }

  public function getId(){
    return $this->id;
  }

}

?>
