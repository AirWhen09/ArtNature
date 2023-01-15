<?php
include '../../../../connection/connection.php';

if(isset($_POST['batchName'])){
    $batch = $_POST['batchName'];
    $data = array();
    $output = '';
    //get all task
    $allTask = "SELECT *, b.name as taskStatus , 
                          c.first_name as firstName, 
                          c.last_name as lastName,
                          c.image as imagePath,
                          e.name as wigModel,
                          f.name as wigSize,
                          h.name as wigStatus,
                          g.name as userRole
                from tasks as a
                left join reference_code as b on a.status = b.ref_id
                left join users as c on a.user_id = c.user_id
                left join reference_code as e on a.wig_model = e.ref_id
                left join reference_code as f on a.wig_size = f.ref_id
                left join reference_code as g on c.user_role = g.ref_id
                left join reference_code as h on a.status = h.ref_id
                where a.status in ('tstts2','tstts3','tstts5') and batch like '%$batch%'
                ";

    //get total Ave
    $aveProcess = "SELECT FORMAT(AVG(a.process), 2) as totalAve from tasks as a where a.status  != 'tstts4' and batch = '$batch'";
    $getAve = $conn->query($aveProcess);
    
    
    if($getAve->num_rows > 0){
        $ave = $getAve->fetch_assoc();
        $batchNames = $conn->query("SELECT a.name as name, a.date_created as date_created, b.name as status from task_batch as a join reference_code as b on a.status = b.ref_id where a.batch_id = '$batch'");

        if($batchNames->num_rows > 0){
            $batchName = $batchNames->fetch_assoc();
    
            $output .= '
                
                    <a class="ms-auto btn btn-primary" href="pages/pdf/batch.php?batch='.$batch.'" target="_BLANK"">Generate Report <i class="las la-signal ms-3 scale5"></i></a>
                    <div class="invoice-card-row mb-3 p-2">
					<div id="chartBar2" class="bar-chart"></div>

                        <div class=" bg-warnings invoice-card shadow-lg rounded">
                            <div class="p-3">
                                <div class="d-flex">
                                    <div class="d-flex flex-column">
                                        <span class="text-white fs-18">Name: <span class="fw-bold">'.$batchName['name'].'</span></span>
                                        <span class="text-white fs-18">Date Created: <span class="fw-bold">'.date('F d, Y h:mA', strtotime($batchName['date_created'])).'</span></span>
                                        <span class="text-white fs-18">Status: <span class="fw-bold">'.$batchName['status'].'</span></span>
                                    </div>
                                </div>
                                <div class="progress default-progress my-3" style="outline: #ffffff solid 3px; box-shadow: none">
                                    <div class="progress-bar  progress-animated" style="width: '.$ave['totalAve'].'%; height:20px;" role="progressbar">
                                        <span>'.$ave['totalAve'].'% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            ';
        }else{
            //get total Ave
            $aveProcess = "SELECT FORMAT(AVG(a.process), 2) as totalAve from tasks as a where a.status  != 'tstts4'";
            $getAve = $conn->query($aveProcess);
            $ave = $getAve->fetch_assoc();
            $output .= '
                <div class="invoice-card-row mb-3 p-2">
                    <div class=" bg-warnings invoice-card shadow-lg rounded">
                        <div class="p-3">
                            <div class="d-flex">
                                <div class="d-flex flex-column">
                                    <span class="text-white fs-18 fw-bold">All task average</span>
                                </div>
                            </div>
                            <div class="progress default-progress my-3" style="outline: #ffffff solid 3px; box-shadow: none">
                                <div class="progress-bar  progress-animated" style="width: '.$ave['totalAve'].'%; height:20px;" role="progressbar">
                                    <span>'.$ave['totalAve'].'% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        ';
        }
        
    }


    $getTask = $conn->query($allTask);
    while($task = $getTask->fetch_assoc()){
        $output .= '
        <div class="col-xl-4 col-xxl-4 col-sm-6">
            <a href="index.php?taskHistory&or='.$task['order_no'].'">
            <div class=" bg-warnings invoice-card shadow-lg rounded mb-2">
                <div class="p-3">
                    <div class="d-flex">
                        <div class="icon me-3">
                            <img src="../../'.$task["imagePath"].'" alt="image" class="img-fluid rounded-circle border-3 border border-white">
                        </div> 
                        <div class="d-flex flex-column">
                            <span class="text-white fs-18 fw-bold">'.$task["firstName"].' '.$task["lastName"].'</span>
                            
                            <span class="text-white fs-10">'.$task["userRole"].'</span>
                            <span class="text-white fs-10">or #: <b>'.$task["order_no"].'</b></span>
                            <span class="text-white fs-10">Status: <b>'.$task["wigStatus"].'</b></span>
                        </div>
                    </div>
                    <div class="progress default-progress my-2" style="outline: #ffffff solid 3px; box-shadow: none">
                        <div class="progress-bar  progress-animated" style="width: '.$task["process"].'%; height:20px;" role="progressbar">
                            <span>'.$task["process"].'%</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-evenly">
                        <span class="text-white fs-18">Model: <b>'.$task["wigModel"].'</b></span>
                        <span class="text-white fs-18">Size: <b>'.$task["wigSize"].'</b></span>
                    </div>
                    
                </div>
            </div>
            </a>
        </div> ';

        }

    $data['datas'] = $output;
    $data['daterange'] = '';
    $data['goods'] = '';
    $data['lapsed'] = '';
    $minDate = '';
    $maxDate = '';
    $selMinDate = $conn->query("SELECT * from tasks as a where a.batch = '$batch' and a.start_date IS NOT NULL order by a.start_date ASC limit 1");
    if($selMinDate->num_rows > 0){
        $getMinDate = $selMinDate->fetch_assoc();
        $minDate = date('Y/m/d', strtotime($getMinDate['start_date']));
    }

    $selMaxDate = $conn->query("SELECT * from tasks where batch = '$batch' and end_date IS NOT NULL order by end_date DESC limit 1");
    if($selMaxDate->num_rows > 0){
        $getMaxDate = $selMaxDate->fetch_assoc();
        $maxDate = date('Y/m/d', strtotime($getMaxDate['end_date']));
    }

    while($minDate != $maxDate){
        $data['daterange'] .= $minDate.', ';
        $redate = date('Y-m-d', strtotime($minDate));
        $selAllGood = $conn->query("SELECT count(*) as goods from daily_batch_report where task_date = '$redate' and batch_id = '$batch' and remarks = 'GOOD'");
        if($selAllGood->num_rows > 0){
            $gdss = $selAllGood->fetch_assoc();
            $data['goods'] .= $gdss['goods'].', ';;
        }

        $selAlllapsed = $conn->query("SELECT count(*) as goods from daily_batch_report where task_date = '$redate' and batch_id = '$batch' and remarks = 'LAPSED'");
        if($selAlllapsed->num_rows > 0){
            $gdss = $selAlllapsed->fetch_assoc();
            $data['lapsed'] .= $gdss['goods'].', ';;
        }

        $minDate = date('Y/m/d', strtotime($minDate. ' + 1 day'));

    }

    
    $data['daterange'] = substr($data['daterange'], 0, -2);
    $data['goods'] = substr($data['goods'], 0, -2);
    $data['lapsed'] = substr($data['lapsed'], 0, -2);
    echo json_encode($data);
}

