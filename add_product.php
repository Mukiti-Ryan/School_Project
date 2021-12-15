<?php
error_reporting(0);
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>Manager Login | StyleSensed</title>
</head>

<body>
    <!--------------- Header --------------->
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="images/logo.png" width="125px"><a href="index.php"></a>
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
            <ul id="MenuItems">
                <li><a href="#">Welcome <?php echo $login_session; ?></a></li>
                <li class="active"><a href="managerlogin.php">MANAGER CONTROL PANEL</a></li>
                <li><a href="managerlogout.php">Log Out</a></li>
            </ul>
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

    <!--------- Managerial Controls ------------>

    <div class="managerial_controls">
        <div class="small-container">
            <div class="col-2">
                <h1>Hello Manager! </h1>
                <p>Control all your store items from here</p>
                <a href="add_product.php" class="btn" role="button">Add Products &#8594;</a>
                <a href="edit_product.php" class="btn" role="button">Edit Products &#8594;</a>
                <a href="delete_product.php" class="btn" role="button">Delete Products &#8594;</a>
            </div>
        </div>
    </div>

    <!------------- Add Products From Here------------------>

    <div class="add_product">
        <div class="container">
            <form action="" method="POST">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">ADD NEW PRODUCT HERE</p>
            <div class="input-group">
                <input type="text" placeholder="Your Product Name" name="product_name" value="<?php echo $product_name; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Your Product Description" name="product_description" value="<?php echo $product_description; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Your Product Image" name="product_image" value="<?php echo $product_image; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Your Product Price (KES)" name="unit_price" value="<?php echo $unit_price; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Available Quantity" name="available_quantity" value="<?php echo $available_quantity; ?>" required>
            </div>
            <div class="input-group">
                <input type="hidden" name="created_at" value="<?php echo $created_at; ?>" required>
            </div>
            <div class="input-group">
                <input type="hidden" name="added_by" value="<?php echo $added_by; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">ADD PRODUCT</button>
            </div>
            </form>
        </div>
    </div>

    <!-------------- Footer ----------------->

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App Today</h3>
                    <p>Download App for Android and IOS mobile phone.</p>
                    <div class="app-logo">
                        <img src="images/app-store.png">
                        <img src="images/play-store.png">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="images/logo.png">
                    <p>Our Purpose Is To Ensure Our Customers Enjoy Our Quality Fabrics At The Best Price Possible.</p>
                </div>
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>
                <div class="footer-col-3">
                    <h3>Follow us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                        <li>Youtube</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="copyright">Copyright 2021 - Flex Technologies</p>
        </div>
    </div>

    <!---------------js for toggle menu--------------->

    <script>
        var MenuItems = document.getElementById("MenuItems");

        MenuItems.style.maxHeight = "0px";

        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px";
            } else {
                MenuItems.style.maxHeight = "0px";
            }
        }
    </script>
</body>

</html>