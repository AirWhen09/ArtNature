<?php
session_start();

if($_SESSION['status'] === 'valid'){
    header("location: ../admin/dashboard/");
}

?>