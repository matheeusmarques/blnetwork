<?php

require_once "DAO/DAOCategoria.php";
require_once "modelo/Categoria.php";
require_once "DAO/mySQL.class.php";

$daoCategoria = new DAOCategoria();
$categoria = new Categoria();
$listaCategorias = $daoCategoria->selectAll();
?>

<div id="dialog-new-noticia" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <form id="demo-form" method="POST" action="visao/controleNoticia.php?action=insert"data-parsley-validate>
          <label for="name">Título: </label>
          <input type="text" id="title" class="form-control" name="title" required />



          <br />

          <label for="name">Título Auxiliar: </label>
          <input type="text" id="auxtitle" class="form-control" name="auxtitle" required />
          <input type="hidden" id="user_id" class="form-control" name="user_id" required value="<?php echo $_SESSION['id'];?>"/>

          <br>

          <label for="name">URL Capa: </label>
          <input type="text" id="image_cover" class="form-control" name="image_cover" required />

          <br>

          <label for="description">Descrição:</label>
          <textarea placeholder="Descreva aqui a categoria" id="description" required="required" class="form-control" name="description" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
          data-parsley-validation-threshold="10"></textarea>
          <br />

          <label for="heard">Categoria: </label>
              <select id="heard" name="category_id" class="form-control" required>
                <?php
                  foreach ($listaCategorias as $categoria) {
                    echo '<option value="'.$categoria->getId().'">'.$categoria->getName().'</option>';
                  }
                 ?>
              </select>

              <br/>

        </div>

      <div class="modal-footer">
        <center>
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-primary" name="button">Cadastrar</button>
        </center>
      </form>
        </div>
      </div>

    </div>
  </div>
