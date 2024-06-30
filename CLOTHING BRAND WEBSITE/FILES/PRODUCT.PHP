<?php
include "config.php";
if (isset($_GET['product'])) {
    $id = $_GET['product'];

    $select = mysqli_query($con, "SELECT * FROM main_products WHERE product_id=$id");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        <?php include "../css/product.css" ?>
    </style>
    <title>Document</title>
</head>

<body>
    <?php
    include "header.php";
    ?>

    <?Php

    if ($row = mysqli_fetch_assoc($select)) {

    ?>
        <section class="product-section-main">

            <div class="product-section-image">
                <div class="prod-img-div">
                    <a href="PRODUCT.php?product=<?php echo $row['product_id']; ?>"> <img src="../ADMIN PANEL/uploaded_img/<?php echo $row['product_image']; ?>" class="shirt-img" alt="<?php echo $row['product_alt_text']; ?>" /></a>
                </div>
            </div>

            <div class="product-info-section">

                <div class="product-heading">
                    <h1 class="product-name"><?php echo $row['product_name']; ?></h1>
                </div>

                <div class="product-price-div">
                    <h5 class="product-price">RS <?php echo $row['product_price'] ?></h5>
                    &nbsp;&nbsp;
                    <strike>
                        <h5 class="product-price-discount">RS <?php echo $row['No_Discount_price'] ?></h5>
                    </strike>
                </div>



                <form action="manage_cart.php" method="post" class="add-to-cart-form">

                    <input type="hidden" name="product_id" value="<?php echo $row['product_id'] ?>">
                    <input type="hidden" name="product_name" value="<?php echo $row['product_name'] ?>">
                    <input type="hidden" name="product_price" value="<?php echo $row['product_price'] ?>">


                    <div class="radio-boxes">
                        <!-- <div class="radios-divs"> -->
                        <label for="product_sizes" class="radio-labels">Small</label>
                        <input type="radio" class="radios" value="small" name="product_sizes" required>
                        <!-- </div> -->
                        <div class="radios-divs">
                            <label for="product_sizes" class="radio-labels">Medium</label>
                            <input type="radio" class="radios" value="medium" name="product_sizes" required>
                        </div>

                        <div class="radios-divs">
                            <label for="product_sizes" class="radio-labels">Large</label>
                            <input type="radio" class="radios" value="large" name="product_sizes" required>
                        </div>
                    </div>

                    <div class="get-in-days-div">Get it in 7 days</div>

                    <div class="product-cart-btn-div">
                        <button type="submit" name="add_to_cart" class="product-cart-btn">Add To Cart</button>
                    </div>
                </form>

                <div class="product-info-div">

                    <textarea name="" id="client_side_textarea" readonly>
                        <?php echo $row['product_description'] ?>
                    </textarea>
                </div>

                <div class="note-fabric">
                    <span class="note-heading">NOTE:</span><br>
                    <span class="note-detail">Color May Be Slightly Different from Product Image because of brightness of your screen.</span><br>
                    <a href="SHIPPINGANDDELIVERIES.php" class="note-anchor">SHIPPING & DELIVERIES</a>
                </div>

            </div>

        </section>






    <?Php


    };

    ?>








    <section class="disclaimer">

        <div class="disclaimer_boxes">
            <i class="fa fa-truck" id="discliamer-icon" aria-hidden="true"></i>
            <h6 class="disclaimer-h">Free Shipping</h6>
            <p class="disclaimer-p">Get Free Shipping on all orders over RS.8000</p>
        </div>

        <div class="disclaimer_boxes">
            <i class='bx bx-support' id="discliamer-icon"></i>
            <h6 class="disclaimer-h">Customer service</h6>
            <p class="disclaimer-p">contact us any time you need us!</p>
        </div>
        <div class="disclaimer_boxes">
            <i class='bx bxs-package' id="discliamer-icon"></i>
            <h6 class="disclaimer-h">Delivery time</h6>
            <p class="disclaimer-p">Get your delivery in less than 7 days</p>
        </div>

    </section>

    <!-- disclaimer ⬆️⬆️⬆️⬆️⬆️ -->




















    <?php
    include "footer.php";
    ?>

</body>

</html>