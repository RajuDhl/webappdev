<!doctype html>
<html lang="en">
<head>
    <title>Simple Quiz</title>
</head>

<body>
<h2>Answer all the questions and press <b>SUBMIT</b> button to submit the quiz</h2>
</body>
<form>
    <?php
    $questions = file('questions.txt');
    $answers = file('answers.txt');
    for($i=0; $i<count($questions); $i++){
        $question = explode(",",$questions[$i]);
        $answer = explode(",", $answers[$i]);
        echo "<h3>$question[0]</h3>";
        for($j=0; $j<count($answer); $j++){
            $value = 'false';
            if(trim($answer[$j]) == trim($question[1])) {
                $value = 'true';
            }
            echo "<input type='radio' name=$i value=$value>$answer[$j]<br>";
        }
    }
    echo "<br>"
    ?>
    <input type="submit" value="SUBMIT" name="submit">
</form>

<?php
$total = count(file('questions.txt'));

if(isset($_GET['submit'])){
    $valid = validate($_GET);
    if($valid == 0){
        echo "<br>Please answer all the questions";
        exit;
    }
    $count = 0;
    $correct = 0;
    while($count <  $total){
        if($_GET[$count++] == 'true'){
            echo "<br>Question $count: Correct";
            ++$correct;
        }
        else{
            echo "<br>Question $count: Incorrect";
        }
    }
    echo "<h3>You answered $correct out of $count questions correctly</h3>";
    if ($correct == $total) echo "<h2>Excellent!!</h2>";
}

function validate($answer): bool
{
    global $total;
    unset($answer['submit']);
    return count($answer) === $total;
}

?>
</html>