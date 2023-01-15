<?php
require __DIR__ . '/boilerPlate/header.php';

// content
require __DIR__ . '/pages/preloader.php';

if(isset($_GET['signup'])){
    include __DIR__ . '/pages/signUp.php';
}else if(isset($_GET['login'])){
    include __DIR__ . '/pages/login.php';
}else if(isset($_GET['verify'])){
    include __DIR__ . '/pages/verify.php';
}else if(isset($_GET['forgot'])){
    include __DIR__ . '/pages/forgotPassword.php';
}else if(isset($_GET['reset'])){
    include __DIR__ . '/pages/resetPassword.php';
}else{
    include __DIR__ . '/pages/404.php';
}
// end content

require __DIR__ . '/boilerPlate/footer.php';
?>