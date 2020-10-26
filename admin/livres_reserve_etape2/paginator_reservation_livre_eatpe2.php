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

  function loadData(p){
    $.post('../admin/livres_reserve_etape2/livre_reserve_etape2.php?p='+p,function(response){
      $("#resultssss").html(response);
    });
  }
</script>
<body>
 
 <div id="resultssss" >
  
 </div>


</body>
</html>