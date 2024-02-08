<!doctype html>
<html lang="en">
<head>
    <title>Simple Quiz</title>
</head>

<body>
<h2>Answer all the questions and press <b>SUBMIT</b> button to submit the quiz</h2>
<form>
    <div>
        <h3>What is the orange part of an egg called?</h3>
        <input type="radio" name="1" value="false">jelly<br>
        <input type="radio" name="1" value="false">ball<br>
        <input type="radio" name="1" value="true">yolk<br>
        <input type="radio" name="1" value="false">egg shell<br>
    </div></br>
    <div>
        <h3>What is a baby kangaroo called?</h3>
        <input type="radio" name="2" value="false">Kongo<br>
        <input type="radio" name="2" value="true">Joey<br>
        <input type="radio" name="2" value="false">boy<br>
        <input type="radio" name="2" value="false">club<br>
    </div><br>
    <div>
        <h3>In which country can you find the Eiffel Tower</h3>
        <input type="radio" name="3" value="false">Paris<br>
        <input type="radio" name="3" value="false">Italy<br>
        <input type="radio" name="3" value="false">USA<br>
        <input type="radio" name="3" value="true">France<br>
    </div><br>
    <div>
        <h3>What's the name of the river that runs through Egypt?</h3>
        <input type="radio" name="4" value="false">The Mile<br>
        <input type="radio" name="4" value="true">The Nile<br>
        <input type="radio" name="4" value="false">The Amazon<br>
        <input type="radio" name="4" value="false">The River of Egypt<br>
    </div><br>
    <div>
        <h3>What's the highest mountain in the world?</h3>
        <input type="radio" name="5" value="false">Burj Khalifa<br>
        <input type="radio" name="5" value="false">Mount K2<br>
        <input type="radio" name="5" value="true">Everest<br>
        <input type="radio" name="5" value="false">Mount Snow Peak<br>
    </div><br>

    <input type="submit" value="SUBMIT" name="submit">
</form>
</body>

<?php
if(isset($_GET['submit'])){
    $valid = validate($_GET);
    if($valid == 0){
        echo "<br>Please answer all the questions";
        exit;
    }
    $count = 0;
    $correct = 0;
    while($count < 5){
        if($_GET[++$count] == 'true'){
            echo "<br>Question $count: Correct";
            ++$correct;
        }
        else{
            echo "<br>Question $count: Incorrect";
        }
    }
    echo "<h3>You answered $correct out of $count questions correctly</h3>";
    if ($correct == 5) echo "<h2>Excellent!!</h2>";
}

function validate($answer){
    for($i=1; $i<=5; ++$i){
        if(!isset($answer[$i])){
           return 0;
        }
    }
    return 1;
}
{

}
?>
</html>