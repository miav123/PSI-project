-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 02, 2022 at 09:42 PM
-- Server version: 8.0.20
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `in_corpore_sano`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_kor` int NOT NULL,
  PRIMARY KEY (`id_kor`),
  UNIQUE KEY `idKor_UNIQUE` (`id_kor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_kor`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `bedz`
--

DROP TABLE IF EXISTS `bedz`;
CREATE TABLE IF NOT EXISTS `bedz` (
  `id_bedz` int NOT NULL AUTO_INCREMENT,
  `ime` varchar(45) NOT NULL,
  `opis` varchar(200) NOT NULL,
  `tip` varchar(50) NOT NULL,
  `br_izazova` int NOT NULL,
  PRIMARY KEY (`id_bedz`),
  UNIQUE KEY `id_bedz_UNIQUE` (`id_bedz`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bedz`
--

INSERT INTO `bedz` (`id_bedz`, `ime`, `opis`, `tip`, `br_izazova`) VALUES
(1, 'Completed first challenge', 'ckjsdsjvhvhhdvkjjkjkdljkdvsjjl;ksd', 'water', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bedz_unos_hrane`
--

DROP TABLE IF EXISTS `bedz_unos_hrane`;
CREATE TABLE IF NOT EXISTS `bedz_unos_hrane` (
  `id_bedz` int NOT NULL,
  `kolicina_kcal` int NOT NULL,
  PRIMARY KEY (`id_bedz`),
  UNIQUE KEY `id_bedz_UNIQUE` (`id_bedz`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bedz_unos_trening`
--

DROP TABLE IF EXISTS `bedz_unos_trening`;
CREATE TABLE IF NOT EXISTS `bedz_unos_trening` (
  `id_bedz` int NOT NULL,
  `idTipTren` int NOT NULL,
  `vreme_tren` int NOT NULL,
  PRIMARY KEY (`id_bedz`),
  UNIQUE KEY `id_bedz_UNIQUE` (`id_bedz`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bedz_unos_vode`
--

DROP TABLE IF EXISTS `bedz_unos_vode`;
CREATE TABLE IF NOT EXISTS `bedz_unos_vode` (
  `id_bedz` int NOT NULL,
  `kolicina_vode` int NOT NULL,
  PRIMARY KEY (`id_bedz`),
  UNIQUE KEY `id_bedz_UNIQUE` (`id_bedz`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gotovi_izazovi`
--

DROP TABLE IF EXISTS `gotovi_izazovi`;
CREATE TABLE IF NOT EXISTS `gotovi_izazovi` (
  `id_veze` int NOT NULL AUTO_INCREMENT,
  `id_kor` int NOT NULL,
  `id_izazov` int NOT NULL,
  `srce` tinyint DEFAULT NULL,
  PRIMARY KEY (`id_veze`),
  KEY `id_kor_FK_idx` (`id_kor`),
  KEY `id_izazov_FK_idx` (`id_izazov`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gotovi_izazovi`
--

INSERT INTO `gotovi_izazovi` (`id_veze`, `id_kor`, `id_izazov`, `srce`) VALUES
(1, 2, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `izazov`
--

DROP TABLE IF EXISTS `izazov`;
CREATE TABLE IF NOT EXISTS `izazov` (
  `id_izazov` int NOT NULL AUTO_INCREMENT,
  `id_tren` int NOT NULL,
  `naziv` varchar(45) NOT NULL,
  `opis` varchar(200) NOT NULL,
  `tip_izazova` varchar(45) NOT NULL,
  `br_poena` int NOT NULL,
  `trajanje_u_danima` int NOT NULL,
  `nivo` varchar(1) NOT NULL,
  `br_lajkova` int NOT NULL,
  `izbrisan` tinyint NOT NULL,
  PRIMARY KEY (`id_izazov`),
  UNIQUE KEY `id_izazov_UNIQUE` (`id_izazov`),
  KEY `id_tren_FK_idx` (`id_tren`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `izazov`
--

INSERT INTO `izazov` (`id_izazov`, `id_tren`, `naziv`, `opis`, `tip_izazova`, `br_poena`, `trajanje_u_danima`, `nivo`, `br_lajkova`, `izbrisan`) VALUES
(1, 3, 'Drink 2l of water every day!', 'Can you drink only water for 7 days in a row? I dare you!', 'water', 300, 7, 'm', 0, 0),
(2, 3, 'Step up', '10000 steps every day for 30 days', 'train', 500, 30, 'h', 0, 0),
(4, 6, 'JunkToJunk', 'Say NO to junk food! You should\'t eat junk food at all, but for the beginning 10 days will be enough ;)', 'food', 500, 10, 'e', 0, 0),
(5, 3, 'Drink 2l of water every day 10 days in row!', 'nvklhkdlshnvklda;vjldfa', 'water', 500, 10, 'e', 0, 0),
(6, 3, 'Drink 1.5 l of water!', 'voahngof[eajmjp[asjdovpjgpmkejdsvporepog', 'water', 500, 3, 'e', 0, 0),
(7, 3, 'Drink 1.6 l of water 5 days in row!', 'kbojbv;fhdav\'pjanofa\\jvojeaivdajo\\jkvl;fa', 'water', 440, 5, 'm', 0, 0),
(8, 3, 'Lose weight!', 'kbojbv;fhdav\'pjanofa\\jvojeaivdajo\\jkvl;fa', 'food', 690, 7, 'e', 0, 0),
(9, 3, 'Drink 1.7 l of water!', 'Drink 1.7 l of water for 7 days.', 'water', 220, 7, 'e', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `izazov_hrana`
--

DROP TABLE IF EXISTS `izazov_hrana`;
CREATE TABLE IF NOT EXISTS `izazov_hrana` (
  `id_izazov` int NOT NULL,
  `broj_kalorija_koje_treba_uneti_svakog_dana` int NOT NULL,
  PRIMARY KEY (`id_izazov`),
  UNIQUE KEY `id_izazov_UNIQUE` (`id_izazov`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `izazov_hrana`
--

INSERT INTO `izazov_hrana` (`id_izazov`, `broj_kalorija_koje_treba_uneti_svakog_dana`) VALUES
(4, 1500),
(8, 1800);

-- --------------------------------------------------------

--
-- Table structure for table `izazov_trening`
--

DROP TABLE IF EXISTS `izazov_trening`;
CREATE TABLE IF NOT EXISTS `izazov_trening` (
  `id_izazov` int NOT NULL,
  `id_tip` int NOT NULL,
  `vreme_koje_treba_trenirati_svakog_dana` int NOT NULL,
  PRIMARY KEY (`id_izazov`),
  UNIQUE KEY `id_izazov_UNIQUE` (`id_izazov`),
  KEY `id_tip_FK_idx` (`id_tip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `izazov_trening`
--

INSERT INTO `izazov_trening` (`id_izazov`, `id_tip`, `vreme_koje_treba_trenirati_svakog_dana`) VALUES
(2, 31, 2);

-- --------------------------------------------------------

--
-- Table structure for table `izazov_voda`
--

DROP TABLE IF EXISTS `izazov_voda`;
CREATE TABLE IF NOT EXISTS `izazov_voda` (
  `id_izazov` int NOT NULL,
  `kolicina_koju_treba_piti_svakog_dana` int NOT NULL,
  PRIMARY KEY (`id_izazov`),
  UNIQUE KEY `id_izazov_UNIQUE` (`id_izazov`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `izazov_voda`
--

INSERT INTO `izazov_voda` (`id_izazov`, `kolicina_koju_treba_piti_svakog_dana`) VALUES
(1, 2000),
(5, 2000),
(6, 1500),
(7, 1600),
(9, 1700);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `id_kor` int NOT NULL AUTO_INCREMENT,
  `kor_ime` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `sifra` varchar(45) NOT NULL,
  `izbrisan` tinyint DEFAULT NULL,
  PRIMARY KEY (`id_kor`),
  UNIQUE KEY `korIme_UNIQUE` (`kor_ime`),
  UNIQUE KEY `id_kor_UNIQUE` (`id_kor`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id_kor`, `kor_ime`, `email`, `sifra`, `izbrisan`) VALUES
(1, 'admin', 'admin@email.com', 'admin', 0),
(2, 'mia', 'mia@email.com', 'sifra123', 0),
(3, 'kakashi', 'kakashi@email.com', 'sifra123', 0),
(5, 'sakura', 'sakura@email.com', 'sifra123', 0),
(6, 'sasuke', 'sasuke@email.com', 'sifra123', 0),
(7, 'naruto', 'naruto@email.com', 'sifra123', 0),
(9, 'jiraiya', 'jiraiya@email.com', 'sifra123', 0),
(11, 'shikamaru', 'shikamaru@email.com', 'sifra123', 0),
(12, 'aaaaaaa', 'aaaa@gmail.com', 'sifra123', 0),
(16, 'korisnik123', 'korisnik1@email.com', 'sifra123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik_bedz`
--

DROP TABLE IF EXISTS `korisnik_bedz`;
CREATE TABLE IF NOT EXISTS `korisnik_bedz` (
  `id_veze` int NOT NULL AUTO_INCREMENT,
  `id_kor` int NOT NULL,
  `id_bedz` int NOT NULL,
  PRIMARY KEY (`id_veze`),
  UNIQUE KEY `id_veze_UNIQUE` (`id_veze`),
  KEY `id_kor_FK_idx` (`id_kor`),
  KEY `id_bedz_FK_idx` (`id_bedz`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnik_bedz`
--

INSERT INTO `korisnik_bedz` (`id_veze`, `id_kor`, `id_bedz`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `moji_izazovi`
--

DROP TABLE IF EXISTS `moji_izazovi`;
CREATE TABLE IF NOT EXISTS `moji_izazovi` (
  `id_veze` int NOT NULL AUTO_INCREMENT,
  `id_kor` int NOT NULL,
  `id_izazov` int NOT NULL,
  `datum_prijave_na_izazov` datetime NOT NULL,
  `dana_uzastopno_ispunjeno` int NOT NULL,
  `propusteno` tinyint NOT NULL,
  PRIMARY KEY (`id_veze`),
  UNIQUE KEY `id_veze_UNIQUE` (`id_veze`),
  KEY `id_kor_FK_idx` (`id_kor`),
  KEY `id_izazov_FK_idx` (`id_izazov`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `moji_izazovi`
--

INSERT INTO `moji_izazovi` (`id_veze`, `id_kor`, `id_izazov`, `datum_prijave_na_izazov`, `dana_uzastopno_ispunjeno`, `propusteno`) VALUES
(1, 2, 1, '2022-05-22 18:21:16', 0, 1),
(4, 2, 2, '2022-05-25 19:48:09', 0, 1),
(7, 2, 5, '2022-05-29 14:56:36', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `namirnica`
--

DROP TABLE IF EXISTS `namirnica`;
CREATE TABLE IF NOT EXISTS `namirnica` (
  `id_nam` int NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) NOT NULL,
  `kcal_na_100g` int NOT NULL,
  PRIMARY KEY (`id_nam`),
  UNIQUE KEY `id_nam_UNIQUE` (`id_nam`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `namirnica`
--

INSERT INTO `namirnica` (`id_nam`, `naziv`, `kcal_na_100g`) VALUES
(1, 'Bagel', 310),
(2, 'Biscuit digestives', 480),
(3, 'Rice (white boiled)', 140),
(4, 'Rice cakes', 373),
(5, 'Spaghetti (boiled)', 101),
(6, 'Beef (roast)', 280),
(7, 'Chicken', 200),
(8, 'Salmon fresh', 180),
(9, 'Turkey ', 160),
(10, 'Apple ', 44),
(11, 'Banana ', 65),
(12, 'Blackberries ', 25),
(13, 'Broccoli ', 32),
(14, 'Cabbage (boiled)', 20),
(15, 'Carrot (boiled) ', 25),
(16, 'Cherry ', 50),
(17, 'Kiwi ', 50),
(18, 'Melon ', 28),
(19, 'Orange ', 30),
(20, 'Peach', 30),
(21, 'Pineapple', 40),
(22, 'Strawberries', 30),
(23, 'Tomato', 20),
(24, 'Eggs', 150),
(25, 'Eggs fried', 180),
(26, 'Ice cream', 180),
(27, 'Milk whole', 70),
(28, 'Milk Soya', 36),
(29, 'Omelette with cheese', 266),
(30, 'Yogurt natural', 60),
(31, 'Butter', 750),
(32, 'Chocolate', 500),
(33, 'Honey', 280),
(34, 'Jam', 250);

-- --------------------------------------------------------

--
-- Table structure for table `obrok`
--

DROP TABLE IF EXISTS `obrok`;
CREATE TABLE IF NOT EXISTS `obrok` (
  `id_obr` int NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) NOT NULL,
  PRIMARY KEY (`id_obr`),
  UNIQUE KEY `id_obr_UNIQUE` (`id_obr`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `obrok`
--

INSERT INTO `obrok` (`id_obr`, `naziv`) VALUES
(1, 'Dorucak'),
(2, 'Rucak'),
(3, 'Vecera'),
(4, 'Dorucak'),
(5, 'Rucak'),
(6, 'Vecera'),
(7, 'Dorucak'),
(8, 'Rucak'),
(9, 'Vecera'),
(10, 'Dorucak'),
(11, 'Rucak'),
(12, 'Vecera'),
(13, 'Dorucak');

-- --------------------------------------------------------

--
-- Table structure for table `obrok_sadrzi_namirnice`
--

DROP TABLE IF EXISTS `obrok_sadrzi_namirnice`;
CREATE TABLE IF NOT EXISTS `obrok_sadrzi_namirnice` (
  `id_vez` int NOT NULL AUTO_INCREMENT,
  `id_obr` int NOT NULL,
  `id_nam` int NOT NULL,
  `kolicina_svake_nam_u_g` int NOT NULL,
  PRIMARY KEY (`id_vez`),
  UNIQUE KEY `id_vez_UNIQUE` (`id_vez`),
  KEY `id_nam_FK_idx` (`id_nam`),
  KEY `id_obr_FK_idx` (`id_obr`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `obrok_sadrzi_namirnice`
--

INSERT INTO `obrok_sadrzi_namirnice` (`id_vez`, `id_obr`, `id_nam`, `kolicina_svake_nam_u_g`) VALUES
(1, 1, 10, 150),
(2, 1, 24, 300),
(3, 2, 6, 350),
(4, 3, 7, 150),
(5, 3, 13, 50),
(6, 4, 11, 150),
(7, 4, 2, 100),
(8, 5, 9, 300),
(9, 5, 3, 100),
(10, 13, 1, 150);

-- --------------------------------------------------------

--
-- Table structure for table `registrovani_korisnik`
--

DROP TABLE IF EXISTS `registrovani_korisnik`;
CREATE TABLE IF NOT EXISTS `registrovani_korisnik` (
  `id_kor` int NOT NULL,
  `visina` int NOT NULL,
  `tezina` int NOT NULL,
  `br_tren` int NOT NULL,
  `bodovi` int NOT NULL,
  `url_profilne_slike` varchar(200) NOT NULL,
  PRIMARY KEY (`id_kor`),
  UNIQUE KEY `idKor_UNIQUE` (`id_kor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registrovani_korisnik`
--

INSERT INTO `registrovani_korisnik` (`id_kor`, `visina`, `tezina`, `br_tren`, `bodovi`, `url_profilne_slike`) VALUES
(2, 178, 65, 2, 500, 'assets/images/user-image/profileImage.jpg'),
(7, 185, 75, 5, 0, 'assets/images/user-image/profileImage.jpg'),
(9, 195, 85, 8, 0, 'assets/images/user-image/profileImage.jpg'),
(11, 185, 70, 5, 0, 'assets/images/user-image/profileImage.jpg'),
(12, 185, 70, 5, 0, 'assets/images/user-image/profileImage.jpg'),
(16, 185, 69, 5, 0, 'assets/images/user-image/profileImage.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tip_treninga`
--

DROP TABLE IF EXISTS `tip_treninga`;
CREATE TABLE IF NOT EXISTS `tip_treninga` (
  `id_tip` int NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) NOT NULL,
  `kcal_za_pola_sata_tren` int NOT NULL,
  PRIMARY KEY (`id_tip`),
  UNIQUE KEY `id_tip_UNIQUE` (`id_tip`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tip_treninga`
--

INSERT INTO `tip_treninga` (`id_tip`, `naziv`, `kcal_za_pola_sata_tren`) VALUES
(1, 'Weight Lifting: general', 108),
(2, 'Aerobics: water', 144),
(3, 'Stretching, Hatha Yoga', 144),
(4, 'Calisthenics: moderate', 162),
(5, 'Aerobics: low impact', 198),
(6, 'Stair Step Machine: general', 216),
(7, 'Weight Lifting: vigorous', 216),
(8, 'Aerobics, Step: low impact', 252),
(9, 'Aerobics: high impact', 252),
(10, 'Bicycling, Stationary: moderate', 252),
(11, 'Rowing, Stationary: moderate', 252),
(12, 'Calisthenics: vigorous', 306),
(13, 'Circuit Training: general', 240),
(15, 'Rowing, Stationary: vigorous', 369),
(16, 'Elliptical Trainer: general', 324),
(17, 'Ski Machine: general', 342),
(18, 'Aerobics, Step: high impact', 360),
(19, 'Bicycling, Stationary: vigorous', 278),
(20, 'Bowling', 108),
(22, 'Dancing: slow, waltz, foxtrot', 108),
(23, 'Frisbee', 105),
(24, 'Volleyball: non-competitive, general play', 108),
(25, 'Water Volleyball', 108),
(26, 'Golf: using cart', 126),
(27, 'Gymnastics: general', 144),
(28, 'Horseback Riding: general', 70),
(29, 'Tai Chi', 144),
(30, 'Volleyball: competitive, gymnasium play', 281),
(31, 'Walking: 3.5 mph (17 min/mi)', 133),
(32, 'Badminton: general', 141),
(33, 'Walking: 4 mph (15 min/mi)', 175),
(34, 'Kayaking', 180),
(35, 'Skateboarding', 180),
(36, 'Softball: general play', 180),
(37, 'Whitewater: rafting, kayaking', 180),
(38, 'Dancing: disco, ballroom, square', 198),
(39, 'Golf: carrying clubs', 198),
(40, 'Dancing: Fast, ballet, twist', 216),
(41, 'Hiking: cross-country', 216),
(42, 'Skiing: downhill', 216),
(43, 'Swimming: general', 216),
(44, 'Walk/Jog: jog <10 min.', 216),
(45, 'Water Skiing', 216),
(46, 'Wrestling', 216),
(47, 'Basketball: wheelchair', 234),
(48, 'Ice Skating: general', 252),
(49, 'Racquetball: casual, general', 252),
(50, 'Rollerblading/skating (Casual)', 386),
(51, 'Rollerblading/skating (Fast)', 421),
(52, 'Scuba or skin diving', 252),
(53, 'Sledding, luge, toboggan', 247),
(54, 'Soccer: general', 252),
(55, 'Tennis: general', 252),
(56, 'Basketball: playing a game', 288),
(57, 'Bicycling: 12-13.9 mph', 288),
(58, 'Football: touch, flag, general', 288),
(59, 'Hockey: field & ice', 288),
(60, 'Rock Climbing: rappelling', 282),
(61, 'Running: 5 mph (12 min/mile)', 288),
(62, 'Skiing: cross-country', 246),
(63, 'Snow Shoeing', 288),
(64, 'Volleyball: beach', 288),
(65, 'Bicycling: BMX or mountain', 306),
(66, 'Boxing: sparring', 324),
(67, 'Football: competitive', 324),
(68, 'Running: cross-country', 316),
(69, 'Bicycling: 14-15.9 mph', 360),
(70, 'Martial Arts: judo, karate, kickbox', 360),
(71, 'Racquetball: competitive', 360),
(72, 'Rope Jumping (Fast)', 421),
(73, 'Rope Jumping (Slow)', 281),
(74, 'Running: 6 mph (10 min/mile)', 360),
(75, 'Swimming: laps, vigorous', 360),
(76, 'Water Polo', 360),
(77, 'Rock Climbing: ascending', 281),
(78, 'Bicycling: 16-19 mph', 432),
(79, 'Handball: general', 432),
(80, 'Running: 7.5 mph (8 min/mile)', 450),
(81, 'Bicycling: > 20 mph', 594),
(82, 'Running: 10 mph (6 min/mile)', 562);

-- --------------------------------------------------------

--
-- Table structure for table `trener`
--

DROP TABLE IF EXISTS `trener`;
CREATE TABLE IF NOT EXISTS `trener` (
  `id_kor` int NOT NULL,
  PRIMARY KEY (`id_kor`),
  UNIQUE KEY `idKor_UNIQUE` (`id_kor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trener`
--

INSERT INTO `trener` (`id_kor`) VALUES
(3),
(6);

-- --------------------------------------------------------

--
-- Table structure for table `unos_hrane`
--

DROP TABLE IF EXISTS `unos_hrane`;
CREATE TABLE IF NOT EXISTS `unos_hrane` (
  `id_un` int NOT NULL AUTO_INCREMENT,
  `id_kor` int NOT NULL,
  `datum` datetime NOT NULL,
  `id_obr` int NOT NULL,
  PRIMARY KEY (`id_un`),
  UNIQUE KEY `id_un_UNIQUE` (`id_un`),
  KEY `id_kor_FK_idx` (`id_kor`),
  KEY `id_obr_FK_idx` (`id_obr`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unos_hrane`
--

INSERT INTO `unos_hrane` (`id_un`, `id_kor`, `datum`, `id_obr`) VALUES
(1, 2, '2022-05-20 19:59:08', 1),
(2, 2, '2022-05-20 19:59:33', 2),
(3, 2, '2022-05-20 19:59:45', 3),
(4, 2, '2022-05-21 19:59:57', 4),
(5, 2, '2022-05-21 20:00:08', 5),
(6, 2, '2022-05-21 20:00:21', 6),
(7, 2, '2022-05-12 15:50:39', 1),
(8, 2, '2022-05-24 08:42:54', 1),
(9, 2, '2022-06-02 18:52:17', 13);

-- --------------------------------------------------------

--
-- Table structure for table `unos_treninga`
--

DROP TABLE IF EXISTS `unos_treninga`;
CREATE TABLE IF NOT EXISTS `unos_treninga` (
  `id_un` int NOT NULL AUTO_INCREMENT,
  `id_kor` int NOT NULL,
  `datum` datetime NOT NULL,
  `vreme_trajanja` int NOT NULL,
  `id_tip` int NOT NULL,
  PRIMARY KEY (`id_un`),
  UNIQUE KEY `id_un_UNIQUE` (`id_un`),
  KEY `id_kor_FK_idx` (`id_kor`),
  KEY `id_tip_FK_idx` (`id_tip`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unos_treninga`
--

INSERT INTO `unos_treninga` (`id_un`, `id_kor`, `datum`, `vreme_trajanja`, `id_tip`) VALUES
(1, 2, '2022-03-15 18:36:38', 1, 2),
(2, 2, '2022-03-23 18:36:38', 2, 66),
(3, 2, '2022-04-11 18:39:17', 1, 74),
(4, 2, '2022-04-26 18:39:50', 3, 65),
(5, 2, '2022-05-08 18:40:16', 2, 55),
(6, 2, '2022-05-11 18:41:25', 1, 33),
(7, 2, '2022-05-16 18:41:41', 1, 10),
(8, 2, '2022-05-17 18:42:07', 3, 5),
(9, 2, '2022-05-19 18:42:34', 2, 40),
(10, 2, '2022-05-21 18:42:48', 2, 4),
(11, 2, '2022-05-25 21:14:05', 1, 31),
(12, 2, '2022-06-02 18:49:55', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `unos_vode`
--

DROP TABLE IF EXISTS `unos_vode`;
CREATE TABLE IF NOT EXISTS `unos_vode` (
  `id_un` int NOT NULL AUTO_INCREMENT,
  `id_kor` int NOT NULL,
  `datum` datetime NOT NULL,
  `kolicina` int NOT NULL,
  PRIMARY KEY (`id_un`),
  UNIQUE KEY `id_un_UNIQUE` (`id_un`),
  KEY `id_kor_FK_idx` (`id_kor`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unos_vode`
--

INSERT INTO `unos_vode` (`id_un`, `id_kor`, `datum`, `kolicina`) VALUES
(1, 2, '2022-05-15 09:13:48', 200),
(2, 2, '2022-05-15 10:35:04', 250),
(3, 2, '2022-05-15 12:21:04', 300),
(4, 2, '2022-05-15 14:21:04', 250),
(5, 2, '2022-05-15 16:21:04', 200),
(6, 2, '2022-05-15 18:21:04', 250),
(7, 2, '2022-05-16 09:21:04', 250),
(8, 2, '2022-05-16 11:21:04', 200),
(9, 2, '2022-05-16 14:21:04', 200),
(10, 2, '2022-05-16 15:21:04', 250),
(11, 2, '2022-05-16 16:21:04', 250),
(12, 2, '2022-05-16 18:21:04', 200),
(13, 2, '2022-05-16 20:21:04', 250),
(14, 2, '2022-05-17 09:21:04', 200),
(15, 2, '2022-05-17 11:21:04', 200),
(16, 2, '2022-05-17 14:21:04', 200),
(17, 2, '2022-05-17 15:21:04', 200),
(18, 2, '2022-05-17 16:21:04', 250),
(19, 2, '2022-05-17 18:21:04', 200),
(20, 2, '2022-05-17 20:21:04', 250),
(21, 2, '2022-05-18 09:21:04', 200),
(22, 2, '2022-05-18 11:21:04', 100),
(23, 2, '2022-05-18 14:21:04', 200),
(24, 2, '2022-05-18 15:21:04', 250),
(25, 2, '2022-05-18 16:21:04', 100),
(26, 2, '2022-05-18 18:21:04', 200),
(27, 2, '2022-05-18 20:21:04', 700),
(28, 2, '2022-05-19 09:21:04', 250),
(29, 2, '2022-05-19 11:21:04', 100),
(30, 2, '2022-05-19 14:21:04', 200),
(31, 2, '2022-05-19 15:21:04', 250),
(32, 2, '2022-05-19 16:21:04', 100),
(33, 2, '2022-05-19 18:21:04', 250),
(34, 2, '2022-05-19 20:21:04', 400),
(35, 2, '2022-05-20 09:21:04', 100),
(36, 2, '2022-05-20 11:21:04', 200),
(37, 2, '2022-05-20 14:21:04', 200),
(38, 2, '2022-05-20 15:21:04', 100),
(39, 2, '2022-05-20 16:21:04', 250),
(40, 2, '2022-05-20 18:21:04', 250),
(41, 2, '2022-05-20 20:21:04', 500),
(42, 2, '2022-05-23 11:20:48', 250),
(43, 2, '2022-05-23 14:20:48', 300),
(44, 2, '2022-05-29 10:33:00', 1800),
(45, 2, '2022-05-29 12:33:00', 200),
(46, 2, '2022-05-30 10:12:18', 2000),
(47, 2, '2022-05-31 10:12:18', 2000),
(48, 2, '2022-06-01 10:12:18', 2000),
(49, 2, '2022-06-02 18:52:33', 150);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `id_kor_admin_FK` FOREIGN KEY (`id_kor`) REFERENCES `korisnik` (`id_kor`);

--
-- Constraints for table `bedz_unos_hrane`
--
ALTER TABLE `bedz_unos_hrane`
  ADD CONSTRAINT `id_bedz_unos_hrane_FK` FOREIGN KEY (`id_bedz`) REFERENCES `bedz` (`id_bedz`);

--
-- Constraints for table `bedz_unos_trening`
--
ALTER TABLE `bedz_unos_trening`
  ADD CONSTRAINT `id_bedz_unos_trening_FK` FOREIGN KEY (`id_bedz`) REFERENCES `bedz` (`id_bedz`);

--
-- Constraints for table `bedz_unos_vode`
--
ALTER TABLE `bedz_unos_vode`
  ADD CONSTRAINT `id_bedz_unos_vode_FK` FOREIGN KEY (`id_bedz`) REFERENCES `bedz` (`id_bedz`);

--
-- Constraints for table `gotovi_izazovi`
--
ALTER TABLE `gotovi_izazovi`
  ADD CONSTRAINT `id_izazov_gotovi_izazovi_FK` FOREIGN KEY (`id_izazov`) REFERENCES `izazov` (`id_izazov`),
  ADD CONSTRAINT `id_kor_gotovi_izazovi_FK` FOREIGN KEY (`id_kor`) REFERENCES `registrovani_korisnik` (`id_kor`);

--
-- Constraints for table `izazov`
--
ALTER TABLE `izazov`
  ADD CONSTRAINT `id_tren_izazov_FK` FOREIGN KEY (`id_tren`) REFERENCES `trener` (`id_kor`);

--
-- Constraints for table `izazov_hrana`
--
ALTER TABLE `izazov_hrana`
  ADD CONSTRAINT `id_izazov_hrana_FK` FOREIGN KEY (`id_izazov`) REFERENCES `izazov` (`id_izazov`);

--
-- Constraints for table `izazov_trening`
--
ALTER TABLE `izazov_trening`
  ADD CONSTRAINT `id_izazov_trening_FK` FOREIGN KEY (`id_izazov`) REFERENCES `izazov` (`id_izazov`),
  ADD CONSTRAINT `id_tip_izazov_trening_FK` FOREIGN KEY (`id_tip`) REFERENCES `tip_treninga` (`id_tip`);

--
-- Constraints for table `izazov_voda`
--
ALTER TABLE `izazov_voda`
  ADD CONSTRAINT `id_izazov_voda_FK` FOREIGN KEY (`id_izazov`) REFERENCES `izazov` (`id_izazov`);

--
-- Constraints for table `korisnik_bedz`
--
ALTER TABLE `korisnik_bedz`
  ADD CONSTRAINT `id_bedz_bedz_FK` FOREIGN KEY (`id_bedz`) REFERENCES `bedz` (`id_bedz`),
  ADD CONSTRAINT `id_kor_bedz_FK` FOREIGN KEY (`id_kor`) REFERENCES `registrovani_korisnik` (`id_kor`);

--
-- Constraints for table `moji_izazovi`
--
ALTER TABLE `moji_izazovi`
  ADD CONSTRAINT `id_izazov_moji_izazovi_FK` FOREIGN KEY (`id_izazov`) REFERENCES `izazov` (`id_izazov`),
  ADD CONSTRAINT `id_kor_moji_izazovi_FK` FOREIGN KEY (`id_kor`) REFERENCES `registrovani_korisnik` (`id_kor`);

--
-- Constraints for table `obrok_sadrzi_namirnice`
--
ALTER TABLE `obrok_sadrzi_namirnice`
  ADD CONSTRAINT `id_nam_obr_sad_nam_FK` FOREIGN KEY (`id_nam`) REFERENCES `namirnica` (`id_nam`),
  ADD CONSTRAINT `id_obr_obr_sad_nam_FK` FOREIGN KEY (`id_obr`) REFERENCES `obrok` (`id_obr`);

--
-- Constraints for table `registrovani_korisnik`
--
ALTER TABLE `registrovani_korisnik`
  ADD CONSTRAINT `id_kor_reg_kor_FK` FOREIGN KEY (`id_kor`) REFERENCES `korisnik` (`id_kor`);

--
-- Constraints for table `trener`
--
ALTER TABLE `trener`
  ADD CONSTRAINT `id_kor_trener_FK` FOREIGN KEY (`id_kor`) REFERENCES `korisnik` (`id_kor`);

--
-- Constraints for table `unos_hrane`
--
ALTER TABLE `unos_hrane`
  ADD CONSTRAINT `id_kor_unos_hrane_FK` FOREIGN KEY (`id_kor`) REFERENCES `registrovani_korisnik` (`id_kor`),
  ADD CONSTRAINT `id_obr_unos_hrane_FK` FOREIGN KEY (`id_obr`) REFERENCES `obrok` (`id_obr`);

--
-- Constraints for table `unos_treninga`
--
ALTER TABLE `unos_treninga`
  ADD CONSTRAINT `id_kor_unos_treninga_FK` FOREIGN KEY (`id_kor`) REFERENCES `registrovani_korisnik` (`id_kor`),
  ADD CONSTRAINT `id_tip_unos_treninga_FK` FOREIGN KEY (`id_tip`) REFERENCES `tip_treninga` (`id_tip`);

--
-- Constraints for table `unos_vode`
--
ALTER TABLE `unos_vode`
  ADD CONSTRAINT `id_kor_unos_vode_FK` FOREIGN KEY (`id_kor`) REFERENCES `registrovani_korisnik` (`id_kor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
