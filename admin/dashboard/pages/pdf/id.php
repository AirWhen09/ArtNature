<?php
require('pdf/fpdf.php');
include '../../../../connection/connection.php';
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $getUser = $conn->query("SELECT a.image as image, 
                                    CONCAT(a.first_name, ' ', a.last_name) as fullname,
                                    b.name as employee,
                                    a.birthday as dob,
                                    a.address as address,
                                    a.contact as contact    
                                    from users as a
                                    join reference_code as b on a.user_role = b.ref_id
                                    where a.user_id = '$id'")->fetch_assoc();
    $image = $getUser['image'];
    $name = $getUser['fullname'];
    $employee = $getUser['employee'];
    $address = $getUser['address'];
    $dob = date('F m, Y', strtotime($getUser['dob']));
    $contact = $getUser['contact'];
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

$pdf = new PDF('p','mm',array(100,140));
$pdf->SetMargins(0, 0, 0, true);
$pdf->AliasNbPages('{pages}');
//$pdf->AliasNbPages('{$print_date}');
$pdf->AddPage();

$pdf->Cell(0,5,"",0,1,"C");
$pdf->Image("../../../../img/ID.jpg",0,0,100);
$pdf->Image("../../../../{$image}",35,27,30);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(16,53,"",0,1,"C");
$pdf->Cell(100,5,"{$name}",0,1,"C");
$pdf->SetFont('Arial','',10);
$pdf->Cell(100,5,"{$employee}",0,1,"C");
$pdf->Cell(100,5,"{$address}",0,1,"C");

//$pdf->Image('https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=HiImUnderTheWaterPlsHelpMe&choe=UTF-8',33,74,35,0,'PNG');

$pdf->Cell(16,35,"",0,1,"C");
$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,5,"{$dob}",0,0,"C");
$pdf->Cell(50,5,"{$contact}",0,1,"C");
$pdf->SetFont('Arial','',7);
$pdf->Cell(50,5,"Date of Birth",0,0,"C");
$pdf->Cell(50,5,"Contact Number",0,1,"C");

$pdf->Output();
?>