if(isset($_POST['remarks'])){
    $remark = $_POST['remarks'];
    $orNo = $_POST['orNo'];
    $userId = $_POST['userid'];

    $up = $conn->query("UPDATE tasks set remarks = '$remark' where order_no = '$orNo'");
    
    if($remark == 'Severly Damage'){
        $remarks = "Your Order Number: $orNo, is $remark please message your manager for further information about your damage product. ASAP!" ;
        $upT = $conn->query("UPDATE tasks set status = 'tstts6' where order_no = '$orNo'");
        $upT = $conn->query("UPDATE users set status = 'ustts5' where user_id = '$userId'");
    }elseif($remark == 'Good'){
        $remarks = "The admin praise your work. Order Number: $orNo" ;
        // $upT = $conn->query("UPDATE tasks set status = 'tstts2' where order_no = '$orNo'");
    }
    $inNotifAdmin = $conn->query("INSERT INTO notification(description, user_id, status) VALUES('$remarks', '$userId', 0)");
}

if(isset($_POST['year']) && isset($_POST['month'])){
    $year = $_POST['year'];
    $month = $_POST['month'];
    //get task overview
    $lapsed = "SELECT count(*) as arc from tasks where status = 'tstts5' and YEAR(end_date) like '%$year%' and MONTH(end_date) like '%$month%'";
    $damage = "SELECT count(*) as new from tasks where status = 'tstts6' and YEAR(end_date) like '%$year%' and MONTH(end_date) like '%$month%'";
    $onTime = "SELECT count(*) as done from tasks where status = 'tstts7' and YEAR(end_date) like '%$year%' and MONTH(end_date) like '%$month%'";
    $early = "SELECT count(*) as production from tasks where status = 'tstts8' and YEAR(end_date) like '%$year%' and MONTH(end_date) like '%$month%'";

    $getArchive = $conn->query($lapsed)->fetch_assoc();
    $getNew = $conn->query($damage)->fetch_assoc();
    $getDone = $conn->query($onTime)->fetch_assoc();
    $getProduction = $conn->query($early)->fetch_assoc();

    if($getArchive && $getNew && $getDone && $getProduction){
        $taskOverview = $getArchive['arc'].','.$getNew['new'].','.$getDone['done'].','.$getProduction['production'];
    }else{
        $taskOverview = "0,0,0,0";
    }

    echo $taskOverview;
}

