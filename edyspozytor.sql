-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Lut 2020, 21:20
-- Wersja serwera: 10.1.37-MariaDB
-- Wersja PHP: 7.3.1

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
-- Struktura tabeli dla tabeli `timetables_gw`
--

CREATE TABLE `timetables_gw` (
  `id` int(11) NOT NULL,
  `nr_zadania` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `godz_roz` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `godz_kon` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `id_przydzial` int(11) NOT NULL,
  `uwagi` mediumtext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `timetables_gw`
--

INSERT INTO `timetables_gw` (`id`, `nr_zadania`, `godz_roz`, `godz_kon`, `id_przydzial`, `uwagi`) VALUES
(1, '1/01/R', '4:42', '21:23', 0, '');

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
(2, 'Wiktor', 'Wiese', 'wwiese', 'Krzywy2000', 'wiktorwiese2000@gmail.com', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `type` enum('tram','bus') COLLATE utf8_polish_ci DEFAULT 'bus',
  `marka` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `model` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `rocznik` year(4) NOT NULL,
  `rok_wprowadzenia` year(4) NOT NULL,
  `uklad_drzwi` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `klimatyzacja` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `biletomat` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `numer_tab` int(11) NOT NULL,
  `id_brygady` int(11) DEFAULT NULL,
  `uwagi` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `in_workshop` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `vehicles`
--

INSERT INTO `vehicles` (`id`, `type`, `marka`, `model`, `rocznik`, `rok_wprowadzenia`, `uklad_drzwi`, `klimatyzacja`, `biletomat`, `numer_tab`, `id_brygady`, `uwagi`, `in_workshop`) VALUES
(1, 'bus', 'Autosan', 'H7-20.01', 2000, 2000, '2 - 2', '-', '+', 102, 0, '', 1),
(2, 'bus', 'MAN', 'NM223', 1999, 2014, '1 - 2 - 0', '-', '+', 104, 0, '', 1),
(3, 'bus', 'Jelcz', 'M11', 1987, 1987, '2  - 2 - 2', '-', '+', 105, 0, '', 1),
(4, 'bus', 'Jelcz', 'M11', 1987, 1987, '2  - 2 - 2', '-', '+', 106, 0, '', 0),
(5, 'bus', 'Jelcz', 'M11', 1987, 1987, '2  - 2 - 2', '-', '+', 107, 0, '', 0),
(6, 'bus', 'Solaris', 'Urbino 10 III', 2017, 2018, '1 - 2 - 2', '+', '+', 108, 0, 'Z dotacji UE', 0),
(7, 'bus', 'Solaris', 'Urbino 10 III', 2017, 2018, '1 - 2 - 2', '+', '+', 109, 0, 'Z dotacji UE', 0),
(8, 'bus', 'Solaris', 'Urbino 8,9 III LE', 2019, 2020, '1 - 2 - 0', '+', '+', 110, 0, 'Z dotacji UE', 0),
(9, 'bus', 'Solaris', 'Urbino 8,9 III LE', 2019, 2020, '1 - 2 - 0', '+', '+', 111, 0, 'Z dotacji UE', 0),
(10, 'bus', 'Jelcz', '120M', 1994, 1994, '2  - 2 - 2', '-', '+', 201, 0, '', 0),
(11, 'bus', 'Jelcz', '120MM/2', 2000, 2000, '2  - 2 - 2', '-', '+', 202, 0, '', 0),
(12, 'bus', 'Jelcz', '120MM/2', 2001, 2001, '2  - 2 - 2', '-', '+', 203, 0, '', 0),
(13, 'bus', 'Jelcz', '120MM/2', 2001, 2001, '2  - 2 - 2', '-', '+', 204, 0, '', 0),
(14, 'bus', 'Jelcz', '120MM/2', 2002, 2002, '2  - 2 - 2', '-', '+', 205, 0, '', 0),
(15, 'bus', 'Jelcz', '120MM/2', 2002, 2003, '2  - 2 - 2', '-', '+', 206, 0, '', 0),
(16, 'bus', 'Jelcz', 'M121M', 1996, 1996, '2  - 2 - 2', '-', '+', 207, 0, '', 0),
(17, 'bus', 'Jelcz', 'M121M', 1999, 1999, '2  - 2 - 2', '-', '+', 208, 0, '', 0),
(18, 'bus', 'Jelcz', 'M121M', 1999, 1999, '2  - 2 - 2', '-', '+', 209, 0, '', 0),
(19, 'bus', 'Jelcz', 'M121M', 1999, 1999, '2  - 2 - 2', '-', '+', 210, 0, '', 0),
(20, 'bus', 'Jelcz', '120M', 1992, 1992, '2  - 2 - 2', '-', '+', 212, 0, '', 0),
(21, 'bus', 'Jelcz', '120M', 1992, 1992, '2  - 2 - 2', '-', '+', 213, 0, '', 0),
(22, 'bus', 'Ikarus', '260.04', 1988, 1988, '2  - 2 - 2', '-', '+', 214, 0, '', 0),
(23, 'bus', 'Ikarus', '260.30A', 1996, 1996, '2  - 2 - 2', '-', '+', 215, 0, '', 0),
(24, 'bus', 'Ikarus', '260.30A', 1996, 1996, '2  - 2 - 2', '-', '+', 216, 0, '', 0),
(25, 'bus', 'Mercedes-Benz', 'O405N2', 1997, 2008, '2 - 2 - 0', '-', '+', 217, 0, '', 0),
(26, 'bus', 'Mercedes-Benz', 'O405N2', 1999, 2012, '2  - 2 - 2', '-', '+', 218, 0, '', 0),
(27, 'bus', 'MAN', 'NL222', 2000, 2000, '2  - 2 - 2', '-', '+', 219, 0, '', 0),
(28, 'bus', 'MAN', 'NL222', 2000, 2000, '2  - 2 - 2', '-', '+', 220, 0, '', 0),
(29, 'bus', 'MAN', 'NL223', 2002, 2002, '2  - 2 - 2', '-', '+', 221, 0, '', 0),
(30, 'bus', 'MAN', 'NL223', 2002, 2002, '2  - 2 - 2', '-', '+', 222, 0, '', 0),
(31, 'bus', 'MAN', 'NL223', 2002, 2002, '2  - 2 - 2', '-', '+', 223, 0, '', 0),
(32, 'bus', 'MAN', 'NL223', 2002, 2003, '2  - 2 - 2', '-', '+', 224, 0, '', 0),
(33, 'bus', 'MAN', 'NL263', 2004, 2013, '2  - 2 - 2', '+', '+', 225, 0, 'ex. Oslo', 0),
(34, 'bus', 'MAN', 'NL263', 2004, 2013, '2  - 2 - 2', '+', '+', 226, 0, 'ex. Oslo', 0),
(35, 'bus', 'MAN', 'NL262', 1997, 2010, '2 - 2 - 0', '-', '+', 228, 0, 'ex. Oslo', 0),
(36, 'bus', 'MAN', 'NL263', 1999, 2016, '2 - 2 - 0', '-', '+', 229, 0, 'ex. Niemcy', 0),
(37, 'bus', 'Volvo/Vest', 'B7RLE/Center', 2009, 2019, '2  - 2 - 2', '+', '-', 230, 0, 'ex. Unibuss Oslo', 0),
(38, 'bus', 'Volvo/Vest', 'B7RLE/Center', 2009, 2019, '2  - 2 - 2', '+', '-', 231, 0, 'ex. Unibuss Oslo', 0),
(39, 'bus', 'Solaris', 'Urbino 12 II', 2004, 2019, '2  - 2 - 2', '+', '+', 234, 0, 'ex. Winterthur', 0),
(40, 'bus', 'Volvo', 'B10BLE', 1997, 1997, '2  - 2 - 2', '', '+', 235, 0, '', 0),
(41, 'bus', 'Volvo', 'B10BLE', 1997, 1997, '2  - 2 - 2', '-', '+', 236, 0, '', 0),
(42, 'bus', 'Volvo', 'B10BLE', 1997, 1997, '2  - 2 - 2', '-', '+', 237, 0, '', 0),
(43, 'bus', 'Solaris', 'Urbino 12 III', 2007, 2007, '2  - 2 - 2', '-', '+', 238, 0, '', 0),
(44, 'bus', 'Solaris', 'Urbino 12 III', 2007, 2007, '2  - 2 - 2', '-', '+', 239, 0, '', 0),
(45, 'bus', 'Solaris', 'Urbino 12 III', 2007, 2007, '2  - 2 - 2', '-', '+', 240, 0, '', 0),
(46, 'bus', 'Solaris', 'Urbino 12 III', 2007, 2007, '2  - 2 - 2', '-', '+', 241, 0, '', 0),
(47, 'bus', 'Solaris', 'Urbino 12 III', 2017, 2017, '2  - 2 - 2', '+', '+', 242, 0, 'Z dotacji UE', 0),
(48, 'bus', 'Solaris', 'Urbino 12 III', 2017, 2017, '2  - 2 - 2', '+', '+', 243, 0, 'Z dotacji UE', 0),
(49, 'bus', 'Solaris', 'Urbino 12 III', 2017, 2017, '2  - 2 - 2', '+', '+', 244, 0, 'Z dotacji UE', 0),
(50, 'bus', 'Solaris', 'Urbino 12 III', 2006, 2019, '2 - 2 - 0', '-', '+', 245, 0, '', 0),
(51, 'bus', 'Solaris', 'Urbino 12 III', 2006, 2019, '2 - 2 - 0', '-', '+', 246, 0, '', 0),
(52, 'bus', 'Solaris', 'Urbino 12 III', 2006, 2019, '2 - 2 - 0', '-', '+', 247, 0, '', 0),
(53, 'bus', 'Jelcz', 'PR110M', 1988, 1988, '2  - 2 - 2', '-', '+', 251, 0, '', 0),
(54, 'bus', 'Jelcz', 'PR110M', 1988, 1988, '2  - 2 - 2', '-', '+', 252, 0, '', 0),
(55, 'bus', 'Jelcz', 'PR110M', 1987, 1988, '2  - 2 - 2', '-', '+', 253, 0, '', 0),
(56, 'bus', 'Jelcz', 'PR110M', 1988, 1988, '2  - 2 - 2', '-', '+', 254, 0, '', 0),
(57, 'bus', 'Jelcz', 'PR110M', 1987, 1987, '2  - 2 - 2', '-', '+', 255, 0, '', 0),
(58, 'bus', 'Jelcz', 'PR110M', 1988, 1988, '2  - 2 - 2', '-', '+', 256, 0, '', 0),
(59, 'bus', 'Jelcz', 'PR110M', 1988, 1988, '2  - 2 - 2', '-', '+', 257, 0, '', 0),
(60, 'bus', 'Mercedes-Benz', 'O530', 2003, 2019, '2 - 2 - 0', '+', '+', 261, 0, 'Do przewoz?w szkolnych', 0),
(61, 'bus', 'Solaris', 'Urbino 18 III', 2007, 2007, '2 - 2 - 2 - 2', '-', '+', 301, 0, '', 0),
(62, 'bus', 'Solaris', 'Urbino 18 III', 2007, 2007, '2 - 2 - 2 - 2', '-', '+', 302, 0, '', 0),
(63, 'bus', 'Solaris', 'Urbino 18 III', 2007, 2007, '2 - 2 - 2 - 2', '-', '+', 303, 0, '', 0),
(64, 'bus', 'Solaris', 'Urbino 18 III', 2012, 2012, '2 - 2 - 2 - 2', '+', '+', 304, 0, '', 0),
(65, 'bus', 'Solaris', 'Urbino 18 III', 2012, 2012, '2 - 2 - 2 - 2', '+', '+', 305, 0, '', 0),
(66, 'bus', 'Solaris', 'Urbino 18 III', 2017, 2017, '2 - 2 - 2 - 2', '+', '+', 306, 0, 'Z dotacji UE', 0),
(67, 'bus', 'Solaris', 'Urbino 18 III', 2008, 2018, '2 - 2 - 2 - 0', '+', '+', 307, 0, 'ex. BVG Berlin', 0),
(68, 'bus', 'Solaris', 'Urbino 18 IV', 2019, 2019, '2 - 2 - 2 - 2', '+', '+', 308, 0, 'Z dotacji UE', 0),
(69, 'bus', 'Solaris', 'Urbino 18 II', 2004, 2020, '2 - 2 - 2 - 2', '+', '+', 309, 0, 'ex. Winterthur', 0),
(70, 'bus', 'Solaris', 'Urbino 15 III', 2017, 2018, '2  - 2 - 2', '+', '+', 311, 0, 'Z dotacji UE', 0),
(71, 'bus', 'Solaris', 'Urbino 15 III', 2017, 2018, '2  - 2 - 2', '+', '+', 312, 0, 'Z dotacji UE', 0),
(72, 'bus', 'Jelcz', 'M181M', 1995, 1996, '2 - 2 - 2 - 2', '-', '+', 316, 0, '', 0),
(73, 'bus', 'Jelcz', 'M181M', 1997, 1997, '2 - 2 - 2 - 2', '-', '+', 317, 0, '', 0),
(74, 'bus', 'Jelcz', 'M181M', 1997, 1997, '2 - 2 - 2 - 2', '-', '+', 318, 0, '', 0),
(75, 'bus', 'MAN', 'NG313', 2001, 2017, '2 - 2 - 2 - 0', '-', '+', 319, 0, 'ex. WSW Wuppertal', 0),
(76, 'bus', 'MAN', 'NG313', 2001, 2017, '2 - 2 - 2 - 0', '-', '+', 320, 0, 'ex. WSW Wuppertal', 0),
(77, 'bus', 'Ikarus', '280.26', 1985, 1985, '2 - 2 - 2 - 2', '-', '+', 321, 0, '', 0),
(78, 'bus', 'Ikarus', '280.26', 1987, 1987, '2 - 2 - 2 - 2', '-', '+', 322, 0, '', 0),
(79, 'bus', 'Ikarus', '280.26', 1990, 1990, '2 - 2 - 2 - 2', '-', '+', 323, 0, '', 0),
(80, 'bus', 'Ikarus', '280.26', 1990, 1990, '2 - 2 - 2 - 2', '-', '+', 324, 0, '', 0),
(81, 'bus', 'Ikarus', '435.05C', 1994, 1995, '2 - 2 - 2 - 2', '-', '+', 325, 0, '', 0),
(82, 'bus', 'Neoplan', 'N4020', 1998, 1998, '2  - 2 - 2', '-', '+', 327, 0, '', 0),
(83, 'bus', 'Neoplan', 'N4020', 1998, 1998, '2  - 2 - 2', '-', '+', 328, 0, '', 0),
(84, 'bus', 'Neoplan', 'N4020', 1998, 1998, '2  - 2 - 2', '-', '+', 329, 0, '', 0),
(85, 'bus', 'MAN', 'NL313-15', 2004, 2008, '2  - 2 - 2', '+', '+', 331, 0, 'ex. Oslo', 0),
(86, 'bus', 'MAN', 'NL313-15', 2004, 2008, '2  - 2 - 2', '+', '+', 332, 0, 'ex. Oslo', 0),
(87, 'bus', 'MAN', 'NL313-15', 2004, 2008, '2  - 2 - 2', '+', '+', 333, 0, 'ex. Oslo', 0),
(88, 'bus', 'MAN', 'NG312', 1999, 1999, '2 - 2 - 2 - 2', '+', '+', 334, 0, 'Klimatyzacja kierowcy', 0),
(89, 'bus', 'MAN', 'NG312', 1999, 2000, '2 - 2 - 2 - 2', '+', '+', 335, 0, 'Klimatyzacja kierowcy', 0),
(90, 'bus', 'Neoplan', 'N4021NF', 1994, 2002, '2 - 2 - 2 - 0', '-', '+', 337, 0, 'ex. Niemcy', 0),
(91, 'bus', 'MAN', 'NG312', 1995, 2005, '2 - 2 - 2 - 0', '-', '+', 338, 0, 'ex. KEVAG Koblez', 0),
(92, 'bus', 'MAN', 'NG312', 1995, 2005, '2 - 2 - 2 - 0', '-', '+', 339, 0, 'ex. KEVAG Koblez', 0),
(93, 'bus', 'Volvo', 'B10MA', 1996, 1996, '2 - 2 - 2 - 2', '-', '+', 341, 0, 'Sta?y przydzia? na linie nocne', 0),
(94, 'tram', 'Duewag', 'GT6', 1962, 2006, '2 - 2|2 - 2', 'NIE', 'NIE', 35, NULL, 'ex. Gotha #396', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `workshop_gw`
--

CREATE TABLE `workshop_gw` (
  `id` int(11) NOT NULL,
  `id_pojazdu` int(11) NOT NULL,
  `pocz_post` date NOT NULL,
  `koniec_post` date NOT NULL,
  `powod` mediumtext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `workshop_gw`
--

INSERT INTO `workshop_gw` (`id`, `id_pojazdu`, `pocz_post`, `koniec_post`, `powod`) VALUES
(2, 1, '2021-02-01', '2022-01-01', 'aaaa'),
(3, 2, '2020-01-01', '2022-02-02', 'aaa'),
(8, 3, '2020-01-01', '2023-02-02', 'aaa'),
(9, 3, '2020-01-01', '2023-02-02', 'aaa');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `timetables_gw`
--
ALTER TABLE `timetables_gw`
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
-- Indeksy dla tabeli `workshop_gw`
--
ALTER TABLE `workshop_gw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pojazdu` (`id_pojazdu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `timetables_gw`
--
ALTER TABLE `timetables_gw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT dla tabeli `workshop_gw`
--
ALTER TABLE `workshop_gw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `workshop_gw`
--
ALTER TABLE `workshop_gw`
  ADD CONSTRAINT `workshop_gw_ibfk_1` FOREIGN KEY (`id_pojazdu`) REFERENCES `vehicles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
