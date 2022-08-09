<script src='vendor/calendar/lib/main.js'></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
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
      events: [
        {
          title: 'All Day Event',
          start: '2022-08-01'
        },
        {
          title: 'Long Event',
          start: '2022-08-07',
          end: '2022-08-10'
        }
      ]
    });

    calendar.render();
  });

</script>

<div class="card p-1">
<h2 class="text-center">Calendar</h2>
    <div id='calendar'></div>
</div>
