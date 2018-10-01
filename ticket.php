<?php
// includes
include "header.php";
include "inc/modal_ticket.php";

// requires
require_once "DAO/DAOTicket.php";
require_once "modelo/Ticket.php";
require_once "DAO/mySQL.class.php";

$daoTicket = new DAOTicket();
$ticket = new Ticket();
$ticket->setUserId($_SESSION['id']);
if($_SESSION['tipo'] == "admin")
  $listTickets = $daoTicket->querySelectAll();
else
  $listTickets = $daoTicket->querySelectTicketFromUser($ticket);

?>
        <!-- page content -->
        <body>
          <div class="right_col" role="main">
                    <div class="">
                      <div class="page-title">
                        <div class="title_left">
                          <h3>Lista de Tickets</h3>
                        </div>

                        <div class="title_right">
                          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="btn-group" style="float: right; padding-right: 30px;">
                              <button type="button"
                              data-target="#dialog-new-ticket"
                              data-toggle="modal"
                              data-userid="<?php echo $_SESSION['id'];?>"
                              class="btn btn-round btn-primary">Novo Ticket <i class="fa fa-ticket">  </i></button>
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
                                    <th>Título</th>
                                    <th>Tipo</th>
                                    <th>Usuário</th>
                                    <th>Status</th>
                                    <th>Data de Envio</th>
                                    <th>Prioridade</th>
                                    <th>Ações</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($listTickets as $ticket) {
                                      echo '<tr>';
                                        echo '<td>'.$ticket->getTitle().'</td>';
                                        echo '<td>';
                                        if ($ticket->getType() == 0){
                                          echo 'Erro';
                                        }else if ($ticket->getType() == 1){
                                          echo 'Sugestão';
                                        }else{
                                          echo 'Outros';
                                        }
                                        echo '</td>';
                                        echo '<td>'.$daoTicket->queryConverterUser($ticket->getUserId()).'</td>';
                                        echo '<td>';
                                        if($ticket->getStatus() == 2){
                                          echo ' <span class="label label-success">Finalizado</span>';
                                        }elseif ($ticket->getStatus() == 1) {
                                          echo '<span class="label label-info">Aguardando Usuário</span>';
                                        }else{
                                          echo '<span class="label label-warning">Aguardando Administrador</span>';
                                        }
                                        echo '</td>';
                                        echo '<td>'.$ticket->getDateSent().'</td>';
                                        echo '<td>';
                                        if($ticket->getPriority() == "alta"){
                                          echo '<span class="label label-danger">Alta</span>';
                                        }elseif ($ticket->getPriority() == "media"){
                                          echo '<span class="label label-primary">Média</span>';
                                        }else{
                                          echo '<span class="label label-default">Normal</span>';
                                        }
                                        echo '</td>';
                                        echo '<td><div class="btn-group">
                                        <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">Ações <span class="caret"></span>
                                        </button>
                                        <ul role="menu" class="dropdown-menu">
                                        <li>
                                        <a href="http://localhost/admin/ticket_view.php?id='.$ticket->getId().'"
                                        data-message="Descrição:'.$ticket->getMessage().'"
                                        data-user="Enviado por: '.$daoTicket->queryConverterUser($ticket->getUserId()).'"
                                        data-title="Título: '.$ticket->getTitle().'"
                                        data-datesent="Envio:'.$ticket->getDateSent().'">Visualizar</a>
                                        </li>
                                        <li>
                                        <a
                                        data-target="#dialog-delete-ticket"
                                        data-id="'.$ticket->getId().'"
                                        data-name="'.$ticket->getTitle().'"
                                        data-toggle="modal">Excluir</a>
                                        </li>
                                        <li>
                                        ';if($ticket->getStatus() < 2){
                                          echo '<a   href="http://localhost/admin/visao/controleTicket.php?action=manage_status&id='.$ticket->getId().'&uid='.$ticket->getUserId().'&uc='.$_SESSION['id'].'&p='.$_SESSION['tipo'].'&status=2" data-toggle="modal">Trancar</a>';
                                        }else{
                                          echo '<a  href="http://localhost/admin/visao/controleTicket.php?action=manage_status&id='.$ticket->getId().'&uid='.$ticket->getUserId().'&uc='.$_SESSION['id'].'&p='.$_SESSION['tipo'].'&status=1" data-toggle="modal">Abrir</a>';
                                        };'
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
              include_once "footer.php";
            ?>
