<?php
// includes
include "header.php";
include "inc/modal.php";

// requires
require_once "DAO/DAOUsuario.php";
require_once "modelo/Usuario.php";
require_once "DAO/mySQL.class.php";

// dao & lista
$daoUsuario = new DAOUsuario();
$listaUsuarios = $daoUsuario->selectAll();
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
                        <th>Login</th>
                        <th>E-mail</th>
                        <th>Status</th>
                        <th>Tipo</th>
                        <th>Saldo</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($listaUsuarios as $usuario) {
                          echo '<tr>';
                            echo '<td>'.$usuario->getLogin().'</td>';
                            echo '<td>'.$usuario->getEmail().'</td>';
                            echo '<td>'.$usuario->getStatus().'</td>';
                            echo '<td>'.$usuario->getTipo().'</td>';
                            echo '<td>'.$usuario->getSaldo().'</td>';
                          echo '</tr>';
                        }
                       ?>
                    </tbody>
                  </table>


                </div>
              </div>
            </div>
            <?php
              include_once "footer.php";
            ?>
