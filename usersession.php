<?php
require 'config.php';
$conn = Connect();

session_start();

$user_check=$_SESSION['role'];

//SQL Query to Fetch Complete Information Of User
$query = "SELECT username FROM users WHERE username = '$user_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session=$row['username'];

?>