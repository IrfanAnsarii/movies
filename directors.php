<?php
require_once 'db.php';
include 'header.php';

// Fetch all directors
$sql = "SELECT director_id, name, birthdate FROM Directors";
$result = $link->query($sql);
$directors = $result->fetch_all(MYSQLI_ASSOC);
?>

<main class="container mt-4">
    <h2>Directors</h2>
    <a href="add_director.php" class="btn btn-secondary mb-3">Add New Director</a>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Birthdate</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($directors as $director): ?>
                <tr>
                    <td><?= htmlspecialchars($director['name'], ENT_QUOTES) ?></td>
                    <td><?= htmlspecialchars($director['birthdate'], ENT_QUOTES) ?></td>
                    <td>
                        <a href="edit_director.php?id=<?= $director['director_id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete_director.php?id=<?= $director['director_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this director?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<?php
include 'footer.php';
?>