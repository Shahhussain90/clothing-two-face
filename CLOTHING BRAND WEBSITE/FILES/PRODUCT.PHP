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
        <section class="shopping-cards-home grid-main">

            <div class="shopping-cards-div-home">


              
    
                        <a href="FILES/PRODUCT.php?product=<?php echo $row['product_id']; ?>"> <img src="../ADMIN PANEL/uploaded_img/<?php echo $row['product_image']; ?>" class="shirt-div" alt="<?php echo $row['product_alt_text']; ?>" /></a>

                




                    <div class="shirt-details">


                        <div class="shirt-hover-div" id="shirt-hover-div">

                            <div class="btn-dic-atc">
                                <form action="FILES/manage_cart.php" method="post" class="add-to-cart-form">

                                    <input type="hidden" name="product_id" value="<?php echo $row['product_id'] ?>">
                                    <input type="hidden" name="product_name" value="<?php echo $row['product_name'] ?>">
                                    <input type="hidden" name="product_price" value="<?php echo $row['product_price'] ?>">


                                    <div class="radio-boxes">
                                        <label for="product_sizes" class="radio-labels">S</label>
                                        <input type="radio" class="radios" value="small" name="product_sizes" required>

                                        <label for="product_sizes" class="radio-labels">M</label>
                                        <input type="radio" class="radios" value="medium" name="product_sizes" required>

                                        <label for="product_sizes" class="radio-labels">L</label>
                                        <input type="radio" class="radios" value="large" name="product_sizes" required>
                                    </div>

                                    <button type="submit" name="add_to_cart" class="shirt-cart-btn">Add To Cart</button>

                                </form>
                            </div>
                        </div>

                        <div class="INFO" id="INFO">
                            <h2 class="shirt-name"><?php echo $row['product_name'] ?></h2>
                            <div class="strike-align">
                                <h3 class="shirt-price">RS <?php echo $row['product_price'] ?></h3> &nbsp;
                                <strike>
                                    <h3 class="shirt-price">RS <?php echo $row['No_Discount_price'] ?></h3>
                                </strike>
                            </div>
                            <div>rating</div>
                        </div>



                    </div>

                </div>

            </div>



        </section>






    <?Php


    };

    ?>

    <?php
    include "footer.php";
    ?>

</body>

</html>