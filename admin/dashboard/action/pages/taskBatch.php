<?php
if(isset($_GET['batch'])){
    $batch = mysqli_real_escape_string($conn, $_GET['batch']);
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
                where h.name = '$batch'
                ";
}

$getTask = $conn->query($allTask);

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
            echo "<script>window.location.href = 'index.php?batch=$batch'</script>";
        }
        
    }
}

if(isset($_POST['taskArchive'])){
    $order_no = $_POST['orderNo'];
    $archiveTask = $conn->query("UPDATE tasks set status = 'tstts4' where order_no = '$order_no'");
    if($archiveTask){
        echo "<script>window.location.href = 'index.php?batch=$batch'</script>";
    }
}
?>