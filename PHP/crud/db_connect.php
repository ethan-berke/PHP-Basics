<?php
//define database constants
define ('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'student');
define('DB_PASSWORD', 'student');
define('DB_NAME', 'crud');

$connection = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);