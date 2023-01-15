<?php 
// require 'session/session.php';
require 'action/login.php';
if(isset($_GET['token'])){
    $token = $_GET['token'];

    $check = $conn->query("SELECT * from users where token = '$token'");
    if($check->num_rows > 0){
        
    }else{
        echo "<script>window.location.href = 'index.php'</script>";
    }
}else{
    echo "<script>window.location.href = 'index.php'</script>";
}

if(isset($_POST['newPassword']) && isset($_GET['token'])){
    $password = $_POST['newPassword'];
    $token = $_GET['token'];
    $password = password_hash($password, PASSWORD_DEFAULT);

    $res = $conn->query("UPDATE users set password = '$password' where token = '$token'");
    if($res){
        echo "<script>window.location.href = 'landing.php?login'</script>";
    }else{
        echo "<script>alert('Something's wrong please try again later!')</script>";
    }
}else{
    echo $_GET['token'];
}
?>
<!-- Start Login Content -->
<div class="container login-section mb-5 shadow-lg col-lg-5 animate__animated animate__bounceInUp animate__delay-3s">
    <div class="container p-3">
        <div class="col-lg-5 mx-auto">
            <img 
                src="img/logo2.png" 
                alt="logo"
                class="img-fluid"
                >
        </div>
        <div class="container p-4">
        <!-- Error Message -->
        <?php include 'helpers/errorMessage.php'; ?>
        <!-- End -->
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="pt-2 needs-validation" novalidate>
                <div class="mb-4">
                    <label for="newPassword" class="form-label login-label">New Password</label>
                    <input 
                    type="password" 
                    class="form-control login-input" 
                    name="newPassword" 
                    id="newPassword" 
                    aria-describedby="passwordId" 
                    placeholder="Type here..."
                    required
                    >  
                    <div class="valid-feedback">
                         
                    </div>
                    <div class="invalid-feedback">
                        Please input password.
                    </div>
                </div>
                <div class="mb-4">
                    <label for="rePassword" class="form-label login-label">Retype Password</label>
                    <input 
                    type="password" 
                    class="form-control login-input" 
                    name="rePassword" 
                    id="rePassword" 
                    aria-describedby="passwordId" 
                    placeholder="Type here..."
                    required
                    >  
                    <div class="valid-feedback">
                         
                    </div>
                    <div class="invalid-feedback">
                        Please input password.
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button 
                    type="submit" 
                    name="reset" 
                    id="login" 
                    class="btn primary-btn"
                    >Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="js/formValidation.js"></script>
<script>
      function validateEmail(p1, p2) {
            if(p1 === p2) return true;
            else if(p1 == '' && p2 == '') return false;
            else return false;
        }

        var form = document.querySelector("form");
    form.addEventListener("submit", function(e) {
        e.preventDefault();
        var p1 = form.querySelector("#newPassword").value;
        var p2 = form.querySelector("#rePassword").value;
        if (validateEmail(p1, p2)) {
            form.submit();
        } else {
            alert("Password didn't match");
        }
    });
</script>
