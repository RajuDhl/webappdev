<!--
Student Name: Raju Dahal
Student ID: 104055570

This file is used for all the form validation in the interface.
-->
<?php
/**
 * Function to validate form inputs.
 *
 * This function takes variable number of arguments representing form inputs.
 * It validates each input based on its type and returns an array of errors, if any.
 *
 * @param array ...$inputs An array containing form inputs.
 * @return array An array containing any validation errors found.
 */
function validateForm(...$inputs): array
{
    $errors = [];
    foreach ($inputs[0] as $type => $input){
        switch ($type){
            case 'name':
            case 'street':
            case 'suburb':
                $errors = array_merge($errors, validateName($type, $input));
                break;
            case 'unit':
            case 'streetNumber':
                $errors = array_merge($errors, validateShortInt($type, $input));
                break;
            case 'phone':
                $errors = array_merge($errors, validatePhone($input));
                break;
            case 'password':
                $errors = array_merge($errors, validatePassword($input));
                break;
            case 'time':
                $errors = validateBookingTime($input);
                break;
            default:
                break;
        }
    }
    return $errors;
}
/**
 * Function to validate a short string like name, street name, suburb.
 *
 * This function validates the input to ensure it contains only alphabetic characters and no special characters or numbers.
 * It returns an array containing any validation errors found.
 *
 * @param string $field The name of the input field being validated.
 * @param string $name The input value to be validated.
 * @return array An array containing any validation errors found.
 */
function validateName($field, $name): array
{
    $errors = [];
    if(is_numeric($name)){
        $errors["name"] = "Input an string. Not a number.";
    }
    else{
        $numbers = '/[0-9]/';
        $special = '/^\w\s/';
        if(preg_match($numbers, $name) || preg_match($special, $name)){
            $errors[$field] = "$field contains special characters or numbers.";
        }
    }
    return $errors;
}

/**
 * Function to validate a password.
 *
 * This function validates the input to ensure it meets the required password criteria.
 * It returns an array containing any validation errors found.
 *
 * @param string $password The password to be validated.
 * @return array An array containing any validation errors found.
 */
function validatePassword($password): array
{
    $errors = [];
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>])[A-Za-z\d!@#$%^&*()\-_=+{};:,<.>.]{8,}$/', $password)) {
        $errors['password'] = "Password must contain at least one lowercase letter, one uppercase letter, one number, one special character, and be at least 8 characters long.";
    }
    return $errors;
}

/**
 * Function to validate a phone number.
 *
 * This function validates the input to ensure it meets the required phone number criteria.
 * It returns an array containing any validation errors found.
 *
 * @param string $phone The phone number to be validated.
 * @return array An array containing any validation errors found.
 */
function validatePhone($phone): array
{
    $errors = [];
    if (strlen($phone) < 9 || strlen($phone) > 11){
        $errors['phone'] = "Invalid Phone Number";
    }

    return $errors;

}

/**
 * Function to validate a short integer value like unit number, street number etc.
 *
 * This function validates the input to ensure it is a short integer within the specified range.
 * It returns an array containing any validation errors found.
 *
 * @param string $type The type of the input field being validated (e.g., 'unit', 'streetNumber').
 * @param string $input The input value to be validated.
 * @return array An array containing any validation errors found.
 */
function validateShortInt($type, $input): array
{
    $errors = [];
    switch ($type){
        case 'unit':
            if(strlen($input) > 4){
                $errors[$type] = "$type number should be between 1 and 4 characters";
            }
            break;
        default:
            if (strlen($input) < 1 || strlen($input) > 4){
                $errors[$type] = "$type number should be between 1 and 4 characters";
            }
            break;
    }


    return $errors;
}

/**
 * Function to validate a booking time.
 *
 * This function validates the input time to insure booking is made for after 40 minutes.
 * It returns an array containing any validation errors found.
 *
 * @param string $time The booking time to be validated.
 * @return array An array containing any validation errors found.
 */
function validateBookingTime($time): array
{
    $errors = [];
    $currentTimestamp = time();
    $minimumTimestamp = $currentTimestamp + 2400;
    if(strtotime($time) < $minimumTimestamp){
        $errors['time'] = "Pick Up should at least be 40 minutes after current time. ".$_SESSION['id'];
    }
    return $errors;
}

/**
 * Function to check if a user email already exists in the database.
 *
 * This function checks if the provided email address already exists in the database.
 * It returns an array containing any validation errors found.
 *
 * @param mysqli $con The database connection object.
 * @param string $email The email address to be checked.
 * @return array An array containing any validation errors found.
 */
function checkIfExists($con, $email): array
{
    $errors = [];
    $query = "Select * from user where email='$email'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    if(!empty($row)){
        $errors['email'] = "User with email ".$email." exists. Please <a href='../signin.php'>log in";
    }
    return $errors;
}
{

}
?>