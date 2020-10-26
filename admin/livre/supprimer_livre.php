<?php 
 $con=mysqli_connect("localhost","root","","ouvrages");
 $id=mysqli_real_escape_string($con,$_POST['id']);
 $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  
 $req=$bdd->query("DELETE FROM livre WHERE id='$id'");


 ?>
