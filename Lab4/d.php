<!doctype html>
<html lang="en">
<head>
    <title>Search</title>
</head>
<body>
    <form>
        <h2>Insert a new row</h2><br>
        <label>Make: <input type='text' name='make'></label><br>
        <label>Model: <input type='text' name='model'></label><br>
        <label>Price: <input type='number' name='price'></label><br>
        <label>Quantity: <input type='number' name='quantity'></label><br>
        <br><br>
        <button type='submit' name='submit' value='submit'>Submit</button><br><br>
    </form>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = "localhost:3306";
$user = "root";
$password = "Kathmandu@1";
$database = "inventory";
$table = "inventory";

$DBConnect= @mysqli_connect($host, $user,$password);
if (!$DBConnect){
    die("Unable to connect to the database");
}
$db = @mysqli_select_db($DBConnect, $database);
if (!$db){
    die("No database named $database, check name and try again");
}

if(isset($_GET['submit'])){
    $make = $_GET['make'];
    $model = $_GET['model'];
    $price = intval($_GET['price']);
    $quantity = intval($_GET['quantity']);
    $valid = validate($make, $model, $price, $quantity);
    if($valid){
        $insert_query = "Insert into $table (`make`, `model`, `price`, `quantity`) values('$make', '$model', $price, $quantity)";
        $insert = @mysqli_query($DBConnect, $insert_query);
    }

}


echo "<h1>Content of the Inventory Table</h1>";
//$select = $_GET['make'];
$option_query = "SELECT * FROM $table";
$options = @mysqli_query($DBConnect, $option_query);

echo "<table width='100%' border='1'>";
echo "<tr><th>Make</th><th>Model</th><th>Price</th><th>Quantity</th></tr>";

$row = mysqli_fetch_row($options);
while ($row){
    echo "<tr>";
    for ($i=1; $i<count($row); $i++){
        echo "<td>{$row[$i]}</td>";
    }
    echo "</tr>";
    $row = mysqli_fetch_row($options);
}
echo "</table>";

function validate($make, $model, $price, $quantity){
    if($make == null || $model == null || $price == null || $quantity == null){
        echo "Please input all the values";
        return 0;
    }
    if($price > 0 && $quantity > 0){
        return 1;
    }
    else{
        if($price<=0){
            echo "Price must be positive number";
            return 0;
        }
        echo "quantity must be positive number";
    }
    return 0;
}
{

}

?>

</body>
</html>