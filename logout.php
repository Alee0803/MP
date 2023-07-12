<?php
   session_start();
   if(isset($_SESSION['user_name'])){
       session_destroy();
       header('location:newlogin.php');
   }
   else{
       header('location: newlogin.php');
   }
?>