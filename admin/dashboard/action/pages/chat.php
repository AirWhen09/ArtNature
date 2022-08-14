<?php
    //get admin contact 
    $adminCon = "SELECT * from users where user_role = 'ur1' order by first_name";
    $getAdminCon = $conn->query($adminCon);

    //get employee contact 
    $empCon = "SELECT * from users where user_role in ('ur2', 'ur3') order by first_name";
    $getEmpCon = $conn->query($empCon);

    //get driver contact 
    $driverCon = "SELECT * from users where user_role = 'ur4' order by first_name";
    $getDriverCon = $conn->query($driverCon);

    //get user info
    if(isset($_GET['user'])){
        $username = mysqli_real_escape_string($conn, $_GET['user']);
        $userInfo = "SELECT first_name, last_name , email, user_id, image from users where username = '$username'";
        $getUserInfo = $conn->query($userInfo)->fetch_assoc();
        if($getUserInfo){
            $name = $getUserInfo['first_name'].' '.$getUserInfo['last_name'];
            $email = $getUserInfo['email'];
            $chatUserId = $getUserInfo['user_id'];
            $image = $getUserInfo['image'];
        }else{
            $name = "No User";
            $email = "No User";
            $image = "img/profile/avatar.png";
            $chatUserId = 0;
        }
        
    }else{
        $name = "No User";
        $email = "No User";
        $image = "img/profile/avatar.png";
        $chatUserId = 0;
    }

    // get all chat 
    $allChat = "SELECT * from messages where (msg_from = '$chatUserId' and msg_to = '$isLoginUserId') or 
                                            (msg_from = '$isLoginUserId' and msg_to = '$chatUserId') order by date_created";
    $getAllChat = $conn->query($allChat);
?>