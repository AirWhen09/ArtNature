<script src='vendor/calendar/lib/main.js'></script>
<script>

<?php
$calendars = "";
$calendars .= "[";
  $getTasksDate = $conn->query("SELECT * from tasks");
  while($calendar = $getTasksDate->fetch_assoc()){
    $calendars .= '
    {
      title: "'.$calendar['wig_model'].'",
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
<h2 class="text-center">Calendar</h2>
    <div id='calendar'></div>
</div>
