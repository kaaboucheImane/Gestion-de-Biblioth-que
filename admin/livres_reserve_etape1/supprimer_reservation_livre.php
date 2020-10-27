 <?php
                 // require '../../PHPMailerAutoload.php';
                  //require 'email_pass.php';
                  $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
                  $con=mysqli_connect("localhost","root","","ouvrages"); 
                  $r=$bdd->query("SELECT * FROM resevation "); 
                 
                  // $heure=date("H");
                  
                  $date = new DateTime();
                  $date1=$date->format('Y-m-d H:i:s');
                   while($rows=$r->fetch()){
                        // $validate_heure=$heure-$rows['heure'];   
                         $x = new DateTime($rows['date_heur']);
                         $x1=$x->format('Y-m-d H:i:s');
                         $res = date('Y-m-d H:i:s',strtotime('+4 hour',strtotime($x1)));
                         $id=mysqli_real_escape_string($con,$rows['id']);
                         $idl=mysqli_real_escape_string($con,$rows['id_livre']);
                         if($date1>=$res){

                            $destinataire=$rows['email'];
                            $msg="vous avez pas le droit de prendre ce livre".$rows['titre'];
                            

                            $mail = new PHPMailer;
                            //require 'function_crypt.php';
                            $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
                            $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));   
      
                            $req2=$bdd->query("SELECT * FROM admin");
                            // $mail->SMTPDebug = 4;                               // Enable verbose debug output
                            while($row=$req2->fetch()){
                            $mail->isSMTP();                                      // Set mailer to use SMTP
                            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                            $mail->SMTPAuth = true;                               // Enable SMTP authentication
                            $mail->Username = $row['email'];                 // SMTP username
                            $mail->Password = Decrypte($row['mot_de_passe_mail'],$cryptKey);                           // SMTP password
                            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                            $mail->Port = 587;                                    // TCP port to connect to
                            $ens=iconv( "UTF-8", "ISO-8859-1//IGNORE",'Ens Bibliothéque');
                            $mail->setFrom($row['email'],$ens);
                            $mail->addAddress($destinataire);     // Add a recipient

                            $mail->addReplyTo($row['email']);
      
                            $mail->isHTML(true);                                  // Set email format to HTML

                            $mail->Subject = "Avertissement ";
                            $mail->Body    = $msg;
                            $mail->AltBody = $msg;
                          }
                            if(!$mail->send()) {
                               //  echo 'Message could not be sent.';
                                 //  echo 'Mailer Error: ' . $mail->ErrorInfo;
                            } else {
          
                            }
                          $req2=$bdd->query("SELECT * FROM livre WHERE id='$idl' " );
                           while($rows=$req2->fetch()){
                                   $_SESSION['nb']=$rows['nombreDeCopie'];
                            }
                            $nb=(++$_SESSION['nb']);
                            $req3=$bdd->query("UPDATE livre SET nombreDeCopie='$nb'  WHERE id='$idl' " );

                            $req=$bdd->query("DELETE FROM resevation WHERE id='$id' ");
                            
                          }
                       // echo '<img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif" width=100em />';
    
                   }
              


      ?>