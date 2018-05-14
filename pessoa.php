<?php
include_once "header.php";

require_once "DAO/DAOCidade.php";
require_once "DAO/DAOPessoa.php";
require_once "DAO/mySQL.class.php";
require_once "modelo/Cidade.php";


$cidade = new Cidade();
$daoCidade = new DAOCidade();
$daoPessoa = new DAOPessoa();

$listaCidades = $daoCidade->selectAll();
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
                    <form id="demo-form"  method="POST" action="visao/pesssoa.php?tipo=cadasa" role="form" data-parsley-validate>
                      <label for="nome">Nome Completo:</label>
                      <input type="text" id="nome" class="form-control" name="nome" required />

                      <label for="cpf">CPF:</label>
                      <input type="text" id="cpf" class="form-control" name="cpf" required />

                      <label for="rg">RG:</label>
                      <input type="text" id="rg" class="form-control" name="rg" required />

                      <label for="datanascimento">Data de Nascimento:</label>
                      <input type="text" id="datanascimento" class="form-control" name="datanascimento" required />

                      <label>Sexo *:</label>
                      <p>
                        M:
                        <input type="radio" class="flat" name="sexo" id="genderM" value="M" checked="" required /> F:
                        <input type="radio" class="flat" name="sexo" id="genderF" value="F" />
                      </p>

                          <label for="heard">Cidade:</label>
                          <select name="cidade" id="cidade" class="form-control" required>
                            <?php
                              foreach($listaCidades as $cidade){
                                echo '<option value="'.$cidade->getId().'">
                                '.$cidade->getNome().'</option>';
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

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>
