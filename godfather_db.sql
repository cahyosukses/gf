-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 20, 2013 at 07:08 AM
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
(1, 2, 'First', '2013-02-20 14:17:49', '5 Production 20 City = 559 | 455'),
(2, 2, 'Greenwich', '2013-02-21 07:33:19', ''),
(3, 2, 'Brooklyn', '2013-02-20 14:30:47', ''),
(4, 3, 'First', '2013-02-20 08:27:30', ''),
(5, 3, 'Greenwich', '2013-02-20 10:08:27', ''),
(6, 4, 'First', '2013-02-20 12:16:12', ''),
(7, 5, 'First', '2013-02-20 11:30:30', ''),
(8, 6, 'First', '2013-02-20 12:54:19', ''),
(9, 7, 'First', '2013-02-20 12:44:19', ''),
(10, 8, 'First', '2013-02-20 16:32:31', ''),
(11, 8, 'Greenwich', '2013-02-20 00:33:58', ''),
(12, 4, 'Greenwich', '2013-02-21 20:35:52', ''),
(13, 2, 'Park', '2013-02-20 12:16:15', ''),
(14, 3, 'Brooklyn', '2013-02-20 07:18:48', ''),
(15, 3, 'Park', '2013-02-21 20:19:47', 'Troop + Defence'),
(16, 4, 'Brooklyn', '2013-02-20 11:01:21', ''),
(17, 6, 'Greenwich', '2013-02-20 08:47:29', ''),
(18, 6, 'Brooklyn', '2013-02-20 16:58:57', ''),
(19, 6, 'Park', '2013-02-20 16:29:12', ''),
(20, 2, 'Atlantic', '2013-02-20 16:16:49', ''),
(21, 5, 'Greenwich', '2013-02-20 16:45:13', ''),
(22, 5, 'Brooklyn', '2013-02-20 16:45:34', ''),
(23, 7, 'Greenwich', '2013-02-20 09:47:39', 'Stay'),
(24, 8, 'Park', '2013-02-20 10:33:25', ''),
(25, 4, 'Park', '2013-02-20 13:21:06', ''),
(26, 3, 'Atlantic', '2013-02-20 14:20:29', ''),
(27, 4, 'Atlantic', '2013-02-20 14:22:06', ''),
(28, 7, 'Brooklyn', '2013-02-20 07:33:15', '');

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
