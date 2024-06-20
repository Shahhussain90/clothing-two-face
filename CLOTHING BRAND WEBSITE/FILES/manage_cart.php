<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_to_cart'])) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        $myItems = array_column($_SESSION['cart'], 'product_name');
        if (in_array($_POST['product_name'], $myItems)) {
            echo "<script>alert('Product is already in cart')</script>";
            // print_r($_SESSION['cart']);
            header('Location: ../index.php');
            exit; // Don't forget to exit after setting the header
        } else {
            $count = count($_SESSION['cart']);
            $_SESSION['cart'][$count] = array(
                'product_name' => $_POST['product_name'],
                'product_price' => $_POST['product_price'],
                'product_sizes' => $_POST['product_sizes'],
                'product_quantity' => 1
            );
            echo "<script>alert('Product added to cart')</script>";
        }
       
    }
    if(isset($_POST['remove_button'])){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['product_name'] == $_POST['product_name']){
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
            }
        }
    }
}
?>