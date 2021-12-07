<?php
session_start();
$error = '';

if(isset($_POST['submit'])) {
    if(empty($_POST['email']) || empty($_POST['password'])) {
        $error = "Email or Password is Invalid";
    } else {
        //Define $email and $password
        $email = $_POST['email'];
        $password = $_POST['password'];
        //Establishing Connection with Server by passing server_name, user_id and password as a parameter
        require 'config.php';
        $conn = Connect();

        //SQL query to fetch information of registered users and finds user match.
        $query = "SELECT email, password FROM users WHERE email=? AND password=? LIMIT 1";

        //To protect MYSQL injection for security purposes
        $stmt = $conn->prepare($query);
        $stmt -> bind_param("ss", $email, $password);
        $stmt -> execute();
        $stmt ->bind_result($email, $password);
        $stmt -> store_result();

        if($stmt->fetch()) {
            $_SESSION['login_user2']=$username; //Initializing Session
            header("location: foodlist.php"); //Redirecting to Other Page
        } else {
            $error = "Email or Password is Invalid";
        }
        mysqli_close($conn); //Closing connection
    }
}
?>