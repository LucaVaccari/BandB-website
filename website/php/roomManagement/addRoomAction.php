<?php

require_once("functions.php");

$connection = connect();

mysqli_query($connection, "INSERT INTO `rooms`(`room_id`, `capacity`, `cost_per_night`, `name`)
    VALUES ('$_POST[room_id]', '$_POST[capacity]', '$_POST[cost_per_night]', '$_POST[name]')");

print_error($connection);

header("Location: ./handleRooms.php", true);
