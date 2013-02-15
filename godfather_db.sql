-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 15. Februari 2013 jam 08:01
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
(1, 2, 'First', '2013-02-15 08:46:04', '5 Production 20 City = 559 | 455'),
(2, 2, 'Greenwich', '2013-02-16 10:54:06', ''),
(3, 2, 'Brooklyn', '2013-02-15 15:41:16', ''),
(4, 3, 'First', '2013-02-15 20:53:27', ''),
(5, 3, 'Greenwich', '2013-02-15 23:07:22', ''),
(6, 4, 'First', '2013-02-15 13:58:28', ''),
(7, 5, 'First', '2013-02-15 18:29:47', ''),
(8, 6, 'First', '2013-02-16 18:34:11', ''),
(9, 7, 'First', '2013-02-15 10:42:31', ''),
(10, 8, 'First', '2013-02-15 10:43:59', ''),
(11, 8, 'Greenwich', '2013-02-15 13:13:13', ''),
(12, 4, 'Greenwich', '2013-02-15 12:22:55', ''),
(13, 2, 'Park', '2013-02-15 08:48:26', ''),
(14, 3, 'Brooklyn', '2013-02-15 10:30:52', ''),
(15, 3, 'Park', '2013-02-15 22:02:10', ''),
(16, 4, 'Brooklyn', '2013-02-15 10:35:12', ''),
(17, 6, 'Greenwich', '2013-02-15 10:38:56', ''),
(18, 6, 'Brooklyn', '2013-02-15 08:15:59', ''),
(19, 6, 'Park', '2013-02-15 10:40:04', ''),
(20, 2, 'Atlantic', '2013-02-15 09:08:49', ''),
(21, 5, 'Greenwich', '2013-02-15 09:06:57', ''),
(22, 5, 'Brooklyn', '2013-02-15 21:02:02', ''),
(23, 7, 'Greenwich', '2013-02-15 11:00:41', ''),
(24, 8, 'Park', '2013-02-15 10:54:37', ''),
(25, 4, 'Park', '2013-02-15 09:15:44', ''),
(26, 3, 'Atlantic', '2013-02-15 22:02:46', ''),
(27, 4, 'Atlantic', '2013-02-15 09:56:04', '');

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
