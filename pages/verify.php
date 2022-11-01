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
                    <h3><i class="fas fa-exclamation-triangle text-warning"></i> To finish setting up your Artnature Account, we just need to make sure this email address is yours. Please Check Your Email to verify your Account.</h3>
                        <p>
                        <div class="container d-flex flex-column justify-content-center align-items-center gap-2">
                            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="pt-2 needs-validation" enctype="multipart/form-data" novalidate>
                                <input type="text" class="form-control input-lg" name="auth" placeholder="input code here...">
                                <input type="email" name="email" value="
                                            <?php if(isset($_SESSION["email"])){
                                                echo $_SESSION["email"];
                                            } ?>" style="display: none;">
                                <button class="btn btn-primary" type="submit" name="verify">Verify</button>
                            </form>
                            <i>---</i>
                            <a href="?verify&resend=again">Resend</a>.
                        </div>
                    </p>
                    <p>
                        <a href="landing.php?login">return to login page</a>.
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>