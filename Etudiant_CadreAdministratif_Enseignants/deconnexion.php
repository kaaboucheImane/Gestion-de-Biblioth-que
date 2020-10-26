<?php
 session_start();
 if (isset($_SESSION['codemassar']) && isset($_SESSION['motdepasse1'])) {
 	
 	//session_destroy();
 	session_unset($_SESSION['motdepasse1']);
 	session_unset($_SESSION['codemassar']);
 	header('location:login.php');
 }else{
 	header('location:consulter.php');
 }

?>  