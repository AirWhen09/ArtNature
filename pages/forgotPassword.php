<?php 
// require 'session/session.php';
require 'action/login.php';

if (isset($_POST["email"])) {
    $email = $_POST["email"];
    // Connect to the database and check if the email exists in the user table
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // Email exists, generate a reset password token and send it to the user's email
        $token = bin2hex(random_bytes(16));
        $stmt = $conn->prepare("UPDATE users SET reset_token=? WHERE email=?");
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();
        // Send the reset password email to the user
        $to = $email;
        $subject = "Reset Password";
        $message = "Click the link below to reset your password:\n\n";
        $message .= "http://www.example.com/resetpassword.php?token=" . $token;
        $headers = "From: noreply@example.com\r\n";
        mail($to, $subject, $message, $headers);
        echo "A reset password email has been sent to your email address. Please follow the instructions in the email to reset your password.";
    } else {
        // Email does not exist
        echo "<script>alert('Sorry, we could not find an account with that email address')</script>";
    }
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
            <h4>Enter your email address to reset your password:</h4>
                <input type="email" class="form-control" name="email" placeholder="Email address" required>
                <input type="submit" class="btn btn-primary" value="Reset Password">
            </form>
        </div>
    </div>
</div>

<script src="js/formValidation.js"></script>
<script>
        function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

        var form = document.querySelector("form");
    form.addEventListener("submit", function(e) {
        e.preventDefault();
        var email = form.querySelector("input[type='email']").value;
        if (validateEmail(email)) {
            form.submit();
        } else {
            alert("Please enter a valid email address.");
        }
    });
</script>