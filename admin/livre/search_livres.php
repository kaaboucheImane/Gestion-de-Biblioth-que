
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script>
    $(document).ready(function(){
     $("table tbody").on('click','#btnmodifier',function(event){
      event.preventDefault();
       var id=$(this).attr("data-id");
       var auteur=$(this).attr("data-auteur");
       var titre=$(this).attr("data-titre");
       var edition=$(this).attr("data-edition");
       var lieu=$(this).attr("data-lieu");
       var annee=$(this).attr("data-annee");
       var cote=$(this).attr("data-cote");
       var matiere=$(this).attr("data-matiere");
       var nombreDeCopie=$(this).attr("data-nombreDeCopie");
       var niveau=$(this).attr("data-niveau");
       var collection=$(this).attr("data-collection");
       var n=$(this).attr("data-n");
       var mois=$(this).attr("data-mois");
       var nb_partie=$(this).attr("data-nb_partie");
       var nb_edition=$(this).attr("data-nb_edition");
       var numero=$(this).attr("data-numero");
       var categorie=$(this).attr("data-categorie");
       var sous_categorie=$(this).attr("data-sous_categorie");
       var idcate=$(this).attr("data-idcate");
       var idsouscate=$(this).attr("data-idsouscate");

      $.post('../admin/livre/modifier_livre.php',{id:id,auteur:auteur,titre:titre,edition:edition,lieu:lieu,annee:annee,cote:cote,matiere:matiere,nombreDeCopie:nombreDeCopie,niveau:niveau,collection:collection,n:n,mois:mois,nb_partie:nb_partie,nb_edition:nb_edition,numero:numero,categorie:categorie,sous_categorie:sous_categorie,idcate:idcate,idsouscate:idsouscate},function(data){

            $('#res_search').html(data);

                   
         });
       
    })
  })
</script>
  <script>
    $(document).ready(function(){
     $("table tbody").on('click','#btnSupprimer',function(event){
      var id=$(this).attr("data");
      
     swal({
       title: "Êtes-vous sûr de supprimer ce livre?",
       icon: "warning",
       buttons:["No", "Oui"],
       
     })
     .then((willDelete) => {
       if (willDelete) {
         swal("Ce livre est supprimé", {
           icon: "success",
          
         });
         $("#res_supprime").load("../admin/livre/supprimer_livre.php",{id:id});
         $(this).closest('tr').remove();


       }else {
         swal("Ce livre n'est pas supprimé");
       }
     })
       event.preventDefault();
    })
  })
</script>

<script>
    $(document).ready(function(){
     $("#btnajouter").on('click',function(event){
      event.preventDefault();
       

      $.post('../admin/livre/ajouter_livre.php',function(data){

            $('#res_search').html(data);

                   
         });
       
    })
  })
</script>

 <script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
   });
  </script>

