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
                        a.progress as batchProgress,
                        a.assigned_driver as driver
                    from task_batch as a 
                    join tasks as b on a.batch_id = b.batch
                    where a.assigned_driver = '$isLoginUserId'
                    group by a.batch_id
                    ";
    $getAllBatch = $conn->query($allBatch);           
    
    
    if(isset($_POST['btnLocation'])){
        $batchId = $_POST['batchName'];
        $myLocation = $_POST['myLocation'];

        $inLocation = $conn->query("INSERT INTO task_batch_location(location_id, batch_id, user_id) VALUES('$myLocation','$batchId','$isLoginUserId')");
        if($inLocation){
            echo "<script> alert('Location Added');</script>";
            echo "<script>window.location.href = 'index.php?location&batch=$batchId'</script>";
        }else{
            echo $conn->error;
        }
    }

    if(isset($_POST['batchDelivered'])){
        $batchId = $_POST['batchName'];

        $delivered = $conn->query("UPDATE task_batch set status = 'bstts5' where name = '$batchId'");
        if($delivered){
            echo "<script> alert('Update Successfully');</script>";
            echo "<script>window.location.href = 'index.php?location&batch=$batchId'</script>";
        }
    }

    if(isset($_POST['assignDriver'])){
        $driverId = $_POST['driver'];
        $batch = $_POST['batchId'];

        $update = $conn->query("UPDATE task_batch set assigned_driver = '$driverId' where name = '$batch'");

        if($update){
            echo "<script> alert('Update Successfully');</script>";
            echo "<script>window.location.href = 'index.php?delivery</script>";
        }else{
            echo "<script> alert('Something is wrong please try again.');</script>";
        }
    }
?>