<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $genre_name = $_POST['genre_name'];

    $sql = "UPDATE Genres SET genre_name = ? WHERE genre_id = ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("si", $genre_name, $id);

    if ($stmt->execute()) {
        header("Location: genres.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $link->close();
}
?>