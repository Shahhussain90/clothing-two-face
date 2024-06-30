<?php
session_start();
include "config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($Customer_Email,$Customer_Full_name)
{
    include "PHPMailer\PHPMailer.php";
    include "PHPMailer\SMTP.php";
    include "PHPMailer\Exception.php";

    $mail = new PHPMailer(true);
    try {
        //Server settings                   
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'shahhussain123.rizvi@gmail.com';                     //SMTP username
        $mail->Password   = 'oexu qmkq gvpd laty';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('shahhussain123.rizvi@gmail.com', 'TWO FACE');
        $mail->addAddress($Customer_Email);     //Add a recipient



        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'TWO FACE';
        $mail->Body    = "ORDER CONFIRMATION <br>

        your order has been confirmed <br>

        email: $Customer_Email <br>
        name: $Customer_Full_name <br>



            ";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['checkout_btn'])) {

        $query_1 = "INSERT INTO `customer_details` (`customer_Name`, `customer_Email`, `customer_Phone`, `customer_Address`, `customer_delivery_type`, `COD`, `PAYMENT`,`product_status`) VALUES ('$_POST[Customer_Full_name]','$_POST[Customer_Email]','$_POST[Customer_Phone_number]','$_POST[Customer_Address]','$_POST[delivery_type]','$_POST[cash_on_delivery]','$_POST[total_delivery_cost]','$_POST[status_of_product]')";

        $query = "SELECT * FROM `customer_details` WHERE `customer_Email`='$_POST[Customer_Email]'";
        mysqli_query($con, $query) && sendMail($_POST['Customer_Email'],$_POST['Customer_Full_name']);





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
                echo "<script>window.location.href = '../index.php'</script>";
            } else {
                echo "<script>alert('sql prep error')</script>";
            }
        } else {
            echo "<script>alert('sql prep error')</script>";
        }
    }
}





