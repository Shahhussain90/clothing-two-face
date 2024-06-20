<?php
include "FILES/config.php";
session_start();
if (!isset($_SESSION['email'])) {
    header('location:FILES/LOGIN.php');
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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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







        <div class="shopping-cards-div-home">


            <div class="home-cards" id="home-cards">



                <div class="card-image-div">
                    <div class="new-tag">
                        <div class="new-txt">NEW</div>
                    </div>

                    <img src="IMAGES/shirt-1.jpg" class="shirt-div" alt="">
                </div>


                <div class="shirt-details">


                    <div class="shirt-hover-div" id="shirt-hover-div">

                        <div class="btn-dic-atc">
                            <form action="FILES/manage_cart.php" method="post" class="add-to-cart-form">

                                <input type="hidden" name="product_id" value="1">
                                <input type="hidden" name="product_name" value="men graphic T-shirt">
                                <input type="hidden" name="product_price" value="1500">
                            

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
                        <h2 class="shirt-name">men graphic T-shirt</h2>
                        <div class="strike-align">
                            <h3 class="shirt-price">RS.1500</h3> &nbsp;
                            <strike><h3 class="shirt-price">RS.2500</h3></strike>
                        </div>
                        <div>rating</div>
                    </div>



                </div>
            </div>

        </div>





        <div class="shopping-cards-div-home">


            <div class="home-cards" id="home-cards">



                <div class="card-image-div">
                    <div class="new-tag">
                        <div class="new-txt">NEW</div>
                    </div>

                    <img src="IMAGES/shirt-1.jpg" class="shirt-div" alt="">
                </div>


                <div class="shirt-details">


                    <div class="shirt-hover-div" id="shirt-hover-div">

                        <div class="btn-dic-atc">
                            <form action="check.php" method="post" class="add-to-cart-form">

                                <input type="hidden" name="product_id" value="1">
                                <input type="hidden" name="product_name" value="men graphic T-shirt">
                                <input type="hidden" name="product_price" value="1500">
                                <div class="radio-boxes">
                                    <label for="" class="radio-labels">S</label>
                                    <input type="radio" class="radios" value="small" name="sizes">

                                    <label for="" class="radio-labels">M</label>
                                    <input type="radio" class="radios" value="medium" name="sizes">

                                    <label for="" class="radio-labels">L</label>
                                    <input type="radio" class="radios" value="large" name="sizes">
                                </div>
                                <button type="submit" name="add-to-cart" class="shirt-cart-btn">Add To Cart</button>
                            </form>
                        </div>
                    </div>


                    <div class="INFO" id="INFO">
                        <h2 class="shirt-name">men graphic T-shirt</h2>
                        <h3 class="shirt-price">RS.1500</h3>
                    </div>

                </div>
            </div>

        </div>



        <div class="shopping-cards-div-home">


            <div class="home-cards" id="home-cards">



                <div class="card-image-div">
                    <div class="new-tag">
                        <div class="new-txt">NEW</div>
                    </div>

                    <img src="IMAGES/shirt-1.jpg" class="shirt-div" alt="">
                </div>


                <div class="shirt-details">


                    <div class="shirt-hover-div" id="shirt-hover-div">

                        <div class="btn-dic-atc">
                            <form action="check.php" method="post" class="add-to-cart-form">

                                <input type="hidden" name="product_id" value="1">
                                <input type="hidden" name="product_name" value="men graphic T-shirt">
                                <input type="hidden" name="product_price" value="1500">
                                <div class="radio-boxes">
                                    <label for="" class="radio-labels">S</label>
                                    <input type="radio" class="radios" value="small" name="sizes">

                                    <label for="" class="radio-labels">M</label>
                                    <input type="radio" class="radios" value="medium" name="sizes">

                                    <label for="" class="radio-labels">L</label>
                                    <input type="radio" class="radios" value="large" name="sizes">
                                </div>
                                <button type="submit" name="add-to-cart" class="shirt-cart-btn">Add To Cart</button>
                            </form>
                        </div>
                    </div>


                    <div class="INFO" id="INFO">
                        <h2 class="shirt-name">men graphic T-shirt</h2>
                        <h3 class="shirt-price">RS.1500</h3>
                    </div>

                </div>
            </div>

        </div>






        <div class="shopping-cards-div-home">


            <div class="home-cards" id="home-cards">



                <div class="card-image-div">
                    <div class="new-tag">
                        <div class="new-txt">NEW</div>
                    </div>

                    <img src="IMAGES/shirt-3.jpg" class="shirt-div" alt="">
                </div>


                <div class="shirt-details">


                    <div class="shirt-hover-div" id="shirt-hover-div">

                        <div class="btn-dic-atc">
                            <form action="" method="post" class="add-to-cart-form">

                                <input type="hidden" name="product_id" value="1">
                                <input type="hidden" name="product_name" value="men graphic T-shirt">
                                <input type="hidden" name="product_price" value="1500">
                                <div class="radio-boxes">
                                    <label for="" class="radio-labels">S</label>
                                    <input type="radio" class="radios" value="small" name="sizes">

                                    <label for="" class="radio-labels">M</label>
                                    <input type="radio" class="radios" value="medium" name="sizes">

                                    <label for="" class="radio-labels">L</label>
                                    <input type="radio" class="radios" value="large" name="sizes">
                                </div>
                                <button type="submit" class="shirt-cart-btn">Add To Cart</button>
                            </form>
                        </div>
                    </div>


                    <div class="INFO" id="INFO">
                        <h2 class="shirt-name">men graphic T-shirt</h2>
                        <h3 class="shirt-price">RS.1500</h3>
                    </div>

                </div>
            </div>

        </div>


        <div class="shopping-cards-div-home">


            <div class="home-cards" id="home-cards">



                <div class="card-image-div">
                    <div class="new-tag">
                        <div class="new-txt">NEW</div>
                    </div>

                    <img src="IMAGES/shirt-2.jpg" class="shirt-div" alt="">
                </div>


                <div class="shirt-details">


                    <div class="shirt-hover-div" id="shirt-hover-div">

                        <div class="btn-dic-atc">
                            <form action="" method="post" class="add-to-cart-form">

                                <input type="hidden" name="product_id" value="1">
                                <input type="hidden" name="product_name" value="men graphic T-shirt">
                                <input type="hidden" name="product_price" value="1500">
                                <div class="radio-boxes">
                                    <label for="" class="radio-labels">S</label>
                                    <input type="radio" class="radios" value="small" name="sizes">

                                    <label for="" class="radio-labels">M</label>
                                    <input type="radio" class="radios" value="medium" name="sizes">

                                    <label for="" class="radio-labels">L</label>
                                    <input type="radio" class="radios" value="large" name="sizes">
                                </div>
                                <button type="submit" class="shirt-cart-btn">Add To Cart</button>
                            </form>
                        </div>
                    </div>


                    <div class="INFO" id="INFO">
                        <h2 class="shirt-name">men graphic T-shirt</h2>
                        <h3 class="shirt-price">RS.1500</h3>
                    </div>

                </div>
            </div>

        </div>
















    </section>
    <!-- products section 🔼🔼🔼🔼🔼🔼 -->
















    <div class="email-subscribe-div">
        <div class="email-text">Subscribe to the Two FACE Email
            to be notified of limited discounts and
            important news.</div>

        <form action="" class="subscribe-email-form">
            <input type="email" placeholder="ENTER YOUR EMAIL" class="subscribe-email">
            <button type="submit" class="subscribe-email-button">SUBSCRIBE</button>
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