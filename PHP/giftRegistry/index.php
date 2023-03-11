<?php
    #start the session
    session_start();

    require_once('db_connect.php');

    //is someone logged in already?
    $loggedInUsername = false;
    if (isset($_SESSION['user_id'])) {
        //Match User ID with database
        $userId = mysqli_real_escape_string($connection, $_SESSION['user_id']);

        //SQL QUERY
        $sql = 'SELECT * FROM users WHERE id = $userId';
        $result = mysqli_query($connection, $sql);
        if ($result) {
            $matchedUser = mysqli_fetch_assoc($result);
            $loggedInUsername = $matchedUser['first_name'];
        }
    }

?>


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome to Cyberspace!</title>
</head>

<body>

    <h1>You are now on the information superhighway. </h1>

    <?php if ($loggedInUsername): ?>

        <h2>Welcome, <?= $loggedInUsername ?>!</h2>
    <?php endif; ?>
        <p>
            <a href="login.php">Log In</a><br>
            <a href="register.php">Register</a>
        </p>


</body>
</html>