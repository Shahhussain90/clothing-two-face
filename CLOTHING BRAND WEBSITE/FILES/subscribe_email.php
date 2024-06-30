<?php
include "config.php";

if (isset($_POST['subscribe_email_button'])) {
    $email_sub = mysqli_real_escape_string($con, $_POST['subscribeemail']);

    // Add email filter to validate the input email address
    if (!filter_var($email_sub, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Error: Invalid email address')</script>";
        exit;
    }

    $query = "INSERT INTO `subscribe_email`(`email`) VALUES ('$email_sub')";
    mysqli_query($con, $query);

    if (mysqli_affected_rows($con) > 0) {
        header('location:../index.php');
        exit;
    } else {
        echo "Error: ". mysqli_error($con);
    }
}
?>