
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
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

<?php
session_start();

  $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  


  if (isset($_SESSION['search']) && !empty($_SESSION['search'])) {
     $con=mysqli_connect("localhost","root","","ouvrages");
     $search=mysqli_real_escape_string($con,$_SESSION['search']);
     ini_set('memory_limit', '1024M');


     
     $re=$bdd->query("SELECT * FROM etudiantinscription where  cin like \"$search%\" or code_massar like \"$search%\"  " );
     $count=$re->rowCount();
     $links=2;

     $rowsperpage=8;
     $page=$_GET['p'];
     if ($page== 0 or $page== '') {
           $page=1;
       }  
     $page=$page-1;
     $p=$page*$rowsperpage;
     $req=$bdd->query("SELECT * FROM etudiantinscription where  cin like \"$search%\" or code_massar like \"$search%\" LIMIT ".$p.",".$rowsperpage );

     ?>

<table class="table" >
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

         while($rows=$req->fetch()){
          $id=mysqli_real_escape_string($con,$rows['id']);
          

          echo "<tr><td>".$rows['nom']."</td>"."<td>".$rows['prenom']."</td>"."<td>".$rows['code_massar']."</td>"."<td>".$rows['cin']."</td>"."<td>".$rows['email']."</td><td>".'<button type="button" class="btn btn-primary" id="btnmodifier" data-id="'.$id.'" data-nom="'.$rows['nom'].'" data-prenom="'.$rows['prenom'].'" data-code_massar="'.$rows['code_massar'].'" data-cin="'.$rows['cin'].'" data-email="'.$rows['email'].'" ><i class="fa fa-pencil fa "></i></button>'."</td><td>".'<button  class="btn btn-danger" data="'.$id.'" id="btnSupprimer"><i class="fa fa-trash-o fa "></i></button>'."</td></tr>";
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
