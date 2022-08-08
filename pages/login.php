<?php 
// require 'session/session.php';
require 'action/login.php';
?>
<!-- Start Login Content -->
<div class="container login-section mb-5 shadow-lg col-lg-5 animate__animated animate__tada animate__delay-3s">
    <div class="container p-3">
        <div class="col-lg-5 mx-auto">
            <img 
                src="../img/logo2.png" 
                alt="logo"
                class="img-fluid"
                >
            <h5 class="text-center">Login to your account</h5>
        </div>
        <div class="container p-4">
        <!-- Error Message -->
        <?php include 'helpers/errorMessage.php'; ?>
        <!-- End -->
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="pt-2 needs-validation" novalidate>
                <div class="mb-3">
                    <label for="username" class="form-label login-label">Username</label>
                    <input 
                    type="text" 
                    class="form-control login-input" 
                    name="username" 
                    id="username" 
                    aria-describedby="usernameId" 
                    placeholder="Type here..."
                    required
                    >
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label login-label">Password</label>
                    <input 
                    type="password" 
                    class="form-control login-input" 
                    name="password" 
                    id="password" 
                    aria-describedby="passwordId" 
                    placeholder="Type here..."
                    required
                    >  
                </div>
                <div class="d-grid gap-2">
                    <button 
                    type="submit" 
                    name="login" 
                    id="login" 
                    class="btn primary-btn"
                    >Login</button>
                </div>
                <div class="d-flex flex-column justify-content-center item-content-center mt-2">
                    <p class="text-center fw-bold">or</p>
                    <p class="text-center fw-bold">No account yet? Click <a href="?signup">here</a> to sign up!</p>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../js/formValidation.js"></script>