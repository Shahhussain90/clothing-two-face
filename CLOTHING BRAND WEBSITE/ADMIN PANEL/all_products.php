<?php

include "../FILES/config.php";
session_start();
session_regenerate_id(true);
if (!isset($_SESSION['Adminlogid'])) {
    header('location:ADMIN_LOGIN.php');
}


?>
<?php

if (isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $No_Discount_price = $_POST['No_Discount_price'];
    $product_description = $_POST['product_description'];
    $product_alt_text = $_POST['product_alt_text'];

    
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'uploaded_img/' . $product_image;



    if (empty($product_name) || empty($product_price) || empty($product_image)) {
        $message[] = 'please fill form';
    } else {
        $insert = "INSERT INTO `all_products`(`product_name`, `product_price`,`No_Discount_price`, `product_description`,`product_alt_text`, `product_image`) VALUES ('$product_name','$product_price','$No_Discount_price','$product_description','$product_alt_text','$product_image')";
        $upload = mysqli_query($con, $insert);
        if ($upload) {
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            $message[] = 'new product added';
        } else {
            $message[] = 'could not add new product';
        }
    }
};

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($con, "DELETE FROM `all_products` WHERE product_id =$id");
    header('location:all_products.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
        <?php
        include "../css/admin_index.css";
        ?>
    </style>
</head>

<body>

    <?php
    include "nav_sidebar.php";
    ?>


    <section class="dashboard_admin_panel" id="dashboard_admin_panel">

        <div class="logout_div">
            <div class="page-heading-div">
                <h1>ALL PRODUCTS</h1>
            </div>
            <form method="post" class="logout-btn-form">
                <button type="submit" name="LogOut" class="logout_button">logout</button>
            </form>
        </div>
        <!-- logout btn and page header ⬆️⬆️⬆️ -->



        <div class="products_form_div" id="products_form_div">

            <form action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post" class="product_form">
                <div class="add_prod_heading_div">
                    <h2 class="add_prod_heading">ADD PRODUCT</h2>
                </div>

                <div class="add_prod_input_div">
                    <div class="inp_div">
                        <label for="product_name">Product Name:</label>
                        <input type="text" id="product_name" name="product_name" class="product_inputs" required>
                    </div>

                    <div class="inp_div">
                        <label for="product_price">Product price:</label>
                        <input type="text" id="product_price" name="product_price" class="product_inputs" required>
                    </div>

                    <div class="inp_div">
                        <label for="No_Discount_price">Product price (no discount):</label>
                        <input type="text" id="No_Discount_price" name="No_Discount_price" class="product_inputs" required>
                    </div>

                    <div class="inp_div">
                        <label for="product_description">Product description:</label>
                        <input type="text" id="product_description" name="product_description" class="product_inputs" required>
                    </div>

                    <div class="inp_div">
                        <label for="product_alt_text">product alt text</label>
                        <input type="text" id="product_alt_text" name="product_alt_text" class="product_inputs" required>
                    </div>

                    <div class="inp_div">
                        <label for="product_image">Product image:</label>
                        <input type="file" accept=".png,.jpg,.svg" id="product_image" name="product_image" class="product_inputs" required>
                    </div>

                </div>

                <div class="add_prod_btn_div">
                    <button type="submit" name="add_product" class="add_product_btn">submit</button>
                </div>


            </form>

        </div>
        <!-- add product form ⬆️⬆️⬆️⬆️ -->

        <?php

        $select = mysqli_query($con, "SELECT * FROM all_products");

        ?>
        
        <div class="search-filter-div">
          <i class='bx bx-search-alt-2'></i> <input type="text" id="myinput" class="search_inp_filter" onkeyup="searchTable()" placeholder="search">
        </div>


        <table class="table add_products_table" id="myTable">


            <thead class="text-center">
                <tr>

                    <th width="10%" scope="col">productid</th>
                    <th width="15%" scope="col">product image</th>
                    <th width="15%" scope="col">product name</th>
                    <th width="10%" scope="col">product price</th>
                    <th width="10%" scope="col">price (no discount)</th>
                    <th width="35%" scope="col">product description</th>
                    <th width="20%" scope="col">action</th>
                </tr>
            </thead>

            <?Php

            while ($row = mysqli_fetch_assoc($select)) {

            ?>




                <tr class='align-middle'>
                    <td><?php echo $row['product_id'] ?></td>
                    <td><img src="uploaded_img/<?php echo $row['product_image']; ?>" height="120px"></td>
                    <td><?php echo $row['product_name'] ?></td>
                    <td>RS <?php echo $row['product_price'] ?></td>
                    <td>RS <?php echo $row['No_Discount_price'] ?></td> 
                    <td><?php echo $row['product_description'] ?></td>
                    <td><?php echo $row['product_alt_text'] ?></td>

                    <td>
                        <a href="products_update.php?edit=<?php echo $row['product_id']; ?>"><button class="EDIT">EDIT</button></a>
                        <a href="all_products.php?delete=<?php echo $row['product_id']; ?>"><button class="DELETE">delete</button></a>
                    </td>

                </tr>


            <?Php


            };

            ?>




            </tbody>
        </table>





    </section>












    <?php
    if (isset($_POST['LogOut'])) {
        session_destroy();
        error_reporting(0);
        header("location:ADMIN_LOGIN.php");
    }

    ?>
     <script src="filter.js"></script>

</body>
</html>