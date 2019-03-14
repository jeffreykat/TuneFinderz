-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: classmysql.engr.oregonstate.edu:3306
-- Generation Time: Mar 14, 2019 at 12:37 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs440_voraru`
--

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `playlist_id` int(11) NOT NULL,
  `pname` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`playlist_id`, `pname`, `username`) VALUES
(3, 'Summer Nights', 'beyonce'),
(4, 'Mood', 'jayz'),
(8, 'Pop Songs', 'jkat'),
(18, 'Rock Music', 'jayz'),
(19, 'Rock', 'jayz'),
(33, 'Rock', 'jkat'),
(36, 'Folk', 'jkat'),
(43, 'DanceMusic', 'jkat'),
(44, 'Classic', 'jkat'),
(45, 'Classic', 'jkat'),
(50, 'RandomDance', 'jkat'),
(51, 'stuff', 'test'),
(52, 'sdf', 'test'),
(53, 'Workout Tunes', 'testUser'),
(55, 'HipHop', 'jkat'),
(56, 'Hip Hop Tunez', 'jayz'),
(57, 'Party Jams', 'beyonce'),
(58, 'Country Stuff', 'jkat'),
(59, 'List', 'jkat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`playlist_id`),
  ADD KEY `playlist_id` (`playlist_id`),
  ADD KEY `playlist_id_2` (`playlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `playlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
