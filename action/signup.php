<?php
const USERNAME_REQUIRE = "Please enter your username";
const PASSWORD_REQUIRE = "Please enter your password";
const CREDENTIAL_INVALID = "Username or password is incorrect";


$errors = [];
$inputs = [];

if(isset($_POST['username']) && isset($_POST['password'])){

    // filter_input
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $inputs['username'] = $username;

    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    $inputs['password'] = $password;

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


    if(count($errors) === 0){

        echo "Thank you <b>$password</b> for subscribing. <br>";

    }
}
?>