<?php
    $addDate = date('Y-m-d', strtotime("+1 day"));
    $minusDate = date('Y-m-d', strtotime("-1 day"));

    //get progress today
    $todayProgress = "SELECT *, b.name as taskStatus , 
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
                        where a.date_updated between '$minusDate' and '$addDate'
                        ";
    $getProgress = $conn->query($todayProgress);

    //get all batch
    $allBatch = "SELECT a.name as batchName, 
                        count(b.order_no) as numOfTask,
                        a.status as batchStatus,
                        a.date_created as dateCreated,
                        a.batch_id as batchId,
                        a.progress as batchProgress
                    from task_batch as a 
                    join tasks as b on a.batch_id = b.batch
                    where a.status != 'bstts4' group by a.batch_id";
    $getAllBatch = $conn->query($allBatch);

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
            echo "<script>window.location.href = 'index.php?progressReport'</script>";
        }
    }
?>