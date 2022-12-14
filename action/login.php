<?php
require 'connection/connection.php';

//use for error message
const USERNAME_REQUIRE = "Please enter your username";
const PASSWORD_REQUIRE = "Please enter your password";
const CREDENTIAL_INVALID = "Username or password is incorrect";


$errors = [];
$success = [];


if(isset($_POST['username']) && isset($_POST['password'])){

    // filter_input
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);

    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

    // check to see the username and password has a value
    if($username){
        $username = trim($username);
        if($username === ''){
            array_push($errors, USERNAME_REQUIRE);
        }
    }else{
        array_push($errors, USERNAME_REQUIRE);
    }

    if($password){
        $password = trim($password);
        if($password === ''){
            array_push($errors, PASSWORD_REQUIRE);
        }
    }else{
        array_push($errors, PASSWORD_REQUIRE);
    }

    $selectUser = $conn->query("SELECT * from users where username = '$username'");
    if($selectUser->num_rows > 0){
        $row = $selectUser->fetch_assoc();
        if(password_verify($password, $row['password'])){
            session_start();
            if($row['status'] == 'ustts1'){
                $_SESSION['email'] = $row['email'];
                echo "<script>swal('Verify First!', 'You need to verify your email first!', 'success');</script>";
                echo "<script>window.location.href = 'landing.php?verify'</script>";
            }else{
                $_SESSION['user_role'] = $row['user_role'];
                $_SESSION['userId'] = $row['user_id'];
                $_SESSION['status'] = "valid";
                $_SESSION['firstName'] = $row['first_name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['image'] = $row['image'];
            }
        }else{
            array_push($errors, CREDENTIAL_INVALID);
        }
    }else{
        array_push($errors, CREDENTIAL_INVALID);
    }
    
    if(count($errors) === 0){

        if($_SESSION['user_role'] == 'ur1'){
            $redirect = 'dashboard';
        }elseif($_SESSION['user_role'] == 'ur2' || $_SESSION['user_role'] == 'ur3'){
            $redirect = 'myTask';
        }elseif($_SESSION['user_role'] == 'ur4'){
            $redirect = 'location';
        }
        echo "<script>swal('Welcome!', 'You have successfully logged in!', 'success');</script>";
        echo "<script>window.location.href = 'admin/dashboard/index.php?$redirect'</script>";
    }
}

?>