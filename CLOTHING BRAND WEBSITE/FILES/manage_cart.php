<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add_to_cart"])) {
        if (isset($_SESSION['cart'])) {
            $product_names = array_column($_SESSION['cart'], 'product_name');

            if (in_array($_POST['product_name'], $product_names)) {
                echo "<script>
                    alert('item already added')
                    window.location.href='../index.php'
                    </script>";
            } else {

                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('product_name' => $_POST['product_name'], 'product_price' => $_POST['product_price'], 'product_sizes' => $_POST['product_sizes'], 'product_quantity' => 1);
                echo "<script>
               alert('item added')
               window.location.href='../index.php'
               </script>";
            }
        }
         else {
            $_SESSION['cart'][0] = array('product_name' => $_POST['product_name'], 'product_price' => $_POST['product_price'], 'product_sizes' => $_POST['product_sizes'], 'product_quantity' => 1);
            echo "<script>
                alert('item added')
                window.location.href='../index.php'
                </script>";
        }
    }



    if (isset($_POST['remove_button'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['product_name'] == $_POST['product_name']) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                echo "<script>
                window.location.href='ADD_TO_CART.php'
                </script>";
            }
        }
    }

    // if(isset($_POST['mod_quantity'])){
    //     foreach($_SESSION['cart'] as $key => $value){
    //         $_SESSION['cart'][$key]['product_quantity']=$_POST['mod_quantity'];
    //        echo "<script>window.location.href='ADD_TO_CART.php'</script>";
    //     }
    // }

    if (isset($_POST['mod_quantity'])) {
        foreach ($_SESSION['cart'] as $key => $value) {

            if ($value['product_name'] == $_POST['product_name'] && $value['product_sizes'] == $_POST['product_sizes']) {
                $_SESSION['cart'][$key]['product_quantity'] = $_POST['mod_quantity'];

                echo "<script>
           window.location.href='ADD_TO_CART.php'
           </script>";
            }
        }
    }
}
