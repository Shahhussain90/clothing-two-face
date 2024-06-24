<?php

include "../FILES/config.php";
session_start();
session_regenerate_id(true);
if (!isset($_SESSION['Adminlogid'])) {
    header('location:ADMIN_LOGIN.php');
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


    <section class="dashboard_admin_panel">

        <div class="logout_div">
            <div class="page-heading-div">
                <h1>Registered people</h1>
            </div>
            <form method="post" class="logout-btn-form">
                <button type="submit" name="LogOut" class="logout_button">logout</button>
            </form>
        </div>
        <!-- logout btn and page header ⬆️⬆️⬆️ -->


        <div class="search-filter-div">
          <i class='bx bx-search-alt-2'></i> <input type="text" id="myinput" class="search_inp_filter" onkeyup="searchTable()" placeholder="search">
        </div>

        <div class="customer_details_main_div">

            <table class="table" id="myTable">
                <thead class="text-center">
                    <tr>
                        <th scope="col" width="100px">id</th>
                        <th scope="col">username</th>
                        <th scope="col">email</th>
                        
                        <th scope="col" width="70px">TIME</th>
                        
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    $query = "SELECT * FROM `register_1`";
                    $user_result = mysqli_query($con, $query);
                    while ($user_fetch = mysqli_fetch_assoc($user_result)) {
                        echo "  
                    <tr>
                        <td>$user_fetch[id]</td>
                        <td>$user_fetch[username]</td>
                        <td>$user_fetch[email]</td>
                        
                        <td>$user_fetch[DATE_TIME]</td>
                        <td>@mdo</td>
                      
                    </tr>
                    ";
                    } ?>
                </tbody>
            </table>
        </div>






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