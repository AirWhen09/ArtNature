<div id="overlayer"></div>
<div class="preloader">
   <div class="loader">
      <span class="loader-inner"></span>
   </div>
   <p> Loading...</p>
</div>
<!-- jQuery -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>
   $(window).load(function() {
   $(".preloader").delay(2000).fadeOut("slow");
   $("#overlayer").delay(2000).fadeOut("slow");
   })
</script>