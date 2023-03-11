# Remove any previously-created database.
DROP DATABASE IF EXISTS crud;

# Create the new database.
CREATE DATABASE crud;

# Use the newly created database.
USE crud;

# TODO: Create the albums table, containing and id, artist_name, album_title, created_date.
CREATE TABLE albums(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(50),
    album_name VARCHAR(50),
    created_date DATE DEFAULT NOW()
);