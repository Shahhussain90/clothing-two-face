<?php
include "config.php";
session_start();
if (!isset($_SESSION['email'])) {
    header('location:LOGIN.php');
}
if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
    $id = $_COOKIE['email'];
    $pass = $_COOKIE['password'];
} else {
    $id = "";
    $pass = "";
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
                                            <button name='remove_button' class='remove_button'>Remove</button>
                                            <input type='hidden' name='product_name' value='$value[product_name]'>
                                             <input type='hidden' name='product_sizes' value='$value[product_sizes]'>
                                           
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
            <div class="checkout-heading-div">
                <h1 class="checkout-heading">CHECKOUT</h1>
            </div>
            <form action="" method="POST" class="checkout-form">

                <input type="text" class="checkout-inputs" name="" placeholder="Full name" required>
                <input type="email" class="checkout-inputs" name="" placeholder="Email" required>
                <input type="number" class="checkout-inputs" name="" placeholder="Phone number" required>
                <input type="text" class="checkout-inputs" name="" placeholder="Address" required>
                <div class="radio-boxes-checkout">
                    <div>
                        <label for="delivery_type" class="radio-labels-checkout">normal delivery (RS300)</label>
                        <input type="radio" class="radios-checkout" id="radio_normal" value="normal delivery" name="delivery_type" required>
                    </div>
                    <div>
                        <label for="delivery_type" class="radio-labels-checkout">express delivery (RS600)</label>
                        <input type="radio" class="radios-checkout" id="radio_express" value="express delivery" name="delivery_type" required>
                    </div>
                    <div>
                        <label for="delivery" class="radio-labels-checkout">cash on delivery</label>
                        <input type="radio" checked="checked" class="radios-checkout" value="cash on delivery" name="delivery" required>
                    </div>
                </div>


                <div class="total-div">
                    <input type="text" id="ytotal" name="total_cost" disabled>
                    <div id="delivery-checkout">Delivery charges: not included in subtotal</div>
                </div>


                <div class="checkout_btn_div">
                    <button type="submit" class="checkout_btn">submit</button>
                </div>


            </form>




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
                ytotal.value = "subtotal : " + gt;
            }
        }
        subtotal();
        af = Number(gt)
       
        


    </script>
</body>

</html>