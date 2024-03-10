<!--
Student Name: Raju Dahal
Student ID: 104055570

This file is used to display navigation buttons. Admin button is only displayed if the logged-in user has admin access.
-->
<ul class="navbar">
    <li class="active"><a href="../../Project1/booking.php">Book a Ride</a></li>
    <li><a href="../../Project1/logout.php">Log Out</a></li>
    <?php
    if($_SESSION['admin']){
        echo "<li><a href='../../Project1/admin.php'>Admin</a></li>";
    }
    ?>

</ul>