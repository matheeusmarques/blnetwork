<?php
if(isset($_SESSION['login'])){
  session_destroy();
}
header("Location: http://localhost/admin/login.php");
?>
