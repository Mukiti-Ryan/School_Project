<?php 
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

if(isset($_SESSION['cart'])) {
    $total = 0;

    foreach($_SESSION['cart'] as $F_ID => $quantity) {
        $result = $mysqli->query("SELECT * FROM /*----*/ WHERE id = ".$F_ID);

        if($result) {
            if($obj = $result->fetch_object()) {
                $cost = $obj->price * $quantity;
                $user = $_SESSION["username"];
                $query = $mysqli->query("INSERT INTO orders() VALUES ");
                if($query) {
                    $newqty = $obj->qty - $quantity;
                    if($mysqli->query("UPDATE products SET qty = ".$newqty."WHERE id = ".$F_ID)) {

                    }
                }
            }
        }
    }
}

header("location: bill.php");
?>