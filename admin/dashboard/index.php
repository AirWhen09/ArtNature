<?php
    /////////////  connection  /////////////////////
    include '../../connection/connection.php';
    /////////////////  end  ////////////////////////
    
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
    }elseif(isset($_GET['myTask']) && ($_SESSION['user_role'] === 'ur2' || $_SESSION['user_role'] === 'ur3')){
        include __DIR__ . '/pages/myTask.php';
    }elseif(isset($_GET['chat'])){
        include __DIR__ . '/pages/chat.php';
    }else{
        include __DIR__ . '/pages/404.php';
    }
    /////////////////  end  ////////////////////////
    

    ///////////////// modal ////////////////////////
    require __DIR__ . '/boilerPlate/modal.php';
    /////////////////  end  ////////////////////////
    

    require __DIR__ . '/boilerPlate/footer.php';
?>