<?php
   session_start();
   
   if(session_destroy()) {
      unset($_SESSION['email']);
      unset($_SESSION['user_id']);
      setcookie("conversationroom", "", time()-60);
      header("Location: index.php");
      die();
   }
?>