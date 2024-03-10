<!--
Student Name: Raju Dahal
Student ID: 104055570

This file is for creating a new booking. It accepts user input, validates it and saves to booking table in the database.
A random reference no. is created by joining current datetime string and random number between 1000 and 9999 to ensure uniqueness.

If booking is successful, a success message is displayed. An error is displayed if there is some issue.
-->

<html lang="en">
<head>
    <title>Book a Ride</title>
</head>
<body>
    <link rel="stylesheet" href="CSS/style.css">
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();
    require ('Includes/navbar.php');
    require_once ('Database/config.php');
    require_once ('Includes/formValidation.php');
    if (strlen($_SESSION['id']) == 0){
        header('location:logout.php?id='.$_SESSION['id']);
    }
    else {
        $inputErrors = [];
        if (isset($_POST['submit'])){
            $name = $_POST['passenger_name'];
            $phone = $_POST['passenger_phone'];
            $unit = $_POST['unitNumber'];
            $streetNumber = $_POST['streetNumber'];
            $street = $_POST['streetName'];
            $suburb = $_POST['suburb'];
            $destination = $_POST['destination'];
            $time = $_POST['pickup_datetime'];

            $address = $streetNumber." ".$street.", ".$suburb;

            #get user email from sesion
            $email = $_SESSION['email'];
            echo "$email";

            #random booking reference number based on curent date/time
            $booking_reference = date('YmdHis') . mt_rand(1000, 9999);

            $inputErrors = validateForm([
                'name' => $name,
                'phone' => $phone,
                'unit' => $unit,
                'streetNumber' => $streetNumber,
                'street' => $street,
                'suburb' =>$suburb,
                'destination' => $destination,
                'time' => $time,
            ]);

            if (empty($inputErrors)) {
                $query = "Insert INTO booking (booking_reference, name, phone, email, unit, street_number, street_name, suburb, destination, pickup_time)
                        VALUES ('$booking_reference','$name','$phone','$email','$unit','$streetNumber','$street','$suburb','$destination','$time')";
                require_once("Database/config.php");
                if(mysqli_query($con, $query)){
                    header("location:success.php?reference=".$booking_reference."&address=".$address."&time=".$time);
                    exit;
                }
                else {
                    echo "Error: " . mysqli_error($con);
                }
            }
        }
    ?>
            <div>
                <h1>Booking a Cab!</h1>
                <h3>Please fill the fields below to book a taxi.</h3><br>
                <form class="input-form" method="post">
                    <label>Passenger Name: <input type="text" id="passenger_name" name="passenger_name" required></label>
                    <label>Passenger Phone: <input type="tel" id="passenger_phone" name="passenger_phone" pattern="[0-9]{10}" required></label>

                    <div id="pick-up-div">
                    <div>Pick up Address:</div>
                    <div id="pick-up">
                        <label>Unit Number:<input type="number" name="unitNumber"> </label>
                        <label>Street Number: <input type="number" name="streetNumber" required></label>
                        <label>Street Name: <input type="text" name="streetName" required></label>
                        <label>Suburb: <input type="text" name="suburb" required></label>
                    </div>
                    </div><br>

                    <label>Destination Suburb: <textarea rows="3" cols="5" id="destination_suburb" name="destination" required></textarea></label>
                    <label>Pick-up Date/Time: <input type="datetime-local" id="pickup_datetime" name="pickup_datetime" required></label>
                    <button type="submit" name="submit" class="submit">Book</button>
                    <div class="error">
                        <?php
                        if (!empty($inputErrors)) {
                            foreach ($inputErrors as $err){
                                echo "<br>* $err<br>";
                            }
                        $inputErrors = [];
                        }
                        ?>
                    </div>
                </form>
            </div>


    <?php
        mysqli_close($con);
    }
    ?>

    <?php require('Includes/footer.php');?>
</body>
</html>



