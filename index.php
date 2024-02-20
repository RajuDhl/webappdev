<!---->
<?php
//// log error
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
//
//$file = "data/bowlers.txt";
//if (!file_exists($file)) {
//    if (!touch($file)) {
//        die("Error creating file");
//    }
//}
//else echo "file exists"
//?>
<?php
//$string = "Test1"; // Example input string
//$pattern = '/[0-9]\/';
//
//// Verify input string
//echo "Input string: $string <br>";
//
//// Test regular expression pattern
//if(preg_match($pattern, $string)) {
//    echo "Your string contains special characters";
//} else {
//    echo "Your string does not contain special characters";
//}
//?>

<?php
require 'header.php';

$currentURL = "$_SERVER[REQUEST_URI]";
echo "<br>";
// Loop from 1 to 12 to generate links
for ($i = 1; $i <= 12; $i++) {
    // Generate the link with the folder name
    $folderName = "Lab$i";
    $link = "$folderName";

    // Output the clickable link
    echo "<a href='readme.php?$folderName'>$folderName</a><br>";
}
?>


