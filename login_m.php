<?php
session_start();
$error = '';
error_reporting(0);

if(isset($_POST['submit'])) {
    if(empty($_POST['email']) || empty($_POST['password'])) {
        $error = "Email or Password is Invalid";
    } else {
        //Define $email and $password
        $email = $_POST['email'];
        $password = $_POST['password'];
        require 'config.php';
        $conn = Connect();

        //SQL query to fetch information of registered users and finds user match
        $query = "SELECT email, password FROM MANAGER WHERE email=? AND password=? LIMIT 1";

        $stmt = $conn->prepare($query);
        $stmt -> bind_param("ss",$email, $password);
        $stmt -> execute();
        $stmt -> bind_result($email, $password);
        $stmt -> store_result();

        if($stmt->fetch()) {
            $_SESSION['login_user1']=$username; //Initializing Session
            header("location: myrestaurant.php"); //Redirecting to Other Page
        } else {
            $error = "Email or Password is Invalid";
        }
        mysqli_close($conn); //Closing connection
    }
}
?>