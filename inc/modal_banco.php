<?php

// require_once "DAO/DAOEstado.php";
// require_once "modelo/Estado.php";
// require_once "DAO/mySQL.class.php";
//
// $daoEstado = new DAOEstado();
// $estado = new Estado();
// $listaEstados = $daoEstado->selectAll();
?>
<div id="dialog-delete-bank" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
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

<div id="dialog-new-bank" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <form action="visao/controleBanco.php?action=insert" method="POST" id="demo-form" data-parsley-validate>
          <label for="name">Nome:</label>
          <input type="text" id="name" class="form-control" name="name" required />

          <label for="agency">Agência:</label>
          <input type="text" id="agency" class="form-control" name="agency" required />

          <label for="account">Conta:</label>
          <input type="text" id="account" class="form-control" name="account" required />

          <label for="code">Código:</label>
          <input type="text" id="code" class="form-control" name="code" required />
          <input type="hidden" type="text" id="user_id" value="<?php echo $_SESSION['id']; ?>" class="form-control" name="user_id" data-parsley-trigger="change" value="" required />
        </div>

        <div class="modal-footer">
          <center>
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button id="confirmar" type="submit" class="btn btn-primary">Enviar</button>
          </center>
        </form>
      </div>
    </div>

  </div>
</div>

<div id="dialog-edit-bank" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <form action="visao/controleBanco.php?action=update" method="POST" id="demo-form" data-parsley-validate>
          <label for="name">Nome:</label>
          <input type="text" id="name" class="form-control" name="name" required />

          <label for="agency">Agência:</label>
          <input type="text" id="agency" class="form-control" name="agency" required />

          <label for="account">Conta:</label>
          <input type="text" id="account" class="form-control" name="account" required />

          <label for="code">Código:</label>
          <input type="text" id="code" class="form-control" name="code" required />
          <input type="hidden" type="text" id="id" class="form-control" name="id" data-parsley-trigger="change" value="" required />
        </div>

        <div class="modal-footer">
          <center>
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button id="confirmar" type="submit" class="btn btn-primary">Salvar</button>
          </center>
        </form>
      </div>
    </div>

  </div>
</div>
