-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2017 at 05:11 am
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Dans_Blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogpost`
--

CREATE TABLE `blogpost` (
  `id` tinyint(15) UNSIGNED NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogpost`
--

INSERT INTO `blogpost` (`id`, `title`, `description`, `image`, `timeStamp`) VALUES
(1, 'asd', 'asdasdasdasd', NULL, '2017-03-24 03:47:32'),
(2, 'asd', 'asdasdasdasd', NULL, '2017-03-24 03:47:42'),
(3, 'asd', 'asdasdasdasd', NULL, '2017-03-24 03:53:51'),
(4, 'asdasd', 'asdasdasdasd', NULL, '2017-03-24 03:54:11'),
(5, 'asdasd', 'asdasdasdasdas', NULL, '2017-03-24 03:54:58'),
(6, 'asdasd', 'asdasdasda', NULL, '2017-03-24 03:55:49'),
(7, 'asdasd', 'asdasdasda', NULL, '2017-03-24 03:56:04'),
(8, 'asdasd', 'asdasdasdasd', NULL, '2017-03-24 03:57:12'),
(9, 'asda', 'asdasdasdasd', NULL, '2017-03-24 04:05:41'),
(10, 'asdasd', 'asdasdasdasd', NULL, '2017-03-24 04:06:33'),
(11, 'asd', 'asdasdaasd', NULL, '2017-03-24 04:07:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogpost`
--
ALTER TABLE `blogpost`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `image` (`image`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogpost`
--
ALTER TABLE `blogpost`
  MODIFY `id` tinyint(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
