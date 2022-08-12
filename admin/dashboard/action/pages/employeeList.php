<?php 
    // get all employee
    $allEmp = "SELECT *, b.name as userRole, c.name as userStatus from 
            users as a 
            join reference_code as b on a.user_role = b.ref_id 
            join reference_code as c on a.status = c.ref_id 
            where a.user_role NOT IN ('ur1')";
    $getEmp = $conn->query($allEmp);

    // get all driver
    $allEmpDriver = "SELECT *, b.name as userRole, c.name as userStatus from 
            users as a 
            join reference_code as b on a.user_role = b.ref_id 
            join reference_code as c on a.status = c.ref_id 
            where a.user_role = 'ur4'";
    $getEmpDriver = $conn->query($allEmpDriver);

    // get all on-site
    $allEmpOnSite = "SELECT *, b.name as userRole, c.name as userStatus from 
            users as a 
            join reference_code as b on a.user_role = b.ref_id 
            join reference_code as c on a.status = c.ref_id 
            where a.user_role = 'ur2'";
    $getEmpOnSite = $conn->query($allEmpOnSite);

    // get all work-from-home
    $allEmpWorkFromHome = "SELECT *, b.name as userRole, c.name as userStatus from 
            users as a 
            join reference_code as b on a.user_role = b.ref_id 
            join reference_code as c on a.status = c.ref_id 
            where a.user_role = 'ur3'";
    $getEmpWorkFromHome = $conn->query($allEmpWorkFromHome);
?>