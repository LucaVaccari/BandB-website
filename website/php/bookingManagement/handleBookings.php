<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport">
    <title>Gestisci le prenotazioni</title>
</head>

<body>
    <a href="../../index.php">Back</a>
    <table border>
        <tr>
            <th>Id prenotazione</th>
            <th>Numero di persone</th>
            <th>Inizio alloggio</th>
            <th>Fine alloggio</th>
            <th>Colazione inclusa</th>
            <th>Codice fiscale utente</th>
            <th>Stanza</th>
        </tr>
        <?php
        require_once("../functions.php");
        $connection = connect();
        $bookings = mysqli_query($connection, "SELECT * FROM bookings JOIN rooms USING(room_id)");
        if (!$bookings || mysqli_num_rows($bookings) == 0) {
            echo "</table>";
            echo "EMPTY";
        } else {
            while ($booking = mysqli_fetch_array($bookings)) {
                echo "<tr>";
                echo "<td>$booking[booking_id]</td>";
                echo "<td>$booking[number_of_people]</td>";
                echo "<td>$booking[start_date]</td>";
                echo "<td>$booking[end_date]</td>";
                echo "<td>$booking[breakfast_included]</td>";
                echo "<td>$booking[user_fc]</td>";
                echo "<td>$booking[name]</td>";
                if ($booking['paid']) {
                    echo "<td><a href='payBookingAction.php?id=$booking[booking_id]&paid=$booking[paid]'>Annulla pagamento</a></td>";
                } else {
                    echo "<td><a href='payBookingAction.php?id=$booking[booking_id]&paid=$booking[paid]'>Effettua pagamento</a></td>";
                }
                echo "<td><a href='removeBookingAction.php?id=$booking[booking_id]'>Cancella</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>
</body>

</html>