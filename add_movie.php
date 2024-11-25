<?php
require_once 'db.php';
include 'header.php';

// Fetch genres, directors, and actors for the dropdowns
$genres = $link->query("SELECT genre_id, genre_name FROM Genres");
$directors = $link->query("SELECT director_id, name FROM Directors");
$actors = $link->query("SELECT actor_id, name FROM Actors");
?>

<main class="container mt-4">
    <h2>Add New Movie</h2>
    <form action="insert_movie.php" method="post">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="release_date">Release Date:</label>
            <input type="date" class="form-control" id="release_date" name="release_date" required>
        </div>
        <div class="form-group">
            <label for="duration">Duration (minutes):</label>
            <input type="number" class="form-control" id="duration" name="duration" required>
        </div>
        <div class="form-group">
            <label for="genre_id">Genre:</label>
            <select class="form-control" id="genre_id" name="genre_id" required>
                <?php while ($row = $genres->fetch_assoc()): ?>
                    <option value="<?= $row['genre_id'] ?>"><?= $row['genre_name'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="director_id">Director:</label>
            <select class="form-control" id="director_id" name="director_id" required>
                <?php while ($row = $directors->fetch_assoc()): ?>
                    <option value="<?= $row['director_id'] ?>"><?= $row['name'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="rating">Rating:</label>
            <input type="number" step="0.1" class="form-control" id="rating" name="rating" required>
        </div>
        <div class="form-group">
            <label for="actors">Actors:</label>
            <select class="form-control" id="actors" name="actors[]" multiple required>
                <?php while ($row = $actors->fetch_assoc()): ?>
                    <option value="<?= $row['actor_id'] ?>"><?= $row['name'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Movie</button>
    </form>
</main>

<?php
include 'footer.php';
?>