
<?php 
            $con=mysqli_connect("localhost","root","","ouvrages");
            $nom=mysqli_real_escape_string($con,$_POST['nom']);
            $id=mysqli_real_escape_string($con,$_POST['id']);
            $prenom=mysqli_real_escape_string($con,$_POST['prenom']);
            $code_massar=mysqli_real_escape_string($con,$_POST['code_massar']);
            $cin=mysqli_real_escape_string($con,$_POST['cin']);
            $email=mysqli_real_escape_string($con,$_POST['email']);
           

           // echo $nom.$id.$prenom.$code_massar.$cin.$email.$annee.$cote.$matiere.$nombreDeCopie.$niveau."".$n.$mois.$nb_cin.$nb_partie.$categorie.$sous_categorie." ".$collection;

            $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  
            $r=$bdd->query("UPDATE etudiantinscription SET nom='$nom' , prenom='$prenom' , code_massar='$code_massar' , cin='$cin' , email='$email'  WHERE id='$id' "); 
            


 ?>
<!--<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Indicates a successful or positive action.
</div>-->
<script type="text/javascript">
    $(document).ready(function(){
        $("#res_update_etd").load("../admin/etudiant_gestion/paginator_etudiants.php");
    })
</script>