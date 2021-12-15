<?php

include 'config.php';

error_reporting(0);
session_start();

if(isset($_SESSION['username'])) {
    header("location: customerlogin.php");
}

if(isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $repassword = md5($_POST['repassword']);
    $gender = $_POST['gender'];
    $roles = $_POST['roles'];

    if($password == $repassword) {
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (firstname, lastname, username, email, password, gender, role) VALUES ('$firstname','$lastname','$username','$email','$password', '$gender', '$role')";
            $result = mysqli_query($conn, $sql);
            if($result) {
                echo "<script>alert('Wow! User Registration Successful.')</script>";
                $firstname = "";
                $lastname = "";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['repassword'] = "";
                $gender = "";
                $roles = "";
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
    <title>Customer Registration</title>
</head>

<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Customer Register</p>
            <div class="input-group">
                <input type="text" placeholder="First Name" name="firstname" value="<?php echo $firstname; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Last Name" name="lastname" value="<?php echo $lastname; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>"required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['$password']; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="repassword" value="<?php echo $_POST['$repassword']; ?>" required>
            </div>
            <div class="input-group">
                <select name="gender" class="form-control" value="<?php echo $gender; ?>">
                    <option value="none" selected>Gender</option>
                    <option value="male" id="1">Male</option>
                    <option value="female" id="2">Female</option>
                    <option value="Other" id="3">Other</option>
                </select>
            </div>
            <div class="input-group">
                <select class="form-control" name="roles" value="<?php echo $roles; ?>">
                    <option value="" selected="selected"> Select Role </option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="input-group">
                <button name="submit" class="btn"><a href="index.php">Register</a></button>
            </div>
            <p class="login-register-text">Already a member? <a href="customerlogin.php">Login Here</a>.</p>
        </form>
    </div>
</body>

</html>