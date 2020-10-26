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
  if(isset($_SESSION['codemassar']) && isset($_SESSION['motdepasse1'])){
    
       header('consulter.php');
       
  }else{header('login.php'); }  

  // $letters = "/^[A-Z][0-9]+$/";

   if (isset($_POST['btnlog'])) {
   	 if (!empty($_POST['motdepasse'])  && !empty($_POST['email'])  ) {
        $con=mysqli_connect("localhost","root","","ouvrages");
   	 	  $motdepasse= mysqli_real_escape_string($con,$_POST['motdepasse']);
        //$motdepasse=md5($motdepasse);
        $cryptKey= 'qJB0rGtIn5UB1xG03efyCp';
        $motdepasse = Crypte($motdepasse,$cryptKey);

        
        $email=mysqli_real_escape_string($con,$_POST['email']);
        
   	  // if ((preg_match($letters,$codemassar))) {
   	   	$bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  
        $req=$bdd->query("SELECT * FROM etudiantinscription " );
        $req2=$bdd->query("SELECT * FROM cadreadministratif " );
        $req3=$bdd->query("SELECT * FROM admin " );
        while($rows=$req->fetch()){
     
          if ( $rows['motdepasse']==$motdepasse && $rows['email']==$email) {
           // $_SESSION['codemassar']=$rows['code_massar'];

            $_SESSION['codemassar']=$rows['code_massar'];
            $_SESSION['motdepasse1']=$rows['motdepasse'];
            $_SESSION['email']=$rows['email'];
            $_SESSION['nom']=$rows['nom'];
            $_SESSION['prenom']=$rows['prenom'];

            if(!empty($_POST['remember'])){
              setcookie("motdepasse",$_POST['motdepasse'],time()+(10*365*24*60*60));
              setcookie("email",$rows['email'],time()+(10*365*24*60*60));
            }else{
              if(isset($_COOKIE['motdepasse'])){
                setcookie("motdepasse","");
              }
              if(isset($_COOKIE['email'])){
                setcookie("email","");
              }
            }
           header('location:consulter.php');
           exit();
        
          }

        }

        while($rows=$req2->fetch()){
     
          if ( $rows['motdepasse']==$motdepasse && $rows['email']==$email) {
           // $_SESSION['codemassar']=$rows['code_massar'];
            $_SESSION['codemassar']=$rows['code_som'];
            $_SESSION['motdepasse1']=$rows['motdepasse'];
            $_SESSION['email']=$rows['email'];
            $_SESSION['nom']=$rows['nom'];
            $_SESSION['prenom']=$rows['prenom'];

            if(!empty($_POST['remember'])){
              setcookie("motdepasse",$_POST['motdepasse'],time()+(10*365*24*60*60));
              setcookie("email",$rows['email'],time()+(10*365*24*60*60));
            }else{
              if(isset($_COOKIE['motdepasse'])){
                setcookie("motdepasse","");
              }
              if(isset($_COOKIE['email'])){
                setcookie("email","");
              }
            }
           header('location:consulter.php');
           exit();
        
          }

        }
        while($rows=$req3->fetch()){
     
          if ( $rows['motdepasse']==$motdepasse && $rows['email']==$email) {
           // $_SESSION['codemassar']=$rows['code_massar'];
            $_SESSION['codemassar']=$rows['code_som'];
            $_SESSION['motdepasse1']=$rows['motdepasse'];
            $_SESSION['email']=$rows['email'];
            

            if(!empty($_POST['remember'])){
              setcookie("motdepasse",$_POST['motdepasse'],time()+(10*365*24*60*60));
              setcookie("email",$rows['email'],time()+(10*365*24*60*60));
            }else{
              if(isset($_COOKIE['motdepasse'])){
                setcookie("motdepasse","");
              }
              if(isset($_COOKIE['email'])){
                setcookie("email","");
              }
            }
           header('location:consulter.php');
           exit();
        
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
      
   	 
      ?>
        <script>
          swal("Il faut saisir tous les donnée  !","", "warning");
        </script>
      <?php
      header('location:login.php');
   	 }
   }


 ?>
             
