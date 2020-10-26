<?php 
            $con=mysqli_connect("localhost","root","","ouvrages");
            $nom=mysqli_real_escape_string($con,$_POST['nom']);
            
            $prenom=mysqli_real_escape_string($con,$_POST['prenom']);
            $code_massar=mysqli_real_escape_string($con,$_POST['code_massar']);
            $cin=mysqli_real_escape_string($con,$_POST['cin']);
            //echo $nom." ".$prenom." ".$code_massar." ".$cin;

            $email=" ";
            $motdepasse=" ";

            $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  
            $req=$bdd->prepare("INSERT INTO etudiantinscription (nom,prenom,code_massar,cin,email,motdepasse) VALUES(:nom,:prenom,:code_massar,:cin,:email,:motdepasse)");
   	        $req->execute(array(':nom'=>$nom,':prenom'=>$prenom,':code_massar'=>$code_massar,':cin'=>$cin,':email'=>$email,':motdepasse'=>$motdepasse));            
            


 ?>

<script type="text/javascript">
    $(document).ready(function(){
        $("#res_ajout_etd").load("../admin/etudiant_gestion/paginator_etudiants.php");
    })
</script>

