<!doctype html>
<html lang="en">
<head>
    <title>Hawthorn Bowling Club</title>
</head>
<body>
<p> Input a name in below text box and click <b>search</b> button to see the phone number</p>
<form>
    <div>
        <label>Name:<input type="text" name="string">
        <input type="submit" name="submit" value="search">
    </div>
</form>

<?php
$file = "../data/bowlers.txt";
if(!file_exists($file)){
    die("<br>No registered member found! Please ensure the file exists and has some data.");
}
else {
    $data = file($file);
    $name = $_GET['string'];
    if (isset($_GET['submit']) && $name != null){
        $number = getNumber($name, $data);
        if($number != null){
            echo "<br>The phone number of <b>$name</b> is <b>$number</b>";
        }
        else{
            echo "<br>No record found for <b>$name</b>. Check input and try again.";
        }
    }
    else{
        echo "<br> please input a name";
    }

}
function getNumber($name, $data){
    for($i=0;$i<count($data);$i++){
        $bowler = explode(",",$data[$i]);
        if($bowler[0] == $name){
            return $bowler[1];
        }
    }
    return null;
}
{

}

?>

</body>