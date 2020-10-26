        <script>
          $(document).ready(function(){
            $("#alertformimport").hide(3000);
          })
        </script>
<?php
@session_start();
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
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   for($row=2; $row<=$highestRow; $row++)
   {
    $output .= "<tr>";
    $id = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
    $numero = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
    $auteur=mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
    $titre=mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
    $edition =mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
    $lieu=mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
    $annee=mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
    $cote=mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
    $matiere=mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
    $nombreDeCopie=mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(9, $row)->getValue());
    $categorie=mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(10, $row)->getValue());
    $sous_categorie=mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(11, $row)->getValue());
    $niveau=mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(12, $row)->getValue());
    $collection=mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(13, $row)->getValue());
    $n=mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(14, $row)->getValue());
    $mois=mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(15, $row)->getValue());
    $nb_partie=mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(16, $row)->getValue());
    $nd_edition=mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(17, $row)->getValue());
     
     $con = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  

     $q = "SELECT * FROM categories where categorie='$categorie' ";
     $st = $con->prepare($q);
     $st->execute();
     $res = $st->fetchAll();
     foreach($res as $rows)
     {
        $_SESSION['id_cat']=$rows['id'];
     }
     $qy = "SELECT * FROM sous_categories where sous_categorie='$sous_categorie' ";
     $stt = $con->prepare($qy);
     $stt->execute();
     $ress = $stt->fetchAll();
     foreach($ress as $rowss)
     {
        $_SESSION['id_sous_cat']=$rowss['id'];
     }
     $id_cat=$_SESSION['id_cat'];
     $id_sous_cat=$_SESSION['id_sous_cat'];
     $query = "INSERT INTO livre(id,numero,auteur,titre,edition,lieu,annee,cote,matiere,nombreDeCopie,categorie_id,sous_categorie_id,niveau,collection,n,mois,nb_partie,nb_edition) VALUES('".$id."','".$numero."','".$auteur."','".$titre."','".$edition."','".$lieu."','".$annee."','".$cote."','".$matiere."','".$nombreDeCopie."','".$id_cat."','".$id_sous_cat."','".$niveau."','".$collection."','".$n."','".$mois."','".$nb_partie."','".$nd_edition."')";
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

