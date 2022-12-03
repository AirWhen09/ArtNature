<?php
require('pdf/fpdf.php');
include '../../../../connection/connection.php';
if(isset($_GET['batch'])){
    $batch = mysqli_real_escape_string($conn, $_GET['batch']);
    $selBName = $conn->query("SELECT name from task_batch where batch_id = '$batch'")->fetch_assoc();
}
$print_date = date("M. d, Y");
class PDF extends FPDF{
				
    function Footer(){
         global $print_date;
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        //$this->Cell(0,10,'This is header',0,0,"C");
        $this->Cell(0,10,'Page '.$this->PageNo()." / {pages}",0,0,"C" );
    } 
}

$pdf = new PDF('l','mm','A3');
$pdf->SetMargins(40,30,40, true);
$pdf->AliasNbPages('{pages}');
//$pdf->AliasNbPages('{$print_date}');
$pdf->AddPage();

$pdf->SetFont('Arial','B',20);
$pdf->Cell(165,5,"{$selBName['name']}",0,0,"L");
$pdf->Cell(165,5,"{$print_date}",0,0,"R");
$pdf->Cell(160,10,"",0,1,"C");

$pdf->SetFont('Arial','B',25); 
$pdf->cell(80,10, 'EMPLOYEE NAME',1,0);
$pdf->cell(70,10, 'NO. OF LAPSES',1,0);
$pdf->cell(180,10, 'DATE OF LAPSES',1,1);

//get all task
$allTask = "SELECT distinct(user_id) as userId from daily_batch_report where batch_id = '$batch'";
$getAllBatch = $conn->query($allTask);
$totalLapse = 0;
while($result = $getAllBatch->fetch_assoc()){
    $userId = $result['userId'];
$selectUser = $conn->query("SELECT * from users where user_id = '$userId'")->fetch_assoc();
$countLapsed = $conn->query("SELECT count(*) as lapsed from daily_batch_report where batch_id = '$batch' and user_id = '$userId' and remarks = 'LAPSED'")->fetch_assoc();
$dateLapse = $conn->query("SELECT task_date from daily_batch_report where batch_id = '$batch' and user_id = '$userId' and remarks = 'LAPSED'");
$pdf->SetFont('Arial','',18); 
$fullname = $selectUser['first_name'].' '.$selectUser['last_name'];
$lapsedCount = $countLapsed['lapsed'];

$dates = '';

while($dateL = $dateLapse->fetch_assoc()){
    $dates .= $dateL['task_date'].", ";
}
$pdf->cell(80,10, "{$fullname}",1,0);
$pdf->setFillColor(0,255,0); 
if($lapsedCount == 0){
    $pdf->SetTextColor(76,153,0);
}elseif($lapsedCount > 0 && $lapsedCount < 3){
    $pdf->SetTextColor(204,102,0);
}elseif($lapsedCount > 3){
    $pdf->SetTextColor(153,0,0);
}
$totalLapse += $lapsedCount;
$pdf->cell(70,10, "{$lapsedCount}",1,0);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(50,50,100);
$pdf->cell(180,10, "{$dates}",1,1);

}
$pdf->cell(80,10, '',0,0);
$pdf->cell(70,10, "{$totalLapse}",1,0);
$pdf->Cell(160,5,"",0,1,"C");
$pdf->Cell(160,5,"",0,1,"C");
$pdf->Cell(180,5,"",0,1,"C");
$pdf->cell(180,10, 'TOTAL NO OF LAPSES:',0,1);
$pdf->cell(180,10, '0 KEEP IT UP!',0,1);
$pdf->cell(180,10, '1-15 TOTAL OF LAPSES, PLEASE MESSAGE THE EMPLOYEES ABOUT THE LAPSES!',0,1);
$pdf->cell(180,10, '16 AND ABOVE TOTAL OF LAPSES: EMERGENCY MEETING',0,1);


$pdf->Output();
?>