<?php
session_start();

  $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  


  if (isset($_SESSION['search']) && !empty($_SESSION['search'])) {
     $con=mysqli_connect("localhost","root","","ouvrages");
     $search=mysqli_real_escape_string($con,$_SESSION['search']);
     ini_set('memory_limit', '1024M');


     
     $re=$bdd->query("SELECT * FROM categories,sous_categories,livre where livre.categorie_id=categories.id and livre.sous_categorie_id=sous_categories.id and   titre like \"$search%\"   " );
     $count=$re->rowCount();
     $links=2;

     $rowsperpage=8;
     $page=$_GET['p'];
     if ($page== 0 or $page== '') {
           $page=1;
       }  
     $page=$page-1;
     $p=$page*$rowsperpage;
     $req=$bdd->query("SELECT * FROM categories,sous_categories,livre where livre.categorie_id=categories.id and livre.sous_categorie_id=sous_categories.id and  titre like \"$search%\" LIMIT ".$p.",".$rowsperpage );

     ?>

<table class="table" >
   <thead>
      <tr>
        <th>Auteur</th>
        <th>Titre</th>
        <th>Édition</th>
        <th>Lieu</th>
        <th>Année</th>
        <th>Coté</th>
        <th>Matiére</th>
        <th>Nombre de copie</th>
        <th>Categorie</th>
        <th>Sous Categorie</th>
        <th>Niveau</th>
        
        
      </tr>
    </thead>
    <tbody>

      <?php
         $con=mysqli_connect("localhost","root","","ouvrages");
         while($rows=$req->fetch()){
          
          $id=mysqli_real_escape_string($con,$rows['id']);
          $id_categorie=mysqli_real_escape_string($con,$rows['categorie_id']);
          $id_sous_categorie=mysqli_real_escape_string($con,$rows['sous_categorie_id']);
            echo "<tr><td>".$rows['auteur']."</td>"."<td>".$rows['titre']."</td>"."<td>".$rows['edition']."</td>"."<td>".$rows['lieu']."</td>"."<td>".$rows['annee']."</td>"."<td>".$rows['cote']."</td>"."<td>".$rows['matiere']."</td>"."<td>".$rows['nombreDeCopie']."</td>"."<td>".$rows['categorie']."</td>"."<td>".$rows['sous_categorie']."</td>"."<td>".$rows['niveau']."</td><td>".'<button type="button" class="btn btn-primary" id="btnmodifier" data-id="'.$id.'" data-auteur="'.$rows['auteur'].'" data-titre="'.$rows['titre'].'" data-edition="'.$rows['edition'].'" data-lieu="'.$rows['lieu'].'" data-annee="'.$rows['annee'].'" data-cote="'.$rows['cote'].'" data-matiere="'.$rows['matiere'].'" data-nombreDeCopie="'.$rows['nombreDeCopie'].'" data-niveau="'.$rows['niveau'].'" data-collection="'.$rows['collection'].'" data-n="'.$rows['n'].'" data-mois="'.$rows['mois'].'" data-nb_partie="'.$rows['nb_partie'].'" data-nb_edition="'.$rows['nb_edition'].'" data-numero="'.$rows['numero'].'" data-categorie="'.$rows['categorie'].'" data-sous_categorie="'.$rows['sous_categorie'].'" data-idcate="'.$id_categorie.'" data-idsouscate="'.$id_sous_categorie.'"><i class="fa fa-pencil fa "></i></button>'."</td><td>".'<button  class="btn btn-danger" data="'.$id.'" id="btnSupprimer"><i class="fa fa-trash-o fa "></i></button>'."</td></tr>";
         
         }
       }
      ?>
    </tbody>
  
</table>
<div class="col-sm-12 text-center" >

  <?php 
       echo "<br>";
       $last=ceil($count/$rowsperpage);
        $start=(($page-$links)>0)? $page-$links:1;
        $end=(($page + $links)<$last)? $page + $links :$last;

        
    
    if ($_GET['p']>1) {
        $prev_page=$_GET['p']-1;
         echo " ";
         echo '<button class="btn btn-default"  style="cursor:pointer;" onclick="loadData('.$prev_page.')">&laquo;</button>';
         echo " ";
    }
    
    $check=$p+$rowsperpage;
    
    //$limit=$count/$rowsperpage;
    //$limit=ceil($limit);
    
    if($start>1){
          echo " ";
          echo '<button class="btn btn-default" style="cursor:pointer;" onclick="loadData(1)">1</button>';
          echo '<button class="btn btn-default disabled">...</button>';
    }
    for ($i=$start; $i <=$end ; $i++) { 
       
        if($i==$_GET['p']){
          
            echo " ";
            echo '<button class="btn btn-primary"><strong>'.$i."</strong></button>";
            echo " ";
        }else{
             echo '<button class="btn btn-default" style="cursor:pointer;" onclick="loadData('.$i.')">'.$i.'</button>';
            
        }
        echo " ";
    }
   

    if($end<$last){

          echo '<button class="btn btn-default disabled">...</button>';
          echo " ";
          echo'<button class="btn btn-default" style="cursor:pointer;" onclick="loadData('.$last.')">'.$last.'</button>';
          echo " ";
        }

    echo " ";

    if ($count>$check) {
        $next_page=$_GET['p']+1;
        
          echo '<button class="btn btn-default"  style="cursor:pointer;" onclick="loadData('.$next_page.')">&raquo;</button>';
          echo " ";
    }


  echo"<br><br>";
 ?>
</div>
