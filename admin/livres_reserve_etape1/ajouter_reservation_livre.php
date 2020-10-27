<?php 
      $con=mysqli_connect("localhost","root","","ouvrages");
      $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  
      define('TIMEZONE', 'Africa/Casablanca');
      date_default_timezone_set(TIMEZONE);
      $date = new DateTime();
      $date1=$date->format('Y-m-d H:i:s');
      //$jr=date("d");
      $nb=1;
      $req2=$bdd->prepare("INSERT INTO livre_reserver_etape2 (code_massar,titre,numero,nom_prenom,email,joure,livre_id,nb) VALUES(:codem,:titre,:num,:np,:em,:jr,:li,:nb)");
   	  $req2->execute(array(':codem'=>mysqli_real_escape_string($con,$_POST['codemassare']),':titre'=>mysqli_real_escape_string($con,$_POST['titre']),':num'=>mysqli_real_escape_string($con,$_POST['numero']),':np'=>mysqli_real_escape_string($con,$_POST['fn']),':em'=>mysqli_real_escape_string($con,$_POST['mail']),':jr'=>mysqli_real_escape_string($con,$date1),':li'=>mysqli_real_escape_string($con,$_POST['idlivre']),':nb'=>mysqli_real_escape_string($con,$nb))); 
      $id=mysqli_real_escape_string($con,$_POST['id']);
      $req=$bdd->query("DELETE FROM resevation WHERE id='$id' ");

 ?>
 