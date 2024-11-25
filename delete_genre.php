<?php
require_once 'db.php';

$id = $_GET['id'];

// Start a transaction
$link->begin_transaction();

try {
    // Delete related movies
    $sql = "DELETE FROM Movies WHERE genre_id = ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    // Delete the genre
    $sql = "DELETE FROM Genres WHERE genre_id = ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    // Commit the transaction
    $link->commit();

    header("Location: genres.php");
    exit;
} catch (mysqli_sql_exception $exception) {
    // Rollback the transaction in case of error
    $link->rollback();

    echo "Error: " . $exception->getMessage();
}

$link->close();
?>