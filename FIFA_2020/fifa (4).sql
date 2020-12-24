-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 24, 2020 at 10:15 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fifa`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `fifa_id` varchar(20) NOT NULL,
  `fifa_name` varchar(20) NOT NULL,
  `email_id` varchar(20) DEFAULT NULL,
  `pwd` varchar(20) DEFAULT NULL,
  `fifa_coins` int(11) DEFAULT NULL,
  `training_xp` int(11) DEFAULT NULL,
  PRIMARY KEY (`fifa_id`),
  UNIQUE KEY `fifa_name` (`fifa_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`fifa_id`, `fifa_name`, `email_id`, `pwd`, `fifa_coins`, `training_xp`) VALUES
('harv4106', 'Harvey', 'harvey07@gmail.com', 'harvey', 60000, 53200),
('John4104', 'John', 'john12@gmail.com', '1234', 9000000, 500000),
('luis4108', 'Luis', 'luis55@gmail.com', 'luis', 69823, 47896),
('mike4105', 'Mike', 'rossmike@gmail.com', 'mike', 55000, 28993),
('rach4107', 'Rachel', 'rach111@gmail.com', 'rachel', 77412, 69633);

-- --------------------------------------------------------

--
-- Table structure for table `card_lvls`
--

DROP TABLE IF EXISTS `card_lvls`;
CREATE TABLE IF NOT EXISTS `card_lvls` (
  `card_id` varchar(20) NOT NULL,
  `lvl` int(11) NOT NULL,
  `skill` int(11) DEFAULT NULL,
  `passing` int(11) DEFAULT NULL,
  `shooting` int(11) DEFAULT NULL,
  `training_xp` int(11) DEFAULT NULL,
  PRIMARY KEY (`card_id`,`lvl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card_lvls`
--

INSERT INTO `card_lvls` (`card_id`, `lvl`, `skill`, `passing`, `shooting`, `training_xp`) VALUES
('cc41pd', 93, 107, 99, 105, NULL),
('cc41pd', 94, 110, 102, 107, 381),
('cc41pd', 95, 114, 104, 110, 812),
('cc41pd', 96, 116, 106, 113, 1399),
('cc41pd', 97, 117, 109, 115, 2047),
('cc41pd', 98, 118, 112, 117, 2765),
('cc41pd', 99, 119, 113, 118, 3660),
('cc41pd', 100, 119, 114, 118, 4642),
('cc42kk', 92, 78, 61, 58, NULL),
('cc42kk', 93, 81, 62, 60, 336),
('cc42kk', 94, 81, 66, 60, 717),
('cc42kk', 95, 84, 67, 61, 1149),
('cc42kk', 96, 85, 69, 63, 1735),
('cc42kk', 97, 64, 88, 70, 2384),
('cc42kk', 98, 90, 72, 64, 3101),
('cc42kk', 99, 90, 74, 64, 3997),
('cc42kk', 100, 96, 76, 64, 4978),
('cc43mi', 92, 94, 73, 99, NULL),
('cc43mi', 93, 96, 75, 102, 336),
('cc43mi', 94, 98, 78, 104, 717),
('cc43mi', 95, 101, 81, 108, 1149),
('cc43mi', 96, 105, 83, 112, 1735),
('cc43mi', 97, 109, 84, 113, 2384),
('cc43mi', 98, 112, 87, 115, 3101),
('cc43mi', 99, 115, 90, 116, 3997),
('cc43mi', 100, 118, 93, 117, 4978),
('cc44ci', 91, 92, 69, 96, NULL),
('cc44ci', 92, 94, 71, 97, 296),
('cc44ci', 93, 96, 73, 100, 632),
('cc44ci', 94, 97, 76, 102, 1014),
('cc44ci', 95, 100, 79, 106, 1445),
('cc44ci', 96, 104, 81, 110, 2031),
('cc44ci', 97, 108, 82, 113, 2680),
('cc44ci', 98, 111, 85, 116, 3398),
('cc44ci', 99, 114, 88, 117, 4293),
('cc44ci', 100, 117, 91, 118, 5275),
('cc45mp', 91, 100, 99, 86, NULL),
('cc45mp', 92, 104, 101, 89, 296),
('cc45mp', 93, 106, 103, 90, 632),
('cc45mp', 94, 108, 106, 91, 1014),
('cc45mp', 95, 110, 108, 93, 1445),
('cc45mp', 96, 114, 108, 94, 2031),
('cc45mp', 97, 115, 109, 96, 2680),
('cc45mp', 98, 115, 111, 97, 3398),
('cc45mp', 99, 117, 111, 99, 4293),
('cc45mp', 100, 117, 113, 102, 5275),
('cc46dc', 90, 96, 91, 92, NULL),
('cc46dc', 91, 100, 95, 94, 260),
('cc46dc', 92, 103, 97, 96, 556),
('cc46dc', 93, 106, 100, 99, 893),
('cc46dc', 94, 110, 102, 102, 1274),
('cc46dc', 95, 114, 103, 105, 1705),
('cc46dc', 96, 117, 107, 108, 2292),
('cc46dc', 97, 118, 109, 110, 2940),
('cc46dc', 98, 118, 112, 113, 3658),
('cc46dc', 99, 119, 114, 116, 4553),
('cc46dc', 100, 119, 116, 120, 5535),
('cc47hg', 90, 91, 74, 96, NULL),
('cc47hg', 91, 95, 74, 98, 260),
('cc47hg', 92, 96, 76, 100, 556),
('cc47hg', 93, 98, 78, 102, 893),
('cc47hg', 94, 100, 2, 105, 1274),
('cc47hg', 95, 103, 84, 108, 1705),
('cc47hg', 96, 107, 86, 112, 2292),
('cc47hg', 97, 111, 87, 115, 2940),
('cc47hg', 98, 114, 90, 117, 3658),
('cc47hg', 99, 117, 93, 118, 4553),
('cc47hg', 100, 119, 96, 119, 5535),
('cc48as', 89, 65, 45, 35, NULL),
('cc48as', 90, 67, 46, 36, 97),
('cc48as', 91, 68, 48, 38, 357),
('cc48as', 92, 70, 51, 39, 654),
('cc48as', 93, 70, 53, 39, 990),
('cc48as', 94, 72, 55, 39, 1372),
('cc48as', 95, 73, 57, 40, 1803),
('cc48as', 96, 76, 59, 40, 2389),
('cc48as', 97, 77, 62, 41, 3038),
('cc48as', 98, 77, 64, 41, 3756),
('cc48as', 99, 78, 66, 43, 4651),
('cc48as', 100, 79, 69, 45, 5633),
('cc49mb', 90, 76, 68, 58, NULL),
('cc49mb', 91, 79, 69, 60, 260),
('cc49mb', 92, 81, 70, 60, 556),
('cc49mb', 93, 83, 71, 62, 893),
('cc49mb', 94, 84, 75, 62, 1274),
('cc49mb', 95, 86, 76, 63, 1705),
('cc49mb', 96, 88, 78, 65, 2292),
('cc49mb', 97, 90, 79, 67, 2940),
('cc49mb', 98, 92, 81, 67, 3658),
('cc49mb', 99, 93, 83, 68, 4553),
('cc49mb', 100, 99, 85, 69, 5535),
('cc50sh', 89, 41, 41, 32, NULL),
('cc50sh', 90, 42, 41, 33, 97),
('cc50sh', 91, 43, 44, 35, 357),
('cc50sh', 92, 45, 46, 36, 654),
('cc50sh', 93, 46, 48, 36, 990),
('cc50sh', 94, 48, 50, 36, 1372),
('cc50sh', 95, 48, 53, 38, 1803),
('cc50sh', 96, 52, 54, 38, 2389),
('cc50sh', 97, 53, 57, 39, 3038),
('cc50sh', 98, 53, 59, 39, 3756),
('cc50sh', 99, 55, 62, 41, 4651),
('cc50sh', 100, 56, 64, 43, 5633),
('lg31nm', 93, 109, 97, 100, NULL),
('lg31nm', 94, 112, 98, 103, 381),
('lg31nm', 95, 116, 100, 107, 812),
('lg31nm', 96, 118, 103, 109, 1399),
('lg31nm', 97, 118, 105, 112, 2047),
('lg31nm', 98, 119, 109, 113, 2765),
('lg31nm', 99, 119, 111, 115, 3660),
('lg31nm', 100, 119, 116, 118, 4642),
('lg32ts', 91, 92, 86, 75, NULL),
('lg32ts', 92, 93, 88, 76, 296),
('lg32ts', 93, 95, 88, 77, 632),
('lg32ts', 94, 96, 93, 78, 1014),
('lg32ts', 95, 98, 94, 79, 1445),
('lg32ts', 96, 100, 96, 81, 2031),
('lg32ts', 97, 102, 97, 82, 2680),
('lg32ts', 98, 104, 99, 82, 3398),
('lg32ts', 99, 104, 101, 83, 4293),
('lg32ts', 100, 110, 103, 84, 5275),
('lg33km', 91, 100, 88, 94, NULL),
('lg33km', 92, 103, 90, 97, 296),
('lg33km', 93, 106, 93, 99, 632),
('lg33km', 94, 109, 95, 102, 1014),
('lg33km', 95, 114, 96, 105, 1445),
('lg33km', 96, 117, 100, 108, 2031),
('lg33km', 97, 118, 102, 110, 2680),
('lg33km', 98, 118, 106, 111, 3398),
('lg33km', 99, 119, 107, 114, 4293),
('lg33km', 100, 119, 112, 117, 5275),
('lg34ec', 91, 96, 80, 97, NULL),
('lg34ec', 92, 97, 82, 99, 296),
('lg34ec', 93, 99, 84, 101, 632),
('lg34ec', 94, 100, 87, 104, 1014),
('lg34ec', 95, 104, 90, 107, 1445),
('lg34ec', 96, 108, 92, 111, 2031),
('lg34ec', 97, 111, 93, 113, 2680),
('lg34ec', 98, 114, 95, 117, 3398),
('lg34ec', 99, 117, 99, 118, 4293),
('lg34ec', 100, 119, 101, 119, 5275),
('lg35ft', 90, 95, 89, 89, NULL),
('lg35ft', 91, 96, 91, 90, 260),
('lg35ft', 92, 100, 94, 93, 556),
('lg35ft', 93, 102, 96, 95, 893),
('lg35ft', 94, 104, 99, 98, 1274),
('lg35ft', 95, 108, 102, 100, 1705),
('lg35ft', 96, 111, 105, 104, 2292),
('lg35ft', 97, 113, 108, 106, 2940),
('lg35ft', 98, 115, 111, 108, 3658),
('lg35ft', 99, 116, 113, 109, 4553),
('lg35ft', 100, 117, 115, 115, 5535),
('lg36fc', 89, 89, 76, 93, NULL),
('lg36fc', 90, 90, 77, 94, 97),
('lg36fc', 91, 94, 77, 96, 357),
('lg36fc', 92, 95, 79, 98, 654),
('lg36fc', 93, 97, 81, 100, 990),
('lg36fc', 94, 98, 85, 103, 1372),
('lg36fc', 95, 102, 87, 106, 1803),
('lg36fc', 96, 105, 89, 110, 2389),
('lg36fc', 97, 109, 91, 113, 3038),
('lg36fc', 98, 113, 93, 116, 3756),
('lg36fc', 99, 115, 96, 118, 4651),
('lg36fc', 100, 119, 99, 119, 5633),
('lg37lp', 88, 43, 41, 38, NULL),
('lg37lp', 89, 43, 41, 38, 86),
('lg37lp', 90, 44, 41, 39, 184),
('lg37lp', 91, 46, 44, 41, 444),
('lg37lp', 92, 47, 46, 42, 740),
('lg37lp', 93, 48, 48, 42, 1077),
('lg37lp', 94, 50, 50, 42, 1458),
('lg37lp', 95, 50, 53, 43, 1889),
('lg37lp', 96, 54, 55, 43, 2476),
('lg37lp', 97, 55, 57, 44, 3124),
('lg37lp', 98, 55, 59, 44, 3842),
('lg37lp', 99, 56, 62, 46, 4737),
('lg37lp', 100, 57, 64, 48, 5719),
('lg38ar', 86, 70, 60, 55, NULL),
('lg38ar', 87, 71, 61, 55, 66),
('lg38ar', 88, 71, 61, 56, 143),
('lg38ar', 89, 71, 62, 57, 229),
('lg38ar', 90, 73, 64, 63, 327),
('lg38ar', 91, 76, 64, 65, 587),
('lg38ar', 92, 78, 66, 65, 883),
('lg38ar', 93, 80, 66, 67, 1220),
('lg38ar', 94, 80, 71, 67, 1601),
('lg38ar', 95, 83, 72, 68, 2032),
('lg38ar', 96, 85, 74, 70, 2619),
('lg38ar', 97, 87, 75, 72, 3267),
('lg38ar', 98, 89, 77, 72, 3985),
('lg38ar', 99, 90, 79, 73, 4880),
('lg38ar', 100, 96, 81, 74, 5862),
('lg39md', 89, 86, 90, 76, NULL),
('lg39md', 90, 88, 93, 76, 385),
('lg39md', 91, 90, 95, 79, 645),
('lg39md', 92, 91, 99, 80, 942),
('lg39md', 93, 95, 101, 84, 1278),
('lg39md', 94, 96, 105, 86, 1660),
('lg39md', 95, 99, 1006, 87, 2091),
('lg39md', 96, 101, 111, 91, 2677),
('lg39md', 97, 103, 112, 92, 3326),
('lg39md', 98, 106, 114, 92, 4044),
('lg39md', 99, 107, 115, 93, 4939),
('lg39md', 100, 111, 116, 94, 5921),
('lg40md', 92, 102, 92, 96, NULL),
('lg40md', 93, 104, 95, 98, 336),
('lg40md', 94, 108, 97, 101, 717),
('lg40md', 95, 112, 98, 105, 1149),
('lg40md', 96, 115, 101, 107, 1735),
('lg40md', 97, 118, 104, 110, 2384),
('lg40md', 98, 118, 107, 113, 3101),
('lg40md', 99, 118, 109, 116, 3997),
('lg40md', 100, 118, 114, 120, 4978),
('ll01lm', 95, 117, 106, 109, NULL),
('ll01lm', 96, 117, 108, 113, 586),
('ll01lm', 97, 119, 109, 115, 1235),
('ll01lm', 98, 120, 111, 117, 1952),
('ll01lm', 99, 120, 113, 119, 2848),
('ll01lm', 100, 120, 114, 120, 3829),
('ll02cr', 95, 113, 102, 112, NULL),
('ll02cr', 96, 116, 104, 116, 586),
('ll02cr', 97, 119, 106, 117, 1235),
('ll02cr', 98, 120, 108, 118, 1952),
('ll02cr', 99, 120, 111, 119, 2848),
('ll02cr', 100, 120, 114, 120, 3829),
('ll03sr', 92, 93, 85, 85, NULL),
('ll03sr', 93, 96, 86, 86, 336),
('ll03sr', 94, 96, 91, 87, 717),
('ll03sr', 95, 99, 92, 88, 1149),
('ll03sr', 96, 100, 93, 90, 1735),
('ll03sr', 97, 103, 95, 91, 2384),
('ll03sr', 98, 105, 97, 91, 3101),
('ll03sr', 99, 105, 99, 92, 3997),
('ll03sr', 100, 109, 101, 92, 4978),
('ll04gm', 92, 101, 92, 102, NULL),
('ll04gm', 93, 103, 94, 104, 336),
('ll04gm', 94, 104, 98, 106, 717),
('ll04gm', 95, 108, 100, 110, 1149),
('ll04gm', 96, 111, 102, 114, 1735),
('ll04gm', 97, 115, 103, 116, 2384),
('ll04gm', 98, 117, 106, 118, 3101),
('ll04gm', 99, 118, 109, 119, 3997),
('ll04gm', 100, 119, 111, 120, 4978),
('ll05pq', 91, 91, 85, 78, NULL),
('ll05pq', 92, 92, 86, 79, 296),
('ll05pq', 93, 94, 87, 80, 632),
('ll05pq', 94, 95, 92, 81, 1014),
('ll05pq', 95, 96, 93, 82, 1445),
('ll05pq', 96, 98, 94, 84, 2031),
('ll05pq', 97, 100, 95, 85, 2680),
('ll05pq', 98, 102, 97, 85, 3398),
('ll05pq', 99, 102, 100, 86, 4293),
('ll05pq', 100, 108, 101, 86, 5275),
('ll06ol', 89, 46, 44, 41, NULL),
('ll06ol', 90, 47, 44, 42, 97),
('ll06ol', 91, 48, 46, 44, 357),
('ll06ol', 92, 50, 49, 45, 654),
('ll06ol', 93, 51, 51, 45, 990),
('ll06ol', 94, 53, 53, 45, 1372),
('ll06ol', 95, 53, 56, 46, 1803),
('ll06ol', 96, 56, 57, 46, 2389),
('ll06ol', 97, 57, 60, 47, 3038),
('ll06ol', 98, 57, 62, 47, 3756),
('ll06ol', 99, 59, 64, 49, 4651),
('ll06ol', 100, 60, 67, 50, 5633),
('ll07ja', 89, 91, 88, 80, NULL),
('ll07ja', 90, 93, 90, 80, 97),
('ll07ja', 91, 95, 93, 83, 357),
('ll07ja', 92, 96, 96, 84, 654),
('ll07ja', 93, 100, 98, 88, 990),
('ll07ja', 94, 101, 102, 90, 1372),
('ll07ja', 95, 104, 104, 91, 1803),
('ll07ja', 96, 107, 109, 95, 2389),
('ll07ja', 97, 109, 110, 96, 3038),
('ll07ja', 98, 111, 112, 96, 3756),
('ll07ja', 99, 112, 114, 97, 4651),
('ll07ja', 100, 114, 115, 98, 5633),
('ll08tk', 93, 107, 111, 100, NULL),
('ll08tk', 94, 109, 111, 104, 381),
('ll08tk', 95, 114, 113, 104, 812),
('ll08tk', 96, 117, 115, 106, 1399),
('ll08tk', 97, 119, 115, 108, 2047),
('ll08tk', 98, 120, 115, 112, 2765),
('ll08tk', 99, 120, 115, 114, 3660),
('ll08tk', 100, 120, 116, 115, 4642),
('ll09gg', 91, 97, 84, 101, NULL),
('ll09gg', 92, 98, 86, 103, 296),
('ll09gg', 93, 100, 88, 105, 632),
('ll09gg', 94, 102, 91, 107, 1014),
('ll09gg', 95, 105, 94, 111, 1445),
('ll09gg', 96, 109, 96, 115, 2031),
('ll09gg', 97, 113, 97, 116, 2680),
('ll09gg', 98, 116, 99, 118, 3398),
('ll09gg', 99, 118, 103, 118, 4293),
('ll09gg', 100, 118, 104, 119, 5275),
('ll10sl', 87, 89, 83, 81, NULL),
('ll10sl', 88, 90, 83, 82, 76),
('ll10sl', 89, 91, 84, 83, 162),
('ll10sl', 90, 94, 88, 84, 260),
('ll10sl', 91, 97, 90, 85, 520),
('ll10sl', 92, 99, 95, 86, 816),
('ll10sl', 93, 103, 95, 89, 1153),
('ll10sl', 94, 105, 97, 93, 1534),
('ll10sl', 95, 110, 101, 94, 1965),
('ll10sl', 96, 113, 103, 95, 2552),
('ll10sl', 97, 116, 103, 97, 3200),
('ll10sl', 98, 118, 105, 101, 3918),
('ll10sl', 99, 119, 105, 103, 4813),
('ll10sl', 100, 119, 107, 105, 5795),
('pi11pl', 99, 120, 118, 120, NULL),
('pi11pl', 100, 120, 118, 120, 1472),
('pi12rn', 98, 119, 107, 120, NULL),
('pi12rn', 99, 119, 110, 120, 1342),
('pi12rn', 100, 119, 110, 120, 2815),
('pi13vs', 98, 102, 95, 84, NULL),
('pi13vs', 99, 102, 97, 86, 1342),
('pi13vs', 100, 102, 98, 86, 2815),
('pi14rd', 98, 120, 117, 118, NULL),
('pi14rd', 99, 120, 117, 118, 1342),
('pi14rd', 100, 120, 117, 118, 2815),
('pi15md', 98, 120, 113, 118, NULL),
('pi15md', 99, 120, 115, 118, 1342),
('pi15md', 100, 120, 115, 118, 2815),
('pi16ml', 98, 105, 101, 89, NULL),
('pi16ml', 99, 105, 103, 89, 1342),
('pi16ml', 100, 111, 104, 89, 2815),
('pi17zn', 97, 112, 115, 95, NULL),
('pi17zn', 98, 113, 116, 95, 1076),
('pi17zn', 99, 113, 116, 97, 2419),
('pi17zn', 100, 115, 117, 98, 3891),
('pi18cp', 97, 101, 91, 87, NULL),
('pi18cp', 98, 102, 93, 87, 1076),
('pi18cp', 99, 102, 96, 88, 2419),
('pi18cp', 100, 108, 97, 88, 3891),
('pi19hr', 98, 119, 112, 119, NULL),
('pi19hr', 99, 119, 113, 119, 1342),
('pi19hr', 100, 119, 116, 120, 2815),
('pi20mt', 98, 114, 116, 112, NULL),
('pi20mt', 99, 116, 116, 113, 1342),
('pi20mt', 100, 116, 116, 114, 2815),
('pl21sl', 95, 118, 98, 104, NULL),
('pl21sl', 96, 119, 101, 106, 586),
('pl21sl', 97, 119, 104, 109, 1235),
('pl21sl', 98, 119, 107, 112, 1952),
('pl21sl', 99, 120, 109, 114, 2848),
('pl21sl', 100, 120, 113, 117, 3829),
('pl22db', 93, 107, 110, 99, NULL),
('pl22db', 94, 109, 110, 103, 381),
('pl22db', 95, 113, 112, 104, 812),
('pl22db', 96, 117, 114, 105, 1399),
('pl22db', 97, 118, 114, 107, 2047),
('pl22db', 98, 119, 115, 112, 2765),
('pl22db', 99, 120, 115, 113, 3660),
('pl22db', 100, 120, 117, 115, 4642),
('pl23dg', 93, 68, 71, 49, NULL),
('pl23dg', 94, 70, 73, 49, 381),
('pl23dg', 95, 70, 75, 50, 812),
('pl23dg', 96, 73, 77, 50, 1399),
('pl23dg', 97, 74, 80, 51, 2047),
('pl23dg', 98, 74, 82, 51, 2765),
('pl23dg', 99, 76, 83, 53, 3660),
('pl23dg', 100, 76, 85, 54, 4642),
('pl24hk', 92, 99, 85, 105, NULL),
('pl24hk', 93, 101, 87, 107, 336),
('pl24hk', 94, 102, 91, 109, 717),
('pl24hk', 95, 106, 93, 113, 1149),
('pl24hk', 96, 109, 95, 116, 1735),
('pl24hk', 97, 114, 97, 118, 2384),
('pl24hk', 98, 117, 99, 118, 3101),
('pl24hk', 99, 119, 102, 119, 3997),
('pl24hk', 100, 119, 105, 120, 4978),
('pl25hm', 91, 100, 89, 97, NULL),
('pl25hm', 92, 103, 92, 101, 296),
('pl25hm', 93, 105, 94, 102, 632),
('pl25hm', 94, 108, 97, 105, 1014),
('pl25hm', 95, 111, 100, 107, 1445),
('pl25hm', 96, 114, 103, 111, 2031),
('pl25hm', 97, 116, 106, 114, 2680),
('pl25hm', 98, 118, 109, 116, 3398),
('pl25hm', 99, 118, 112, 117, 4293),
('pl25hm', 100, 118, 114, 119, 5275),
('pl26lk', 90, 89, 79, 96, NULL),
('pl26lk', 91, 93, 79, 98, 260),
('pl26lk', 92, 94, 81, 100, 556),
('pl26lk', 93, 96, 83, 102, 893),
('pl26lk', 94, 97, 87, 104, 1274),
('pl26lk', 95, 101, 89, 108, 1705),
('pl26lk', 96, 104, 91, 112, 2292),
('pl26lk', 97, 109, 92, 115, 2940),
('pl26lk', 98, 112, 95, 117, 3658),
('pl26lk', 99, 114, 98, 117, 4553),
('pl26lk', 100, 117, 101, 118, 5535),
('pl27sa', 92, 102, 85, 102, NULL),
('pl27sa', 93, 104, 87, 105, 336),
('pl27sa', 94, 106, 90, 107, 717),
('pl27sa', 95, 109, 93, 111, 1149),
('pl27sa', 96, 112, 95, 115, 1735),
('pl27sa', 97, 116, 96, 116, 2384),
('pl27sa', 98, 118, 98, 118, 3101),
('pl27sa', 99, 119, 102, 118, 3997),
('pl27sa', 100, 120, 104, 120, 4978),
('pl28ek', 89, 94, 99, 88, NULL),
('pl28ek', 90, 96, 102, 91, 97),
('pl28ek', 91, 98, 105, 93, 357),
('pl28ek', 92, 101, 107, 96, 654),
('pl28ek', 93, 104, 109, 99, 990),
('pl28ek', 94, 106, 113, 102, 1372),
('pl28ek', 95, 110, 113, 104, 1803),
('pl28ek', 96, 113, 114, 107, 2389),
('pl28ek', 97, 115, 116, 110, 3038),
('pl28ek', 98, 119, 117, 112, 3756),
('pl28ek', 99, 120, 117, 114, 4651),
('pl28ek', 100, 120, 117, 116, 5633),
('pl29ds', 89, 96, 93, 82, NULL),
('pl29ds', 90, 98, 97, 83, 97),
('pl29ds', 91, 101, 99, 84, 357),
('pl29ds', 92, 104, 103, 85, 654),
('pl29ds', 93, 108, 103, 88, 990),
('pl29ds', 94, 110, 103, 92, 1372),
('pl29ds', 95, 114, 105, 93, 1803),
('pl29ds', 96, 117, 107, 94, 2389),
('pl29ds', 97, 119, 107, 96, 3038),
('pl29ds', 98, 119, 109, 100, 3756),
('pl29ds', 99, 120, 109, 102, 4651),
('pl29ds', 100, 120, 112, 104, 5633),
('pl30kw', 87, 85, 83, 72, NULL),
('pl30kw', 88, 85, 83, 73, 76),
('pl30kw', 89, 86, 84, 74, 162),
('pl30kw', 90, 88, 86, 74, 260),
('pl30kw', 91, 90, 88, 77, 520),
('pl30kw', 92, 91, 92, 78, 816),
('pl30kw', 93, 95, 94, 82, 1153),
('pl30kw', 94, 96, 98, 84, 1534),
('pl30kw', 95, 99, 99, 85, 1965),
('pl30kw', 96, 101, 105, 89, 2552),
('pl30kw', 97, 103, 105, 90, 3200),
('pl30kw', 98, 106, 108, 90, 3918),
('pl30kw', 99, 107, 111, 91, 4813),
('pl30kw', 100, 111, 112, 92, 5795);

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

DROP TABLE IF EXISTS `clubs`;
CREATE TABLE IF NOT EXISTS `clubs` (
  `club_name` varchar(20) NOT NULL,
  `region` varchar(20) NOT NULL,
  PRIMARY KEY (`club_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`club_name`, `region`) VALUES
('', ''),
('AS Monaco FC SA', 'France'),
('AS Saint-Etienne', 'France'),
('Atletico Madrid', 'Spain'),
('FC Barcelona', 'Spain'),
('Inter', 'Italy'),
('Juventus', 'Italy'),
('Lazio', 'Italy'),
('Liverpool', 'United Kingdom'),
('Manchester City', 'United Kingdom'),
('Manchester United', 'United Kingdom'),
('Marseille', 'France'),
('Napoli', 'Italy'),
('Olympique Lyonnais', 'France'),
('Paris Saint-Germain', 'France'),
('Real Madrid', 'Spain'),
('Roma', 'Italy'),
('Tottenham Hotspur', 'United Kingdom');

-- --------------------------------------------------------

--
-- Table structure for table `fifa_events`
--

DROP TABLE IF EXISTS `fifa_events`;
CREATE TABLE IF NOT EXISTS `fifa_events` (
  `event_name` varchar(20) NOT NULL,
  `launch_date` date DEFAULT NULL,
  PRIMARY KEY (`event_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fifa_events`
--

INSERT INTO `fifa_events` (`event_name`, `launch_date`) VALUES
('Calcio A', '2020-12-15'),
('La Liga', '2020-10-05'),
('Ligue 1', '2020-11-15'),
('Premier League', '2021-01-12'),
('Prime Icons', '2020-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `owned`
--

DROP TABLE IF EXISTS `owned`;
CREATE TABLE IF NOT EXISTS `owned` (
  `fifa_id` varchar(20) NOT NULL,
  `card_id` varchar(20) NOT NULL,
  `lvl` int(11) NOT NULL,
  PRIMARY KEY (`fifa_id`,`card_id`,`lvl`),
  KEY `card_id` (`card_id`,`lvl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owned`
--

INSERT INTO `owned` (`fifa_id`, `card_id`, `lvl`) VALUES
('mike4105', 'lg31nm', 93),
('luis4108', 'lg31nm', 97),
('harv4106', 'lg32ts', 93),
('rach4107', 'lg32ts', 98),
('harv4106', 'lg33km', 94),
('luis4108', 'lg33km', 95),
('harv4106', 'lg35ft', 91),
('John4104', 'lg35ft', 98),
('mike4105', 'lg36fc', 90),
('luis4108', 'lg37lp', 90),
('mike4105', 'lg37lp', 92),
('harv4106', 'lg39md', 89),
('harv4106', 'lg39md', 90),
('John4104', 'll01lm', 95),
('luis4108', 'll01lm', 97),
('harv4106', 'll01lm', 100),
('harv4106', 'll02cr', 95),
('rach4107', 'll02cr', 100),
('luis4108', 'll03sr', 94),
('mike4105', 'll03sr', 96),
('rach4107', 'll05pq', 96),
('harv4106', 'll06ol', 93),
('mike4105', 'll07ja', 91),
('John4104', 'll07ja', 95),
('harv4106', 'll08tk', 97),
('mike4105', 'll09gg', 95),
('rach4107', 'll10sl', 88),
('harv4106', 'pi11pl', 100),
('mike4105', 'pi12rn', 99),
('luis4108', 'pi13vs', 99),
('rach4107', 'pi14rd', 99),
('harv4106', 'pi15md', 98),
('John4104', 'pi15md', 100),
('luis4108', 'pi16ml', 100),
('harv4106', 'pi17zn', 98),
('rach4107', 'pi17zn', 98),
('mike4105', 'pi17zn', 99),
('harv4106', 'pi18cp', 97),
('John4104', 'pi18cp', 100),
('rach4107', 'pi20mt', 98),
('mike4105', 'pi20mt', 99),
('John4104', 'pl23dg', 94),
('John4104', 'pl26lk', 93);

-- --------------------------------------------------------

--
-- Table structure for table `played_in`
--

DROP TABLE IF EXISTS `played_in`;
CREATE TABLE IF NOT EXISTS `played_in` (
  `card_id` varchar(20) NOT NULL,
  `club_name` varchar(20) NOT NULL,
  PRIMARY KEY (`card_id`,`club_name`),
  KEY `club_name` (`club_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `played_in`
--

INSERT INTO `played_in` (`card_id`, `club_name`) VALUES
('pi11pl', ''),
('pi12rn', ''),
('pi13vs', ''),
('pi14rd', ''),
('pi15md', ''),
('pi16ml', ''),
('pi17zn', ''),
('pi18cp', ''),
('pi19hr', ''),
('pi20mt', ''),
('lg36fc', 'AS Monaco FC SA'),
('lg40md', 'AS Saint-Etienne'),
('ll04gm', 'Atletico Madrid'),
('ll06ol', 'Atletico Madrid'),
('ll10sl', 'Atletico Madrid'),
('ll01lm', 'FC Barcelona'),
('ll05pq', 'FC Barcelona'),
('ll07ja', 'FC Barcelona'),
('ll09gg', 'FC Barcelona'),
('cc43mi', 'Inter'),
('cc50sh', 'Inter'),
('cc41pd', 'Juventus'),
('cc45mp', 'Juventus'),
('cc46dc', 'Juventus'),
('cc47hg', 'Juventus'),
('cc49mb', 'Juventus'),
('cc44ci', 'Lazio'),
('pl21sl', 'Liverpool'),
('pl22db', 'Manchester City'),
('pl27sa', 'Manchester City'),
('pl29ds', 'Manchester City'),
('pl30kw', 'Manchester City'),
('pl23dg', 'Manchester United'),
('pl26lk', 'Manchester United'),
('lg35ft', 'Marseille'),
('lg38ar', 'Marseille'),
('cc42kk', 'Napoli'),
('lg37lp', 'Olympique Lyonnais'),
('lg39md', 'Olympique Lyonnais'),
('lg31nm', 'Paris Saint-Germain'),
('lg32ts', 'Paris Saint-Germain'),
('lg33km', 'Paris Saint-Germain'),
('lg34ec', 'Paris Saint-Germain'),
('ll02cr', 'Real Madrid'),
('ll03sr', 'Real Madrid'),
('ll08tk', 'Real Madrid'),
('cc48as', 'Roma'),
('pl24hk', 'Tottenham Hotspur'),
('pl25hm', 'Tottenham Hotspur'),
('pl28ek', 'Tottenham Hotspur');

-- --------------------------------------------------------

--
-- Table structure for table `player_cards`
--

DROP TABLE IF EXISTS `player_cards`;
CREATE TABLE IF NOT EXISTS `player_cards` (
  `card_id` varchar(20) NOT NULL,
  `player_name` varchar(20) NOT NULL,
  `position` char(2) DEFAULT NULL,
  `initial_lvl` int(11) DEFAULT NULL,
  `event_name` varchar(20) DEFAULT NULL,
  `country` varchar(20) NOT NULL,
  PRIMARY KEY (`card_id`),
  KEY `event_name` (`event_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player_cards`
--

INSERT INTO `player_cards` (`card_id`, `player_name`, `position`, `initial_lvl`, `event_name`, `country`) VALUES
('cc41pd', 'Paulo Dybala', 'CM', 93, 'Calcio A', 'Argentina'),
('cc42kk', 'Kalidou Koulibaly', 'CB', 92, 'Calcio A', 'Senegal'),
('cc43mi', 'Mauro Icardi', 'CF', 92, 'Calcio A', 'Argentina'),
('cc44ci', 'Ciro Immobile', 'CF', 91, 'Calcio A', 'Italy'),
('cc45mp', 'Miralem Pjanic', 'CM', 91, 'Calcio A', 'Bosnia Herzegovina'),
('cc46dc', 'Douglas Costa', 'RW', 90, 'Calcio A', 'Brazil'),
('cc47hg', 'Gonzalo Higuain', 'CF', 90, 'Calcio A', 'Argentina'),
('cc48as', 'Alisson', 'GK', 89, 'Calcio A', 'Brazil'),
('cc49mb', 'Medhi Benatia', 'CB', 90, 'Calcio A', 'Morocco'),
('cc50sh', 'Samir Handanovic', 'GK', 89, 'Calcio A', 'Slovenia'),
('lg31nm', 'Neymar', 'LW', 93, 'Ligue 1', 'Brazil'),
('lg32ts', 'Thiago Silva', 'CB', 91, 'Ligue 1', 'Brazil'),
('lg33km', 'Kylian Mbappe', 'RW', 91, 'Ligue 1', 'France'),
('lg34ec', 'Edinson Cavani', 'CF', 91, 'Ligue 1', 'Uruguay'),
('lg35ft', 'Florian Thauvin', 'RM', 90, 'Ligue 1', 'France'),
('lg36fc', 'Falcao', 'CF', 89, 'Ligue 1', 'Colombia'),
('lg37lp', 'Anthony Lopes', 'GK', 88, 'Ligue 1', 'Portugal'),
('lg38ar', 'Adil Rami', 'CB', 86, 'Ligue 1', 'France'),
('lg39md', 'Mathieu Debuchy', 'RB', 89, 'Ligue 1', 'France'),
('lg40md', 'Memphis Depay', 'LW', 92, 'Ligue 1', 'Netherlands'),
('ll01lm', 'Lionel Messi', 'CF', 95, 'La Liga', 'Argentina'),
('ll02cr', 'Christiano Ronaldo', 'CF', 95, 'La Liga', 'Portugal'),
('ll03sr', 'Sergio Ramos', 'CB', 92, 'La Liga', 'Spain'),
('ll04gm', 'Griezmann', 'CF', 92, 'La Liga', 'France'),
('ll05pq', 'Pique', 'CB', 91, 'La Liga', 'Spain'),
('ll06ol', 'Oblak', 'GK', 89, 'La Liga', 'Slovenia'),
('ll07ja', 'Jordi Alba', 'LB', 89, 'La Liga', 'Spain'),
('ll08tk', 'Toni Kroos', 'CM', 93, 'La Liga', 'Germany'),
('ll09gg', 'Luis Suarez', 'CF', 91, 'La Liga', 'Uruguay'),
('ll10sl', 'Saul', 'CM', 87, 'La Liga', 'Spain'),
('pi11pl', 'Pele', 'CF', 99, 'Prime Icons', 'Brazil'),
('pi12rn', 'Ronaldo', 'CF', 98, 'Prime Icons', 'Brazil'),
('pi13vs', 'Van Der Sar', 'GK', 98, 'Prime Icons', 'Netherlands'),
('pi14rd', 'Ronaldinho', 'CM', 98, 'Prime Icons', 'Brazil'),
('pi15md', 'Maradona', 'CM', 98, 'Prime Icons', 'Argentina'),
('pi16ml', 'Maldini', 'CB', 98, 'Prime Icons', 'Italy'),
('pi17zn', 'Zanetti', 'RB', 97, 'Prime Icons', 'Argentina'),
('pi18cp', 'Carles Puyol', 'CB', 97, 'Prime Icons', 'Spain'),
('pi19hr', 'Henry', 'LW', 98, 'Prime Icons', 'France'),
('pi20mt', 'Matthaus', 'CM', 98, 'Prime Icons', 'Germany'),
('pl21sl', 'Salah', 'RW', 95, 'Premier League', 'Egypt'),
('pl22db', 'De Bruyne', 'CM', 93, 'Premier League', 'Belgium'),
('pl23dg', 'De Gea', 'GK', 93, 'Premier League', 'Spain'),
('pl24hk', 'Harry Kane', 'CF', 92, 'Premier League', 'England'),
('pl25hm', 'Heung Min Son', 'LM', 91, 'Premier League', 'Korea Republic'),
('pl26lk', 'Rumelo Lukaku', 'CF', 90, 'Premier League', 'Belgium'),
('pl27sa', 'Sergio Aguero', 'CF', 92, 'Premier League', 'Argentina'),
('pl28ek', 'Christian Eriksen', 'CM', 89, 'Premier League', 'Denmark'),
('pl29ds', 'David Silva', 'CM', 89, 'Premier League', 'Spain'),
('pl30kw', 'Kyle Walker', 'RB', 87, 'Premier League', 'England');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `USER_ID` varchar(20) NOT NULL,
  `PWD` varchar(20) NOT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USER_ID`, `PWD`) VALUES
('ABC', '1234');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `card_lvls`
--
ALTER TABLE `card_lvls`
  ADD CONSTRAINT `card_lvls_ibfk_1` FOREIGN KEY (`card_id`) REFERENCES `player_cards` (`card_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `owned`
--
ALTER TABLE `owned`
  ADD CONSTRAINT `owned_ibfk_1` FOREIGN KEY (`fifa_id`) REFERENCES `accounts` (`fifa_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `owned_ibfk_2` FOREIGN KEY (`card_id`,`lvl`) REFERENCES `card_lvls` (`card_id`, `lvl`) ON UPDATE CASCADE;

--
-- Constraints for table `played_in`
--
ALTER TABLE `played_in`
  ADD CONSTRAINT `played_in_ibfk_1` FOREIGN KEY (`card_id`) REFERENCES `player_cards` (`card_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `played_in_ibfk_2` FOREIGN KEY (`club_name`) REFERENCES `clubs` (`club_name`) ON UPDATE CASCADE;

--
-- Constraints for table `player_cards`
--
ALTER TABLE `player_cards`
  ADD CONSTRAINT `player_cards_ibfk_1` FOREIGN KEY (`event_name`) REFERENCES `fifa_events` (`event_name`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
