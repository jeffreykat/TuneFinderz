-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: classmysql.engr.oregonstate.edu:3306
-- Generation Time: Mar 14, 2019 at 12:38 PM
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
-- Table structure for table `song_playlist`
--

CREATE TABLE `song_playlist` (
  `playlist_id` int(11) NOT NULL,
  `song_id` varchar(52) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `song_playlist`
--

INSERT INTO `song_playlist` (`playlist_id`, `song_id`) VALUES
(0, 'SOJIMUS12AB0181194'),
(0, 'SORXYBE12A6310E27A'),
(3, 'SOAAAQN12AB01856D3'),
(3, 'SOAAFUV12AB018831D'),
(3, 'SOAAQAB12A8AE4769F'),
(3, 'SOAATRN12A6310E897'),
(3, 'SOABDSJ12A6D4F9065'),
(3, 'SOSOQET12AB0181A68'),
(4, 'SOAAAQN12AB01856D3'),
(4, 'SOAAQAB12A8AE4769F'),
(4, 'SOAEQKJ12A58A761EA'),
(4, 'SOAESJW12A8C137CC2'),
(4, 'SOAEXGD12A6D4FB738'),
(6, 'SOLBPPU12AB0187DD7'),
(6, 'SOSOQET12AB0181A68'),
(18, 'SOAAAQN12AB01856D3'),
(25, 'SORGIYZ12AAF3B3528'),
(28, 'SOKGPRX12A8C138268'),
(33, 'SODCRRC12A8C139A9F'),
(33, 'SOTEFFR12A8C144765'),
(33, 'SOXPWVH12A8C13B68E'),
(37, 'SOAJMYR12A6D4F52FE'),
(43, 'SOOWVUN12AB0185435'),
(44, 'SOCDQCT12AAFF429B6'),
(44, 'SOKYZSI12AB0183789'),
(44, 'SOOXLKF12A6D4F594A'),
(44, 'SOSYGHA12AB0186AEC'),
(45, 'SOCOZKO12B0B8066E3'),
(45, 'SOFRBZI12AB0186AE8'),
(45, 'SOKYZSI12AB0183789'),
(55, 'SOCBINM12AC468678F'),
(55, 'SOIAOMF12A8C134A44'),
(55, 'SOMWNSA12A8C1343F1'),
(55, 'SOTVHQT12AB0181279'),
(55, 'SOZOVJG12AB018632B'),
(56, 'SOASCHQ12A6D4F9091'),
(56, 'SOGWZBN12A6D4F6AB2'),
(56, 'SOJKTJG12AB0182516'),
(56, 'SOKELFE12A6D4F7911'),
(56, 'SOLJQBW12A6702187B'),
(56, 'SOMCQZY12A8C136BBF'),
(56, 'SOMRJYH12A8C13165E'),
(56, 'SOPRQEX12A8C133558'),
(56, 'SOTLZBK12A6D4F7E63'),
(56, 'SOUNBSH12AB01888C0'),
(56, 'SOUVKXW12A8C1427AC'),
(56, 'SOVXKMW12A8C1414C1'),
(56, 'SOXTCSF12A8AE4628A'),
(56, 'SOYZFQG12AB0180D6F'),
(56, 'SOZOVJG12AB018632B'),
(58, 'SODAKWB12A8C12FFBE'),
(58, 'SODIAHF12A6D4F809C'),
(58, 'SOFKQMW12A8C1326B5'),
(58, 'SOFRINM12A6D4F7B10'),
(58, 'SOISVOJ12A6D4F841D'),
(58, 'SOJQLZR12AB018909F'),
(58, 'SOKCXFJ12A8C1350EC'),
(58, 'SOMMALW12A58A79E93'),
(58, 'SOOWJBD12A8C139450'),
(58, 'SOPIRTQ12A8C131DF9'),
(58, 'SOUWVXK12A8C13CAB9'),
(58, 'SOWRHSP12A58A77A73'),
(59, 'SODKGGR12A58A7DCB2'),
(59, 'SOFHVTV12AB01882C3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `song_playlist`
--
ALTER TABLE `song_playlist`
  ADD PRIMARY KEY (`playlist_id`,`song_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
