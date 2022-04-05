<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport">
    <title>Prenota</title>
</head>

<body>
    <a href="handleRooms.php">Back</a>
    <form action="addRoomAction.php" method="post">
        <label for="room_id">Numero stanza</label>
        <input type="number" name="room_id" id="room_id">
        <br />
        <label for="capacity">Capacità</label>
        <input type="number" name="capacity" id="capacity">
        <br />
        <label for="cost_per_night">Costo per notte</label>
        <input type="number" step="0.01" name="cost_per_night" id="cost_per_night">
        <br />
        <label for="name">Nome stanza</label>
        <input type="text" name="name" id="name">
        <br />
        <button type="submit">Aggiungi!</button>
    </form>
</body>

</html>