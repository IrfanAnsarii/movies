-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 25, 2024 at 01:46 PM
-- Server version: 8.0.39
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `actor_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `birthdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`actor_id`, `name`, `birthdate`) VALUES
(1, 'Leonardo DiCaprio', '1974-11-11'),
(2, 'Brad Pitt', '1963-12-18'),
(3, 'Morgan Freeman', '1937-06-01'),
(4, 'Tom Hanks', '1956-07-09'),
(5, 'Robert De Niro', '1943-08-17'),
(6, 'Al Pacino', '1940-04-25'),
(7, 'Johnny Depp', '1963-06-09'),
(8, 'Matt Damon', '1970-10-08'),
(9, 'Christian Bale', '1974-01-30'),
(10, 'Harrison Ford', '1942-07-13'),
(11, 'Samuel L. Jackson', '1948-12-21'),
(12, 'Tom Cruise', '1962-07-03'),
(13, 'Will Smith', '1968-09-25'),
(14, 'Scarlett Johansson', '1984-11-22'),
(15, 'Natalie Portman', '1981-06-09'),
(16, 'Emma Stone', '1988-11-06'),
(17, 'Jennifer Lawrence', '1990-08-15'),
(18, 'Anne Hathaway', '1982-11-12'),
(19, 'Meryl Streep', '1949-06-22'),
(20, 'Julia Roberts', '1967-10-28'),
(21, 'Irfan', '2024-11-16'),
(22, 'vbnm', '2024-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `director_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `birthdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`director_id`, `name`, `birthdate`) VALUES
(5, 'James Cameron', '1954-08-16'),
(6, 'Ridley Scott', '1937-11-30'),
(7, 'Peter Jackson', '1961-10-31'),
(8, 'Tim Burton', '1958-08-25'),
(9, 'Clint Eastwood', '1930-05-31'),
(10, 'George Lucas', '1944-05-14'),
(11, 'Francis Ford Coppola', '1939-04-07'),
(12, 'David Fincher', '1962-08-28'),
(13, 'Stanley Kubrick', '1928-07-26'),
(14, 'Alfred Hitchcock', '1899-08-13'),
(15, 'Wes Anderson', '1969-05-01'),
(16, 'Sofia Coppola', '1971-05-14'),
(17, 'David Lynch', '1946-01-20'),
(18, 'Guillermo del Toro', '1964-10-09'),
(19, 'Spike Lee', '1957-03-20'),
(20, 'Coen Brothers', '1954-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `genre_id` int NOT NULL,
  `genre_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genre_id`, `genre_name`) VALUES
(6, 'Mystery'),
(7, 'Romance'),
(9, 'Western'),
(10, 'Sci-Fi'),
(12, 'Animation'),
(13, 'Biography'),
(14, 'Crime'),
(16, 'Family'),
(17, 'History'),
(18, 'Musical'),
(19, 'Sport'),
(20, 'War'),
(21, 'Indian'),
(22, 'Historical'),
(23, 'Action');

-- --------------------------------------------------------

--
-- Table structure for table `movieactors`
--

CREATE TABLE `movieactors` (
  `movie_id` int NOT NULL,
  `actor_id` int NOT NULL,
  `role_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movieactors`
--

INSERT INTO `movieactors` (`movie_id`, `actor_id`, `role_name`) VALUES
(9, 10, 'Neo'),
(11, 10, 'Han Solo'),
(13, 2, 'Hannibal Lecter'),
(14, 2, 'Detective Mills'),
(22, 21, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `release_date` date DEFAULT NULL,
  `duration` int DEFAULT NULL,
  `genre_id` int DEFAULT NULL,
  `director_id` int DEFAULT NULL,
  `rating` decimal(3,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `title`, `release_date`, `duration`, `genre_id`, `director_id`, `rating`) VALUES
(9, 'The Matrix', '1999-03-31', 136, 10, 6, 8.7),
(11, 'Star Wars: Episode IV - A New Hope', '1977-05-25', 121, 10, 10, 8.6),
(13, 'The Silence of the Lambs', '1991-02-14', 118, 6, 13, 8.6),
(14, 'Se7en', '1995-09-22', 127, 6, 12, 8.6),
(18, 'The Lion King', '1994-06-24', 88, 12, 8, 8.5),
(19, 'Back to the Future', '1985-07-03', 116, 10, 9, 8.5),
(22, 'Adnand Movie', '2024-11-04', 20, 20, 20, 8.0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`actor_id`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`director_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `movieactors`
--
ALTER TABLE `movieactors`
  ADD PRIMARY KEY (`movie_id`,`actor_id`),
  ADD KEY `actor_id` (`actor_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `director_id` (`director_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `actor_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `director_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movieactors`
--
ALTER TABLE `movieactors`
  ADD CONSTRAINT `movieactors_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movieactors_ibfk_2` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`actor_id`) ON DELETE CASCADE;

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`),
  ADD CONSTRAINT `movies_ibfk_2` FOREIGN KEY (`director_id`) REFERENCES `directors` (`director_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
