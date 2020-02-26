-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Lut 2020, 12:19
-- Wersja serwera: 10.1.38-MariaDB
-- Wersja PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `edyspozytor`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `destination`
--

CREATE TABLE `destination` (
  `id` int(11) NOT NULL,
  `relacja` text COLLATE utf8_polish_ci,
  `numer_linii` int(11) DEFAULT NULL,
  `miasto` int(11) DEFAULT NULL,
  `czas_przejazdu` time DEFAULT NULL,
  `uwagi` text COLLATE utf8_polish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `destination`
--

INSERT INTO `destination` (`id`, `relacja`, `numer_linii`, `miasto`, `czas_przejazdu`, `uwagi`) VALUES
(1, 'Zajezdnia - Dworzec Główny PKP', NULL, 2, '00:14:00', 'Wyjazd z zajezdni'),
(2, 'Dworzec Główny PKP', NULL, 2, '00:14:00', 'Zjazd do zajezdni'),
(3, 'Zajezdnia MZKA - Dolna', 0, 3, '00:30:00', 'wyjazd'),
(4, 'Zajezdnia MZKA - Dworzec Kolejowy', 0, 3, '00:18:00', 'wyjazd'),
(5, 'Zajezdnia MZKA - ??gnowo', 0, 3, '00:19:00', 'wyjazd'),
(6, 'Zajezdnia MZKA - Rzymowskiego', 0, 3, '00:17:00', 'wyjazd'),
(7, 'Zajezdnia MZKA - Stomil', 0, 3, '00:31:00', 'wyjazd'),
(8, 'Zajezdnia MZKA - Ko?o', 0, 3, '00:15:00', 'wyjazd');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `miasto` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `id_timetable` int(11) DEFAULT NULL,
  `numer_pojazdu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `plan`
--

INSERT INTO `plan` (`id`, `miasto`, `data`, `id_timetable`, `numer_pojazdu`) VALUES
(1, 2, '2020-02-26', 1, 105);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `miasto` int(11) NOT NULL,
  `nazwa_zm` text COLLATE utf8_polish_ci,
  `godz_roz` time DEFAULT NULL,
  `godz_zak` time DEFAULT NULL,
  `rodzaj` text COLLATE utf8_polish_ci,
  `obsluga` text COLLATE utf8_polish_ci NOT NULL,
  `uwagi` longtext COLLATE utf8_polish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `timetable`
--

INSERT INTO `timetable` (`id`, `miasto`, `nazwa_zm`, `godz_roz`, `godz_zak`, `rodzaj`, `obsluga`, `uwagi`) VALUES
(1, 2, '01/01/D', '04:52:00', '12:22:00', 'BUS', '', ''),
(2, 2, '', '00:00:00', '00:00:00', '', '', ''),
(3, 2, '', '00:00:00', '00:00:00', '', '', ''),
(4, 2, '12', '00:00:00', '00:00:00', '', '', ''),
(5, 2, '', '00:00:00', '00:00:00', '', '', ''),
(6, 2, '', '00:00:00', '00:00:00', '', '', ''),
(7, 2, '11', '04:52:00', '12:22:00', 'Tram', '', 'nie'),
(8, 2, '', '00:00:00', '00:00:00', '', '', ''),
(9, 2, '', '00:00:00', '00:00:00', '', '', ''),
(10, 2, '', '00:00:00', '00:00:00', '', '', ''),
(11, 2, '', '00:00:00', '00:00:00', '', '', ''),
(12, 2, '', '00:00:00', '00:00:00', '', '', ''),
(13, 2, '01/02/D', '04:23:00', '22:12:00', 'TRAM', 'MAXI', ''),
(14, 2, '01/03/D', '12:15:00', '22:21:00', 'BUS', 'MEGA', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `timetable_course`
--

CREATE TABLE `timetable_course` (
  `id` int(11) NOT NULL,
  `id_timetable` int(11) DEFAULT NULL,
  `nr_kursu` int(11) DEFAULT NULL,
  `nr_linii` int(11) NOT NULL,
  `id_destination` int(11) DEFAULT NULL,
  `godz_roz` time DEFAULT NULL,
  `godz_zak` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `timetable_course`
--

INSERT INTO `timetable_course` (`id`, `id_timetable`, `nr_kursu`, `nr_linii`, `id_destination`, `godz_roz`, `godz_zak`) VALUES
(1, 1, 1, 12, 8, '04:55:00', '05:10:00'),
(2, 1, 2, 13, 8, '05:35:00', '05:50:00'),
(3, 1, 3, 0, 8, '09:22:00', '09:37:00'),
(4, 1, 4, 0, 8, '19:00:00', '19:15:00'),
(5, 1, 5, 0, 8, '12:31:00', '12:46:00'),
(6, 2, 1, 0, 0, '00:00:00', '00:00:00'),
(7, 2, 2, 0, 0, '00:00:00', '00:00:00'),
(8, 3, 1, 0, 7, '00:00:00', '00:31:00'),
(9, 3, 2, 0, 4, '00:00:00', '00:18:00'),
(10, 4, 1, 0, 5, '00:00:00', '00:19:00'),
(11, 5, 1, 0, 0, '00:00:00', '00:00:00'),
(12, 5, 2, 0, 0, '00:00:00', '00:00:00'),
(13, 5, 3, 0, 0, '00:00:00', '00:00:00'),
(14, 5, 4, 0, 0, '00:00:00', '00:00:00'),
(15, 5, 5, 0, 0, '00:00:00', '00:00:00'),
(16, 6, 1, 0, 1, '00:00:00', '00:14:00'),
(17, 6, 2, 0, 1, '00:00:00', '00:14:00'),
(18, 6, 3, 0, 1, '00:00:00', '00:14:00'),
(19, 7, 1, 3, 1, '02:03:00', '02:17:00'),
(20, 12, 1, 0, 0, '00:00:00', '00:00:00'),
(21, 13, 1, 12, 2, '04:23:00', '04:37:00'),
(22, 13, 2, 12, 2, '21:52:00', '22:06:00'),
(23, 14, 1, 12, 1, '12:15:00', '12:29:00'),
(24, 14, 2, 15, 2, '22:00:00', '22:14:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `surname` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `login` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `password` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `e-mail` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `login`, `password`, `e-mail`, `access`) VALUES
(1, 'Administrator', '', 'admin', 'admin', '', 1),
(2, 'Wiktor', 'Wiese', 'wwiese', 'Krzywy2000', 'wiktorwiese2000@gmail.com', 2),
(3, 'Tymon', 'Myga', 'tmyga', 'Pesa123!', 'swing122nab@gmail.com', 3),
(4, 'Kamil', 'Pikuła', 'kpikula', 'pom.garg545', 'kamikpe@gmail.com', 4),
(5, 'Piotr', 'Mański', 'pmanski', 'MaanieK543', 'derekpan2@gmail.com', 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `typ_pojazdu` enum('Tram','Bus') COLLATE utf8_polish_ci DEFAULT NULL,
  `miasto` text COLLATE utf8_polish_ci NOT NULL,
  `marka` text COLLATE utf8_polish_ci,
  `model` text COLLATE utf8_polish_ci,
  `uklad_drzwi` text COLLATE utf8_polish_ci,
  `rocznik` text COLLATE utf8_polish_ci,
  `rok_wprowadzenia` text COLLATE utf8_polish_ci,
  `klimatyzacja` enum('TAK','NIE') COLLATE utf8_polish_ci DEFAULT NULL,
  `biletomat` enum('TAK','NIE') COLLATE utf8_polish_ci DEFAULT NULL,
  `numer_tab` int(11) DEFAULT NULL,
  `typ_taboru` enum('MINI','MAXI','MEGA','Wagon','Skład') COLLATE utf8_polish_ci DEFAULT NULL,
  `uwagi` longtext COLLATE utf8_polish_ci,
  `id_workshop` int(11) DEFAULT NULL,
  `id_timetable` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `vehicles`
--

INSERT INTO `vehicles` (`id`, `typ_pojazdu`, `miasto`, `marka`, `model`, `uklad_drzwi`, `rocznik`, `rok_wprowadzenia`, `klimatyzacja`, `biletomat`, `numer_tab`, `typ_taboru`, `uwagi`, `id_workshop`, `id_timetable`) VALUES
(1, 'Bus', '', '', '', '', '', '', 'TAK', 'TAK', 0, 'MINI', '', 1, 0),
(2, 'Bus', '2', 'MAN', 'NM223', '1 - 2 - 0', '1999', '2014', 'NIE', 'TAK', 104, '', '', 1, 0),
(3, 'Bus', '2', 'Jelcz', 'M11', '2 - 2 - 2', '1987', '1987', 'NIE', 'TAK', 105, '', '', 1, 0),
(4, 'Bus', '2', 'Jelcz', 'M11', '2 - 2 - 2', '1987', '1987', 'NIE', 'TAK', 106, '', '', 0, 0),
(5, 'Bus', '2', 'Jelcz', 'M11', '2 - 2 - 2', '1987', '1987', 'NIE', 'TAK', 107, '', '', 0, 0),
(6, 'Bus', '2', 'Solaris', 'Urbino 10 III', '1 - 2 - 0', '2017', '2018', 'TAK', 'TAK', 108, '', 'Z dotacji UE', 0, 0),
(7, 'Bus', '2', 'Solaris', 'Urbino 10 III', '1 - 2 - 0', '2017', '2018', 'TAK', 'TAK', 109, '', 'Z dotacji UE', 0, 0),
(8, 'Bus', '2', 'Solaris', 'Urbino 8,9 III LE', '1 - 2 - 0', '2019', '2020', 'TAK', 'TAK', 110, '', 'Z dotacji UE', 1, 0),
(9, 'Bus', '2', 'Solaris', 'Urbino 8,9 III LE', '1 - 2 - 0', '2019', '2020', 'TAK', 'TAK', 111, '', 'Z dotacji UE', 0, 0),
(10, 'Bus', '2', 'Jelcz', '120M', '2 - 2 - 2', '1994', '1994', 'NIE', 'TAK', 201, 'MAXI', '', 0, 0),
(11, 'Bus', '2', 'Jelcz', '120MM/2', '2 - 2 - 2', '2000', '2000', 'NIE', 'TAK', 202, 'MAXI', '', 0, 0),
(12, 'Bus', '2', 'Jelcz', '120MM/2', '2 - 2 - 2', '2001', '2001', 'NIE', 'TAK', 203, 'MAXI', '', 0, 0),
(13, 'Bus', '2', 'Jelcz', '120MM/2', '2 - 2 - 2', '2001', '2001', 'NIE', 'TAK', 204, 'MAXI', '', 0, 0),
(14, 'Bus', '2', 'Jelcz', '120MM/2', '2 - 2 - 2', '2002', '2002', 'NIE', 'TAK', 205, 'MAXI', '', 0, 0),
(15, 'Bus', '2', 'Jelcz', '120MM/2', '2 - 2 - 2', '2002', '2003', 'NIE', 'TAK', 206, 'MAXI', '', 0, 0),
(16, 'Bus', '2', 'Jelcz', 'M121M', '2 - 2 - 2', '1996', '1996', 'NIE', 'TAK', 207, 'MAXI', '', 0, 0),
(17, 'Bus', '2', 'Jelcz', 'M121M', '2 - 2 - 2', '1999', '1999', 'NIE', 'TAK', 208, 'MAXI', '', 0, 0),
(18, 'Bus', '2', 'Jelcz', 'M121M', '2 - 2 - 2', '1999', '1999', 'NIE', 'TAK', 209, 'MAXI', '', 0, 0),
(19, 'Bus', '2', 'Jelcz', 'M121M', '2 - 2 - 2', '1999', '1999', 'NIE', 'TAK', 210, 'MAXI', '', 0, 0),
(20, 'Bus', '2', 'Jelcz', '120M', '2 - 2 - 2', '1992', '1992', 'NIE', 'TAK', 212, 'MAXI', '', 0, 0),
(21, 'Bus', '2', 'Jelcz', '120M', '2 - 2 - 2', '1992', '1992', 'NIE', 'TAK', 213, 'MAXI', '', 0, 0),
(22, 'Bus', '2', 'Ikarus', '260.04', '2 - 2 - 2', '1988', '1988', 'NIE', 'TAK', 214, 'MAXI', '', 0, 0),
(23, 'Bus', '2', 'Ikarus', '260.30A', '2 - 2 - 2', '1996', '1996', 'NIE', 'TAK', 215, 'MAXI', '', 0, 0),
(24, 'Bus', '2', 'Ikarus', '260.30A', '2 - 2 - 2', '1996', '1996', 'NIE', 'TAK', 216, 'MAXI', '', 0, 0),
(25, 'Bus', '2', 'Mercedes-Benz', 'O405N2', '2 - 2 - 0', '1997', '2008', 'NIE', 'TAK', 217, 'MAXI', '', 0, 0),
(26, 'Bus', '2', 'Mercedes-Benz', 'O405N2', '2 - 2 - 2', '1999', '2012', 'NIE', 'TAK', 218, 'MAXI', '', 0, 0),
(27, 'Bus', '2', 'MAN', 'NL222', '2 - 2 - 2', '2000', '2000', 'NIE', 'TAK', 219, 'MAXI', '', 0, 0),
(28, 'Bus', '2', 'MAN', 'NL222', '2 - 2 - 2', '2000', '2000', 'NIE', 'TAK', 220, 'MAXI', '', 0, 0),
(29, 'Bus', '2', 'MAN', 'NL223', '2 - 2 - 2', '2002', '2002', 'NIE', 'TAK', 221, 'MAXI', '', 0, 0),
(30, 'Bus', '2', 'MAN', 'NL223', '2 - 2 - 2', '2002', '2002', 'NIE', 'TAK', 222, 'MAXI', '', 0, 0),
(31, 'Bus', '2', 'MAN', 'NL223', '2 - 2 - 2', '2002', '2002', 'NIE', 'TAK', 223, 'MAXI', '', 0, 0),
(32, 'Bus', '2', 'MAN', 'NL223', '2 - 2 - 2', '2002', '2003', 'NIE', 'TAK', 224, 'MAXI', '', 0, 0),
(33, 'Bus', '2', 'MAN', 'NL263', '2 - 2 - 2', '2004', '2013', 'TAK', 'TAK', 225, 'MAXI', 'ex. Oslo', 0, 0),
(34, 'Bus', '2', 'MAN', 'NL263', '2 - 2 - 2', '2004', '2013', 'TAK', 'TAK', 226, 'MAXI', 'ex. Oslo', 0, 0),
(35, 'Bus', '2', 'MAN', 'NL262', '2 - 2 - 2', '1997', '2010', 'NIE', 'TAK', 228, 'MAXI', 'ex. Oslo', 0, 0),
(36, 'Bus', '2', 'MAN', 'NL263', '2 - 2 - 2', '1999', '2016', 'NIE', 'TAK', 229, 'MAXI', 'ex. Niemcy', 0, 0),
(37, 'Bus', '2', 'Volvo/Vest', 'B7RLE/Center', '2 - 2 - 2', '2009', '2019', 'TAK', 'NIE', 230, 'MAXI', 'ex. Unibuss Oslo', 0, 0),
(38, 'Bus', '2', 'Volvo/Vest', 'B7RLE/Center', '2 - 2 - 2', '2009', '2019', 'TAK', 'NIE', 231, 'MAXI', 'ex. Unibuss Oslo', 0, 0),
(39, 'Bus', '2', 'Solaris', 'Urbino 12 II', '2 - 2 - 2', '2004', '2019', 'TAK', 'TAK', 234, 'MAXI', 'ex. Winterthur', 0, 0),
(40, 'Bus', '2', 'Volvo', 'B10BLE', '2 - 2 - 2', '1997', '1997', '', 'TAK', 235, 'MAXI', '', 0, 0),
(41, 'Bus', '2', 'Volvo', 'B10BLE', '2 - 2 - 2', '1997', '1997', 'NIE', 'TAK', 236, 'MAXI', '', 0, 0),
(42, 'Bus', '2', 'Volvo', 'B10BLE', '2 - 2 - 2', '1997', '1997', 'NIE', 'TAK', 237, 'MAXI', '', 0, 0),
(43, 'Bus', '2', 'Solaris', 'Urbino 12 III', '2 - 2 - 2', '2007', '2007', 'NIE', 'TAK', 238, 'MAXI', '', 0, 0),
(44, 'Bus', '2', 'Solaris', 'Urbino 12 III', '2 - 2 - 2', '2007', '2007', 'NIE', 'TAK', 239, 'MAXI', '', 0, 0),
(45, 'Bus', '2', 'Solaris', 'Urbino 12 III', '2 - 2 - 2', '2007', '2007', 'NIE', 'TAK', 240, 'MAXI', '', 0, 0),
(46, 'Bus', '2', 'Solaris', 'Urbino 12 III', '2 - 2 - 2', '2007', '2007', 'NIE', 'TAK', 241, 'MAXI', '', 0, 0),
(47, 'Bus', '2', 'Solaris', 'Urbino 12 III', '2 - 2 - 2', '2017', '2017', 'TAK', 'TAK', 242, 'MAXI', 'Z dotacji UE', 0, 0),
(48, 'Bus', '2', 'Solaris', 'Urbino 12 III', '2 - 2 - 2', '2017', '2017', 'TAK', 'TAK', 243, 'MAXI', 'Z dotacji UE', 0, 0),
(49, 'Bus', '2', 'Solaris', 'Urbino 12 III', '2 - 2 - 2', '2017', '2017', 'TAK', 'TAK', 244, 'MAXI', 'Z dotacji UE', 0, 0),
(50, 'Bus', '2', 'Solaris', 'Urbino 12 III', '2 - 2 - 2', '2006', '2019', 'NIE', 'TAK', 245, 'MAXI', '', 0, 0),
(51, 'Bus', '2', 'Solaris', 'Urbino 12 III', '2 - 2 - 2', '2006', '2019', 'NIE', 'TAK', 246, 'MAXI', '', 0, 0),
(52, 'Bus', '2', 'Solaris', 'Urbino 12 III', '2 - 2 - 2', '2006', '2019', 'NIE', 'TAK', 247, 'MAXI', '', 0, 0),
(53, 'Bus', '2', 'Jelcz', 'PR110M', '2 - 2 - 2', '1988', '1988', 'NIE', 'TAK', 251, 'MAXI', '', 0, 0),
(54, 'Bus', '2', 'Jelcz', 'PR110M', '2 - 2 - 2', '1988', '1988', 'NIE', 'TAK', 252, 'MAXI', '', 0, 0),
(55, 'Bus', '2', 'Jelcz', 'PR110M', '2 - 2 - 2', '1987', '1988', 'NIE', 'TAK', 253, 'MAXI', '', 0, 0),
(56, 'Bus', '2', 'Jelcz', 'PR110M', '2 - 2 - 2', '1988', '1988', 'NIE', 'TAK', 254, 'MAXI', '', 0, 0),
(57, 'Bus', '2', 'Jelcz', 'PR110M', '2 - 2 - 2', '1987', '1987', 'NIE', 'TAK', 255, 'MAXI', '', 0, 0),
(58, 'Bus', '2', 'Jelcz', 'PR110M', '2 - 2 - 2', '1988', '1988', 'NIE', 'TAK', 256, 'MAXI', '', 0, 0),
(59, 'Bus', '2', 'Jelcz', 'PR110M', '2 - 2 - 2', '1988', '1988', 'NIE', 'TAK', 257, 'MAXI', '', 0, 0),
(60, 'Bus', '2', 'Mercedes-Benz', 'O530', '2 - 2 - 0', '2003', '2019', 'TAK', 'TAK', 261, 'MAXI', 'Do przewoz?w szkolnych', 0, 0),
(61, 'Bus', '2', 'Solaris', 'Urbino 18 III', '2 - 2 - 2 - 2', '2007', '2007', 'NIE', 'TAK', 301, 'MEGA', '', 0, 0),
(62, 'Bus', '2', 'Solaris', 'Urbino 18 III', '2 - 2 - 2 - 2', '2007', '2007', 'NIE', 'TAK', 302, 'MEGA', '', 0, 0),
(63, 'Bus', '2', 'Solaris', 'Urbino 18 III', '2 - 2 - 2 - 2', '2007', '2007', 'NIE', 'TAK', 303, 'MEGA', '', 0, 0),
(64, 'Bus', '2', 'Solaris', 'Urbino 18 III', '2 - 2 - 2 - 2', '2012', '2012', 'TAK', 'TAK', 304, 'MEGA', '', 0, 0),
(65, 'Bus', '2', 'Solaris', 'Urbino 18 III', '2 - 2 - 2 - 2', '2012', '2012', 'TAK', 'TAK', 305, 'MEGA', '', 0, 0),
(66, 'Bus', '2', 'Solaris', 'Urbino 18 III', '2 - 2 - 2 - 2', '2017', '2017', 'TAK', 'TAK', 306, 'MEGA', 'Z dotacji UE', 0, 0),
(67, 'Bus', '2', 'Solaris', 'Urbino 18 III', '2 - 2 - 2 - 0', '2008', '2018', 'TAK', 'TAK', 307, 'MEGA', 'ex. BVG Berlin', 0, 0),
(68, 'Bus', '2', 'Solaris', 'Urbino 18 IV', '2 - 2 - 2 - 2', '2019', '2019', 'TAK', 'TAK', 308, 'MEGA', 'Z dotacji UE', 0, 0),
(69, 'Bus', '2', 'Solaris', 'Urbino 18 II', '2 - 2 - 2 - 2', '2004', '2020', 'TAK', 'TAK', 309, 'MEGA', 'ex. Winterthur', 0, 0),
(70, 'Bus', '2', 'Solaris', 'Urbino 15 III', '2 - 2 - 2', '2017', '2018', 'TAK', 'TAK', 311, 'MEGA', 'Z dotacji UE', 0, 0),
(71, 'Bus', '2', 'Solaris', 'Urbino 15 III', '2 - 2 - 2', '2017', '2018', 'TAK', 'TAK', 312, 'MEGA', 'Z dotacji UE', 0, 0),
(72, 'Bus', '2', 'Jelcz', 'M181M', '2 - 2 - 2 - 2', '1995', '1996', 'NIE', 'TAK', 316, 'MEGA', '', 0, 0),
(73, 'Bus', '2', 'Jelcz', 'M181M', '2 - 2 - 2 - 2', '1997', '1997', 'NIE', 'TAK', 317, 'MEGA', '', 0, 0),
(74, 'Bus', '2', 'Jelcz', 'M181M', '2 - 2 - 2 - 2', '1997', '1997', 'NIE', 'TAK', 318, 'MEGA', '', 0, 0),
(75, 'Bus', '2', 'MAN', 'NG313', '2 - 2 - 2 - 0', '2001', '2017', 'NIE', 'TAK', 319, 'MEGA', 'ex. WSW Wuppertal', 0, 0),
(76, 'Bus', '2', 'MAN', 'NG313', '2 - 2 - 2 - 0', '2001', '2017', 'NIE', 'TAK', 320, 'MEGA', 'ex. WSW Wuppertal', 0, 0),
(77, 'Bus', '2', 'Ikarus', '280.26', '2 - 2 - 2 - 2', '1985', '1985', 'NIE', 'TAK', 321, 'MEGA', '', 0, 0),
(78, 'Bus', '2', 'Ikarus', '280.26', '2 - 2 - 2 - 2', '1987', '1987', 'NIE', 'TAK', 322, 'MEGA', '', 0, 0),
(79, 'Bus', '2', 'Ikarus', '280.26', '2 - 2 - 2 - 2', '1990', '1990', 'NIE', 'TAK', 323, 'MEGA', '', 0, 0),
(80, 'Bus', '2', 'Ikarus', '280.26', '2 - 2 - 2 - 2', '1990', '1990', 'NIE', 'TAK', 324, 'MEGA', '', 0, 0),
(81, 'Bus', '2', 'Ikarus', '435.05C', '2 - 2 - 2 - 2', '1994', '1995', 'NIE', 'TAK', 325, 'MEGA', '', 0, 0),
(82, 'Bus', '2', 'Neoplan', 'N4020', '2 - 2 - 2', '1998', '1998', 'NIE', 'TAK', 327, 'MEGA', '', 0, 0),
(83, 'Bus', '2', 'Neoplan', 'N4020', '2 - 2 - 2', '1998', '1998', 'NIE', 'TAK', 328, 'MEGA', '', 0, 0),
(84, 'Bus', '2', 'Neoplan', 'N4020', '2 - 2 - 2', '1998', '1998', 'NIE', 'TAK', 329, 'MEGA', '', 0, 0),
(85, 'Bus', '2', 'MAN', 'NL313-15', '2 - 2 - 2', '2004', '2008', 'TAK', 'TAK', 331, 'MEGA', 'ex. Oslo', 0, 0),
(86, 'Bus', '2', 'MAN', 'NL313-15', '2 - 2 - 2', '2004', '2008', 'TAK', 'TAK', 332, 'MEGA', 'ex. Oslo', 0, 0),
(87, 'Bus', '2', 'MAN', 'NL313-15', '2 - 2 - 2', '2004', '2008', 'TAK', 'TAK', 333, 'MEGA', 'ex. Oslo', 0, 0),
(88, 'Bus', '2', 'MAN', 'NG312', '2 - 2 - 2 - 2', '1999', '1999', 'TAK', 'TAK', 334, 'MEGA', 'Klimatyzacja kierowcy', 0, 0),
(89, 'Bus', '2', 'MAN', 'NG312', '2 - 2 - 2 - 2', '1999', '2000', 'TAK', 'TAK', 335, 'MEGA', 'Klimatyzacja kierowcy', 0, 0),
(90, 'Bus', '2', 'Neoplan', 'N4021NF', '2 - 2 - 2 - 0', '1994', '2002', 'NIE', 'TAK', 337, 'MEGA', 'ex. Niemcy', 0, 0),
(91, 'Bus', '2', 'MAN', 'NG312', '2 - 2 - 2 - 0', '1995', '2005', 'NIE', 'TAK', 338, 'MEGA', 'ex. KEVAG Koblez', 0, 0),
(92, 'Bus', '2', 'MAN', 'NG312', '2 - 2 - 2 - 0', '1995', '2005', 'NIE', 'TAK', 339, 'MEGA', 'ex. KEVAG Koblez', 0, 0),
(93, 'Bus', '2', 'Volvo', 'B10MA', '2 - 2 - 2 - 2', '1996', '1996', 'NIE', 'TAK', 341, 'MEGA', 'Sta?y przydzia? na linie nocne', 0, 0),
(94, 'Bus', '3', 'Volvo', '7000', '2 - 2 - 2', '2000', '2000', 'NIE', 'NIE', 481, 'MAXI', '', 0, 0),
(95, 'Bus', '3', 'Volvo', '7000', '2 - 2 - 2', '2000', '2000', 'NIE', 'NIE', 482, 'MAXI', '', 0, 0),
(96, 'Bus', '3', 'Volvo', '7000', '2 - 2 - 2', '2000', '2000', 'NIE', 'NIE', 483, 'MAXI', '', 0, 0),
(97, 'Bus', '3', 'Volvo', '7000', '2 - 2 - 2', '2000', '2000', 'NIE', 'NIE', 484, 'MAXI', '', 0, 0),
(98, 'Bus', '3', 'WFA', 'SD228', '2 - 2 - 2 - 2', '1989', '1989', 'NIE', 'NIE', 491, 'MEGA', '', 0, 0),
(99, 'Bus', '3', 'WFA', 'SD228', '2 - 2 - 2 - 2', '1989', '1989', 'NIE', 'NIE', 492, 'MEGA', '', 0, 0),
(100, 'Bus', '3', 'WFA', 'SD228', '2 - 2 - 2 - 2', '1989', '1989', 'NIE', 'NIE', 493, 'MEGA', '', 0, 0),
(101, 'Bus', '3', 'WFA', 'SD228', '2 - 2 - 2 - 2', '1989', '1990', 'NIE', 'NIE', 494, 'MEGA', '', 0, 0),
(102, 'Bus', '3', 'WFA', 'SD228', '2 - 2 - 2 - 2', '1989', '1990', 'NIE', 'NIE', 495, 'MEGA', '', 0, 0),
(103, 'Bus', '3', 'WFA', 'SD228', '2 - 2 - 2 - 2', '1989', '1990', 'NIE', 'NIE', 496, 'MEGA', '', 0, 0),
(104, 'Bus', '3', 'WFA', 'SD228', '2 - 2 - 2 - 2', '1989', '1990', 'NIE', 'NIE', 497, 'MEGA', '', 0, 0),
(105, 'Bus', '3', 'WFA', 'SN218', '2 - 2 - 2', '1989', '1989', 'NIE', 'NIE', 520, 'MAXI', '', 0, 0),
(106, 'Bus', '3', 'WFA', 'SN218', '2 - 2 - 2', '1989', '1989', 'NIE', 'NIE', 521, 'MAXI', '', 0, 0),
(107, 'Bus', '3', 'MAN', 'NG313', '2 - 2 - 2 - 2', '2000', '2000', 'NIE', 'NIE', 541, 'MEGA', '', 0, 0),
(108, 'Bus', '3', 'MAN', 'NG313', '2 - 2 - 2 - 2', '2000', '2000', 'NIE', 'NIE', 542, 'MEGA', '', 0, 0),
(109, 'Bus', '3', 'MAN', 'NG313', '2 - 2 - 2 - 2', '2000', '2000', 'NIE', 'NIE', 543, 'MEGA', '', 0, 0),
(110, 'Bus', '3', 'WFA', 'SN218', '2 - 2 - 2', '1989', '1990', 'NIE', 'NIE', 585, 'MAXI', '', 0, 0),
(111, 'Bus', '3', 'WFA', 'SN218', '2 - 2 - 2', '1989', '1990', 'NIE', 'NIE', 586, 'MAXI', '', 0, 0),
(112, 'Bus', '3', 'WFA', 'SN218', '2 - 2 - 2', '1989', '1990', 'NIE', 'NIE', 587, 'MAXI', '', 0, 0),
(113, 'Bus', '3', 'WFA', 'SN218', '2 - 2 - 2', '1989', '1990', 'NIE', 'NIE', 588, 'MAXI', '', 0, 0),
(114, 'Bus', '3', 'MAN', 'Lion\'s City M', '1 - 2 - 0', '2008', '2019', 'TAK', 'NIE', 612, '', '', 0, 0),
(115, 'Bus', '3', 'MAN', 'Lion\'s City M', '1 - 2 - 0', '2008', '2019', 'TAK', 'NIE', 613, '', '', 0, 0),
(116, 'Bus', '3', 'MAN', 'Lion\'s City M', '1 - 2 - 0', '2008', '2019', 'TAK', 'NIE', 614, '', '', 0, 0),
(117, 'Bus', '3', 'MAN', 'Lion\'s City M', '1 - 2 - 0', '2008', '2019', 'TAK', 'NIE', 615, '', '', 0, 0),
(118, 'Bus', '3', 'Jelcz', 'M083C \'Libero\'', '1 - 2 - 0', '2006', '2006', 'NIE', 'NIE', 626, '', '', 0, 0),
(119, 'Bus', '3', 'Jelcz', 'M083C \'Libero\'', '1 - 2 - 0', '2006', '2006', 'NIE', 'NIE', 627, '', '', 0, 0),
(120, 'Bus', '3', 'Jelcz', 'M083C \'Libero\'', '1 - 2 - 0', '2006', '2006', 'NIE', 'NIE', 628, '', '', 0, 0),
(121, 'Bus', '3', 'Jelcz', 'M121MB', '2 - 2 - 2', '1995', '1996', 'NIE', 'NIE', 630, 'MAXI', '', 0, 0),
(122, 'Bus', '3', 'Jelcz', 'M121MB', '2 - 2 - 2', '1995', '1996', 'NIE', 'NIE', 631, 'MAXI', '', 0, 0),
(123, 'Bus', '3', 'Jelcz', 'M121MB', '2 - 2 - 2', '1995', '1996', 'NIE', 'NIE', 633, 'MAXI', '', 0, 0),
(124, 'Bus', '3', 'Jelcz', 'M121MB', '2 - 2 - 2', '1995', '1996', 'NIE', 'NIE', 634, 'MAXI', '', 0, 0),
(125, 'Bus', '3', 'Jelcz', '120M', '2 - 2 - 2', '1993', '1993', 'NIE', 'NIE', 660, 'MAXI', '', 0, 0),
(126, 'Bus', '3', 'Jelcz', '120M', '2 - 2 - 2', '1993', '1993', 'NIE', 'NIE', 661, 'MAXI', '', 0, 0),
(127, 'Bus', '3', 'Jelcz', '120M', '2 - 2 - 2', '1993', '1994', 'NIE', 'NIE', 663, 'MAXI', '', 0, 0),
(128, 'Bus', '3', 'Jelcz', '120M', '2 - 2 - 2', '1993', '1994', 'NIE', 'NIE', 664, 'MAXI', '', 0, 0),
(129, 'Bus', '3', 'Jelcz', '120M', '2 - 2 - 2', '1994', '1994', 'NIE', 'NIE', 665, 'MAXI', '', 0, 0),
(130, 'Bus', '3', 'Jelcz', '120M', '2 - 2 - 2', '1994', '1995', 'NIE', 'NIE', 668, 'MAXI', '', 0, 0),
(131, 'Bus', '3', 'Jelcz', '120M', '2 - 2 - 2', '1994', '1995', 'NIE', 'NIE', 669, 'MAXI', '', 0, 0),
(132, 'Bus', '3', 'Jelcz', '120M', '2 - 2 - 2', '1994', '1995', 'NIE', 'NIE', 671, 'MAXI', '', 0, 0),
(133, 'Bus', '3', 'Jelcz', '120M', '2 - 2 - 2', '1994', '1995', 'NIE', 'NIE', 673, 'MAXI', '', 0, 0),
(134, 'Bus', '3', 'Jelcz', '120M', '2 - 2 - 2', '1994', '1995', 'NIE', 'NIE', 677, 'MAXI', '', 0, 0),
(135, 'Bus', '3', 'Jelcz', '120M', '2 - 2 - 2', '1994', '1995', 'NIE', 'NIE', 678, 'MAXI', '', 0, 0),
(136, 'Bus', '3', 'Solaris Bus&Coach', 'Urbino 18 II', '2 - 2 - 2 - 2', '2003', '2003', 'NIE', 'NIE', 679, 'MEGA', '', 0, 0),
(137, 'Bus', '3', 'Solaris Bus&Coach', 'Urbino 18 II', '2 - 2 - 2 - 2', '2003', '2003', 'NIE', 'NIE', 680, 'MEGA', '', 0, 0),
(138, 'Bus', '3', 'Solaris Bus&Coach', 'Urbino 18 II', '2 - 2 - 2 - 2', '2003', '2003', 'NIE', 'NIE', 681, 'MEGA', '', 0, 0),
(139, 'Bus', '3', 'Solaris Bus&Coach', 'Urbino 18 II', '2 - 2 - 2 - 2', '2003', '2003', 'NIE', 'NIE', 682, 'MEGA', '', 0, 0),
(140, 'Bus', '3', 'WFA', 'SN122', '2 - 2 - 2', '1982', '1984', 'NIE', 'NIE', 708, 'MAXI', '', 0, 0),
(141, 'Bus', '3', 'Volvo', 'B10BLE', '2 - 2 - 2', '1998', '1998', 'NIE', 'NIE', 731, 'MAXI', '', 0, 0),
(142, 'Bus', '3', 'Volvo', 'B10BLE', '2 - 2 - 2', '1998', '1998', 'NIE', 'NIE', 732, 'MAXI', '', 0, 0),
(143, 'Bus', '3', 'Volvo', 'B10BLE', '2 - 2 - 2', '1998', '1998', 'NIE', 'NIE', 733, 'MAXI', '', 0, 0),
(144, 'Bus', '3', 'Volvo', 'B10BLE', '2 - 2 - 2', '1998', '1998', 'NIE', 'NIE', 734, 'MAXI', '', 0, 0),
(145, 'Bus', '3', 'MAN', 'NL202', '2 - 2 - 2', '1992', '1992', 'NIE', 'NIE', 771, 'MAXI', '', 0, 0),
(146, 'Bus', '3', 'MAN', 'NL202', '2 - 2 - 2', '1992', '1992', 'NIE', 'NIE', 772, 'MAXI', '', 0, 0),
(147, 'Bus', '3', 'MAN', 'NL202', '2 - 2 - 2', '1992', '1992', 'NIE', 'NIE', 773, 'MAXI', '', 0, 0),
(148, 'Bus', '3', 'MAN', 'NL202', '2 - 2 - 2', '1992', '1992', 'NIE', 'NIE', 774, 'MAXI', '', 0, 0),
(149, 'Bus', '3', 'WFA', '12m niskie', '2 - 2 - 2', '', '', 'NIE', 'NIE', 775, 'MAXI', '', 0, 0),
(150, 'Bus', '3', 'Mercedes-Benz', 'Conecto LF E6', '2 - 2 - 2', '2014', '2014', 'TAK', 'NIE', 808, 'MAXI', '', 0, 0),
(151, 'Bus', '3', 'Mercedes-Benz', 'Conecto LF E6', '2 - 2 - 2', '2014', '2014', 'TAK', 'NIE', 809, 'MAXI', '', 0, 0),
(152, 'Bus', '3', 'Ikarus', '280.70E', '2 - 2 - 2 - 2', '1997', '1997', 'NIE', 'NIE', 851, 'MEGA', '', 0, 0),
(153, 'Bus', '3', 'Ikarus', '280.70E', '2 - 2 - 2 - 2', '1997', '1997', 'NIE', 'NIE', 852, 'MEGA', '', 0, 0),
(154, 'Bus', '3', 'Ikarus', '280.70E', '2 - 2 - 2 - 2', '1997', '1997', 'NIE', 'NIE', 853, 'MEGA', '', 0, 0),
(155, 'Bus', '3', 'Ikarus', '280.70E', '2 - 2 - 2 - 2', '1997', '1997', 'NIE', 'NIE', 854, 'MEGA', '', 0, 0),
(156, 'Bus', '3', 'Jelcz', 'M081MB \'Vero\'', '2 - 2 - 2', '2001', '2001', 'NIE', 'NIE', 860, '', '', 0, 0),
(157, 'Bus', '3', 'Jelcz', 'M081MB \'Vero\'', '2 - 2 - 2', '2001', '2001', 'NIE', 'NIE', 861, '', '', 0, 0),
(158, 'Bus', '3', 'Jelcz', 'M081MB \'Vero\'', '2 - 2 - 2', '2001', '2001', 'NIE', 'NIE', 862, '', '', 0, 0),
(159, 'Bus', '3', 'Jelcz', 'M081MB \'Vero\'', '2 - 2 - 2', '2001', '2001', 'NIE', 'NIE', 863, '', '', 0, 0),
(160, 'Bus', '3', 'Jelcz', 'M081MB \'Vero\'', '2 - 2 - 2', '2001', '2001', 'NIE', 'NIE', 864, '', '', 0, 0),
(161, 'Bus', '3', 'WFA', 'SN218', '2 - 2 - 2', '1990', '1990', 'NIE', 'NIE', 865, 'MAXI', '', 0, 0),
(162, 'Bus', '3', 'WFA', 'SN218', '2 - 2 - 2', '1990', '1990', 'NIE', 'NIE', 866, 'MAXI', '', 0, 0),
(163, 'Bus', '3', 'WFA', 'SN218', '2 - 2 - 2', '1990', '1990', 'NIE', 'NIE', 867, 'MAXI', '', 0, 0),
(164, 'Bus', '3', 'WFA', 'SN218', '2 - 2 - 2', '1990', '1990', 'NIE', 'NIE', 868, 'MAXI', '', 0, 0),
(165, 'Bus', '3', 'Lotus', 'Civitas 12 II LF CNG', '2 - 2 - 2', '2020', '2020', 'TAK', 'NIE', 891, 'MAXI', '', 0, 0),
(166, 'Bus', '3', 'Lotus', 'Civitas 12 II LF CNG', '2 - 2 - 2', '2020', '2020', 'TAK', 'NIE', 892, 'MAXI', '', 0, 0),
(167, 'Bus', '3', 'Lotus', 'Civitas 12 II LF CNG', '2 - 2 - 2', '2020', '2020', 'TAK', 'NIE', 893, 'MAXI', '', 0, 0),
(168, 'Bus', '3', 'Lotus', 'Civitas 12 II LF CNG', '2 - 2 - 2', '2020', '2020', 'TAK', 'NIE', 894, 'MAXI', '', 0, 0),
(169, 'Bus', '3', 'Hunter Bus&Coach', 'ModernCity 12 IV LF', '2 - 2 - 2', '2020', '2020', 'TAK', 'NIE', 901, 'MAXI', '', 0, 0),
(170, 'Bus', '3', 'Hunter Bus&Coach', 'ModernCity 12 IV LF', '2 - 2 - 2', '2020', '2020', 'TAK', 'NIE', 902, 'MAXI', '', 0, 0),
(171, 'Bus', '3', 'Hunter Bus&Coach', 'ModernCity III 15 LF', '2 - 2 - 2', '2017', '2020', 'TAK', 'NIE', 903, 'MEGA', '', 0, 0),
(172, 'Bus', '3', 'Hunter Bus&Coach', 'Flamingo 18 II LF', '2 - 2 - 2 - 2', '2019', '2020', 'TAK', 'NIE', 904, 'MEGA', '', 0, 0),
(173, 'Bus', '3', 'Hunter Bus&Coach', 'Flamingo 18 II LF', '2 - 2 - 2 - 2', '2019', '2020', 'TAK', 'NIE', 905, 'MEGA', '', 0, 0),
(174, 'Bus', '5', 'Jelcz', '120M', '2 - 2 - 2', '1994', '1994', 'NIE', 'NIE', 0, 'MAXI', '', 0, 0),
(175, 'Bus', '5', 'Jelcz', '120M', '2 - 2 - 2', '1994', '1994', 'NIE', 'NIE', 1, 'MAXI', '', 0, 0),
(176, 'Bus', '5', 'Jelcz', '120M', '2 - 2 - 2', '1995', '1995', 'NIE', 'NIE', 3, 'MAXI', '', 0, 0),
(177, 'Bus', '5', 'Jelcz', '120M', '2 - 2 - 2', '1995', '1995', 'NIE', 'NIE', 4, 'MAXI', '', 0, 0),
(178, 'Bus', '5', 'Jelcz', '120M', '2 - 2 - 2', '1995', '1995', 'NIE', 'NIE', 5, 'MAXI', '', 0, 0),
(179, 'Bus', '5', 'Jelcz', '120M', '2 - 2 - 2', '1995', '1995', 'NIE', 'NIE', 6, 'MAXI', '', 0, 0),
(180, 'Bus', '5', 'Jelcz', '120M', '2 - 2 - 2', '1995', '1995', 'NIE', 'NIE', 7, 'MAXI', '', 0, 0),
(181, 'Bus', '5', 'Jelcz', '120M', '2 - 2 - 2', '1994', '1994', 'NIE', 'NIE', 8, 'MAXI', '', 0, 0),
(182, 'Bus', '5', 'Jelcz', '120M', '2 - 2 - 2', '1994', '1994', 'NIE', 'NIE', 9, 'MAXI', '', 0, 0),
(183, 'Bus', '5', 'Jelcz', '120M', '2 - 2 - 2', '1994', '1994', 'NIE', 'NIE', 10, 'MAXI', '', 0, 0),
(184, 'Bus', '5', 'Jelcz', 'M121M', '2 - 2 - 2', '1996', '1996', 'NIE', 'NIE', 11, 'MAXI', 'Dofinansowany przez stowarzyszenie os?b niepe?nosprawnych', 0, 0),
(185, 'Bus', '5', 'Jelcz', 'M081MB', '2 - 2', '2000', '2000', 'NIE', 'NIE', 12, '', '', 0, 0),
(186, 'Bus', '5', 'Jelcz', 'M081MB', '2 - 2 ', '2000', '2000', 'NIE', 'NIE', 13, '', '', 0, 0),
(187, 'Bus', '5', 'Jelcz', 'M081MB', '2 - 2 ', '2000', '2000', 'NIE', 'NIE', 15, '', '', 0, 0),
(188, 'Bus', '5', 'Autosan', 'H6-20.01', '0-2-0', '1999', '1999', 'NIE', 'NIE', 16, '', '', 0, 0),
(189, 'Bus', '5', 'MAN', 'NG312', '2-2-2-2', '1998', '1998', 'NIE', 'NIE', 17, 'MEGA', '', 0, 0),
(190, 'Bus', '5', 'MAN', 'NG312', '2-2-2-2', '1998', '1998', 'NIE', 'NIE', 18, 'MEGA', '', 0, 0),
(191, 'Bus', '5', 'Solaris', 'Urbino 12 III', '2 - 2 - 2', '2014', '2014', 'TAK', 'TAK', 19, 'MAXI', 'Dofinansowanie z UE', 0, 0),
(192, 'Bus', '5', 'Solaris', 'Urbino 12 III', '2 - 2 - 2', '2014', '2014', 'TAK', 'TAK', 20, 'MAXI', 'Dofinansowanie z UE', 0, 0),
(193, 'Bus', '5', 'MAN', 'NG312', '2-2-2-2', '1998', '1998', 'NIE', 'NIE', 21, 'MEGA', '', 0, 0),
(194, 'Bus', '5', 'Volvo', '7700', '2 - 2 - 2', '2005', '2005', 'TAK', 'NIE', 22, 'MAXI', '', 0, 0),
(195, 'Bus', '5', 'MAN', 'Lion\'s City NL283', '2 - 2 - 2', '2006', '2015', 'NIE', 'NIE', 23, 'MAXI', 'ex. MZK Toru? #542 po przer?bkach warsztatowych PK', 0, 0),
(196, 'Bus', '5', 'Neoplan', 'N4007', '1-2-0', '1997', '2019', 'NIE', 'NIE', 24, '', 'ex. Wawer', 0, 0),
(197, 'Bus', '5', 'Jelcz', 'M083C Libero', '1-2-0', '2008', '2018', 'TAK', 'NIE', 25, '', 'ex. Mobilis A190', 0, 0),
(198, 'Bus', '5', 'Jelcz', 'M181MB', '2-2-2-2', '1996', '1996', 'NIE', 'NIE', 26, 'MEGA', 'Dofinansowany przez stowarzyszenie os?b niepe?nosprawnych', 0, 0),
(199, 'Bus', '5', 'Autosan', 'H7-20.01', '2 - 2 ', '2000', '2000', 'NIE', 'NIE', 27, '', 'ex. MZK Gorz?w Wiktorowski 101', 0, 0),
(200, 'Bus', '5', 'Autosan', 'H7-20.01', '2 - 2 ', '2000', '2001', 'NIE', 'NIE', 28, '', 'ex. MZK Gorz?w Wiktorowski 103', 0, 0),
(201, 'Tram', '2', 'aaa', 'aaa', '2-2-2', '2000', '2000', 'TAK', 'TAK', 987, 'MAXI', 'test', 0, 0),
(208, 'Tram', '2', 'aaa', 'aaa', '2-2-2', '2000', '2000', 'TAK', 'TAK', 888, 'MAXI', 'test', 1, NULL),
(209, 'Tram', '2', 'Hunter', 'CFII328G ZR', '1 - 2|2|2 - 1', '2020', '2020', 'TAK', 'TAK', 62, 'Wagon', 'Kupiony z UE', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `workshop`
--

CREATE TABLE `workshop` (
  `id` int(11) NOT NULL,
  `id_pojazdu` int(11) NOT NULL,
  `powod` longtext COLLATE utf8_polish_ci,
  `data_roz` datetime DEFAULT NULL,
  `data_zak` datetime DEFAULT NULL,
  `miasto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `workshop`
--

INSERT INTO `workshop` (`id`, `id_pojazdu`, `powod`, `data_roz`, `data_zak`, `miasto`) VALUES
(1, 1, 'fsdagfgsdgsd', '2020-02-02 00:00:00', '2021-02-02 00:00:00', 2),
(2, 8, '10', '2020-01-01 00:00:00', '2023-02-02 00:00:00', 2);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `timetable_course`
--
ALTER TABLE `timetable_course`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `timetable_course`
--
ALTER TABLE `timetable_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT dla tabeli `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT dla tabeli `workshop`
--
ALTER TABLE `workshop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
