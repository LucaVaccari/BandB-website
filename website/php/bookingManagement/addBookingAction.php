<?php

require_once("../functions.php");

$connection = connect();

// USER CHECK
$result = mysqli_query($connection, "SELECT * FROM `users` WHERE `user_fc` = '$_POST[user_fc]'");
if ($result && mysqli_num_rows($result) > 0) {
    // update user info
    mysqli_query(
        $connection,
        "UPDATE `users` SET `first_name` = '$_POST[first_name]', `last_name` = '$_POST[last_name]', 
            `birth_date` = '$_POST[birth_date]', `address` = '$_POST[address]' WHERE `user_fc` = '$_POST[user_fc]'"
    );
} else {
    // register user
    mysqli_query($connection, "INSERT INTO `users`(`user_fc`, `first_name`, `last_name`, `birth_date`, `address`) 
        VALUES ('$_POST[user_fc]', '$_POST[first_name]', '$_POST[last_name]', '$_POST[birth_date]', '$_POST[address]')");
}

print_error($connection);

// REGISTER BOOKING
mysqli_query($connection, "INSERT INTO `bookings`(`number_of_people`, `start_date`, `end_date`, `breakfast_included`, `user_fc`, `room_id`, `paid`) 
    VALUES ('$_POST[number_of_people]','$_POST[start_date]','$_POST[end_date]','$_POST[breakfast_included]','$_POST[user_fc]','$_POST[room_id]', '0')");

print_error($connection);

header("Location: ../../index.php", true);
