        <script>
          $(document).ready(function(){
            $("#res_change").hide(3000);
          })
        </script>

<?php

   if (!empty($_POST['days'])) {
    
     define('TIMEZONE', 'Africa/Casablanca');
     date_default_timezone_set(TIMEZONE);
     $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
     $req2=$bdd->prepare("UPDATE  db_restaurer SET day=:d");
     $req2->execute(array(':d'=> $_POST['days']));
     echo "<label class='text-success' id='res_change'>Terminer </label><br /><table class='table table-bordered'> ";
    }else{
    	echo "<label class='text-danger' id='res_change'>Attention il y'a un erreur!</label><br /><table class='table table-bordered'> ";
    }

?>
