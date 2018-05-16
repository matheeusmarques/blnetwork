<?php
include_once "header.php";

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
            <h2>Ticket <small>Click to validate</small></h2>
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

            <!-- start form for validation -->
            <form id="demo-form" data-parsley-validate>
              <label for="fullname">Título: </label>
              <input type="text" id="fullname" class="form-control" name="fullname" required />

              <br />

              <label for="heard">Tipo: </label>
              <select id="heard" class="form-control" required>
                <option value="">Escolha..</option>
                <option value="press">Bug</option>
                <option value="net">Bug</option>
                <option value="mouth">Bug</option>
              </select>
              <br />

              <label>Prioridade:</label>
              <p style="padding: 5px;">
                <input type="checkbox" name="hobbies[]" id="hobby1" value="ski" data-parsley-mincheck="2" required class="flat" /> Alta
                <br />

                <input type="checkbox" name="hobbies[]" id="hobby2" value="run" class="flat" /> Média
                <br />

                <input type="checkbox" name="hobbies[]" id="hobby3" value="eat" class="flat" /> Comum
                <br />

                <p>

                  <label for="message">Descrição:</label>
                  <textarea placeholder="Descreva aqui o seu problema" id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                    data-parsley-validation-threshold="10"></textarea>

                  <br/>
                  <span class="btn btn-primary">Cadastrar</span>

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
