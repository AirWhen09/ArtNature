<?php
ob_start();
require __DIR__ . '/boilerPlate/header.php';

// content

require __DIR__ . '/pages/preloader.php';

include __DIR__ . '/pages/landingPage.php';

// end content

require __DIR__ . '/boilerPlate/footer.php';



?>