<?php
include_once "header.php";
include "inc/modal_noticia.php";


require_once "DAO/DAONoticia.php";
require_once "modelo/Noticia.php";
require_once "DAO/mySQL.class.php";

$daoNoticia = new DAONoticia();
$listaNoticias = $daoNoticia->selectAll();
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
                  <h3>Lista de Notícias</h3>
                </div>

                <div class="title_right">
                  <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="btn-group" style="float: right; padding-right: 30px;">
                      <button type="button"
                      data-target="#dialog-new-noticia"
                      data-toggle="modal"
                      data-userid="<?php echo $_SESSION['id'];?>"
                      class="btn btn-round btn-primary">Nova Notícia <i class="fa fa-ticket">  </i></button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="row">
                            <div class="col-md-12">
                              <div class="x_panel">
                                <div class="x_title">
                                  <ul class="nav navbar-right panel_toolbox">
                                    <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> -->
                                    </li>
                                    <!-- <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                      <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                      </ul>
                                    </li> -->
                                    <!-- <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li> -->
                                  </ul>
                                  <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                  <div class="row">

                                    <?php
                                    foreach ($listaNoticias as $noticia) {
                                      echo '                                    <div class="col-md-55">
                                                                            <div class="thumbnail">
                                                                              <div class="image view view-first">
                                                                                <img style="width: 100%; display: block;" src="'.$noticia->getImageCover().'" alt="image">
                                                                                <div class="mask">
                                                                                  <p>'.$noticia->getAuxTitle().'</p>
                                                                                  <div class="tools tools-bottom">
                                                                                    <a href="#"><i class="fa fa-link"></i></a>
                                                                                    <a href="#"><i class="fa fa-pencil"></i></a>
                                                                                    <a href="#"><i class="fa fa-times"></i></a>
                                                                                  </div>
                                                                                </div>
                                                                              </div>
                                                                              <div class="caption">
                                                                                <p>'.$noticia->getTitle().'</p>
                                                                              </div>
                                                                            </div>
                                                                          </div>';
                                    } ?>
                                  </div>
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
