<!DOCTYPE html>
<html>
<head>
  <title></title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<?php
   session_start();
   $con=mysqli_connect("localhost","root","","ouvrages");

   $categorie=mysqli_real_escape_string($con,$_POST['categorie']);
   $souscategorie=mysqli_real_escape_string($con,$_POST['souscategorie']);
   $_SESSION['categorie']=$categorie;
   $_SESSION['souscategorie']=$souscategorie;

?>
<script>
  
  $(document).ready(function(){
    loadData(1);
  });

  function loadData(pagenum){
    $.post('listOuvrage.php?p='+pagenum,function(response){
      $("#results").html(response);
    });
  }
</script>
<body>
 
 <div id="results" >
  
 </div>


</body>
</html>
