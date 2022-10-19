<?php
if(isset($_SESSION['email']){

}

if(isset($_GET['auth']) && isset($_GET['email'])){
    $email = $_GET['email'];
    $auth = $_GET['auth'];

}

if(isset($_POST['resend']) && isset($_SESSION['email']){
    $email = $_SESSION['email'];
    
}

?>