<?php

include "config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($forgot_email, $reset_token)
{
    include "PHPMailer\PHPMailer.php";
    include "PHPMailer\SMTP.php";
    include "PHPMailer\Exception.php";

    $mail = new PHPMailer(true);
    try {
        //Server settings                   
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'shahhussain123.rizvi@gmail.com';                     //SMTP username
        $mail->Password   = 'oexu qmkq gvpd laty';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('shahhussain123.rizvi@gmail.com', 'Mailer');
        $mail->addAddress($forgot_email);     //Add a recipient
      
      

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'password reset link';
        $mail->Body    = "We got a reset request from you to reset your password <br>
           click the link below <br>
           <a href='http://localhost/CLOTHING BRAND WEBSITE/FILES/updatepassword.php?email=$forgot_email&resettoken=$reset_token'>Reset password</a> ";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
       return true;
    } catch (Exception $e) {
       return false;
    }
}


if (isset($_POST['forgot_pass_btn'])) {

    $query = "SELECT * FROM `register_1` WHERE `email`='$_POST[forgot_email]'";
    $result = mysqli_query($con, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {

            $reset_token = bin2hex(random_bytes(16));
            date_default_timezone_set('Asia/Karachi');
            $date = date("Y-m-d");
            $query = "UPDATE `register_1` SET `resettoken`='$reset_token',`resettokenExpires`='$date' WHERE `email`='$_POST[forgot_email]'";
            if (mysqli_query($con, $query) && sendMail($_POST['forgot_email'],$reset_token)) {
                echo "<script>alert('Password reset link send!')</script>";
            } 
            else {
                echo "<script>alert('Server down! try again later')</script>";
            }
        } else {
            echo "<script>alert('Email Not Found')</script>";
        }
    } else {
        echo "<script>alert('Email Not Found')</script>";
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php include "../css/LOGIN_REGISTER.css" ?>
    </style>
</head>

<body>

    <form action="" method="POST" class="forgot-pass-FORM">
        <div class="forgot-pass-HEADER">
            <h1>FORGOT PASSWORD</h1>
        </div>
        <div class="input-fields-div">
            <input type="email" class="inputs" name="forgot_email" placeholder="Email" required>
        </div>
        <div class="forgot-pass-button-div">
            <button type="submit" name="forgot_pass_btn" class="forgot-button">RESET</button>
        </div>
    </form>

</body>

</html>