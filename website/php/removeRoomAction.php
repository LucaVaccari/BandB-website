<?php
require_once("functions.php");

$connection = connect();
mysqli_query($connection, "DELETE FROM rooms WHERE room_id = $_GET[id]");

if (mysqli_errno($connection)) {
    echo "Cannot remove the room. Perhaps there are bookings referring to it. <br />";
}

?>
<a href="handleRooms.php">Back</a>