-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2016 at 12:13 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lounge_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories_of_interests`
--

CREATE TABLE IF NOT EXISTS `categories_of_interests` (
  `categ_id` int(11) NOT NULL,
  `categ_name` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories_of_interests`
--

INSERT INTO `categories_of_interests` (`categ_id`, `categ_name`) VALUES
(1, 'Food'),
(2, 'Location');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(11) NOT NULL,
  `title` varchar(256) CHARACTER SET latin1 NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `title`, `date`, `time`) VALUES
(1, 'Soup day near UPT', '2016-05-04', '11:11:00'),
(2, 'Pizza @ Bastion', '2016-05-18', '12:00:00'),
(3, 'Vegetarian food ', '2016-05-19', '12:00:00'),
(4, 'Healthy food', '2016-05-18', '12:00:00'),
(5, 'Grandma''s house lunch', '2016-05-18', '12:00:00'),
(6, 'King''s lunch', '2016-05-19', '11:00:00'),
(7, 'New colleague celebration @ UP ', '2016-05-19', '11:00:00'),
(8, 'Salad at saladbox', '2016-05-31', '12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `events_interests`
--

CREATE TABLE IF NOT EXISTS `events_interests` (
  `event_id` int(11) NOT NULL,
  `interest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events_interests`
--

INSERT INTO `events_interests` (`event_id`, `interest_id`) VALUES
(2, 1),
(3, 3),
(4, 3),
(3, 5),
(4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `events_users`
--

CREATE TABLE IF NOT EXISTS `events_users` (
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events_users`
--

INSERT INTO `events_users` (`event_id`, `user_id`) VALUES
(2, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE IF NOT EXISTS `interests` (
  `interest_id` int(11) NOT NULL,
  `interest_name` varchar(32) NOT NULL,
  `categ_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`interest_id`, `interest_name`, `categ_id`) VALUES
(1, 'pizza', 1),
(2, 'soup', 1),
(3, 'vegetarian', 1),
(4, 'meat', 1),
(5, 'salad', 1),
(6, 'fast-food', 1),
(7, 'beer', 1),
(8, 'Bega shore', 2),
(9, 'Mall', 2),
(10, 'Pta Unirii', 2),
(11, 'Pta Libertatii', 2),
(12, 'Botanic Park', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `categ_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `categ_id`, `username`, `password`, `first_name`, `last_name`, `email`, `active`) VALUES
(1, 1, 'larisa', '16ea14e810c37b375cfadc10b8cedbb5', 'Larisa ', 'Tranca', 'lari@lari.com', 1),
(2, 2, 'radu', '9a1f59f5e7f5fd82cd23927e456cefd1', 'Radu', 'Arcan', 'alex@alex.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_interests`
--

CREATE TABLE IF NOT EXISTS `users_interests` (
  `user_id` int(11) NOT NULL,
  `interest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_interests`
--

INSERT INTO `users_interests` (`user_id`, `interest_id`) VALUES
(1, 1),
(2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories_of_interests`
--
ALTER TABLE `categories_of_interests`
  ADD PRIMARY KEY (`categ_id`), ADD KEY `categ_id` (`categ_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`), ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `events_interests`
--
ALTER TABLE `events_interests`
  ADD PRIMARY KEY (`event_id`,`interest_id`), ADD KEY `interest_id` (`interest_id`), ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `events_users`
--
ALTER TABLE `events_users`
  ADD PRIMARY KEY (`event_id`,`user_id`), ADD KEY `user_id` (`user_id`), ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`interest_id`,`categ_id`), ADD KEY `interest_id` (`interest_id`), ADD KEY `categ_id` (`categ_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`,`categ_id`), ADD KEY `categ_id` (`categ_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users_interests`
--
ALTER TABLE `users_interests`
  ADD PRIMARY KEY (`user_id`,`interest_id`), ADD KEY `interest_id` (`interest_id`), ADD KEY `user_id` (`user_id`,`interest_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories_of_interests`
--
ALTER TABLE `categories_of_interests`
  MODIFY `categ_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `interest_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories_of_interests`
--
ALTER TABLE `categories_of_interests`
ADD CONSTRAINT `categories_of_interests_ibfk_1` FOREIGN KEY (`categ_id`) REFERENCES `users` (`categ_id`),
ADD CONSTRAINT `categories_of_interests_ibfk_2` FOREIGN KEY (`categ_id`) REFERENCES `interests` (`categ_id`);

--
-- Constraints for table `events_interests`
--
ALTER TABLE `events_interests`
ADD CONSTRAINT `events_interests_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`),
ADD CONSTRAINT `events_interests_ibfk_2` FOREIGN KEY (`interest_id`) REFERENCES `interests` (`interest_id`);

--
-- Constraints for table `events_users`
--
ALTER TABLE `events_users`
ADD CONSTRAINT `events_users_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`),
ADD CONSTRAINT `events_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users_interests`
--
ALTER TABLE `users_interests`
ADD CONSTRAINT `users_interests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
ADD CONSTRAINT `users_interests_ibfk_2` FOREIGN KEY (`interest_id`) REFERENCES `interests` (`interest_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
