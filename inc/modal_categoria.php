<div id="dialog-new-categoria" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <form id="demo-form" method="POST" action="visao/controleCategoria.php?action=insert"data-parsley-validate>
          <label for="name">Título: </label>
          <input type="text" id="name" class="form-control" name="name" required />

          <br />
          <label for="description">Descrição:</label>
          <textarea placeholder="Descreva aqui a categoria" id="description" required="required" class="form-control" name="description" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
          data-parsley-validation-threshold="10"></textarea>
          <br />

          <label for="status">Status: </label>
          <select id="status" name="status" class="form-control" required>
            <option value="">Escolha..</option>
            <option value="ativada">Ativada</option>
            <option value="desativada">Desativada</option>
            <!-- <option value="mouth">Bug</option> -->
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

  <div id="dialog-edit-categoria" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body">
          <form id="demo-form" method="POST" action="visao/controleCategoria.php?action=update"data-parsley-validate>
            <label for="name">Título: </label>
            <input type="text" id="name" class="form-control" name="name" required />
            <input type="hidden" type="text" id="id" class="form-control" name="id" data-parsley-trigger="change" value="" required />
            <br />
            <label for="description">Descrição:</label>
            <textarea id="description" required="required" class="form-control" name="description" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" value=""></textarea>
            <br />

            <label for="status">Status: </label>
            <select id="status" name="status" class="form-control" required>
              <!-- <option value="">Escolha..</option> -->
              <option value="ativada">Ativada</option>
              <option value="desativada">Desativada</option>
              <option value="mouth">Bug</option>
             </select>


                <br/>

          </div>

        <div class="modal-footer">
          <center>
              <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary" name="button">Alterar</button>
          </center>
        </form>
          </div>
        </div>

      </div>
    </div>


    <!-- DIALOG DELETE ESTADO -->
    <div id="dialog-delete-categoria" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
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
