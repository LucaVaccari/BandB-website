<?php
require_once("../functions.php");

$connection = connect();
mysqli_query($connection, "DELETE FROM bookings WHERE booking_id = $_GET[id]");

print_error($connection);

header("Location: ./handleBookings.php", true);
