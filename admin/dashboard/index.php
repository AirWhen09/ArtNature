<?php
    require __DIR__ . '/boilerPlate/header.php';
    // session
    require __DIR__ . '/session/session.php';

    require __DIR__ . '/boilerPlate/topNav.php';
    require __DIR__ . '/boilerPlate/sideNav.php';

    // content
    // require __DIR__ . '/pages/dashboard.php';
    require __DIR__ . '/pages/employeeList.php';
    // end content

    // modals
    require __DIR__ . '/boilerPlate/modal.php';

    require __DIR__ . '/boilerPlate/footer.php';
?>