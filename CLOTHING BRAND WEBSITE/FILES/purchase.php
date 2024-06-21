<?php
session_start();
include "config.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['checkout_btn'])) {

        $query_1 = "INSERT INTO `customer_details` (`customer_Name`, `customer_Email`, `customer_Phone`, `customer_Address`, `customer_delivery_type`, `COD`, `PAYMENT`) VALUES ('$_POST[Customer_Full_name]','$_POST[Customer_Email]','$_POST[Customer_Phone_number]','$_POST[Customer_Address]','$_POST[delivery_type]','$_POST[cash_on_delivery]','$_POST[total_delivery_cost]')";

        if (mysqli_query($con, $query_1)) {

            $customer_order_id = mysqli_insert_id($con);
            $query_2 = "INSERT INTO `customer_order_details` (`customer_order_id`,`customer_order_Product_Name`, `customer_order_price`, `customer_order_size`, `customer_order_quantity`) VALUES (?,?,?,?,?)";

            $stmt = mysqli_prepare($con, $query_2);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt,'isisi',$customer_order_id,$product_name,$product_price,$product_sizes,$product_quantity);

                foreach($_SESSION['cart'] as $key => $values) {
                    $product_name = $values['product_name'];
                    $product_price = $values['product_price'];
                    $product_sizes = $values['product_sizes'];
                    $product_quantity = $values['product_quantity'];

                    mysqli_stmt_execute($stmt);
                    error_reporting(0);
                }

                unset($_SESSION['cart']);
                echo "<script>alert('order placed!')</script>";
            } else {
                echo "<script>alert('sql prep error')</script>";
            }
        } else {
            echo "<script>alert('sql prep error')</script>";
        }
    }
}
