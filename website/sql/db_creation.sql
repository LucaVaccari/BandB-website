DROP DATABASE IF EXISTS bandb_5ci;
CREATE DATABASE bandb_5ci;
CREATE TABLE users(
    user_fc VARCHAR(15) NOT NULL PRIMARY KEY,
    first_name VARCHAR(15) NOT NULL,
    last_name VARCHAR(15) NOT NULL,
    birth_date DATE NOT NULL,
    address VARCHAR(20)
);
CREATE TABLE rooms(
    room_id INT NOT NULL PRIMARY KEY,
    capacity INT NOT NULL,
    nighty_cost DECIMAL(5, 2) NOT NULL,
    name VARCHAR(15)
);
CREATE TABLE bookings(
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    number_of_people INT NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    breakfast_included TINYINT(1),
    user_fc VARCHAR(15) NOT NULL,
    room_id INT NOT NULL,
    FOREIGN KEY(user_fc) REFERENCES users(user_fc),
    FOREIGN KEY(room_id) REFERENCES rooms(room_id)
);