<?php 
 session_start();
 $con=mysqli_connect("localhost","root","","ouvrages");
 $id=mysqli_real_escape_string($con,$_POST['id']);
 //echo $_POST['id'];
 $idl=mysqli_real_escape_string($con,$_POST['idl']);

 $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  
  $req2=$bdd->query("SELECT * FROM livre WHERE id='$idl' " );
  while($rows=$req2->fetch()){
          $_SESSION['nb']=$rows['nombreDeCopie'];
          

   }
  $nb=(++$_SESSION['nb']);
  $req3=$bdd->query("UPDATE livre SET nombreDeCopie='$nb'  WHERE id='$idl' " );
 $req=$bdd->query("DELETE FROM livre_reserver_etape2 WHERE id='$id' ");
 
                   

             
  

  ?>

  
                       

  