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

                        <div class="bg-warning invoice-card shadow-lg rounded">
                            <div class="p-3">
                                <div class="d-flex">
                                    <div class="d-flex flex-column">
                                        <span class="text-white fs-18">Name: <span class="fw-bold">'.$batchName['name'].'</span></span>
                                        <span class="text-white fs-18">Date Created: <span class="fw-bold">'.date('F d, Y h:mA', strtotime($batchName['date_created'])).'</span></span>
                                        <span class="text-white fs-18">Status: <span class="fw-bold">'.$batchName['status'].'</span></span>
                                    </div>
                                </div>
                                <div class="progress default-progress my-3" style="outline: #ffffff solid 3px; box-shadow: none">
                                    <div class="progress-bar bg-gradient-1 progress-animated" style="width: '.$ave['totalAve'].'%; height:20px;" role="progressbar">
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
                    <div class="bg-warning invoice-card shadow-lg rounded">
                        <div class="p-3">
                            <div class="d-flex">
                                <div class="d-flex flex-column">
                                    <span class="text-white fs-18 fw-bold">All task average</span>
                                </div>
                            </div>
                            <div class="progress default-progress my-3" style="outline: #ffffff solid 3px; box-shadow: none">
                                <div class="progress-bar bg-gradient-1 progress-animated" style="width: '.$ave['totalAve'].'%; height:20px;" role="progressbar">
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
            <div class="bg-warning invoice-card shadow-lg rounded mb-2">
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
                        <div class="progress-bar bg-gradient-1 progress-animated" style="width: '.$task["process"].'%; height:20px;" role="progressbar">
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
    $selMinDate = $conn->query("SELECT * from tasks as a where a.batch = '$batch' order by a.start_date ASC limit 1");
    if($selMinDate->num_rows > 0){
        $getMinDate = $selMinDate->fetch_assoc();
        $minDate = date('Y/m/d', strtotime($getMinDate['start_date']));
    }

    $selMaxDate = $conn->query("SELECT * from tasks where batch = '$batch' order by end_date DESC limit 1");
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
    
    if($remark == 'Damage'){
        $remarks = "Your Order Number: $orNo, is $remark please message your manager for further information about your damage product. ASAP!" ;
        $upT = $conn->query("UPDATE tasks set status = 'tstts6' where order_no = '$orNo'");
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

?>