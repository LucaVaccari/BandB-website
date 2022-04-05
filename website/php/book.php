<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport">
    <title>Prenota</title>
</head>

<body>
    <a href="../index.php">Back</a>
    <form action="dbBook.php" method="post">
        <!-- Room selection -->
        <h4>Selezione stanza</h4>
        <select name="room_id" id="room_id">
            <?php
            require_once "functions.php";
            $rooms = mysqli_query(connect(), "SELECT * FROM rooms");
            if (mysqli_num_rows($rooms) > 0) {
                while ($room = mysqli_fetch_array($rooms)) {
                    echo "<option value='$room[room_id]'>$room[room_id] - $room[name]</option>";
                }
            }
            ?>
        </select>
        <!-- TODO: room info button/popup -->
        <!-- User info -->
        <h4>Informazioni utente</h4>
        <label for="user_fc">Codice fiscale</label>
        <input type="text" name="user_fc" id="user_fc" maxlength="16" size="16">
        <!-- TODO: search button for autocompleting -->
        <br />
        <label for="first_name">Nome</label>
        <input type="text" name="first_name" id="first_name" maxlength="15" size="15">
        <br />
        <label for="last_name">Cognome</label>
        <input type="text" name="last_name" id="last_name" maxlength="15" size="15">
        <br />
        <label for="birth_date">Data di nascita</label>
        <input type="date" name="birth_date" id="birth_date">
        <br />
        <label for="address">Indirizzo</label>
        <input type="text" name="address" id="address" maxlength="20" size="20">
        <!-- Booking info -->
        <h4>Dettagli prenotazione</h4>
        <label for="number_of_people">Numero di persone: </label>
        <!-- TODO: set max number of people to the capacity of the selected room -->
        <input type="number" name="number_of_people" id="number_of_people">
        <br />
        <label for="start_date">Data di inizio alloggio</label>
        <!-- TODO: set min date to today -->
        <input type="date" name="start_date" id="start_date">
        <br />
        <label for="end_date">Data di fine alloggio</label>
        <input type="date" name="end_date" id="end_date">
        <br />
        <label for="breakfast_included">Includi colazione</label>
        <input type="checkbox" name="breakfast_included" id="breakfast_included">

        <h4>Costo</h4>
        <!-- TODO: calculate cost -->

        <button type="submit">PRENOTA!</button>
    </form>
</body>

</html>