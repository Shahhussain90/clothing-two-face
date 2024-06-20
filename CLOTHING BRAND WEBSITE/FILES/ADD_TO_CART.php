<?php
include "config.php";
session_start();
if (!isset($_SESSION['email'])) {
    header('location:LOGIN.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/cart.css">
    <style>
        <?php include "../css/cart.css" ?>
    </style>
    <title>Cart</title>
</head>

<body>
    <?php
    include "header.php";
    ?>

    <section class="cart-items-section">

        <table class="table">

            <thead class="text-center">
                <tr>
                    <th scope="col">Serial No.</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Size</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody class="text-center">

                <?php
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => $value) {
                        $sr = $key + 1;

                        echo "
                                <tr>    
                                    <td>$sr</td>
                                    <td>$value[product_name]</td>
                                     
                                    <td>$value[product_price]<input type='hidden' class='iprice' value='$value[product_price]'></td>
                                     
                                    <td>$value[product_sizes]</td>
                                    <form method='post' action='manage_cart.php'>
                                        <td><input type='number' min='0' max='15' class='iquantity text-center' onchange='this.form.submit()' name='mod_quantity' value='$value[product_quantity]'></td>
                                        <input type='hidden' name='product_name' value='$value[product_name]'>
                                         <input type='hidden' name='product_sizes' value='$value[product_sizes]'>
                                   </form>
                                    <td class='itotal'>$sr</td>
                                    <td>
                                        <form action='manage_cart.php' method='post'>
                                            <button name='remove_button'>Remove</button>
                                            <input type='hidden' name='product_name' value='$value[product_name]'>
                                           
                                        </form>
                                    </td>
                                </tr>
                            ";
                    }
                }
                ?>

            </tbody>



        </table>

        <div class="checkout-div">
            <h4 id="ytotal"></h4>
        </div>


    </section>











    <?php
    include "footer.php";
    ?>

    <script>
        var gt = 0;
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');
        var itotal = document.getElementsByClassName('itotal');
        var ytotal = document.getElementById('ytotal');

        function subtotal() {
            gt = 0;
            for (var i = 0; i < iprice.length; i++) {

                itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);
                gt = gt + (iprice[i].value * iquantity[i].value);
                ytotal.innerText = gt;
            }
        }
        subtotal();
    </script>
</body>

</html>