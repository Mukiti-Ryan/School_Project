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
            <!------------- Beginning---------------->
            <div class="row">
                <div class="col-2">
                    <h1>Your Office Days<br>Don 't Need to be Gloomy!</h1>
                    <p>Success isn't always about greatness. It's about consistecy. Consistent<br>hard work gains success. Greatness will come.</p>
                    <a href="customerregister.php" class="btn" role="button">Sign Up &#8594;</a>
                    <a href="customerlogin.php" class="btn" role="button">Sign In &#8594;</a>
                    <a href="customerlogin.php" class="btn" role="button">Order Now &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="images/image2.jpg">
                </div>
            </div>
        </div>
    </div>

    <!---------- featured categories ------------>
    <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-4">
                    <img src="images/category1.jpg">
                    <button class="category-btn">Men's Clothing</button>
                </div>
                <div class=" col-4">
                    <img src="images/category2.jpg">
                    <button class="category-btn">Women's Clothing</button>
                </div>
                <div class="col-4">
                    <img src="images/category3.jpg">
                    <button class="category-btn">Children's Clothing</button>
                </div>
                <div class="col-4">
                    <img src="images/category4.jpg">
                    <button class="categoru-btn">Pet's Clothing</button>
                </div>
            </div>
        </div>
    </div>

    <!------------- featured products ----------------->

    <div class="small-container">
        <h2 class="feature">Featured Products</h2>
        <div class="row">
            <div class="col-4">
                <img src="images/prod1.jpg">
                <h4>Official White Shirt.<br>Official Brown Leather Shoes.</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>$50.00</p>
                <button class="cart-btn">Add To Cart<a href="cart.php"></a></button>
            </div>
            <div class="col-4">
                <img src="images/prod2.jpg">
                <h4>White Top<br> Brown High Heels.</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>$50.00</p>
                <button class="cart-btn">Add To Cart<a href="cart.php"></a></button>
            </div>
            <div class="col-4">
                <img src="images/prod3.jpg">
                <h4>Matching Boy and Girl Outfit</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>$50.00</p>
                <button class="cart-btn">Add To Cart<a href="cart.php"></a></button>
            </div>
            <div class="col-4">
                <img src="images/prod4.jpg">
                <h4>Red Chihuahua Pullneck </h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>$50.00</p>
                <button class="cart-btn">Add To Cart<a href="cart.php"></a></button>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <img src="images/prod5.jpg">
                <h4>Green Nike Air-Jordan HighTop</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>$50.00</p>
                <button class="cart-btn">Add To Cart<a href="cart.php"></a></button>
            </div>
            <div class="col-4">
                <img src="images/prod6.jpg">
                <h4>Adidas Sports Track</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>$50.00</p>
                <button class="cart-btn">Add To Cart<a href="cart.php"></a></button>
            </div>
            <div class="col-4">
                <img src="images/prod7.jpg">
                <h4>Official Red Stilletos</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>$50.00</p>
                <button class="cart-btn">Add To Cart<a href="cart.php"></a></button>
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
                <button class="cart-btn">Add To Cart<a href="cart.php"></a></button>
            </div>
        </div>

        <!---------------- Latest Products ---------------------->
        <h2 class="feature">Latest Products</h2>
        <div class="row">
            <div class="col-4">
                <img src="images/latest1.jpg">
                <h4>Red Nike Air-Jordan HighTop</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>$50.00</p>
                <button class="cart-btn">Add To Cart<a href="cart.php"></a></button>
            </div>
            <div class="col-4">
                <img src="images/latest2.jpg">
                <h4>Official Beige Stilletos</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>$50.00</p>
                <button class="cart-btn">Add To Cart<a href="cart.php"></a></button>
            </div>
            <div class="col-4">
                <img src="images/latest3.jpg">
                <h4>Brown Sneakers</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>$50.00</p>
                <button class="cart-btn">Add To Cart<a href="cart.php"></a></button>
            </div>
            <div class="col-4">
                <img src="images/latest4.jpg">
                <h4>Limited Edition Nike B2B HighTop</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>$50.00</p>
                <button class="cart-btn">Add To Cart<a href="cart.php"></a></button>
            </div>
            <div class="col-4">
                <img src="images/latest5.jpg">
                <h4>Brown Kids Shoes</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>$50.00</p>
                <button class="cart-btn">Add To Cart<a href="cart.php"></a></button>
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
                <button class="cart-btn">Add To Cart<a href="cart.php"></a></button>
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
                <button class="cart-btn">Add To Cart<a href="cart.php"></a></button>
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
                <button class="cart-btn">Add To Cart<a href="cart.php"></a></button>
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
                    <a href="cart.php" class="btn">Buy Now &#8594</a>
                </div>
            </div>
        </div>
    </div>

    <!--------- Testimonial ------------>
    <div class="testimonial">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <i class="fas fa-quote-left"></i>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero rem quis cum cupiditate eveniet reiciendis quae praesentium consequatur dolorem dicta,<br>minus quos illo nam culpa, voluptatem dolor obcaecati vitae molestias.</p>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <img src="images/AllisonPark.jpg">
                    <h3>Allison Park</h3>
                </div>
                <div class="col-3">
                    <i class="fas fa-quote-left"></i>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero rem quis cum cupiditate eveniet reiciendis quae praesentium consequatur dolorem dicta,<br>minus quos illo nam culpa, voluptatem dolor obcaecati vitae molestias.</p>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <img src="images/Justin.jpg">
                    <h3>Mike Smith</h3>
                </div>
                <div class="col-3">
                    <i class="fas fa-quote-left"></i>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero rem quis cum cupiditate eveniet reiciendis quae praesentium consequatur dolorem dicta,<br>minus quos illo nam culpa, voluptatem dolor obcaecati vitae molestias.</p>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <img src="images/Shane.jpg">
                    <h3>Shane McMahon</h3>
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