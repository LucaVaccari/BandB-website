// SET DATE LIMITS
let today = new Date();
let date =
  today.getFullYear() +
  "-" +
  String(today.getMonth() + 1).padStart(2, "0") +
  "-" +
  String(today.getDate()).padStart(2, "0");
document.getElementById("start_date").setAttribute("min", date);
document.getElementById("end_date").setAttribute("min", date);
document.getElementById("birth_date").setAttribute("max", date);
document.getElementById("start_date").addEventListener("change", (event) => {
  document.getElementById("end_date").setAttribute("min", event.target.value);
});
document.getElementById("end_date").addEventListener("change", (event) => {
  document.getElementById("start_date").setAttribute("max", event.target.value);
});

// ROOM INFO
document
  .getElementById("room_info")
  .addEventListener("mouseenter", (_event) => {
    document.getElementById("room_info_popup").style.display = "inline";
  });
document
  .getElementById("room_info")
  .addEventListener("mouseleave", (_event) => {
    document.getElementById("room_info_popup").style.display = "none";
  });

if (Object.keys(rooms).length > 0) {
  document.getElementById("room_info_popup").innerHTML = `Capacity: ${
    rooms[Object.keys(rooms)[0]].capacity
  }, Cost per night: ${rooms[Object.keys(rooms)[0]].cost_per_night}`;
  document.getElementById("room_id").addEventListener("change", (event) => {
    let room = rooms[event.target.value];
    document.getElementById(
      "room_info_popup"
    ).innerHTML = `Capacity: ${room.capacity}, Cost per night: ${room.cost_per_night}`;
  });
}

function checkRoomAvailability() {
  let room_id = document.getElementById("room_id").value;
  let roomBookings = bookings.filter((b) => (b.room_id = room_id));
  // TODO: check room availability
}
document
  .getElementById("room_id")
  .addEventListener("change", checkRoomAvailability);
document
  .getElementById("start_date")
  .addEventListener("change", checkRoomAvailability);
document
  .getElementById("end_date")
  .addEventListener("change", checkRoomAvailability);
checkRoomAvailability();
