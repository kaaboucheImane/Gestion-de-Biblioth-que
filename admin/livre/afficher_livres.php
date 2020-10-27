  

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

  <script src="../admin/livre/search.js"></script>


 <script>
   $(document).ready(function(){
     $('#rechercher').click(function(event){
      event.preventDefault();
      var categorie=$('#categorie_form').val();
      var sous_categorie=$('#sous_categorie_form').val();
      $("#res_search_livre").load("../admin/livre/paginator_livre_search_cat_sous_cat.php",{categorie:categorie,sous_categorie:sous_categorie});
     })
   })
 </script>
 <script>
   $(document).ready(function(){
     $('#search_cat_sous_cat_div').hide();
     $('#btna_show_div_recherche').click(function(event){
      event.preventDefault();
      $('#search_cat_sous_cat_div').show(900);
     })
     $('#close_div_recherch').click(function(event){
      event.preventDefault();
      $('#search_cat_sous_cat_div').hide(1000);
     })
   })
 </script>
   <script type="text/javascript">
    $(document).ready(function(){
      $("#search").focus();
    })
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#import").click(function(event){

        event.preventDefault();
        var excel=$("#excel").val();
        $.post('../admin/livre/importer.php',{excel:excel},function(data){

            $('#res_import').html(data);
            $("#import_form")[0].reset();

                   
         });

      });
    })
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#div_import").hide();
      //$("#louding_search").hide();
      $("#show_div_import").click(function(event){
        event.preventDefault();
        $("#div_import").show(900);

      });
      $("#close_div_import").click(function(event){
        event.preventDefault();
        $("#div_import").hide(1000);

      });
    })
  </script>
  <script>
    $(document).ready( function() {
      $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
      
    });
    

     
  });
  </script>
  

<script src="../admin/livre/pagination.js"></script>


 
<div class="container" style="min-height:22.2em;">





<div class="col-sm-12" id="res_search">

          
          <div class="col-sm-3">
            <div class="col-sm-2 ">
               <form method="post" action="../admin/livre/export.php">
                  <input type="submit" name="export" class="btn btn-success" value="Exporter Livres" />
               </form> 
           </div>
           <div class="col-sm-1 col-md-offset-4">
            
            <button type="button" class="btn" data-toggle="tooltip" title="Recherche par Catégorie et sous categorie" data-placement="bottom" id="btna_show_div_recherche" style="border-color: black;"><span class="glyphicon glyphicon-search"></span> Rechercher</button>
           </div>

          </div>
          
          
            <div class="col-sm-6 " style="height: 5em;">
                <form method="post" id="formsearch" >

                  <div class="form-group has-feedback  ">
                     <input type="text" class="form-control"  placeholder="Rechercher par Titre"  name="search" id="search" style="">
                     <span class="glyphicon glyphicon-search form-control-feedback" style="color: black;"></span>
                  </div>
                </form>
                
            </div>

  <button type="button" class="btn" data-toggle="tooltip" title="Ajouter Livre !" data-placement="bottom" id="btnajouter" style="border-color: black;"><i class="fa fa-plus fa "></i> Ajouter Livre</button>

  <button type="button" class="btn" data-toggle="tooltip" title="Importer Livres !" data-placement="bottom" id="show_div_import" style="border-color: black;"><i class="fa fa-plus fa "></i> Importer Livres</button>

  <div class="col-sm-12" id="div_import">
    <button type="button" class="close" data-dismiss="modal" id="close_div_import"><h1>X</h1></button>
    <div class="col-md-3"></div>
    <form class="form-inline" id="import_form" >
        <label></label>
       <div class="col-md-6">
        <div class="form-group">          
             <label></label>
              <div class="input-group">
                  <span class="input-group-btn">
                      <span class="btn btn-default btn-file">
                          Parcourir… <input type="file" id="excel" />
                      </span>
                  </span>
                  <input type="text" class="form-control" readonly>

              </div>
        </div>
        <input type="submit" id="import" class="btn btn-info" value="Importer" />
       </div>
       
   </form>
   <div id="res_import">
  
   </div>
  </div>
  
           
<div class="col-sm-12" id="search_cat_sous_cat_div" style="margin-left: auto;margin-right: auto;">
  <button type="button" class="close" data-dismiss="modal" id="close_div_recherch"><h1>X</h1></button>
  <form class="form-inline" style="text-align: center;">
    <div class="form-group" style="padding:2%;">
      
                          <label>Catégorie : </label>
                          
                          <?php
                            
                               $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  
                               $r=$bdd->query("SELECT * FROM categories "); 
                          ?>
                            <select class="form-control" name="categorie_form" id="categorie_form" >
                            
                              <?php 
                                    while($rows=$r->fetch()){
                              ?>
                              <option value="<?php echo $rows['id'] ;?>"><?php echo $rows['categorie']; ?></option>
                              <?php 
                                   }
                               ?>
                              
                            </select>
                        </div>

                        <div class="form-group" style="padding: 2%;">
                          <label>Sous Catégorie : </label>
                          
                           
                          <?php
                             
                               $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  
                               $req=$bdd->query("SELECT * FROM sous_categories  "); 
                          ?>
                            <select class="form-control" name="sous_categorie_form" id="sous_categorie_form">
                              
                              <?php 
                                    while($rows=$req->fetch()){
                              ?>
                              <option value="<?php echo $rows['id'] ;?>"><?php echo $rows['sous_categorie']; ?></option>
                              <?php 
                                   }
                               ?>
                              
                            </select>
                        </div>
                        
                        <div class="form-group" style="padding: 2%;" >
                            <input type="submit" button  class="btn btn-primary" value="Rechercher" id="rechercher"  />
                        </div> 
  </form>

</div>

<?php

 $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  
 $r=$bdd->query("SELECT * FROM categories,sous_categories,livre where livre.categorie_id=categories.id and livre.sous_categorie_id=sous_categories.id  "); 
  $count=$r->rowCount();
  $links=2;

   $rowsperpage=8;
   $page=$_REQUEST['p'];
   if ($page== 0 or $page== '') {
        $page=1;
    }  
   $page=$page-1;
   $p=$page*$rowsperpage;

 $req=$bdd->query("SELECT * FROM categories,sous_categories,livre where livre.categorie_id=categories.id and livre.sous_categorie_id=sous_categories.id LIMIT ".$p.",".$rowsperpage);
?>

<div class="col-sm-12 text-center" id="res_search_loading">
  
</div>
<div id="res_search_livre">

 <table class="table table-striped" >
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