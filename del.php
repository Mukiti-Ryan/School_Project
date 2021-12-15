<?php
error_reporting(0);
session_start();
//Delete product
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

<!------------- Delete Products From Here------------------>

<form action="" method="POST">
    <?php
        //Storing session
        $user_check = $_SESSION['login_user1'];
        $sql = "SELECT * FROM food f WHERE f.options = 'ENABLE' AND f.R_ID IN (SELECT R.R_ID FROM RESTAURANTS r WHERE r.M_ID='$user_check') ORDER BY F_ID";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
    ?>

    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th> # </th>
                <th> Food ID </th>
                <th> Food Name </th>
                <th> Price </th>
                <th> Description </th>
                <th> Restaurant ID </th>
            </tr>
        </thead>
        <?php
            //Output Data Of Each Row
            while($row = mysqli_fetch_assoc($result)){
        ?>
            <tbody>
                <tr>
                    <td><input name="checkbox[]" type="checkbox" value="<?php echo $row['product_id']; ?>"/></td>
                    <td><?php echo $row["product_name"];?></td>
                    <td><?php echo $row["product_description"];?></td>
                    <td><?php echo $row["product_image"];?></td>
                    <td><?php echo $row["unit_price"];?></td>
                    <td><?php echo $row["available_quantity"];?></td>
                    <td><?php echo $row["subcategory_id"];?></td>
                    <td><?php echo $row["added_by"];?></td>
                </tr>
            </tbody>
        <?php
            }
        ?>
    </table>
    <br>
    <div class="input-group">
        <button name="submit" class="btn">DELETE PRODUCT</button>
    </div>
    <?php
        } else{
    ?>
    <h4><center>0 RESULTS</center></h4>
    <?php
        }
    ?>
    </form>

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