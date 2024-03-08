<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$xmlFile = "c.xml";
$HTML = "";
$temperature = 0;
$count = 0;
$dom = new DOMDocument();
$dom->load($xmlFile);

$entries = $dom->getElementsByTagName("entry");

foreach ($entries as $entry){
    $day = $entry->getElementsByTagName("day")->item(0)->nodeValue;
    $month = $entry->getElementsByTagName("month")->item(0)->nodeValue;
    $year = $entry->getElementsByTagName("year")->item(0)->nodeValue;
    $temp = $entry->getElementsByTagName("maxTemperature")->item(0)->nodeValue;

    echo $day."/", $month."/", $year." : ", $temp, "</br></br>";

    $count++;
    $temperature += $temp;
}
echo "Average temperature is ". $temperature/$count;
?>