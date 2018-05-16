<?php
include_once "header.php";

require_once "DAO/DAOPessoa.php";
require_once "DAO/DAOUsuario.php";
require_once "DAO/mySQL.class.php";
require_once "modelo/Pessoa.php";

$daoPessoa = new DAOPessoa();
$daoUsuario = new DAOUsuario();

$listaPessoas = $daoPessoa->selectAll();

?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Plain Page</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Plain Page</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form id="demo-form" action="visao/adicionarUsuario.php" method="POST" role="form" data-parsley-validate>
                      <label for="login">Login</label>
                      <input type="text" id="login" class="form-control" name="login" required />

                      <label for="senha">Senha:</label>
                      <input type="text" id="senha" class="form-control" name="senha" required />

                      <label for="email">E-mail:</label>
                      <input type="text" id="email" class="form-control" name="email" required />

                      <label for="tipo">Tipo:</label>
                      <select name="tipo" id="tipo" class="form-control" required>
                        <option value="admin">Administrador</option>
                        <option value="moderador">Moderador</option>
                        <option value="suporte">Suporte</option>
                        <option value="jornalista">Jornalista</option>
                        <option value="revisor">Revisor</option>
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
                              <button type="button" class="btn btn-primary">Cancelar</button>
                              <button type="reset" class="btn btn-primary">Limpar Campos</button>
                              <button type="submit" class="btn btn-success">Enviar</button>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <?php
          include_once "footer.php";
        ?>
