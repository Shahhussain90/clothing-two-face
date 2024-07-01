<?php
include "config.php";
session_start();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/other.css">
    <style>
        <?php include "../css/ALL_SHIRTS_COLLECTION.css" ?>
    </style>

    <title>Document</title>
</head>

<body>
    <?php
    include "header.php";
    ?>

    <div class="search-filter-div">
        <i class='bx bx-search-alt-2'></i> <input type="text" id="searchInput" class="search_inp_filter" onkeyup="filterProducts()" placeholder="Search for products...">
    </div>


    <section class="shopping-cards-home grid-main all-shirts-sec">
        <?php

        $select = mysqli_query($con, "SELECT * FROM all_products");

        while ($row = mysqli_fetch_assoc($select)) {

        ?>

            <div class="shopping-cards-div-home">


                <div class="home-cards" id="home-cards">
                    <div class="card-image-div">
                        <!-- <div class="new-tag">
                            <div class="new-txt">NEW</div>
                        </div> -->


                        <a href="all_product_pg.php?product=<?php echo $row['product_id']; ?>"> <img src="../ADMIN PANEL/uploaded_img/<?php echo $row['product_image']; ?>" class="shirt-div" alt="<?php echo $row['product_alt_text']; ?>" /></a>
                    </div>




                    <div class="shirt-details">


                        <div class="shirt-hover-div" id="shirt-hover-div">

                            <div class="btn-dic-atc">
                                <form action="manage_cart.php" method="post" class="add-to-cart-form">

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
                            <!-- <div>rating</div> -->
                        </div>



                    </div>

                </div>

            </div>
        <?Php


        };

        ?>


    </section>







    <?php
    include "footer.php";
    ?>

    <script>
        function filterProducts() {
            // Get the value of the input field
            let input = document.getElementById('searchInput').value.toLowerCase();

            // Get all product cards
            let productCards = document.getElementsByClassName('shopping-cards-div-home');

            // Loop through the product cards and hide those that don't match the search query
            for (let i = 0; i < productCards.length; i++) {
                let productName = productCards[i].getElementsByClassName('shirt-name')[0].innerText.toLowerCase();

                if (productName.indexOf(input) > -1) {
                    productCards[i].style.display = '';
                } else {
                    productCards[i].style.display = 'none';
                }
            }
        }
    </script>



</body>

</html>