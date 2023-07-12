<?php
session_start();


if(!isset($_SESSION['user_name']))
{
    header("location:login.php");
  //  die();
}

	
echo "welcome ".$_SESSION['user_name'];

?>
<a href="logout.php">Logout</a>
