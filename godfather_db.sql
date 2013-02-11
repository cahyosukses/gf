-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 12. Februari 2013 jam 06:47
-- Versi Server: 5.1.41
-- Versi PHP: 5.3.1

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
-- Struktur dari tabel `city`
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
-- Dumping data untuk tabel `city`
--

INSERT INTO `city` (`city_id`, `user_id`, `city`, `city_time`, `city_desc`) VALUES
(1, 2, 'First', '2013-02-12 08:08:42', '5 Production 20 City = 559 | 455'),
(2, 2, 'Greenwich', '2013-02-12 07:41:13', 'Truck'),
(3, 2, 'Brooklyn', '2013-02-12 16:20:21', ''),
(4, 3, 'First', '2013-02-12 09:38:49', ''),
(5, 3, 'Greenwich', '2013-02-12 16:15:09', ''),
(6, 4, 'First', '2013-02-14 00:58:43', 'Truck'),
(7, 5, 'First', '2013-02-14 00:44:15', ''),
(8, 6, 'First', '2013-02-12 23:24:48', ''),
(9, 7, 'First', '2013-02-12 16:22:04', ''),
(10, 8, 'First', '2013-02-12 16:02:17', ''),
(11, 8, 'Greenwich', '2013-02-12 14:00:57', ''),
(12, 4, 'Greenwich', '2013-02-13 01:55:34', ''),
(13, 2, 'Park', '2013-02-12 15:34:44', ''),
(14, 3, 'Brooklyn', '2013-02-12 16:28:59', ''),
(15, 3, 'Park', '2013-02-13 22:06:49', ''),
(16, 4, 'Brooklyn', '2013-02-12 16:15:29', ''),
(17, 6, 'Greenwich', '2013-02-12 09:33:35', ''),
(18, 6, 'Brooklyn', '2013-02-12 16:24:19', ''),
(19, 6, 'Park', '2013-02-12 09:33:41', ''),
(20, 2, 'Atlantic', '2013-02-12 09:58:58', ''),
(21, 5, 'Greenwich', '2013-02-12 10:33:06', ''),
(22, 5, 'Brooklyn', '2013-02-12 09:43:24', ''),
(23, 7, 'Greenwich', '2013-02-12 08:08:58', ''),
(24, 8, 'Park', '2013-02-12 10:00:16', 'Troop'),
(25, 4, 'Park', '2013-02-12 08:47:02', ''),
(26, 3, 'Atlantic', '2013-02-12 06:45:51', ''),
(27, 4, 'Atlantic', '2013-02-12 08:15:32', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_display` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `user`
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
