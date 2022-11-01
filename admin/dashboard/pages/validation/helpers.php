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
    }elseif($task['user_id'] == '' || $task['user_id'] == NULL){
      $update = $conn->query("UPDATE tasks set status = 'tstts1' where order_no = '$orderNo'");
    }elseif($task['status'] != 'tstts5' && $task['status'] != 'tstts1' && $task['process'] > 0 && $task['process'] < 100){
      $update = $conn->query("UPDATE tasks set status = 'tstts2' where order_no = '$orderNo'");
    }
}

// send notification to employee and admin
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

// check for lapsed task
while($lapsed = $selAllTasks3->fetch_assoc()){
  $orderNo = $lapsed['order_no'];
  $endDate = $lapsed['end_date'];
  $progress = $lapsed['process'];
  $userId = $lapsed['user_id'];
  $selUser = $conn->query("SELECT * from users where user_id = '$userId'")->fetch_assoc();
  $userName = $selUser['first_name'].' '.$selUser['last_name'];
  $forAdmin = "$userName LAPSED $orderNo";
  $forEmployee = "HI $userName LAPSED $orderNo";

  $dates = date('Y-m-d', strtotime($endDate));
  if($today > $endDate && $progress < 100){
    $upLapsedTask = $conn->query("UPDATE tasks set status = 'tstts5' where order_no = '$orderNo' and status != 'tstts1'");
    if(time() >= strtotime("17:00:00") && time() <= strtotime("17:30:00")){
      $inNotifAdmin = $conn->query("INSERT INTO notification(description, user_id, status) VALUES('$forAdmin', 2, 0)");
      $inNotifEmployee = $conn->query("INSERT INTO notification(description, user_id, status) VALUES('$forEmployee', '$userId', 0)");
    }
  }
}

//check task batch
while($taskBatch = $selAllTaskBatch->fetch_assoc()){
  $orderNo = $taskBatch['batch_id'];
  if($taskBatch['progress'] == 100){
    $update = $conn->query("UPDATE tasks set status = 'bstts3' where batch_id = '$orderNo'");
  }elseif($taskBatch['status'] != 'bstts5' && $taskBatch['progress'] > 0 && $taskBatch['progress'] < 100){
    $update = $conn->query("UPDATE tasks set status = 'bstts2' where batch_id = '$orderNo'");
  }
}

    $selWig = $conn->query("SELECT * from wig where wig_id = '$wigNo'")->fetch_assoc();
    $area1Pic1 = ($selWig['area_i_pic_one'] != NULL || $selWig['area_i_pic_one'] == '') ? 25 : 0;
    $area2Pic1 = ($selWig['area_ii_pic_one'] != NULL || $selWig['area_ii_pic_one'] == '') ? 25 : 0;
    $area3Pic1 = ($selWig['area_iii_pic_one'] != NULL || $selWig['area_iii_pic_one'] == '') ? 25 : 0;
    $area4Pic1 = ($selWig['area_iv_pic_one'] != NULL || $selWig['area_iv_pic_one'] == '') ? 25 : 0;
    $area1Pic2 = ($selWig['area_i_pic_two'] != NULL || $selWig['area_i_pic_two'] == '') ? 25 : 0;
    $area2Pic2 = ($selWig['area_ii_pic_two'] != NULL || $selWig['area_ii_pic_one'] == '') ? 25 : 0;
    $area3Pic2 = ($selWig['area_iii_pic_two'] != NULL || $selWig['area_iii_pic_one'] == '') ? 25 : 0;
    $area4Pic2 = ($selWig['area_iv_pic_two'] != NULL || $selWig['area_iv_pic_one'] == '') ? 25 : 0;
    $area1Pic3 = ($selWig['area_i_pic_three'] != NULL || $selWig['area_i_pic_three'] == '') ? 25 : 0;
    $area2Pic3 = ($selWig['area_ii_pic_three'] != NULL || $selWig['area_ii_pic_one'] == '') ? 25 : 0;
    $area3Pic3 = ($selWig['area_iii_pic_three'] != NULL || $selWig['area_iii_pic_one'] == '') ? 25 : 0;
    $area4Pic3 = ($selWig['area_iv_pic_three'] != NULL || $selWig['area_iv_pic_one'] == '') ? 25 : 0;
    $area1Pic4 = ($selWig['area_i_pic_four'] != NULL || $selWig['area_i_pic_four'] == '') ? 25 : 0;
    $area2Pic4 = ($selWig['area_ii_pic_four'] != NULL || $selWig['area_ii_pic_one'] == '') ? 25 : 0;
    $area3Pic4 = ($selWig['area_iii_pic_four'] != NULL || $selWig['area_iii_pic_one'] == '') ? 25 : 0;
    $area4Pic4 = ($selWig['area_iv_pic_four'] != NULL || $selWig['area_iv_pic_one'] == '') ? 25 : 0;
    $areaProgress = 0;
    if($areaNo == 'area_i'){
        $areaProgress = ($area1Pic1 + $area1Pic2 + $area1Pic3 + $area1Pic4) / 4;
    }elseif($areaNo == 'area_ii'){
        $areaProgress = ($area2Pic1 + $area2Pic2 + $area2Pic3 + $area2Pic4) / 4;
    }elseif($areaNo == 'area_iii'){
        $areaProgress = ($area3Pic1 + $area3Pic2 + $area3Pic3 + $area3Pic4) / 4;
    }elseif($areaNo == 'area_iv'){
        $areaProgress = ($area4Pic1 + $area4Pic2 + $area4Pic3 + $area4Pic4) / 4;
    }
    $totalProgress = ($area1Pic1 + $area2Pic1 + $area3Pic1 + $area4Pic1 + $area1Pic2 + $area2Pic2 + $area3Pic2 + $area4Pic2 + 
                        $area1Pic3 + $area2Pic3 + $area3Pic3 + $area4Pic3 + $area1Pic4 + $area2Pic4 + $area3Pic4 + $area4Pic4) / 16;
    

?>