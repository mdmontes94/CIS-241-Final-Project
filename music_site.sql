-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 19, 2024 at 06:19 PM
-- Server version: 5.7.40
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
CREATE TABLE IF NOT EXISTS `albums` (
  `album_id` int(3) NOT NULL AUTO_INCREMENT,
  `album_title` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist_id` int(3) NOT NULL,
  `genre_id` int(3) DEFAULT NULL,
  `year_released` year(4) DEFAULT NULL,
  PRIMARY KEY (`album_id`),
  KEY `fk_art_id` (`artist_id`),
  KEY `fk_gen_id` (`genre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`album_id`, `album_title`, `artist_id`, `genre_id`, `year_released`) VALUES
(1, 'The Rise and Fall of a Midwest Princess', 6, 1, 2023),
(2, 'Why Lawd?', 10, 2, 2024),
(3, 'Define the Great Line', 1, 3, 2006),
(4, 'Black Messiah', 2, 4, 2014),
(5, 'Because the Internet', 4, 2, 2013),
(6, 'Atavista', 4, 2, 2024),
(7, 'This Is Why', 3, 5, 2023),
(8, 'So Much (for) Stardust', 8, 5, 2023),
(9, 'Blonde', 9, 1, 2016),
(10, 'In Return', 7, 7, 2014),
(11, 'Bon Iver, Bon Iver', 5, 5, 2011);

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

DROP TABLE IF EXISTS `artists`;
CREATE TABLE IF NOT EXISTS `artists` (
  `artist_id` int(3) NOT NULL AUTO_INCREMENT,
  `artist_name` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`artist_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`artist_id`, `artist_name`) VALUES
(1, 'Underoath'),
(2, 'D\'Angelo and The Vanguard'),
(3, 'Paramore'),
(4, 'Childish Gambino'),
(5, 'Bon Iver'),
(6, 'Chappell Roan'),
(7, 'ODESZA'),
(8, 'Fall Out Boy'),
(9, 'Frank Ocean'),
(10, 'NxWorries'),
(11, 'The Beatles'),
(12, 'Tyler, The Creator');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `genre_id` int(11) NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genre_id`, `genre_name`) VALUES
(1, 'Pop'),
(2, 'Hip-Hop/Rap'),
(3, 'Metal'),
(4, 'R&B/Soul'),
(5, 'Alternative'),
(6, 'Rock'),
(7, 'Electronic');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

DROP TABLE IF EXISTS `songs`;
CREATE TABLE IF NOT EXISTS `songs` (
  `song_id` int(3) NOT NULL AUTO_INCREMENT,
  `song_title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist_id` int(3) NOT NULL,
  `album_id` int(3) DEFAULT NULL,
  `genre_id` int(3) DEFAULT NULL,
  `length` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_released` year(4) DEFAULT NULL,
  PRIMARY KEY (`song_id`),
  KEY `fk_art_id` (`artist_id`),
  KEY `fk_gen_id` (`genre_id`),
  KEY `fk_alb_id` (`album_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`song_id`, `song_title`, `artist_id`, `album_id`, `genre_id`, `length`, `year_released`) VALUES
