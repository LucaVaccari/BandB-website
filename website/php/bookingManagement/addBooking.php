<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport">
    <title>Prenota</title>
</head>

<body>
    <a href="../../index.php">Back</a>
    <form action="addBookingAction.php" method="post">
        <!-- Room selection -->
        <h4>Selezione stanza</h4>
        <select name="room_id" id="room_id">
            <?php
            require_once "../functions.php";
            $rooms = mysqli_query(connect(), "SELECT * FROM rooms ORDER BY room_id");
            echo "<script>let rooms = [];</script>";
            if (mysqli_num_rows($rooms) > 0) {
                while ($room = mysqli_fetch_array($rooms)) {
                    echo "<option value='$room[room_id]'>$room[room_id] - $room[name]</option>";
                    echo "<script>rooms[$room[room_id]] = {capacity: '$room[capacity]', cost_per_night: '$room[cost_per_night]'}</script>";
                }
            }
            ?>
        </select>
        <img id="room_info" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e4/Infobox_info_icon.svg/1200px-Infobox_info_icon.svg.png" alt="Info" width="30em" style="vertical-align:middle">
        <span id="room_info_popup" style="display: none">No info</span>
        <br />
        <span id="room_bookings">Room always available</span>
        <!-- User info -->
        <h4>Informazioni utente</h4>
        <label for="user_fc">Codice fiscale</label>
        <input type="text" name="user_fc" id="user_fc" maxlength="16" size="16">
        <!-- TODO: search button for autocompleting -->
        <button id="autocomplete_user" type="button">Autocomplete</button>
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
        <input type="date" name="start_date" id="start_date">
        <span id="start_date_info"></span>
        <br />
        <label for="end_date">Data di fine alloggio</label>
        <input type="date" name="end_date" id="end_date">
        <span id="end_date_info"></span>
        <br />
        <label for="breakfast_included">Includi colazione</label>
        <input type="checkbox" name="breakfast_included" id="breakfast_included">

        <h4>Costo</h4>
        <!-- TODO: calculate cost -->

        <button id="submit_button" type="submit">PRENOTA!</button>
    </form>

    <?php
    require_once("../functions.php");
    $connection = connect();
    $bookings = mysqli_query($connection, "SELECT * FROM bookings ORDER BY booking_id");
    echo "<script>let bookings = [];</script>";
    if (mysqli_num_rows($bookings) > 0) {
        while ($booking = mysqli_fetch_array($bookings)) {
            echo "<script>
                bookings[$booking[booking_id]] = {
                    numberOfPeople: '$booking[number_of_people]', 
                    startDate: '$booking[start_date]',
                    endDate: '$booking[end_date]',
                    roomId: '$booking[room_id]'
                }
            </script>";
        }
    }

    $users = mysqli_query($connection, "SELECT * FROM users ORDER BY user_fc");
    echo "<script>let users = [];</script>";
    if (mysqli_num_rows($users) > 0) {
        while ($user = mysqli_fetch_array($users)) {
            echo "<script>
                users['$user[user_fc]'] = {
                    firstName: '$user[first_name]',
                    lastName: '$user[last_name]',
                    birthDate: '$user[birth_date]',
                    address: '$user[address]'
                };
            </script>";
        }
    }
    ?>

    <script src="../../js/addBookingChecks.js"></script>
</body>

</html>