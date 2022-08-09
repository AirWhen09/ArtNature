<?php
require __DIR__ . '/boilerPlate/header.php';

// sessions
require __DIR__ . '/session/session.php';


// content
require __DIR__ . '/pages/preloader.php';

if(isset($_GET['signup'])){
    include __DIR__ . '/pages/signup.php';
}else if(isset($_GET['login'])){
    include __DIR__ . '/pages/login.php';
}else{
    include __DIR__ . '/pages/404.php';
}
// end content


require __DIR__ . '/boilerPlate/footer.php';
?>