<?php
if(isset($_GET['status'])){
    $orderNo = mysqli_real_escape_string($conn, $_GET['status']);
    $resultss = "SELECT *, b.name as taskStatus , 
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
                where a.status = '$orderNo' order by a.date_created DESC";
    $results = $conn->query($resultss);
    if($results->num_rows > 0){
    }else{
        echo "<script> alert('No record found');</script>";
        echo "<script>window.location.href = 'index.php?performance'</script>";
    }

    $generateReport = "<button class='ms-auto btn btn-primary' data-bs-toggle='modal' data-bs-target='#generateRep'>Generate Report <i class='las la-signal ms-3 scale5'></i></button>";
}else{
    $resultss = "SELECT *, b.name as taskStatus , 
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
                where a.status in('tstts5', 'tstts6', 'tstts7', 'tstts8') order by a.date_created DESC";
    $generateReport = '<span></span>';
}

$results = $conn->query($resultss);

//get task overview
$lapsed = "SELECT count(*) as arc from tasks where status = 'tstts5'";
$damage = "SELECT count(*) as new from tasks where status = 'tstts6'";
$onTime = "SELECT count(*) as done from tasks where status = 'tstts7'";
$early = "SELECT count(*) as production from tasks where status = 'tstts8'";

$getArchive = $conn->query($lapsed)->fetch_assoc();
$getNew = $conn->query($damage)->fetch_assoc();
$getDone = $conn->query($onTime)->fetch_assoc();
$getProduction = $conn->query($early)->fetch_assoc();

if($getArchive && $getNew && $getDone && $getProduction){
    $taskOverview = '['.$getArchive['arc'].','.$getNew['new'].','.$getDone['done'].','.$getProduction['production'].']';
}else{
    $taskOverview = "0,0,0,0";
}

?>