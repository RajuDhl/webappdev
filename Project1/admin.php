<!--
Student Name: Raju Dahal
Student ID: 104055570

This file is for admin view and can only be viewed if logged-in user is admin. It has two sections. The first section consists of a
"list all" button that lists all bookings in next 3 hours. The second section allows admin to assign a taxi by clicking
assign button after inputting reference no. Both sections are only visible after clicking "list all" button only if there
is some record that needs assigning.
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
<?php
session_start();
require ('Includes/navbar.php');
require_once ('Database/config.php');

if (strlen($_SESSION['id']) == 0) {
    header('location:logout.php');
} elseif (!$_SESSION['admin']) {
    header('location:booking.php');
} else {
    echo "";
    echo "<div>";
        echo '<h1>Admin page of CabsOnline</h1>';
        echo '<h3>Click below button to search for all unassigned booking requests with pick-up time within the next 3 hours.</h3>';
        echo '<form id="admin-form" method="GET"><button type="submit" name="submit" id="list-admin">List All</button><br><br>';

        if(isset($_GET['submit'])){
            // Fetch data of upcoming 3 hours' booking
            $query = "SELECT b.booking_reference, b.name AS passenger_name, u.name AS customer_name, b.phone,
                    CASE
                        WHEN b.unit IS NOT NULL THEN CONCAT(b.unit, '/', b.street_number, ' ', b.street_name, ', ', b.suburb)
                        ELSE CONCAT(b.street_number, ' ', b.street_name, ', ', b.suburb)
                    END AS address, 
                    b.destination, b.pickup_time 
                    FROM booking b
                    JOIN user u ON b.email = u.email
                    WHERE b.pickup_time >= NOW() 
                    AND b.pickup_time <= DATE_ADD(NOW(), INTERVAL 3 HOUR) 
                    AND b.is_assigned = false";

            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) == 0){
                echo "<p style='color: red'>No unassigned bookings found within the next 3 hours.</p>";
                echo "</form>";
            } else {
                //display the data in table
                echo "<table id='table'>
                        <tr>
                            <th>Booking Reference</th>
                            <th>Customer Name</th>
                            <th>Passenger Name</th>
                            <th>Passenger Contact Phone</th>
                            <th>Pick-up Address</th>
                            <th>Destination Suburb</th>
                            <th>Pickup Time</th>
                        </tr>";
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    foreach ($row as $key => $item){
                        echo "<td>" . $item . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
                echo "</form>";
            echo "</div>";
            ?>
                <div>
                    <hr><hr>
                    <h3>Input a reference number below and click "update" button to assign a taxi to the request</h3>
                    <form method="POST">
                        <div id="assign-form">
                            <input type="text" name="reference">
                            <button type="submit" name="assign" id="assignButton">Submit</button><br><br>
                        </div>
                    </form>
                </div>
        <?php
        }
            if (isset($_GET['message'])) {
                echo "<hr>".$_GET['message'];
            }
        }
    ?>
    <?php
    // assigning a cab
    if(isset($_POST['assign']) && !empty($_POST['reference'])){
        $reference = $_POST['reference'];
        $checkReference = "SELECT * FROM booking WHERE booking_reference='$reference'";
        $items = mysqli_query($con, $checkReference);
        $items = mysqli_fetch_array($items);
        if(empty($items)){
            $message =  "<h3>Unknown reference number. Please try again</h3>";
        }
        elseif ($items['is_assigned']){
            $message= "<h3>Already assigned a cab. cannot assign again.</h3>";
        }
        else{
            $query = "UPDATE booking SET is_assigned=true WHERE booking_reference='$reference'";
            if(mysqli_query($con, $query)){
                $message = "<h3>The booking request ".$reference." has been properly assigned</h3>";
            } else {
                $message = "<h3>Unknown reference number. Please try again</h3>";
            }
        }
        header("location:admin.php?submit=&message=".$message);
    }
}

?>

</body>
</html>
