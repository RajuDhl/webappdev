    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $inputErrors = [];

    if(isset($_POST['submit'])) {
        require_once('Includes/formValidation.php');

        $name = $_POST['nameField'];
    //    $userName = $_POST['userName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $confirmPass = $_POST['confirmPassword'];
        $admin = isset($_POST['admin']) ? 1 : 0;

        $nameError = validateName($name);
        if (!empty($nameError)) {
            $inputErrors['name'] = $nameError;
        }

    //    $userNameError = validateUsername($userName);
    //    if (!empty($userNameError)) {
    //        $inputErrors['userName'] = $userNameError;
    //    }

        $phoneError = validatePhone($phone);
        if (!empty($phoneError)){
            $inputErrors['phone'] = $phoneError;
        }

        $passwordError = validatePassword($password);
        if (!empty($passwordError)){
            $inputErrors['password'] = $passwordError;
        }

        if (!($password === $confirmPass)){
            $inputErrors['password'] = ["Passwords do not match"];
        }

        if (empty($inputErrors)) {
            $query = "Insert into user values ('$email', '$name', '$password', '$phone')";
            $admin_query = "Insert into admin values ('$email', '$admin')";
            require_once("Database/config.php");
            mysqli_query($con, $query);
            mysqli_query($con, $admin_query);

        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <link rel="stylesheet" href="CSS/login.css">
    </head>
    <body>
    <div class="sign-up">
        <form method="post">
            <h1>Please Sign Up!</h1>
            <label>Name: <br><input type="text" placeholder="Name" name="nameField" required></label>
    <!--        <input type="text" placeholder="Username" name="userName" required>-->
            <label>Email: <br><input type="email" placeholder="Email" name="email" required></label>
            <label>Phone: <br><input type="number" placeholder="Phone No" name="phone" required></label>
            <label>Password: <br><input type="password" placeholder="Password" name="password" id="password" required></label>
            <label>Confirm Password: <br><input type="password" placeholder="Confirm Password" name="confirmPassword" id="ConfirmPassword" required></label>
            <input id="admin-checkbox" type="checkbox" name="admin"> admin
            <button type="submit" class="submit" name="submit">Sign Up</button>
            <div class="help">
                <label>Already have an account? <a href="login.php">Sign In</a></label>
            </div>
        </form>
        <div class="error">
            <?php
            if (!empty($inputErrors)) {
                foreach ($inputErrors as $inputName => $errors) {
                    foreach ($errors as $error) {
                        echo "<br>* $error<br>";
                    }
                }
                $inputErrors = [];
            }
            ?>
        </div>
    </div>
    </body>
    </html>



