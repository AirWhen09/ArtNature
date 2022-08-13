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
    }elseif(isset($_GET['employeeList'])){
        include __DIR__ . '/pages/employeeList.php';
    }elseif(isset($_GET['manageTask'])){
        include __DIR__ . '/pages/manageTask.php';
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