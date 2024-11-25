<?php
require_once 'db.php';

// Handle form submission to add a new genre
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $genre_name = $_POST['genre_name'];

    $sql = "INSERT INTO Genres (genre_name) VALUES (?)";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("s", $genre_name);

    if ($stmt->execute()) {
        header("Location: genres.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch all genres
$sql = "SELECT * FROM Genres";
$result = $link->query($sql);
$genres = $result->fetch_all(MYSQLI_ASSOC);

include 'header.php';
?>


    
    <main class="container mt-4">
        <h2 class="text-center mb-4">Add New Genre</h2>
        <form action="genres.php" method="post">
            <div class="form-group">
                <label for="genre_name">Genre Name:</label>
                <input type="text" class="form-control" id="genre_name" name="genre_name" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Genre</button>
        </form>

        <h2 class="text-center mt-5 mb-4">Genres List</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Genre Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($genres as $genre): ?>
                        <tr>
                            <td><?= htmlspecialchars($genre['genre_name'], ENT_QUOTES) ?></td>
                            <td>
                                <a href="edit_genre.php?id=<?= $genre['genre_id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete_genre.php?id=<?= $genre['genre_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this genre?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer class="bg-dark text-white text-center p-3 mt-4">
        <div class="container">
            <p>&copy; 2023 Movie Database. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>