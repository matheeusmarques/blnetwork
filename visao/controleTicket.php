<?php

require_once "../modelo/Ticket.php";
require_once "../DAO/DAOTicket.php";
require_once "../DAO/mySQL.class.php";

if(!empty($_GET['action'])){
  $ticket = new Ticket();
  $daoTicket = new DAOTicket();

  switch ($_GET['action']) {
    case 'insert':
      if(isset($_POST['title'])){
        try {
          $ticket->setTitle($_POST['title']);
          $ticket->setUserId($_POST['userid']);
          $ticket->setPriority($_POST['priority']);
          $ticket->setMessage((trim($_POST['message'])));
          $ticket->setType($_POST['type']);
          $ticket->setStatus(0);
          $ticket->setDateSent(time());
          // var_dump($ticket);
          if(!$daoTicket->queryInsert($ticket))
            header("Location: http://localhost/admin/ticket.php?status=error");
          else
            header("Location: http://localhost/admin/ticket.php?status=add");
        } catch (Exception $e) {
          echo "Error:".$e->getMessage();
        }
      }
      break;

      case 'select_ticket':
        if(isset($_GET['id'])){
            try {
              $ticket->setId($_GET['id']);
              $daoTicket->querySelectTicket($ticket);
            } catch (Exception $e) {
              echo "Error:".$e->getMessage();
            }
        }
      break;

      case 'manage_status':
      // http://localhost/admin/visao/controleTicket.php?action=closeticket&id=12&uid=11&uc=11&p=admin
        if(isset($_GET['id'],$_GET['uid'],$_GET['uc'],$_GET['p'] ) ){
            try {
              if($_GET['uid'] != $_GET['uc'] && $_GET['p'] != "admin"){
                return false;
              }
              $ticket->setId($_GET['id']);
              $ticket->setStatus($_GET['status']);
              // var_dump($daoTicket->queryCloseTicket($ticket));
              $status = $daoTicket->queryUpdateStatus($ticket);
              // var_dump($status);
              header("Location: http://localhost/admin/ticket_view.php?id=".$ticket->getId()."&status=".$status);
            } catch (Exception $e) {
              echo "Error:".$e->getMessage();
            }
        }
      break;

      case 'delete':
      if(isset($_GET['id'])){
        try {
          $ticket->setId($_GET['id']);
          $daoTicket->queryDelete($ticket);
          header("Location: http://localhost/admin/ticket.php?status=delete");
        } catch (Exception $e) {
          echo 'Error:'.$e->getMessage();
        }
      }
      break;

    default:
      // code...
      break;
  }
}
?>
