<?php

$connect = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  


$query = "SELECT * FROM livre ";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_rows = $statement->rowCount();



if(isset($_POST["export"]))
{
 require_once 'classes/PHPExcel.php';

  $object = new PHPExcel();
  $object->setActiveSheetIndex(0);
  $table_columns = array("id", "numero", "auteur", "titre","edition","lieu","annee","cote","matiere","nombreDeCopie","categorie","sous_categorie","niveau","collection","n","mois","nb_partie","nb_edition");
  $column = 0;
  foreach($table_columns as $field)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
   $column++;
  }

  $query = "
  SELECT * FROM categories,sous_categories,livre where livre.categorie_id=categories.id and livre.sous_categorie_id=sous_categories.id  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $excel_result = $statement->fetchAll();
  $excel_row = 2;
  foreach($excel_result as $sub_row)
  {
   //$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $excel_row-1);
   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $sub_row["id"]);
   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $sub_row["numero"]);
   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $sub_row["auteur"]);
   $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $sub_row["titre"]);
   $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $sub_row["edition"]);
   $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $sub_row["lieu"]);
   $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $sub_row["annee"]);
   $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $sub_row["cote"]);
   $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $sub_row["matiere"]);
   $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $sub_row["nombreDeCopie"]);
   $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $sub_row["categorie"]);
   $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $sub_row["sous_categorie"]);
   $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $sub_row["niveau"]);
   $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $sub_row["collection"]);
   $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $sub_row["n"]);
   $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $sub_row["mois"]);
   $object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $sub_row["nb_partie"]);
   $object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, $sub_row["nb_edition"]);
   
   $excel_row++;
  }
  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

header('Content-Disposition: attachment;filename="livres_biblio.xlsx"');

header('Cache-Control: max-age=0');
  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
  
  $object_writer->save('php://output');
 
 }



?>