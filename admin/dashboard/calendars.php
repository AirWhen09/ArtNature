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
    ?>
    <script src='vendor/calendar/lib/main.js'></script>
    <script>

    <?php
    $calendars = "";
    $calendars .= "[";
    if($_SESSION['user_role'] === 'ur1'){
      $getTasksDate = $conn->query("SELECT * from tasks");
    }else{
      $userId = $_SESSION['userId'];
      $getTasksDate = $conn->query("SELECT * from tasks where user_id = '$userId'");
    }
      while($calendar = $getTasksDate->fetch_assoc()){
        $calendars .= '
        {
          title: "'.$calendar['order_no'].'",
          start: "'.date('Y-m-d', strtotime($calendar['start_date'])).'",
          end: "'.date('Y-m-d', strtotime($calendar['end_date'])).'",
        },
        ';
        
    }$calendars .= ']';
    ?>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calen = <?php echo $calendars?>;
        var calendar = new FullCalendar.Calendar(calendarEl, {
          headerToolbar: {
            left: 'prev,next today',
            right: 'dayGridMonth,dayGridWeek,dayGridDay'
          },
          initialDate: Date.now(),
          navLinks: true, // can click day/week names to navigate views
          editable: false,
          height: 650,
          dayMaxEvents: true, // allow "more" link when too many events
          events: calen
          
          
        });

        calendar.render();
      });

    </script>
 <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
        <div class="card p-1">
          <div class="d-flex justify-content-between p-4">
            <h2 class="text-center">My Calendar</h2>
          </div>
          <div id='calendar'></div>
        </div>  
      </div>    
  </div>    
<?php
    /////////////////  end  ////////////////////////
    

    ///////////////// modal ////////////////////////
    require __DIR__ . '/boilerPlate/modal.php';
    /////////////////  end  ////////////////////////
    

    require __DIR__ . '/boilerPlate/footer.php';
?>