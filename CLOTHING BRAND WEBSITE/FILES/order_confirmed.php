<?php

include "config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <style>
        <?php
        include '../css/order_confirmed.css';
        ?>
    </style>
    <title>Document</title>
</head>

<body>

    <section class="order_confirmed_section">

        <div class="order_details_confirmed">


            <div class="confrim-order-hedaing">ORDER DETAILS</div>

            <div class="order-comp-main-divs">
                <div class="details-heading">Order number</div>
                <div class="details">
                    <?php
                    $query = "SELECT * FROM `customer_details` WHERE ";
                    $user_result = mysqli_query($con, $query);
                    while ($user_fetch = mysqli_fetch_assoc($user_result)) {
                        echo "  
                    
                        $user_fetch[customer_id]
                       
                         
                       
                    
                      
                   
                    ";
                    } ?>
                </div>
            </div>

            <div class="order-comp-main-divs">
                <div class="details-heading">Order from</div>
                <div class="details">a</div>
            </div>

            <div class="order-comp-main-divs">
                <div class="details-heading">Delivery address</div>
                <div class="details">a</div>
            </div>

        </div>



        <div>a</div>
        <div>b</div>
        <div>c</div>


    </section>



</body>

</html>