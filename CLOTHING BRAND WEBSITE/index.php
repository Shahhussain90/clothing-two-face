<?php
include "FILES/config.php";
session_start();
// if (!isset($_SESSION['email'])) {
//     header('location:FILES/LOGIN.php');
// }
// if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
//     $id = $_COOKIE['email'];
//     $pass = $_COOKIE['password'];
// } else {
//     $id = "";
//     $pass = "";
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/index.css">
    <style>
        <?php include "css/index.css" ?>
    </style>
    <title></title>
</head>

<body>
    <?php
    include "header.php";
    ?>



    <section class="section-1">
       
    </section>




    <section class="shopping-cards-home grid-main">
        <?php

        $select = mysqli_query($con, "SELECT * FROM main_products");

        while ($row = mysqli_fetch_assoc($select)) {

        ?>

            <div class="shopping-cards-div-home">


                <div class="home-cards" id="home-cards">
                    <div class="card-image-div">
                        <!-- <div class="new-tag">
                            <div class="new-txt">NEW</div>
                        </div> -->


                        <a href="FILES/PRODUCT.php?product=<?php echo $row['product_id']; ?>"> <img src="ADMIN PANEL/uploaded_img/<?php echo $row['product_image']; ?>" class="shirt-div" alt="<?php echo $row['product_alt_text']; ?>" /></a>

                    </div>




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
                            <!-- <div>rating</div> -->
                        </div>



                    </div>

                </div>

            </div>
        <?Php


        };

        ?>


    </section>
    <!-- products section 🔼🔼🔼🔼🔼🔼 -->







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









    <div class="email-subscribe-div">
        <div class="email-text">Subscribe to the Two FACE Email
            to be notified of limited discounts and
            important news.</div>

        <form action="FILES/subscribe_email.php" method="post" class="subscribe-email-form">
            <input type="email" placeholder="ENTER YOUR EMAIL" name="subscribeemail" class="subscribe-email">
            <button type="submit" class="subscribe-email-button" name="subscribe_email_button">SUBSCRIBE</button>
        </form>

    </div>
    <!-- subscribe  🔼🔼🔼🔼🔼🔼-->







    <?php
    include "footer.php";
    ?>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            // $(".home-cards").mouseenter(function(){
            //     $(".shirt-hover-div").fadeIn(700);
            //     $(".INFO").hide(0);

            // })
            // $(".home-cards").mouseleave(function(){
            //     $(".shirt-hover-div").hide(0);
            //     $(".INFO").fadeIn(700);

            // })






        })
    </script>


</body>

</html>