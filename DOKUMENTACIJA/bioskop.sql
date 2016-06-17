-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2016 at 07:46 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioskop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `IDAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(32) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Email` varchar(64) NOT NULL,
  PRIMARY KEY (`IDAdmin`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=ascii;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`IDAdmin`, `Username`, `Password`, `Email`) VALUES
(1, 'admin', 'admin', 'igor.trajanovic@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `IDFilm` int(11) NOT NULL AUTO_INCREMENT,
  `Poreklo` varchar(32) DEFAULT NULL COMMENT 'Drzava iz koje potice',
  `Zanr` varchar(32) DEFAULT NULL,
  `Naziv` varchar(64) NOT NULL COMMENT 'srpski naslov',
  `OriginalNaziv` varchar(64) DEFAULT NULL COMMENT 'naslov na jeziku na kom je snjiman',
  `Reziser` varchar(32) DEFAULT NULL,
  `Duzina` smallint(6) DEFAULT NULL COMMENT 'Duzina trajanja filma u minutima',
  `Poster` varchar(256) NOT NULL,
  `Opis` text,
  `Link` varchar(128) NOT NULL COMMENT 'youtube trailer',
  `PocetakPrikazivanja` date NOT NULL COMMENT 'Datum pocetka prikazivanja filma u bioskopu',
  `Status` varchar(1) DEFAULT NULL,
  `Ocena` tinyint(4) NOT NULL,
  PRIMARY KEY (`IDFilm`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=ascii;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`IDFilm`, `Poreklo`, `Zanr`, `Naziv`, `OriginalNaziv`, `Reziser`, `Duzina`, `Poster`, `Opis`, `Link`, `PocetakPrikazivanja`, `Status`, `Ocena`) VALUES
(29, 'USA', 'avantura', 'Zacetak', 'Inception', 'Christopher Nolan', 158, 'http://localhost/bioskop/resource/film/Zacetak.jpg', 'A thief, who steals corporate secrets through use of dream-sharing technology, is given the inverse task of planting an idea into the mind of a CEO.', 'https://www.youtube.com/embed/YoHD9XEInc0', '2016-10-04', 'n', 7),
(3, 'USA', 'Avantura', 'Park iz doba jure', 'Jurassic Park', 'Steven Spielberg', 135, 'http://localhost/bioskop/resource/film/Park_iz_doba_jure.jpg', 'During a preview tour, a theme park suffers a major power breakdown that allows its cloned dinosaur exhibits to run amok.', 'https://www.youtube.com/embed/RFinNxS5KN4', '2016-05-02', 'a', 7),
(30, 'USA', 'Drama', 'Crni Labud', 'Black Swan', 'Darren Aronofsky', 108, 'http://localhost/bioskop/resource/film/Crni_Labud.jpg', 'A committed dancer wins the lead role in a production of Tchaikovsky''s "Swan Lake" only to find herself struggling to maintain her sanity.', 'https://www.youtube.com/embed/5jaI1XOB-bs', '2010-12-17', 'n', 10),
(31, 'USA', 'avantura', 'Dorucak kod Tifanija', 'Breakfast at Tiffany''s', 'Blake Edwards', 115, 'http://localhost/bioskop/resource/film/Dorucak_kod_Tifanija.jpg', 'A young New York socialite becomes interested in a young man who has moved into her apartment building.', 'https://www.youtube.com/embed/urQVzgEO_w8', '2011-02-09', 'n', 2),
(33, 'uk', 'akcija', 'Lovac na jelene', 'The Deer Hunter', 'Michael Cimino', 180, 'http://localhost/bioskop/resource/film/Lovac_na_jelene.jpg', 'An in-depth examination of the ways in which the U.S. Vietnam war impacts and disrupts the lives of people in a small industrial town in Pennsylvania.', 'https://www.youtube.com/embed/SKHZ5-JThFE', '2000-12-17', 'n', 1),
(34, 'eu', 'triler', 'Izdajnik po nasem ukusu', 'Our kind of traitor', 'Susanna White', 141, 'http://localhost/bioskop/resource/film/Izdajnik_po_nasem_ukusu.jpg', 'A couple find themselves lured into a Russian oligarch''s plans to defect are soon positioned between the Russian Mafia and the British Secret Service, neither of whom they can trust.', 'https://www.youtube.com/embed/N5k4FBGtbMs', '2016-05-12', 'a', 6),
(35, 'USA', 'akcija', 'Zvezdani Ratovi', 'Star wars: Episode VII', 'J.J. Abrams', 136, 'http://localhost/bioskop/resource/film/Zvezdani_Ratovi.jpg', 'Three decades after the defeat of the Galactic Empire, a new threat arises. The First Order attempts to rule the galaxy and only a ragtag group of heroes can stop them, along with the help of the Resistance.', 'https://www.youtube.com/embed/sGbxmsDFVnE', '2015-12-04', 'a', 4),
(36, 'uk', 'akcija', 'Mracni Vitez', 'The Dark Knight', 'Christopher Nolan', 152, 'http://localhost/bioskop/resource/film/Mracni_Vitez.jpg', 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, the caped crusader must come to terms with one of the greatest psychological tests of his ability to fight injustice.', 'https://www.youtube.com/embed/_PZpmTj1Q8Q', '2008-10-03', 'n', 0),
(37, 'Canada', 'Drama', 'Titanik', 'Titanic', 'James Cameron', 194, 'http://localhost/bioskop/resource/film/Titanik.jpg', 'A seventeen-year-old aristocrat falls in love with a kind, but poor artist aboard the luxurious, ill-fated R.M.S. Titanic.', 'https://www.youtube.com/embed/2e-eXJ6HgkQ', '2010-12-17', 'n', 8);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

DROP TABLE IF EXISTS `komentar`;
CREATE TABLE IF NOT EXISTS `komentar` (
  `IDKomentar` int(11) NOT NULL AUTO_INCREMENT,
  `IDFilm` int(11) NOT NULL COMMENT 'strani kljuc Tabela Film',
  `IDKorisnik` int(11) NOT NULL COMMENT 'strani kljuc Tabela Korisnik',
  `DatumVreme` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Text` text NOT NULL,
  PRIMARY KEY (`IDKomentar`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=ascii;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`IDKomentar`, `IDFilm`, `IDKorisnik`, `DatumVreme`, `Text`) VALUES
(90, 33, 13, '2016-06-16 21:23:45', 'Signal 1.'),
(85, 29, 13, '2016-06-16 19:47:36', 'Jea '),
(86, 35, 13, '2016-06-16 19:48:20', 'Prvi komentar za ovaj film'),
(87, 30, 19, '2016-06-16 20:11:18', 'Drugi komentar'),
(88, 29, 19, '2016-06-16 20:12:09', 'komentar\n'),
(89, 37, 13, '2016-06-16 21:19:36', 'Ovo je titanik'),
(84, 29, 13, '2016-06-16 19:47:25', 'Ovo je prvi komentar koji se ovde ostavlja'),
(83, 34, 13, '2016-06-03 22:04:12', 'Komentar komentar sdfsdaga...........'),
(82, 3, 13, '2016-06-03 22:00:28', 'prvi komentar koji ostavljam\n'),
(73, 1, 1, '2016-06-03 14:27:07', 'Ovo je komentar. Da ovo je definitivno komentar.'),
(74, 29, 1, '2016-06-03 15:18:53', 'Novi komentar');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `IDKorisnik` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(32) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `Slika` varchar(256) DEFAULT NULL COMMENT 'Putanja slike na fajl serveru',
  `SlikaIme` varchar(128) DEFAULT NULL COMMENT 'Originalno ime slike',
  `ZeliObavestenja` tinyint(1) NOT NULL,
  PRIMARY KEY (`IDKorisnik`),
  UNIQUE KEY `user` (`Username`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=ascii;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`IDKorisnik`, `Username`, `Password`, `Email`, `Slika`, `SlikaIme`, `ZeliObavestenja`) VALUES
(14, 'lazar', 'igor', 'igor.trajanovic@gmail.com', 'http://localhost/bioskop/resource/user/lazar.jpg', '094.jpg', 0),
(19, 'Elsa', 'igor', 'igor.tesla333@gmail.com', 'http://localhost/bioskop/resource/user/Elsa.jpg', 'Elsa.jpg', 1),
(13, 'igor', 'igor', 'igor.trajanovic@gmail.com', 'http://localhost/bioskop/resource/user/igor.jpg', 'the_archer_by_sktchwlkr-d65d3ai.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

DROP TABLE IF EXISTS `moderator`;
CREATE TABLE IF NOT EXISTS `moderator` (
  `IDModerator` int(11) NOT NULL AUTO_INCREMENT,
  `IDAdmin` int(11) NOT NULL,
  `Username` varchar(64) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Privilegija` char(1) NOT NULL DEFAULT 'f',
  PRIMARY KEY (`IDModerator`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=ascii;

--
-- Dumping data for table `moderator`
--

INSERT INTO `moderator` (`IDModerator`, `IDAdmin`, `Username`, `Password`, `Email`, `Privilegija`) VALUES
(4, 1, 'marko', 'igor', 'igor.tesla333@gmail.com', 'f'),
(3, 1, 'giro', 'igor', 'igor.tesla333@gmail.com', 'k');

-- --------------------------------------------------------

--
-- Table structure for table `ocena`
--

DROP TABLE IF EXISTS `ocena`;
CREATE TABLE IF NOT EXISTS `ocena` (
  `IDFilm` int(11) NOT NULL,
  `IDKorisnik` int(11) NOT NULL,
  `Ocena` tinyint(4) NOT NULL,
  PRIMARY KEY (`IDFilm`,`IDKorisnik`)
) ENGINE=MyISAM DEFAULT CHARSET=ascii;

--
-- Dumping data for table `ocena`
--

INSERT INTO `ocena` (`IDFilm`, `IDKorisnik`, `Ocena`) VALUES
(35, 13, 4),
(29, 13, 7),
(31, 19, 2),
(34, 13, 6),
(3, 13, 7),
(1, 2, 3),
(30, 19, 10),
(37, 13, 8),
(33, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `projekcija`
--

DROP TABLE IF EXISTS `projekcija`;
CREATE TABLE IF NOT EXISTS `projekcija` (
  `IDProjekcija` int(11) NOT NULL AUTO_INCREMENT,
  `IDSala` int(11) NOT NULL,
  `IDFilm` int(11) NOT NULL,
  `Datum` date DEFAULT NULL,
  `Vreme` time DEFAULT NULL,
  PRIMARY KEY (`IDProjekcija`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=ascii;

--
-- Dumping data for table `projekcija`
--

INSERT INTO `projekcija` (`IDProjekcija`, `IDSala`, `IDFilm`, `Datum`, `Vreme`) VALUES
(18, 5, 29, '2016-06-08', '15:00:00'),
(16, 5, 30, '2016-06-08', '17:00:00'),
(15, 4, 30, '2016-06-08', '15:00:00'),
(14, 4, 30, '2016-06-19', '13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

DROP TABLE IF EXISTS `rezervacija`;
CREATE TABLE IF NOT EXISTS `rezervacija` (
  `IDRezervacija` int(11) NOT NULL AUTO_INCREMENT,
  `IDKorisnik` int(11) NOT NULL,
  `IDProjekcija` int(11) NOT NULL,
  `DatumVreme` datetime DEFAULT NULL,
  `BrojKarata` smallint(6) NOT NULL,
  `Cena` int(11) NOT NULL,
  `Status` char(1) NOT NULL DEFAULT 'n',
  PRIMARY KEY (`IDRezervacija`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=ascii;

--
-- Dumping data for table `rezervacija`
--

INSERT INTO `rezervacija` (`IDRezervacija`, `IDKorisnik`, `IDProjekcija`, `DatumVreme`, `BrojKarata`, `Cena`, `Status`) VALUES
(36, 13, 14, '2016-06-16 21:19:10', 2, 200, 't'),
(35, 19, 14, '2016-06-16 20:11:03', 8, 800, 't'),
(33, 19, 16, '2016-06-03 22:08:42', 17, 4250, 't'),
(34, 13, 16, '2016-06-05 08:05:00', 6, 1500, 't');

-- --------------------------------------------------------

--
-- Table structure for table `rezervisanomesto`
--

DROP TABLE IF EXISTS `rezervisanomesto`;
CREATE TABLE IF NOT EXISTS `rezervisanomesto` (
  `IDProjekcija` int(11) NOT NULL,
  `Red` int(11) NOT NULL,
  `Kolona` int(11) NOT NULL,
  `IDRezervacija` int(11) NOT NULL,
  PRIMARY KEY (`IDProjekcija`,`Red`,`Kolona`)
) ENGINE=MyISAM DEFAULT CHARSET=ascii;

--
-- Dumping data for table `rezervisanomesto`
--

INSERT INTO `rezervisanomesto` (`IDProjekcija`, `Red`, `Kolona`, `IDRezervacija`) VALUES
(14, 1, 8, 36),
(14, 1, 7, 36),
(14, 5, 8, 35),
(14, 5, 7, 35),
(14, 5, 6, 35),
(14, 5, 5, 35),
(14, 4, 5, 35),
(14, 3, 5, 35),
(14, 2, 5, 35),
(14, 1, 5, 35),
(16, 12, 11, 33),
(16, 12, 10, 33),
(16, 13, 10, 33),
(16, 6, 16, 33),
(16, 6, 15, 33),
(16, 1, 10, 33),
(16, 1, 7, 33),
(13, 4, 6, 58),
(13, 5, 6, 123),
(16, 4, 7, 34),
(16, 4, 6, 34),
(16, 3, 6, 34),
(16, 3, 7, 34);

-- --------------------------------------------------------

--
-- Table structure for table `sala`
--

DROP TABLE IF EXISTS `sala`;
CREATE TABLE IF NOT EXISTS `sala` (
  `IDSala` int(11) NOT NULL AUTO_INCREMENT,
  `BrojRedova` smallint(6) NOT NULL,
  `BrojKolona` smallint(6) NOT NULL,
  `Cena` int(11) NOT NULL,
  PRIMARY KEY (`IDSala`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=ascii;

--
-- Dumping data for table `sala`
--

INSERT INTO `sala` (`IDSala`, `BrojRedova`, `BrojKolona`, `Cena`) VALUES
(6, 10, 10, 500),
(5, 15, 20, 250),
(4, 10, 10, 100);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
