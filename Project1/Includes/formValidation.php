<?php
function validateName($name): array
{
    $errors = [];
    if(is_numeric($name)){
        $errors["name"] = "Input an string. Not a number.";
    }
    else{
        $numbers = '/[0-9]/';
        $special = '/^\w\s/';
        if(preg_match($numbers, $name) || preg_match($special, $name)){
            $errors["name"] = "Name contains special characters or numbers.";
        }
    }
    return $errors;
}

//function validateUsername($userName): array
//{
//    $errors = [];
//    if(strlen($userName) > 16 || strlen($userName) < 3){
//        $errors["userName"] = "Username must be between 3 to 16 characters";
//    }
//    else{
//       if (preg_match('/^\w\s/', $userName)){
//           $errors["name"] = "Username contains special characters.";
//       }
//    }
//    return $errors;
//}

function validatePassword($password): array
{
    $errors = [];
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>])[A-Za-z\d!@#$%^&*()\-_=+{};:,<.>.]{8,}$/', $password)) {
        $errors['password'] = "Password must contain at least one lowercase letter, one uppercase letter, one number, one special character, and be at least 8 characters long.";
    }
    return $errors;
}

function validatePhone($phone): array
{
    $errors = [];
    if (strlen($phone) < 9 || strlen($phone) > 11){
        $errors['phone'] = "Invalid Phone Number";
    }

    return $errors;

}
?>