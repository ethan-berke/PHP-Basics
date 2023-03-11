<?php
//define database constants
const DB_HOSTNAME = 'localhost';
const DB_USERNAME = 'student';
const DB_PASSWORD = 'student';
const DB_NAME = 'authentication';

$connection = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);