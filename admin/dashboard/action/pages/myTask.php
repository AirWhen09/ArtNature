<?php
 //get all task
 $allTask = "SELECT *, b.name as taskStatus , 
                        c.first_name as firstName, 
                        c.last_name as lastName,
                        c.image as imagePath,
                        e.name as wigModel,
                        f.name as wigSize,
                        g.name as userRole
        from tasks as a
        left join reference_code as b on a.status = b.ref_id
        left join users as c on a.user_id = c.user_id
        left join reference_code as e on a.wig_model = e.ref_id
        left join reference_code as f on a.wig_size = f.ref_id
        left join reference_code as g on c.user_role = g.ref_id
        where a.user_id = '$isLoginUserId'";
$getTask = $conn->query($allTask);


//get all new task
$allNewTask = "SELECT *, b.name as taskStatus , 
                        c.first_name as firstName, 
                        c.last_name as lastName,
                        c.image as imagePath,
                        e.name as wigModel,
                        f.name as wigSize,
                        g.name as userRole
                from tasks as a
                left join reference_code as b on a.status = b.ref_id
                left join users as c on a.user_id = c.user_id
                left join reference_code as e on a.wig_model = e.ref_id
                left join reference_code as f on a.wig_size = f.ref_id
                left join reference_code as g on c.user_role = g.ref_id
                where a.user_id = '$isLoginUserId' and a.status = 'tstts2'";
$getAllNewTask = $conn->query($allNewTask);

//get all done task
$allDoneTask = "SELECT *, b.name as taskStatus , 
                        c.first_name as firstName, 
                        c.last_name as lastName,
                        c.image as imagePath,
                        e.name as wigModel,
                        f.name as wigSize,
                        g.name as userRole
                from tasks as a
                left join reference_code as b on a.status = b.ref_id
                left join users as c on a.user_id = c.user_id
                left join reference_code as e on a.wig_model = e.ref_id
                left join reference_code as f on a.wig_size = f.ref_id
                left join reference_code as g on c.user_role = g.ref_id
                where a.user_id = '$isLoginUserId' and a.status = 'tstts3'";
$getAllDoneTask = $conn->query($allDoneTask);

