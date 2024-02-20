<html>
<body>

<H3>List employees who have experience in a programming language.<br/></H3>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = "localhost:3306";
$user = "root";
$password = "Kathmandu@1";
$database = "inventory";
$table = "inventory";

$DBConnect = @mysqli_connect($host, $user,$password, $database)
		Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ". mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";

// set up the SQL query string - we will retrieve the whole
// record that matches the name

// get language names from db

$SQLstring = "select DISTINCT language from languages";
$queryResult = query($SQLstring);

echo "<form>Please select a language: <select name='language'>";
	
$row = mysqli_fetch_row($queryResult);

while ($row) {
    echo "<option value='".$row[0]."'>".$row[0]."</option>";
    $row = mysqli_fetch_row($queryResult);
}

$cityQurey = "select DISTINCT city from employees";
$cityResult = query($cityQurey);

echo "</select><br/>Please input the minimum year required: <input type='text' name='year'/>
<br/>Please input the city required: <select name='city'>";

$city = mysqli_fetch_array($cityResult);

while ($city) {
    echo "<option value='".$city[0]."'>".$city[0]."</option>";
    $city = mysqli_fetch_array($cityResult);
}

echo "</select><input type='submit' value='Search'/></form>";

//if a language is selected, get data from table
if(isset($_GET['language'])) {
    if (isset($_GET['year']) && $_GET['year'] > 0) {
        $SQLstring = "select e.first_name,e.last_name,l.language,x.years, e.city FROM employees e, experience x,languages l where e.id=x.employee_id and x.language_id = l.language_id and l.language='" . $_GET['language'] . "' and e.city= '" . $_GET['city'] . "' and x.years>=" . $_GET['year'];
    } else {
        $SQLstring = "select e.first_name,e.last_name,l.language,x.years, e.city FROM employees e, experience x,languages l where e.id=x.employee_id and x.language_id = l.language_id and language='" . $_GET['language'] . "' and e.city= '" . $_GET['city'] . "'";
    }

// perform the query, storing the result
$queryResult = @mysqli_query($DBConnect, $SQLstring)
		Or die ("<p>Unable to query the employee table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";

echo "<p>List of Employees who have at least ", $_GET['year'], " years in ", $_GET['language'], " and from ", $_GET['city'], ".</p>";

echo "<table width='100%' border='1'>";
echo "<th>First Name</th><th>Last Name</th><th>Language</th><th>Year</th><th>city</th>";
	$row = mysqli_fetch_row($queryResult);

	while ($row) {
		echo "<tr><td>{$row[0]}</td>";
		echo "<td>{$row[1]}</td>";
		echo "<td>{$row[2]}</td>";
		echo "<td>{$row[3]}</td>";
		echo "<td>{$row[4]}</td></tr>";
		$row = mysqli_fetch_row($queryResult);
	}
	echo "</table>";


mysqli_close($DBConnect);

}

function query($syntax){
    global $DBConnect;
    $result = @mysqli_query($DBConnect, $syntax)
    Or die ("<p>Unable to query</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";

    return $result;
}
?>

</body>
</html>