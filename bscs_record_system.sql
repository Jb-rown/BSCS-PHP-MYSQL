-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 10, 2024 at 08:40 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bscs_record_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `class`, `gender`, `dob`, `email`) VALUES
(13, 'Austine Otieno', 'BSCS/1023J/2021', 'Male', '2024-04-29', 'austine@gmail.com'),
(8, 'Bruno Owino', 'BSCS/11J/2021', 'Male', '2024-04-23', 'brunoowino@gmail.com'),
(11, 'Cynthia Epuyo', 'BSCS/1000J/2021', 'Female', '2024-04-30', 'cynthiaepuyo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`) VALUES
('brownjohn9870@gmail.com', '12345'),
('bscs102j2021@students.tum.ac.ke', '12345'),
('a@a', '123'),
('b@b', '1234'),
('c@c', '123'),
('d@d', '12'),
('q@q', '12'),
('u@u', '12345'),
('brownjohn9870@gmail.com', '12'),
('brownjohn9870@gmail.com', '12'),
('w@w', '11'),
('j@j', '123'),
('k@k', '123'),
('felo@gg', '123'),
('brunoowino@gmail.com', '12345'),
('m@m', '123'),
('johnbrown9870102@gmail.com', '12345'),
('cynthiaepuyo@gmail.com', '1234'),
('kevin@gmail.com', '1234'),
('austine@gmail.com', '1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
