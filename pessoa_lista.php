<?php
// INCLUDES //
include "header.php";
include "inc/modal.php";


// REQUIRES //
require_once "DAO/DAOPessoa.php";
require_once "modelo/Pessoa.php";
require_once "DAO/mySQL.class.php";

$daoPessoa = new DAOPessoa();
$listaPessoas = $daoPessoa->selectAll();
?>
        <!-- page content -->
        <body>
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Form Elements</h3>
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

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Responsive example<small>Users</small></h2>
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

                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Sexo</th>
                        <th>D. Nascimento</th>
                        <th>CPF</th>
                        <th>RG</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($listaPessoas as $pessoa) {
                          echo '<tr>';
                            echo '<td>'.$pessoa->getNome().'</td>';
                            echo '<td>'.$pessoa->getSexo().'</td>';
                            echo '<td>'.$pessoa->getDataNascimento().'</td>';
                            echo '<td>'.$pessoa->getCpf().'</td>';
                            echo '<td>'.$pessoa->getRg().'</td>';
                            echo '<td>'.$pessoa->getStatus().'</td>';
                          echo '</tr>';
                        }
                       ?>
                    </tbody>
                  </table>


                </div>
              </div>
            </div>


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
    <?php
      include_once "footer.php";
    ?>
