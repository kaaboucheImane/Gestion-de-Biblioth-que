
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script src="js/pagination.js"></script>

  <style type="text/css">
      .wrimagecard{ 
          margin-top: 0;
          margin-bottom: 1.5rem;
          text-align: left;
          position: relative;
          background: #fff;
          box-shadow: 12px 15px 20px 0px rgba(46,61,73,0.15);
          border-radius: 4px;
          transition: all 0.3s ease;
   
      }


      a.wrimagecard:hover, .wrimagecard-topimage:hover {
          box-shadow: 2px 4px 8px 0px rgba(46,61,73,0.2);
      }
  </style>



<?php
 session_start();
  $cat=$_SESSION['categorie'];
 
  $scat=$_SESSION['souscategorie'];
   echo "<h2>".$cat." / ".$scat."</h2><hr>";
                                                               
    $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  
    $r=$bdd->query("SELECT * FROM categories,sous_categories,livre where categories.categorie='$cat' and sous_categories.sous_categorie= '$scat' and livre.categorie_id=categories.id and livre.sous_categorie_id=sous_categories.id  "); 

    $count=$r->rowCount();
    $links=2;

     $rowsperpage=8;
     $page=$_REQUEST['p'];
     if ($page== 0 or $page== '') {
          $page=1;
      }  
     $page=$page-1;
     $p=$page*$rowsperpage;
    
    $req=$bdd->query("SELECT * FROM categories,sous_categories,livre where categories.categorie='$cat' and sous_categories.sous_categorie= '$scat' and livre.categorie_id=categories.id and livre.sous_categorie_id=sous_categories.id  LIMIT ".$p.",".$rowsperpage); 
    while($row=$req->fetch()){
                         
?>

                <div class="col-md-3 col-sm-4" >
                  <div class="wrimagecard wrimagecard-topimage">
                      <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                        
                        <img id="im" src="https://envytheme.com/tf-demo/edusplash/assets/img/publication/1.jpg" alt="Publication Image" style="width:100%; height:12em;">
                       
                      </div>
                      <div class="wrimagecard-topimage_title" style="overflow: hidden; height: 9.4em;">
                        
                        <?php echo "<h4><a  id='". $row['titre']."' class='".$row['id']."' style='text-decoration:none;'>".$row['titre']."</a></h4>"?>
                         <br> <br>
                        <div class="pull-right badge" id="WrControls"></div></h4>
                      </div>
                  </div>

                </div>


      <?php } ?>

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


<script>
  $(document).ready(function(){
    $(".wrimagecard-topimage_title a").click(function(event){
      
      event.preventDefault();
          
            var t= $(this).attr("id");
            var id= $(this).attr("class");
            $.post('afficher_livres.php',{id:id,t:t},function(data){
              $("#listOuv").html(data);
            })
    })
  })
</script>

