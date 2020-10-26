<h2><?php echo "Résultat";?></h2><hr>
<div class="">
  <div class="alert alert-danger alert-dismissible">
       <button type="button" class="close" data-dismiss="alert">&times;</button>
       <strong>Attention !</strong> si vous avez réservé le livre ne depassez pas 4 heures pour le récuperer.  
  </div>

  
</div><br>
<div class="col-sm-2"></div>
<div class="col-sm-4" >
   <img  src="https://envytheme.com/tf-demo/edusplash/assets/img/publication/1.jpg" alt="Publication Image" style="width: 100%; height: 100%;" ><br><br>
</div>




<?php

     session_start();
     $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
     $con=mysqli_connect("localhost","root","","ouvrages"); 
     $id=mysqli_real_escape_string($con,$_POST['id']);
     $_SESSION['idd']=mysqli_real_escape_string($con,$id);


      $req=$bdd->query("SELECT * FROM livre WHERE id='$id'" );
     ?>

     <div class="panel panel-default col-sm-4" >
      <div class="panel-body" id="ok">

        <?php
         while($rows=$req->fetch()){
          $nb=mysqli_real_escape_string($con,$rows['nombreDeCopie']);
          $cote=mysqli_real_escape_string($con,$rows['cote']);
          $id=mysqli_real_escape_string($con,$rows['id']);
          $_SESSION['id_livre']=$id;
          $_SESSION['titre']=mysqli_real_escape_string($con,$rows['titre']);
          $_SESSION['numero']=$cote;
          echo "<h3 style=' color: rgb(0,0,128);'><strong>"."Titre :</strong></h3><h4>".$rows['titre']."</h4><h3 style=' color: rgb(0,0,128);'><strong>"."Auteur :</strong></h3><h4>".$rows['auteur']."</h4><h3 style=' color: rgb(0,0,128);'><strong>"."Édition :</strong></h3><h4>".$rows['edition']."</h4><h3 style=' color: rgb(0,0,128);'><strong>"."Année :</strong></h3><h4>".$rows['annee']."</h4><h3 style=' color: rgb(0,0,128);'><strong>"."coté :</strong></h3><h4>".$cote."</h4>";
            if ($nb==0) {
             echo ' <button type="button" class="btn  btn-lg btn-block"  disabled="true" >Réserver</button><br><br>';
            }else echo ' <button type="'.$id.'" class="btn btn-primary btn-lg btn-block" style="'.$nb.'" id="btnReserver">Réserver</button><br><br>';
      
          }
        ?>
      </div>
     </div>

     <div id="resbtnReserver" class="col-sm-4">
  
     </div>


     
<script>


    $(document).ready(function(){
    $("#btnReserver").on('click',function(event){
     
      var nb=$(this).attr("style");
      var id=$(this).attr("type");
      event.preventDefault();
     swal({
       title: "Êtes-vous sûr de réserver ce livre?",
       icon: "warning",
       buttons:["No", "Oui"],
       
     })
     .then((willDelete) => {
       if (willDelete) {
         swal("Votre livre est réserve", {
           icon: "success",
          
         });
         
          --nb;
         if(nb==0){
          $(this).prop("disabled",true);
          $("#ok").load("reserver.php",{nb:nb,id:id});
          //alert(nb);
         }else{
         $("#ok").load("reserver.php",{nb:nb,id:id});
          // alert(nb);
         }
       }else {
         swal("Ce livre n'est pas réserve");
       }
     })
    })
  })
</script>