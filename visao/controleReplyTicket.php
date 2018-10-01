<?php

require_once "../modelo/ReplyTicket.php";
require_once "../modelo/Ticket.php";
require_once "../DAO/DAOTicket.php";
require_once "../DAO/DAOReplyTicket.php";
// require_once "../DAO/DAOReplyTicket.php";
require_once "../DAO/mySQL.class.php";

if(!empty($_GET['action'])){
  $replyticket = new ReplyTicket();
  $daoReplyTicket = new DAOReplyTicket();
  $daoTicket = new DAOTicket();
  $ticket = new Ticket();

  switch ($_GET['action']) {
    case 'insert':
      if (isset($_POST['ticket_id'])) {
        try {
          $replyticket->setTicketId($_POST['ticket_id']);
          $replyticket->setMessage($_POST['message']);
          $replyticket->setUserId($_POST['user_id']);
          $daoReplyTicket->queryInsert($replyticket);
          if(isset($_POST['admin_id'])){
            $ticket->setStatus('1');
            $ticket->setAdminId($_POST['admin_id']);
            $ticket->setId($_POST['ticket_id']);
            $daoTicket->queryUpdateStatus($ticket);
            // var_dump($_POST);
            // var_dump($ticket);
          }else{
            $ticket->setStatus('0');
            $ticket->setId($_POST['ticket_id']);
            $daoTicket->queryUpdateStatus($ticket);
          }
          header("Location: http://localhost/admin/ticket_view.php?id=".$replyticket->getTicketId()."&status=updated" );
        } catch (Exception $e) {
          echo "Error:".$e->getMessage();
        }
      }

    default:
      // code...
      break;
  }
}
?>
