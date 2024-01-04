-- Adminer 4.8.1 MySQL 5.5.5-10.4.27-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

INSERT INTO `users` (`userid`, `username`, `email`) VALUES
(1,	'Kaan Kaltakkıran',	'kaan_fb_aslan@hotmail.com'),
(2,	'Ayşe Yılmaz',	'ayse@gmail.com'),
(3,	'Veli Baba',	'veli@gmail.com'),
(4,	'Ahmet Yılmaz',	'ahmet@gmail.com');

-- 2024-01-04 07:24:17
