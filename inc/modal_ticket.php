<?php

// require_once "DAO/DAOEstado.php";
// require_once "modelo/Estado.php";
// require_once "DAO/mySQL.class.php";
//
// $daoEstado = new DAOEstado();
// $estado = new Estado();
// $listaEstados = $daoEstado->selectAll();
?>
<div id="dialog-delete-ticket" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
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
        <form action="visao/controleCidade.php?action=update" method="POST" id="demo-form" data-parsley-validate>
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
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button id="confirmar" type="submit" class="btn btn-primary">Enviar</button>
        </center>
      </form>
        </div>
      </div>

    </div>
  </div>

<div id="dialog-new-ticket" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <form action="visao/controleTicket.php?action=insert" method="POST" id="demo-form" data-parsley-validate>
          <input type="hidden" type="text" id="userid" class="form-control" name="userid" data-parsley-trigger="change" value="" required />
          <label for="title">Título:</label>
          <input type="text" id="title" class="form-control" name="title" required />
          <label for="type">Tipo: </label>
              <select id="type" name="type" class="form-control" required>
                <option value="0">Erro</option>
                <option value="1">Sugestão</option>
                <option value="2">Outros</option>
              </select>
          <label for="priority">Prioridade:</label>
          <select id="priority" name="priority" class="form-control" required>
            <option value="alta">Alta</option>
            <option value="media">Media</option>
            <option value="baixa">Baixa</option>
          </select>
          <label for="message">Mensagem (20 caracteres minímo, 255 máximo) :</label>
<textarea id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Você precisa descrever o seu problema em pelo menos 20 caracteres."
  data-parsley-validation-threshold="10">
</textarea>

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
<div id="dialog-see-ticket" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <form method="POST" style="" id="see-ticket-form" data-parsley-validate>
          <div class="col-sm-9 mail_view">
                        <div class="inbox-body">
                            <div class="col-md-4 text-left">
                              <p id="date_sent" class="date"></p>
                            </div>
                            <div class="col-md-12">
                              <h4 id="title"></h4>
                            </div>
                          <div class="sender-info">
                            <div class="row">
                              <div class="col-md-12">
                                <strong id="user"></strong>
                                <a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a>
                              </div>
                            </div>
                          </div>
                          <div style="" class="view-mail">
                            <p id="message"></p>
                          </div>
                        </div>

                      </div>
        </div>

      <div class="modal-footer">
        <center>
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-reply"></i> Responder</button>
          </center>
      </form>
        </div>
      </div>

    </div>
  </div>
