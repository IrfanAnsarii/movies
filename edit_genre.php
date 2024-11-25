<?php
require_once 'db.php';
include 'header.php';

$id = $_GET['id'];
$sql = "SELECT * FROM Genres WHERE genre_id = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$genre = $result->fetch_assoc();
?>

<main class="container mt-4">
    <h2>Edit Genre</h2>
    <form action="update_genre.php" method="post">
        <input type="hidden" name="id" value="<?= $genre['genre_id'] ?>">
        <div class="form-group">
            <label for="genre_name">Genre Name:</label>
            <input type="text" class="form-control" id="genre_name" name="genre_name" value="<?= htmlspecialchars($genre['genre_name'], ENT_QUOTES) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Genre</button>
    </form>
</main>

<?php
include 'footer.php';
?>