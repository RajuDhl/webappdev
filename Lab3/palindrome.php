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
        if(is_numeric($_GET['string'])){
            echo "<br>Input an string. Not a number.";
            exit;
        }
        $string = $_GET['string'];
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