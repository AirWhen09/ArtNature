<?php
    if(isset($_POST['logout'])){
        session_start();
        session_unset();
        $_SESSION['status'] = 'invalid';
        header("location: ../../../index.php");
    }
?>