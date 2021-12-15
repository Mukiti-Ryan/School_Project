<?php

session_start();
error_reporting(0);

if(isset($_POST['add_to_cart'])) {

    if(isset($_SESSION['cart'])) {

        $session_array_id = array_column($_SESSION['cart'], "id");

        if(!in_array($_GET['id'], $session_array_id)) {
            $session_array = array(
                'product_id' => $_GET['product_id'],
                "product_name" => $_POST['product_name'],
                "unit_price" => $_POST['unit_price'],
                'product_quantity' => $_POST['product_quantity']
            );
    
            $_SESSION['cart'][] = $session_array;
        }

    }else {

        $session_array = array(
            'product_id' => $_GET['product_id'],
            "product_name" => $_POST['product_name'],
            "unit_price" => $_POST['unit_price'],
            'product_quantity' => $_POST['product_quantity']
        );

        $_SESSION['cart'][] = $session_array;
    }
}
?>