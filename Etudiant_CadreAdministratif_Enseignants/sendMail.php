<!DOCTYPE html>
<html>
<head>
  <title></title>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>

<?php 
 
  
  $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));   
      
      $req2=$bdd->query("SELECT * FROM admin");
     
 ?>                   
<?php


      require '../PHPMailerAutoload.php';
      require 'email_pass.php';
      require 'function_crypt.php';
      $mail = new PHPMailer;
      $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
      // $mail->SMTPDebug = 4;                               // Enable verbose debug output
while($row=$req2->fetch()){
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true; 
                             // Enable SMTP authentication
      $mail->Username = $row['email'];
                     // SMTP username
      $mail->Password =Decrypte($row['mot_de_passe_mail'],$cryptKey);                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to
      $ens=iconv( "UTF-8", "ISO-8859-1//IGNORE",'Ens Bibliothéque');
      $mail->setFrom($_POST['mail'],$ens);
      $mail->addAddress($row['email'],$ens);     // Add a recipient

      $mail->addReplyTo($_POST['mail']);
      
      $mail->isHTML(true);                                  // Set email format to HTML

      $mail->Subject = $_POST['nom'];
      $mail->Body    = $_POST['msg'];
      $mail->AltBody = $_POST['msg'];
}  
      if(!$mail->send()) {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
          ?>
                                <script>
                                  swal("Votre message est envoyé avec succès","", "success");
                                </script>
                            <?php
      }
   









 ?>
  
</body>
</html>

                 
