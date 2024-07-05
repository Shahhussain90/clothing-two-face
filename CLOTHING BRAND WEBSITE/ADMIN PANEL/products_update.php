<?php

include "../FILES/config.php";
session_start();
session_regenerate_id(true);
if (!isset($_SESSION['Adminlogid'])) {
    header('location:ADMIN_LOGIN.php');
}
$id = $_GET['edit'];

if (isset($_POST['update_product'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $No_Discount_price = $_POST['No_Discount_price'];
    $product_description = $_POST['product_description'];
    $product_alt_text = $_POST['product_alt_text'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'uploaded_img/' . $product_image;



    if(empty($product_name) || empty($product_price) || empty($product_image)){
       $message[]='please fill form';
    }
    else{
        $update = "UPDATE `main_products` SET product_name='$product_name',product_price='$product_price',No_Discount_price='$No_Discount_price',product_description='$product_description',product_alt_text='$product_alt_text',product_image='$product_image'
        WHERE product_id=$id";
        $upload = mysqli_query($con,$update);
        if($upload){
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
        }
        else{
            $message[]='could not add new product';
        }

    }


};


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin_update.css">
    <style>
        <?php include "admin_update.css" ?>
    </style> 
    <title>EDIT</title>
</head>

<body>

    
        <div class="img-add-div-form">

            <?php 

                $select = mysqli_query($con,"SELECT * FROM main_products WHERE product_id = $id");
                while($row = mysqli_fetch_assoc($select)){

                

            ?>

                <form class="card-add-form" action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                    <h2 style="color:white;">UPDATE</h2>
                    <input type="text" class="login-input" placeholder="product name" value="<?php $row['product_name']; ?>" name="product_name" >
                    <input type="number" class="login-input" placeholder="product price" value="<?php $row['product_price']; ?>" name="product_price" >
                    <input type="number" class="login-input" placeholder="No Discount price" value="<?php $row['No_Discount_price']; ?>" name="No_Discount_price" >
                    
                    

                    <input type="text" class="login-input" placeholder="product description" value="<?php $row['product_description']; ?>" name="product_description" >
                    <input type="text" class="login-input" placeholder="product alt text" value="<?php $row['product_alt_text']; ?>" name="product_alt_text" >
                    <div class="choose-file-div">
                        <input type="file" class="choose-file" accept="image/png,image/jpeg,image/jpg" name="product_image" >
                    </div>
                    <input type="submit" class="add-prod-btn" name="update_product" value="update product">
                    <a href="ADD_PRODUCT.php" class="go-back-update">go back</a>


                </form>

                <?php
                };
                ?>

        </div>
    
   


    <?php

            if(isset($message)){
                foreach($message as $message){
                    echo '<span class="message">'.$message.'</span>';
            }
            }

    ?>



</body>

</html>