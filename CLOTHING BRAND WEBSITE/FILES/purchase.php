<?php
session_start();
include "config.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['checkout_btn'])) {

        $query_1 = "INSERT INTO `customer_details` (`customer_Name`, `customer_Email`, `customer_Phone`, `customer_Address`, `customer_delivery_type`, `COD`, `PAYMENT`,`product_status`) VALUES ('$_POST[Customer_Full_name]','$_POST[Customer_Email]','$_POST[Customer_Phone_number]','$_POST[Customer_Address]','$_POST[delivery_type]','$_POST[cash_on_delivery]','$_POST[total_delivery_cost]','$_POST[status_of_product]')";




        if (mysqli_query($con, $query_1)) {




            $customer_order_id = mysqli_insert_id($con);
            $query_2 = "INSERT INTO `customer_order_details` (`customer_order_id`,`customer_order_Product_Name`, `customer_order_price`, `customer_order_size`, `customer_order_quantity`) VALUES (?,?,?,?,?)";

            $stmt = mysqli_prepare($con, $query_2);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'isisi', $customer_order_id, $product_name, $product_price, $product_sizes, $product_quantity);

                foreach ($_SESSION['cart'] as $key => $values) {
                    $product_name = $values['product_name'];
                    $product_price = $values['product_price'];
                    $product_sizes = $values['product_sizes'];
                    $product_quantity = $values['product_quantity'];

                    mysqli_stmt_execute($stmt);
                    error_reporting(0);
                }

                unset($_SESSION['cart']);
                echo "<script>alert('order placed!')</script>";
                echo "
                        <!DOCTYPE html>
                <html lang='en'>

                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                     <link rel='stylesheet' href='../css/order_confirmed.css'>
                    <style>
                        <?php
                        include '../css/order_confirmed.css';
                        ?>
                    </style>
                    <title>Document</title>
                </head>

                <body>

                    <section class='order_confirmed_section'>

                        <div class='order_details_confirmed'>


                            <div class='confrim-order-hedaing'>ORDER DETAILS</div>

                            <div class='order-comp-main-divs'>
                                <div class='details-heading'>name</div>
                                <div class='details'>$_POST[Customer_Full_name]</div>
                            </div>

                            <div class='order-comp-main-divs'>
                                <div class='details-heading'>Order from</div>
                                <div class='details'>a</div>
                            </div>

                            <div class='order-comp-main-divs'>
                                <div class='details-heading'>Delivery address</div>
                                <div class='details'>a</div>
                            </div>

                        </div>



                        <div>a</div>
                        <div>b</div>
                        <div>c</div>


                    </section>



                </body>

                </html>
                ";
            } else {
                echo "<script>alert('sql prep error')</script>";
            }
        } else {
            echo "<script>alert('sql prep error')</script>";
        }
    }
}
?>


