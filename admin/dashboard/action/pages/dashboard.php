<?php
    //get all task
    $allTask = "SELECT *, b.name as taskStatus , 
                          c.first_name as firstName, 
                          c.last_name as lastName,
                          c.image as imagePath,
                          e.name as wigModel,
                          f.name as wigSize,
                          a.user_id as userId,
                          g.name as userRole
                from tasks as a
                left join reference_code as b on a.status = b.ref_id
                left join users as c on a.user_id = c.user_id
                left join reference_code as e on a.wig_model = e.ref_id
                left join reference_code as f on a.wig_size = f.ref_id
                left join reference_code as g on c.user_role = g.ref_id
                where a.status in ('tstts2')
                ";
    $getTask = $conn->query($allTask);

    //get all batch
    $allBatch = "SELECT * from task_batch";
    $getBatch = $conn->query($allBatch);

    
    //get task overview
    $archiveSQL = "SELECT count(*) as arc from tasks where status = 'tstts5'";
    $newSQL = "SELECT count(*) as new from tasks where status = 'tstts1'";
    $doneSQL = "SELECT count(*) as done from tasks where status = 'tstts3'";
    $productionSQL = "SELECT count(*) as production from tasks where status = 'tstts2'";

    $getArchive = $conn->query($archiveSQL)->fetch_assoc();
    $getNew = $conn->query($newSQL)->fetch_assoc();
    $getDone = $conn->query($doneSQL)->fetch_assoc();
    $getProduction = $conn->query($productionSQL)->fetch_assoc();

    if($getArchive && $getNew && $getDone && $getProduction){
        $taskOverview = '['.$getArchive['arc'].','.$getNew['new'].','.$getDone['done'].','.$getProduction['production'].']';
    }else{
        $taskOverview = "0,0,0,0";
    }

    // update lapsed task 
    // $today = date('Y-m-d');
    // $selAllTask = $conn->query("SELECT * FROM tasks");
    // while($taskList = $selAllTask->fetch_assoc()){
       

    //     if($taskList['process'] < 100 && $taskList['process'] !== NULL){

    //         $dueDate = date('Y-m-d', strtotime($taskList['end_date']));

    //         $orderNo = $taskList['order_no'];

            

    //             if($today > $dueDate){
    //                 $updateLapse = $conn->query("UPDATE tasks set status = 'tstts5' where order_no = '$orderNo'");
                    
    //             }
            
    //     }
    // }
?>