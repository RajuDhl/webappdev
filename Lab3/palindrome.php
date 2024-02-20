<!doctype html>
<html lang="en">
<head>
    <title>Perfect Palindrome</title>
</head>
<body>
<h1> Check for a perfect palindrome</h1>
<form>
    <div>
        <p>
            <label>String:<input type="text" name="string">
        </p>
        <input type="submit" name="submit" value="Check for perfect palindrome">
    </div>
</form>

<?php
if(isset($_GET['submit'])){
    if(isset($_GET['string']) && $_GET['string'] != null){
        $string = $_GET['string'];
        if(is_numeric($string)){
            echo "<br>Input an string. Not a number.";
            exit;
        }
        else{
            $numbers = '/[0-9]/';
            $special = '/^\w\s/';
            if(preg_match($numbers, $string) || preg_match($special, $string)){
                echo "<br>Your string contains special characters or numbers";
                exit;
            }
        }
        if($string == strrev($string)){
            echo "<br>The text you entered <b>$string</b> is a perfect palindrome";
        }
        else echo "<br>Not a palindrome";
    }
    else{
        echo "<br>Please enter a string";
    }

}
?>
</body>
</html>