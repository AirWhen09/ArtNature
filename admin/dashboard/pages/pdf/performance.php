<?php
require('pdf/fpdf.php');
include '../../../../connection/connection.php';
if(isset($_GET['status'])){
    $startDate = mysqli_real_escape_string($conn, $_GET['startDate']);
    $endDate = mysqli_real_escape_string($conn, $_GET['endDate']);
    $startDate .= ' 00:00:00';
    $endDate .= ' 23:00:00';
    $status = mysqli_real_escape_string($conn, $_GET['status']);
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
$pdf->Cell(0,5,"BATCH REPORT",0,1,"C");
$pdf->Cell(160,5,"",0,1,"C");

$pdf->SetFont('Arial','B',25); 
$pdf->cell(45,10, 'Order No',1,0);
$pdf->cell(40,10, 'Model',1,0);
$pdf->cell(33,10, 'Size',1,0);
$pdf->cell(50,10, 'Start Date',1,0);
$pdf->cell(50,10, 'End Date',1,0);
$pdf->cell(50,10, 'Status',1,0);
$pdf->cell(60,10, 'OPERATOR',1,1);

//get all task
$allTask = "SELECT a.order_no as orderNo,
                    a.date_created as dateCreated,
                    a.start_date as startDate,
                    a.end_date as endDate,
                    b.name as batchName,
                    c.name as wigModel,
                    d.name as wigSize,
                    f.name as taskStatus,
                    e.first_name as operator,
                    a.no_of_days as noOfDays
            from tasks as a
            join task_batch as b on a.batch = b.batch_id
            join reference_code as c on a.wig_model = c.ref_id
            join reference_code as d on a.wig_size = d.ref_id
            join reference_code as f on a.status = f.ref_id
            join users as e on a.user_id = e.user_id
            WHERE (a.end_date BETWEEN '$startDate' AND '$endDate') and
            a.status = '$status'
            ";
$getAllBatch = $conn->query($allTask);
$new = 0;
$production = 0;
$done = 0;
$archived = 0;
$lapsed = 0;

while($result = $getAllBatch->fetch_assoc()){
if($result['taskStatus'] == "New") ++$new;
if($result['taskStatus'] == "Production") ++$production;
if($result['taskStatus'] == "Done") ++$done;
if($result['taskStatus'] == "Archived") ++$archived;
if($result['taskStatus'] == "Lapsed") ++$lapsed;
$orderNo = $result['orderNo'];
$dateCreated = date('M d, Y', strtotime($result['dateCreated']));
$startDate = date('M d, Y', strtotime($result['startDate']));
$endDate = date('M d, Y', strtotime($result['endDate']));
$pdf->SetFont('Arial','',18); 
$pdf->cell(45,10, "{$orderNo}",1,0);
$pdf->cell(40,10, "{$result['wigModel']}",1,0);
$pdf->cell(33,10, "{$result['wigSize']}",1,0);
$pdf->cell(50,10, "{$dateCreated}",1,0);
$pdf->cell(50,10, "{$startDate}",1,0);
$pdf->cell(50,10, "{$result['taskStatus']}",1,0);

$pdf->cell(60,10, "{$result['operator']}",1,1);

}
$pdf->Cell(160,5,"",0,1,"C");
$pdf->Cell(160,5,"",0,1,"C");
$pdf->Cell(160,5,"",0,1,"C");



$pdf->Output();
?>