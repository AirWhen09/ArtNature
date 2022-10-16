<?php 
date_default_timezone_set('Asia/Manila');
$todayWithTime = date('Y-m-d g:i:a');
$today = date('Y-m-d');

$selAllTasks = $conn->query("SELECT * from tasks");
$selAllTasks2 = $conn->query("SELECT * from tasks");


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

while($notif = $selAllTasks2->fetch_assoc()){
  $noOfDays = $notif['no_of_days'];

  $percent = 100/$noOfDays;
  $startDate = $notif['start_date'];
  $progress = 0;
  $dates = date('Y-m-d', strtotime($startDate));
  if($dates <= $today){

    $i = 0;
    while($i < $noOfDays){
      $progress += $percent;
      $addDate = date('Y-m-d', strtotime($startDate. ' + '.$i.' day'));
      $i++;
      if($addDate <= $today){
        if(time() >= strtotime("17:00:00") || time() >= strtotime("17:30:00")){
          if($progress > $notif['process']){
            // Query here for the notification
            $userId = $notif['user_id'];
            $selUser = $conn->query("SELECT * from users where user_id = '$userId'")->fetch_assoc();
            $userName = $selUser['first_name'].' '.$selUser['last_name'];
            $forAdmin = "$userName FAILED TO MEET THE EXPECTED PROCESS ON DAY $i";
            $forEmployee = "HI $userName YOU FAIL TO MEET THE EXPECTED PROCESS ON DAY $i";

            $inNotifAdmin = $conn->query("INSERT INTO notification(description, user_id, status) VALUES('$forAdmin', 2, 0)");
            $inNotifEmployee = $conn->query("INSERT INTO notification(description, user_id, status) VALUES('$forEmployee', '$userId', 0)");

          }
        }
      }
    }
  }
}

echo $todayWithTime;


?>