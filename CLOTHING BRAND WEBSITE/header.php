<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styleMain.css">
    <style>
        <?php include "css/styleMain.css" ?>
    </style>


    <title>Document</title>
</head>

<body id="body">

    <div class="discount-marquee-div">
        <div class="numbers-div">
            <div class="ph-wa"><a href="index.php" class="ph-wa-anchor"><i class='bx bxs-phone'></i> 0322 3382744</a></div>
            <div class="ph-wa"><a href="index.php" class="ph-wa-anchor"><i class='bx bxl-whatsapp'></i> +92 322 3382744</a></div>
        </div>

        <div class="marquee">
            <marquee behavior="" scrollamount="5" direction="left">Free delivery available over RS.1500 order!
            </marquee>
        </div>

        <div class="account-icon-div">
            <a href="" class="account-anchor">
                <div><i class="fa fa-user" aria-hidden="true"></i> register</div>
            </a>&nbsp;&nbsp;&nbsp;
            <a href="" class="account-anchor">
                <div><i class="fa fa-user" aria-hidden="true"></i> Login</div>
            </a>
        </div>
    </div>


    <header id="header" class="header">
        <nav id="nav" class="nav">

            <ul id="ul">
                <div class="list-div">
                    <a href="index.php" style="text-decoration: none;">
                        <li class="normal-header-list">
                            <i class='bx bxs-bar-chart-alt-2'></i>
                            <span class="logo-text">TWO FACE</span>
                        </li>
                    </a>
                </div>


                <div class="list-div2">
                    <li class="normal-header-list list">
                        <a href="FILES/ALL_SHIRTS_COLLECTION.php" class="search-anchor">search <i class='bx bx-search'></i></a>
                    </li>
                    <li class="normal-header-list cart-ANCHOR-list ">
                        <a href="FILES/ADD_TO_CART.php" class="cart-ANCHOR"><i class='bx bx-cart'></i></a>
                    </li>

                    <li class="normal-header-list list3"><i class="fa fa-bars" id="bar" aria-hidden="true"></i></li>
                </div>


            </ul>

        </nav>
    </header>

    <div class="side-nav-bar-main" id="sidebar">

        <div class="side-nav-bar" id="side-nav-bar">

            <div class="side-nav-bar-options">
                <div class="sidebar-logo">
                    <div class="sidebar-logo-div"><i class="fa fa-times" id="close" aria-hidden="true"></i>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight: 800;">TWO FACE</span></div>
                </div>
            </div>

            <div class="sidebar-options-div">
                <div><a href="" class="sidebar-anchor">VIEW ALL COLLECTIONS</a></div>
                <div><a href="" class="sidebar-anchor">T-SHIRTS</a></div>
                <br>
                <div><a href="index.php" class="sidebar-anchor">HOME</a></div>
                <div><a href="FILES/ABOUT-US.php" class="sidebar-anchor">ABOUT US</a></div>
                <div><a href="FILES/PAYMENT-METHOD.php" class="sidebar-anchor">PAYMENT</a></div>

                <div><a href="" class="sidebar-anchor">register</a></div>
                <div><a href="" class="sidebar-anchor">login</a></div>

                <div><a href="" class="sidebar-anchor"><i class='bx bxs-phone'></i>0322 3382744</a></div>
                <div><a href="" class="sidebar-anchor"><i class='bx bxl-whatsapp'></i>+92 322 3382744</a></div>



            </div>


        </div>

    </div>




    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            $("#bar").click(function() {
                $("#sidebar").toggle(0);
            });

            $("#close").click(function() {
                $("#sidebar").hide(0);
            });
            // $("#sidebar").click(function () {
            //     $("#sidebar").hide(0);
            // });
            $("#bar").click(function() {
                $("#body").css("overflow-y", "hidden");
            });
            $("#close").click(function() {
                $("#body").css("overflow-y", "scroll");
            });








        })


        window.onscroll = function() {
            var header = document.getElementById('header');
            var nav = document.getElementById('nav');

            if (window.pageYOffset > 12) {
                header.classList.add("navbar1");
                header.classList.remove("header");

                nav.classList.add("navbar2");
                nav.classList.remove("nav");

            } else {
                header.classList.remove("navbar1");
                header.classList.add("header");

                nav.classList.remove("navbar2");
                nav.classList.add("nav");
            }
        }
    </script>
</body>

</html>