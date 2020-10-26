        <script>
          $(document).ready(function(){
            $("#alertformimport").hide(3000);
          })
        </script>
<?php
$connect = mysqli_connect("localhost", "root", "", "ouvrages");
mysqli_set_charset($connect,"utf8");
$output = '';
if (!empty($_POST["excel"])) {
 @$extension = end(explode(".", $_POST["excel"])); // For getting Extension of selected file
 $allowed_extension = array("sql"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  
    $user = "root";
    $pass = "";
    $host = "localhost";
    $dbname = "ouvrage";
    $sql_file = fopen(mysqli_real_escape_string($connect,$_POST["excel"]), 'r');
    $sql = fread($sql_file, filesize(mysqli_real_escape_string($connect,$_POST["excel"])));
    $conn = new PDO("mysql:host=" . $host . ";dbname=" . $dbname , $user, $pass);
    @$conn->exec($sql);
    
  $output = '<label class="text-success">Données insérées</label>';

 }
 else
 {
  $output = '<label class="text-danger">Fichier non valide</label>'; //if non excel file then
 }
}else{
  $output .= "<label class='text-danger'>Il faut sélectionner un fichier</label><br /><table class='table table-bordered'>";
}
?>


        <div class="alert " id="alertformimport">
          
          <strong><?php echo $output; ?></strong> 
        
        </div>