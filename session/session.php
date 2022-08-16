<?php
session_start();

if(isset($_SESSION['status'])){
    if($_SESSION['status'] === 'valid'){
        header("location: admin/dashboard/index.php?dashboard");
    }
}

?>