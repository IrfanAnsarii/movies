<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $birthdate = $_POST['birthdate'];

    $sql = "UPDATE Directors SET name = ?, birthdate = ? WHERE director_id = ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("ssi", $name, $birthdate, $id);

    if ($stmt->execute()) {
        header("Location: directors.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $link->close();
}
?>