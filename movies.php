<?php
require_once 'db.php';
include 'header.php';

$search = '';
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $search = "%$search%";
    $sql = "SELECT m.movie_id, m.title, m.release_date, m.duration, g.genre_name, d.name as director_name, m.rating, GROUP_CONCAT(a.name SEPARATOR ', ') as actors
            FROM Movies m
            JOIN Genres g ON m.genre_id = g.genre_id
            JOIN Directors d ON m.director_id = d.director_id
            LEFT JOIN MovieActors ma ON m.movie_id = ma.movie_id
            LEFT JOIN Actors a ON ma.actor_id = a.actor_id
            WHERE m.title LIKE ? OR g.genre_name LIKE ? OR d.name LIKE ? OR a.name LIKE ?
            GROUP BY m.movie_id";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("ssss", $search, $search, $search, $search);
} else {
    $sql = "SELECT m.movie_id, m.title, m.release_date, m.duration, g.genre_name, d.name as director_name, m.rating, GROUP_CONCAT(a.name SEPARATOR ', ') as actors
            FROM Movies m
            JOIN Genres g ON m.genre_id = g.genre_id
            JOIN Directors d ON m.director_id = d.director_id
            LEFT JOIN MovieActors ma ON m.movie_id = ma.movie_id
            LEFT JOIN Actors a ON ma.actor_id = a.actor_id
            GROUP BY m.movie_id";
    $stmt = $link->prepare($sql);
}

$stmt->execute();
$result = $stmt->get_result();
$movies = $result->fetch_all(MYSQLI_ASSOC);
?>

<style>
    body {
        background: linear-gradient(120deg, #c592ee, #000000);
        font-family: 'Roboto', sans-serif;
        color: #333;
    }

    h2 {
        color: #fff;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .btn-primary, .btn-secondary {
        transition: 0.3s ease;
        border: none;
        font-size: 1rem;
        border-radius: 25px;
        padding: 10px 20px;
    }

    .btn-primary {
        background-color: #ff5722;
    }

    .btn-primary:hover {
        background-color: #e64a19;
    }

    .btn-secondary {
        background-color: #03a9f4;
    }

    .btn-secondary:hover {
        background-color: #0288d1;
    }

    .table-container {
        background-color: #fff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .input-group .form-control {
        border-radius: 25px;
    }

    .input-group .btn {
        border-radius: 25px;
    }

    .no-data {
        color: #757575;
        font-size: 1.2rem;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(255, 87, 34, 0.1);
    }

    .add-buttons {
        gap: 20px;
        display: flex;
        justify-content: center;
    }
</style>

<main class="container mt-4">
    <h2 class="text-center mb-4">🎥 Explore Movies</h2>
    <form method="get" action="movies.php" class="mb-4">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Search by title, genre, director, or actor" value="<?= htmlspecialchars($_GET['search'] ?? '', ENT_QUOTES) ?>">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Search</button>
            </div>
        </div>
    </form>
    <div class="add-buttons mb-4">
        <a href="add_movie.php" class="btn btn-primary"><i class="fas fa-film"></i> Add Movie</a>
        <a href="add_genre.php" class="btn btn-secondary"><i class="fas fa-tags"></i> Add Genre</a>
        <a href="add_director.php" class="btn btn-secondary"><i class="fas fa-user-tie"></i> Add Director</a>
    </div>
    <div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Title</th>
                        <th>Release Date</th>
                        <th>Duration</th>
                        <th>Genre</th>
                        <th>Director</th>
                        <th>Rating</th>
                        <th>Actors</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($movies)): ?>
                        <?php foreach ($movies as $movie): ?>
                            <tr>
                                <td><?= htmlspecialchars($movie['title'], ENT_QUOTES) ?></td>
                                <td><?= htmlspecialchars($movie['release_date'], ENT_QUOTES) ?></td>
                                <td><?= htmlspecialchars($movie['duration'], ENT_QUOTES) ?></td>
                                <td><?= htmlspecialchars($movie['genre_name'], ENT_QUOTES) ?></td>
                                <td><?= htmlspecialchars($movie['director_name'], ENT_QUOTES) ?></td>
                                <td><?= htmlspecialchars($movie['rating'], ENT_QUOTES) ?></td>
                                <td><?= htmlspecialchars($movie['actors'], ENT_QUOTES) ?></td>
                                <td>
                                    <a href="edit_movie.php?id=<?= $movie['movie_id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="delete_movie.php?id=<?= $movie['movie_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this movie?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center no-data">
                                <div class="alert alert-warning" role="alert">
                                    No movies found
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php
include 'footer.php';
?>
