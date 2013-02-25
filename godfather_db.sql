-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 25, 2013 at 07:23 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `godfather_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `city_time` datetime NOT NULL,
  `city_desc` varchar(255) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `user_id`, `city`, `city_time`, `city_desc`) VALUES
(1, 2, 'First', '2013-02-26 09:20:52', '5 Production 20 City = 559 | 455'),
(2, 2, 'Greenwich', '2013-02-25 19:04:16', ''),
(3, 2, 'Brooklyn', '2013-02-26 04:07:18', ''),
(4, 3, 'First', '2013-02-25 09:21:02', ''),
(5, 3, 'Greenwich', '2013-02-25 17:29:14', ''),
(6, 4, 'First', '2013-02-25 14:24:59', ''),
(7, 5, 'First', '2013-02-25 07:16:59', ''),
(8, 6, 'First', '2013-02-26 19:16:05', ''),
(9, 7, 'First', '2013-02-25 08:58:18', ''),
(10, 8, 'First', '2013-02-25 16:35:03', ''),
(11, 8, 'Greenwich', '2013-02-25 11:04:42', ''),
(12, 4, 'Greenwich', '2013-02-26 18:55:35', ''),
(13, 2, 'Park', '2013-02-26 18:39:21', ''),
(14, 3, 'Brooklyn', '2013-02-25 10:24:30', ''),
(15, 3, 'Park', '2013-02-26 12:51:33', ''),
(16, 4, 'Brooklyn', '2013-02-25 17:25:05', ''),
(17, 6, 'Greenwich', '2013-02-25 16:29:32', ''),
(18, 6, 'Brooklyn', '2013-02-25 10:29:50', ''),
(19, 6, 'Park', '2013-02-25 08:10:14', ''),
(20, 2, 'Atlantic', '2013-02-25 08:25:58', ''),
(21, 5, 'Greenwich', '2013-02-25 10:57:51', ''),
(22, 5, 'Brooklyn', '2013-02-25 10:57:53', ''),
(23, 7, 'Greenwich', '2013-02-25 10:52:03', ''),
(24, 8, 'Brooklyn', '2013-02-25 06:57:52', 'Apartment'),
(25, 4, 'Park', '2013-02-25 08:26:16', ''),
(26, 3, 'Atlantic', '2013-02-25 14:24:32', ''),
(27, 4, 'Atlantic', '2013-02-25 08:26:18', 'Apartment'),
(28, 7, 'Brooklyn', '2013-02-25 10:49:04', ''),
(29, 8, 'Park', '2013-02-25 16:35:33', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_display` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_pass`, `user_display`) VALUES
(2, 'her0satr@gmail.com', 'qwertyui', 'Trooper'),
(3, 'her0satr@yahoo.com', 'qwertyui', 'Cocout'),
(4, 'donkey.trooper@gmail.com', 'qwertyui2011', 'Donkey G'),
(5, 'kepetet@gmail.com', 'qwertyui', 'Kepetet'),
(6, 'bungalowq@ymail.com', '4532&^145', 'Bunga Low'),
(7, 'makinbunawas@yahoo.com', 'jasd%^521aa', 'Bunawas'),
(8, 'dunkomp@gmail.com', 'qwertyui', 'Don Comp');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
