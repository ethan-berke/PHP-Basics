<?php

require_once ('db_connect.php');
session_start();
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM items WHERE user_id = $user_id";
$items = mysqli_query($connection, $sql);


?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Items</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <h1>Wishlist </h1>
        <a href="create_item.php">Add Item to list</a>

        <table class="center">
            <thead>
                <th>Name</th>
                <th>Price</th>
                <th>URL</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($items, MYSQLI_ASSOC)) { ?>
                    <tr>
                        <td><?= $row['name']?></td>
                        <td><?= $row['price']?></td>
                        <td><a href="<?= $row['url']?>" target="_blank">Link</a> </td>
                        <td>
                            <a href="update_item.php?item_id=<?=$row['id']?>">Edit</a>
                        </td>
                        <td>
                            <a href="delete_item.php?item_id=<?=$row['id']?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <a href="/giftRegistry/login.php">Log out</a>

    </body>
</html>
