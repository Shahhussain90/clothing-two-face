<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>

<body>

    <table>

        <thead>
            <tr>
                <th>Serial No.</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>TOTAL</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

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
                                    <form>
                                    <td><input type='number' min='0' max='15' class='iquantity' onchange='subtotal()' value='$value[product_quantity]'></td>
                                   </form>
                                    <td class='itotal'>$sr</td>
                                    <td>
                                        <form action='manage_cart.php' method='post'>
                                            <button name='remove_button'>Remove</button>
                                            <input type='hidden' name='product_name' value='$value[product_name]'>
                                            <input type='hidden' name='product_price' value='$value[product_price]'>
                                            <input type='hidden' name='product_sizes' value='$value[product_sizes]'>
                                            <input type='hidden' name='product_quantity' value='$value[product_quantity]'>
                                        </form>
                                    </td>
                                </tr>
                            ";
                }
            }
            ?>

        </tbody>



    </table>

    <div>
        <h4 id="ytotal"></h4>
    </div>

    <script>

        var gt = 0;
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');
        var itotal = document.getElementsByClassName('itotal');
        var ytotal = document.getElementById('ytotal');

        function subtotal(){
            gt = 0;
            for(var i = 0; i < iprice.length; i++){

                itotal[i].innerText = (iprice[i].value)*(iquantity[i].value);
                gt = gt + (iprice[i].value * iquantity[i].value);
                ytotal.innerText=gt;
            }
        }
        subtotal();

    </script>


</body>

</html>