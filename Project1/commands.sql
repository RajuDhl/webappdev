#Create Database
CREATE DATABASE IF NOT EXISTS cabsOnline;

USE cabsOnline;

# Query used to create USER table to store user info
CREATE TABLE user (email VARCHAR(255) PRIMARY KEY, name VARCHAR(30) NOT NULL, password VARCHAR(64) NOT NULL, phone_number BIGINT NOT NULL);

# Query used to create admin table to check if the user is admin
CREATE TABLE admin (email VARCHAR(255), admin BOOLEAN, FOREIGN KEY (email) REFERENCES user(email));

#Query to create Booking table
CREATE TABLE booking (
        id INT AUTO_INCREMENT PRIMARY KEY,
        booking_reference VARCHAR(32),
        name VARCHAR(64),
        phone VARCHAR(20),
        email VARCHAR(255),
        unit INT,
        street_number INT,
        street_name VARCHAR(255),
        suburb VARCHAR(64),
        destination VARCHAR(255),
        pickup_time DATETIME,
        is_assigned BOOLEAN DEFAULT false,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (email) REFERENCES user(email)
);
