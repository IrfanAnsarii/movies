<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $release_date = $_POST['release_date'];
    $duration = $_POST['duration'];
    $genre_id = $_POST['genre_id'];
    $director_id = $_POST['director_id'];
    $rating = $_POST['rating'];
    $actors = $_POST['actors'];

    // Start a transaction
    $link->begin_transaction();

    try {
        // Update the movie record
        $sql = "UPDATE Movies SET title = ?, release_date = ?, duration = ?, genre_id = ?, director_id = ?, rating = ? WHERE movie_id = ?";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("ssiiiii", $title, $release_date, $duration, $genre_id, $director_id, $rating, $id);
        $stmt->execute();
        $stmt->close();

        // Delete existing actors for the movie
        $sql = "DELETE FROM MovieActors WHERE movie_id = ?";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

        // Insert the new actors for the movie
        $sql = "INSERT INTO MovieActors (movie_id, actor_id) VALUES (?, ?)";
        $stmt = $link->prepare($sql);
        foreach ($actors as $actor_id) {
            $stmt->bind_param("ii", $id, $actor_id);
            $stmt->execute();
        }
        $stmt->close();

        // Commit the transaction
        $link->commit();

        header("Location: index.php");
    } catch (mysqli_sql_exception $exception) {
        // Rollback the transaction in case of error
        $link->rollback();

        echo "Error: " . $exception->getMessage();
    }

    $link->close();
}
?>