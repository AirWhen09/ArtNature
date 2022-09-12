<?php
include '../../../../connection/connection.php';

if(isset($_POST['batchName'])){
    $batch = $_POST['batchName'];
    $output = '';
    //get all task
    $allTask = "SELECT *, b.name as taskStatus , 
                          c.first_name as firstName, 
                          c.last_name as lastName,
                          c.image as imagePath,
                          e.name as wigModel,
                          f.name as wigSize,
                          g.name as userRole
                from tasks as a
                left join reference_code as b on a.status = b.ref_id
                left join users as c on a.user_id = c.user_id
                left join reference_code as e on a.wig_model = e.ref_id
                left join reference_code as f on a.wig_size = f.ref_id
                left join reference_code as g on c.user_role = g.ref_id
                where a.status in ('tstts2','tstts3') and batch like '%$batch%'
                ";

    //get total Ave
    $aveProcess = "SELECT FORMAT(AVG(a.process), 2) as totalAve from tasks as a where a.status  != 'tstts4' and batch = '$batch'";
    $getAve = $conn->query($aveProcess);
    
    
    if($getAve->num_rows > 0){
        $ave = $getAve->fetch_assoc();
        $batchNames = $conn->query("SELECT name, date_created from task_batch where batch_id = '$batch'");

        if($batchNames->num_rows > 0){
            $batchName = $batchNames->fetch_assoc();
    
            $output .= '
                    <div class="invoice-card-row mb-3 p-2">
                        <div class="bg-warning invoice-card shadow-lg rounded">
                            <div class="p-3">
                                <div class="d-flex">
                                    <div class="d-flex flex-column">
                                        <span class="text-white fs-18">Name: <span class="fw-bold">'.$batchName['name'].'</span></span>
                                        <span class="text-white fs-18">Date Created: <span class="fw-bold">'.date('F d, Y h:mA', strtotime($batchName['date_created'])).'</span></span>
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
        </div> ';

        }

    echo $output;
}

?>