<?php
require 'connection/connection.php';
const FIRSTNAME_REQUIRE = "Please enter your first name";
const LASTNAME_REQUIRE = "Please enter your last name";
const GENDER_REQUIRE = "Please select your gender";
const BIRTHDAY_REQUIRE = "Please enter your birthday";
const CONTACT_REQUIRE = "Please enter your contact number";
const EMPLOYEE_REQUIRE = "Please select your employee type";
const ADDRESS_REQUIRE = "Please enter your address";
const EMAIL_REQUIRE = "Please enter your email";
const EMAIL_INVALID = "Please enter valid email";
const USERNAME_REQUIRE = "Please enter your username";
const PASSWORD_REQUIRE = "Please enter your password";

$errors = [];
$inputs = [];
$success = [];

if(isset($_POST['signup'])){

    // filter_input
    $firstName = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_STRING);
    $inputs['firstName'] = $firstName;
    $lastname = filter_input(INPUT_POST, "lastName", FILTER_SANITIZE_STRING);
    $inputs['lastName'] = $lastname;
    $middleName = filter_input(INPUT_POST, "middleName", FILTER_SANITIZE_STRING);
    $inputs['middleName'] = $middleName;
    $gender = filter_input(INPUT_POST, "gender", FILTER_SANITIZE_STRING);
    $dateOfBirth = filter_input(INPUT_POST, "dateOfBirth", FILTER_SANITIZE_STRING);
    $inputs['dateOfBirth'] = $dateOfBirth;
    $contact = filter_input(INPUT_POST, "contact", FILTER_SANITIZE_STRING);
    $inputs['contact'] = $contact;
    $employee = filter_input(INPUT_POST, "employee", FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_STRING);
    $inputs['address'] = $address;
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $inputs['email'] = $email;
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $inputs['username'] = $username;
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
   
    // check all inputs

    if($firstName){
        $firstName = trim($firstName);
        if($firstName === ''){
            array_push($errors, FIRSTNAME_REQUIRE);
        }
    }else{
        array_push($errors, FIRSTNAME_REQUIRE);
    }

    if($lastname){
        $lastname = trim($lastname);
        if($lastname === ''){
            array_push($errors, LASTNAME_REQUIRE);
        }
    }else{
        array_push($errors, LASTNAME_REQUIRE);
    }

    if($gender){
        $gender = trim($gender);
        if($gender === ''){
            array_push($errors, GENDER_REQUIRE);
        }
    }else{
        array_push($errors, GENDER_REQUIRE);
    }

    if($dateOfBirth){
        $dateOfBirth = trim($dateOfBirth);
        if($dateOfBirth === ''){
            array_push($errors, BIRTHDAY_REQUIRE);
        }
    }else{
        array_push($errors, BIRTHDAY_REQUIRE);
    }

    if($contact){
        $contact = trim($contact);
        if($contact === ''){
            array_push($errors, CONTACT_REQUIRE);
        }
    }else{
        array_push($errors, CONTACT_REQUIRE);
    }

    if($employee){
        $employee = trim($employee);
        if($employee === ''){
            array_push($errors, EMPLOYEE_REQUIRE);
        }
    }else{
        array_push($errors, EMPLOYEE_REQUIRE);
    }

    if($address){
        $address = trim($address);
        if($address === ''){
            array_push($errors, ADDRESS_REQUIRE);
        }
    }else{
        array_push($errors, ADDRESS_REQUIRE);
    }

    if($email){
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if($email === false){
            array_push($errors, EMAIL_INVALID);
        }else{
            // check email if already exist 
            $selectEmail = $conn->query("SELECT email from users where email = '$email'");
            if($selectEmail->num_rows > 0){
                array_push($errors, "Email already registered");
            }
        }
    }else{
        array_push($errors, EMAIL_REQUIRE);
    }

    if($username){
        $username = trim($username);
        if($username === ''){
            array_push($errors, USERNAME_REQUIRE);
        }else{
            // check username if already exist 
            $selectUsername = $conn->query("SELECT username from users where username = '$username'");
            if($selectUsername->num_rows > 0){
                array_push($errors, "Username already exist");
            }
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

    $filetemp = $_FILES['image']['tmp_name'];
    $filename = $_FILES['image']['name'];
    $filetype = $_FILES['image']['type'];
    $filepath = "img/profile/".$filename;
    $filepaths = "img/profile/".$filename;

    if($filetemp){
        $imageType = array("image/jpeg", "image/png", "image/gif", "image/tiff");
        if (!in_array( $filetype, $imageType)) { //check if image only
            array_push($errors, "Image Only (.jpeg, .png, .gif, .tif)");
        }else{
            if(move_uploaded_file($filetemp, $filepaths)){ //upload image
                
            }else{
                array_push($errors, "Image Can't Upload");
            }
        }
    }else{
        $filepath = "image/profile/avatar.png";
        
        
    }

    if(count($errors) === 0){

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (
            first_name, 
            middle_name,
            last_name,
            gender,
            birthday,
            contact,
            user_role,
            address,
            email,
            username,
            password,
            image, 
            status)
            values (
                '$firstName', '$middleName', '$lastname' , '$gender' , '$dateOfBirth' , 
                '$contact', '$employee', '$address', '$email', '$username', '$password',
                '$filepath', 'ustts1'
            )";

        if($conn->query($sql)){
            $_SESSION['email'] = $email;
            echo "<script>swal('Welcome!', 'You Have Created an Account Successfully!', 'success');</script>";
            echo "<script>window.location.href = 'landing.php?verify'</script>";
        }else{
            array_push($errors, "Something Wrong!: ".$conn->error);
        }
    }


}
?>