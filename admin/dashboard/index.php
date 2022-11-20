<?php
    /////////////  connection  /////////////////////
    include '../../connection/connection.php';
    /////////////////  end  ////////////////////////
    date_default_timezone_set('Asia/Manila');
    //////////////  session  //////////////////////
    require __DIR__ . '/session/session.php';
    /////////////////  end  ////////////////////////
    
    require __DIR__ . '/boilerPlate/header.php';
    require __DIR__ . '/boilerPlate/topNav.php';
    require __DIR__ . '/boilerPlate/sideNav.php';


    ///////////////  content  //////////////////////
    if(isset($_GET['dashboard'])){
        include __DIR__ . '/pages/dashboard.php';
    }elseif(isset($_GET['employeeList']) && $_SESSION['user_role'] === 'ur1'){
        include __DIR__ . '/pages/employeeList.php';
    }elseif(isset($_GET['manageTask']) && $_SESSION['user_role'] === 'ur1'){
        include __DIR__ . '/pages/manageTask.php';
    }elseif(isset($_GET['pendingTask']) && $_SESSION['user_role'] === 'ur1'){
        include __DIR__ . '/pages/pendingTask.php';
    }elseif(isset($_GET['setting']) && $_SESSION['user_role'] === 'ur1'){
        include __DIR__ . '/pages/setting.php';
    }elseif(isset($_GET['delivery']) && $_SESSION['user_role'] === 'ur1'){
        include __DIR__ . '/pages/delivery.php';
    }elseif(isset($_GET['progressReport']) && $_SESSION['user_role'] === 'ur1'){
        include __DIR__ . '/pages/progressReport.php';
    }elseif(isset($_GET['batch']) && $_SESSION['user_role'] === 'ur1'){
        include __DIR__ . '/pages/taskBatch.php';
    }elseif(isset($_GET['location']) && $_SESSION['user_role'] === 'ur4'){
        include __DIR__ . '/pages/location.php';
    }elseif(isset($_GET['myTask']) && ($_SESSION['user_role'] === 'ur2' || $_SESSION['user_role'] === 'ur3')){
        include __DIR__ . '/pages/myTask.php';
    }elseif(isset($_GET['taskDetail']) && isset($_GET['orderNo']) && ($_SESSION['user_role'] === 'ur2' || $_SESSION['user_role'] === 'ur3')){
        include __DIR__ . '/pages/myTaskDetails.php';
    }elseif(isset($_GET['taskHistory'])){
        include __DIR__ . '/pages/taskHistory.php';
    }elseif(isset($_GET['chat'])){
        include __DIR__ . '/pages/chat.php';
    }elseif(isset($_GET['account'])){
        include __DIR__ . '/pages/account.php';
    }else{
        include __DIR__ . '/pages/404.php';
    }
    /////////////////  end  ////////////////////////
    

    ///////////////// modal ////////////////////////
    require __DIR__ . '/boilerPlate/modal.php';
    /////////////////  end  ////////////////////////
    

    require __DIR__ . '/boilerPlate/footer.php';
?>