<?php
require_once 'config.php';

function getGenres($link) {
    $sql = "SELECT * FROM Genres";
    $result = mysqli_query($link, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getMovies($link) {
    $sql = "SELECT m.title, m.release_date, m.duration, g.genre_name, d.name as director_name, m.rating 
            FROM Movies m
            JOIN Genres g ON m.genre_id = g.genre_id
            JOIN Directors d ON m.director_id = d.director_id";
    $result = $link->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getDirectors($link) {
    $sql = "SELECT * FROM Directors";
    $result = mysqli_query($link, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getActors($link) {
    $sql = "SELECT * FROM Actors";
    $result = mysqli_query($link, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>