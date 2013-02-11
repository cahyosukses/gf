-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 11. Februari 2013 jam 07:09
-- Versi Server: 5.1.41
-- Versi PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

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
(2, 2, 'Greenwich', '2013-02-11 23:02:01', 'Truck'),
(3, 2, 'Brooklyn', '2013-02-11 10:03:19', ''),
(4, 3, 'First', '2013-02-11 09:29:42', ''),
(5, 3, 'Greenwich', '2013-02-11 15:20:12', ''),
(6, 4, 'First', '2013-02-12 00:15:27', ''),
(7, 5, 'First', '2013-02-14 00:44:15', ''),
(8, 6, 'First', '2013-02-11 07:35:25', ''),
(9, 7, 'First', '2013-02-11 16:28:18', ''),
(10, 8, 'First', '2013-02-11 16:52:33', ''),
(11, 8, 'Greenwich', '2013-02-11 08:51:11', ''),
(12, 4, 'Greenwich', '2013-02-11 10:12:32', ''),
(13, 2, 'Park', '2013-02-11 13:24:31', ''),
(14, 3, 'Brooklyn', '2013-02-11 10:35:03', ''),
(15, 3, 'Park', '2013-02-11 21:38:37', ''),
(16, 4, 'Brooklyn', '2013-02-11 10:42:04', ''),
(17, 6, 'Greenwich', '2013-02-11 08:17:25', ''),
(18, 6, 'Brooklyn', '2013-02-11 08:47:34', ''),
(19, 6, 'Park', '2013-02-11 09:50:00', ''),
(20, 2, 'Atlantic', '2013-02-11 11:45:14', ''),
(21, 5, 'Greenwich', '2013-02-11 07:49:42', ''),
(22, 5, 'Brooklyn', '2013-02-11 07:49:57', ''),
(23, 7, 'Greenwich', '2013-02-11 13:51:51', ''),
(24, 8, 'Park', '2013-02-11 10:53:05', ''),
(25, 4, 'Park', '2013-02-11 11:25:47', ''),
(26, 3, 'Atlantic', '2013-02-11 10:49:17', ''),
(27, 4, 'Atlantic', '2013-02-11 07:42:50', '');

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
