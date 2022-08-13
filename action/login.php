<?php
require 'connection/connection.php';

const USERNAME_REQUIRE = "Please enter your username";
const PASSWORD_REQUIRE = "Please enter your password";
const CREDENTIAL_INVALID = "Username or password is incorrect";


$errors = [];
$success = [];
$inputs = [];

if(isset($_POST['username']) && isset($_POST['password'])){

    // filter_input
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $inputs['username'] = $username;

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
            $_SESSION['user_role'] = $row['user_role'];
            $_SESSION['userId'] = $row['user_id'];
            $_SESSION['status'] = "valid";
            $_SESSION['firstName'] = $row['first_name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['image'] = $row['image'];
        }else{
            array_push($errors, CREDENTIAL_INVALID);
        }
    }else{
        array_push($errors, CREDENTIAL_INVALID);
    }
    
    if(count($errors) === 0){
        header("location: admin/dashboard/index.php?dashboard");
    }
}

?>