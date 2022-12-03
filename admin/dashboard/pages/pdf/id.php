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
                                    a.contact as contact,
                                    a.user_id as userId    
                                    from users as a
                                    join reference_code as b on a.user_role = b.ref_id
                                    where a.user_id = '$id'")->fetch_assoc();
    $image = $getUser['image'];
    $userId = sprintf('%06d',$getUser['userId']);
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
$pdf->Image("../../../../img/logo3.png",8,3,25);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,5,"",0,0,"C");
$pdf->Cell(70,5,"ARTNATURE MANUFACTURING.",0,1,"C");
$pdf->Cell(30,5,"",0,0,"C");
$pdf->Cell(70,5,"PHILLIPINES INC.",0,1,"C");
$pdf->Cell(30,5,"",0,1,"C");
$pdf->Cell(30,5,"",0,0,"C");
$pdf->SetFont('Arial','',8);
$pdf->Cell(70,5,"MABINI, LIBMANAN, CAMARINES SUR.",0,1,"C");
$pdf->Image("../../../../{$image}",35,28,30);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(16,37,"",0,1,"C");
$pdf->Cell(100,5,"{$employee}",0,1,"C");
$pdf->SetFont('Arial','',10);

$pdf->Cell(16,3,"",0,1,"C");
$pdf->SetFont('Arial','B',11);
$pdf->Cell(100,5,"{$name}",0,1,"C");
$pdf->SetFont('Arial','',8);
$pdf->Cell(100,5,"Name",0,1,"C");
$pdf->Cell(16,3,"",0,1,"C");

$pdf->SetFont('Arial','B',15);
$pdf->Cell(100,5,"{$userId}",0,1,"C");
$pdf->SetFont('Arial','',8);
$pdf->Cell(100,5,"ID Number",0,1,"C");

//$pdf->Image('https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=HiImUnderTheWaterPlsHelpMe&choe=UTF-8',33,74,35,0,'PNG');

$pdf->Cell(16,15,"",0,1,"C");
$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,5,"{$dob}",0,0,"C");
$pdf->Cell(50,5,"_____________",0,1,"C");
$pdf->SetFont('Arial','',7);
$pdf->Cell(50,5,"Date of Birth",0,0,"C");
$pdf->Cell(50,5,"Signature",0,1,"C");


$pdf->AddPage();
$pdf->Image("../../../../img/ID.jpg",0,0,100);
$pdf->SetFont('Arial','',10);
$pdf->Cell(90,4,"",0,1,"C");
$pdf->Cell(4,10,"",0,0,"C");
$pdf->Multicell(93,10,"IMPORTANT\nThis ID is non-transferable and shall be confiscated when use by others.\nWear this ID card when entering company premises and present to company officers upon demand",1, "C"); 

$pdf->Cell(90,4,"",0,1,"C");
$pdf->Cell(4,10,"",0,0,"C");
$pdf->Multicell(93,10,"______________________\nADDRESS\n____________________\nINCASE OF EMERGENCY PLEASE CONTACT\n_________________________\n Authorized Signature",1,"C"); 
$pdf->Output();
?>