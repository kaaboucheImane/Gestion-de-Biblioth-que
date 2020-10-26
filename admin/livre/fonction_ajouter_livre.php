<?php 
            $con=mysqli_connect("localhost","root","","ouvrages");
            $numero=mysqli_real_escape_string($con,$_POST['numero']);
            $auteur=mysqli_real_escape_string($con,$_POST['auteur']);
            $titre=mysqli_real_escape_string($con,$_POST['titre']);
            $edition=mysqli_real_escape_string($con,$_POST['edition']);
            $lieu=mysqli_real_escape_string($con,$_POST['lieu']);
            $annee=mysqli_real_escape_string($con,$_POST['annee']);
            $cote=mysqli_real_escape_string($con,$_POST['cote']);
            $matiere=mysqli_real_escape_string($con,$_POST['matiere']);
            $nombreDeCopie=mysqli_real_escape_string($con,$_POST['nombreDeCopie']);
            $niveau=mysqli_real_escape_string($con,$_POST['niveau']);
            $collection=mysqli_real_escape_string($con,$_POST['collection']);
            $n=mysqli_real_escape_string($con,$_POST['n']);
            $mois=mysqli_real_escape_string($con,$_POST['mois']);
            $nb_partie=mysqli_real_escape_string($con,$_POST['nb_partie']);
            $nb_edition=mysqli_real_escape_string($con,$_POST['nb_edition']);
            $categorie=mysqli_real_escape_string($con,$_POST['categorie']);
            $sous_categorie=mysqli_real_escape_string($con,$_POST['sous_categorie']);

            //echo $numero.$auteur.$titre.$edition.$lieu.$annee.$cote.$matiere.$nombreDeCopie.$niveau."".$n.$mois.$nb_edition.$nb_partie.$categorie.$sous_categorie." ".$collection;

            $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  
            $req=$bdd->prepare("INSERT INTO livre(numero,auteur,titre,edition,lieu,annee,cote,matiere,nombreDeCopie,categorie_id,sous_categorie_id,niveau,collection,n,mois,nb_partie,nb_edition) VALUES(:numero,:auteur,:titre,:edition,:lieu,:annee,:cote,:matiere,:nombreDeCopie,:categorie_id,:sous_categorie_id,:niveau,:collection,:n,:mois,:nb_partie,:nb_edition)");
   	        $req->execute(array(':numero'=>$numero,':auteur'=>$auteur,':titre'=>$titre,':edition'=>$edition,'lieu'=>$lieu,':annee'=>$annee,':cote'=>$cote,':matiere'=>$matiere,':nombreDeCopie'=>$nombreDeCopie,':categorie_id'=>$categorie,':sous_categorie_id'=>$sous_categorie,':niveau'=>$niveau,':collection'=>$collection,':n'=>$n,':mois'=>$mois,':nb_partie'=>$nb_partie,':nb_edition'=>$nb_edition));            
            


 ?>
<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Indicates a successful or positive action.
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#topaginatorlivre").load("../admin/livre/paginator_livre.php");
    })
</script>

