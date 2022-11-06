<?php 
date_default_timezone_set('Asia/Manila');
$todayWithTime = date('Y-m-d g:i:a');
$today = date('Y-m-d');

$selAllTasks = $conn->query("SELECT * from tasks");
$selAllTasks2 = $conn->query("SELECT * from tasks");
$selAllTasks3 = $conn->query("SELECT * from tasks");
$selAllTaskBatch = $conn->query("SELECT * from task_batch");

// update status
while($task = $selAllTasks->fetch_assoc()){
  $orderNo = $task['order_no'];
  if($task['process'] == 100){
      $update = $conn->query("UPDATE tasks set status = 'tstts3' where order_no = '$orderNo'");
    }elseif($task['user_id'] == '' || $task['user_id'] == NULL && $task['status'] != 'tstts4'){
      $update = $conn->query("UPDATE tasks set status = 'tstts1' where order_no = '$orderNo'");
    }elseif($task['status'] != 'tstts5' && $task['status'] != 'tstts1' && $task['status'] != 'tstts4' && $task['process'] > 0 && $task['process'] < 100){
      $update = $conn->query("UPDATE tasks set status = 'tstts2' where order_no = '$orderNo'");
    }
}

// send notification to employee and admin
while($notif = $selAllTasks2->fetch_assoc()){
  $noOfDays = $notif['no_of_days'];
  if($noOfDays != NULL || $noOfDays != ""){

    $percent = 100/$noOfDays;
    $startDate = $notif['start_date'];
    $progress = 0;
    $dates = date('Y-m-d', strtotime($startDate));
    if($dates <= $today){

      $i = 0;
      while($i < $noOfDays){
        $progress += $percent;
        $addDate = date('Y-m-d', strtotime($startDate. ' + '.$i.' day'));
        $remaining = $noOfDays - $i;
        $i++;
        if($addDate <= $today){
          if(time() >= strtotime("20:00:00") && time() <= strtotime("20:30:00")){
            if($progress > $notif['process']){
              // Query here for the notification
              $userId = $notif['user_id'];
              $selUser = $conn->query("SELECT * from users where user_id = '$userId'")->fetch_assoc();
              $userName = $selUser['first_name'].' '.$selUser['last_name'];
              $forAdmin = "$userName FAILED TO MEET THE EXPECTED PROCESS ON DAY $i";
              $forEmployee = "The system detected that you didn't meet the expected percentage of task progress this $i. Please allow extra time to finish the task. You have only <b>$remaining</b> days remaining. Thank you!";

              $inNotifAdmin = $conn->query("INSERT INTO notification(description, user_id, status) VALUES('$forAdmin', 2, 0)");
              $inNotifEmployee = $conn->query("INSERT INTO notification(description, user_id, status) VALUES('$forEmployee', '$userId', 0)");

            }
          }

          if($today == $addDate){

          }
        }
      }
    }
  }
}

// check for lapsed task
while($lapsed = $selAllTasks3->fetch_assoc()){
  $orderNo = $lapsed['order_no'];
  $endDate = $lapsed['end_date'];
  $progress = $lapsed['process'];
  $userId = $lapsed['user_id'];
  if($userId != NULL || $userId != ""){
    
    $selUser = $conn->query("SELECT * from users where user_id = '$userId'")->fetch_assoc();
    $userName = $selUser['first_name'].' '.$selUser['last_name'];
    $forAdmin = "$userName LAPSED $orderNo";
    $forEmployee = "HI $userName LAPSED $orderNo";

    $dates = date('Y-m-d', strtotime($endDate));
    if($today > $dates && $progress < 100){
      $upLapsedTask = $conn->query("UPDATE tasks set status = 'tstts5' where order_no = '$orderNo' and status != 'tstts1' and status != 'tstts4'");
      if($isLoginUserId === $userId){

        ?>
          <script>

              document.addEventListener('DOMContentLoaded', (event) => {    
                  document.getElementById("showNotif").click();
                });

          </script>
        <?php
      }
    }
  }
}

//check task batch
while($taskBatch = $selAllTaskBatch->fetch_assoc()){
  $orderNo = $taskBatch['batch_id'];
  if($taskBatch['progress'] == 100 && $taskBatch['status'] != 'bstts5'){
    $update = $conn->query("UPDATE tasks set status = 'bstts3' where batch_id = '$orderNo'");
  }elseif($taskBatch['status'] != 'bstts5' && $taskBatch['progress'] > 0 && $taskBatch['progress'] < 100){
    $update = $conn->query("UPDATE tasks set status = 'bstts2' where batch_id = '$orderNo'");
  }
}


?>
<!-- Button trigger modal -->
<button type="button" class="d-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="showNotif">
  
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">WARNING!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h1>YOU DIDNT FINISH THE TASK THAT THE ADMIN ASSIGNED TO YOU ON THE EXPECTED DAY, PLEASE CONTACT THE ADMIN</h1>
      </div>
    </div>
  </div>
</div>



