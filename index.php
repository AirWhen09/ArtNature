<?php
require __DIR__ . '/boilerPlate/header.php';


// content
require __DIR__ . '/pages/preloader.php';

if(isset($_GET['signup'])){
    include __DIR__ . '/pages/signup.php';
}else{
    include __DIR__ . '/pages/login.php';
}
// end content


require __DIR__ . '/boilerPlate/footer.php';
?>