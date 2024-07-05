<?php

include "../FILES/config.php";
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
    <style>
        <?php
        include "../css/admin_login.css";
        ?>
    </style>
</head>

<body>


    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="admin_form">

        <div class="key">
            <i class="fa fa-key" aria-hidden="true"></i>
            <h1 class="admin_login">admin login</h1>
        </div>

        <div class="input_div">
            <label for="admin_name" class="input_label">Admin Name</label>
            <input type="text" class="admin_inputs" name="admin_name">
        </div>

        <div class="input_div">
            <label for="admin_password" class="input_label">Admin Password</label>
            <input type="text" class="admin_inputs" name="admin_password">
        </div>

        <div class="admin_login_button">
            <input type="submit" value="login" class="admin_btn" name="admin_login_button">
        </div>
        <!-- login forn admin ⬆️⬆️⬆️ -->

    </form>

    <?php

    function input_filter($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['admin_login_button'])) {

            // $admin_name = ;
            $admin_name = input_filter($_POST['admin_name']);
            $admin_password = input_filter($_POST['admin_password']);
            // $admin_password = $_POST['admin_password'];
            $admin_name = mysqli_real_escape_string($con, $admin_name);
            $admin_password = mysqli_real_escape_string($con, $admin_password);

            // $sqll = mysqli_query($con, "SELECT * FROM `admin_login` WHERE ADMIN_name = '$admin_name' && ADMIN_password = '$admin_password'");
            $query = "SELECT * FROM `admin_login` WHERE ADMIN_name = ? && ADMIN_password = ?";

            if($stmt = mysqli_prepare($con, $query)){
                
                mysqli_stmt_bind_param($stmt, "ss", $admin_name, $admin_password);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt)== 1){
                    session_start();
                    $_SESSION['Adminlogid'] = $_POST['admin_name'];
                    header('location:ADMIN_index.php');
                }
                else{
                    echo "<script>alert('Invalid Admin Name or Password')</script>";
                }
            }
            else{
                echo "<script>alert('not prepped')</script>";
            };

            // if (mysqli_num_rows($sqll) == 1) {
                // session_start();
                // $_SESSION['Adminlogid'] = $_POST['admin_name'];
                // header('location:ADMIN_index.php');
            // } else {
            //     echo "<script>alert('Invalid Credentials')</script>";
            // }
        }
    };


    ?>




</body>

</html>