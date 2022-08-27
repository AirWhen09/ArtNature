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
                ";
    $getTask = $conn->query($allTask);

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
        $process = $_POST['process'];
        $orderNo = $_POST['orderNo'];
        if($process == 100){
            $sql = "UPDATE tasks set process = '$process', status = 'tstts3' where order_no = '$orderNo'";
        }else{
            $sql = "UPDATE tasks set process = '$process' where order_no = '$orderNo'";
        }
        $updateTask = $conn->query($sql);
        if($updateTask){
            $addHistory = "INSERT INTO task_progress_history (image, task_id, progress) VALUES('img/nopic.png','$orderNo','$process')";
            $newHistory = $conn->query($addHistory);
            if($newHistory){
                echo "<script>window.location.href = 'index.php?manageTask'</script>";
            }
            
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