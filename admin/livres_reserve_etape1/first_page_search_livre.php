
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
             $("table tbody").on('click','#btnSupp',function(event){
              var id=$(this).attr("data");
              var mail=$(this).attr("data-mail");
              var fn=$(this).attr("data-fullname");
              var titre=$(this).attr("data-titre");
              var idlivre=$(this).attr("data-idl");
      
             swal({

               title: "Êtes-vous sûr de supprimer ce livre?",
               icon: "warning",
               buttons:["No", "Oui"],
       
             })
             .then((willDelete) => {
               if (willDelete) {
                 swal("Ce livre est supprime", {
                   icon: "success",
          
                 });
                 $("#res_supp").load("../admin/livres_reserve_etape1/supprimer_reservation_livre.php",{id:id,mail:mail,fn:fn,titre:titre,idlivre:idlivre});
                 $(this).closest('tr').remove();


               }else {
                 swal("Ce livre n'est pas supprimer");
               }
             })
               event.preventDefault();
            })
          })
        </script>

        
        <script>
            $(document).ready(function(){
             $("table tbody").on('click','#btnaddreserve',function(event){
              var id=$(this).attr("data");
              var idlivre=$(this).attr("data-idlivre");;
              var codemassare=$(this).attr("data-codeM");
              var mail=$(this).attr("data-mail");
              var fn=$(this).attr("data-fullname");
              var titre=$(this).attr("data-titre");
              var numero=$(this).attr("data-numero");
      
             swal({

               title: "Êtes-vous sûr de confirmer cette réservation?",
               icon: "warning",
               buttons:["No", "Oui"],
       
             })
             .then((willDelete) => {
               if (willDelete) {
                 swal("Cette  réservation est bien confirmée", {
                   icon: "success",
          
                 });
                 $("#res_supp").load("../admin/livres_reserve_etape1/ajouter_reservation_livre.php",{id:id,idlivre:idlivre,codemassare:codemassare,mail:mail,fn:fn,titre:titre,numero:numero});
                 $(this).closest('tr').remove();


               }else {
                 swal("Cette  réservation n'est pas confirmée");
               }
             })
               event.preventDefault();
            })
          })
        </script>

        <script>
         $(document).ready(function(){
           $('[data-toggle="tooltip"]').tooltip(); 
          });
         </script>
         
        <script src="func.js"></script>
       
        <script src="pagination.js"></script>
        
       
<?php
session_start();

  $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  


  if (isset($_SESSION['s']) && !empty($_SESSION['s'])) {
     $con=mysqli_connect("localhost","root","","ouvrages");
     $s=mysqli_real_escape_string($con,$_SESSION['s']);
     
    //echo $s;
     
     $re=$bdd->query("SELECT * FROM  resevation where  fullname  like \"$s%\" or codemassar   like \"$s%\" or titre   like \"$s%\"  " );
     $count=$re->rowCount();
     $links=2;

     $rowsperpage=8;
     $page=$_GET['pp'];
     if ($page== 0 or $page== '') {
           $page=1;
       }  
     $page=$page-1;
     $p=$page*$rowsperpage;
     $req=$bdd->query("SELECT * FROM  resevation where fullname  like \"$s%\" or codemassar   like \"$s%\" or titre   like \"$s%\"  LIMIT ".$p.",".$rowsperpage );

     ?>

<table class="table" >
   <thead>
      <tr>
        <th>Code Massar</th>
        <th>Titre</th>
        <th>Coté</th>
        <th>Date et Heure</th>
        <th>Nom et Prénom</th>
        <th>E-mail</th>

        
      </tr>
    </thead>
    <tbody>

                    <?php
                       //$heure=date("H");
                       define('TIMEZONE', 'Africa/Casablanca');
                       date_default_timezone_set(TIMEZONE);
                       $date = new DateTime();
                       $date1=$date->format('Y-m-d H:i:s');
                       $con=mysqli_connect("localhost","root","","ouvrages");
                      while($rows=$req->fetch()){
                         //$validate_heure=$heure-$rows['heure'];
                         $x = new DateTime($rows['date_heur']);
                         $x1=$x->format('Y-m-d H:i:s');
                         $res = date('Y-m-d H:i:s',strtotime('+4 hour',strtotime($x1)));
                         $id=mysqli_real_escape_string($con,$rows['id']);
                         $idl=mysqli_real_escape_string($con,$rows['id_livre']);
                         if($date1>=$res){
                          echo "<tr bgcolor='#FD8181'><td>".$rows['codemassar']."</td><td>".$rows['titre']."</td><td>".$rows['numero']."</td><td>".$rows['date_heur']."</td><td>".$rows['fullname']."</td><td>".$rows['email'].'<td><button  class="btn btn-primary" data="'.$id.'" data-idlivre="'.$idl.'"   data-mail="'.$rows['email'].'" data-fullname="'.$rows['fullname'].'" data-titre="'.$rows['titre'].'" data-codeM="'.$rows['codemassar'].'" data-numero="'.$rows['numero'].'" id="btnaddreserve"><i class="fa fa-plus" aria-hidden="true" data-toggle="tooltip" title="Ajouter a la list !" data-placement="bottom" ></i></button></td>'.'<td></tr>';
                          //<button  class="btn btn-danger" data="'.$id.'" data-idl="'.$idl.'"  data-mail="'.$rows['email'].'" data-fullname="'.$rows['fullname'].'" data-titre="'.$rows['titre'].'" id="btnSupp"><i class="fa fa-trash-o fa "></i></button>'."</td>
                       }else{
                        echo "<tr><td>".$rows['codemassar']."</td><td>".$rows['titre']."</td><td>".$rows['numero']."</td><td>".$rows['date_heur']."</td><td>".$rows['fullname']."</td><td>".$rows['email'].'<td><button  data-toggle="tooltip" title="Ajouter a la list !" data-placement="bottom"  class="btn btn-primary" data="'.$id.'" data-idlivre="'.$idl.'"   data-mail="'.$rows['email'].'" data-fullname="'.$rows['fullname'].'" data-titre="'.$rows['titre'].'" data-codeM="'.$rows['codemassar'].'" data-numero="'.$rows['numero'].'" id="btnaddreserve"><i class="fa fa-plus" aria-hidden="true"></i></button></td></tr>';
                        //'.'<td><button  class="btn btn-danger" data="'.$id.'" data-idl="'.$idl.'"  data-mail="'.$rows['email'].'" data-fullname="'.$rows['fullname'].'" data-titre="'.$rows['titre'].'" id="btnSupp"><i class="fa fa-trash-o fa "></i></button>'."</td>
                       }
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

        
    
    if ($_GET['pp']>1) {
        $prev_page=$_GET['pp']-1;
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
       
        if($i==$_GET['pp']){
          
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
        $next_page=$_GET['pp']+1;
        
          echo '<button class="btn btn-default"  style="cursor:pointer;" onclick="loadData('.$next_page.')">&raquo;</button>';
          echo " ";
    }


  echo"<br><br>";
 ?>
 
</div>

