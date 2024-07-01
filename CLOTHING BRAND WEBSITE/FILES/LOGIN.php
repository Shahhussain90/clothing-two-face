<?php
session_start();
include "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = $_POST['password'];
    
    $res = mysqli_query($con, "SELECT * FROM `register_1` WHERE email='$email'");
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        if (password_verify($password, $row['password'])) {
            $_SESSION['email'] = $email;
            if(isset($_POST['remember_me']))
            {
                setcookie('email', $_POST['email'], time() + (1*60*60*24*30), "/");
                setcookie('password', $_POST['password'], time() + (1*60*60*24*30), "/");
            }
            else
            {
                setcookie('email', "", time() - (1*60*60*24*30), "/");
                setcookie('password', "", time() - (1*60*60*24*30), "/");
            }
            header("Location: ../index.php");
            
          
        } else {
            echo "<script>alert('Wrong email or password')</script>";
        }
    } else {
        echo "<script>alert('Wrong email or password')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/LOGIN_REGISTER.css">
    <title>Login</title>
    <style>
         <?php include "../css/LOGIN_REGISTER.css" ?>
    </style>
</head>

<body>
    <form action="" method="post" class="LOGIN-FORM">
        <div class="LOGIN-HEADER">
            <h1>LOGIN</h1>
        </div>
        <div class="input-fields-div">
            <input type="email" class="inputs"  name="email" placeholder="Email" required>
            <input type="password" name="password" class="inputs"  placeholder="Password" required>
           
        </div>
        <div class="login-button-div">
            <button type="submit" name="btn-login" class="login-button">Sign in</button>
        </div>
        <div class="rememer_me">
                <input type="checkbox" name="remember_me"> &nbsp; <label for="remember_me">remember me</label>
        </div>
        <div class="FORGOT-PASS-DIV">
            <a href="FORGOT_PASS.php" class="Forgot-Password">Forgot Password?</a>
        </div>
        <div class="NO-ACCOUNT-TEXT-DIV">
            <p class="NO-ACCOUNT-TEXT">Don't have an account? <a href="register.php" class="NO-ACCOUNT-anchor">Register</a></p>
        </div>
    </form>
</body>

</html>
