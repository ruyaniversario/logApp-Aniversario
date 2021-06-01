<?php
   # destroy session
   session_start();
   session_destroy();

   header('location: guestbook-login.php');
   exit;
?>