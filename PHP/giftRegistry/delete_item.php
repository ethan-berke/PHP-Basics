<?php
session_start();
$id = $_SESSION['user_id'];
require_once('db_connect.php');
$item_id = $_GET['item_id'];
if(isset($_POST['submit'])){
    //form was submitted.
    $sql = "DELETE FROM items WHERE id = '$item_id' LIMIT 1";
    $result = mysqli_query($connection, $sql);

    header('Location: /giftRegistry/items.php');
    die;
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Delete Item</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<h1>Delete Item</h1>


<form method="post">
    <input type="submit" name="submit" value="Yes I'm sure">
    <a href="/giftRegistry/login.php">Log out</a>
</form>
</body>
</html>