<?php
    //new session
    session_start();

    //automatically log users out when they access login page, require authenticated users
    session_destroy();

    require_once('db_connect.php');

    //create login error variable
    $loginError = false;

    if (isset($_POST['submit'])) {
        //assume there is an error logging in
        $loginError = true;

        //user submitted the form, check for valid input
        $email = mysqli_real_escape_string($connection, $_POST['email']);

        //locate the user with this email address in the database
        $sql = "SELECT id, password, salt FROM users WHERE email = '$email'";
        $result = mysqli_query($connection, $sql);
        $matchedUser = mysqli_fetch_assoc($result);

        // Hash the Password
        $hashedPassword = hash('sha256', ($_POST['password'] . $matchedUser['salt']));

        //Make sure it matches db password
        if ($hashedPassword == $matchedUser['password']) {
            //passwords match
            session_start();
            $_SESSION['user_id'] = $matchedUser['id'];

            //redirect to home page
            header('Location: /authentication/index.php');
            die;
        } else {
            $loginError = true;
        }
    }
 ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Log In</title>

    </head>

    <body>
        <h1>Welcome. Please Log In. </h1>

        <?php if ($loginError): ?>
            <h2 style="color:red;">Invalid Email address or password. </h2>
        <?php endif; ?>

        <form method="post">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" value="">
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="" autocomplete="off">
            <br>
            <input type="submit" name="submit" value="Submit">
            <br>
            <a href="register.php">Register</a>
        </form>
    </body>

</html>



