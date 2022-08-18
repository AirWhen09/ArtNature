<?php
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
                where a.status in ('tstts2')
                ";
    $getTask = $conn->query($allTask);

    //get all batch
    $allBatch = "SELECT * from task_batch";
    $getBatch = $conn->query($allBatch);

    //get total Ave
    $aveProcess = "SELECT FORMAT(AVG(a.process), 2) as totalAve from tasks as a where a.status  != 'tstts4'";
    $getAve = $conn->query($aveProcess)->fetch_assoc();
?>