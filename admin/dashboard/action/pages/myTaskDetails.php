<?php
if(isset($_GET['orderNo'])){
    $orderNo = mysqli_real_escape_string($conn, $_GET['orderNo']);
    $results = $conn->query("SELECT * from tasks where order_no = '$orderNo'");
    if($results->num_rows > 0){
        
        $result = $results->fetch_assoc();
        $wigId = $result['wig_id'];
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
    
    // echo "<script> alert('$areaNo , progress: $areaProgress')</script>";
   
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
                    
                    $addHistory4 = "INSERT INTO task_progress_history (image, task_id, progress, area_no) VALUES('$filepath4','$orderNo',0, '$areaNo')";
                    $newHistory4 = $conn->query($addHistory4);
                    if($newHistory4){
                            // $updateProcess = $conn->query("UPDATE tasks set process = '$totalProgress' where order_no = '$orderNo'");
                            // $updateArea = $conn->query("UPDATE wig set $areaNo = '$areaProgress', $areaPic = '$filepath4' where wig_id = '$wigNo'");
                            // $updateArea = $conn->query("UPDATE wig set $areaNo = '$filepath4' where wig_id = '$wigNo'");
                            $selWigPic = $conn->query("SELECT * from wig_picture where area_no = '$areaNo' and picture_no = '$areaPic' and pic_status = 'Pending' and task_id = '$orderNo'");
                            if($selWigPic->num_rows > 0){
                                $updateWigPic = $conn->query("UPDATE wig_picture set picture = '$filepath4' where area_no = '$areaNo' and picture_no = '$areaPic' and task_id = '$orderNo'");
                            }else{
                                $inWigPic = $conn->query("INSERT INTO wig_picture(picture, pic_status, area_no, picture_no, task_id) VALUES('$filepath4', 'Pending', '$areaNo', '$areaPic', '$orderNo')");
                            }
                            
                            
                    }else{
                        $ey = $conn->error;
                        echo $ey;
                            echo "<script> alert('aa $ey')</script>";
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
$area1Pic1 = '';
$area1Pic2 = '';
$area1Pic3 = '';
$area1Pic4 = '';
$area2Pic1 = '';
$area2Pic2 = '';
$area2Pic3 = '';
$area2Pic4 = '';
$area3Pic1 = '';
$area3Pic2 = '';
$area3Pic3 = '';
$area3Pic4 = '';
$area4Pic1 = '';
$area4Pic2 = '';
$area4Pic3 = '';
$area4Pic4 = '';
$area1Pic1Status = '';
$area1Pic2Status = '';
$area1Pic3Status = '';
$area1Pic4Status = '';
$area2Pic1Status = '';
$area2Pic2Status = '';
$area2Pic3Status = '';
$area2Pic4Status = '';
$area3Pic1Status = '';
$area3Pic2Status = '';
$area3Pic3Status = '';
$area3Pic4Status = '';
$area4Pic1Status = '';
$area4Pic2Status = '';
$area4Pic3Status = '';
$area4Pic4Status = '';
$area1 = 0;
$area2 = 0;
$area3 = 0;
$area4 = 0;
$totalProgreess = 0;
$getArea = $conn->query("SELECT * from wig_picture where task_id = '$orderNo'");
if($getArea->num_rows > 0){
while($getData = $getArea->fetch_assoc()){
    if($getData['area_no'] == 'area_i'){
        if($getData['picture_no'] == 'area_i_pic_one'){
            $area1Pic1 = $getData['picture'];
            $area1Pic1Status = $getData['pic_status'];
            if($getData['pic_status'] == 'Approved'){
                $area1 += 25;
                $totalProgreess += 6.25;
            }
        }

        if($getData['picture_no'] == 'area_i_pic_two'){
            $area1Pic2 = $getData['picture'];
            $area1Pic2Status = $getData['pic_status'];
            if($getData['pic_status'] == 'Approved'){
                $area1 += 25;
                $totalProgreess += 6.25;
            }
        }

        if($getData['picture_no'] == 'area_i_pic_three'){
            $area1Pic3 = $getData['picture'];
            $area1Pic3Status = $getData['pic_status'];
            if($getData['pic_status'] == 'Approved'){
                $area1 += 25;
                $totalProgreess += 6.25;
            }
        }

        if($getData['picture_no'] == 'area_i_pic_four'){
            $area1Pic4 = $getData['picture'];
            $area1Pic4Status = $getData['pic_status'];
            if($getData['pic_status'] == 'Approved'){
                $area1 += 25;
                $totalProgreess += 6.25;
            }
        }

    }
    if($getData['area_no'] == 'area_ii'){
        if($getData['picture_no'] == 'area_ii_pic_one'){
            $area2Pic1 = $getData['picture'];
            $area2Pic1Status = $getData['pic_status'];
            if($getData['pic_status'] == 'Approved'){
                $area2 += 25;
                $totalProgreess += 6.25;
            }
        }

        if($getData['picture_no'] == 'area_ii_pic_two'){
            $area2Pic2 = $getData['picture'];
            $area2Pic2Status = $getData['pic_status'];
            if($getData['pic_status'] == 'Approved'){
                $area2 += 25;
                $totalProgreess += 6.25;
            }
        }

        if($getData['picture_no'] == 'area_ii_pic_three'){
            $area2Pic3 = $getData['picture'];
            $area2Pic3Status = $getData['pic_status'];
            if($getData['pic_status'] == 'Approved'){
                $area2 += 25;
                $totalProgreess += 6.25;
            }
        }

        if($getData['picture_no'] == 'area_ii_pic_four'){
            $area2Pic4 = $getData['picture'];
            $area2Pic4Status = $getData['pic_status'];
            if($getData['pic_status'] == 'Approved'){
                $area2 += 25;
                $totalProgreess += 6.25;
            }
        }
    }
    if($getData['area_no'] == 'area_iii'){
        if($getData['picture_no'] == 'area_iii_pic_one'){
            $area3Pic1 = $getData['picture'];
            $area3Pic1Status = $getData['pic_status']; 
            if($getData['pic_status'] == 'Approved'){
                $area3 += 25;
                $totalProgreess += 6.25;
            }
        }

        if($getData['picture_no'] == 'area_iii_pic_two'){
            $area3Pic2 = $getData['picture'];
            $area3Pic2Status = $getData['pic_status']; 
            if($getData['pic_status'] == 'Approved'){
                $area3 += 25;
                $totalProgreess += 6.25;
            }
        }

        if($getData['picture_no'] == 'area_iii_pic_three'){
            $area3Pic3 = $getData['picture'];
            $area3Pic3Status = $getData['pic_status']; 
            if($getData['pic_status'] == 'Approved'){
                $area3 += 25;
                $totalProgreess += 6.25;
            }
        }

        if($getData['picture_no'] == 'area_iii_pic_four'){
            $area3Pic4 = $getData['picture'];
            $area3Pic4Status = $getData['pic_status']; 
            if($getData['pic_status'] == 'Approved'){
                $area3 += 25;
                $totalProgreess += 6.25;
            }
        }
    }
    if($getData['area_no'] == 'area_iv'){
        if($getData['picture_no'] == 'area_iv_pic_one'){
            $area4Pic1 = $getData['picture'];
            $area4Pic1Status = $getData['pic_status']; 
            if($getData['pic_status'] == 'Approved'){
                $area4 += 25;
                $totalProgreess += 6.25;
            }
        }

        if($getData['picture_no'] == 'area_iv_pic_two'){
            $area4Pic2 = $getData['picture'];
            $area4Pic2Status = $getData['pic_status']; 
            if($getData['pic_status'] == 'Approved'){
                $area4 += 25;
                $totalProgreess += 6.25;
            }
        }

        if($getData['picture_no'] == 'area_iv_pic_three'){
            $area4Pic3 = $getData['picture'];
            $area4Pic3Status = $getData['pic_status']; 
            if($getData['pic_status'] == 'Approved'){
                $area4 += 25;
                $totalProgreess += 6.25;
            }
        }

        if($getData['picture_no'] == 'area_iv_pic_four'){
            $area4Pic4 = $getData['picture'];
            $area4Pic4Status = $getData['pic_status']; 
            if($getData['pic_status'] == 'Approved'){
                $area4 += 25;
                $totalProgreess += 6.25;
            }
        }
    }
}
}

?>