<?php
session_start();

include "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    // Check if the email already exists in the database
    $query = mysqli_query($con, "SELECT `email` FROM `register_1` WHERE email='$email'");
    if (mysqli_num_rows($query) != 0) {
        echo "<script>alert('Email already exists')</script>";
    } else {
        // Insert the new user into the database
        $result = mysqli_query($con, "INSERT INTO `register_1` (`username`,`email`,`password`) VALUES ('$username','$email', '$password_hashed')") or die("error");
        if ($result) {
            echo "<script>alert('Registration successful')</script>";
        } else {
            echo "<script>alert('Error inserting data')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/LOGIN_REGISTER.css">
    <title>Register</title>
    <style>
        <?php include "../css/LOGIN_REGISTER.css" ?>
    </style>
</head>

<body>
    <form action="" method="post" class="REGISTER-FORM">
        <div class="REGISTER-HEADER">
            <h1>Register</h1>
        </div>
        <div class="input-fields-div register-field-div">
            <input type="text" name="username" class="inputs" placeholder="name" required>
            <input type="email" name="email" class="inputs" placeholder="Email" required>
            <input type="password" name="password" class="inputs" placeholder="Password" required>
        </div>
        <div class="register-button-div">
            <input type="submit" name="submit" class="register-button" value="Register">
        </div>
        <div class="ALREADY-HAVE-AN-ACCOUNT-DIV">
            <p class="ALREADY-HAVE-AN-ACCOUNT-TEXT">Already have an account? <a href="LOGIN.php" class="HAVE-ACCOUNT-anchor">Login</a></p>
        </div>
    </form>
</body>

</html>