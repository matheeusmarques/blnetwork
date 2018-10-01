<?php
// includes
include "header.php";
include "inc/modal_usuario.php";

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
                <h3>Lista de Usuários</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="btn-group" style="float: right; padding-right: 30px;">
                    <button type="button"
                    data-target="#dialog-new-user"
                    data-toggle="modal"
                    data-userid="<?php echo $_SESSION['id'];?>"
                    class="btn btn-round btn-primary">Novo Usuário</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <!-- <div class="x_title">
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
                </div> -->

                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Login</th>
                        <th>Pessoa</th>
                        <th>E-mail</th>
                        <th>Status</th>
                        <th>Tipo</th>
                        <th>Saldo</th>
                        <th>Opções</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($listaUsuarios as $usuario) {
                          echo '<tr>';
                            echo '<td>'.$usuario->getLogin().'</td>';
                            echo '<td>'.$daoUsuario->queryConverterPessoa($usuario->getPessoaId()).'</td>';
                            echo '<td>'.$usuario->getEmail().'</td>';
                            echo '<td>'.$usuario->getStatus().'</td>';
                            echo '<td>'.$usuario->getTipo().'</td>';
                            echo '<td>'.$usuario->getSaldo().'</td>';
                            echo '<td class=" last">                    <div class="btn-group">
      <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">Ações <span class="caret"></span>
      </button>
      <ul role="menu" class="dropdown-menu">
      <li>
          <a href="#" data-toggle="modal"
          data-ulogin="'.$usuario->getLogin().'"
          data-uid="'.$usuario->getId().'"
          data-uemail="'.$usuario->getEmail().'"
          data-ustatus="'.$usuario->getStatus().'"
          data-utipo="'.$usuario->getTipo().'"
          data-usaldo="'.$usuario->getSaldo().'"
          data-upessoa="'.$usuario->getPessoaId().'"
          data-target="#dialog-edit-usuario"
          >Alterar</a>
      </li>
          <li>
            <a data-toggle="modal"
            data-target="#dialog-delete-user"
            data-nome="'.$usuario->getLogin().'"
            data-id="'.$usuario->getId().'"
            href="#" >Excluir</a>
        </li>
      </ul>
      </div>';
                            echo '</td>';
                          echo '</tr>';
                        }
                       ?>
                    </tbody>
                  </table>

                  <?php
                  if(isset($_GET['status'])){
                    switch ($_GET['status']) {
                      case 'removed':
                      echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      <strong>Removido com sucesso!</strong>
                      </div></center>';
                      break;

                      case 'error':
                      echo '<center><div class="alert alert-danger alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      <strong>Houve um erro ao adicionar. Tente novamente!</strong>
                      </div></center>';
                      break;

                      case 'updated':
                      echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      <strong>Atualizado com sucesso!</strong>
                      </div></center>';
                      break;

                      case 'add':
                      echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      <strong>Adicionado com sucesso!</strong>
                      </div></center>';
                      break;

                      default:
                      // code...
                      break;
                    }

                  } ?>


                </div>
              </div>
            </div>
          </div>
        </body>
            <?php
              include_once "footer.php";
            ?>
