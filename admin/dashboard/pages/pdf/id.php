<?php
require('pdf/fpdf.php');
if(isset($_GET['id'])){

}
$print_date = date("M. d, Y");
class PDF extends FPDF{
				
    function Footer(){
         global $print_date;
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        //$this->Cell(0,10,'This is header',0,0,"C");
        // $this->Cell(0,10,'Page '.$this->PageNo()." / {pages}",0,0,"C" );
    } 
}

$pdf = new PDF('p','mm',array(100,130));
$pdf->SetMargins(5, 5, 5, true);
$pdf->AliasNbPages('{pages}');
//$pdf->AliasNbPages('{$print_date}');
$pdf->AddPage();

$pdf->Cell(0,5,"",0,1,"C");
$pdf->Image("../../../../img/ID.jpg",0,0,100);
$pdf->Image("../../../../img/profile/hayes-potter-Dcr2sFFopP8-unsplash.jpg",35,27,30);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(16,49,"",0,1,"C");
$pdf->Cell(90,5,"Laura Smith",0,1,"C");
$pdf->SetFont('Arial','',10);
$pdf->Cell(90,5,"Work-from-home",0,1,"C");

$pdf->Image('https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=erwin&choe=UTF-8',33,68,35,0,'PNG');

$pdf->Cell(16,30,"",0,1,"C");
$pdf->SetFont('Arial','B',10);
$pdf->Cell(45,5,"April 9, 1999",0,0,"C");
$pdf->Cell(45,5,"09758781348",0,1,"C");
$pdf->SetFont('Arial','',7);
$pdf->Cell(45,5,"Date of Birth",0,0,"C");
$pdf->Cell(45,5,"Contact Number",0,1,"C");
$pdf->Output();
?>