<?php
require_once ('db_connect.php');

$sql = "SELECT * FROM albums";
$albums = mysqli_query($connection, $sql);

//debugging code
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Album Listing</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

        <h1>Album Listing</h1>

        <p>Total: <?= $albums->num_rows ?> albums</p>
        <p>
            <a href="/crud/update.php">Add New Album</a>
        </p>

        <table>
            <thead>
                <tr>
                    <th>Artist Name</th>
                    <th>Album Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($albums, MYSQLI_ASSOC)) { ?>
                    <tr>
                        <td><?= $row['artist_name']?></td>
                        <td><?= $row['album_name']?></td>
                        <td>
                            <a href="/crud/update.php?id=<?= $row['id'] ?>">Edit</a>
                        </td>
                        <td>
                            <a href="/crud/delete.php?id=<?= $row['id'] ?> ">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
    </html>