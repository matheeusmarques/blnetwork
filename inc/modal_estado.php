<!-- DIALOG DELETE ESTADO -->
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

<!-- DIALOG EDIT ESTADO -->
<div id="dialog-edit-estado" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <form action="visao/controleEstado.php?action=update" method="POST" id="demo-form" data-parsley-validate>
          <label for="nome">Estado:</label>
          <input type="text" id="nome" class="form-control" name="nome" value=""required />
          <input type="hidden" type="text" id="id" class="form-control" name="id" data-parsley-trigger="change" value="" required />
          <label for="sigla">Sigla: </label>
          <input type="text" id="sigla" class="form-control" name="sigla" value="" required />
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
<!-- DIALOG INSERT ESTADO -->
<div id="dialog-new-estado" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <form action="visao/controleEstado.php?action=insert" method="POST" id="demo-form" data-parsley-validate>
          <form id="demo-form" method="POST" action="visao/controleEstado.php?tipo=inserir" data-parsley-validate>
            <label for="fullname">Nome: </label>
            <input type="text" id="nome" class="form-control" name="nome" required />
            <br />
            <label for="fullname">Sigla: </label>
            <input type="text" data-mask="AA" id="sigla" class="form-control" name="sigla" required />
            <br />
                <!-- <span class="btn btn-primary">Cadastrar</span> -->
      </div>

      <div class="modal-footer">
        <center>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </center>
      </form>
        </div>
      </div>

    </div>
  </div>
