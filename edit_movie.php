<?php
require_once 'db.php';
include 'header.php';

$id = $_GET['id'];
$sql = "SELECT * FROM Movies WHERE movie_id = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$movie = $result->fetch_assoc();

$genres = $link->query("SELECT genre_id, genre_name FROM Genres");
$directors = $link->query("SELECT director_id, name FROM Directors");
$actors = $link->query("SELECT actor_id, name FROM Actors");

// Fetch the actors associated with the movie
$movie_actors = $link->query("SELECT actor_id FROM MovieActors WHERE movie_id = $id");
$selected_actors = [];
while ($row = $movie_actors->fetch_assoc()) {
    $selected_actors[] = $row['actor_id'];
}
?>

<main class="container mt-4">
    <h2>Edit Movie</h2>
    <form action="update_movie.php" method="post">
        <input type="hidden" name="id" value="<?= $movie['movie_id'] ?>">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($movie['title'], ENT_QUOTES) ?>" required>
        </div>
        <div class="form-group">
            <label for="release_date">Release Date:</label>
            <input type="date" class="form-control" id="release_date" name="release_date" value="<?= htmlspecialchars($movie['release_date'], ENT_QUOTES) ?>" required>
        </div>
        <div class="form-group">
            <label for="duration">Duration (minutes):</label>
            <input type="number" class="form-control" id="duration" name="duration" value="<?= htmlspecialchars($movie['duration'], ENT_QUOTES) ?>" required>
        </div>
        <div class="form-group">
            <label for="genre_id">Genre:</label>
            <select class="form-control" id="genre_id" name="genre_id" required>
                <?php while ($row = $genres->fetch_assoc()): ?>
                    <option value="<?= $row['genre_id'] ?>" <?= $row['genre_id'] == $movie['genre_id'] ? 'selected' : '' ?>><?= $row['genre_name'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="director_id">Director:</label>
            <select class="form-control" id="director_id" name="director_id" required>
                <?php while ($row = $directors->fetch_assoc()): ?>
                    <option value="<?= $row['director_id'] ?>" <?= $row['director_id'] == $movie['director_id'] ? 'selected' : '' ?>><?= $row['name'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="rating">Rating:</label>
            <input type="number" step="0.1" class="form-control" id="rating" name="rating" value="<?= htmlspecialchars($movie['rating'], ENT_QUOTES) ?>" required>
        </div>
        <div class="form-group">
            <label for="actors">Actors:</label>
            <select class="form-control" id="actors" name="actors[]" multiple required>
                <?php while ($row = $actors->fetch_assoc()): ?>
                    <option value="<?= $row['actor_id'] ?>" <?= in_array($row['actor_id'], $selected_actors) ? 'selected' : '' ?>><?= $row['name'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Movie</button>
    </form>
</main>

<?php
include 'footer.php';
?>