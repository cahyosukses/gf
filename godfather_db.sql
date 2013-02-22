-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 22, 2013 at 07:17 AM
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
(1, 2, 'First', '2013-02-22 13:09:12', '5 Production 20 City = 559 | 455'),
(2, 2, 'Greenwich', '2013-02-21 23:26:02', ''),
(3, 2, 'Brooklyn', '2013-02-23 13:55:00', ''),
(4, 3, 'First', '2013-02-22 18:11:06', ''),
(5, 3, 'Greenwich', '2013-02-22 18:11:21', ''),
(6, 4, 'First', '2013-02-23 00:31:00', ''),
(7, 5, 'First', '2013-02-23 00:48:04', ''),
(8, 6, 'First', '2013-02-23 18:52:53', ''),
(9, 7, 'First', '2013-02-23 03:36:49', 'Truck'),
(10, 8, 'First', '2013-02-22 09:10:33', ''),
(11, 8, 'Greenwich', '2013-02-22 10:54:21', 'Apartment'),
(12, 4, 'Greenwich', '2013-02-24 11:28:15', ''),
(13, 2, 'Park', '2013-02-22 01:22:30', ''),
(14, 3, 'Brooklyn', '2013-02-22 09:44:45', ''),
(15, 3, 'Park', '2013-02-24 03:46:44', ''),
(16, 4, 'Brooklyn', '2013-02-22 07:53:08', ''),
(17, 6, 'Greenwich', '2013-02-22 16:21:57', ''),
(18, 6, 'Brooklyn', '2013-02-22 07:32:52', ''),
(19, 6, 'Park', '2013-02-22 16:23:54', ''),
(20, 2, 'Atlantic', '2013-02-22 16:48:10', ''),
(21, 5, 'Greenwich', '2013-02-22 16:38:58', ''),
(22, 5, 'Brooklyn', '2013-02-22 16:38:59', ''),
(23, 7, 'Greenwich', '2013-02-22 09:00:41', 'Apartment'),
(24, 8, 'Brooklyn', '2013-02-22 07:43:50', 'Apartment'),
(25, 4, 'Park', '2013-02-22 17:17:33', 'Apartment'),
(26, 3, 'Atlantic', '2013-02-22 10:35:06', 'Apartment'),
(27, 4, 'Atlantic', '2013-02-22 10:29:59', 'Apartment'),
(28, 7, 'Brooklyn', '2013-02-22 07:45:45', 'Apartment'),
(29, 8, 'Park', '2013-02-22 16:13:44', '');

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
