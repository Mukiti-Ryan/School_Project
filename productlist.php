<?php
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
    <title>Home | StyleSensed</title>
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

    <!------------- featured products ----------------->
    <form method="POST" action="update_cart.php">
        <div class="small-container">
            <h2 class="feature">Featured Products</h2>
            <div class="row">
                <div class="col-4">
                    <img src="images/suit.jpg">
                    <h4>Parliament Blue Suit Combination</h4>
                    <h4>Men Formal</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>$50.00</p>
                    <input type="submit" name="add_to_cart" class="btn btn-warning" value="Add To Cart"> 
                </div>
                <div class="col-4">
                    <img src="images/mencasual.jpg">
                    <h4>Double Pocketed Short Sleeve Shirt</h4>
                    <h4>Men Casual</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>$50.00</p>
                    <input type="submit" name="add_to_cart" class="btn btn-warning" value="Add To Cart">
                </div>
                <div class="col-4">
                    <img src="images/mensports.jpg">
                    <h4>Red Regular-Fit Cotton Track Pants</h4>
                    <h4>Men Sports</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>$50.00</p>
                    <input type="submit" name="add_to_cart" class="btn btn-warning" value="Add To Cart">
                </div>
                <div class="col-4">
                    <img src="images/latest4.jpg">
                    <h4>Limited Edition Nike B2B HighTop</h4>
                    <h4>Men Sports</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>$50.00</p>
                    <input type="submit" name="add_to_cart" class="btn btn-warning" value="Add To Cart">
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <img src="images/maxidress.jpg">
                    <h4>Casual Summer Maxi Dress Sleeveless</h4>
                    <h4>Women Casual</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>$50.00</p>
                    <input type="submit" name="add_to_cart" class="btn btn-warning" value="Add To Cart">
                </div>
                <div class="col-4">
                    <img src="images/skirtsuit.jpg">
                    <h4>Navy Blue Wool Skirt Suit</h4>
                    <h4>Women Formal</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>$50.00</p>
                    <input type="submit" name="add_to_cart" class="btn btn-warning" value="Add To Cart">
                </div>
                <div class="col-4">
                    <img src="images/prod7.jpg">
                    <h4>Official Red Stilletos</h4>
                    <h4>Women Formal</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>$50.00</p>
                    <input type="submit" name="add_to_cart" class="btn btn-warning" value="Add To Cart">
                </div>
                <div class="col-4">
                    <img src="images/prod8.jpg">
                    <h4>Official White Stilletos</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>$50.00</p>
                    <input type="submit" name="add_to_cart" class="btn btn-warning" value="Add To Cart">
                </div>
            </div>

            <!---------------- Latest Products ---------------------->
            <h2 class="feature">Latest Products</h2>
            <div class="row">
                <div class="col-4">
                    <img src="images/latest1.jpg">
                    <h4>Red Nike Air-Jordan HighTop</h4>
                    <h4>Children Sports</h4>
                    <strong>The Perfect Shoes To Shoot Some Hoops</strong>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>$50.00</p>
                    <input type="submit" name="add_to_cart" class="btn btn-warning" value="Add To Cart">
                </div>
                <div class="col-4">
                    <img src="images/kidcas.jpg">
                    <h4>Winter Dark Grey Long Sleeve T-Shirt</h4>
                    <h4>Casual Long Pants</h4>
                    <h4>Children Casual</h4>
                    <strong>What better way to keep warm in the cold.</strong>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>$50.00</p>
                    <input type="submit" name="add_to_cart" class="btn btn-warning" value="Add To Cart">
                </div>
                <div class="col-4">
                    <img src="images/latest3.jpg">
                    <h4>Brown Sneakers</h4>
                    <h4>Children Casual</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>$50.00</p>
                    <input type="submit" name="add_to_cart" class="btn btn-warning" value="Add To Cart">
                </div>
                <div class="col-4">
                    <img src="images/kidssuit.jpg">
                    <h4>Blue Tweed Children's Suit</h4>
                    <h4>Children Formal</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>$50.00</p>
                    <input type="submit" name="add_to_cart" class="btn btn-warning" value="Add To Cart">
                </div>
                <div class="col-4">
                    <img src="images/prod4.jpg">
                    <h4>Red Chihuahua Pullneck</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>$50.00</p>
                    <input type="submit" name="add_to_cart" class="btn btn-warning" value="Add To Cart">
                </div>
                <div class="col-4">
                    <img src="images/latest6.jpg">
                    <h4>EastPak LockDown Sandals</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>$50.00</p>
                    <input type="submit" name="add_to_cart" class="btn btn-warning" value="Add To Cart">
                </div>
                <div class="col-4">
                    <img src="images/latest7.jpg">
                    <h4>Yellow Converse</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>$50.00</p>
                    <input type="submit" name="add_to_cart" class="btn btn-warning" value="Add To Cart">
                </div>
                <div class="col-4">
                    <img src="images/latest8.jpg">
                    <h4>Family set of Shoes</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>$50.00</p>
                    <input type="submit" name="add_to_cart" class="btn btn-warning" value="Add To Cart">
                </div>
                <div class="col-4">
                    <img src="images/prod4.jpg">
                    <h4>Red Chihuahua Pullneck</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>$50.00</p>
                    <input type="submit" name="add_to_cart" class="btn btn-warning" value="Add To Cart">
                </div>
                <div class="col-4">
                    <img src="images/latest6.jpg">
                    <h4>EastPak LockDown Sandals</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>$50.00</p>
                    <input type="submit" name="add_to_cart" class="btn btn-warning" value="Add To Cart">
                </div>
                <div class="col-4">
                    <img src="images/latest7.jpg">
                    <h4>Yellow Converse</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>$50.00</p>
                    <input type="submit" name="add_to_cart" class="btn btn-warning" value="Add To Cart">
                </div>
                <div class="col-4">
                    <img src="images/latest8.jpg">
                    <h4>Family set of Shoes</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>$50.00</p>
                    <input type="submit" name="add_to_cart" class="btn btn-warning" value="Add To Cart">
                </div>
            </div>
        </div>

        <!----------- Offer -------------->
        <div class="offer">
            <div class="small-container">
                <div class="row">
                    <div class="col-2">
                        <img src="images/exclusive.jpg" class="offer-img">
                    </div>
                    <div class="col-2">
                        <p>Exclusively Available on StyleSensed!</p>
                        <h1>Hand-Knitted Scarves</h1>
                        <small>The Hand-Knitted scarves are the best way to keep you warm while keeping you in style.<br>
                        Made with quality fabrics that feel like cotton on your skin.</small>
                        <input type="submit" name="add_to_cart" class="btn btn-warning" value="Buy NOW">
                    </div>
                </div>
            </div>
        </div>

        <!----------- Brands ------------>
        <div class="brands">
            <div class="small-container">
                <div class="row">
                    <div class="col-5">
                        <img src="images/adidas.png">
                    </div>
                    <div class="col-5">
                        <img src="images/Reebok.png">
                    </div>
                    <div class="col-5">
                        <img src="images/puma.png">
                    </div>
                    <div class="col-5">
                        <img src="images/Eastpak.png">
                    </div>
                    <div class="col-5">
                        <img src="images/nike.png">
                    </div>
                </div>
            </div>
        </div>
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