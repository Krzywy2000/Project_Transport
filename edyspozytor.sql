-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 20 Lut 2020, 00:49
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
  `miasto` text COLLATE utf8_polish_ci,
  `czas_przejazdu` int(11) DEFAULT NULL,
  `uwagi` text COLLATE utf8_polish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `destination`
--

INSERT INTO `destination` (`id`, `relacja`, `numer_linii`, `miasto`, `czas_przejazdu`, `uwagi`) VALUES
(1, 'Zajezdnia - Dworzec Główny PKP', NULL, 'Gorzow Wiktorowski', 14, 'Wyjazd z zajezdni'),
(2, 'Dworzec Główny PKP', NULL, 'Gorzow Wiktorowski', 14, 'Zjazd do zajezdni');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `id_timetable` int(11) DEFAULT NULL,
  `numer_pojazdu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `nazwa_zm` text COLLATE utf8_polish_ci,
  `godz_roz` text COLLATE utf8_polish_ci,
  `godz_zak` text COLLATE utf8_polish_ci,
  `rodzaj` text COLLATE utf8_polish_ci,
  `uwagi` longtext COLLATE utf8_polish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `timetable_course`
--

CREATE TABLE `timetable_course` (
  `id` int(11) NOT NULL,
  `id_timetable` int(11) DEFAULT NULL,
  `nr_kursu` int(11) DEFAULT NULL,
  `id_destination` int(11) DEFAULT NULL,
  `godz_roz` text COLLATE utf8_polish_ci,
  `godz_zak` text COLLATE utf8_polish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

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
(4, 'Kamil', 'Pikuła', 'kpikula', '', '', 4),
(5, 'Piotr', 'Mański', 'pmanski', '', '', 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `typ_pojazdu` text COLLATE utf8_polish_ci,
  `miasto` text COLLATE utf8_polish_ci NOT NULL,
  `marka` text COLLATE utf8_polish_ci,
  `model` text COLLATE utf8_polish_ci,
  `uklad_drzwi` text COLLATE utf8_polish_ci,
  `rocznik` text COLLATE utf8_polish_ci,
  `rok_wprowadzenia` text COLLATE utf8_polish_ci,
  `klimatyzacja` text COLLATE utf8_polish_ci,
  `biletomat` text COLLATE utf8_polish_ci,
  `numer_tab` int(11) DEFAULT NULL,
  `uwagi` longtext COLLATE utf8_polish_ci,
  `id_workshop` int(11) DEFAULT NULL,
  `id_timetable` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `vehicles`
--

INSERT INTO `vehicles` (`id`, `typ_pojazdu`, `miasto`, `marka`, `model`, `uklad_drzwi`, `rocznik`, `rok_wprowadzenia`, `klimatyzacja`, `biletomat`, `numer_tab`, `uwagi`, `id_workshop`, `id_timetable`) VALUES
(1, 'Bus', 'Gorzow Wiktorowski', 'Autosan', 'H7-20.01', '2  - 0', '2000', '2000', 'NIE', 'TAK', 102, '', 0, 0),
(2, 'Bus', 'Gorzow Wiktorowski', 'MAN', 'NM223', '1 - 2 - 0', '1999', '2014', 'NIE', 'TAK', 104, '', 0, 0),
(3, 'Bus', 'Gorzow Wiktorowski', 'Jelcz', 'M11', '2 - 2 - 2 ', '1987', '1987', 'NIE', 'TAK', 105, '', 0, 0),
(4, 'Bus', 'Gorzow Wiktorowski', 'Jelcz', 'M11', '2 - 2 - 2 ', '1987', '1987', 'NIE', 'TAK', 106, '', 0, 0),
(5, 'Bus', 'Gorzow Wiktorowski', 'Jelcz', 'M11', '2 - 2 - 2 ', '1987', '1987', 'NIE', 'TAK', 107, '', 0, 0),
(6, 'Bus', 'Gorzow Wiktorowski', 'Solaris', 'Urbino 10 III', '1 - 2 - 0', '2017', '2018', 'TAK', 'TAK', 108, 'Z dotacji UE', 0, 0),
(7, 'Bus', 'Gorzow Wiktorowski', 'Solaris', 'Urbino 10 III', '1 - 2 - 0', '2017', '2018', 'TAK', 'TAK', 109, 'Z dotacji UE', 0, 0),
(8, 'Bus', 'Gorzow Wiktorowski', 'Solaris', 'Urbino 8,9 III LE', '1 - 2 - 0', '2019', '2020', 'TAK', 'TAK', 110, 'Z dotacji UE', 0, 0),
(9, 'Bus', 'Gorzow Wiktorowski', 'Solaris', 'Urbino 8,9 III LE', '1 - 2 - 0', '2019', '2020', 'TAK', 'TAK', 111, 'Z dotacji UE', 0, 0),
(10, 'Bus', 'Gorzow Wiktorowski', 'Jelcz', '120MM/2', '2 - 2 - 2 ', '1994', '1994', 'NIE', 'TAK', 201, '', 0, 0),
(11, 'Bus', 'Gorzow Wiktorowski', 'Jelcz', '120MM/2', '2 - 2 - 2 ', '2000', '2000', 'NIE', 'TAK', 202, '', 0, 0),
(12, 'Bus', 'Gorzow Wiktorowski', 'Jelcz', '120MM/2', '2 - 2 - 2 ', '2001', '2001', 'NIE', 'TAK', 203, '', 1, 0),
(13, 'Bus', 'Gorzow Wiktorowski', 'Jelcz', '120MM/2', '2 - 2 - 2 ', '2001', '2001', 'NIE', 'TAK', 204, '', 0, 0),
(14, 'Bus', 'Gorzow Wiktorowski', 'Jelcz', '120MM/2', '2 - 2 - 2 ', '2002', '2002', 'NIE', 'TAK', 205, '', 0, 0),
(15, 'Bus', 'Gorzow Wiktorowski', 'Jelcz', '120MM/2', '2 - 2 - 2 ', '2002', '2003', 'NIE', 'TAK', 206, '', 0, 0),
(16, 'Bus', 'Gorzow Wiktorowski', 'Jelcz', 'M121M', '2 - 2 - 2 ', '1996', '1996', 'NIE', 'TAK', 207, '', 0, 0),
(17, 'Bus', 'Gorzow Wiktorowski', 'Jelcz', 'M121M', '2 - 2 - 2 ', '1999', '1999', 'NIE', 'TAK', 208, '', 0, 0),
(18, 'Bus', 'Gorzow Wiktorowski', 'Jelcz', 'M121M', '2 - 2 - 2 ', '1999', '1999', 'NIE', 'TAK', 209, '', 0, 0),
(19, 'Bus', 'Gorzow Wiktorowski', 'Jelcz', 'M121M', '2 - 2 - 2 ', '1999', '1999', 'NIE', 'TAK', 210, '', 0, 0),
(20, 'Bus', 'Gorzow Wiktorowski', 'Jelcz', '120M', '2 - 2 - 2 ', '1992', '1992', 'NIE', 'TAK', 212, '', 0, 0),
(21, 'Bus', 'Gorzow Wiktorowski', 'Jelcz', '120M', '2 - 2 - 2 ', '1992', '1992', 'NIE', 'TAK', 213, '', 0, 0),
(22, 'Bus', 'Gorzow Wiktorowski', 'Ikarus', '260.04', '2 - 2 - 2 ', '1988', '1988', 'NIE', 'TAK', 214, '', 0, 0),
(23, 'Bus', 'Gorzow Wiktorowski', 'Ikarus', '260.30A', '2 - 2 - 2 ', '1996', '1996', 'NIE', 'TAK', 215, '', 0, 0),
(24, 'Bus', 'Gorzow Wiktorowski', 'Ikarus', '260.30A', '2 - 2 - 2 ', '1996', '1996', 'NIE', 'TAK', 216, '', 0, 0),
(25, 'Bus', 'Gorzow Wiktorowski', 'Mercedes-Benz', 'O405N2', '2 - 2 - 0', '1997', '2008', 'NIE', 'TAK', 217, '', 0, 0),
(26, 'Bus', 'Gorzow Wiktorowski', 'Mercedes-Benz', 'O405N2', '2 - 2 - 2 ', '1999', '2012', 'NIE', 'TAK', 218, '', 0, 0),
(27, 'Bus', 'Gorzow Wiktorowski', 'MAN', 'NL222', '2 - 2 - 2 ', '2000', '2000', 'NIE', 'TAK', 219, '', 0, 0),
(28, 'Bus', 'Gorzow Wiktorowski', 'MAN', 'NL222', '2 - 2 - 2 ', '2000', '2000', 'NIE', 'TAK', 220, '', 0, 0),
(29, 'Bus', 'Gorzow Wiktorowski', 'MAN', 'NL223', '2 - 2 - 2 ', '2002', '2002', 'NIE', 'TAK', 221, '', 0, 0),
(30, 'Bus', 'Gorzow Wiktorowski', 'MAN', 'NL223', '2 - 2 - 2 ', '2002', '2002', 'NIE', 'TAK', 222, '', 0, 0),
(31, 'Bus', 'Gorzow Wiktorowski', 'MAN', 'NL223', '2 - 2 - 2 ', '2002', '2002', 'NIE', 'TAK', 223, '', 0, 0),
(32, 'Bus', 'Gorzow Wiktorowski', 'MAN', 'NL223', '2 - 2 - 2 ', '2002', '2003', 'NIE', 'TAK', 224, '', 0, 0),
(33, 'Bus', 'Gorzow Wiktorowski', 'MAN', 'NL263', '2 - 2 - 2 ', '2004', '2013', 'TAK', 'TAK', 225, 'ex. Oslo', 0, 0),
(34, 'Bus', 'Gorzow Wiktorowski', 'MAN', 'NL263', '2 - 2 - 2 ', '2004', '2013', 'TAK', 'TAK', 226, 'ex. Oslo', 0, 0),
(35, 'Bus', 'Gorzow Wiktorowski', 'MAN', 'NL262', '2 - 2 - 0', '1997', '2010', 'NIE', 'TAK', 228, 'ex. Oslo', 0, 0),
(36, 'Bus', 'Gorzow Wiktorowski', 'MAN', 'NL263', '2 - 2 - 0', '1999', '2016', 'NIE', 'TAK', 229, 'ex. Niemcy', 0, 0),
(37, 'Bus', 'Gorzow Wiktorowski', 'Volvo/Vest', 'B7RLE/Center', '2 - 2 - 2 ', '2009', '2019', 'TAK', '-', 230, 'ex. Unibuss Oslo', 0, 0),
(38, 'Bus', 'Gorzow Wiktorowski', 'Volvo/Vest', 'B7RLE/Center', '2 - 2 - 2 ', '2009', '2019', 'TAK', '-', 231, 'ex. Unibuss Oslo', 0, 0),
(39, 'Bus', 'Gorzow Wiktorowski', 'Solaris', 'Urbino 12 II', '2 - 2 - 2 ', '2004', '2019', 'TAK', 'TAK', 234, 'ex. Winterthur', 0, 0),
(40, 'Bus', 'Gorzow Wiktorowski', 'Volvo', 'B10BLE', '2 - 2 - 2 ', '1997', '1997', '', 'TAK', 235, '', 0, 0),
(41, 'Bus', 'Gorzow Wiktorowski', 'Volvo', 'B10BLE', '2 - 2 - 2 ', '1997', '1997', 'NIE', 'TAK', 236, '', 0, 0),
(42, 'Bus', 'Gorzow Wiktorowski', 'Volvo', 'B10BLE', '2 - 2 - 2 ', '1997', '1997', 'NIE', 'TAK', 237, '', 0, 0),
(43, 'Bus', 'Gorzow Wiktorowski', 'Solaris', 'Urbino 12 III', '2 - 2 - 2 ', '2007', '2007', 'NIE', 'TAK', 238, '', 0, 0),
(44, 'Bus', 'Gorzow Wiktorowski', 'Solaris', 'Urbino 12 III', '2 - 2 - 2 ', '2007', '2007', 'NIE', 'TAK', 239, '', 0, 0),
(45, 'Bus', 'Gorzow Wiktorowski', 'Solaris', 'Urbino 12 III', '2 - 2 - 2 ', '2007', '2007', 'NIE', 'TAK', 240, '', 0, 0),
(46, 'Bus', 'Gorzow Wiktorowski', 'Solaris', 'Urbino 12 III', '2 - 2 - 2 ', '2007', '2007', 'NIE', 'TAK', 241, '', 0, 0),
(47, 'Bus', 'Gorzow Wiktorowski', 'Solaris', 'Urbino 12 III', '2 - 2 - 2 ', '2017', '2017', 'TAK', 'TAK', 242, 'Z dotacji UE', 0, 0),
(48, 'Bus', 'Gorzow Wiktorowski', 'Solaris', 'Urbino 12 III', '2 - 2 - 2 ', '2017', '2017', 'TAK', 'TAK', 243, 'Z dotacji UE', 0, 0),
(49, 'Bus', 'Gorzow Wiktorowski', 'Solaris', 'Urbino 12 III', '2 - 2 - 2 ', '2017', '2017', 'TAK', 'TAK', 244, 'Z dotacji UE', 0, 0),
(50, 'Bus', 'Gorzow Wiktorowski', 'Solaris', 'Urbino 12 III', '2 - 2 - 0', '2006', '2019', 'NIE', 'TAK', 245, '', 0, 0),
(51, 'Bus', 'Gorzow Wiktorowski', 'Solaris', 'Urbino 12 III', '2 - 2 - 0', '2006', '2019', 'NIE', 'TAK', 246, '', 0, 0),
(52, 'Bus', 'Gorzow Wiktorowski', 'Solaris', 'Urbino 12 III', '2 - 2 - 0', '2006', '2019', 'NIE', 'TAK', 247, '', 0, 0),
(53, 'Bus', 'Gorzow Wiktorowski', 'Jelcz', 'PR110M', '2 - 2 - 2 ', '1988', '1988', 'NIE', 'TAK', 251, '', 0, 0),
(54, 'Bus', 'Gorzow Wiktorowski', 'Jelcz', 'PR110M', '2 - 2 - 2 ', '1988', '1988', 'NIE', 'TAK', 252, '', 0, 0),
(55, 'Bus', 'Gorzow Wiktorowski', 'Jelcz', 'PR110M', '2 - 2 - 2 ', '1987', '1988', 'NIE', 'TAK', 253, '', 0, 0),
(56, 'Bus', 'Gorzow Wiktorowski', 'Jelcz', 'PR110M', '2 - 2 - 2 ', '1988', '1988', 'NIE', 'TAK', 254, '', 0, 0),
(57, 'Bus', 'Gorzow Wiktorowski', 'Jelcz', 'PR110M', '2 - 2 - 2 ', '1987', '1987', 'NIE', 'TAK', 255, '', 0, 0),
(58, 'Bus', 'Gorzow Wiktorowski', 'Jelcz', 'PR110M', '2 - 2 - 2 ', '1988', '1988', 'NIE', 'TAK', 256, '', 0, 0),
(59, 'Bus', 'Gorzow Wiktorowski', 'Jelcz', 'PR110M', '2 - 2 - 2 ', '1988', '1988', 'NIE', 'TAK', 257, '', 0, 0),
(60, 'Bus', 'Gorzow Wiktorowski', 'Mercedes-Benz', 'O530', '2 - 2 - 0', '2003', '2019', 'TAK', 'TAK', 261, 'Do przewoz?w szkolnych', 0, 0),
(61, 'Bus', 'Gorzow Wiktorowski', 'Solaris', 'Urbino 18 III', '2 - 2 - 2 - 2', '2007', '2007', 'NIE', 'TAK', 301, '', 0, 0),
(62, 'Bus', 'Gorzow Wiktorowski', 'Solaris', 'Urbino 18 III', '2 - 2 - 2 - 2', '2007', '2007', 'NIE', 'TAK', 302, '', 0, 0),
(63, 'Bus', 'Gorzow Wiktorowski', 'Solaris', 'Urbino 18 III', '2 - 2 - 2 - 2', '2007', '2007', 'NIE', 'TAK', 303, '', 0, 0),
(64, 'Bus', 'Gorzow Wiktorowski', 'Solaris', 'Urbino 18 III', '2 - 2 - 2 - 2', '2012', '2012', 'TAK', 'TAK', 304, '', 0, 0),
(65, 'Bus', 'Gorzow Wiktorowski', 'Solaris', 'Urbino 18 III', '2 - 2 - 2 - 2', '2012', '2012', 'TAK', 'TAK', 305, '', 0, 0),
(66, 'Bus', 'Gorzow Wiktorowski', 'Solaris', 'Urbino 18 III', '2 - 2 - 2 - 2', '2017', '2017', 'TAK', 'TAK', 306, 'Z dotacji UE', 0, 0),
(67, 'Bus', 'Gorzow Wiktorowski', 'Solaris', 'Urbino 18 III', '2 - 2 - 2 - 0', '2008', '2018', 'TAK', 'TAK', 307, 'ex. BVG Berlin', 0, 0),
(68, 'Bus', 'Gorzow Wiktorowski', 'Solaris', 'Urbino 18 IV', '2 - 2 - 2 - 2', '2019', '2019', 'TAK', 'TAK', 308, 'Z dotacji UE', 0, 0),
(69, 'Bus', 'Gorzow Wiktorowski', 'Solaris', 'Urbino 18 II', '2 - 2 - 2 - 2', '2004', '2020', 'TAK', 'TAK', 309, 'ex. Winterthur', 0, 0),
(70, 'Bus', 'Gorzow Wiktorowski', 'Solaris', 'Urbino 15 III', '2 - 2 - 2 ', '2017', '2018', 'TAK', 'TAK', 311, 'Z dotacji UE', 0, 0),
(71, 'Bus', 'Gorzow Wiktorowski', 'Solaris', 'Urbino 15 III', '2 - 2 - 2 ', '2017', '2018', 'TAK', 'TAK', 312, 'Z dotacji UE', 0, 0),
(72, 'Bus', 'Gorzow Wiktorowski', 'Jelcz', 'M181M', '2 - 2 - 2 - 2', '1995', '1996', 'NIE', 'TAK', 316, '', 0, 0),
(73, 'Bus', 'Gorzow Wiktorowski', 'Jelcz', 'M181M', '2 - 2 - 2 - 2', '1997', '1997', 'NIE', 'TAK', 317, '', 0, 0),
(74, 'Bus', 'Gorzow Wiktorowski', 'Jelcz', 'M181M', '2 - 2 - 2 - 2', '1997', '1997', 'NIE', 'TAK', 318, '', 0, 0),
(75, 'Bus', 'Gorzow Wiktorowski', 'MAN', 'NG313', '2 - 2 - 2 - 0', '2001', '2017', 'NIE', 'TAK', 319, 'ex. WSW Wuppertal', 0, 0),
(76, 'Bus', 'Gorzow Wiktorowski', 'MAN', 'NG313', '2 - 2 - 2 - 0', '2001', '2017', 'NIE', 'TAK', 320, 'ex. WSW Wuppertal', 0, 0),
(77, 'Bus', 'Gorzow Wiktorowski', 'Ikarus', '280.26', '2 - 2 - 2 - 2', '1985', '1985', 'NIE', 'TAK', 321, '', 0, 0),
(78, 'Bus', 'Gorzow Wiktorowski', 'Ikarus', '280.26', '2 - 2 - 2 - 2', '1987', '1987', 'NIE', 'TAK', 322, '', 0, 0),
(79, 'Bus', 'Gorzow Wiktorowski', 'Ikarus', '280.26', '2 - 2 - 2 - 2', '1990', '1990', 'NIE', 'TAK', 323, '', 0, 0),
(80, 'Bus', 'Gorzow Wiktorowski', 'Ikarus', '280.26', '2 - 2 - 2 - 2', '1990', '1990', 'NIE', 'TAK', 324, '', 0, 0),
(81, 'Bus', 'Gorzow Wiktorowski', 'Ikarus', '435.05C', '2 - 2 - 2 - 2', '1994', '1995', 'NIE', 'TAK', 325, '', 0, 0),
(82, 'Bus', 'Gorzow Wiktorowski', 'Neoplan', 'N4020', '2  - 2 - 2 ', '1998', '1998', 'NIE', 'TAK', 327, '', 0, 0),
(83, 'Bus', 'Gorzow Wiktorowski', 'Neoplan', 'N4020', '2  - 2 - 2 ', '1998', '1998', 'NIE', 'TAK', 328, '', 0, 0),
(84, 'Bus', 'Gorzow Wiktorowski', 'Neoplan', 'N4020', '2  - 2 - 2 ', '1998', '1998', 'NIE', 'TAK', 329, '', 0, 0),
(85, 'Bus', 'Gorzow Wiktorowski', 'MAN', 'NL313-15', '2  - 2 - 2 ', '2004', '2008', 'TAK', 'TAK', 331, 'ex. Oslo', 0, 0),
(86, 'Bus', 'Gorzow Wiktorowski', 'MAN', 'NL313-15', '2  - 2 - 2 ', '2004', '2008', 'TAK', 'TAK', 332, 'ex. Oslo', 0, 0),
(87, 'Bus', 'Gorzow Wiktorowski', 'MAN', 'NL313-15', '2  - 2 - 2 ', '2004', '2008', 'TAK', 'TAK', 333, 'ex. Oslo', 0, 0),
(88, 'Bus', 'Gorzow Wiktorowski', 'MAN', 'NG312', '2 - 2 - 2 - 2', '1999', '1999', 'TAK', 'TAK', 334, 'Klimatyzacja kierowcy', 0, 0),
(89, 'Bus', 'Gorzow Wiktorowski', 'MAN', 'NG312', '2 - 2 - 2 - 2', '1999', '2000', 'TAK', 'TAK', 335, 'Klimatyzacja kierowcy', 0, 0),
(90, 'Bus', 'Gorzow Wiktorowski', 'Neoplan', 'N4021NF', '2 - 2 - 2 - 0', '1994', '2002', 'NIE', 'TAK', 337, 'ex. Niemcy', 0, 0),
(91, 'Bus', 'Gorzow Wiktorowski', 'MAN', 'NG312', '2 - 2 - 2 - 0', '1995', '2005', 'NIE', 'TAK', 338, 'ex. KEVAG Koblez', 0, 0),
(92, 'Bus', 'Gorzow Wiktorowski', 'MAN', 'NG312', '2 - 2 - 2 - 0', '1995', '2005', 'NIE', 'TAK', 339, 'ex. KEVAG Koblez', 0, 0),
(93, 'Bus', 'Gorzow Wiktorowski', 'Volvo', 'B10MA', '2 - 2 - 2 - 2', '1996', '1996', 'NIE', 'TAK', 341, 'Sta?y przydzia? na linie nocne', 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `workshop`
--

CREATE TABLE `workshop` (
  `id` int(11) NOT NULL,
  `id_pojazdu` int(11) NOT NULL,
  `powod` longtext COLLATE utf8_polish_ci,
  `data_roz` datetime DEFAULT NULL,
  `data_zak` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `workshop`
--

INSERT INTO `workshop` (`id`, `id_pojazdu`, `powod`, `data_roz`, `data_zak`) VALUES
(1, 12, 'Wymiana skrzyni', '2020-02-19 00:00:00', '2020-02-27 00:00:00');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_timetable` (`id_timetable`);

--
-- Indeksy dla tabeli `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `timetable_course`
--
ALTER TABLE `timetable_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_timetable` (`id_timetable`,`id_destination`),
  ADD KEY `id_destination` (`id_destination`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_workshop` (`id_workshop`,`id_timetable`);

--
-- Indeksy dla tabeli `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pojazdu` (`id_pojazdu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `destination`
--
ALTER TABLE `destination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `timetable_course`
--
ALTER TABLE `timetable_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT dla tabeli `workshop`
--
ALTER TABLE `workshop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`id_timetable`) REFERENCES `timetable` (`id`);

--
-- Ograniczenia dla tabeli `timetable_course`
--
ALTER TABLE `timetable_course`
  ADD CONSTRAINT `timetable_course_ibfk_1` FOREIGN KEY (`id_destination`) REFERENCES `destination` (`id`),
  ADD CONSTRAINT `timetable_course_ibfk_2` FOREIGN KEY (`id_timetable`) REFERENCES `timetable` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
