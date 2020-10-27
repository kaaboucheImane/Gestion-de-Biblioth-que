<!DOCTYPE html>
<html>
<head>
 
</head>
<?php

 session_start();
 $_SESSION['cat']=$_POST['categorie'];
 $_SESSION['sous_cat']=$_POST['sous_categorie'];
?>
<script>
  
  $(document).ready(function(){
    loadData(1);
  });

  function loadData(pagen){
    $.post('../admin/livre/resulta_recherche_par_categorie_et_sous_categorie.php?p='+pagen,function(response){
      $("#resultss").html(response);
    });
  }
</script>
<body>
 
 <div id="resultss" >
  
 </div>


</body>
</html>
