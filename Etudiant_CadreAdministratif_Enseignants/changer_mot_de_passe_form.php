<?php 
     @
      session_start();
      require 'function_crypt.php';
      $con=mysqli_connect("localhost","root","","ouvrages");
      $pass=mysqli_real_escape_string($con,$_POST['confpass']);
     // $pass=md5($pass);
      $code=mysqli_real_escape_string($con,$_POST['code']);
      $ps=mysqli_real_escape_string($con,$_POST['pass']);
      //$ps=md5($ps);
      $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
      $ps = Crypte($ps,$cryptKey);
      $pass = Crypte($pass,$cryptKey);

      $ancpassword=mysqli_real_escape_string($con,$_POST['anpass']);
      $ancpassword = Crypte($ancpassword,$cryptKey);
     
      $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));    
      $reqz=$bdd->query("SELECT * FROM etudiantinscription where code_massar='$code'  ");
      $req2=$bdd->query("SELECT * FROM cadreadministratif where code_som='$code' " );
      while($row=$reqz->fetch()){
        $_SESSION['ancmotdepasse']=mysqli_real_escape_string($con,$row['motdepasse']);
      }
      while($row=$req2->fetch()){
        $_SESSION['ancmotdepasse']=mysqli_real_escape_string($con,$row['motdepasse']);
      }
     
      //if( $code==$_SESSION['codemassar'] && $pass==$ps && $ancpassword==$_SESSION['ancmotdepasse'] ){
      	 
        $req=$bdd->query("UPDATE etudiantinscription SET motdepasse='$pass' where code_massar='$code' "); 
        $req3=$bdd->query("UPDATE cadreadministratif SET motdepasse='$pass' where code_som='$code' "); 
       
        $_SESSION['motdepasse1']=$pass;
       ?>
        
        <div class="alert alert-success" id="alertformvalidator">
          
          <strong>Success!</strong> Votre modification est terminée avec succée.
        
        </div>

       <?php
      /*}else{
      	echo '<script>alert("Il ya un erreur");</script>';
      }*/


 ?>


<script>
	$(document).ready(function(){
		$("#alertformvalidator").hide(10000);
	})
</script>
      