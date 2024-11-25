<?php
require_once 'db.php';
include 'header.php';

$id = $_GET['id'];
$sql = "SELECT * FROM Directors WHERE director_id = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$director = $result->fetch_assoc();
?>

<main class="container mt-4">
    <h2>Edit Director</h2>
    <form action="update_director.php" method="post">
        <input type="hidden" name="id" value="<?= $director['director_id'] ?>">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($director['name'], ENT_QUOTES) ?>" required>
        </div>
        <div class="form-group">
            <label for="birthdate">Birthdate:</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?= htmlspecialchars($director['birthdate'], ENT_QUOTES) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Director</button>
    </form>
</main>

<?php
include 'footer.php';
?>