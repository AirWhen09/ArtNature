<?php
if(isset($_GET['or'])){
    $orNo = $_GET['or'];
    $allHistory = "SELECT b.order_no as orderNumber,
                          b.date_created as dateCreated,
                          b.no_of_days as noOfDays,
                          b.start_date as startDate,
                          b.remarks as remarks,
                          b.description as descriptions,
                          b.user_id as userId,
                          c.name as batchName,
                          d.name as wigSize,
                          e.name as wigModel,
                          f.name as wigStatus
                    from tasks as b
                    join task_batch as c on b.batch = c.batch_id
                    join reference_code as d on b.wig_size = d.ref_id
                    join reference_code as e on b.wig_model = e.ref_id
                    join reference_code as f on b.status = f.ref_id 
                    where b.order_no = '$orNo'
                    ";
    $allHistorys = "SELECT a.date_created as historyDate,
                        a.image as wigImage,
                        a.area_no as areaNo,
                        a.progress as taskProgress,
                        b.order_no as orderNumber,
                        b.date_created as dateCreated,
                        c.name as batchName,
                        d.name as wigSize,
                        e.name as wigModel,
                        f.name as wigStatus
                    from task_progress_history as a
                    join tasks as b on a.task_id = b.order_no
                    join task_batch as c on b.batch = c.batch_id
                    join reference_code as d on b.wig_size = d.ref_id
                    join reference_code as e on b.wig_model = e.ref_id
                    join reference_code as f on b.status = f.ref_id 
                    where b.order_no = '$orNo' order by a.date_created ASC
                    ";
    $getHistory = $conn->query($allHistory)->fetch_assoc();
    $getHistorys = $conn->query($allHistorys);

    //get estimated progress
}

if(isset($_POST['reject'])){
    $rejectMsg = $_POST['rejectMsg'];
    $userId = $_POST['userId'];
    $or = $_POST['orderNo'];
    $inNotifAdmin = $conn->query("INSERT INTO notification(description, user_id, status) VALUES('$rejectMsg', '$userId', 0)");
    echo "<script> alert('Update Successfully.');</script>";
    echo "<script>window.location.href = 'index.php?taskHistory&or=$or'</script>";
}
    
?>