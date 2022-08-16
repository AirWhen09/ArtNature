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
	$process = $_POST['process'];
	$orderNo = $_POST['orderNo'];
	$sql = "UPDATE tasks set process = '$process' where order_no = '$orderNo'";
	$updateTask = $conn->query($sql);
	if($updateTask){
                $filetemp = $_FILES['image']['tmp_name'];
                $filename = $_FILES['image']['name'];
                $filetype = $_FILES['image']['type'];
                $filepath = "img/history/".$filename;
                $filepaths = "../../img/history/".$filename;

                $imageType = array("image/jpeg", "image/png", "image/gif", "image/tiff");
                if (!in_array( $filetype, $imageType)) { //check if image only
                        echo "<script> alert('Image Only (.jpeg, .png, .gif, .tif)')</script>";
                }else{
                        if(move_uploaded_file($filetemp, $filepaths)){ //upload image
                                $addHistory = "INSERT INTO task_progress_history (image, task_id, progress) VALUES('$filepath','$orderNo','$process')";
                                $newHistory = $conn->query($addHistory);
                                if($newHistory){
		                        echo "<script>window.location.href = 'index.php?myTask'</script>";
                                }else{
                                        echo "<script> alert('Image Cant Uploads')</script>";
                                }
                        }else{
                                echo "<script> alert('Image Cant Upload');</script>";
                        }
                }

	}
}
?>