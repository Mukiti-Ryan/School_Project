<?php

//include('managersession.php');

if(!isset($login_session)) {
    header('Location: managerlogin.php');
}

$cheks = implode("','",$_POST['checkbox']);
$sql = "UPDATE product set 'options' = 'DISABLE' WHERE F_ID in ('$cheks')";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

header('Location: delete_product.php');
$conn->close();

?>