if(isset($_POST['text'])){
    $text = $_POST['text'];
    $data = array();
    $data['forEmp'] = '<ul>';
    $data['forTask'] = '<ul>';

    $selAllEmp = $conn->query("SELECT * from users where user_role != 'ur1' and (first_name like '%$text%' OR last_name like '%$text%')  limit 7");
    $selTask = $conn->query("SELECT * from tasks where order_no like '%$text%' limit 7");
    $no = 0;
    while($result = $selAllEmp->fetch_assoc()){
        $no++;
        $data['forEmp'] .= "<li class='fw-bold' style='font-size:18px'><a href='#' data-bs-toggle='modal' data-bs-target='#allEmp".$no."'>".$result['first_name']." ".$result['last_name']."</a></li>";
        $data['forEmp'] .= "
        <div class='modal fade' id='allEmp".$no."' tabindex='-1' role='dialog' aria-labelledby='modelTitleId' aria-hidden='true'>
            <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                            <h5 class='modal-title'>Employee Information</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                        <div class='modal-body'>
                            <div class='container-fluid'>
                                <div class='col-5 mx-auto mb-2'>
                                    <img src='../../".$result['image']."' alt='' class='img-fluid rounded-circle border-primary border-2'>
                                </div>
                                <h3 class='text-center'>".$result['first_name'].' '.$result['last_name']."</h3>
                                <div class='text-center'>
                                    <span class='text-center text-muted'>".$result['email']."</span><br>
                                    <span class='text-center text-muted'>".$result['contact']."</span><br>
                                    <span class='text-center text-muted'>".$result['address']."</span><br>
                                    <span class='text-center text-muted'>DOB: ".date('F d, Y', strtotime($result['birthday']))."</span><br>
                                </div>
                                <div class='row mt-2'>";
                                    
                                        $empId = $result['user_id'];
                                        $getDoneTask = $conn->query("SELECT count(order_no) as done from tasks where user_id = '$empId' and status = 'tstts3'")->fetch_assoc();
                                        $getOnGoingTask = $conn->query("SELECT count(order_no) as onGoing from tasks where user_id = '$empId' and status = 'tstts2'")->fetch_assoc();
                                    
                         $data['forEmp'] .=  "<div class='mb-3 col-6'>
                                    <label class='form-label fw-bold'>Completed Task</label>
                                    <input type='text' value='".$getDoneTask['done']."' readonly
                                        class='form-control text-center' placeholder=''>
                                    </div>
                                    <div class='mb-3 col-6'>
                                    <label class='form-label fw-bold'>On Going Task</label>
                                    <input type='text' value='".$getOnGoingTask['onGoing']."' readonly
                                        class='form-control text-center' placeholder=''>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                        </div>
                </div>
            </div>
        </div>
        ";
                                            
    }
    while($getTask = $selTask->fetch_assoc()){
        $data['forTask'] .= "<li class='fw-bold' style='font-size:18px'><a href='?taskHistory&or=".$getTask['order_no']."'>".$getTask['order_no']."</  a></li>";
    }

    $data['forEmp'] .= '</ul>';
    $data['forTask'] .= '</ul>';


    echo json_encode($data);
}

?>