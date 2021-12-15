<?php
    session_start();
    require 'config.php';
    error_reporting(0);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index_cart.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>Shopping Cart | StyleSensed</title> 
</head>
<body>

<!---------------- Header ------------------->
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="images/logo.png" width="125px">
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="product.php">Products</a></li>
                        <li><a href="aboutus.php">About</a></li>
                        <li><a href="contactus.php">Contact</a></li>
                        <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
                        <?php
                            if(isset($_SESSION['login-user1'])) {
                        ?>
                        <br>
                        <ul id="MenuItems">
                            <li><a href="#">Welcome <?php echo $_SESSION['login-user1']; ?></a></li>
                            <li><a href="">MANAGER CONTROL PANEL</a></li>
                            <li><a href="managerlogout.php">Log Out</a></li>
                        </ul>
            </div>
            <?php
                } else if(isset($_SESSION['login-user2'])) {
            ?>
            <ul class="col-2">
                <li><a href="#">Welcome <?php echo $_SESSION['login-user2']; ?></a></li>
                <li><a href="product.php">Products</a></li>
                <li><a href="cart.php">Cart
                (<?php
                    if(isset($_SESSION["cart"])){
                    $count = count($_SESSION["cart"]);
                    echo "$count";
                } else 
                    echo "0";
                    ?>) 
                </a></li>
                <li><a href="userlogout.php">Log out</a></li>
            </ul>
            <?php
                }
                else {
            ?>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="customerregister.php">User Register</a></li>
                <li><a href="managerregister.php">Manager Register</a></li>
                <li><a href="customerlogin.php">User Login</a></li>
                <li><a href="managerlogin.php">Manager Login</a></li>
            </ul>
            <?php
                }
            ?>
            </ul>
            </nav>
        </div>
    </div>
    </div>

    <!----------- Cart Code ---------------->

    <form method="POST" action="update_cart1.php">
        <div class="order">
            <div class="row">
                <div class="col-1">
                        <h2 class="text-center">Items Selected</h2>
                        <?php

                        $total = 0;

                        $output = "";

                        $output .= "
                            <table class='table table-bordered table-striped'>
                                <tr>
                                    <th> ID </th>
                                    <th> Item Name </th>
                                    <th> Item Price </th>
                                    <th> Item Quantity </th>
                                    <th> Item Image </th>
                                    <th> Total Price </th>
                                    <th> Action </th>
                                </tr>
                        ";

                        if(!empty($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $keys => $value) {
                                $output .= "
                                    <tr>
                                        <td>".$value['product_id']."</td>
                                        <td>".$value['product_name']."</td>
                                        <td>".$value['unit_price']."</td>
                                        <td>".$value['product_quantity']."</td>
                                        <td>".number_format($value['unit_price'] * $value['product_quantity'],2)."</td>
                                        <td>".$value['product_image']."</td>
                                        <td>
                                            <a href='cart.php?action=remove&id=".$value['id']."'>
                                                <button class='btn btn-danger btn-block'>Remove</button>
                                            </a>
                                        </td>
                                ";

                                $total = $total + $values['product_quantity'] * $value['price'];
                            }

                            $output .="
                            <tr>
                                <td colspan='3'></td>
                                <td></b>Total Price</b></td>
                                <td>".number_format($total,2)."</td>
                                <td>
                                    <a href='cart.php?action=clearall'>
                                        <button class='btn btn-warning btn-block'>Clear</button>
                                    </a>
                                </td>
                            <tr>
                            ";

                            $output .="
                            <tr>
                                <td colspan='1'</td>
                                <td>
                                    <a href='payment.php?action=checkout'>
                                        <button class='btn btn-warning btn-block'>Check Out</button>
                                    </a>
                                </td>
                            </tr>
                            ";
                        }
                        
                        echo $output;
                        ?>
                </div>
            </div>
        </div>

        <?php
        
            if(isset($_GET['action'])) {

                if($_GET['action'] == "clearall") {

                    unset($_SESSION['cart']);
                }
                
                if($_GET['action'] == "remove") {
                    foreach($_SESSION['cart'] as $key => $value) {
                        if($valve['id'] == $_GET['id']) {
                            unset($_SESSION['cart'][$key]);
                        }
                    } 
                }
            }
        
        ?>
    </form>
</body>
</html>