<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport">
    <title>Gestisci le prenotazioni</title>
</head>

<body>
    <a href="../index.php">Back</a>
    <table border>
        <tr>
            <th>Id stanza</th>
            <th>Capacità</th>
            <th>Costo per notte</th>
            <th>Nome stanza</th>
        </tr>
        <?php
        require_once("functions.php");
        $connection = connect();
        $rooms = mysqli_query($connection, "SELECT * FROM rooms");
        if (!$rooms || mysqli_num_rows($rooms) == 0) {
            echo "</table>";
            echo "EMPTY";
        } else {
            while ($room = mysqli_fetch_array($rooms)) {
                echo "<tr>";
                echo "<td>$room[room_id]</td>";
                echo "<td>$room[capacity]</td>";
                echo "<td>$room[nighty_cost]</td>";
                echo "<td>$room[name]</td>";
                echo "<td><a href='removeRoomAction.php?id=$room[room_id]'>Cancella</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>

        <a href="addRoomAction.php">Aggiungi stanza</a>
</body>

</html>