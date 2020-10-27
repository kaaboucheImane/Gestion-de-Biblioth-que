<?php require 'auto_send_mail.php';?>
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
 
 <script>
    $(document).ready(function(){
      $("table tbody").on('click','#btndelete',function(event){
      var id=$(this).attr("data");
      var idl=$(this).attr("data-idl");
      var mail=$(this).attr("data-mail");
      var fn=$(this).attr("data-fullname");
      var titre=$(this).attr("data-titre");
     
      
      swal({

        title: "Êtes-vous sûr de supprimer cette réservation?",
        icon: "warning",
        buttons:["No", "Oui"],
       
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Cette réservation est bien supprimée", {
            icon: "success",
          
          });

          $("#res_supprime").load("../admin/livres_reserve_etape2/supprimer_reservation_livre_etape2.php",{id:id,idl:idl,mail:mail,fn:fn,titre:titre});

          $(this).closest('tr').remove();



        }else {
                 swal("Cette réservation n'est pas supprimée");
        }
      })
        event.preventDefault();
    })
  })
</script>
 <script>
    $(document).ready(function(){
      $("table tbody").on('click','#btnEnvoyerMail',function(event){
      var nb=$(this).attr("data");
      var id=$(this).attr("data-id");
      var mail=$(this).attr("data-mail");
      var fn=$(this).attr("data-fullname");
      var titre=$(this).attr("data-titre");

     event.preventDefault();
      
      
      swal({

        title: "Êtes-vous sûr d'envoyer un mail ?",
        icon: "warning",
        buttons:["No", "Oui"],
       
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("le mail  est bien envoyé ", {
            icon: "success",
          
          });
          --nb;
          $(this).prop("disabled",true);
          $("#res_supprime").load("../admin/livres_reserve_etape2/envoyer_mail.php",{id:id,nb:nb,mail:mail,fn:fn,titre:titre});
           
          
           

        }else {
                 swal("le mail n'est pas envoyé");
        }
      })
        
    })
  })
</script>
<script src="../admin/livres_reserve_etape2/search_livre_reserve_etape2.js"></script>
 <script type="text/javascript">
   $(document).ready(function(){
     $("#s").focus();
   })
 </script>
 <script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
   });
  </script>


<script src="pagination.js"></script>


 
<div class="container" style="min-height:22.2em;">



<div id="res_search_livre" >
  


<?php

 $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  
 $r=$bdd->query("SELECT * FROM livre_reserver_etape2   "); 
  $count=$r->rowCount();
  $links=2;

   $rowsperpage=8;
   $page=$_REQUEST['p'];
   if ($page== 0 or $page== '') {
        $page=1;
    }  
   $page=$page-1;
   $p=$page*$rowsperpage;

 $req=$bdd->query("SELECT * FROM livre_reserver_etape2 LIMIT ".$p.",".$rowsperpage);
?>


  <a href="../admin/fpdf181/pdf.php" target="_blank"><button class="btn btn-default" data-toggle="tooltip" title="Imprimer !" data-placement="bottom"><i class="fa fa-print fa-2x "></i></button></a>
  <br><br>
                 <div class="col-sm-3"></div>
                 <div class="col-sm-6 " style="height: 5em;">
                     <form method="post" id="formsearch" >

                       <div class="form-group has-feedback  ">
                           <input type="text" class="form-control"  placeholder="Recherche par Code de Massar , Titre ou Nom et Prénom"  name="s" id="s" style="">
                           <span class="glyphicon glyphicon-search form-control-feedback" style="color: black;"></span>
                       </div>
                     </form>
                
                 </div>
<div class="col-sm-12 text-center" id="res_livre_search_reserve_etape2_loading">
  
