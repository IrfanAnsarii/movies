<?php
require_once 'db.php';

// Handle form submission to add a new actor
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $birthdate = $_POST['birthdate'];

    $sql = "INSERT INTO Actors (name, birthdate) VALUES (?, ?)";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("ss", $name, $birthdate);

    if ($stmt->execute()) {
        header("Location: actors.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch all actors
$sql = "SELECT * FROM Actors";
$result = $link->query($sql);
$actors = $result->fetch_all(MYSQLI_ASSOC);

include 'header.php';
?>



    <main class="container mt-4">
        <h2 class="text-center mb-4">Add New Actor</h2>
        <form action="actors.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="birthdate">Birthdate:</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Actor</button>
        </form>

        <h2 class="text-center mt-5 mb-4">Actors List</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Birthdate</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($actors as $actor): ?>
                        <tr>
                            <td><?= htmlspecialchars($actor['name'], ENT_QUOTES) ?></td>
                            <td><?= htmlspecialchars($actor['birthdate'], ENT_QUOTES) ?></td>
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