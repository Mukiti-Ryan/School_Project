<?php
include('managersession.php');

if(!isset($login_session)) {
    header('Location: managerlogin.php');
}

$product_name = $conn->real_escape_string($_POST['product_name']);
$product_description = $conn->real_escape_string($_POST['product_description']);
$product_image = $conn->real_escape_string($_POST['product_image']);
$unit_price = $conn->real_escape_string($_POST['unit_price']);
$available_quantity = $conn->real_escape_string($_POST['available_quantity']);
$subcategory_id = $conn->real_escape_string($_POST['subcategory_id']);
$created_at = $conn->real_escape_string($_POST['created_at']);
$updated_at = $conn->real_escape_string($_POST['updated_at']);
$added_by = $conn->real_escape_string($_POST['added_by']);

//Storing Session
$user_check = $_SESSION['login_user1']; 
$added_by = "SELECT * FROM admin WHERE admin_id = '$user_check'";
$added_byresult = mysqli_query($conn, $admin_idsql);
$added_byrs  = mysqli_fetch_array($added_byresult, MYSQLI_BOTH);
$added_by = $added_byrs['added_by'];

//$images_path = $conn->real_escape_string($_POST['images_path']);

$query = "INSERT INTO product (product_name, product_description, product_image, unit_price, available_quantity, subcategory_id,created_at, updated_at, added_by) VALUES ('.$product_name','.$product_description','.$product_image','.$unit_price','.$available_quantity','.$subcategory_id','.$created_at','.$updated_at','.$added_by')";
$success = $conn->query($query);

if(!$success) {
    ?>
    }   
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

</body>
</html>
<?php 
}
else {
    echo "SUCCESS";
    header('Location: add_products.php');
}

$conn->close();

?>