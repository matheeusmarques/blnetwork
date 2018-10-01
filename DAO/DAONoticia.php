<?php

class DAONoticia{

  private $pdo;

  function DAONoticia(){
    $this->pdo = new Conexao();
    $this->pdo = $this->pdo->getPdo();
  }


  public function queryInsert(Noticia $noticia){
    try {
      $sql = "INSERT INTO noticia("
        . "title,"
        . "auxtitle,"
        . "description,"
        . "category_id,"
        . "image_cover,"
        . "date_sent,"
        . "user_id"
        . ") VALUES ("
          . ":title,"
          . ":auxtitle,"
          . ":description,"
          . ":category_id,"
          . ":image_cover,"
          . ":date_sent,"
          . ":user_id)";
          $t_sql = $this->pdo->prepare($sql);
          $t_sql->bindValue(":title", $noticia->getTitle());
          $t_sql->bindValue(":description", $noticia->getDescription());
          $t_sql->bindValue(":auxtitle", $noticia->getAuxTitle());
          $t_sql->bindValue(":category_id", $noticia->getCategoryId());
          $t_sql->bindValue(":image_cover", $noticia->getImageCover());
          $t_sql->bindValue(":date_sent", $noticia->getDateSent());
          $t_sql->bindValue(":user_id", $noticia->getUserId());

           return $t_sql->execute();
    } catch (Exception $e) {
      echo "Error:".$e;
    }
  }

  public function selectAll(){
    try {
      $sql = "SELECT * FROM noticia ORDER BY date_sent";
      $result = $this->pdo->query($sql);
      $list = $result->fetchAll(PDO::FETCH_ASSOC);
      $list_array = array();

      foreach ($list as $l) {
        $list_array[] = $this->fillArray($l);
      }

      return $list_array;
    } catch (PDOException $e) {
      echo "Error: ".$e;
    }
  }

  public function selectAllFromUser(Noticia $noticia){
    try {
      $sql = "SELECT * FROM noticia WHERE id = :id ORDER BY date_sent";
      $t_sql = $this->prepare($sql);
      $t_sql->bindValue(":id", $noticia->getUserId());
      $t_sql -> execute();

      $list = $t_sql->fetchAll(PDO::FETCH_ASSOC);
      $list_array = array();

      foreach ($list as $item) {
        $list_array[] = $this->fillArray($item);
      }

      return $list_array;
    } catch (PDOException $e) {
      echo "Error: ".$e;
    }
  }
//
//   public function queryUpdate(Noticia $noticia){
//     try {
//       $sql = "UPDATE categoria SET "
//         . "name = :name,"
//         . "description = :description,"
//         . "status = :status "
//         . "WHERE id = :id";
//         $t_sql = $this->pdo->prepare($sql);
//         $t_sql -> bindValue(":name", $categoria->getName());
//         $t_sql -> bindValue(":description", $categoria->getDescription());
//         $t_sql -> bindValue(":status", $categoria->getStatus());
//         $t_sql -> bindValue(":id", $categoria->getId());
//         return $t_sql->execute();
//     } catch (PDOException $e) {
//       echo "Error: ".$e;
//     }
//   }
//
//   public function queryDelete(Noticia $noticia){
//     try {
//       $sql = "DELETE FROM noticia WHERE id = :id";
//       $t_sql = $this->pdo->prepare($sql);
//       $t_sql -> bindValue(":id", $categoria->getId());
//       return $t_sql->execute();
//     } catch (PDOException $e) {
//       echo "Error: ".$e;
//     }
// }
//
  public function fillArray($row){
    $noticia = new Noticia();

    $noticia->setId($row['id']);
    $noticia->setTitle($row['title']);
    $noticia->setAuxTitle($row['auxtitle']);
    $noticia->setDescription($row['description']);
    $noticia->setUserId($row['user_id']);
    $noticia->setImageCover($row['image_cover']);
    $noticia->setCategoryId($row['category_id']);
    $noticia->setDateSent($row['date_sent']);

    return $noticia;
  }


}

?>