if(isset($_POST['myTask'])){
	$area1 = $_POST['area1'];
	$area2 = $_POST['area2'];
	$area3 = $_POST['area3'];
	$area4 = $_POST['area4'];

        $wigId = $_POST['wigId'];

	$orderNo = $_POST['orderNo'];

                $filetemp1 = $_FILES['image1']['tmp_name'];
                if($filetemp1){
                        $filename1 = $_FILES['image1']['name'];
                        $filetype1 = $_FILES['image1']['type'];
                        $filepath1 = "img/history/".$filename1;
                        $filepaths1 = "../../img/history/".$filename1;

                        $imageType = array("image/jpeg", "image/png", "image/gif", "image/tiff");
                        if (!in_array( $filetype1, $imageType)) { //check if image only
                                echo "<script> alert('1Image Only (.jpeg, .png, .gif, .tif)')</script>";
                        }else{

                                if(move_uploaded_file($filetemp1, $filepaths1)){ //upload image
                                        
                                        $addHistory = "INSERT INTO task_progress_history (image, task_id, progress, area_no) VALUES('$filepath1','$orderNo','$area1', 1)";
                                        $newHistory = $conn->query($addHistory);
                                        if($newHistory){
                                                $updateArea = $conn->query("UPDATE wig set area_i = '$area1', area_i_pic = '$filepath1' where wig_id = '$wigId'");
                                        }else{
                                                echo "<script> alert('Image Cant update area 1')</script>";
                                                echo "<script> alert('$conn->error')</script>";

                                        }
                                }else{
                                        echo "<script> alert('Image Cant Upload 1');</script>";
                                }
                        }
                }

                $filetemp2 = $_FILES['image2']['tmp_name'];
                if($filetemp2){
                        $filename2 = $_FILES['image2']['name'];
                        $filetype2 = $_FILES['image2']['type'];
                        $filepath2 = "img/history/".$filename2;
                        $filepaths2 = "../../img/history/".$filename2;

                        $imageType2 = array("image/jpeg", "image/png", "image/gif", "image/tiff");
                        if (!in_array( $filetype2, $imageType2)) { //check if image only
                                echo "<script>alert('2Image Only (.jpeg, .png, .gif, .tif)')</script>";
                        }else{
                                if(move_uploaded_file($filetemp2, $filepaths2)){ //upload image
                                        
                                        $addHistory2 = "INSERT INTO task_progress_history (image, task_id, progress, area_no) VALUES('$filepath2','$orderNo','$area2',2)";
                                        $newHistory2 = $conn->query($addHistory2);
                                        if($newHistory2){
                                                $updateArea = $conn->query("UPDATE wig set area_ii = '$area2', area_ii_pic = '$filepath2' where wig_id = '$wigId'");
                                        }else{
                                                echo "<script> alert('Image Cant Uploads 22')</script>";
                                        }
                                }else{
                                        echo "<script> alert('Image Cant Upload 2');</script>";
                                }
                        }
                }

                $filetemp3 = $_FILES['image3']['tmp_name'];
                if($filetemp3){
                        $filename3 = $_FILES['image3']['name'];
                        $filetype3 = $_FILES['image3']['type'];
                        $filepath3 = "img/history/".$filename3;
                        $filepaths3 = "../../img/history/".$filename3;

                        $imageType3 = array("image/jpeg", "image/png", "image/gif", "image/tiff");
                        if (!in_array( $filetype3, $imageType3)) { //check if image only
                                echo "<script>alert('3Image Only (.jpeg, .png, .gif, .tif)')</script>";
                        }else{
                                if(move_uploaded_file($filetemp3, $filepaths3)){ //upload image
                                        
                                        $addHistory3 = "INSERT INTO task_progress_history (image, task_id, progress, area_no) VALUES('$filepath3','$orderNo','$area3',3)";
                                        $newHistory3 = $conn->query($addHistory3);
                                        if($newHistory3){
                                                $updateArea = $conn->query("UPDATE wig set area_iii = '$area3', area_iii_pic = '$filepath3' where wig_id = '$wigId'");
                                        }else{
                                                echo "<script> alert('Image Cant Uploads 3')</script>";
                                        }
                                }else{
                                        echo "<script> alert('Image Cant Upload 3');</script>";
                                }
                        }
                }

                $filetemp4 = $_FILES['image4']['tmp_name'];
                if($filetemp4){
                        $filename4 = $_FILES['image4']['name'];
                        $filetype4 = $_FILES['image4']['type'];
                        $filepath4 = "img/history/".$filename4;
                        $filepaths4 = "../../img/history/".$filename4;

                        $imageType4 = array("image/jpeg", "image/png", "image/gif", "image/tiff");
                        if (!in_array( $filetype4, $imageType4)) { //check if image only
                                echo "<script> alert('4Image Only (.jpeg, .png, .gif, .tif)')</script>";
                        }else{
                                if(move_uploaded_file($filetemp4, $filepaths4)){ //upload image
                                        
                                        $addHistory4 = "INSERT INTO task_progress_history (image, task_id, progress, area_no) VALUES('$filepath4','$orderNo','$area4',4)";
                                        $newHistory4 = $conn->query($addHistory4);
                                        if($newHistory4){
                                                $updateArea = $conn->query("UPDATE wig set area_iv = '$area4', area_iv_pic = '$filepath4' where wig_id = '$wigId'");
                                        }else{
                                                echo "<script> alert('Image Cant Uploads 4')</script>";
                                        }
                                }else{
                                        echo "<script> alert('Image Cant Upload 4');</script>";
                                }
                        }
                }

                $totalProcess = ($area1 + $area2 + $area3 + $area4) / 4;
                date_default_timezone_set('Asia/Manila');
                $todays = date('Y-m-d');
                $updateProcess = $conn->query("UPDATE tasks set process = '$totalProcess' where order_no = '$orderNo'");
                
                if($updateProcess){
                        $selDaysProgress = $conn->query("SELECT * from task_days where task_id = '$orderNo' and dates = '$todays'");
                        if(mysqli_num_rows($selDaysProgress) > 0){
                                $updateDayProgress = $conn->query("UPDATE task_days set progress = '$totalProcess' where dates = '$todays' and task_id = '$orderNo'");
                        }else{
                                $inQueryDays = "INSERT INTO task_days(dates, task_id, days_count, progress) VALUES('$todays', '$orderNo', 0, '$totalProcess')";
                                $inTaskDays = $conn->query($inQueryDays);
                                if($inTaskDays){
                                        echo "<script> alert('inserted');</script>";
                                }else{
                                        echo "<script> alert('error');</script>";
                                }
                        }
                        
                        echo "<script>swal('Welcome!', 'You have successfully logged in!', 'success');</script>";
                        echo "<script> alert('Task Updated');</script>";
                        echo "<script>window.location.href = 'index.php?myTask'</script>";
                }

}
?>