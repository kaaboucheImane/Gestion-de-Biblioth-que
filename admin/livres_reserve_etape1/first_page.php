<?php 


 require '../../PHPMailerAutoload.php';
 require 'function_crypt.php';
 require 'bd_backup.php';

?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
       <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
         <script>
          $(document).ready(function(){
            $("#i2").click(function(event){
              event.preventDefault();
              $("#res_admin").load("../admin/livre/paginator_livre.php");
              $("#i2").css("background-color","#b2cfef");
              $("#i3").css("background-color", "#fff");
              $("#i4").css("background-color", "#fff");
              $("#i5").css("background-color", "#fff");
              $(".changerps_admin").css("background-color", "#fff");
              $("#i9").css("background-color", "#fff");
              $("#i10").css("background-color", "#fff");
              $("#i11").css("background-color","#fff");
            })
          })
        </script>
        <script>
          $(document).ready(function(){
           
              $("#i3").css("background-color", "#b2cfef");
          });
        </script>
        <script>
          $(document).ready(function(){
            $("#i3").click(function(event){
              event.preventDefault();
              $("#res_admin").load("paginator_reservation_livre.php");
              $("#i3").css("background-color", "#b2cfef");
              $("#i2").css("background-color","#fff");
              $(".changerps_admin").css("background-color", "#fff");
              $("#i4").css("background-color", "#fff");
              $("#i5").css("background-color", "#fff");
              $("#i9").css("background-color", "#fff");
              $("#i10").css("background-color", "#fff");
              $("#i11").css("background-color","#fff");

            })
          })
        </script>
        <script>
          $(document).ready(function(){
            $("#i4").click(function(event){
              event.preventDefault();
              $("#res_admin").load("../admin/livres_reserve_etape2/paginator_reservation_livre_eatpe2.php");
              $("#i4").css("background-color", "#b2cfef");
              $("#i2").css("background-color","#fff");
               $(".changerps_admin").css("background-color", "#fff");
              $("#i3").css("background-color", "#fff");
              $("#i5").css("background-color", "#fff");
              $("#i9").css("background-color", "#fff");
              $("#i10").css("background-color", "#fff");
              $("#i11").css("background-color","#fff");
            })
          })
        </script>
        <script>
          $(document).ready(function(){
            $("#i5").click(function(event){
              event.preventDefault();
              $("#res_admin").load("update_page.php");
              $("#i5").css("background-color", "#b2cfef");
              $("#i2").css("background-color","#fff");
              $(".changerps_admin").css("background-color", "#fff");
              $("#i4").css("background-color", "#fff");
              $("#i3").css("background-color", "#fff");
              $("#i9").css("background-color", "#fff");
              $("#i10").css("background-color", "#fff");
              $("#i11").css("background-color","#fff");
            })
          })
        </script>
        <script>
          $(document).ready(function(){
            $("#i10").click(function(event){
              event.preventDefault();
              $("#res_admin").load("../admin/etudiant_gestion/paginator_etudiants.php");
              $("#i10").css("background-color", "#b2cfef");
              $("#i2").css("background-color","#fff");
              $(".changerps_admin").css("background-color", "#fff");
              $("#i4").css("background-color", "#fff");
              $("#i3").css("background-color", "#fff");
              $("#i9").css("background-color", "#fff");
              $("#i5").css("background-color", "#fff");
              $("#i11").css("background-color","#fff");
            })
          })
        </script>

        
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
              var idlivre=$(this).attr("data-idlivre");
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
         <script src="../admin/livres_reserve_etape1/search_livre_first_page.js"></script>
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
         <script>
    
           $(document).ready(function(){
               $(".changerps_admin").click(function(event){
                  $(".changerps_admin").css("background-color", "#b2cfef");
                  $("#i2").css("background-color","#fff");
                  $("#i3").css("background-color", "#fff");
                  $("#i4").css("background-color", "#fff");
                  $("#i5").css("background-color", "#fff");
                  $("#i9").css("background-color", "#fff");
                  $("#i10").css("background-color", "#fff");
                  $("#i11").css("background-color","#fff");
                 event.preventDefault();
                 $("#res_admin").load("../admin/livres_reserve_etape1/changer_mot_de_passe_admin.php");
               })
           })
          
        </script>
        <script>
          $(document).ready(function(){
            $("#i9").click(function(event){
              event.preventDefault();
              $("#res_admin").load("../admin/etudiant_cadre_importer/etudiants_insertion.php");
                  $("#i9").css("background-color", "#b2cfef");
                  $("#i2").css("background-color","#fff");
                  $("#i3").css("background-color", "#fff");
                  $("#i4").css("background-color", "#fff");
                  $("#i5").css("background-color", "#fff");
                  $("#i10").css("background-color", "#fff");
                  $("#i11").css("background-color","#fff");
                  $(".changerps_admin").css("background-color", "#fff");
              
            })
          })
        </script>
        <script>
          $(document).ready(function(){
            $("#i11").click(function(event){
              event.preventDefault();
              $("#res_admin").load("../admin/livres_reserve_etape1/db_restore.php");
                  $("#i11").css("background-color", "#b2cfef");
                  $("#i2").css("background-color","#fff");
                  $("#i9").css("background-color","#fff");
                  $("#i3").css("background-color", "#fff");
                  $("#i4").css("background-color", "#fff");
                  $("#i5").css("background-color", "#fff");
                  $("#i10").css("background-color", "#fff");
                  $(".changerps_admin").css("background-color", "#fff");
              
            })
          })
        </script>
        
        <script src="func.js"></script>
       
        <script src="pagination.js"></script>
        
       
    </head>
    
    <body>

       <div class="navbar-wrapper" >
          <div class="container-fluid">
            <nav class="navbar navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" ><img src="../Etudiant_CadreAdministratif_Enseignants/img/logonb1.jpg" style="width: 3em;height: 2.2em; margin-top: -0.5em;"></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        
                        <ul class="nav navbar-nav pull-right">
                            <li class=""><a href="" id="i3" >Réservation non confirmée</a></li>                            
                            <li class="" ><a  id="i4" >Réservation confirmée</a></li>
                            <li class=""><a href="" id="i2" >Livres</a></li>
                            <li class="" ><a id="i10" >Etudiants</a></li>
                            
                            <li class="" ><a id="i9" >Enseignants/Cadre Administratifs</a></li>
                            
                            <li class="" ><a id="i11" >Restauration </a></li>
                            <li class="" ><a  id="i7" class="changerps_admin" id="i8">Profile</a></li>
                            <li class="" ><a href="../Etudiant_CadreAdministratif_Enseignants/deconnexion_admin.php" id="i6">Déconnecter</a></li>
                            
                        </ul>
                    </div>
                </div>
            </nav>
          </div>
       </div>
       
      
       <section class="jumbotron text-center" style="margin-top:3.5em;color: white; height:20em; background-image: url(../Etudiant_CadreAdministratif_Enseignants/img//biblio.jpg);   ">
         <div class="container"  >
              <h1>ENS Bibliothéque</h1><br>
              
                

         </div>

       </section>

      <div class="container" style="margin-top:2em; min-height:24.3em;">

        <div class="row content">


          <div class="col-sm-12" >
            <div id="res_admin">

                 <div class="col-sm-3"></div>
                 <div class="col-sm-6 " style="height: 5em;">
                     <form method="post" id="formsearch" >

                       <div class="form-group has-feedback  ">
                           <input type="text" class="form-control"  placeholder="Recherche par Code de Massar , Titre ou Nom et Prénom"  name="s" id="s" style="">
                           <span class="glyphicon glyphicon-search form-control-feedback" style="color: black;"></span>
                       </div>
                     </form>
                
                 </div>

                  
                <?php

                  $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
                  $con=mysqli_connect("localhost","root","","ouvrages"); 
                  $r=$bdd->query("SELECT * FROM resevation "); 
                 
                 
            
                   $count=$r->rowCount();
                   $links=2;

                    $rowsperpage=8;
                    $page=$_REQUEST['p'];
                    if ($page== 0 or $page== '') {
                         $page=1;
                    }        
                    $page=$page-1;
                    $p=$page*$rowsperpage;

                  $req=$bdd->query("SELECT * FROM resevation  LIMIT ".$p.",".$rowsperpage);
                 ?>
               <div class="col-sm-12 text-center"  id="res_search_livre_first_page_loading">
  
               </div>
             <div id="res_search_livre_first_page">
              <table class="table" >
                  <thead>
                     <th>Code Massar</th>
                     <th>Titre</th>
                     <th>Coté</th>
                     <th>Date et Heure</th>
                     <th>Nom et Prénom</th>
                     <th>E-mail</th>

                  </thead>

                  <tbody>
       
                    <?php
                       //$heure=date("H");
                       require 'supprimer_reservation_livre.php';
                       
                      while($rows=$req->fetch()){
                         //$validate_heure=$heure-$rows['heure'];
                         $x = new DateTime($rows['date_heur']);
                         $x1=$x->format('Y-m-d H:i:s');
                         $res = date('Y-m-d H:i:s',strtotime('+4 hour',strtotime($x1)));
                         $id=mysqli_real_escape_string($con,$rows['id']);
                         $idl=mysqli_real_escape_string($con,$rows['id_livre']);
                         if($date1>=$res){
                          echo "<tr bgcolor='#FD8181'><td>".$rows['codemassar']."</td><td>".$rows['titre']."</td><td>".$rows['numero']."</td><td>".$rows['date_heur']."</td><td>".$rows['fullname']."</td><td>".$rows['email'].'<td><button  class="btn btn-primary" data="'.$id.'" data-idlivre="'.$idl.'"   data-mail="'.$rows['email'].'" data-fullname="'.$rows['fullname'].'" data-titre="'.$rows['titre'].'" data-codeM="'.$rows['codemassar'].'" data-numero="'.$rows['numero'].'" id="btnaddreserve"><i class="fa fa-plus" aria-hidden="true" data-toggle="tooltip" title="Ajouter a la list !" data-placement="bottom" ></i></button></td></tr>';
                          //<td><button  class="btn btn-danger" data="'.$id.'" data-idl="'.$idl.'"  data-mail="'.$rows['email'].'" data-fullname="'.$rows['fullname'].'" data-titre="'.$rows['titre'].'" id="btnSupp"><i class="fa fa-trash-o fa "></i></button>'."</td>
                       }else{
                        echo "<tr><td>".$rows['codemassar']."</td><td>".$rows['titre']."</td><td>".$rows['numero']."</td><td>".$rows['date_heur']."</td><td>".$rows['fullname']."</td><td>".$rows['email'].'<td><button  data-toggle="tooltip" title="Ajouter a la list !" data-placement="bottom"  class="btn btn-primary" data="'.$id.'" data-idlivre="'.$idl.'"   data-mail="'.$rows['email'].'" data-fullname="'.$rows['fullname'].'" data-titre="'.$rows['titre'].'" data-codeM="'.$rows['codemassar'].'" data-numero="'.$rows['numero'].'" id="btnaddreserve"><i class="fa fa-plus" aria-hidden="true"></i></button></td></tr>';
                        //<button  class="btn btn-danger" data="'.$id.'" data-idl="'.$idl.'"  data-mail="'.$rows['email'].'" data-fullname="'.$rows['fullname'].'" data-titre="'.$rows['titre'].'" id="btnSupp"><i class="fa fa-trash-o fa "></i></button>'."</td>
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
               <div id="res_supp">
  
               </div>

            </div>
          </div>
        </div>
      </div>
     

     <footer id="myFooter">
          
            <div class="second-bar">
               <div class="container">
                    <h2 class="logo"><a href="#" style="text-decoration: none;color: white;"> <b><big> ENS Bibliothéque</big></b></a></h2>
                   
                </div>
            </div>
     </footer>

    





    </body>
</html>



<style type="text/css">

    #search,#resultat,ul{
            

    }
      #resultat ul{
      height: 10em;
      overflow: auto;

    }
    #resultat li{
      list-style-type: none;
      margin: 0;
      padding: 0;
    }
    #resultat ul li a{
      text-decoration: none;
              
      height: 50px;
      display: block;
      text-align:left ;
      border-radius: 0px 0px 0px 0px;
      border-top: 0px;
      border-top-right-radius: 0px;
      border-top-left-radius: 0px;
              

             
    }
    #resultat ul li a:hover{
      background-color: #F2F2F2;

    }

    #search{
            
      font-size: 16px;
      padding: 12px 20px 12px 40px;
              
      margin-bottom: 12px;
             

    }
    #resultat{
      position: relative;
      bottom: 17px;
    }


    .panel-body { padding:0px; }
    .panel-body table tr td { padding-left: 15px }
    .panel-body .table {margin-bottom: 0px; }
	   .navbar, .dropdown-menu{
        background:#fff;
        border: none;
        margin-top: 0em;

      }


    .nav>li>a:focus, .nav>li>a:hover,.nav .open>a, .nav .open>a:focus, .nav .open>a:hover, .dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover{
      border-bottom: 3px solid transparent;
      background: rgba(154, 154, 154, 0.27);
    }
    .navbar a, .dropdown-menu>li>a, .dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover, .navbar-toggle{
     color: black ;
    }
    .dropdown-menu{
        box-shadow:none;
    }



    .navbar-toggle .icon-bar{
        color: black;
        background: #000000;
    }
    .nav li.active{
      background-color:#b2cfef;

    }

  

    #myFooter {
       background-color:#0062cc;
       color: white;

    }

 



    
    #myFooter h5 {
        font-size: 18px;
        color: white;
        font-weight: bold;
        margin-top: 30px;
    }

    #myFooter .logo{
        margin-top: 10px;
    }

    #myFooter .second-bar .logo a{
        color:#0C090A;
        font-size: 28px;
        float: left;
        font-weight: bold;
        line-height: 68px;
        margin: 0;
        padding: 0;
    }

   
    #myFooter .second-bar {
        text-align: center;
        background-color: #0062cc;
        text-align: center;
        color: white;

    }

  


    @media screen and (max-width: 767px) {
        #myFooter {
            text-align: center;
        }

        #myFooter .info{
        text-align: center;
        }
    }


    #myFooter{
       flex: 0 0 auto;
       -webkit-flex: 0 0 auto;
    }
    /* Fixed sidenav, full height */

</style>
