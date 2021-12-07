<?php

include 'config.php';

error_reporting(0);
session_start();

if(isset($_SESSION['username'])) {
    header("location: managerlogin.php");
}

if(isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = md5($_POST['password']);
    $repassword = md5($_POST['repassword']);

    if($password == $repassword) {
        $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO admin (fullname, username, email, contact, password) VALUES ('$fullname','$username','$email', '$contact', '$password')";
            $result = mysqli_query($conn, $sql);
            if($result) {
                echo "<script>alert('Wow! User Registration Successful.')</script>";
                $fullname = "";
                $username = "";
                $email = "";
                $contact = "";
                $_POST['password'] = "";
                $_POST['repassword'] = "";
            }else {
                echo "<script>alert('Wooops! Something Went Wrong.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email already exists.')" ;
        }
    } else {
        echo "<script>alert('Password Don't Matched.')</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Manager's Register</p>
            <div class="input-group">
                <input type="text" placeholder="Full Name" name="fullname" value="<?php echo $fullname; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>"required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Contact" name="contact" value="<?php echo $contact; ?>"required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['$password']; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="repassword" value="<?php echo $_POST['$repassword']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Have an account? <a href="managerlogin.php">Login Here</a>.</p>
        </form>
    </div>
</body>

</html>