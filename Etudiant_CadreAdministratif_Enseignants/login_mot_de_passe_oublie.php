
 <script>
  $(document).ready(function(){
    $("#alertformvalidator").hide(10000);
  })
</script>


<?php 
 require 'function_crypt.php';    
 if (!empty($_POST['code']) && !empty($_POST['mail'])) {
       

       $con=mysqli_connect("localhost","root","","ouvrages");
 
        
        $code=mysqli_real_escape_string($con,$_POST['code']);
        $destinataire=mysqli_real_escape_string($con,$_POST['mail']);

                        
                        
 	      $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  
        $req=$bdd->query("SELECT * FROM etudiantinscription " );
        $req2=$bdd->query("SELECT * FROM cadreadministratif " );
        while($rows=$req->fetch()){
          if($rows['code_massar']==$code  && $destinataire==$rows['email']){
            $cryptKey= 'qJB0rGtIn5UB1xG03efyCp';
            $pass = Decrypte($rows['motdepasse'],$cryptKey);

              $msg="Votre Mot de passe est :".$pass;
                  if(mail($destinataire,"Récuperation du code", $msg)){
                     ?>
                                
                                <div class="alert alert-success" id="alertformvalidator">         
                                  <strong>Félicitation</strong> Votre Mot de passe est recuperé avec succès.
                                </div>
                            <?php
                        }
                  exit();
          }
        }

        while($rows=$req2->fetch()){
          if($rows['code_som']==$code  && $destinataire==$rows['email']){
            $cryptKey= 'qJB0rGtIn5UB1xG03efyCp';
            $pass = Decrypte($rows['motdepasse'],$cryptKey);

              $msg="Votre Mot de passe est :".$pass;
                  if(mail($destinataire,"Récuperation du code", $msg)){
                     ?>
                                
                                <div class="alert alert-success" id="alertformvalidator">         
                                  <strong>Félicitation</strong> Votre Mot de passe est recuperé avec succès.
                                </div>
                            <?php
                        }
                  exit();
          }
        }
    ?>

        <div class="alert alert-warning" id="alertformvalidator">         
          <strong>Attention!</strong> Votre donnée pas correct.
        </div>
<?php }else{
 ?>
               
               <div class="alert alert-warning" id="alertformvalidator">         
                 <strong>Attention!</strong> Veuillez remplir tous les champs obligatoires .
               </div>
               <?php exit();


}



 ?>



 