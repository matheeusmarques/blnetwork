<?php
if(empty($_GET['id'])){
  header("Location:http://localhost/admin/403.html");
}
include_once "header.php";

require_once "DAO/DAOTicket.php";
require_once "DAO/DAOReplyTicket.php";
require_once "modelo/Ticket.php";
require_once "modelo/ReplyTicket.php";
require_once "DAO/mySQL.class.php";

$daoTicket = new DAOTicket();
$daoReplyTicket = new DAOReplyTicket();

$ticket = new Ticket();
$ticket->setId($_GET['id']);
$info = $daoTicket->querySelectTicket($ticket);

$replyticket = new ReplyTicket();
$replyticket->setTicketId($_GET['id']);
$inforeply = $daoReplyTicket->querySelectTicket($replyticket);

if($_SESSION['id'] != $info['user_id'] && $_SESSION['tipo'] != "admin"){
  // header('Location:http://localhost/admin/403.html');
  echo '<script>location.href="http://localhost/admin/403.html";</script>';
  exit();
}elseif($_SESSION['tipo'] == "admin"){
  $isadmin = true;
}

// $current_user = $_SESSION['id'];

// var_dump($info);
// $listTickets = $daoTicket->querySelectAll();

?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <h2 class="text-center">TICKET #<?php echo $info['id']." -- STATUS" ;?>
                <?php switch($info['status']) {
                case 0:
                  echo '#EM ESPERA';
                  break;
                case 1:
                  echo '#ATIVO';
                  break;
                case 2:
                  echo '#FINALIZADO';
                  break;
              }
              ?></h2>
            </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <?php if($_SESSION['tipo'] == "admin"){
                    echo '                  <div class="btn-group" style="float: right; padding-right: 30px;">
                                        <button type="button"
                                        data-target="#dialog-new-pessoa"
                                        data-toggle="modal"
                                        data-userid="'.$_SESSION['id'].'?>"
                                        class="btn btn-round btn-primary">Excluir</button>
                                      </div>;';

                  }

                  if($info['status'] < 2){
                    echo '                  <div class="btn-group" style="float: right; padding-right: 30px;">
                                        <a type="button"
                                        class="btn btn-round btn-primary"
                                        href="http://localhost/admin/visao/controleTicket.php?action=manage_status&id='.$info['id'].'&uid='.$info['user_id'].'&uc='.$_SESSION['id'].'&p='.$_SESSION['tipo'].'&status=2">Trancar</a>
                                      </div>';
                  }

                  if($_SESSION['tipo'] == "admin" && $info['status'] == 2){
                    echo '                  <div class="btn-group" style="float: right; padding-right: 30px;">
                                        <a type="button"
                                        class="btn btn-round btn-primary"
                                        href="http://localhost/admin/visao/controleTicket.php?action=manage_status&id='.$info['id'].'&uid='.$info['user_id'].'&uc='.$_SESSION['id'].'&p='.$_SESSION['tipo'].'&status=1">Abrir</a>
                                      </div>';
                  } ?>

                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <!-- <div class="row"> -->
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 class="text-left">Assunto: <?php echo nl2br($info['title']); ?></h2>
                    <!-- <h2 class="text-left">  -- Status: <?php echo $info['status'];?></h2> -->
                    <div class="clearfix"></div>
                  </div>
                  <!-- <div class="x_content"> -->
                      <!-- <label>Título: </label> -->
                      <!-- <br> -->
                      <!-- <label>Mensagem: </label>
                      <br>
                      <label>Data de Envio: </label>
                      <p id="date_sent"></p>
                      <br> -->
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
                          <strong>Mensagem adicionada com sucesso!</strong>
                          </div></center>';
                          break;

                          default:
                          // code...
                          break;
                        }

                      }
                      // var_dump($inforeply);
                      // var_dump($info);
                      $i = 0;


                      $arraysize = count($inforeply);
                      $arraysizeold = count($inforeply);
                      foreach ($inforeply as $reply) {
                        if($i < $arraysize){
                          if($i == 0){
                            echo '<ul style="background: SlateBlue;" class="list-unstyled msg_list">
                          <li style="background: SlateBlue;">
                          <a>
                          <span class="image">
                          <img src="images/img.jpg" alt="img" />
                          </span>
                          <span>
                          <span style="color:white;">Ultima Mensagem: </</span>
                          <span style="color:white;"> - '.$reply->getDateSent().'</span>
                          </span>
                          <span style="color:white;" class="message"><br><br> '.nl2br($reply->getMessage()).'</span>
                          </a>
                          </li>
                          </ul>';
                        }else{
                          // if($i == $arraysize){
                          //   echo '<ul class="list-unstyled msg_list">
                          // <li>
                          // <a>
                          // <span class="image">
                          // <img src="images/img.jpg" alt="img">
                          // </span>
                          // <span>
                          // <span class="fa fa-user">testeticket<!--</span-->
                          // <span> - 2018-08-17 05:42:47</span>
                          // </span>
                          // <span class="message">Mensagem: entao estou com problemas</span>
                          // </span></a>
                          // </li>
                          // </ul>';
                          // die();
                          // }
                          echo '  <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">';
                          echo '
                          <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="heading" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$reply->getId().'" aria-expanded="false" aria-controls="collapse'.$reply->getId().'">
                          <h4 class="panel-title">De: '.$daoReplyTicket->queryConverterUser($reply).' no horário : '.$reply->getDateSent().'</h4>
                        </a>
                        <div id="collapse'.$reply->getId().'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" aria-expanded="false">
                          <div class="panel-body">
                            <p><strong></strong>
                            </p>
                            '.nl2br($reply->getMessage()).'
                                                    </div>
                        </div>
                      </div>';
                      echo '</div>';
                          // code...
                        }
                      }
                        $i++;
                      }

                      if($arraysizeold == 0){
                          echo '<ul class="list-unstyled msg_list">
                        <li>
                        <a>
                        <span class="image">
                        <img src="images/img.jpg" alt="img" />
                        </span>
                        <span>
                        <span class="fa fa-user"></</span>
                        <span> - '.$info['title'].'</span>
                        </span>
                        <span class="message">Mensagem: '.nl2br($info['message']).'</span>
                        </a>
                        </li>
                        </ul>';
                      }else {
                        // var_dump($info);
                        echo '  <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">';

                        echo '
                        <div class="panel">
                      <a class="panel-heading collapsed" role="tab" id="heading" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$info['priority'].'" aria-expanded="false" aria-controls="collapse'.$info['priority'].'">
                        <h4 class="panel-title">De: Você  no horário : '.$info['date_sent'].'</h4>
                      </a>
                      <div id="collapse'.$info['priority'].'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" aria-expanded="false">
                        <div class="panel-body">
                          <p><strong></strong>
                          </p>
                                                    '.$info['message'].'                    </div>
                      </div>';
                      echo '</div>';

                      }

                       ?>
                              <!-- <button type="reset" class="btn btn-primary">Limpar Campos</button> -->
<br>
<?php if($info['status'] < 2){
  echo '                <form id="demo-form"  method="POST" action="visao/controleReplyTicket.php?action=insert" role="form" data-parsley-validate>
                                <label for="description">Nova resposta:</label>
                                <input type="hidden" type="text" id="ticket_id" class="form-control" name="ticket_id" data-parsley-trigger="change" value="'.$info['id'].'" required />
                                <input type="hidden" type="text" id="user_id" class="form-control" name="user_id" data-parsley-trigger="change" value="'.$_SESSION['id'].'" required />
                                <textarea placeholder="Nova resposta. * Campo obrigatório *" id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                                data-parsley-validation-threshold="10"></textarea>
                                <button type="submit" class="btn btn-success">Responder</button>
                                ';
                              if($_SESSION['tipo'] == "admin"){
                                  echo '<input type="hidden" type="text" id="admin_id" class="form-control" name="admin_id" data-parsley-trigger="change" value="'.$_SESSION['id'].'" required />';
                                };

                    echo '</form>';
}?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- /page content -->
        <?php
          include_once "footer.php";
        ?>
