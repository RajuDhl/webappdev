`Exercises`

<ul>
Copy the code of “example_conditional.php” example from Canvas, into your mercury account, the various files from 
Lecture 2 which are stored in the Lab 2folder, within the labs section on Canvas. Change the code to use “if/elseif/else” 
statements instead of “switch” statement to output the same result.
</ul>

Answer: See attached file [conditional.php](conditional.php)

<ul>
Copy the code of “example_loop.php” from Canvas, into your mercury account, the various files from Lecture-2 which are
stored in the Lab 2folder, within the labs section on Canvas. Now the code implements two functions, that given an input
integer, the code can calculate either the factorial of that number or the Fibonacci numbers.Modify this file and add one
more function that calculates the sum of all integers from 1 to the given number (see Figure 1and Figure 2).
</ul>

Answer: See attached file [loop.php](loop.php)

<ul>
Create a file on your editor and copy the code below into the file. What output do you think the code will produce? Then
upload this code to mercury server and run it through a web browser and check the result.Change the code from ‘echo $i--‘
to ‘echo --$i’. Now what output do you think the code will produce? Run this code in mercury and check the result.
</ul>

Answer: when the code is `$i--`, output is:<br> `10 9 7 6`<br> When the code is changed to --$i, the output is <br> `9 8 6 5`
<br> This is because of `pre-increment` and `post-increment`. $i-- decreases $i, but evaluates to the old value of $i whereas
--$i decreases $i, but evaluates to the value of $i-1.

<ul>
Write a PHP page, which provide a text box and a button on the page. The user can input an integer (the number should be
larger than 0)in the text box and press the button, then the web page prints all the integers from the given number to 1
except the those numbers that can divide the given integer evenly. (For example, if the user input a number of 12, then 
the page prints the result as “12,11,10,9,8,7,5,1”, because 12 can be divided evenly by 6,4,3,2.Always output the number
itself and the number 1)
</ul>

Ansper: See attached file [question_d.php](question_d.php)

<ul>
Write a simple online quiz.Initially, the web page shows 5 questions, and each question has four options. User can choose
the answer of each question, then click “submit” button to submit the results to server. The PHP page analysis the submitted
results then print the score (see Figure 4 and Figure 5).You don’t need to use the same questions as shown. You can create
your own questions.
</ul>

Answer: See attached file [quiz.php](quiz.php)
