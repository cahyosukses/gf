-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 19, 2013 at 04:41 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `user_id`, `city`, `city_time`, `city_desc`) VALUES
(1, 2, 'First', '2013-02-19 18:00:39', '5 Production 20 City = 559 | 455'),
(2, 2, 'Greenwich', '2013-02-19 18:52:51', ''),
(3, 2, 'Brooklyn', '2013-02-19 18:59:29', ''),
(4, 3, 'First', '2013-02-19 17:03:10', ''),
(5, 3, 'Greenwich', '2013-02-19 18:32:33', ''),
(6, 4, 'First', '2013-02-19 20:57:25', ''),
(7, 5, 'First', '2013-02-20 11:30:30', ''),
(8, 6, 'First', '2013-02-20 12:54:19', ''),
(9, 7, 'First', '2013-02-19 22:15:41', ''),
(10, 8, 'First', '2013-02-19 17:12:44', ''),
(11, 8, 'Greenwich', '2013-02-20 00:33:58', ''),
(12, 4, 'Greenwich', '2013-02-22 04:26:17', 'Troop + Defence'),
(13, 2, 'Park', '2013-02-19 20:40:55', ''),
(14, 3, 'Brooklyn', '2013-02-19 18:17:25', ''),
(15, 3, 'Park', '2013-02-19 23:39:19', ''),
(16, 4, 'Brooklyn', '2013-02-19 17:05:55', 'Troop'),
(17, 6, 'Greenwich', '2013-02-19 19:21:36', ''),
(18, 6, 'Brooklyn', '2013-02-20 02:30:17', ''),
(19, 6, 'Park', '2013-02-19 17:46:56', ''),
(20, 2, 'Atlantic', '2013-02-20 02:41:44', ''),
(21, 5, 'Greenwich', '2013-02-19 18:08:13', ''),
(22, 5, 'Brooklyn', '2013-02-19 17:07:36', ''),
(23, 7, 'Greenwich', '2013-02-19 22:35:24', 'Stay'),
(24, 8, 'Park', '2013-02-19 20:33:21', ''),
(25, 4, 'Park', '2013-02-20 13:21:06', ''),
(26, 3, 'Atlantic', '2013-02-19 17:14:40', ''),
(27, 4, 'Atlantic', '2013-02-19 20:24:56', ''),
(28, 7, 'Brooklyn', '2013-02-19 17:05:13', '');

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
