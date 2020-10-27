  

  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="../admin/etudiant_gestion/search.js"></script>


  <script>
    $(document).ready(function(){
     $("table tbody").on('click','#btnmodifier',function(event){
     	event.preventDefault();
     	 var id=$(this).attr("data-id");
     	 var nom=$(this).attr("data-nom");
     	 var prenom=$(this).attr("data-prenom");
     	 var code_massar=$(this).attr("data-code_massar");
     	 var cin=$(this).attr("data-cin");
     	 var email=$(this).attr("data-email");
     	

      $.post('../admin/etudiant_gestion/modifier_etudiant.php',{id:id,nom:nom,prenom:prenom,code_massar:code_massar,cin:cin,email:email},function(data){

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
       title: "Êtes-vous sûr de supprimer cet étudiant?",
       icon: "warning",
       buttons:["No", "Oui"],
       
     })
     .then((willDelete) => {
       if (willDelete) {
         swal("Cet étudiant est supprimé", {
           icon: "success",
          
         });
         $("#res_supprime").load("../admin/etudiant_gestion/supprimer_etudiant.php",{id:id});
         $(this).closest('tr').remove();


       }else {
         swal("Cet étudiant n'est pas supprimé");
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
     	 

      $.post('../admin/etudiant_gestion/ajouter_etudiant.php',function(data){

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

  
  <script type="text/javascript">
    $(document).ready(function(){
      $("#search").focus();
    })
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#btn_importer").click(function(event){

        event.preventDefault();
        $.post('../admin/etudiant_gestion/importer_etudiants.php',function(data){

            $('#res_search').html(data);

                   
         });

      });
    })
  </script>
  
  


  

<script src="../admin/livre/pagination.js"></script>


 
<div class="container" style="min-height:22.2em;">




<?php

 $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  
 $r=$bdd->query("SELECT * FROM etudiantinscription  "); 
  $count=$r->rowCount();
  $links=2;

   $rowsperpage=8;
   $page=$_REQUEST['p'];
   if ($page== 0 or $page== '') {
        $page=1;
    }  
   $page=$page-1;
   $p=$page*$rowsperpage;

 $req=$bdd->query("SELECT * FROM etudiantinscription LIMIT ".$p.",".$rowsperpage);
?>


<div class="col-sm-12" id="res_search">
	        <div class="col-sm-2 "><!--4-->
          <div class="col-sm-2">
           <form method="post" action="../admin/etudiant_gestion/export_etd.php">
              <input type="submit" name="export" class="btn btn-success" value="Exporter le fichier " data-toggle="tooltip" title="Exporter fichier des étudiants" data-placement="bottom" />
           </form> 
         </div>
         <!--<div class="col-sm-2 col-md-offset-4">
           <form method="post" action="../admin/livre/test_adlin.php">
              <input type="submit" class="btn btn-success" value="Importer les livres" data-toggle="tooltip" title="Importer les livres sous Excel !" data-placement="bottom" />
           </form>
         </div>-->
          </div>
            <div class="col-sm-6 " style="height: 5em;">
                <form method="post" id="formsearch" >

                  <div class="form-group has-feedback  ">
                     <input type="text" class="form-control"  placeholder="Recherche par CIN ou Code Massar"  name="search" id="search" style="">
                     <span class="glyphicon glyphicon-search form-control-feedback" style="color: black;"></span>
                  </div>
                </form>
                
            </div>

  <button type="button" class="btn" data-toggle="tooltip" title="Ajouter Etudiant !" data-placement="bottom" id="btnajouter" style="border-color: black;"><i class="fa fa-plus fa "></i> Ajouter Étudiant</button>
  <button type="button" class="btn" data-toggle="tooltip" title="Mettre à jour la base de données !" data-placement="bottom" id="btn_importer" style="border-color: black;"><i class="fa fa-plus fa "></i> Importer les Étudiants</button>



  

 
           
<div class="col-sm-12"></div>
<div class="col-sm-12 text-center" id="res_search_loading">
  
</div>
<div id="res_search_livre">

 <table class="table table-striped" >
    <thead>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Code de Massar</th>
        <th>CIN</th>
        <th>E-mail</th>
        
        
        
      </tr>
    </thead>

    <tbody>

    	<?php
        $con=mysqli_connect("localhost","root","","ouvrages");
         while($rows=$req->fetch()){
         	$id=mysqli_real_escape_string($con,$rows['id']);
         	

         	echo "<tr><td>".$rows['nom']."</td>"."<td>".$rows['prenom']."</td>"."<td>".$rows['code_massar']."</td>"."<td>".$rows['cin']."</td>"."<td>".$rows['email']."</td><td>".'<button type="button" class="btn btn-primary" id="btnmodifier" data-id="'.$id.'" data-nom="'.$rows['nom'].'" data-prenom="'.$rows['prenom'].'" data-code_massar="'.$rows['code_massar'].'" data-cin="'.$rows['cin'].'" data-email="'.$rows['email'].'" ><i class="fa fa-pencil fa "></i></button>'."</td><td>".'<button  class="btn btn-danger" data="'.$id.'" id="btnSupprimer"><i class="fa fa-trash-o fa "></i></button>'."</td></tr>";
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

        
    
    if ($_REQUEST['p']>1) {
        $prev_page=$_REQUEST['p']-1;
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
       
        if($i==$_REQUEST['p']){
          
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
        $next_page=$_REQUEST['p']+1;
        
          echo '<button class="btn btn-default"  style="cursor:pointer;" onclick="loadData('.$next_page.')">&raquo;</button>';
          echo " ";
    }


  echo"<br><br>";
 ?>
</div>
</div>
<div id="res_supprime">
	
</div>
</div>

</div>
<style>
  .btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

</style>