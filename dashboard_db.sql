-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 31, 2015 at 12:58 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dashboard_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Friends`
--

CREATE TABLE IF NOT EXISTS `Friends` (
  `friend_1_id` int(12) NOT NULL DEFAULT '0',
  `friend_2_id` int(12) NOT NULL DEFAULT '0',
  `status` enum('1','2','3') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Friends`
--

INSERT INTO `Friends` (`friend_1_id`, `friend_2_id`, `status`) VALUES
(1, 1, '2'),
(2, 1, '1'),
(2, 2, '2'),
(3, 1, '3'),
(3, 2, '1'),
(3, 3, '2'),
(4, 1, '3'),
(4, 4, '2');

-- --------------------------------------------------------

--
-- Table structure for table `Likes`
--

CREATE TABLE IF NOT EXISTS `Likes` (
  `user_id` int(12) NOT NULL,
  `post_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Likes`
--

INSERT INTO `Likes` (`user_id`, `post_id`) VALUES
(1, 2),
(2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `Posts`
--

CREATE TABLE IF NOT EXISTS `Posts` (
  `post_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `caption` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_public` tinyint(1) DEFAULT '0',
  `post_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Posts`
--

INSERT INTO `Posts` (`post_id`, `user_id`, `caption`, `image`, `is_public`, `post_date`) VALUES
(1, 1, 'hello am Yehia Arafa ', '', 0, '2015-12-30 23:43:37'),
(2, 2, 'hello am loay :D', '', 0, '2015-12-30 23:45:03'),
(12, 1, 'Yehia Arafa changed his profile pic', '568509afcbaab7.21430413.jpg', 0, '2015-12-31 10:55:43'),
(16, 2, 'Loay Yousry changed his profile pic', '568511c49ae318.73376092.jpg', 0, '2015-12-31 11:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL,
  `website_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `website_logo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `website_defaultlang` varchar(255) CHARACTER SET utf8 NOT NULL,
  `website_theme` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_title`, `website_logo`, `website_defaultlang`, `website_theme`, `email`) VALUES
(1, 'THESOCIALS', '', 'en', 'Black', '');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `user_id` int(12) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` int(1) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `home_town` varchar(255) NOT NULL,
  `about_me` varchar(20000) NOT NULL,
  `martial_status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `first_name`, `last_name`, `gender`, `password`, `email`, `phone_number`, `birthdate`, `profile_pic`, `home_town`, `about_me`, `martial_status`) VALUES
(1, 'Yehia', 'Arafa', 1, '$2y$10$QrOjOLlkK.ft8AM9zJFaZ.U8UCc39l8X0w9gpUotO8rZngBCLRIja', 'yehia@mail.om', '0128', '1993-02-23', '568509afcbaab7.21430413.jpg', 'alexandria', 'ninja', 'Engaged'),
(2, 'Loay', 'Yousry', 1, '$2y$10$SFEa4e6OBzQUSh/Orf8D2.2LIfsuLALlIiDdGDNcQt9NVJAdp7enK', 'loay@mail.com', NULL, '1994-12-11', '568511c49ae318.73376092.jpg', '', '', ''),
(3, 'Ahmed', 'Reda', 1, '$2y$10$LIQGYivDxd4mf46Haev8L.rWrY7U0aT1YCgVXPMMEsA6bZbxSqs2G', 'reda@mail.com', NULL, '1993-02-04', '56846ffbadbca8.43857967.jpg', '', '', ''),
(4, 'Adham', 'Amr', 1, '$2y$10$xmPK9NMhje5k6fB18wFvRONlMoLrBYmJxTPirLcJYYEXr4kp9HCo.', 'doma@mail.com', NULL, '1993-04-05', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Friends`
--
ALTER TABLE `Friends`
  ADD PRIMARY KEY (`friend_1_id`,`friend_2_id`),
  ADD KEY `friend_id_2` (`friend_2_id`);

--
-- Indexes for table `Likes`
--
ALTER TABLE `Likes`
  ADD PRIMARY KEY (`user_id`,`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `Posts`
--
ALTER TABLE `Posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Posts`
--
ALTER TABLE `Posts`
  MODIFY `post_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Friends`
--
ALTER TABLE `Friends`
  ADD CONSTRAINT `Friends_ibfk_1` FOREIGN KEY (`friend_1_id`) REFERENCES `Users` (`user_id`),
  ADD CONSTRAINT `Friends_ibfk_2` FOREIGN KEY (`friend_2_id`) REFERENCES `Users` (`user_id`);

--
-- Constraints for table `Likes`
--
ALTER TABLE `Likes`
  ADD CONSTRAINT `Likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`),
  ADD CONSTRAINT `Likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `Posts` (`post_id`);

--
-- Constraints for table `Posts`
--
ALTER TABLE `Posts`
  ADD CONSTRAINT `Posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
