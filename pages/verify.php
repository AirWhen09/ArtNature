<?php 
// require 'session/session.php';
require 'action/verify.php';
?>
<!-- Start Login Content -->
<div class="container login-section mb-5 shadow-lg col-lg-4">
    <div class="container p-3">
        <div class="card-body">
            <div class="row">
                <div class="error-content">
                    <h3><i class="fas fa-exclamation-triangle text-warning"></i> Please Check Your Email to verify your Account.</h3>
                        <p>
                        <a href="verify.php?resend=again">Resend</a>.
                    </p>
                    <p>
                        <a href="index.php">return to dashboard</a>.
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>