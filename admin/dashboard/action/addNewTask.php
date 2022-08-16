<?php
    $errors = [];
    $success = [];
    $inputs = [];

    if(isset($_POST['addTask'])){
        
        // filter_input
        $orderNumber = filter_input(INPUT_POST, "orderNumber", FILTER_SANITIZE_STRING);
        $inputs['orderNumber'] = $orderNumber;
        $wigModel = filter_input(INPUT_POST, "wigModel", FILTER_SANITIZE_STRING);
        $inputs['wigModel'] = $wigModel;
        $wigSize = filter_input(INPUT_POST, "wigSize", FILTER_SANITIZE_STRING);
        $inputs['wigSize'] = $wigSize;
        $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING);
        $inputs['description'] = $description;
        $batchName = filter_input(INPUT_POST, "batchName", FILTER_SANITIZE_STRING);
        $inputs['batchName'] = $batchName;
        $addNewBatch = filter_input(INPUT_POST, "addNewBatch", FILTER_SANITIZE_STRING);
        $inputs['addNewBatch'] = $addNewBatch;
        $batch = '';
         // check to see all inputs has a value
         if($batchName){
            $batchName = trim($batchName);
            if($batchName === ''){
                array_push($errors, "Please select batch name");
            }else{
                if($batchName == 'new'){
                    if($addNewBatch){
                        $addNewBatch = trim($addNewBatch);
                        if($addNewBatch === ''){
                            array_push($errors, "Please input batch name");
                        }else{
                            $insertBatchName = $conn->query("INSERT INTO task_batch (name, status, progress) VALUES('$addNewBatch', 'bstts1', 0)");
                            if($insertBatchName){
                                 $batch = mysqli_insert_id($conn);
                            }else{
                                array_push($errors, "Can't add batch name: ".$conn->error);
                            }
                        }
                    }else{
                        array_push($errors, "Please input batch name");
                    }
                }else{
                    $batch = $batchName;
                }
            }
        }else{
            array_push($errors, "Please select batch name");
        }

         if($description){
            $description = trim($description);
            if($description === ''){
                array_push($errors, "Please enter description");
            }
        }else{
            array_push($errors, "Please enter description");
        }

        if($wigSize){
            $wigSize = trim($wigSize);
            if($wigSize === ''){
                array_push($errors, "Please select wig size");
            }
        }else{
            array_push($errors, "Please select wig size");
        }

        if($wigModel){
            $wigModel = trim($wigModel);
            if($wigModel === ''){
                array_push($errors, "Please select wig model");
            }
        }else{
            array_push($errors, "Please select wig model");
        }

        if($orderNumber){
            $orderNumber = trim($orderNumber);
            if($orderNumber === ''){
                array_push($errors, "Please enter order number");
            }
        }else{
            array_push($errors, "Please enter order number");
        }

        if(count($errors) === 0){
            
            //Insert new task
            $addTask = "INSERT INTO tasks(order_no, wig_model, wig_size, status, description, batch)
                                    VALUES('$orderNumber', '$wigModel', '$wigSize', 'tstts1', '$description', '$batch')";
            $insertTask = $conn->query($addTask);
            if($insertTask){
                array_push($success, "New task added sucessfully");
                unset($inputs);
                echo "<script>window.location.href = 'index.php?manageTask'</script>";
            }else{
                array_push($errors, "Something's wrong: ".$conn->error);
            }
         }
    }
?>