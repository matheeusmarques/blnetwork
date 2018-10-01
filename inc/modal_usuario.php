<?php

 require_once "DAO/DAOPessoa.php";
 require_once "modelo/Pessoa.php";
 require_once "DAO/mySQL.class.php";
$daoPessoa = new DAOPessoa();
$listaPessoas = $daoPessoa->selectAll();
?>
<!-- DIALOG DELETE ESTADO -->
<div id="dialog-delete-user" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
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

<!-- DIALOG EDIT USUARIO -->
<div id="dialog-edit-user" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <form action="visao/controleUsuario.php?tipo=update" method="POST" id="demo-form" data-parsley-validate>
          <label for="login">Login:</label>
          <input type="text" id="login" class="form-control" name="login" value=""required />
          <input type="hidden" type="text" id="id" class="form-control" name="id" data-parsley-trigger="change" value="" required />
          <label for="email">E-mail: </label>
          <input type="text" id="email" class="form-control" name="email" value="" required />
          <label for="tipo">Tipo:</label>
          <select name="tipo" id="tipo" class="form-control" required>
            <option value="admin">Administrador</option>
            <option value="moderador">Moderador</option>
            <option value="suporte">Suporte</option>
            <option value="jornalista">Jornalista</option>
            <option value="revisor">Revisor</option>
            <option value="membro">Membro</option>
          </select>
          <label for="heard">Status: </label>
              <select id="heard" name="status" class="form-control" required>
                <option value="1">Ativo</option>
                <option value="0">Desativado</option>
            </select>
          <label for="pessoa_id">Pessoa:</label>
            <select name="pessoa_id" id="pessoa_id" class="form-control" required>
              <?php
                foreach ($listaPessoas as $pessoa) {
                  echo '<option value="'.$pessoa->getId().'">'.$pessoa->getNome().'</option>';
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

<!-- DIALOG NEW USUARIO -->
<div id="dialog-new-user" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <form id="demo-form" action="visao/controleUsuario.php?action=insert" method="POST" role="form" data-parsley-validate>
          <label for="login">Login</label>
          <input type="text" id="login" class="form-control" name="login" required />

          <label for="senha">Senha:</label>
          <input type="text" id="senha" class="form-control" name="senha" required />

          <label for="email">E-mail:</label>
          <input type="text" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" name="email" required />

          <label for="tipo">Tipo:</label>
          <select name="tipo" id="tipo" class="form-control" required>
            <option value="admin">Administrador</option>
            <option value="moderador">Moderador</option>
            <option value="suporte">Suporte</option>
            <option value="jornalista">Jornalista</option>
            <option value="revisor">Revisor</option>
            <option value="membro">Membro</option>
          </select>

          <label for="datanascimento">Pessoa:</label>
          <select name="pessoa_id" id="pessoa_id" class="form-control" required>
            <option value="default">Escolha uma pessoa...</option>
            <?php
              foreach ($listaPessoas as $pessoa) {
                echo '<option value="'.$pessoa->getId().'">'
                  .$pessoa->getNome().'</option>';
              }
            ?>
          </select>

              <br/>
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
  </div>
