-- Adminer 4.8.1 MySQL 8.0.27 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `eslave`;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `slaves`;
CREATE TABLE `slaves` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `slaves` (`id`, `firstname`, `lastname`) VALUES
(1,	'Regaip',	'Eryilmaz'),
(2,	'Gültekin',	'Gönen'),
(3,	'Christophe',	'Kadjo'),
(4,	'Donnel',	'Nkurunziza'),
(5,	'Linh',	'Nguyen'),
(6,	'Shahzad',	'Rahman');

-- 2021-10-22 16:10:56
