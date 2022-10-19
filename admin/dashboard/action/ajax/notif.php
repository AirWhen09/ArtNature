<?php
include '../../../../connection/connection.php';

if(isset($_POST['notifId'])){
    $id = $_POST['notifId'];
    $update = $conn->query("UPDATE notification set status = 1 where notif_id = '$id'");
    if($update){
        echo "ok";
    }
}

?>