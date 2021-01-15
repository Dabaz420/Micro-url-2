-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `micro-url` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `micro-url`;

CREATE TABLE `assoc_url_mot-cle` (
  `id_assoc` int NOT NULL AUTO_INCREMENT,
  `id_url` int NOT NULL,
  `id_mot_cle` int NOT NULL,
  PRIMARY KEY (`id_assoc`),
  KEY `id_url` (`id_url`),
  KEY `id_mot-cle` (`id_mot_cle`),
  CONSTRAINT `assoc_url_mot-cle_ibfk_1` FOREIGN KEY (`id_url`) REFERENCES `url` (`url_id`),
  CONSTRAINT `assoc_url_mot-cle_ibfk_2` FOREIGN KEY (`id_mot_cle`) REFERENCES `mot_cle` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `assoc_url_mot-cle` (`id_assoc`, `id_url`, `id_mot_cle`) VALUES
(1,	1,	1),
(2,	2,	2),
(3,	3,	3),
(4,	3,	4),
(7,	17,	24);

CREATE TABLE `mot_cle` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mot_cle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `mot_cle` (`id`, `mot_cle`) VALUES
(1,	'Premier mot cle'),
(2,	'Deusieme mot clef'),
(3,	'Troiseme mot cle'),
(4,	'Dernier mot cle'),
(20,	'Encore un mot cle mais modifié'),
(24,	'piratage');

CREATE TABLE `url` (
  `url_id` int NOT NULL AUTO_INCREMENT,
  `url_lien` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `shortcut` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `url_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`url_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `url` (`url_id`, `url_lien`, `shortcut`, `datetime`, `url_description`) VALUES
(1,	'url.exemple1.xyz',	'url1.xyz',	'2021-01-06 15:25:03',	'Exemple 1'),
(2,	'url.exemple2.xyz',	'url2.xyz',	'2021-01-06 15:30:02',	'Exemple 2\r\n'),
(3,	'url.exemple3.xyz',	'url3.xyz',	'2021-01-06 15:31:00',	'Exemple 3'),
(17,	'https://www.zataz.com/total-energie-direct-obligee-de-stopper-un-jeu-en-ligne-suite-a-une-fuite-de-donnees/',	'ztz7',	'2021-01-15 10:40:24',	'L\'entreprise Total Energie Direct avait lancé un jeu en ligne. Le concours a dû être stoppé. Il était possible d\'accéder aux données des autres joueurs.');

-- 2021-01-15 12:28:04
