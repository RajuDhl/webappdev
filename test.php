
<?php
// log error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$file = "../data/bowlers.txt";
if (!file_exists($file)) {
    if (!touch($file)) {
        die("Error creating file");
    }
}
else echo "file exists"
?>