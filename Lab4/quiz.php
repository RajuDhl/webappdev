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
    $host = "localhost:3306";
    $user = "root";
    $password = "Kathmandu@1";
    $database = "inventory";
    $table = "inventory";

    $DBConnect = @mysqli_connect($host, $user,$password, $database)
    Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ". mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";

    $query = "SELECT * FROM quiz";
    $result = @mysqli_query($DBConnect, $query)
    Or die ("<p>Unable to query</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";

    $options = mysqli_fetch_array($result);
    $count = 1;

    while ($options){
        $answers = explode(",", $options[1]);
        $correct_answer = $options[2];
        echo "<h3>$options[0]</h3>";

        for($j=0; $j<count($answers); $j++){
            $value = false;
            $answer = trim($answers[$j]);
            if($answer == $correct_answer) {
                $value = true;
            }
            echo "<input type='radio' name=$count value=$value>$answer<br>";

            }
        $options = mysqli_fetch_array($result);
        ++$count;
    }
    ?>
    <input type="submit" value="SUBMIT" name="submit">
</form>

<?php
$total = 5;
//$total = count(file('questions.txt'));

if(isset($_GET['submit'])){
    $valid = validate($_GET);
    if($valid == 0){
        echo "<br>Please answer all the questions";
        exit;
    }
    $count = 0;
    $correct = 0;
    while($count <  $total){
        if($_GET[++$count]){
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