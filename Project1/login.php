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
        $_SESSION['email'] = $user['email'];
        $_SESSION['admin'] = $user['admin'];
    }
}

?>

<html>
<head>
    <title>Sign In</title>
    <link rel="stylesheet" href="CSS/login.css">
</head>
<body>
<div class="sign-up">
    <form method="post">
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