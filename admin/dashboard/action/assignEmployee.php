<?php
    // $errors = [];
    // $success = [];
    // $inputs = [];

    if(isset($_POST['assignEmployee'])){
        
        // filter_input
        $employee = filter_input(INPUT_POST, "employee", FILTER_SANITIZE_STRING);
        $inputs['employee'] = $employee;
        $orderNo = filter_input(INPUT_POST, "orderNo", FILTER_SANITIZE_STRING);
        $inputs['orderNo'] = $orderNo;
        $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING);
        $inputs['message'] = $message;
        $startDate = filter_input(INPUT_POST, "startDate", FILTER_SANITIZE_STRING);
        $inputs['startDate'] = $startDate;
        $endDate = filter_input(INPUT_POST, "endDate", FILTER_SANITIZE_STRING);
        $inputs['endDate'] = $endDate;
        
         // check to see all inputs has a value
        if($endDate){
            $endDate = trim($endDate);
            if($endDate === ''){
                array_push($errors, "Please input end date");
            }elseif($startDate < date("Y-m-d")){
                array_push($errors, "Invalid end date");
            }
        }else{
            array_push($errors, "Please input end date");
        }

        if($startDate){
            $startDate = trim($startDate);
            if($startDate === ''){
                array_push($errors, "Please input start date");
            }elseif($startDate < date("Y-m-d")){
                array_push($errors, "Invalid start date");
            }
        }else{
            array_push($errors, "Please input start date");
        }

        if($message){
            $message = trim($message);
            if($message === ''){
                array_push($errors, "Please input message");
            }
        }else{
            array_push($errors, "Please input message");
        }

        if($orderNo){
            $orderNo = trim($orderNo);
            if($orderNo === ''){
                array_push($errors, "Please select order number");
            }
        }else{
            array_push($errors, "Please select order number");
        }

        if($employee){
            $employee = trim($employee);
            if($employee === ''){
                array_push($errors, "Please select employee");
            }
        }else{
            array_push($errors, "Please select employee");
        }

        if(count($errors) === 0){
            $startTimeStamp = strtotime($startDate);
            $endTimeStamp = strtotime($endDate);

            $timeDiff = abs($endTimeStamp - $startTimeStamp);

            $numberDays = $timeDiff/86400;  // 86400 seconds in one day

            // and you might want to convert to integer
            $numberDays = intval($numberDays) + 1;
            //update task
            $updateTaskSql = "UPDATE tasks set 
                            user_id = '$employee',
                            start_date = '$startDate',
                            end_date = '$endDate',
                            process = 0,
                            status = 'tstts2',
                            no_of_days = '$numberDays'
                            where order_no = '$orderNo'";
            $updateTask = $conn->query($updateTaskSql);
            if($updateTask){

                $sql = "INSERT INTO messages(msg_to, msg_from, message)
                                values('$employee', '$isLoginUserId', '$message')";
                $insertMsg = $conn->query($sql);
                if($insertMsg){
                    array_push($success, "Updated");
                    echo "<script>window.location.href = 'index.php?manageTask'</script>";
                }
            }else{
                array_push($errors, $conn->error);
            }
         }
    }
?>