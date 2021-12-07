<?php

function Connect() {
$server = "localhost";
$user = "root";
$pass = "";
$database = "school";

//Create Connection
$conn = mysqli_connect($server, $user, $pass, $database) or die($conn->connect_error);

return $conn;
}
?>