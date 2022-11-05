<script src='vendor/calendar/lib/main.js'></script>
<script>

<?php
if($_SESSION['user_role'] === 'ur1'){
  $getTasksDate = $conn->query("SELECT * from tasks");
}else{
  $userId = $_SESSION['userId'];
  $getTasksDate = $conn->query("SELECT * from tasks where user_id = '$userId'");
}
$calendars = "";
$calendars .= "[";
date_default_timezone_set('Asia/Manila');
$todayz = date('Y-m-d');
$colors = '';
  while($calendar = $getTasksDate->fetch_assoc()){
    if($todayz > date('Y-m-d', strtotime($calendar['end_date']))){
      $colors = "'#ff0000'";
    }else{
      $colors = "'#4fc65f'";
    }
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
    var colors = <?php echo $colors?>;
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
      events: calen,
      eventColor: colors
      
    });

    calendar.render();
  });

</script>

<div class="card p-1">
<div class="d-flex justify-content-between p-4">
<h2 class="text-center">My Calendar</h2>
<a href="calendars.php" target="_BLANK" class="" title="Full Screen">[ ]</a>
</div>
<div id='calendar'></div>
</div>
