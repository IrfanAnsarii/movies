<?php
require_once 'db.php';
include 'header.php';

// Fetch the 3 most recently added movies
$sql_recent = "SELECT m.title, m.release_date, m.duration, g.genre_name, d.name as director_name, m.rating
        FROM Movies m
        JOIN Genres g ON m.genre_id = g.genre_id
        JOIN Directors d ON m.director_id = d.director_id
        ORDER BY m.release_date DESC
        LIMIT 3";
$result_recent = $link->query($sql_recent);
$recent_movies = $result_recent->fetch_all(MYSQLI_ASSOC);

// Fetch the top 3 rated movies
$sql_top_rated = "SELECT m.title, m.release_date, m.duration, g.genre_name, d.name as director_name, m.rating
        FROM Movies m
        JOIN Genres g ON m.genre_id = g.genre_id
        JOIN Directors d ON m.director_id = d.director_id
        ORDER BY m.rating DESC
        LIMIT 3";
$result_top_rated = $link->query($sql_top_rated);
$top_rated_movies = $result_top_rated->fetch_all(MYSQLI_ASSOC);

// Fetch the bottom 3 rated movies
$sql_bottom_rated = "SELECT m.title, m.release_date, m.duration, g.genre_name, d.name as director_name, m.rating
        FROM Movies m
        JOIN Genres g ON m.genre_id = g.genre_id
        JOIN Directors d ON m.director_id = d.director_id
        ORDER BY m.rating ASC
        LIMIT 3";
$result_bottom_rated = $link->query($sql_bottom_rated);
$bottom_rated_movies = $result_bottom_rated->fetch_all(MYSQLI_ASSOC);
?>


<!-- Hero Section -->
<section class="hero-section text-center text-white d-flex align-items-center justify-content-center" style="background: url('img/hero.webp') no-repeat center center/cover; height: 70vh;">
    <div class="container">
    <h1 class="display-4">Welcome to Movie Explorer</h1>
        <p class="lead">Discover and review your favorite movies</p>
        <a href="movies.php" class="btn btn-primary btn-lg">Explore Movies</a>
    </div>
</section>

<style>
.card {
    transition: transform 0.3s;
}

.card:hover {
    transform: translateY(-10px);
}
</style>

<!-- Top 3 Rated Movies Section -->
<section class="top-rated-movies-section py-5">
    <div class="container">
        <h2 class="text-center mb-4">Top 3 Rated Movies</h2>
        <div class="row">
            <?php foreach ($top_rated_movies as $movie): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($movie['title'], ENT_QUOTES) ?></h5>
                            <p class="card-text">
                                <strong>Release Date:</strong> <?= htmlspecialchars($movie['release_date'], ENT_QUOTES) ?><br>
                                <strong>Duration:</strong> <?= htmlspecialchars($movie['duration'], ENT_QUOTES) ?> minutes<br>
                                <strong>Genre:</strong> <?= htmlspecialchars($movie['genre_name'], ENT_QUOTES) ?><br>
                                <strong>Director:</strong> <?= htmlspecialchars($movie['director_name'], ENT_QUOTES) ?><br>
                                <strong>Rating:</strong> <?= htmlspecialchars($movie['rating'], ENT_QUOTES) ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Bottom 3 Rated Movies Section -->
<section class="bottom-rated-movies-section py-5">
    <div class="container">
        <h2 class="text-center mb-4">Bottom 3 Rated Movies</h2>
        <div class="row">
            <?php foreach ($bottom_rated_movies as $movie): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($movie['title'], ENT_QUOTES) ?></h5>
                            <p class="card-text">
                                <strong>Release Date:</strong> <?= htmlspecialchars($movie['release_date'], ENT_QUOTES) ?><br>
                                <strong>Duration:</strong> <?= htmlspecialchars($movie['duration'], ENT_QUOTES) ?> minutes<br>
                                <strong>Genre:</strong> <?= htmlspecialchars($movie['genre_name'], ENT_QUOTES) ?><br>
                                <strong>Director:</strong> <?= htmlspecialchars($movie['director_name'], ENT_QUOTES) ?><br>
                                <strong>Rating:</strong> <?= htmlspecialchars($movie['rating'], ENT_QUOTES) ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Recently Added Movies Section -->
<section class="recent-movies-section py-5">
    <div class="container">
        <h2 class="text-center mb-4">Recently Added Movies</h2>
        <div class="row">
            <?php foreach ($recent_movies as $movie): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($movie['title'], ENT_QUOTES) ?></h5>
                            <p class="card-text">
                                <strong>Release Date:</strong> <?= htmlspecialchars($movie['release_date'], ENT_QUOTES) ?><br>
                                <strong>Duration:</strong> <?= htmlspecialchars($movie['duration'], ENT_QUOTES) ?> minutes<br>
                                <strong>Genre:</strong> <?= htmlspecialchars($movie['genre_name'], ENT_QUOTES) ?><br>
                                <strong>Director:</strong> <?= htmlspecialchars($movie['director_name'], ENT_QUOTES) ?><br>
                                <strong>Rating:</strong> <?= htmlspecialchars($movie['rating'], ENT_QUOTES) ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Footer -->
<?php
include 'footer.php';
?>