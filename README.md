# BandB-website

Admin perspective:
 - handle all db tables

Client perspective:
 - register and login
 - see available rooms for a specific period
 - book a room for a certain period
 - cancel a booking

Tables:
User(user_fc, first_name, last_name, birth_date, address)
Room(room_id, capacity, cost_per_night, name)
Booking(booking_id, room_id, user_fc, number_of_people, start_date, end_date, breakfast_included)

TODO:
 - autocomplete personal data when booking

Ideas:
 - Localization
 - B&B closure
 - different costs based on the age