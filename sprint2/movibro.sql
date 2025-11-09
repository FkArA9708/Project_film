-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2025 at 11:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movibro`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `name`, `created_at`) VALUES
(1, 'Keanu Reeves', '2025-11-07 09:53:18'),
(2, 'Leonardo DiCaprio', '2025-11-07 09:53:18'),
(3, 'Morgan Freeman', '2025-11-07 09:54:09'),
(4, 'Jack Nicholson', '2025-11-07 09:54:09'),
(5, 'Nicolas Cage', '2025-11-07 09:55:52'),
(6, 'Al Pacino', '2025-11-07 09:55:52'),
(7, 'Tom Hanks', '2025-11-07 09:56:40'),
(8, 'Anthony Hopkins', '2025-11-07 09:56:40'),
(9, 'Denzel Washington', '2025-11-07 09:59:27'),
(10, 'Christopher Walken', '2025-11-07 09:59:27'),
(13, 'Christian Bale', '2025-11-09 20:31:43'),
(16, 'Tom Holland', '2025-11-09 21:54:59'),
(17, 'José González', '2025-11-09 22:00:09'),
(18, 'Test\' UNION SELECT password FR', '2025-11-09 22:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `film_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`film_id`, `name`, `genre`, `created_at`) VALUES
(2, 'The Wolf of Wall Street', 'Comedy', '2025-11-07 10:03:52'),
(3, 'The Shawshank Redemption', 'Drama', '2025-11-07 10:03:52'),
(4, 'The Shining', 'Horror', '2025-11-07 10:06:24'),
(5, 'Ghost Rider', 'Action', '2025-11-07 10:06:24'),
(6, 'Scarface', 'Drama', '2025-11-07 10:09:01'),
(7, 'Forrest Gump', 'Drama', '2025-11-07 10:09:01'),
(8, 'The Silence of the Lambs', 'Thriller', '2025-11-07 10:11:22'),
(9, 'Malcolm X', 'Drama', '2025-11-07 10:11:22'),
(10, 'Pulp Fiction', 'Drama', '2025-11-07 10:12:33'),
(22, 'Spider-Man: No Way Home', 'Sci-Fi/Action', '2025-11-09 21:54:42'),
(23, 'Crème Brûlée: The Movie', 'Action', '2025-11-09 22:00:05'),
(24, 'The Matrix ', 'Sci-Fi ', '2025-11-09 22:04:32');

-- --------------------------------------------------------

--
-- Table structure for table `film_actors`
--

CREATE TABLE `film_actors` (
  `film_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `film_actors`
--

INSERT INTO `film_actors` (`film_id`, `actor_id`, `created_at`) VALUES
(2, 2, '2025-11-07 10:13:30'),
(3, 3, '2025-11-07 10:14:01'),
(4, 4, '2025-11-07 10:14:01'),
(5, 5, '2025-11-07 10:14:12'),
(6, 6, '2025-11-07 10:14:12'),
(7, 7, '2025-11-07 10:14:28'),
(8, 8, '2025-11-07 10:14:28'),
(9, 9, '2025-11-07 10:14:42'),
(10, 10, '2025-11-07 10:14:42'),
(22, 16, '2025-11-09 21:55:06'),
(23, 17, '2025-11-09 22:00:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`film_id`);

--
-- Indexes for table `film_actors`
--
ALTER TABLE `film_actors`
  ADD PRIMARY KEY (`film_id`,`actor_id`),
  ADD KEY `actor_id` (`actor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `film_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `film_actors`
--
ALTER TABLE `film_actors`
  ADD CONSTRAINT `film_actors_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `films` (`film_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `film_actors_ibfk_2` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
