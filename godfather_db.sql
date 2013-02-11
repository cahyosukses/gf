-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 11, 2013 at 04:41 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `user_id`, `city`, `city_time`, `city_desc`) VALUES
(1, 2, 'First', '2013-02-12 08:08:42', '5 Production 20 City = 559 | 455'),
(2, 2, 'Greenwich', '2013-02-11 23:02:01', 'Truck'),
(3, 2, 'Brooklyn', '2013-02-12 16:20:21', ''),
(4, 3, 'First', '2013-02-12 09:38:49', ''),
(5, 3, 'Greenwich', '2013-02-12 02:06:57', ''),
(6, 4, 'First', '2013-02-12 00:15:27', 'Truck'),
(7, 5, 'First', '2013-02-14 00:44:15', ''),
(8, 6, 'First', '2013-02-12 06:11:27', ''),
(9, 7, 'First', '2013-02-12 02:59:46', ''),
(10, 8, 'First', '2013-02-11 20:40:31', ''),
(11, 8, 'Greenwich', '2013-02-11 20:40:45', ''),
(12, 4, 'Greenwich', '2013-02-13 01:55:34', ''),
(13, 2, 'Park', '2013-02-11 22:50:54', ''),
(14, 3, 'Brooklyn', '2013-02-11 17:27:12', ''),
(15, 3, 'Park', '2013-02-11 21:38:37', ''),
(16, 4, 'Brooklyn', '2013-02-11 18:05:43', ''),
(17, 6, 'Greenwich', '2013-02-11 18:13:06', ''),
(18, 6, 'Brooklyn', '2013-02-11 18:13:08', ''),
(19, 6, 'Park', '2013-02-11 16:48:10', ''),
(20, 2, 'Atlantic', '2013-02-11 20:21:22', ''),
(21, 5, 'Greenwich', '2013-02-11 17:07:38', ''),
(22, 5, 'Brooklyn', '2013-02-11 17:07:55', ''),
(23, 7, 'Greenwich', '2013-02-12 08:08:58', ''),
(24, 8, 'Park', '2013-02-11 20:40:54', ''),
(25, 4, 'Park', '2013-02-11 20:26:25', ''),
(26, 3, 'Atlantic', '2013-02-11 17:07:44', ''),
(27, 4, 'Atlantic', '2013-02-11 20:25:19', '');

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
