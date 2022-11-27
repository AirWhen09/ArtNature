<?php
require 'connection/connection.php';
if(isset($_POST['auth']) && isset($_POST['email']) && isset($_POST['verify'])){
    $email = $_POST['email'];
    $auth = $_POST['auth'];

    $selEmail = $conn->query("SELECT code from users where email = '$email' and code = '$auth'");
    if($selEmail->num_rows > 0){
        $updateEmail = $conn->query("UPDATE users set status = 'ustts6' where email = '$email'");
        if($updateEmail){
            echo "<script>alert('Thanks.')</script>";
            echo "<script>window.location.href = 'landing.php?login'</script>";
        }else{
            echo "<script>alert('Verify Failed, Please Try Again later.')</script>";
        }
    }else{
        echo "<script>alert('Verify Failed, Please Try Again later 2.')</script>";
    }
}

if(isset($_POST['resend']) && isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $getCode = $conn->query("SELECT code from users where email = '$email'")->fetch_assoc();
    // $code = $row['otp_code'];
    $receiver = $email;
    $subject = "Email Verification ";
    $sender = "ARTNATURE";
         
    $body .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                    <html xmlns="http://www.w3.org/1999/xhtml">
                    <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    </head>
                    <body>
                <p>To verify your email address use this security code: '.$getCode.'

                Thanks,
                The Artnature Admin
    </body>
    </html>';

    $headers = "" .
            "Reply-To:" . $sender . "\r\n" .
            "X-Mailer: PHP/" . phpversion();
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";    
    $headers .= 'From: ' . $sender . "\r\n";
    if(mail($receiver, $subject, $body, $headers)){
    }else{
    echo "Sorry, failed while sending mail!";
    }
            
}

?>