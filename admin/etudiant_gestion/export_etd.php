<?php

$connect = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  


$query = "SELECT * FROM etudiantinscription ";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_rows = $statement->rowCount();



if(isset($_POST["export"]))
{
 require_once 'classes/PHPExcel.php';

  $object = new PHPExcel();
  $object->setActiveSheetIndex(0);
  $table_columns = array("id", "nom", "prenom", "code_massar","cin","email");
  $column = 0;
  foreach($table_columns as $field)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
   $column++;
  }

  $query = "
  SELECT * FROM etudiantinscription  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $excel_result = $statement->fetchAll();
  $excel_row = 2;
  foreach($excel_result as $sub_row)
  {
   //$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $excel_row-1);
   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $sub_row["id"]);
   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $sub_row["nom"]);
   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $sub_row["prenom"]);
   $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $sub_row["code_massar"]);
   $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $sub_row["cin"]);
   $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $sub_row["email"]);
   
   
   $excel_row++;
  }
  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

header('Content-Disposition: attachment;filename="Etudiants_ENS.xlsx"');

header('Cache-Control: max-age=0');
  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
  
  $object_writer->save('php://output');
 
 }



?>