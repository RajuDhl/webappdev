<!--
Student Name: Raju Dahal
Student ID: 104055570

This file is used to sign in to the interface. It checks if the user with given credential exists and securely redirect the
user to booking page if info is found.
-->

<?php
session_start();
require_once("Database/config.php");
$user = "user";

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT u.*, a.admin FROM user u, admin a WHERE u.email=a.email AND u.email='$email' AND u.password='$password'";
    $result = mysqli_query($con, $query);
    $user = mysqli_fetch_array($result);

    if ($user > 0){
        header("location:login.php?user=".$email."&admin=".$user['admin']);
    }
    mysqli_close($con);
}

?>

<html>
<head>
    <title>Sign In</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
<div class="input-form">
    <form method="post">
        <h1><?php if (isset($_GET['message'])) {
                $successMessage = htmlspecialchars($_GET['message']);
                echo "<p>$successMessage</p>";
            }?></h1>
        <h1>Please Sign In!</h1>
        <input type="email" placeholder="Email" name="email" required>
        <input type="password" placeholder="Password" name="password" required>
        <button type="submit" name="submit" class="submit">Sign In</button>
        <div class="help">
            <a href="#">Forgot Password</a>
            <a href="registration.php">Sign Up</a>
        </div>
        <div class="error">
            <?php
                if (!($user > 0)){
                    echo "Invalid Username or Password";
                }
            ?>
        </div>

    </form>
</div>
</body>
</html>