</div>
<div id="res_search_livre_reserve_etape2">

 <table class="table"  >
                  <thead>
                     <th>Code Massar</th>
                     <th>Titre</th>
                     <th>Coté</th>
                     <th>Nom et Prénom</th>
                     <th>E-mail</th>

                  </thead>

                  <tbody>

                    <?php
                    
                       $con=mysqli_connect("localhost","root","","ouvrages");
                       //$heure=date("H");
                       define('TIMEZONE', 'Africa/Casablanca');
                       date_default_timezone_set(TIMEZONE);
                       $date = new DateTime();
                       $date1=$date->format('Y-m-d H:i:s');
                      while($rows=$req->fetch()){
                         $id=mysqli_real_escape_string($con,$rows['id']);
                         $idl=mysqli_real_escape_string($con,$rows['livre_id']);
                         $jrdb=mysqli_real_escape_string($con,$rows['joure']);
                         //$jr=date("d");
                         $x = new DateTime($rows['joure']);
                         $x1=$x->format('Y-m-d H:i:s');
                         $res = date('Y-m-d H:i:s',strtotime('+4 days',strtotime($x1)));
                        if($date1>=$res){
                         echo "<tr bgcolor='#FD8181' ><td>".$rows['code_massar']."</td><td>".$rows['titre']."</td><td>".$rows['numero']."</td><td>".$rows['nom_prenom']."</td><td>".$rows['email'];
                         if ($rows['nb']==0) {
                           echo '<td><button  class="btn btn-primary" data="'.$rows['nb'].'" data-id="'.$id.'" data-mail="'.$rows['email'].'" data-fullname="'.$rows['nom_prenom'].'" data-titre="'.$rows['titre'].'" id="btnEnvoyerMail" data-toggle="tooltip" title="Envoyer un mail !" data-placement="bottom" disabled ><i class="fa fa-share fa"></i></button></td>';
                         }else{
                          echo '<td><button  class="btn btn-primary" data="'.$rows['nb'].'" data-id="'.$id.'" data-mail="'.$rows['email'].'" data-fullname="'.$rows['nom_prenom'].'" data-titre="'.$rows['titre'].'" id="btnEnvoyerMail" data-toggle="tooltip" title="Envoyer un mail !" data-placement="bottom" ><i class="fa fa-share fa"></i></button></td>';
                         }
                          echo '<td><button  class="btn btn-danger" data="'.$id.'"  id="btndelete" data-mail="'.$rows['email'].'" data-fullname="'.$rows['nom_prenom'].'" data-titre="'.$rows['titre'].'" data-idl="'.$idl.'"><i class="fa fa-trash-o fa "></i></button>'."</td></tr>";

                        }else if($rows['nb']==0){
                          echo "<tr ><td>".$rows['code_massar']."</td><td>".$rows['titre']."</td><td>".$rows['numero']."</td><td>".$rows['nom_prenom']."</td><td>".$rows['email'].'<td><button  class="btn btn-primary" data="'.$rows['nb'].'" data-id="'.$id.'" data-mail="'.$rows['email'].'" data-fullname="'.$rows['nom_prenom'].'" data-titre="'.$rows['titre'].'" id="btnEnvoyerMail" data-toggle="tooltip" title="Envoyer un mail !" data-placement="bottom" disabled ><i class="fa fa-share fa"></i></button></td>'.'<td><button  class="btn btn-danger" data="'.$id.'"  data-mail="'.$rows['email'].'" data-fullname="'.$rows['nom_prenom'].'" data-titre="'.$rows['titre'].'" data-idl="'.$idl.'" id="btndelete" ><i class="fa fa-trash-o fa "></i></button>'."</td></tr>";
                        }else{
                           echo "<tr ><td>".$rows['code_massar']."</td><td>".$rows['titre']."</td><td>".$rows['numero']."</td><td>".$rows['nom_prenom']."</td><td>".$rows['email'].'<td><button  class="btn btn-primary" data="'.$rows['nb'].'" data-id="'.$id.'" data-mail="'.$rows['email'].'" data-fullname="'.$rows['nom_prenom'].'" data-titre="'.$rows['titre'].'" id="btnEnvoyerMail" data-toggle="tooltip" title="Envoyer un mail !" data-placement="bottom" ><i class="fa fa-share fa"></i></button></td>'.'<td><button  class="btn btn-danger" data="'.$id.'"  data-mail="'.$rows['email'].'" data-fullname="'.$rows['nom_prenom'].'" data-titre="'.$rows['titre'].'" data-idl="'.$idl.'" id="btndelete" ><i class="fa fa-trash-o fa "></i></button>'."</td></tr>";
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
</div>
<div id="res_supprime">
	
</div>
</div>

</div>