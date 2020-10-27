 <!DOCTYPE html>
<html>
<head>
  <title></title>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<?php 
  @
  session_start();
  require 'function_crypt.php';
  if( isset($_SESSION['motdepasse'])){
    
       header("paginator_reservation_livre.php");
  }else   header("login.php");

  // $letters = "/^[A-Z][0-9]+$/";

   if (isset($_POST['btnlogadmin'])) {
     if (!empty($_POST['motdepasse'])  && !empty($_POST['email'])  ) {
      
        $con=mysqli_connect("localhost","root","","ouvrages");

        $motdepasse= mysqli_real_escape_string($con,$_POST['motdepasse']);
        //$motdepasse=md5($motdepasse);
        $cryptKey= 'qJB0rGtIn5UB1xG03efyCp';
        $motdepasse = Crypte($motdepasse,$cryptKey);

       
        $email=mysqli_real_escape_string($con,$_POST['email']);
        
      // if ((preg_match($letters,$codesom))) {
        $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  
        $req=$bdd->query("SELECT * FROM admin " );
        while($rows=$req->fetch()){
     
          if ( $rows['motdepasse']==$motdepasse && $rows['email']==$email) {
           // $_SESSION['codesom']=$rows['code_massar'];
            $_SESSION['codesom']=$rows['code_som'];
            $_SESSION['motdepasse']=$rows['motdepasse'];
            $_SESSION['email']=$rows['email'];
           header('location:paginator_reservation_livre.php');
           exit();
        
          }

        }
       
        }
        
        $_SESSION['msg']='<script>swal("Votre authentification n est pas correct !","", "warning"); </script>';
        ?>
        
      <?php
        header('location:login.php');
      /* }else{
        echo '<script>alert("Il faut que votre code massar commence par une lettre majuscule suiver des numeros!");</script>';
      include 'login.php';


       }*/
      
      
     }else{
      include 'login.php';
      ?>
        <script>
          swal("Il faut saisir tous les donnée  !","", "warning");
        </script>
      <?php
     }
  


 ?>
             
