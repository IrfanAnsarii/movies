<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        // Insert the movie record
        $sql = "INSERT INTO Movies (title, release_date, duration, genre_id, director_id, rating) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("ssiiii", $title, $release_date, $duration, $genre_id, $director_id, $rating);
        $stmt->execute();
        $movie_id = $stmt->insert_id;
        $stmt->close();

        // Insert the actors for the movie
        $sql = "INSERT INTO MovieActors (movie_id, actor_id) VALUES (?, ?)";
        $stmt = $link->prepare($sql);
        foreach ($actors as $actor_id) {
            $stmt->bind_param("ii", $movie_id, $actor_id);
            $stmt->execute();
        }
        $stmt->close();

        // Commit the transaction
        $link->commit();

        header("Location: movies.php");
    } catch (mysqli_sql_exception $exception) {
        // Rollback the transaction in case of error
        $link->rollback();

        echo "Error: " . $exception->getMessage();
    }

    $link->close();
}
?>