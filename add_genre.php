<?php
require_once 'db.php';
include 'header.php';
?>

<main class="container mt-4">
    <h2>Add New Genre</h2>
    <form action="insert_genre.php" method="post">
        <div class="form-group">
            <label for="genre_name">Genre Name:</label>
            <input type="text" class="form-control" id="genre_name" name="genre_name" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Genre</button>
    </form>
</main>

<?php
include 'footer.php';
?>