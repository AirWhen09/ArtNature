<?php
    require __DIR__ . '/boilerPlate/header.php';
    // session
    require __DIR__ . '/session/session.php';

    require __DIR__ . '/boilerPlate/topNav.php';
    require __DIR__ . '/boilerPlate/sideNav.php';

    // content
    if(isset($_GET['dashboard'])){
        include __DIR__ . '/pages/dashboard.php';
    }elseif(isset($_GET['employeeList'])){
        include __DIR__ . '/pages/employeeList.php';
    }else{
        include __DIR__ . '/pages/404.php';
    }
    
    // end content

    // modals
    require __DIR__ . '/boilerPlate/modal.php';

    require __DIR__ . '/boilerPlate/footer.php';
?>