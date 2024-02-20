<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>README Viewer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .markdown {
            white-space: pre-wrap;
        }
    </style>
</head>
<body>

<?php
require 'header.php';
require_once 'vendor/autoload.php';
use cebe\markdown\GithubMarkdown as Markdown;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$currentURL = "$_SERVER[REQUEST_URI]";
$fileLocation = str_replace("/readme.php?", "", $currentURL);
$fileLocation .= "/readme.md";
$readme_content = file_get_contents($fileLocation);

$parser = new Markdown();
echo $parser->parse($readme_content);
?>

</body>
</html>
