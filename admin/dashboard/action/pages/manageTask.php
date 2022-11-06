<?php
    //get all task
    $allTask = "SELECT *, b.name as taskStatus , 
                          c.first_name as firstName, 
                          c.last_name as lastName,
                          c.image as imagePath,
                          e.name as wigModel,
                          f.name as wigSize,
                          g.name as userRole,
                          a.status as taskStat,
                          h.name as batchName
                from tasks as a
                left join reference_code as b on a.status = b.ref_id
                left join users as c on a.user_id = c.user_id
                left join reference_code as e on a.wig_model = e.ref_id
                left join reference_code as f on a.wig_size = f.ref_id
                left join reference_code as g on c.user_role = g.ref_id
                left join task_batch as h on a.batch = h.batch_id
                where a.status != 'tstts4'
                order by a.date_created ASC;
                ";
    $getTask = $conn->query($allTask);

    //get all archived task
    $allTaskArchived = "SELECT *, b.name as taskStatus , 
                          c.first_name as firstName, 
                          c.last_name as lastName,
                          c.image as imagePath,
                          e.name as wigModel,
                          f.name as wigSize,
                          g.name as userRole,
                          a.status as taskStat,
                          h.name as batchName
                from tasks as a
                left join reference_code as b on a.status = b.ref_id
                left join users as c on a.user_id = c.user_id
                left join reference_code as e on a.wig_model = e.ref_id
                left join reference_code as f on a.wig_size = f.ref_id
                left join reference_code as g on c.user_role = g.ref_id
                left join task_batch as h on a.batch = h.batch_id
                where a.status = 'tstts4'
                order by a.date_created ASC;
                ";
    $getTaskArchived = $conn->query($allTaskArchived);

    //get all new task
    $allNewTask = "SELECT *, b.name as taskStatus,
                             c.name as wigModel,
                             d.name as wigSize
                   from tasks as a 
                   join reference_code as b on a.status = b.ref_id
                   join reference_code as c on a.wig_model = c.ref_id
                   join reference_code as d on a.wig_size = d.ref_id
                   where a.status = 'tstts1' order by a.date_created ASC";
    $getAllNewTask = $conn->query($allNewTask);


    //get all wig model
    $allWigModel = "SELECT * from reference_code where group_name = 'mdl'";
    $getWigModel = $conn->query($allWigModel);

    //get all wig model
    $allWigSize = "SELECT * from reference_code where group_name = 'sz'";
    $getWigSize = $conn->query($allWigSize);

    //get employee : work-from-home and on-site
    $allEmployee = "SELECT concat(first_name, ' ', last_name) as fullname, user_id from users where user_role in ('ur2','ur3')";
    $getEmployee = $conn->query($allEmployee);

    //get all new task
    $allNewTask = "SELECT * from tasks where status = 'tstts1'";
    $getNewTask = $conn->query($allNewTask); 

    //get all batch name
    $getAllBatch = $conn->query("SELECT * from task_batch");

    if(isset($_POST['myTask'])){
        $area1 = $_POST['area1'];
        $area2 = $_POST['area2'];
        $area3 = $_POST['area3'];
        $area4 = $_POST['area4'];
    
            $wigId = $_POST['wigId'];
    
            $orderNo = $_POST['orderNo'];
                        
                        $addHistory = "INSERT INTO task_progress_history (image, task_id, progress, area_no) VALUES('img/nopic.png','$orderNo','$area1', 1)";
                        $newHistory = $conn->query($addHistory);
                        if($newHistory){
                                $updateArea = $conn->query("UPDATE wig set area_i = '$area1', area_i_pic = 'img/nopic.png' where wig_id = '$wigId'");
                        }else{
                                echo "<script> alert('Image Cant update area 1')</script>";
                                echo "<script> alert('$conn->error')</script>";
                        }
    
                                            
                        $addHistory2 = "INSERT INTO task_progress_history (image, task_id, progress, area_no) VALUES('img/nopic.png','$orderNo','$area2',2)";
                        $newHistory2 = $conn->query($addHistory2);
                        if($newHistory2){
                                $updateArea = $conn->query("UPDATE wig set area_ii = '$area2', area_ii_pic = 'img/nopic.png' where wig_id = '$wigId'");
                        }else{
                                echo "<script> alert('Image Cant Uploads 22')</script>";
                        }
                             
    
                        $addHistory3 = "INSERT INTO task_progress_history (image, task_id, progress, area_no) VALUES('img/nopic.png','$orderNo','$area3',3)";
                        $newHistory3 = $conn->query($addHistory3);
                        if($newHistory3){
                                $updateArea = $conn->query("UPDATE wig set area_iii = '$area3', area_iii_pic = 'img/nopic.png' where wig_id = '$wigId'");
                        }else{
                                echo "<script> alert('Image Cant Uploads 3')</script>";
                        }
                                    
    
                        $addHistory4 = "INSERT INTO task_progress_history (image, task_id, progress, area_no) VALUES('img/nopic.png','$orderNo','$area4',4)";
                        $newHistory4 = $conn->query($addHistory4);
                        if($newHistory4){
                                $updateArea = $conn->query("UPDATE wig set area_iv = '$area4', area_iv_pic = 'img/nopic.png' where wig_id = '$wigId'");
                        }else{
                                echo "<script> alert('Image Cant Uploads 4')</script>";
                        }
    
                    $totalProcess = ($area1 + $area2 + $area3 + $area4) / 4;
                    date_default_timezone_set('Asia/Manila');
                $todays = date('Y-m-d');
                    $updateProcess = $conn->query("UPDATE tasks set process = '$totalProcess' where order_no = '$orderNo'");
                    
                    if($updateProcess){
                        $selDaysProgress = $conn->query("SELECT * from task_days where task_id = '$orderNo' and dates = '$todays'");
                        if(mysqli_num_rows($selDaysProgress) > 0){
                                $updateDayProgress = $conn->query("UPDATE task_days set progress = '$totalProcess' where dates = '$todays' and task_id = '$orderNo'");
                        }else{
                                $inQueryDays = "INSERT INTO tasks_days(dates, task_id, days_count, progress) VALUES('$todays', '$orderNo', 0, '$totalProcess')";
                                $inTaskDays = $conn->query($inQueryDays);
                                if($inTaskDays){
                                }else{
                                        $cee = $conn->error;
                                        echo "$cee <script> alert('$cee');</script>";
                                }
                        }

                            echo "<script>swal('Welcome!', 'You have successfully logged in!', 'success');</script>";
                            echo "<script> alert('Task Updated');</script>";
                            echo "<script>window.location.href = 'index.php?manageTask'</script>";
                    }
    
    }

    if(isset($_POST['taskArchive'])){
        $order_no = $_POST['orderNo'];
        $archiveTask = $conn->query("UPDATE tasks set status = 'tstts4' where order_no = '$order_no'");
        if($archiveTask){
            echo "<script>window.location.href = 'index.php?manageTask'</script>";
        }
    }

    
?>