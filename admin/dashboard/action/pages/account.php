<?php 
$userId = $_SESSION['userId'];
$errors = [];
$success = [];
//get all user info
$getAccountSql = "SELECT *, reference_code.name as userRole from users join reference_code on users.user_role = reference_code.ref_id where users.user_id = '$userId'";
$getAccount = $conn->query($getAccountSql)->fetch_assoc();


//change pic
if(isset($_POST['changePic'])){

    $userId = $_POST['userId'];
    $filetemp = $_FILES['image']['tmp_name'];
    $filename = $_FILES['image']['name'];
    $filetype = $_FILES['image']['type'];
    $filepath = "img/profile/".$filename;
    $filepaths = "../../img/profile/".$filename;

    if(empty($filetemp)){
        $filepath = "image/profile/avatar.png";
    }else{
        $imageType = array("image/jpeg", "image/png", "image/gif", "image/tiff");
        if (!in_array( $filetype, $imageType)) { //check if image only
            array_push($errors, "Image Only (.jpeg, .png, .gif, .tif)");
        }else{
            if(move_uploaded_file($filetemp, $filepaths)){ //upload image
                $updatePic = $conn->query("UPDATE users set image = '$filepath' where user_id = '$userId'");
                if($updatePic){
                    echo "<script>window.location.href = 'index.php?account'</script>";
                }
            }else{
                array_push($errors, "Image Can't Upload");
            }
        }
        
    }
}

if(isset($_POST['changeInfo'])){
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $middleName = mysqli_real_escape_string($conn, $_POST['middleName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $dateOfBirth = mysqli_real_escape_string($conn, $_POST['dateOfBirth']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $employee = mysqli_real_escape_string($conn, $_POST['employee']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $updateSql = "UPDATE users set first_name = '$firstName',
                                    last_name = '$lastName',
                                    middle_name = '$middleName',
                                    gender = '$gender',
                                    birthday = '$dateOfBirth',
                                    contact = '$contact',
                                    address = '$address',
                                    email = '$email'
                        where user_id = '$userId'";
    $updateUser = $conn->query($updateSql);

    if($updateUser){
        echo "<script>window.location.href = 'index.php?account'</script>";
    }else{
        array_push($errors, "Can't update profile, Something is wrong! Please try again later");
    }
}
?>