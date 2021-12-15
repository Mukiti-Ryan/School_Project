<?php
session_start();
error_reporting(0);
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
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!------------ Contact Page ------------->
    <div class="contact">
        <div class="container">
            <div class="contact-col-2">
                <strong>Want To Contact <span class="edit">StyleSensed</span>?</strong>
                <br>
                Here are a few ways to get in touch with us.
            </div>
                <div class="row"></div>
                    <div class="contact-col-2">
                        <form action="" method="POST">
                            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Contact Form</p>
                            <div class="input-group">
                                <input type="text" placeholder="Your Name" name="name" value="<?php echo $name; ?>" required>
                            </div>
                            <div class="input-group">
                                <input type="email" placeholder="Your Email Address" name="email" value="<?php echo $email; ?>" required>
                            </div>
                            <div class="input-group">
                                <input type="number" placeholder="Your Mobile Number" name="mobile" value="<?php echo $mobile; ?>" required>
                            </div>
                            <div class="input-group">
                                <input type="text" placeholder="The Subject" name="subject" value="<?php echo $subject; ?>" required>
                            </div>
                            <div class="input-group">
                                <br>
                                <textarea type="textarea" id="message" name="message" placeholder="Your Message" maxlength="500" rows="7"></textarea>
                            </div>
                            <div class="input-group">
                                <button name="submit" class="btn"><a href="index.php">Submit</a></button>
                            </div>
                        </form>
                    </div>
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
                    <h3>Follow us on</h3>
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
        if(isset($_POST['submit'])) {
            require 'config.php';
            $conn = Connect();

            $Name = $conn->real_escape_string($_POST['name']);
            $email_id = $conn->real_escape_string($_POST['email']);
            $Mobile_No = $conn->real_escape_string($_POST['mobile']);
            $Subject = $conn->real_escape_string($_POST['subject']);
            $Message = $conn->real_escape_string($_POST['message']);

            $query = "INSERT into contact(Name, Email, Mobile, Subject, Message) VALUES ('$name','$email','$mobile','$subject','$message')";
            $success = $conn->query($query);

            if (!$success) {
                die("Couldn't enter Data: ".$conn->error);
            }

            $conn->close();
        }
    ?>
</body>

</html>