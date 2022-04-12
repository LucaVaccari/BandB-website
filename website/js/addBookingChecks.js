const start_date_input = document.getElementById("start_date");
const end_date_input = document.getElementById("end_date");
const room_info_element = document.getElementById("room_info");
const room_info_popup = document.getElementById("room_info_popup");
const room_id_element = document.getElementById("room_id");
const room_bookings_element = document.getElementById("room_bookings");

// SET DATE LIMITS
let today = new Date();
let date =
  today.getFullYear() +
  "-" +
  String(today.getMonth() + 1).padStart(2, "0") +
  "-" +
  String(today.getDate()).padStart(2, "0");
start_date_input.setAttribute("min", date);
end_date_input.setAttribute("min", date);
document.getElementById("birth_date").setAttribute("max", date);
start_date_input.addEventListener("change", (event) => {
  end_date_input.setAttribute("min", event.target.value);
});
end_date_input.addEventListener("change", (event) => {
  start_date_input.setAttribute("max", event.target.value);
});

// ROOM INFO
room_info_element.addEventListener("mouseenter", (_event) => {
  room_info_popup.style.display = "inline";
});
room_info_element.addEventListener("mouseleave", (_event) => {
  room_info_popup.style.display = "none";
});

if (Object.keys(rooms).length > 0) {
  room_info_popup.innerHTML = `Capacity: ${
    rooms[Object.keys(rooms)[0]].capacity
  }, Cost per night: ${rooms[Object.keys(rooms)[0]].cost_per_night}`;
  room_id_element.addEventListener("change", (event) => {
    let room = rooms[event.target.value];
    room_info_popup.innerHTML = `Capacity: ${room.capacity}, Cost per night: ${room.cost_per_night}`;
  });
}

function checkRoomAvailability() {
  let roomId = room_id_element.value;
  let roomBookings = bookings.filter((b) => b.roomId == roomId);

  room_bookings_element.innerHTML =
    roomBookings.length > 0
      ? "Questi periodi non sono disponibili: <br/>"
      : "Stanza sempre disponibile";

  let startDateAvailable = true;
  let endDateAvailable = true;
  for (let booking of roomBookings) {
    let bookingStartDate = new Date(booking.startDate);
    let bookingEndDate = new Date(booking.endDate);
    let inputStartDate = new Date(start_date_input.value);
    let inputEndDate = new Date(end_date_input.value);

    room_bookings_element.innerHTML += `${bookingStartDate.toLocaleDateString(
      "it-IT"
    )} - ${bookingEndDate.toLocaleDateString("it-IT")} <br/>`;

    if (
      inputStartDate.getTime() >= bookingStartDate.getTime() &&
      inputStartDate.getTime() <= bookingEndDate.getTime()
    ) {
      startDateAvailable = false;
    }
    if (
      inputEndDate.getTime() >= bookingStartDate.getTime() &&
      inputEndDate.getTime() <= bookingEndDate.getTime()
    ) {
      endDateAvailable = false;
    }
    if (
      inputStartDate.getTime() <= bookingStartDate.getTime() &&
      inputEndDate.getTime() >= bookingEndDate.getTime()
    ) {
      startDateAvailable = endDateAvailable = false;
    }
  }
  let available = startDateAvailable && endDateAvailable;
  document.getElementById("submit_button").disabled = !available;
  document.getElementById("start_date_info").innerHTML = startDateAvailable
    ? ""
    : "Data non disponibile";
  document.getElementById("end_date_info").innerHTML = endDateAvailable
    ? ""
    : "Data non disponibile";
}

room_id_element.addEventListener("change", checkRoomAvailability);
start_date_input.addEventListener("change", checkRoomAvailability);
end_date_input.addEventListener("change", checkRoomAvailability);
checkRoomAvailability();
