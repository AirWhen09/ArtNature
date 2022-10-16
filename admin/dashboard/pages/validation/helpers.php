<?php 
date_default_timezone_set('Asia/Manila');
$today = date('F j, Y g:i:a');

$selAllTasks = $conn->query("SELECT * from tasks");

while($task = $selAllTasks->fetch_assoc()){
  $orderNo = $task['order_no'];
  if($task['process'] == 100){
      $update = $conn->query("UPDATE tasks set status = 'tstts3' where order_no = '$orderNo'");
    }elseif($task['user_id'] == '' || $task['user_id'] == NULL){
      $update = $conn->query("UPDATE tasks set status = 'tstts1' where order_no = '$orderNo'");
    }else{
      $update = $conn->query("UPDATE tasks set status = 'tstts2' where order_no = '$orderNo'");
    }
}


?>