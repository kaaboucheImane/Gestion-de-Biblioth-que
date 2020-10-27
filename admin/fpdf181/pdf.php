

<?php

require'fpdf.php' ;
$bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

class myPDF extends FPDF
{

   function header(){
    $this->Image('logo.jpg',5,10,-3000);
    $this->SetFont('Arial','B',14);
    $this->Cell(276,10,"",0,0,'c');
    $this->Ln();
    $this->SetFont('Times','',12);
    $this->Cell(276,10,"",0,0,'c');
    $this->Ln(40);
   }

   function footer(){
    $this->SetY(-15);
    $this->SetFont('Arial','',8);
    $this->Cell(0,10,'page'.$this->PageNo().'/{nb}',0,0,'c');
   }

   function headerTable(){
    $this->SetFont('Times','B',12);
    $this->Cell(40,10,'Code Massar',1,0,'c');
    $this->Cell(100,10,'Titre',1,0,'c');
    $this->Cell(40,10,'Nom et Prenom',1,0,'c');
    $this->Cell(80,10,'E-mail',1,0,'c');
   }

   function viewTable($bdd){
    $this->SetFont('Times','',12);

    $stmt=$bdd->query("SELECT * FROM livre_reserver_etape2"); 
    define('TIMEZONE', 'Africa/Casablanca');
    date_default_timezone_set(TIMEZONE);
    $date = new DateTime();
    $date1=$date->format('Y-m-d H:i:s');
    while($data=$stmt->fetch(PDO::FETCH_OBJ)){
        $jrdb=$data->joure;
        $jr=date("d");
        $x = new DateTime($jrdb);
        $x1=$x->format('Y-m-d H:i:s');
        $res = date('Y-m-d H:i:s',strtotime('+4 days',strtotime($x1)));
        $this->Ln();
        if($date1>=$res){
        
          $value = mb_convert_encoding($data->titre, 'ISO-8859-1', 'UTF-8');
          $value1 = mb_convert_encoding($data->nom_prenom, 'ISO-8859-1', 'UTF-8');

           $this->Cell(40,10,$data->code_massar,1,0,'L');
           $this->Cell(100,10,$value,1,0,'L');
           $this->Cell(40,10,$value1,1,0,'L');
           $this->Cell(80,10,$data->email,1,0,'L');
        }
    }
   }



}

$pdf= new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($bdd);
$pdf->Output();

?>