<?php

function connect()
{
    $address = "localhost";
    $username = "root";
    $password = "";
    $db_name = "bandb_5ci";
    $connection = mysqli_connect($address, $username, $password, $db_name);

    if (mysqli_connect_errno()) {
        throw new Exception("Connection error", 1);
    }

    return $connection;
}

function print_error($connection)
{
    if (mysqli_errno($connection)) {
        echo mysqli_error($connection);
        echo '<br />';
    }
}
