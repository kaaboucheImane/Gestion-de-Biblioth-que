<?php 
 $con=mysqli_connect("localhost","root","","ouvrages");
 $id=mysqli_real_escape_string($con,$_POST['id']);
 $nb=mysqli_real_escape_string($con,$_POST['nb']);
  //echo $nb;
 $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  
 $r=$bdd->query("UPDATE livre_reserver_etape2 set nb='$nb' where id='$id'   "); 



   $reqq=$bdd->query("SELECT * FROM livre_reserver_etape2 where id='$id'  "); 
   while($rows=$reqq->fetch()){
        $jrdb=mysqli_real_escape_string($con,$rows['joure']);
        $jr=date("d");            
        $destinataire=mysqli_real_escape_string($con,$rows['email']);
        $msg="Votre date est expiré ! Il faut ramener le livre :".mysqli_real_escape_string($con,$rows['titre']);
        //if($jr-$jrdb>2){
 

      require '../../PHPMailerAutoload.php';
      require 'email_pass.php';
      require 'function_crypt.php';
      $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
      $mail = new PHPMailer;
      $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));   
      
      $req2=$bdd->query("SELECT * FROM admin");
      // $mail->SMTPDebug = 4;                               // Enable verbose debug output
    while($row=$req2->fetch()){
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = $row['email'];                 // SMTP username
      $mail->Password = Decrypte($row['mot_de_passe_mail'],$cryptKey);                          // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to
      $ens=iconv( "UTF-8", "ISO-8859-1//IGNORE",'Ens Bibliothéque');
      $mail->setFrom($row['email'], $ens);
      $mail->addAddress($destinataire);     // Add a recipient

      $mail->addReplyTo($row['email']);
      
      $mail->isHTML(true);                                  // Set email format to HTML

      $mail->Subject = "Avertissement ";
      $mail->Body    = $msg;
      $mail->AltBody = $msg;
     }
      if(!$mail->send()) {
        /*  echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;*/
      } else {
          
      }
   
 }
 //}
 ?>