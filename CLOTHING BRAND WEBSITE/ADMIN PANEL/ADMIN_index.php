<?php

include "../FILES/config.php";
session_start();
session_regenerate_id(true);
if (!isset($_SESSION['Adminlogid'])) {
    header('location:ADMIN_LOGIN.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php
        include "../css/admin_index.css";
        ?>
    </style>
</head>

<body>

    <?php
    include "nav_sidebar.php";
    ?>


    <section class="dashboard_admin_panel">

        <div class="logout_div">
            <div class="page-heading-div">
                <h1>DASHBOARD</h1>
            </div>
            <form method="post" class="logout-btn-form">
                <button type="submit" name="LogOut" class="logout_button">logout</button>
            </form>
        </div>
        <!-- logout btn and page header ⬆️⬆️⬆️ -->



        <div class="grid_admin_index">

            <div class="grid_admin_index_boxes">
                <?php
                $NumOfPeople = mysqli_query($con, "SELECT COUNT(*) as count FROM register_1");

                if (mysqli_num_rows($NumOfPeople) > 0) {
                    $row = mysqli_fetch_assoc($NumOfPeople);
                    $count = $row['count'];
                    echo "Number of people: $count";
                } else {
                    echo "No people found";
                }
                ?>
            </div>


            <div class="grid_admin_index_boxes">
                b
            </div>

            <div class="grid_admin_index_boxes">
                c
            </div>

            <div class="grid_admin_index_boxes">
                c
            </div>
            <div class="grid_admin_index_boxes">
                c
            </div>
            <div class="grid_admin_index_boxes">
                c
            </div>
            <div class="grid_admin_index_boxes">
                c
            </div>  


        </div>






    </section>











    <?php
    if (isset($_POST['LogOut'])) {
        session_destroy();
        error_reporting(0);
        header("location:ADMIN_LOGIN.php");
    }

    ?>

</body>

</html>