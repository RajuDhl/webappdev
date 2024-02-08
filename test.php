<?php
$file = "../data/bowlers.txt";
if (!file_exists($file)) {
    if (!touch($file)) {
        die("Error creating file");
    }
}
else echo "file exists"
?>