<?php 
    // get all employee
    $allEmp = "SELECT *, b.name as userRole, c.name as userStatus, a.user_id as userID from 
            users as a 
            join reference_code as b on a.user_role = b.ref_id 
            join reference_code as c on a.status = c.ref_id 
            where a.user_role NOT IN ('ur1') and a.status != 'ustts4'";
    $getEmp = $conn->query($allEmp);

    // get all driver
    $allEmpDriver = "SELECT *, b.name as userRole, c.name as userStatus, a.user_id as userID from 
            users as a 
            join reference_code as b on a.user_role = b.ref_id 
            join reference_code as c on a.status = c.ref_id 
            where a.user_role = 'ur4' and a.status != 'ustts4'";
    $getEmpDriver = $conn->query($allEmpDriver);

    // get all on-site
    $allEmpOnSite = "SELECT *, b.name as userRole, c.name as userStatus, a.user_id as userID from 
            users as a 
            join reference_code as b on a.user_role = b.ref_id 
            join reference_code as c on a.status = c.ref_id 
            where a.user_role = 'ur2' and a.status != 'ustts4'";
    $getEmpOnSite = $conn->query($allEmpOnSite);

    // get all work-from-home
    $allEmpWorkFromHome = "SELECT *, b.name as userRole, c.name as userStatus, a.user_id as userID from 
            users as a 
            join reference_code as b on a.user_role = b.ref_id 
            join reference_code as c on a.status = c.ref_id 
            where a.user_role = 'ur3' and a.status != 'ustts4'";
    $getEmpWorkFromHome = $conn->query($allEmpWorkFromHome);
    
    //archive employee
    if(isset($_POST['empArchive'])){
        $empId = $_POST['empId'];
        $archiveEmp = $conn->query("UPDATE users set status = 'ustts4' where user_id = '$empId'");
        if($archiveEmp){
                echo "<script>
                Swal.fire('Any fool can use a computer');
                
                </script>";
                echo "<script>window.location.href = 'index.php?employeeList'</script>";

        }
    }

    //update employee
    if(isset($_POST['updateEmp'])){
        $empId = $_POST['empId'];
        $empStatus = $_POST['empStatus'];
        $empUserRole = $_POST['empUserRole'];
        $archiveEmp = $conn->query("UPDATE users set status = '$empStatus', user_role = '$empUserRole' where user_id = '$empId'");
        if($archiveEmp){
                echo "<script>
                swal({
                        title: 'Verified!',
                        text: 'Successfully Login',
                        icon: 'success',
                        timer: 3000,
                        buttons: false,
                    })
                
                </script>";
                echo "<script>window.location.href = 'index.php?employeeList'</script>";

        }
    }
?>