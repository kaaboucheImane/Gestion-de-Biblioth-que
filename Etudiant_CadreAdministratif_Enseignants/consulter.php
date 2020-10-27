<?php
@
 session_start();

 if (isset($_SESSION['codemassar']) && isset($_SESSION['motdepasse1'])) {
   if(isset($_SESSION['msg'])){
     unset($_SESSION['msg']);    
   }
   
 
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
        <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
        <script src="js/fonction_recherche.js"></script>

        <script>
           $(document).ready(function(){             
             $(".infoBiblio").click(function(event){
                $("#listOuv").load("page_infos_bibliotheque.php");
                $(".infoBiblio").css("background-color","#b2cfef");
                $(".changerps").css("background-color","#fff");
                $(".ia2").css("background-color", "#fff");

             })
           })
        </script>

        <script>
          $(document).ready(function(){
          
            $("#listOuv").load("page_infos_bibliotheque.php");
            $(".infoBiblio").css("background-color","#b2cfef");
            $(".changerps").css("background-color","#fff");
            $(".ia2").css("background-color","#fff");
          })
        </script>
        <script>
    
         $(document).ready(function(){
             $(".changerps").click(function(event){
              $(".changerps").css("background-color","#b2cfef");
              $(".ia2").css("background-color","#fff");
              $(".infoBiblio").css("background-color","#fff");
               event.preventDefault();
               $("#listOuv").load("changer_mot_de_passe.php");
             })
         })
          
        </script>

        <script>
          $(document).ready(function(){
            $(".ia2").click(function(){

              $(".ia2").css("background-color","#b2cfef");
              $(".changerps").css("background-color","#fff");
              $(".infoBiblio").css("background-color","#fff");
              
            })
          })
        </script>
        
        <script>
           $(document).ready(function(){
             
             $(".table a").click(function(event){
               event.preventDefault();

               $(".changerps").css("background-color","#fff");
               $(".ia2").css("background-color","#fff");
               $(".infoBiblio").css("background-color","#fff");

               $("#listOuv").load("paginator.php",{
                categorie:$(this).attr("id"),
                souscategorie:$(this).attr("data-souscategorie")
               })
             })
            
           })

        </script>

        <script>
           $(document).ready(function(){
             function validateEmail(mail) {
                var re = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                return re.test(mail);
             }
             function validate() {
               var $result = $("#resmail");
               var mail = $("#mail").val();
               $result.text("");

               if (validateEmail(mail)) {
                  $result.text( "  ");
                 return true;
               } else {
                 $result.text(mail + "  n'est pas valide !");
                 $result.css("color", "red");
                 return false;
               }
               return false;
             }
         
             $("#btnf").click(function(event){
               $(".changerps").css("background-color","#fff");
               $(".ia2").css("background-color","#b2cfef");
               var $result = $("#res");
               var mail = $("#mail").val();
               event.preventDefault();
                 if ($("#nom").val() == "") {$("#nom").css("border-color","#FF0000");}else{$("#nom").css("border-color","black");}

                 if (mail == "") {$("#mail").css("border-color","#FF0000");}else if(!validateEmail(mail)){ validate();$("#mail").css("border-color","#FF0000"); }else{validate(); $("#mail").css("border-color","black");}

                 if ($("#msg").val() == "") {$("#msg").css("border-color","#FF0000");}else{$("#msg").css("border-color","black");}
                 if ($("#nom").val() != "" && $("#msg").val() != ""  && $("#mail").val() != "" && validate()!= false) {
                     $("#res").load("sendMail.php",{

                         nom:$("#nom").val(),
                         mail:$("#mail").val(),
                         msg:$("#msg").val()
                     })
                     $("#form")[0].reset();
                 }  
             })
           })
        </script>
        <script>
           $(document).ready(function(){
                $(window).scroll(function () {
                       if ($(this).scrollTop() > 50) {
                           $('#back-to-top').fadeIn();
                           $(".ia2").css("background-color", "#b2cfef");
                       } else {
                           $('#back-to-top').fadeOut();
                           $(".ia2").css("background-color", "#fff");

                       }
                   });
        
                   $('#back-to-top').click(function () {
                       $(".ia2").css("background-color", "#fff");
                       $('#back-to-top').tooltip('hide');
                       $('body,html').animate({
                           scrollTop: 0
                       }, 800);
                       return false;
                   });
        
                   $('#back-to-top').tooltip('show');

           });
        </script>


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
                        <a class="navbar-brand" ><img src="img/logonb1.jpg" style="width: 3em;height: 2.2em; margin-top: -0.5em;"></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        
                        <ul class="nav navbar-nav pull-right">
                            <li class=""><a  id="ic2" class="infoBiblio" >Bibliothéque</a></li>
                            
                            <li class=""><a href="#myFooter" id="ic4" class="ia2">Contactez nous</a></li>
                            <li class=""><a href="" id="ic3" class="changerps" >Changer le mot de passe</a></li>
                            <li class="" ><a href="deconnexion.php" id="ic5" >Déconnecter</a></li>
                            
                        </ul>
                    </div>
                </div>
            </nav>
          </div>
       </div>
       
      
       <section class="jumbotron text-center" style="margin-top:3.5em;background-color:#0062cc;color: white; height:20em; background-image: url(img/biblio.jpg);   ">
         <div class="container"  >
              <h1>ENS Bibliothéque</h1><br>
              <div class="col-sm-3 ">
              </div>
              <div class="col-sm-6 " style="height: 5em;">
                <form method="post" id="formsearch" >

                  <div class="form-group has-feedback  ">
                     <input type="text" class="form-control"  placeholder="Recherche par titre, édition, année ou auteur"  name="search" id="search" style="">
                     <span class="glyphicon glyphicon-search form-control-feedback" style="color: black;"></span>
                  </div>
                </form>

         
               <div id="resultat"> 

                 <ul class="list-group">
              
                 </ul>
               </div>
              </div>
         </div>

       </section>

      <div class="container-fluid" style="margin-top:2em;">
        <div class="row content">
          <div class="col-sm-3 sidenav">
           <h2>Catégories</h2>
           <hr>
           
           <div class="panel-group" id="accordion" style="">
                 <?php
                                                                        
                        $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
                        $con=mysqli_connect("localhost","root","","ouvrages"); 
                        $req=$bdd->query("SELECT * FROM categories"); 
                        while($row=$req->fetch()){
                          $id=mysqli_real_escape_string($con,$row['id']);
                          $cat=mysqli_real_escape_string($con,$row['categorie']);
                          $langue=$row['langue'];
                     
                 ?>
                <div class="panel panel-default">
                    <div class="panel-heading" style="height: 2.5em; ">

                        <?php
                        if ($langue == 'fr') {
                          ?>
                          <h4 class="panel-title ">
                            <a data-toggle="collapse"  data-parent="#accordion" href="#collapse<?php echo $id; ?>"><?php echo $cat; ?></a>
                          </h4>
                      <?php
                        }else if($langue == 'ar'){
                          ?>
                          <h4 class="panel-title text-right">
                            <a data-toggle="collapse"  data-parent="#accordion" href="#collapse<?php echo $id; ?>"><?php echo $cat; ?></a>
                        </h4>
                       <?php
                        }else{
                          ?>
                          <h4 class="panel-title">
                            <a data-toggle="collapse"  data-parent="#accordion" href="#collapse<?php echo $id; ?>"><?php echo $cat; ?></a>
                        </h4>
                        <?php

                         }
                      ?>
                    </div>
                    <div id="collapse<?php echo $id; ?>" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <!-- -->
                                <?php
                                  $reqz=$bdd->query("SELECT * FROM liste_categories,sous_categories where liste_categories.sous_categorie_id=sous_categories.id  and liste_categories.categorie_id=$id ");
                                     while($row=$reqz->fetch()){
                                      $idd=mysqli_real_escape_string($con,$row['id']);
                                      $langue=$row['langue'];

                                ?>
                                <tr>
                                    <?php
                                         if ($langue == 'fr') {
                                           ?>
                                           <td align="left">
                                             <a  id="<?php echo $cat; ?>"   data-souscategorie="<?php echo $row['sous_categorie'];?>" style="text-decoration: none;" ><?php echo mysqli_real_escape_string($con,$row['sous_categorie']);?></a>
                                           </td>
                                       <?php
                                         }else if($langue == 'ar'){
                                           ?>
                                           <td align="right">
                                             <a  id="<?php echo $cat; ?>"   data-souscategorie="<?php echo $row['sous_categorie'];?>" style="text-decoration: none;" ><?php echo mysqli_real_escape_string($con,$row['sous_categorie']);?></a>
                                           </td>
                                        <?php
                                           }else{
                                             ?>
                                             <td align="left">
                                                <a  id="<?php echo $cat; ?>"   data-souscategorie="<?php echo $row['sous_categorie'];?>" style="text-decoration: none;" ><?php echo mysqli_real_escape_string($con,$row['sous_categorie']);?></a>
                                             </td>
                                           <?php

                                            }
                                         ?>
                                </tr>
                                <!-- -->
                                <?php }?>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- -->
                <?php }?>
                
            </div>
          </div>
          <div class="col-sm-9">

          	<div id="listOuv"  >
              
            </div>
          </div>
        </div>
      </div>

     <footer id="myFooter"  >
            <div class="container">
                <div class="row" style="display: inline;">
                  <div class="col-md-7">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3243.389295047155!2d-5.277219449339502!3d35.61812828011193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0b44d117ce801f%3A0x803722067333df9a!2sEcole+Normale+Sup%C3%A9rieure+de+T%C3%A9touan+%C3%A0+Martil!5e0!3m2!1sfr!2sma!4v1554567294166!5m2!1sfr!2sma" width="100%" height="315" frameborder="0" style="border:0" allowfullscreen></iframe>
                  </div>

                  <div class="col-md-5">
                      <h4><strong>Contactez nous</strong></h4><br>
                    <form id="form" >
                      <div class="form-group">
                        <input type="text" class="form-control"   placeholder="Objet" id="nom" required>
                      </div>
                      <div class="form-group">
                        <input type="email" class="form-control"   placeholder="E-mail" id="mail" required>
                        <div id="resmail">
                        
                        </div>
                        
                      </div>
                      
                      <div class="form-group">
                        <textarea class="form-control"  rows="3" placeholder="Message" id="msg" required></textarea>
                      </div>
                      <button class="btn btn-default" type="submit" id="btnf">
                          <i class="fa fa-paper-plane-o" aria-hidden="true"></i> Envoyer
                      </button>
                    </form>
                    <div id="res">
  
                    </div>
                    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top"  role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left" style="background-color: white;"><img src="img/up-arrow.png"></img></a>
      
                    
                  </div>
                </div>
            </div>
            <div class="second-bar">
               <div class="container">
                    <h2 class="logo"><a href="#" style="text-decoration: none;color: white;"> <b><big> ENS Bibliothéque</big></b></a></h2>
                   
                </div>
            </div>
     </footer>

    





    </body>
</html>



<style type="text/css">
  .back-to-top {
    cursor: pointer;
    position: fixed;
    bottom: 20px;
    right: 20px;
    display:none;
  }

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

 
   

    #myFooter {
       background-color: #0C090A;
       color: white;
    }

    #myFooter .row {
        margin-bottom: 60px;
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

<?php }else{
  include 'login.php';
  ?>
        <script>
          swal("Il faut Connecter  !","", "warning");
        </script>
  <?php
 } ?>