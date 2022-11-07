<?php
if(isset($_GET['orderNo'])){
    $orderNo = mysqli_real_escape_string($conn, $_GET['orderNo']);
    $results = $conn->query("SELECT * from tasks where order_no = '$orderNo'");
    if($results->num_rows > 0){
        $result = $results->fetch_assoc();
    }else{
        echo "<script> alert('Order number not found');</script>";
        echo "<script>window.location.href = 'index.php?myTask'</script>";
    }
}

if(isset($_POST['updateImg'])){
    $areaPic = $_POST['areaPic'];
    $areaNo = $_POST['areaNo'];
    $wigNo = $_POST['wigId'];
    $selWig = $conn->query("SELECT * from wig where wig_id = '$wigNo'")->fetch_assoc();
    $area1Pic1 = ($selWig['area_i_pic_one'] != NULL || $selWig['area_i_pic_one'] != '') ? 100 : 0;
    $area2Pic1 = ($selWig['area_ii_pic_one'] != NULL || $selWig['area_ii_pic_one'] != '') ? 100 : 0;
    $area3Pic1 = ($selWig['area_iii_pic_one'] != NULL || $selWig['area_iii_pic_one'] != '') ? 100 : 0;
    $area4Pic1 = ($selWig['area_iv_pic_one'] != NULL || $selWig['area_iv_pic_one'] != '') ? 100 : 0;
    $area1Pic2 = ($selWig['area_i_pic_two'] != NULL || $selWig['area_i_pic_two'] != '') ? 100 : 0;
    $area2Pic2 = ($selWig['area_ii_pic_two'] != NULL || $selWig['area_ii_pic_two'] != '') ? 100 : 0;
    $area3Pic2 = ($selWig['area_iii_pic_two'] != NULL || $selWig['area_iii_pic_two'] != '') ? 100 : 0;
    $area4Pic2 = ($selWig['area_iv_pic_two'] != NULL || $selWig['area_iv_pic_two'] != '') ? 100 : 0;
    $area1Pic3 = ($selWig['area_i_pic_three'] != NULL || $selWig['area_i_pic_three'] != '') ? 100 : 0;
    $area2Pic3 = ($selWig['area_ii_pic_three'] != NULL || $selWig['area_ii_pic_three'] != '') ? 100 : 0;
    $area3Pic3 = ($selWig['area_iii_pic_three'] != NULL || $selWig['area_iii_pic_three'] != '') ? 100 : 0;
    $area4Pic3 = ($selWig['area_iv_pic_three'] != NULL || $selWig['area_iv_pic_three'] != '') ? 100 : 0;
    $area1Pic4 = ($selWig['area_i_pic_four'] != NULL || $selWig['area_i_pic_four'] != '') ? 100 : 0;
    $area2Pic4 = ($selWig['area_ii_pic_four'] != NULL || $selWig['area_ii_pic_four'] != '') ? 100 : 0;
    $area3Pic4 = ($selWig['area_iii_pic_four'] != NULL || $selWig['area_iii_pic_four'] != '') ? 100 : 0;
    $area4Pic4 = ($selWig['area_iv_pic_four'] != NULL || $selWig['area_iv_pic_four'] != '') ? 100 : 0;
    $areaProgress = 0;
    if($areaNo == 'area_i'){
        $areaProgress = ($area1Pic1 + $area1Pic2 + $area1Pic3 + $area1Pic4) / 4;
        if($areaProgress != 100) $areaProgress += 25;
    }elseif($areaNo == 'area_ii'){
        $areaProgress = ($area2Pic1 + $area2Pic2 + $area2Pic3 + $area2Pic4) / 4;
        if($areaProgress != 100) $areaProgress += 25;
    }elseif($areaNo == 'area_iii'){
        $areaProgress = ($area3Pic1 + $area3Pic2 + $area3Pic3 + $area3Pic4) / 4;
        if($areaProgress != 100) $areaProgress += 25;
    }elseif($areaNo == 'area_iv'){
        $areaProgress = ($area4Pic1 + $area4Pic2 + $area4Pic3 + $area4Pic4) / 4;
        if($areaProgress != 100) $areaProgress += 25;
    }
    // echo "<script> alert('$areaNo , progress: $areaProgress')</script>";
    
    $totalProgress = ($area1Pic1 + $area2Pic1 + $area3Pic1 + $area4Pic1 + $area1Pic2 + $area2Pic2 + $area3Pic2 + $area4Pic2 + 
                        $area1Pic3 + $area2Pic3 + $area3Pic3 + $area4Pic3 + $area1Pic4 + $area2Pic4 + $area3Pic4 + $area4Pic4) / 16;
    if($totalProgress != 100) $totalProgress += 6.25;
    $filetemp4 = $_FILES['img']['tmp_name'];
    $filename4 = $_FILES['img']['name'];
    $filetype4 = $_FILES['img']['type'];
    $filepath4 = "img/history/".$filename4;
    $filepaths4 = "../../img/history/".$filename4;
    $imageType4 = array("image/jpeg", "image/png", "image/gif", "image/tiff");
    if (!in_array( $filetype4, $imageType4)) { //check if image only
            echo "<script> alert('4Image Only (.jpeg, .png, .gif, .tif)')</script>";
    }else{
            if(move_uploaded_file($filetemp4, $filepaths4)){ //upload image
                    
                    $addHistory4 = "INSERT INTO task_progress_history (image, task_id, progress, area_no) VALUES('$filepath4','$orderNo','$areaProgress', '$areaNo')";
                    $newHistory4 = $conn->query($addHistory4);
                    if($newHistory4){
                            $updateProcess = $conn->query("UPDATE tasks set process = '$totalProgress' where order_no = '$orderNo'");
                            $updateArea = $conn->query("UPDATE wig set $areaNo = '$areaProgress', $areaPic = '$filepath4' where wig_id = '$wigNo'");
                            if($updateArea){
                                date_default_timezone_set('Asia/Manila');
                                $today = date('Y-m-d');
                                $selDaysProgress = $conn->query("SELECT * from tasks_days where task_id = '$orderNo' and dates = '$today'");
                                if($selDaysProgress->num_rows > 0){
                                        $updateDayProgress = $conn->query("UPDATE tasks_days set progress = '$totalProgress' where dates = '$today' and task_id = '$orderNo'");
                                        if($updateDayProgress){
                                            echo "<script>window.location.href = 'index.php?taskDetail&orderNo=$orderNo'</script>";
                                        }
                                }else{
                                        $inQueryDays = "INSERT INTO tasks_days(dates, task_id, days_count, progress) VALUES('$today', '$orderNo', 0, '$totalProgress')";
                                        $inTaskDays = $conn->query($inQueryDays);
                                        if($inTaskDays){
                                            echo "<script>window.location.href = 'index.php?taskDetail&orderNo=$orderNo'</script>";
                                        }else{
                                                echo "<script> alert('error');</script>";
                                                echo $conn->error;
                                        }

                                }
                            }else{
                                echo "<script> alert('error update wig');</script>";
                                echo $conn->error;
                            }
                            
                    }else{
                        $ey = $conn->error;
                        echo $ey;
                            echo "<script> alert('$ey')</script>";
                    }
            }else{
                    echo "<script> alert('Image Cant Upload 4');</script>";
            }
    }
}

