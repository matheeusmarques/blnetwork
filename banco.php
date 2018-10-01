<?php
##
include 'header.php';
include 'inc/modal_banco.php';

## requires ##
require_once 'DAO/DAOBanco.php';
require_once 'modelo/Banco.php';
require_once "DAO/mySQL.class.php";

$daoBanco = new DAOBanco();
$banco = new Banco();
$banco->userid = $_SESSION['id'];
$listBank = $daoBanco->querySelectAll($banco);
?>
<!-- page content -->
<body>
  <div class="right_col" role="main">
            <div class="">
              <div class="page-title">
                <div class="title_left">
                  <h3>Lista de Bancos</h3>
                </div>

                <div class="title_right">
                  <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="btn-group" style="float: right; padding-right: 30px;">
                      <button type="button"
                      data-target="#dialog-new-bank"
                      data-toggle="modal"
                      data-userid="<?php echo $_SESSION['id'];?>"
                      class="btn btn-round btn-primary">Novo Banco <i class="fa fa-bank">  </i></button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_content">
                      <table style="" id="datatable" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Nome</th>
                            <th>Agência</th>
                            <th>Conta</th>
                            <th>Código</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            foreach ($listBank as $bank) {
                              echo '<tr>';
                                echo '<td>'.$bank->name.'</td>';
                                echo '<td>'.$bank->agency.'</td>';
                                echo '<td>'.$bank->account.'</td>';
                                echo '<td>'.$bank->code.'</td>';
                                echo '<td><div class="btn-group">
                                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">Ações <span class="caret"></span>
                                </button>
                                <ul role="menu" class="dropdown-menu">
                                <li>
                                <a
                                data-toggle="modal"
                                data-target="#dialog-edit-bank"
                                data-name="'.$bank->name.'"
                                data-agency="'.$bank->agency.'"
                                data-account="'.$bank->account.'"
                                data-code="'.$bank->code.'">Alterar</a>
                                </li>
                                <li>
                                <a
                                data-target="#dialog-delete-bank"
                                data-id="'.$bank->id.'"
                                data-name="'.$bank->name.'"
                                data-toggle="modal">Excluir</a>
                                </li>
                                </ul>
                                </div></td>';
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
            </div>
          </div>

</body>

    <?php
      include_once "footer.php";
    ?>
