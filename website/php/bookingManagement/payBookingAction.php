<?php
require_once("functions.php");

$connection = connect();
$paid = 1 - $_GET["paid"];
mysqli_query($connection, "UPDATE bookings SET paid = '$paid' WHERE booking_id = $_GET[id]");

print_error($connection);

header("Location: ./handleBookings.php", true);
