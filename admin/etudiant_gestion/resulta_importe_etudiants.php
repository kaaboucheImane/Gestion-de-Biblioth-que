

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
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  $file = $_POST["excel"]; // getting temporary source of excel file
  include("Classes/PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file

  $output .= "<label class='text-success'>Données insérées</label><br /><table class='table table-bordered'>";
  $query1 = "DELETE  FROM etudiantinscription ";
     mysqli_query($connect, $query1);
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   for($row=2; $row<=$highestRow; $row++)
   {
    $output .= "<tr>";
   // $id = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
    $nom = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
    $prenom=mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
    $code_massar=mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
    $cin =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
    $email=mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
    $motdepasse=mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
   
    
     $query = "INSERT INTO etudiantinscription(nom,prenom,code_massar,cin,email,motdepasse) VALUES('".$nom."','".$prenom."','".$code_massar."','".$cin."','".$email."','".$motdepasse."')";
    mysqli_query($connect, $query);
  
    
   }
  } 
  $output .= '</table>';

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

