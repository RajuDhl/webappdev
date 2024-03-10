<!--
Student Name: Raju Dahal
Student ID: 104055570

This file is used to display a success message on a successful booking. An email containing similar message is sent to the user.
-->
<body>
<link rel="stylesheet" href="CSS/style.css">
<?php
if (isset($_GET['reference'])) {
    $reference = $_GET['reference'];
    $address = $_GET['address'];
    $time = $_GET['time'];
    $date = date("j F Y", strtotime($time));
    $time = date("g:i a", strtotime($time));
    $successMessage = htmlspecialchars($reference);

    session_start();
    require('Includes/navbar.php');
    require_once('Database/config.php');

    if (strlen($_SESSION['id']) == 0) {
        header('location:logout.php');
    } else {
        $message = '<div class="success">
            <h1>Thank you!</h1>
            <p>Your booking reference number is <b style="font-size: 25px">' . $reference . '</b>.</p>
            <p> We will pick up the passengers in front of your provided address at 
            <b style="font-size: 19px">'.$address.'</b> on <b style="font-size: 19px">'.$date.'</b> at <b style="font-size: 19px">'.$time.'</b></p>
            <p>Click here to <a href="booking.php">Book a next ride!!</a></p>
        </div>';

        echo $message;

        // get saved data from database to send mail
        $query = "SELECT * FROM booking WHERE booking_reference='$reference'";
        $user_data = mysqli_query($con, $query);
        $row = mysqli_fetch_array($user_data);


        $to = "104055570@student.swin.edu.au";
        $name = $row['name'];

        $subject = "Your booking request with CabsOnline";
        $headers = "From: booking@cabsonline.com.au";
        $fallback = "dahalraju55@gmail.com";

        $emailMessage = 'Dear '.$name.', Thanks for booking with CabsOnline! Your booking  reference  number  is
                '.$reference.', We will pick up the passengers infront of your provided address at 
                '.$time.' on '.$date;

        $success = mail($to, $subject, $emailMessage, $headers, "-r $fallback");

        echo $success;
        mysqli_close($con);
    }
}
else {
    header('location:booking.php');
}

?>
</body>
