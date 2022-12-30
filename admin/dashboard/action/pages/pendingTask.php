<?php 
if(isset($_POST['reject'])){
    $id = $_POST['wigPic'];
    $rejectMsg = $_POST['rejectMsg'];
    $userId = $_POST['userId'];
    $update = $conn->query("UPDATE wig_picture set pic_status = 'Rejected' where id = '$id'");
    if($update){
        $inNotifAdmin = $conn->query("INSERT INTO notification(description, user_id, status) VALUES('$rejectMsg', '$userId', 0)");
        echo "<script> alert('Update Successfully.');</script>";
        echo "<script>window.location.href = 'index.php?manageTask'</script>";
    }else{
        echo "<script> alert('Something is wrong, Please try again.');</script>";
    }
}
if(isset($_POST['approve'])){
    $id = $_POST['wigPic'];
    $orderNo = $_POST['orderNo'];
    $update = $conn->query("UPDATE wig_picture set pic_status = 'Approved' where id = '$id'");
    if($update){
        $totalProgress = 0;
        $getArea = $conn->query("SELECT count(*) as progress from wig_picture where task_id = '$orderNo' and pic_status = 'Approved'")->fetch_assoc();
        $totalProgress = $getArea['progress'] * 6.25;
        date_default_timezone_set('Asia/Manila');
        $today = date('Y-m-d');
        $selDaysProgress = $conn->query("SELECT * from tasks_days where task_id = '$orderNo' and dates = '$today'");
        $selEnddate = $conn->query("SELECT * from tasks where order_no = '$orderNo'")->fetch_assoc();
        if($today < date('Y-m-d', strtotime($selEnddate['end_date'])) && $totalProgress == 100){
           $updateTask = $conn->query("UPDATE tasks set process = '$totalProgress', status = 'tstts8' where order_no = '$orderNo'");
        }elseif($today == date('Y-m-d', strtotime($selEnddate['end_date'])) && $totalProgress == 100){
            $updateTask = $conn->query("UPDATE tasks set process = '$totalProgress', status = 'tstts7' where order_no = '$orderNo'");
         }else{
            $updateTask = $conn->query("UPDATE tasks set process = '$totalProgress' where order_no = '$orderNo'");
        }
        $selectArea1 = $conn->query("SELECT count(*) as area from wig_picture where pic_status = 'Approved' and area_no = 'area_i' and task_id = '$orderNo'")->fetch_assoc();
        $selectArea2 = $conn->query("SELECT count(*) as area from wig_picture where pic_status = 'Approved' and area_no = 'area_ii' and task_id = '$orderNo'")->fetch_assoc();
        $selectArea3 = $conn->query("SELECT count(*) as area from wig_picture where pic_status = 'Approved' and area_no = 'area_iii' and task_id = '$orderNo'")->fetch_assoc();
        $selectArea4 = $conn->query("SELECT count(*) as area from wig_picture where pic_status = 'Approved' and area_no = 'area_iv' and task_id = '$orderNo'")->fetch_assoc();
        $getWigId = $conn->query("SELECT wig_id from tasks where order_no = '$orderNo'")->fetch_assoc();
        $wigId = $getWigId['wig_id'];
        $area1 = $selectArea1['area'] * 25;
        $updateArea = $conn->query("UPDATE wig set area_i = '$area1' where wig_id = '$wigId'");
        $area2 = $selectArea2['area'] * 25;
        $updateArea = $conn->query("UPDATE wig set area_ii = '$area2' where wig_id = '$wigId'");
        $area3 = $selectArea3['area'] * 25;
        $updateArea = $conn->query("UPDATE wig set area_iii = '$area3' where wig_id = '$wigId'");
        $area4 = $selectArea4['area'] * 25;
        $updateArea = $conn->query("UPDATE wig set area_iv = '$area4' where wig_id = '$wigId'");

        if($selDaysProgress->num_rows > 0){
                $updateDayProgress = $conn->query("UPDATE tasks_days set progress = '$totalProgress' where dates = '$today' and task_id = '$orderNo'");
                if($updateDayProgress){
                    echo "<script> alert('Update Successfully.');</script>";
                    echo "<script>window.location.href = 'index.php?manageTask</script>";
                }
        }else{
                $inQueryDays = "INSERT INTO tasks_days(dates, task_id, days_count, progress) VALUES('$today', '$orderNo', 0, '$totalProgress')";
                $inTaskDays = $conn->query($inQueryDays);
                if($inTaskDays){
                    echo "<script> alert('Update Successfully.');</script>";
                    echo "<script>window.location.href = 'index.php?manageTask</script>";
                }else{
                        echo "<script> alert('error');</script>";
                        echo $conn->error;
                }

        }
        
    }else{
        echo "<script> alert('Something is wrong, Please try again.');</script>";
    }
}
$selAllPending = "SELECT a.pic_status as picStatus,
                         b.first_name as firstName,
                         b.last_name as lastName,
                         c.name as wigModel,
                         d.name as batchName,
                         a.task_id as orderNo,
                         a.id as wigPicId,
                         a.area_no as areaNo,
                         a.picture_no as pictureNo,
                         a.picture as picture,
                         b.user_id as userId,
                         a.date_created as dateCreated
                        FROM wig_picture as a
                        join tasks as e on e.order_no = a.task_id
                        join users as b on b.user_id = e.user_id
                        join reference_code as c on c.ref_id = e.wig_model
                        join task_batch as d on d.batch_id = e.batch
                        where a.pic_status = 'Pending' order by a.date_created";
$getAllPending = $conn->query($selAllPending);


?>