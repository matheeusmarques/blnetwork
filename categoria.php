<?php
include_once "header.php";
include "inc/modal_categoria.php";


require_once "DAO/DAOCategoria.php";
require_once "modelo/Categoria.php";
require_once "DAO/mySQL.class.php";

$daoCategoria = new DAOCategoria();
$listaCategorias = $daoCategoria->selectAll();
?>
<!-- page content -->
<!-- <div class="right_col" role="main">
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
            <h2>Categoria</h2>
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

            <!- start form for validation -->
            <!-- <form id="demo-form" method="POST" action="visao/controleCategoria.php?tipo=inserir"data-parsley-validate>
              <label for="titulo">Título: </label>
              <input type="text" id="titulo" class="form-control" name="titulo" required />

              <br />
              <label for="descricao">Descrição:</label>
              <textarea placeholder="Descreva aqui a categoria" id="descricao" required="required" class="form-control" name="descricao" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
              data-parsley-validation-threshold="10"></textarea>
              <br />

              <label for="status">Status: </label>
              <select id="status" name="status" class="form-control" required>
                <option value="">Escolha..</option>
                <option value="ativada">Ativada</option>
                <option value="desativada">Desativada</option>
                <!- <option value="mouth">Bug</option> -->
              <!-- </select>


                  <br/>
                  <button type="submit" class="btn btn-primary" name="button">Cadastrar</button>
            </form>
            <!-- end form for validations -->

          <!-- </div>
        </div>

  </div>
</div>
  </div>
</div> -->
<body>
  <div class="right_col" role="main">
            <div class="">
              <div class="page-title">
                <div class="title_left">
                  <h3>Lista de Categorias</h3>
                </div>

                <div class="title_right">
                  <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="btn-group" style="float: right; padding-right: 30px;">
                      <button type="button"
                      data-target="#dialog-new-categoria"
                      data-toggle="modal"
                      data-userid="<?php echo $_SESSION['id'];?>"
                      class="btn btn-round btn-primary">Nova Categoria <i class="fa fa-ticket">  </i></button>
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
                            <th>Descrição</th>
                            <th>Status</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listaCategorias as $categoria) {
                              echo '<td>'.$categoria->getName().'</td>';
                              echo '<td>'.$categoria->getDescription().'</td>';
                              echo '<td>'.$categoria->getStatus().'</td>';
                                echo '<td><div class="btn-group">
                                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">Ações <span class="caret"></span>
                                </button>
                                <ul role="menu" class="dropdown-menu">
                                <li>
                                <a href="#"
                                data-toggle="modal"
                                data-description="'.$categoria->getDescription().'"
                                data-id="'.$categoria->getId().'"
                                data-name="'.$categoria->getName().'"
                                data-status="'.$categoria->getStatus().'"
                                data-target="#dialog-edit-categoria"
                                >Alterar</a>
                                </li>
                                <li>
                                <a data-toggle="modal"
                                  data-id="'.$categoria->getId().'"
                                  data-name="'.$categoria->getName().'"
                                  data-target="#dialog-delete-categoria">Excluir</a>
                                </li>
                                </ul>
                                </div></td></tr>';
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
require_once "footer.php";
 ?>
