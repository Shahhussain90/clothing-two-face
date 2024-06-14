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


    <?php
    include "config.php";

    if (isset($_GET['email']) && isset($_GET['resettoken'])) {
        date_default_timezone_set('Asia/Karachi');
        $date = date("Y-m-d");
        $query = "SELECT `email` FROM `register_1` WHERE `email`='$_GET[email]' AND `resettoken`='$_GET[resettoken]' AND `resettokenExpires`='$date'";

        $result = mysqli_query($con, $query);
        if ($result) {
            if (mysqli_num_rows($result) == 1) {

                echo "
                <form method='post' class='forgot-pass-FORM'>
                    <h3 class='forgot-pass-HEADER'>create new password</h3>
                    <div class='input-fields-div'>
                        <input type='password' class='inputs' name='password' placeholder='Password' required>
                    </div>
                    <div class='login-button-div'>
                    <button type='submit' class='forgot-button' name='update_password_btn'>update</button>
                    </div>
                    <input type='hidden' name='email' value='$_GET[email]'>
                </form>
                ";
            } else {
                echo "<script>alert('Invalid or Expired link')</script>";
            }
        } else {
            echo "<script>alert('server down')</script>";
        }
    } else {
        echo "<script>alert('Invalid or Expired link')</script>";
    }


    if (isset($_POST['update_password_btn'])) {

        $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $update = "UPDATE `register_1` SET `password`='$pass',`resettoken`=NULL,`resettokenExpires`=NULL WHERE email='$_POST[email]'";
        if (mysqli_query($con, $update)) {
            echo "<script>alert('password updated')</script>";
        } else {
            echo "<script>alert('server down')</script>";
        }
    }

    ?>


</body>

</html>