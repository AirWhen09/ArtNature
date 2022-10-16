<?php
require('pdf/fpdf.php');
include '../../../../connection/connection.php';
if(isset($_GET['batch'])){
    $batch = mysqli_real_escape_string($conn, $_GET['batch']);
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
$pdf->SetMargins(5, 17, 20, true);
$pdf->AliasNbPages('{pages}');
//$pdf->AliasNbPages('{$print_date}');
$pdf->AddPage();

$pdf->SetFont('Arial','B',20);
$pdf->Cell(170,5,"",0,0,"C");
$pdf->Cell(0,5,"DAILY STATUS",0,1,"L");
$pdf->Cell(160,5,"",0,1,"C");

$pdf->SetFont('Arial','B',15); 
$pdf->cell(27,6, 'Order No',1,0);
$pdf->cell(20,6, 'Model',1,0);
$pdf->cell(13,6, 'Size',1,0);
$pdf->cell(30,6, 'Issue Date',1,0);
$pdf->cell(30,6, 'Read Date',1,0);
$pdf->cell(30,6, 'Due Date',1,0);
$pdf->cell(30,6, 'Issue Vent',1,0);
$pdf->cell(15,6, 'Days',1,0);
$pdf->cell(10,6, '1',1,0);
$pdf->cell(10,6, '2',1,0);
$pdf->cell(10,6, '3',1,0);
$pdf->cell(10,6, '4',1,0);
$pdf->cell(10,6, '5',1,0);
$pdf->cell(10,6, '6',1,0);
$pdf->cell(10,6, '7',1,0);
$pdf->cell(10,6, '8',1,0);
$pdf->cell(10,6, '9',1,0);
$pdf->cell(10,6, '10',1,0);
$pdf->cell(10,6, '11',1,0);
$pdf->cell(10,6, '12',1,0);
$pdf->cell(10,6, '13',1,0);
$pdf->cell(10,6, '14',1,0);
$pdf->cell(10,6, '15',1,0);
$pdf->cell(10,6, '16',1,0);
$pdf->cell(10,6, '17',1,0);
$pdf->cell(10,6, '18',1,0);
$pdf->cell(33,6, 'OPERATOR',1,1);

//get all task
$allTask = "SELECT a.order_no as orderNo,
                    a.date_created as dateCreated,
                    a.start_date as startDate,
                    a.end_date as endDate,
                    b.name as batchName,
                    c.name as wigModel,
                    d.name as wigSize,
                    e.first_name as operator,
                    a.no_of_days as noOfDays
            from tasks as a
            join task_batch as b on a.batch = b.batch_id
            join reference_code as c on a.wig_model = c.ref_id
            join reference_code as d on a.wig_size = d.ref_id
            join users as e on a.user_id = e.user_id
            where a.batch = '$batch'";
$getAllBatch = $conn->query($allTask);

while($result = $getAllBatch->fetch_assoc()){
$orderNo = $result['orderNo'];
$dateCreated = date('M d, Y', strtotime($result['dateCreated']));
$startDate = date('M d, Y', strtotime($result['startDate']));
$endDate = date('M d, Y', strtotime($result['endDate']));
$pdf->SetFont('Arial','',12); 
$pdf->cell(27,6, "{$orderNo}",1,0);
$pdf->cell(20,6, "{$result['wigModel']}",1,0);
$pdf->cell(13,6, "{$result['wigSize']}",1,0);
$pdf->cell(30,6, "{$dateCreated}",1,0);
$pdf->cell(30,6, "{$startDate}",1,0);
$pdf->cell(30,6, "{$endDate}",1,0);
$pdf->cell(30,6, "{$result['batchName']}",1,0);
$pdf->cell(15,6, "{$result['noOfDays']}",1,0);

$count = "SELECT count(*) as task from task_days where task_id = '$orderNo'";
$getCount = $conn->query($count)->fetch_assoc();
for($i = 0; $i <= 17; ++$i){
    if($i < $getCount['task'] ){
        $progress = $conn->query("SELECT progress from task_days where task_id = '$orderNo' order by dates limit $i,1")->fetch_assoc();
        $pdf->cell(10,6, "{$progress['progress']}%",1,0);
    }else{
        $pdf->cell(10,6, "",1,0);
    }
}

$pdf->cell(33,6, "{$result['operator']}",1,1);

}
$pdf->Output();
?>