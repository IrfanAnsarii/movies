# Movie Database

This project is a simple movie database application built with PHP and MySQL. It allows users to manage movies, directors, genres, and actors. The application provides functionalities to add, edit, delete, and view records in the database.

## Screenshot
![Image1]()
![Image1]()

## Project Structure

```
actors.php
add_director.php
add_genre.php
add_movie.php
config.php
db.php
delete_director.php
delete_genre.php
delete_movie.php
directors.php
edit_director.php
edit_genre.php
edit_movie.php
footer.php
genres.php
header.php
img/
index.php
insert_director.php
insert_genre.php
insert_movie.php
movies.php
styles.css
update_director.php
update_genre.php
update_movie.php
```

## Files and Their Purpose

- **actors.php**: Handles the addition and listing of actors.
- **add_director.php**: Form to add a new director.
- **add_genre.php**: Form to add a new genre.
- **add_movie.php**: Form to add a new movie.
- **config.php**: Database configuration file.
- **db.php**: Contains functions to interact with the database.
- **delete_director.php**: Handles the deletion of a director and related movies.
- **delete_genre.php**: Handles the deletion of a genre and related movies.
- **delete_movie.php**: Handles the deletion of a movie and related records.
- **directors.php**: Lists all directors and provides options to edit or delete them.
- **edit_director.php**: Form to edit an existing director.
- **edit_genre.php**: Form to edit an existing genre.
- **edit_movie.php**: Form to edit an existing movie.
- **footer.php**: Footer section of the website.
- **genres.php**: Handles the addition and listing of genres.
- **header.php**: Header section of the website.
- **index.php**: Home page that displays top-rated, bottom-rated, and recently added movies.
- **insert_director.php**: Handles the insertion of a new director into the database.
- **insert_genre.php**: Handles the insertion of a new genre into the database.
- **insert_movie.php**: Handles the insertion of a new movie into the database.
- **movies.php**: Lists all movies and provides options to edit or delete them.
- **styles.css**: Contains the CSS styles for the website.
- **update_director.php**: Handles the update of an existing director in the database.
- **update_genre.php**: Handles the update of an existing genre in the database.
- **update_movie.php**: Handles the update of an existing movie in the database.

## Database Configuration

The database configuration is defined in the 

config.php

 file. Update the database credentials as needed:

```php
define('DB_SERVER', 'localhost');
define('

DB

_USERNAME', 'root');
define('DB_PASSWORD', 'Test@123');
define('DB_NAME', 'movie');
```

## Running the Project

1. Clone the repository to your local machine.
2. Import the database schema and data from the provided SQL file (if available).
3. Update the database configuration in 

config.php

.
4. Start your local server (e.g., using XAMPP or Laragon).
5. Open the project in your browser.



