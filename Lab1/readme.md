This file contains my understanding and steps I took on doing lab activity 1.

`Exercises`

<ul>
Get familiar with the lab software used for the unit.
<li>Activate your web account</li>
<li>Log onto the web server mercury</li>
<li>Create a simple html test file with very little functionality (call it test.htm) into your mercury account and run 
the test page in your browser by going to "http://mercury.swin.edu.au"(You can find a step-by-step example of using Mercury
web server “A step-by-step example of using Mercury.pdf” in the Lab 1 folder downloaded from Canvas)</li>
</ul>

Answer: Not Applicable. Doing locally in XAMPP

<ul>
Copy the code from “get data with PHP” example from Canvas into your mercury account. Load them into your preferred editor,
and just read the files carefully, so that you get a good feeling the structure of the example, and appreciate how the html
and PHP technologies work together. In both IE and Firefox, go to theURL of the PHP file (simplephp.php)and run the PHP 
example.The PHP program has a “sleep” statement in it, so that the server takes time to respond.
</ul>

Answer: Done. Could not test in IE as not available in linux and latest version of Windows

<ul>
Copy the code of “get data with Ajax” example from Canvas, into your mercury account.Load them into your preferred 
editor, and just read the files carefully, so that you get a general picture for the structure of the example, and 
appreciate how the html, JavaScript and PHP technologies work together with Ajax. In both IE and Firefox, go to the URL
of the HTML files and run the Ajax example (simpeajax.htm). The PHP program has a “sleep” statement in it, so that the 
server takes time to respond. Experiment with various client interactions in the waiting period –for example, try
entering different data whilst waiting for the server to respond, and see what the eventual response is.
</ul>

Answer: Although the input values can be changed, the response from server is based on the value when submit button was 
clicked

<ul>
We now add a new feature based on b). Modify the “simplephp.php” page so that it also displays current server time on 
the page after the user click ‘Send to server’ button.Use PHP built-in functions to finish this task.
</ul>

Answer: See attached file [simplephp_with_server_time.php](simplephp_with_server_time.php)

<ul>
Modify the “simpeajax.js” file in c). Change the third parameter of ‘XMLHttpRequest.open’function from “true” to “false”,
i.e., change ‘xhr.open("GET", url, true)’to ‘xhr.open("GET", url, false)’. Then run both examples in c) and e) and try 
to find the difference between them.(Hint:The difference between these two examples is due to asynchronous/synchronous 
mode of Ajax)
</ul>

Answer: When the request is asynchronous, ie `True`, the request runs on background and other operations are possible. 
When `False` the program halts and waits for a response before continuing.

<ul>
Modify the “simplephp.php” file in d). We now try to extend this page to a user registration page.1)Change the file name
to ‘userRegistration.php’.2) Use HTML form inputs to get user information (see Figure 2). We ask users to input their 
Username/Password/Gender/Age-Range and Email. Try to use different form input types such as text/password/3)When the user
click ‘submit’ button, the PHP page simply check whether user input all required information. If all the information exists,
the PHP page displays all input data with the registration time to users.
</ul>

Answer: See attached file [userRegistration.php](userRegistration.php)
