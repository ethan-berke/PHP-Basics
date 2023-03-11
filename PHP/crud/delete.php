<?php
require_once ('db_connect.php');

$id = 0;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $id = mysqli_real_escape_string($connection, $id);
    $sql = "SELECT * FROM albums WHERE id = $id";
    $albums = mysqli_query($connection, $sql);
    $album = mysqli_fetch_assoc($albums);
}

if(isset($_POST['submit']) && $id){
    // Form was submitted
    $id = mysqli_real_escape_string($connection, $_POST['albumId']);
    $sql = "DELETE FROM albums WHERE id = $id LIMIT 1";
    $result = mysqli_query($connection, $sql);

    //Go back to index page
    header('Location: /crud/index.php');
    die;
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
        <h1>Delete Album</h1>

        <?php if (!$id): ?>
            <h2 class="error">Please select an album.</h2>
        <?php endif; ?>

        <h2 class="error">You want to delete <?= $album['album_name'] ?>?</h2>

        <form method="post">
            <input type="hidden" name="albumId" value="<?= $id ?>">
            <input type="submit" name="submit" value="Yes I'm sure">
        </form>
    </body>
</html>