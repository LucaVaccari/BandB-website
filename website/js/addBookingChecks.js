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

document.getElementById("room_info").addEventListener("mouseenter", (event) => {
  document.getElementById("room_info_popup").style.display = "inline";
});
document.getElementById("room_info").addEventListener("mouseleave", (event) => {
  document.getElementById("room_info_popup").style.display = "none";
});

// ROOM INFO
document.getElementById("room_info_popup").innerHTML = `Capacity: ${
  rooms[Object.keys(rooms)[0]].capacity
}, Cost per night: ${rooms[Object.keys(rooms)[0]].cost_per_night}`;
document.getElementById("room_id").addEventListener("change", (event) => {
  let room = rooms[event.target.value];
  document.getElementById(
    "room_info_popup"
  ).innerHTML = `Capacity: ${room.capacity}, Cost per night: ${room.cost_per_night}`;
});

// TODO: check room availability
