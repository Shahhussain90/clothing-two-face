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
                    echo "
                        <div class='grid-box-inner-div'>
                            <div>
                                <i class='bx bx-user-pin'></i>
                            </div>
                            
                            <div class='box-text'>
                               Total Users: <h2>$count</h2>
                            </div>
                         
                        </div>

                    ";

                } 
                else {
                    echo "
                    <div class='grid-box-inner-div'>
                        <div>
                            <i class='bx bx-user-pin'></i>
                        </div>
                        
                        <div>
                           Total Users: <h2>No people found</h2>
                        </div>
                     
                    </div>

                ";
                }
                ?>
            </div>


            <div class="grid_admin_index_boxes">
                <?php
                $NumOfShirtsOrdered = mysqli_query($con, "SELECT COUNT(*) as count FROM customer_order_details");

                if (mysqli_num_rows($NumOfShirtsOrdered) > 0) {
                    $row = mysqli_fetch_assoc($NumOfShirtsOrdered);
                    $count = $row['count'];
                    echo "
                    <div class='grid-box-inner-div'>
                        <div>
                            <i class='bx bxs-t-shirt t-shirt'></i>
                        </div>
                        
                        <div class='box-text'>
                           Number of Shirts Ordered: <h2>$count</h2>
                        </div>
                     
                    </div>

                ";

                } else {
                   
                    echo "
                    <div class='grid-box-inner-div'>
                        <div>
                            <i class='bx bx-user-pin'></i>
                        </div>
                        
                        <div>
                           Number of Shirts Ordered: <h2>No orders found</h2>
                        </div>
                     
                    </div>

                ";
                }
                ?>
            </div>

            <div class="grid_admin_index_boxes">
                <?php

                $PAYMENT = mysqli_query($con, "SELECT SUM(PAYMENT) AS total_payment FROM customer_details");

                if (mysqli_num_rows($PAYMENT) > 0) {
                    $row = mysqli_fetch_assoc($PAYMENT);
                    $count = $row['total_payment'];

                    echo "
                    <div class='grid-box-inner-div'>
                        <div>
                            <i class='bx bxs-t-shirt t-shirt'></i>
                        </div>
                        
                        <div class='box-text'>
                           Sales: <h2>$count RS</h2>
                        </div>
                     
                    </div>

                ";


                } else {
                    echo "
                    <div class='grid-box-inner-div'>
                        <div>
                            <i class='bx bx-user-pin'></i>
                        </div>
                        
                        <div>
                           Sales: <h2>NO SALE</h2>
                        </div>
                     
                    </div>

                ";
                }
                ?>
            </div>

            <div class="grid_admin_index_boxes">
                <?php

                // Assuming $con is a valid MySQLi connection

                $most_sold_shirts = mysqli_query($con, "SELECT customer_order_Product_Name, COUNT(*) as count FROM customer_order_details GROUP BY customer_order_Product_Name ORDER BY count DESC LIMIT 1;");

                if (mysqli_num_rows($most_sold_shirts) > 0) {
                    $row = mysqli_fetch_assoc($most_sold_shirts);
                    // echo "Most sold shirt: " . $row['customer_order_Product_Name'] . " with " . $row['count'] . " orders";
                    
                    echo "
                    <div class='grid-box-inner-div'>
                        <div>
                            <i class='bx bx-user-pin'></i>
                        </div>
                        
                        <div class='box-text'>
                           Most sold shirt: <h2>$row[customer_order_Product_Name]</h2> with $row[count] orders
                        </div>
                     
                    </div>

                ";
                
                } else {
                    echo "No Most sold shirt found";
                }

                ?>
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