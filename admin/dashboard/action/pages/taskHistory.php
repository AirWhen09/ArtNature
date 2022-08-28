<?php
if(isset($_GET['or'])){
    $orNo = $_GET['or'];
    $allHistory = "SELECT b.order_no as orderNumber,
                          b.date_created as dateCreated,
                          b.no_of_days as noOfDays,
                          b.start_date as startDate,
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
    
?>