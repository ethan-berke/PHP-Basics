<?php
session_start();
$id = $_SESSION['user_id'];
require_once('db_connect.php');
$errors = [];
if(isset($_POST['submit'])){
    //if user submits form

    //validation
    if (empty($_POST['itemName'])) {
        $errors[] = 'Please enter the item name.';
    }
    if (empty($_POST['priceName'])) {
        $errors[] = 'Please enter the item price.';
    }
    if (empty($_POST['urlName'])) {
        $errors[] = 'Please enter the item URL.';
    }

    if (!count($errors)) {
        $item = mysqli_real_escape_string($connection, trim($_POST['itemName']));
        $price = mysqli_real_escape_string($connection, trim($_POST['priceName']));
        $url = mysqli_real_escape_string($connection, trim($_POST['urlName']));
        $sql = "INSERT INTO items (user_id, name, price, url) VALUES "
            . " ('$id','$item', '$price', '$url')";

        $result = mysqli_query($connection, $sql);
        header('Location: /giftRegistry/items.php');
    }
}


?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Add Item</title>

    </head>

    <body>

        <h1>Add an item to your list</h1>

        <?php if (count($errors)): ?>
        <h2 class="error">Please fix the following problems:</h2>
        <ul class="error">
            <?php foreach ($errors as $error): ?>
            <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
        <?php endif; ?>

        <form method="post">
            <label for="name">Name:</label>
            <input type="text" name="itemName" id="name" value="">
            <br>
            <label for="price">Price:</label>
            <input type="number" name="priceName" id="price" value="">
            <br>
            <label for="url">URL:</label>
            <input type="url" name="urlName" id="url" value="">
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>
        <a href="/giftRegistry/login.php">Log out</a>

    </body>
</html>