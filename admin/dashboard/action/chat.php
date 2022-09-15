<?php
    $errors = [];
    $success = [];
    if(isset($_POST['chatMe'])){
        if(isset($_POST['from']) && isset($_POST['to']) && isset($_POST['message']) && isset($_GET['user'])){
            $user = $_GET['user'];
            $msgFrom = $_POST['from'];
            $msgTo = $_POST['to'];
            $message = htmlspecialchars($_POST['message']);
            $message = mysqli_real_escape_string($conn, $_POST['message']);
            if($message == ''){
                array_push($errors, "Message is required");
            }
            if($msgTo == '' || $msgTo == 0){
                array_push($errors, "Please select user");
            }
        }else{
            array_push($errors, "Something's wrong, please try again");
        }
        
        if(count($errors) === 0){
            $sql = "INSERT INTO messages(msg_to, msg_from, message, status)
                                values('$msgTo', '$msgFrom', '$message', 0)";
            $insertMsg = $conn->query($sql);
            if($insertMsg){
                echo "<script>window.location.href = 'index.php?chat&user=$user'</script>";
            }else{
                array_push($errors, "Something's wrong: ".$conn->error);
            }
            
        }
    }
?>