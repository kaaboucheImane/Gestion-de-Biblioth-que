<?php
@
 session_start();
 if (isset($_SESSION['codesom']) && isset($_SESSION['motdepasse'])) {
        
   if(isset($_SESSION['msg'])){
     unset($_SESSION['msg']);    
   }
 
?>


<!DOCTYPE html>
<html>
<head>
  <title></title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<script>
  
  $(document).ready(function(){
    loadData(1);
  });

  function loadData(pag){
    $.post('../admin/livres_reserve_etape1/first_page.php?p='+pag,function(response){
      $("#resultsss").html(response);
    });
  }
</script>
<body>
 
 <div id="resultsss" >
  
 </div>


</body>
</html>

<?php }else{

 include 'login.php';
 ?>
 
        <script>
          swal("Il faut Connecter  !","", "warning");
        </script>
<?php 
} ?>