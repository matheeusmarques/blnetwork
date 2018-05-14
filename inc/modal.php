<?php

require_once "DAO/DAOEstado.php";
require_once "modelo/Estado.php";
require_once "DAO/mySQL.class.php";

$daoEstado = new DAOEstado();
$estado = new Estado();
$listaEstados = $daoEstado->selectAll();
?>
<div id="dialog-delete-cidade" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">
        <h4 id="titlemodel">Text in a modal</h4>
        <p id="modeltext">Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
      </div>
      <div class="modal-footer">
        <a id="confirm" class="btn btn-primary" href="#">Sim</a>
        <a id="cancel" class="btn btn-default" data-dismiss="modal">Não</a>
      </div>

    </div>
  </div>
</div>



<div id="dialog-edit-cidade" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <form action="visao/updateCidade.php" method="POST" id="demo-form" data-parsley-validate>
          <label for="fullname">Nome:</label>
          <input type="text" id="nome" class="form-control" name="nome" required />
          <input type="hidden" type="text" id="id" class="form-control" name="id" data-parsley-trigger="change" value="" required />
          <label for="heard">Estado: </label>
              <select id="heard" name="estadoid" class="form-control" required>
                <?php
                  foreach ($listaEstados as $estado) {
                    echo '<option value="'.$estado->getID().'">'.$estado->getNome().'</option>';
                  }
                 ?>
              </select>
      </div>

      <div class="modal-footer">
        <center>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button id="confirmar" type="submit" class="btn btn-primary">Salvar</button>
        </center>
      </form>
        </div>
      </div>

    </div>
  </div>

  <!-- DIALOG CIDADE -->
  <div id="dialog-delete-estado" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          <h4 id="titlemodel">Text in a modal</h4>
          <p id="modeltext">Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
        </div>
        <div class="modal-footer">
          <a id="confirm" class="btn btn-primary" href="#">Sim</a>
          <a id="cancel" class="btn btn-default" data-dismiss="modal">Não</a>
        </div>

      </div>
    </div>
  </div>
