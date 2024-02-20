<!doctype html>
<html lang="en">
<head>
    <title>Decending Numbers</title>
</head>
<body>
    <form>
        <div>
            <p>
                <label>Please Input a Number:<input type="number" name="number">
            </p>
            <input type="submit" name="submit" value="submit">
        </div>
    </form>

<?php
if(isset($_GET['submit'])){
    $number = $_GET['number'];
    for($i = $number; $i > 0; --$i){
        if($number % $i != 0 || $i == $number || $i == 1) echo "<br>$i";
    }
}
?>
</body>
</html>