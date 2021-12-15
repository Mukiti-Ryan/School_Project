<?php   
if(!isset($_SESSION)) {
    session_start();
}

include 'config.php';
$conn = Connect();

$product_id = $_GET['id'];
$action = $_GET['action'];

$sql = "SELECT quantity FROM /*---*/ WHERE product_id = ".$product_id;
$result = mysqli_query($conn, $sql);

if($result) {
    if($obj = mysqli_fetch_assoc($result)) {
        switch($action) {
            case "add":
            if($_SESSION['cart'][$product_id]+1 <= $row["quantity"])
            $_SESSION['cart'][$product_id]++;
            break;

            case "remove":
                $_SESSION['cart'][$product_id]--;
                if($_SESSION['cart'][$product_id] == 0)
                unset($_SESSION['cart'][$product_id]);
                break;
        }
    }
}
header("location: cart.php");
?>