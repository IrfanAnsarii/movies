<?php
require_once 'db.php';

$id = $_GET['id'];

// Start a transaction
$link->begin_transaction();

try {
    // Delete related records in the movieactors table
    $sql = "DELETE FROM movieactors WHERE movie_id = ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    // Delete the movie record
    $sql = "DELETE FROM Movies WHERE movie_id = ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
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
?>