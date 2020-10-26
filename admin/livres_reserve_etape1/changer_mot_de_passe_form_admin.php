<?php 
     @
      session_start();
      require 'function_crypt.php';
      $con=mysqli_connect("localhost","root","","ouvrages");

      $pass=mysqli_real_escape_string($con,$_POST['confpass']);
     // $pass=md5($pass);
      $code=mysqli_real_escape_string($con,$_POST['code']);
      $ps=mysqli_real_escape_string($con,$_POST['pass']);
      $email=mysqli_real_escape_string($con,$_POST['email']);
      $pass_mail=mysqli_real_escape_string($con,$_POST['pass_mail']);
      //$ps=md5($ps);
      $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
      $ps = Crypte($ps,$cryptKey);
      $pass = Crypte($pass,$cryptKey);
      
      $ancpassword=mysqli_real_escape_string($con,$_POST['anpass']);
      $ancpassword = Crypte($ancpassword,$cryptKey);
      $pass_mail = Crypte($pass_mail,$cryptKey);
      $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));    
      $req2=$bdd->query("SELECT * FROM admin  ");
     
      while($row=$req2->fetch()){
        $_SESSION['ancmotdepasse']=$row['motdepasse'];
      }
     
      if( $pass==$ps && $ancpassword==$_SESSION['ancmotdepasse'] ){
      	 
       
        $req3=$bdd->query("UPDATE admin SET motdepasse='$pass' , code_som='$code' , email='$email' , mot_de_passe_mail='$pass_mail'  "); 
       
        $_SESSION['motdepasse']=$pass;
       ?>
        
        <div class="alert alert-success" id="alertformvalidator">
          
          <strong>Success!</strong> Votre modification est terminée ave succée.
        
        </div>

       <?php
      }else{
      	echo '<script>alert("Il ya un erreur");</script>';
      }


 ?>


<script>
	$(document).ready(function(){
		$("#alertformvalidator").hide(10000);
	})
</script>
      