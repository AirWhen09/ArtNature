<?php
if(isset($_SESSION['email'])){

}

if(isset($_GET['auth']) && isset($_GET['email'])){
    $email = $_GET['email'];
    $auth = $_GET['auth'];

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
                <p>Welcome to Online Research Repository System. Your new account comes with access to CBSUA Unpublished Researches. Please click/copy the link below to verify your account.</p><br>
                    <a href="https://orrssystem.000webhostapp.com/orrs/verify.php?account='.$getCode.'" target="_BLANK">https://orrssystem.000webhostapp.com/orrs/verify.php?account='.$getCode.'</a>
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