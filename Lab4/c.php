<!doctype html>
<html lang="en">
<head>
    <title>Search</title>
</head>
<body>
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

$select_query = "SELECT DISTINCT make FROM $table ORDER BY make";
$select_options = mysqli_query($DBConnect, $select_query);

echo "<form>";
echo "Please select a make";
echo "<select name='make'>";
echo "<option value='all'>ALL</option>";
while ($row = mysqli_fetch_assoc($select_options)) {
    $make = $row['make'];
    echo "<option value='$make'>$make</option>";
}

echo "</select>";
echo "<br><br><button type='submit' name='submit' value='submit'>submit</button><br><br>";
echo "</form>";

if(isset($_GET['submit'])){
    echo "<h1>Content of the Inventory Table</h1>";
    $select = $_GET['make'];
    if($select == 'all'){
        $option_query = "SELECT * FROM $table";
    }
    else{
        $option_query = "SELECT * FROM $table where make = '$select'";
    }
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
}

?>

</body>
</html>