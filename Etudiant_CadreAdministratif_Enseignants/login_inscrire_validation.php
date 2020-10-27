 <script src="https://www.google.com/recaptcha/api.js" async defer></script>
 <script>
  $(document).ready(function(){
    $("#alertformvalidator").hide(10000);
  })
</script>
 <?php
require 'function_crypt.php';
if(isset($_POST['te'])){

    $recaptcha_secret = "6LfM3aQUAAAAAPkgIsabNSWHrLrB8clse8DFS9VX";
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret."&response=".$_POST['te']);
    $response = json_decode($response, true);

    if($response["success"] === true){
        //echo "Form Submit Successfully.";
    }else{
     // echo" you are a robot";
    }
  }else{
    echo("error");
  }
  ?>

<?php
 if(!empty($_POST['codemassar']) && !empty($_POST['cin']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail']) && !empty($_POST['cfpass']) && !empty($_POST['te']) ){

        $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
        $con=mysqli_connect("localhost","root","","ouvrages");
 
        $codem=mysqli_real_escape_string($con,$_POST['codemassar']);
        $cin=mysqli_real_escape_string($con,$_POST['cin']);
        $nom=mysqli_real_escape_string($con,$_POST['nom']);
        $prenom=mysqli_real_escape_string($con,$_POST['prenom']);
        $mail=mysqli_real_escape_string($con,$_POST['mail']);
        $pass=mysqli_real_escape_string($con,$_POST['cfpass']);
        //$pass=md5($pass);
        $cryptKey= 'qJB0rGtIn5UB1xG03efyCp';
        $pass = Crypte($pass,$cryptKey);

         $e="";
        
         $b="";

           $req3=$bdd->query("SELECT * FROM cadreadministratif where email='$b' and motdepasse='$b' and code_som='$codem' and cin='$cin' and  nom='$nom' and prenom='$prenom'  ");
           if($req3){
             while($rows=$req3->fetch()){
          
                $req4=$bdd->query("UPDATE cadreadministratif SET email='$mail', motdepasse='$pass' where  code_som='$codem' " );
                 ?>
                         
                          <div class="alert alert-success" id="alertformvalidator">         
                            <strong>Félicitation</strong> Votre donnée est bien insérer.
                          </div>
                     <?php exit(); 
           }
           
          }else{?>
               
               <div class="alert alert-warning" id="alertformvalidator">         
                 <strong>Attention!</strong> Il y'a un erreur pendant l'inscription .
               </div>
               <?php exit();?>
        <?php
}

        $req=$bdd->query("SELECT * FROM etudiantinscription where email='$e' and motdepasse='$e' and code_massar='$codem' and cin='$cin' and  nom='$nom' and prenom='$prenom'  ");
         while($rows=$req->fetch()){
          
            $req2=$bdd->query("UPDATE etudiantinscription SET email='$mail', motdepasse='$pass' where  code_massar='$codem' " );
             ?>
                      <div class="alert alert-success" id="alertformvalidator">         
                            <strong>Félicitation</strong> Votre donnée est bien insérer.
                      </div>

                 <?php
            exit();
          
         }
         ?>
               
               <div class="alert alert-warning" id="alertformvalidator">         
                 <strong>Attention!</strong> Il y'a un erreur pendant l'inscription .
               </div>
               <?php exit(); ?>
<?php }else{
 ?>
               
               <div class="alert alert-warning" id="alertformvalidator">         
                 <strong>Attention!</strong> Veuillez remplir tous les champs obligatoires .
               </div>
               <?php exit();


}



 ?>

