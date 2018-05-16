<?php
include "header.php";

require_once "DAO/DAOEstado.php";
require_once "modelo/Estado.php";
require_once "DAO/mySQL.class.php";

$daoEstado = new DAOEstado();
$estado = new Estado();
$listaEstados = $daoEstado->selectAll();
?>
<!-- page content -->
<body>
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
            <h2>Ticket</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li>
                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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

            <!-- start form for validation -->
            <form id="demo-form" data-parsley-validate>
              <label for="fullname">Nome: </label>
              <input type="text" id="nome" class="form-control" name="nome" required />
              <br />

              <label for="heard">Estado: </label>
              <select id="estado" name="estado" class="form-control" required=>
                <option value="">Escolha..</option>
                <?php
                  foreach ($listaEstados as $estado) {
                    echo '<option value="'.$estado->getId().'">'.$estado->getNome().'</option>';
                  }
                ?>
              </select>
              <br />
              <button type="submit" class="btn btn-primary">Cadastrar</button>
                  <!-- <span class="btn btn-primary">Cadastrar</span> -->

            </form>
            <!-- end form for validations -->

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
