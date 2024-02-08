<!--file simplePHP.php -->

<HTML XMLns="http://www.w3.org/1999/xHTML"> 
  <head> 
    <title>User Registration</title>
  </head> 
  <body>
  <H1>A Simple User Registration page</H1>

  <form>
	    <label>User Name:  <input type="text" name="namefield"> </label>
 	    <label><br>Password: <input type="password" name="pwdfield"> <br> </label>
      <label>Gender<input type="radio" name="gender" value="male"> Male</label>
      <label><input type="radio" name="gender" value="female"> Female</label>
      <label><input type="radio" name="gender" value="other"> Other <br></label>
      <label>Age:</label>
      <select name="age-group">
          <option>select</option>
          <option>0-20</option>
          <option>21-30</option>
          <option>31-50</option>
          <option>51-100</option>
      </select><br>
      <label>Email:<input name="email" type="email"><br></label>
      <input type="submit" value="Submit" name="submit" />
  </form>
  
  <p></p>
  </body> 

<?php
	// get name and password passed from client

if(isset($_GET['submit'])) {
    $name = $_GET['namefield'];
    $pwd = $_GET['pwdfield'];
    $gender = $_GET['gender'];
    $age = $_GET['age-group'];
    $email = $_GET['email'];

    if (isset($_GET['namefield']) && isset($_GET['pwdfield']) && isset($_GET['gender']) && isset($_GET['age-group']) && isset($_GET['email'])) {
        echo "Name: $name";
        echo "<br>Password: $pwd";
        echo "<br>Gender: $gender";
        echo "<br>Age: $age";
        echo "<br>Email: $email";
        echo "<br>Current Server Time: " . date('D M d h:i:s e Y');
    }
    else{
        echo"<h3><b>Please check the input values and try again</b>";
    }
}
?>

</HTML>