(1, 'Red Wine Supernova', 6, 1, 1, '3:12', 2023),
(2, 'Coffee', 6, 1, 1, '3:25', 2023),
(3, 'Casual', 6, 1, 1, '3:52', 2023),
(4, 'My Kink Is Karma', 6, 1, 1, '3:42', 2023),
(5, 'Distractions', 10, 2, 2, '1:49', 2024),
(9, 'A Moment Suspended In Time', 1, 3, 3, '3:59', 2006),
(7, 'Where I Go (feat. H.E.R.)', 10, 2, 2, '3:18', 2024),
(8, 'Daydreaming', 10, 2, 2, '3:01', 2024),
(10, 'You\'re Ever So Inviting', 1, 3, 3, '4:13', 2006),
(11, 'Moving for the Sake of Motion', 1, 3, 3, '3:15', 2006),
(12, 'Writing On The Walls', 1, 3, 3, '4:02', 2006),
(13, 'Everyone Looks So Good From Here', 1, 3, 3, '2:56', 2006),
(15, 'The Charade', 2, 4, 4, '3:20', 2014),
(16, 'Really Love', 2, 4, 4, '5:44', 2014),
(17, 'Another Life', 2, 4, 4, '5:58', 2014),
(18, 'II. Worldstar', 4, 5, 2, '4:04', 2013),
(19, 'III. Telegraph Ave. (\"Oakland\" by Lloyd)', 4, 5, 2, '3:30', 2013),
(20, 'I. Flight of the Navigator', 4, 5, 2, '5:44', 2013),
(21, 'I. Pink Toes (feat. Jhené Aiko)', 4, 5, 2, '4:04', 2013),
(22, 'III. Life: The Biggest Troll (Andrew Auernheimer)', 4, 5, 2, '5:42', 2013),
(23, 'Atavista', 4, 6, 2, '3:01', 2024),
(24, 'Sweet Thang (feat. Summer Walker)', 4, 6, 2, '7:05', 2024),
(25, 'Final Church', 4, 6, 2, '3:46', 2024),
(26, 'Running Out Of Time', 3, 7, 5, '3:12', 2023),
(27, 'Figure 8', 3, 7, 5, '3:24', 2023),
(28, 'Crave', 3, 7, 5, '3:55', 2023),
(29, 'Love From The Other Side', 8, 8, 5, '4:39', 2023),
(30, 'Heartbreak Feels So Good', 8, 8, 5, '3:37', 2023),
(31, 'Flu Game', 8, 8, 5, '3:37', 2023),
(32, 'What a Time To Be Alive', 8, 8, 5, '3:42', 2023),
(33, 'Pink + White', 9, 9, 1, '3:04', 2016),
(34, 'Self Control', 9, 9, 1, '4:09', 2016),
(35, 'Nights', 9, 9, 1, '5:07', 2016),
(36, 'All We Need (feat. Shy Girls)', 7, 10, 7, '3:31', 2014),
(37, 'White Lies', 7, 10, 7, '4:37', 2014),
(38, 'It\'s Only (feat. Zyra)', 7, 10, 7, '4:28', 2014),
(39, 'Minnesota, WI', 5, 11, 5, '3:52', 2011),
(40, 'Holocene', 5, 11, 5, '5:36', 2011),
(41, 'Michichant', 5, 11, 5, '3:45', 2011),
(42, 'Wash.', 5, 11, 5, '4:58', 2011);

-- --------------------------------------------------------

--
-- Stand-in structure for view `songs_view`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `songs_view`;
CREATE TABLE IF NOT EXISTS `songs_view` (
`song_id` int(3)
,`song_title` varchar(50)
,`artist_id` int(3)
,`artist_name` varchar(75)
,`album_id` int(3)
,`album_title` varchar(75)
,`genre_id` int(3)
,`genre_name` varchar(50)
,`length` varchar(10)
,`year_released` year(4)
);

-- --------------------------------------------------------

--
-- Structure for view `songs_view`
--
DROP TABLE IF EXISTS `songs_view`;

DROP VIEW IF EXISTS `songs_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `songs_view`  AS SELECT `s`.`song_id` AS `song_id`, `s`.`song_title` AS `song_title`, `s`.`artist_id` AS `artist_id`, `ar`.`artist_name` AS `artist_name`, `s`.`album_id` AS `album_id`, `a`.`album_title` AS `album_title`, `s`.`genre_id` AS `genre_id`, `g`.`genre_name` AS `genre_name`, `s`.`length` AS `length`, `s`.`year_released` AS `year_released` FROM (((`songs` `s` left join `albums` `a` on((`s`.`album_id` = `a`.`album_id`))) left join `genres` `g` on((`s`.`genre_id` = `g`.`genre_id`))) left join `artists` `ar` on((`s`.`artist_id` = `ar`.`artist_id`)))  ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

GRANT SELECT, INSERT, DELETE, UPDATE
ON music_site.*
TO AHon209@localhost
IDENTIFIED BY '5outh3ast';
