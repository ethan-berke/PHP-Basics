
DROP DATABASE IF EXISTS authentication;

    #creating DB

CREATE DATABASE authentication;

    #using DB

USE authentication;

    #creating table

CREATE TABLE users(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    email VARCHAR(512),
    password CHAR(64),
    salt CHAR(10)
);

CREATE TABLE items(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    name VARCHAR(50),
    price DECIMAL (10, 2),
    url VARCHAR(3000),
    foreign key (user_id) references users(id)
);