<?php 
session_start();
if(session_destroy()) //Destroying All Sessions
{ 
    header("location: customerlogin.php"); // Redircting to Home Page
}
?>