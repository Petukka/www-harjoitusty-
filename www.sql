-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17.12.2017 klo 19:31
-- Palvelimen versio: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `www`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `highscores`
--

CREATE TABLE `highscores` (
  `hiid` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `highscores`
--

INSERT INTO `highscores` (`hiid`, `username`, `score`) VALUES
(75, 'Petri', 5),
(76, 'Petri', 2),
(77, 'Petri', 11),
(78, 'Petri', 3),
(79, 'Petri', 3),
(80, 'Gondola', 6),
(81, 'Gondola', 8),
(82, 'Gondola', 14),
(83, 'Gondola', 2),
(84, 'Gondola', 2);

-- --------------------------------------------------------

--
-- Rakenne taululle `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(12) NOT NULL,
  `pass_hash` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `users`
--

INSERT INTO `users` (`userid`, `username`, `pass_hash`) VALUES
(15, 'Petri', '55f37716ddb0a9aa5ebd601430d414e780c81373'),
(16, 'Gondola', '0d11d212baac992d6139f74878e39e6d6802e4de');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `highscores`
--
ALTER TABLE `highscores`
  ADD PRIMARY KEY (`hiid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `highscores`
--
ALTER TABLE `highscores`
  MODIFY `hiid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
