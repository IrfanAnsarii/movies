<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $birthdate = $_POST['birthdate'];

    $sql = "INSERT INTO Directors (name, birthdate) VALUES (?, ?)";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("ss", $name, $birthdate);

    if ($stmt->execute()) {
        echo "<div style='text-align: center; margin-top: 20px;'>
                <span style='font-size: 50px; color: green;'>&#10004;</span>
                <p>New director added successfully</p>
              </div>";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'directors.php';
                }, 2000);
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $link->close();
}
?>