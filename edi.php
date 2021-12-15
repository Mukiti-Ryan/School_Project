<?php
error_reporting(0);
//Edit_product.php
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
    <?php
        if(isset($_GET['submit'])) {
            $product_id = $_GET['product_id'];
            $product_name = $_GET['product_name'];
            $product_description = $_GET['product_description'];
            $product_image = $_GET['product_image'];
            $unit_price = $_GET['unit_price'];
            $available_quantity = $_GET['available_quantity'];
            $updated_at = $_GET['updated_at'];

            $query = mysqli_query($conn, "UPDATE product set product_name = '$product_name', product_description = '$product_description', product_image = '$product_image', unit_price = '$unit_price', available_quantity = '$available_quantity', updated_at = '$updated_at' WHERE product_id = '$product_id'");
        }
        $query = mysqli_query($conn, "SELECT * FROM product WHERE product_id IN(SELECT * FROM admin WHERE admin_id = '$roles') ORDER BY admin_id");
        while ($row = mysqli_fetch_array($query)) {
    ?>
        }
        <div class="list-group" style="text-align: center;">
            <?php
                echo "<b><a href='edit_product.php?update = {$row['product_id']}'>{$row['name']}</a></b>";
            ?>
        </div>

        <?php
        }
        ?>

        <?php
        if (isset($_GET['update'])) {
            $update = $_GET['update'];
            $query1 = mysqli_query($conn, "SELECT * FROM admin WHERE admin_id=$update");
            while ($row1 = mysqli_fetch_array($query1)) {
        ?>

    <!------------- Edit Products From Here------------------>
    
    <div class="add_product">
        <div class="container">
            <form action="" method="GET">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">EDIT YOUR PRODUCT HERE</p>
                <div class="input-group">
                    <input type="hidden" placeholder="Your Product Name" name="product_id" value="<?php echo $product_id; ?>" required>
                </div>
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
                    <button name="submit" class="btn">EDIT PRODUCT</button>
                </div>
                </form>
                <form action="" method="POST">
                    <div class="input-group">
                        <input type="hidden" name="updated_at" value="<?php echo $updated_at; ?>" required>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
        }
        }
    ?>

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

    <?php
    mysqli_close($conn);
    ?>
</body>

</html>