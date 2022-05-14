-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 29, 2022 at 03:31 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final project`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `movie_id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_name` text NOT NULL,
  `movie_date` date NOT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `movie_name`, `movie_date`) VALUES
(1, 'Encanto', '2021-11-25'),
(2, 'Spider-Man: No Way Home', '2021-12-17'),
(3, 'Dune', '2021-10-13'),
(4, 'Eternals', '2021-11-13'),
(5, 'The Kingsman', '2021-10-11'),
(6, 'No Time To Die', '2021-09-17'),
(7, 'The Matrix: Resurrections', '2021-12-25'),
(8, 'Doctor Strange 3', '2022-05-04'),
(9, 'The Batman', '2022-03-04'),
(10, 'Morbius', '2022-04-13'),
(11, 'Fantastic Beasts 3', '2022-04-28'),
(12, 'Uncharted', '2022-05-18'),
(13, 'Knives Out 2', '2022-06-16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`) VALUES
(1, 'Dany', '$2y$10$hA/5IdOxk03zqahei110eebA05d0X.KO11JyDcWiYLIMtonqw/UnC'),
(2, 'charbel', '$2y$10$Wd1dHtuc1.xPaGr49ZXFFu0x8a4QF/X4e9/HBkC9MstfGi6Orw7mW'),
(3, 'Sarah', '$2y$10$DWG/qWCdJwQg04HBSYuA2.dNd8Mq.6F/O0SCaUtZwK92bhHaVTc1y');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
