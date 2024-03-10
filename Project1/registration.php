<!--
Student Name: Raju Dahal
Student ID: 104055570

This file is used register a new user. First it checks if the user with email address exists. If user exists, error message
is shown and user is asked to log in. IF all checks pass, the user data is saved in the user table. A separate table named
admin is used to save user access level, ie, admin or user.
-->

<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $inputErrors = [];

    if(isset($_POST['submit'])) {
        require_once('Includes/formValidation.php');
        require_once("Database/config.php");

        $name = $_POST['nameField'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $confirmPass = $_POST['confirmPassword'];
        $admin = isset($_POST['admin']) ? 1 : 0;

        $existingError = checkIfExists($con, $email);
        if(empty($existingError)){
            $inputErrors = validateForm([
                'name' => $name,
                'phone' => $phone,
                'password' => $password,
            ]);
            if (!($password === $confirmPass)){
                $inputErrors= ["Passwords do not match"];
            }

            if (empty($inputErrors)) {
                $query = "Insert into user values ('$email', '$name', '$password', '$phone')";
                $admin_query = "Insert into admin values ('$email', '$admin')";
                mysqli_query($con, $query);
                if(mysqli_query($con, $admin_query)){
                    header("location:login.php?user=".$email."&admin=".$admin);
                    exit;
                }
                else {
                    echo "Error: " . mysqli_error($con);
                }

            }
        }


    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <link rel="stylesheet" href="CSS/style.css">
    </head>
    <body>
    <div class="input-form">
        <form method="post">
            <h1>Please Sign Up!</h1>
            <label>Name: <br><input type="text" placeholder="Name" name="nameField" required></label>
    <!--        <input type="text" placeholder="Username" name="userName" required>-->
            <label>Email: <br><input type="email" placeholder="Email" name="email" required></label>
            <label>Phone: <br><input type="tel" placeholder="Phone No" name="phone" required></label>
            <label>Password: <br><input type="password" placeholder="Password" name="password" id="password" required></label>
            <label>Confirm Password: <br><input type="password" placeholder="Confirm Password" name="confirmPassword" id="ConfirmPassword" required></label>
            <input id="admin-checkbox" type="checkbox" name="admin"> admin
            <button type="submit" class="submit" name="submit">Sign Up</button>
            <div class="help">
                <label>Already have an account? <a href="signin.php">Sign In</a></label>
            </div>
        </form>
        <div class="error">
            <?php
            if (!empty($inputErrors)) {
                foreach ($inputErrors as $err){
                    echo "<br>* $err<br>";
                }
                $inputErrors = [];
            }
            ?>
        </div>
    </div>
    </body>
    </html>