date_default_timezone_set('Asia/Manila');
$days = [];
$today = date('Y-m-d');
$noOfDays = $result['no_of_days'];
$startDate = $result['start_date'];
$estimatedProgress = '';
$i = 0;
while($i < $noOfDays){
    array_push($days, date('Y-m-d', strtotime($startDate. ' + '.$i.' day')));
    $i++;
}

if($today < $days[0]){
    $estimatedProgress = 0;
}elseif($today > $days[$noOfDays - 1]){
    $estimatedProgress = 100;
}else{
    if(in_array($today, $days)){
        $k = array_search($today, $days);
        $progressToday = (100 / $noOfDays) * ($k + 1);
        $estimatedProgress = number_format($progressToday, 0);
    }else{
        $estimatedProgress = "something else";
    }
}
$wigId = $result['wig_id'];
$getArea = $conn->query("SELECT * from wig where wig_id = '$wigId'")->fetch_assoc();

$area1 = $getArea['area_i'];
$area2 = $getArea['area_ii'];
$area3 = $getArea['area_iii'];
$area4 = $getArea['area_iv'];
$area1Pic1 = $getArea['area_i_pic_one'];
$area2Pic1 = $getArea['area_ii_pic_one'];
$area3Pic1 = $getArea['area_iii_pic_one'];
$area4Pic1 = $getArea['area_iv_pic_one'];
$area1Pic2 = $getArea['area_i_pic_two'];
$area2Pic2 = $getArea['area_ii_pic_two'];
$area3Pic2 = $getArea['area_iii_pic_two'];
$area4Pic2 = $getArea['area_iv_pic_two'];
$area1Pic3 = $getArea['area_i_pic_three'];
$area2Pic3 = $getArea['area_ii_pic_three'];
$area3Pic3 = $getArea['area_iii_pic_three'];
$area4Pic3 = $getArea['area_iv_pic_three'];
$area1Pic4 = $getArea['area_i_pic_four'];
$area2Pic4 = $getArea['area_ii_pic_four'];
$area3Pic4 = $getArea['area_iii_pic_four'];
$area4Pic4 = $getArea['area_iv_pic_four'];


?>