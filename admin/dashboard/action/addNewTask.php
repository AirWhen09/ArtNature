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

         // check to see all inputs has a value
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
            $addTask = "INSERT INTO tasks(order_no, wig_model, wig_size, status, description)
                                    VALUES('$orderNumber', '$wigModel', '$wigSize', 'tstts1', '$description')";
            $insertTask = $conn->query($addTask);
            if($insertTask){
                array_push($success, "New task added sucessfully");
                unset($inputs);
            }else{
                array_push($errors, "Something's wrong: ".$conn->error);
            }
         }
    }
?>