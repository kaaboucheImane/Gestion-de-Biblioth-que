<?php
 session_start();
 if (isset($_SESSION['codesom']) && isset($_SESSION['motdepasse'])) {
 	
 	//session_destroy();
 	session_unset($_SESSION['motdepasse']);
 	session_unset($_SESSION['codesom']);
 	header('location:login.php');
 }else{
 	header('location:paginator_reservation_livre.php');
 }

?>  