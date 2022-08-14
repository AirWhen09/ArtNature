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

    if(isset($_POST['myTask'])){
        $process = $_POST['process'];
        $orderNo = $_POST['orderNo'];
        $sql = "UPDATE tasks set process = '$process' where order_no = '$orderNo'";
        $updateTask = $conn->query($sql);
        if($updateTask){
            echo "<script>window.location.href = 'index.php?manageTask'</script>";
        }
    }
?>