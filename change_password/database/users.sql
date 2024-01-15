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
  `useremail` varchar(50) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

INSERT INTO `users` (`userid`, `username`, `useremail`, `userpassword`, `role`) VALUES
(1,	'Ahmet Yılmaz',	'ahmet@gmail.com',	'$2y$10$3SYvQjQ03DuSHGgQr2JaMeiq2kwHLTw4xhr5ikZdBgIKxvJi6T6Xm',	1),
(2,	'Admin',	'admin@gmail.com',	'$2y$10$1AalO3knGJT2tteXLd3lZuRvXbxXLSOGcXwQvf8ZMwTKPeFSBmHVW',	2);

-- 2023-11-09 09:49:02
