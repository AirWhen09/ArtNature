<script src='vendor/calendar/lib/main.js'></script>
<script>

<?php
$calendars = "";
$calendars .= "[";
  $getTasksDate = $conn->query("SELECT * from tasks");
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

<div class="card p-1">
<div class="d-flex justify-content-between p-4">
<h2 class="text-center">Calendar</h2>
<a href="calendars.php" target="_BLANK" class="" title="Full Screen">[ ]</a>
</div>
<div id='calendar'></div>
</div>
