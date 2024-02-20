# Lab Activity 1

This file contains my understanding and steps I took on doing lab activity 1.

### Activities
[Display Server Time on Submit](./../Lab1/simplephp_with_server_time.php)  
[Simple User Registration Form](../Lab1/userRegistration.php)

## Exercises

### 1. Activate your web account
- Get familiar with the lab software used for the unit.
- Log onto the web server mercury.
- Create a simple HTML test file with very little functionality (call it test.htm) into your mercury account and run the test page in your browser by going to "http://mercury.swin.edu.au".
- You can find a step-by-step example of using the Mercury web server in "A step-by-step example of using Mercury.pdf" in the Lab 1 folder downloaded from Canvas.

**Answer:** Not Applicable. Doing locally.

### 2. Get data with PHP
- Copy the code from “get data with PHP” example from Canvas into your mercury account.
- Load them into your preferred editor and just read the files carefully to understand the structure of the example and appreciate how the HTML and PHP technologies work together.
- In both IE and Firefox, go to the URL of the PHP file (simplephp.php) and run the PHP example. The PHP program has a “sleep” statement in it, so that the server takes time to respond.

**Answer:** Done. Could not test in IE as not available in Linux and latest version of Windows.

### 3. Get data with Ajax
- Copy the code of “get data with Ajax” example from Canvas into your mercury account.
- Load them into your preferred editor and just read the files carefully to understand the structure of the example and appreciate how the HTML, JavaScript, and PHP technologies work together with Ajax.
- In both IE and Firefox, go to the URL of the HTML files and run the Ajax example (simpleajax.htm). The PHP program has a “sleep” statement in it, so that the server takes time to respond. Experiment with various client interactions in the waiting period – for example, try entering different data whilst waiting for the server to respond, and see what the eventual response is.

**Answer:** Although the input values can be changed, the response from the server is based on the value when the submit button was clicked.

### 4. Extend PHP page
- Add a new feature based on b).
- Modify the “simplephp.php” page so that it also displays current server time on the page after the user clicks the ‘Send to server’ button.
- Use PHP built-in functions to finish this task.

**Answer:** See attached file [simplephp_with_server_time.php](../Lab1/simplephp_with_server_time.php).

### 5. Synchronous vs Asynchronous AJAX
- Modify the “simpleajax.js” file in c).
- Change the third parameter of the ‘XMLHttpRequest.open’ function from “true” to “false”, i.e., change ‘xhr.open("GET", url, true)’ to ‘xhr.open("GET", url, false)’.
- Then run both examples in c) and e) and try to find the difference between them.
- Hint: The difference between these two examples is due to asynchronous/synchronous mode of Ajax.

**Answer:** When the request is asynchronous (i.e., `true`), the request runs on the background and other operations are possible. When `false`, the program halts and waits for a response before continuing.

### 6. User Registration Page
- Modify the “simplephp.php” file in d).
- Extend this page to a user registration page.
    1. Change the file name to ‘userRegistration.php’.
    2. Use HTML form inputs to get user information. Ask users to input their Username/Password/Gender/Age-Range and Email. Try to use different form input types such as text/password.
    3. When the user clicks the ‘submit’ button, the PHP page simply checks whether the user input all required information. If all the information exists, the PHP page displays all input data with the registration time to users.

**Answer:** See attached file [userRegistration.php](../Lab1/userRegistration.php).
