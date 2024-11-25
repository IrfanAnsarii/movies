<?php
require_once 'db.php';
include 'header.php';
?>

<main class="container mt-4">
    <h2>Add New Director</h2>
    <form action="insert_director.php" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="birthdate">Birthdate:</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Director</button>
    </form>
</main>

<?php
include 'footer.php';
?>