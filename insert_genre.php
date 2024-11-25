<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $genre_name = $_POST['genre_name'];

    $sql = "INSERT INTO Genres (genre_name) VALUES (?)";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("s", $genre_name);

    if ($stmt->execute()) {
        echo "<div style='text-align: center; margin-top: 20px;'>
                <span style='font-size: 50px; color: green;'>&#10004;</span>
                <p>New genre added successfully</p>
              </div>";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'index.php';
                }, 2000);
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $link->close();
}
?>