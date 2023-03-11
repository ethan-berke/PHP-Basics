<?php
session_start();
$id = $_SESSION['user_id'];
require_once('db_connect.php');
$errors = [];
$item_id = $_GET['item_id'];
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
        $sql = "UPDATE items SET name = '$item', price = '$price', url = '$url' WHERE id = '$item_id'";

        $result = mysqli_query($connection, $sql);
        header('Location: /giftRegistry/items.php');
    }
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Item </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<h1> </h1>
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