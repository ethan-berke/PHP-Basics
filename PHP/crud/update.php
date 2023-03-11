<?php
require_once ('db_connect.php');

$id = 0;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
}

$errors = [];
if(isset($_POST['submit'])){
    //if user submits form

    // Validation
    if (empty($_POST['artistName'])) {
        $errors[] = 'Please enter the artist name.';
    }
    if (empty($_POST['albumName'])) {
        $errors[] = 'Please enter the album name.';
    }

    if (!count($errors)) {
        $artist = mysqli_real_escape_string($connection, trim($_POST['artistName']));
        $album = mysqli_real_escape_string($connection, trim($_POST['albumName']));


        if ($id == 0) {
            $sql = "INSERT INTO albums (artist_name, album_name) VALUES ('$artist', '$album')";
        } else {
            $album = mysqli_real_escape_string($connection, $id);
            $sql =  "UPDATE albums SET artist_name = '$artist', album_name = '$album' WHERE id = $id";
        }




        $result = mysqli_query($connection, $sql);

        //Go back to index page
        header('Location: /crud/index.php');
        die;
    }
}
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

        <?php if (count($errors)): ?>
            <h2 class="error">Please fix the following problems</h2>
            <ul class="error">
                <?php foreach ($errors as $error): ?>
                <li><?= $error ?></li>
                <?php endforeach ?>
            </ul>
        <?php endif; ?>

        <form method="post">
            <label for="artist">Artist Name</label>
            <input type="text" name="artistName" id="artist" value="">
            <br>

            <label for="album">Album Name</label>
            <input type="text" name="albumName" id="album" value="">
            <br>

            <input type="submit" name="submit" value="Submit">
        </form>
    </body>
</html>