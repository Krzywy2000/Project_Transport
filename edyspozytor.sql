-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Lut 2020, 14:33
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
-- Struktura tabeli dla tabeli `buses_gw`
--

CREATE TABLE `buses_gw` (
  `id` int(11) NOT NULL,
  `marka` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `model` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `rocznik` year(4) NOT NULL,
  `rok_wprowadzenia` year(4) NOT NULL,
  `uklad_drzwi` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `klimatyzacja` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `biletomat` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `numer_tab` int(11) NOT NULL,
  `id_brygady` int(11) DEFAULT NULL,
  `uwagi` mediumtext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `buses_gw`
--

INSERT INTO `buses_gw` (`id`, `marka`, `model`, `rocznik`, `rok_wprowadzenia`, `uklad_drzwi`, `klimatyzacja`, `biletomat`, `numer_tab`, `id_brygady`, `uwagi`) VALUES
(1, 'Autosan', 'H7-20.01', 2000, 2000, '2 - 2', '-', '+', 102, 0, ''),
(2, 'MAN', 'NM223', 1999, 2014, '1 - 2 - 0', '-', '+', 104, 0, ''),
(3, 'Jelcz', 'M11', 1987, 1987, '2  - 2 - 2', '-', '+', 105, 0, ''),
(4, 'Jelcz', 'M11', 1987, 1987, '2  - 2 - 2', '-', '+', 106, 0, ''),
(5, 'Jelcz', 'M11', 1987, 1987, '2  - 2 - 2', '-', '+', 107, 0, ''),
(6, 'Solaris', 'Urbino 10 III', 2017, 2018, '1 - 2 - 2', '+', '+', 108, 0, 'Z dotacji UE'),
(7, 'Solaris', 'Urbino 10 III', 2017, 2018, '1 - 2 - 2', '+', '+', 109, 0, 'Z dotacji UE'),
(8, 'Solaris', 'Urbino 8,9 III LE', 2019, 2020, '1 - 2 - 0', '+', '+', 110, 0, 'Z dotacji UE'),
(9, 'Solaris', 'Urbino 8,9 III LE', 2019, 2020, '1 - 2 - 0', '+', '+', 111, 0, 'Z dotacji UE'),
(10, 'Jelcz', '120M', 1994, 1994, '2  - 2 - 2', '-', '+', 201, 0, ''),
(11, 'Jelcz', '120MM/2', 2000, 2000, '2  - 2 - 2', '-', '+', 202, 0, ''),
(12, 'Jelcz', '120MM/2', 2001, 2001, '2  - 2 - 2', '-', '+', 203, 0, ''),
(13, 'Jelcz', '120MM/2', 2001, 2001, '2  - 2 - 2', '-', '+', 204, 0, ''),
(14, 'Jelcz', '120MM/2', 2002, 2002, '2  - 2 - 2', '-', '+', 205, 0, ''),
(15, 'Jelcz', '120MM/2', 2002, 2003, '2  - 2 - 2', '-', '+', 206, 0, ''),
(16, 'Jelcz', 'M121M', 1996, 1996, '2  - 2 - 2', '-', '+', 207, 0, ''),
(17, 'Jelcz', 'M121M', 1999, 1999, '2  - 2 - 2', '-', '+', 208, 0, ''),
(18, 'Jelcz', 'M121M', 1999, 1999, '2  - 2 - 2', '-', '+', 209, 0, ''),
(19, 'Jelcz', 'M121M', 1999, 1999, '2  - 2 - 2', '-', '+', 210, 0, ''),
(20, 'Jelcz', '120M', 1992, 1992, '2  - 2 - 2', '-', '+', 212, 0, ''),
(21, 'Jelcz', '120M', 1992, 1992, '2  - 2 - 2', '-', '+', 213, 0, ''),
(22, 'Ikarus', '260.04', 1988, 1988, '2  - 2 - 2', '-', '+', 214, 0, ''),
(23, 'Ikarus', '260.30A', 1996, 1996, '2  - 2 - 2', '-', '+', 215, 0, ''),
(24, 'Ikarus', '260.30A', 1996, 1996, '2  - 2 - 2', '-', '+', 216, 0, ''),
(25, 'Mercedes-Benz', 'O405N2', 1997, 2008, '2 - 2 - 0', '-', '+', 217, 0, ''),
(26, 'Mercedes-Benz', 'O405N2', 1999, 2012, '2  - 2 - 2', '-', '+', 218, 0, ''),
(27, 'MAN', 'NL222', 2000, 2000, '2  - 2 - 2', '-', '+', 219, 0, ''),
(28, 'MAN', 'NL222', 2000, 2000, '2  - 2 - 2', '-', '+', 220, 0, ''),
(29, 'MAN', 'NL223', 2002, 2002, '2  - 2 - 2', '-', '+', 221, 0, ''),
(30, 'MAN', 'NL223', 2002, 2002, '2  - 2 - 2', '-', '+', 222, 0, ''),
(31, 'MAN', 'NL223', 2002, 2002, '2  - 2 - 2', '-', '+', 223, 0, ''),
(32, 'MAN', 'NL223', 2002, 2003, '2  - 2 - 2', '-', '+', 224, 0, ''),
(33, 'MAN', 'NL263', 2004, 2013, '2  - 2 - 2', '+', '+', 225, 0, 'ex. Oslo'),
(34, 'MAN', 'NL263', 2004, 2013, '2  - 2 - 2', '+', '+', 226, 0, 'ex. Oslo'),
(35, 'MAN', 'NL262', 1997, 2010, '2 - 2 - 0', '-', '+', 228, 0, 'ex. Oslo'),
(36, 'MAN', 'NL263', 1999, 2016, '2 - 2 - 0', '-', '+', 229, 0, 'ex. Niemcy'),
(37, 'Volvo/Vest', 'B7RLE/Center', 2009, 2019, '2  - 2 - 2', '+', '-', 230, 0, 'ex. Unibuss Oslo'),
(38, 'Volvo/Vest', 'B7RLE/Center', 2009, 2019, '2  - 2 - 2', '+', '-', 231, 0, 'ex. Unibuss Oslo'),
(39, 'Solaris', 'Urbino 12 II', 2004, 2019, '2  - 2 - 2', '+', '+', 234, 0, 'ex. Winterthur'),
(40, 'Volvo', 'B10BLE', 1997, 1997, '2  - 2 - 2', '', '+', 235, 0, ''),
(41, 'Volvo', 'B10BLE', 1997, 1997, '2  - 2 - 2', '-', '+', 236, 0, ''),
(42, 'Volvo', 'B10BLE', 1997, 1997, '2  - 2 - 2', '-', '+', 237, 0, ''),
(43, 'Solaris', 'Urbino 12 III', 2007, 2007, '2  - 2 - 2', '-', '+', 238, 0, ''),
(44, 'Solaris', 'Urbino 12 III', 2007, 2007, '2  - 2 - 2', '-', '+', 239, 0, ''),
(45, 'Solaris', 'Urbino 12 III', 2007, 2007, '2  - 2 - 2', '-', '+', 240, 0, ''),
(46, 'Solaris', 'Urbino 12 III', 2007, 2007, '2  - 2 - 2', '-', '+', 241, 0, ''),
(47, 'Solaris', 'Urbino 12 III', 2017, 2017, '2  - 2 - 2', '+', '+', 242, 0, 'Z dotacji UE'),
(48, 'Solaris', 'Urbino 12 III', 2017, 2017, '2  - 2 - 2', '+', '+', 243, 0, 'Z dotacji UE'),
(49, 'Solaris', 'Urbino 12 III', 2017, 2017, '2  - 2 - 2', '+', '+', 244, 0, 'Z dotacji UE'),
(50, 'Solaris', 'Urbino 12 III', 2006, 2019, '2 - 2 - 0', '-', '+', 245, 0, ''),
(51, 'Solaris', 'Urbino 12 III', 2006, 2019, '2 - 2 - 0', '-', '+', 246, 0, ''),
(52, 'Solaris', 'Urbino 12 III', 2006, 2019, '2 - 2 - 0', '-', '+', 247, 0, ''),
(53, 'Jelcz', 'PR110M', 1988, 1988, '2  - 2 - 2', '-', '+', 251, 0, ''),
(54, 'Jelcz', 'PR110M', 1988, 1988, '2  - 2 - 2', '-', '+', 252, 0, ''),
(55, 'Jelcz', 'PR110M', 1987, 1988, '2  - 2 - 2', '-', '+', 253, 0, ''),
(56, 'Jelcz', 'PR110M', 1988, 1988, '2  - 2 - 2', '-', '+', 254, 0, ''),
(57, 'Jelcz', 'PR110M', 1987, 1987, '2  - 2 - 2', '-', '+', 255, 0, ''),
(58, 'Jelcz', 'PR110M', 1988, 1988, '2  - 2 - 2', '-', '+', 256, 0, ''),
(59, 'Jelcz', 'PR110M', 1988, 1988, '2  - 2 - 2', '-', '+', 257, 0, ''),
(60, 'Mercedes-Benz', 'O530', 2003, 2019, '2 - 2 - 0', '+', '+', 261, 0, 'Do przewoz?w szkolnych'),
(61, 'Solaris', 'Urbino 18 III', 2007, 2007, '2 - 2 - 2 - 2', '-', '+', 301, 0, ''),
(62, 'Solaris', 'Urbino 18 III', 2007, 2007, '2 - 2 - 2 - 2', '-', '+', 302, 0, ''),
(63, 'Solaris', 'Urbino 18 III', 2007, 2007, '2 - 2 - 2 - 2', '-', '+', 303, 0, ''),
(64, 'Solaris', 'Urbino 18 III', 2012, 2012, '2 - 2 - 2 - 2', '+', '+', 304, 0, ''),
(65, 'Solaris', 'Urbino 18 III', 2012, 2012, '2 - 2 - 2 - 2', '+', '+', 305, 0, ''),
(66, 'Solaris', 'Urbino 18 III', 2017, 2017, '2 - 2 - 2 - 2', '+', '+', 306, 0, 'Z dotacji UE'),
(67, 'Solaris', 'Urbino 18 III', 2008, 2018, '2 - 2 - 2 - 0', '+', '+', 307, 0, 'ex. BVG Berlin'),
(68, 'Solaris', 'Urbino 18 IV', 2019, 2019, '2 - 2 - 2 - 2', '+', '+', 308, 0, 'Z dotacji UE'),
(69, 'Solaris', 'Urbino 18 II', 2004, 2020, '2 - 2 - 2 - 2', '+', '+', 309, 0, 'ex. Winterthur'),
(70, 'Solaris', 'Urbino 15 III', 2017, 2018, '2  - 2 - 2', '+', '+', 311, 0, 'Z dotacji UE'),
(71, 'Solaris', 'Urbino 15 III', 2017, 2018, '2  - 2 - 2', '+', '+', 312, 0, 'Z dotacji UE'),
(72, 'Jelcz', 'M181M', 1995, 1996, '2 - 2 - 2 - 2', '-', '+', 316, 0, ''),
(73, 'Jelcz', 'M181M', 1997, 1997, '2 - 2 - 2 - 2', '-', '+', 317, 0, ''),
(74, 'Jelcz', 'M181M', 1997, 1997, '2 - 2 - 2 - 2', '-', '+', 318, 0, ''),
(75, 'MAN', 'NG313', 2001, 2017, '2 - 2 - 2 - 0', '-', '+', 319, 0, 'ex. WSW Wuppertal'),
(76, 'MAN', 'NG313', 2001, 2017, '2 - 2 - 2 - 0', '-', '+', 320, 0, 'ex. WSW Wuppertal'),
(77, 'Ikarus', '280.26', 1985, 1985, '2 - 2 - 2 - 2', '-', '+', 321, 0, ''),
(78, 'Ikarus', '280.26', 1987, 1987, '2 - 2 - 2 - 2', '-', '+', 322, 0, ''),
(79, 'Ikarus', '280.26', 1990, 1990, '2 - 2 - 2 - 2', '-', '+', 323, 0, ''),
(80, 'Ikarus', '280.26', 1990, 1990, '2 - 2 - 2 - 2', '-', '+', 324, 0, ''),
(81, 'Ikarus', '435.05C', 1994, 1995, '2 - 2 - 2 - 2', '-', '+', 325, 0, ''),
(82, 'Neoplan', 'N4020', 1998, 1998, '2  - 2 - 2', '-', '+', 327, 0, ''),
(83, 'Neoplan', 'N4020', 1998, 1998, '2  - 2 - 2', '-', '+', 328, 0, ''),
(84, 'Neoplan', 'N4020', 1998, 1998, '2  - 2 - 2', '-', '+', 329, 0, ''),
(85, 'MAN', 'NL313-15', 2004, 2008, '2  - 2 - 2', '+', '+', 331, 0, 'ex. Oslo'),
(86, 'MAN', 'NL313-15', 2004, 2008, '2  - 2 - 2', '+', '+', 332, 0, 'ex. Oslo'),
(87, 'MAN', 'NL313-15', 2004, 2008, '2  - 2 - 2', '+', '+', 333, 0, 'ex. Oslo'),
(88, 'MAN', 'NG312', 1999, 1999, '2 - 2 - 2 - 2', '+', '+', 334, 0, 'Klimatyzacja kierowcy'),
(89, 'MAN', 'NG312', 1999, 2000, '2 - 2 - 2 - 2', '+', '+', 335, 0, 'Klimatyzacja kierowcy'),
(90, 'Neoplan', 'N4021NF', 1994, 2002, '2 - 2 - 2 - 0', '-', '+', 337, 0, 'ex. Niemcy'),
(91, 'MAN', 'NG312', 1995, 2005, '2 - 2 - 2 - 0', '-', '+', 338, 0, 'ex. KEVAG Koblez'),
(92, 'MAN', 'NG312', 1995, 2005, '2 - 2 - 2 - 0', '-', '+', 339, 0, 'ex. KEVAG Koblez'),
(93, 'Volvo', 'B10MA', 1996, 1996, '2 - 2 - 2 - 2', '-', '+', 341, 0, 'Sta?y przydzia? na linie nocne');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `timetables_bus_gw`
--

CREATE TABLE `timetables_bus_gw` (
  `id` int(11) NOT NULL,
  `nr_zadania` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `godz_roz` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `godz_kon` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `id_przydzial` int(11) DEFAULT NULL,
  `uwagi` mediumtext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `timetables_bus_gw`
--

INSERT INTO `timetables_bus_gw` (`id`, `nr_zadania`, `godz_roz`, `godz_kon`, `id_przydzial`, `uwagi`) VALUES
(2, '1/01/R A', '4:52', '22:32', 7, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `timetables_tram_gw`
--

CREATE TABLE `timetables_tram_gw` (
  `id` int(11) NOT NULL,
  `nr_zadania` text COLLATE utf8_polish_ci NOT NULL,
  `godz_roz` text COLLATE utf8_polish_ci NOT NULL,
  `godz_kon` text COLLATE utf8_polish_ci NOT NULL,
  `id_przydzial` int(11) DEFAULT NULL,
  `uwagi` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trams_gw`
--

CREATE TABLE `trams_gw` (
  `id` int(11) NOT NULL,
  `marka` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `model` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `rok_produkcji` year(4) NOT NULL,
  `rok_wprowadzenia` year(4) NOT NULL,
  `uklad_drzwi` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `klimatyzacja` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `biletomat` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `numer_tab` int(11) NOT NULL,
  `id_brygady` int(11) DEFAULT NULL,
  `uwagi` mediumtext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `trams_gw`
--

INSERT INTO `trams_gw` (`id`, `marka`, `model`, `rok_produkcji`, `rok_wprowadzenia`, `uklad_drzwi`, `klimatyzacja`, `biletomat`, `numer_tab`, `id_brygady`, `uwagi`) VALUES
(1, 'Duewag', 'GT6', 1962, 2006, '2 - 2|2 - 2', 'NIE', 'NIE', 35, NULL, 'ex. Gotha #396');

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
-- Struktura tabeli dla tabeli `workshop_bus_gw`
--

CREATE TABLE `workshop_bus_gw` (
  `id` int(11) NOT NULL,
  `id_pojazdu` int(11) NOT NULL,
  `pocz_post` date NOT NULL,
  `koniec_post` date NOT NULL,
  `powod` mediumtext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `workshop_bus_gw`
--

INSERT INTO `workshop_bus_gw` (`id`, `id_pojazdu`, `pocz_post`, `koniec_post`, `powod`) VALUES
(2, 2, '2020-02-18', '2020-02-20', 'Wymiana napędu II drzwi');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `workshop_tram_gw`
--

CREATE TABLE `workshop_tram_gw` (
  `id` int(11) NOT NULL,
  `id_pojazdu` int(11) NOT NULL,
  `pocz_post` date NOT NULL,
  `koniec_post` date NOT NULL,
  `powod` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `buses_gw`
--
ALTER TABLE `buses_gw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_brygady` (`id_brygady`);

--
-- Indeksy dla tabeli `timetables_bus_gw`
--
ALTER TABLE `timetables_bus_gw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_przydzial` (`id_przydzial`);

--
-- Indeksy dla tabeli `timetables_tram_gw`
--
ALTER TABLE `timetables_tram_gw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_przydzial` (`id_przydzial`);

--
-- Indeksy dla tabeli `trams_gw`
--
ALTER TABLE `trams_gw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_brygady` (`id_brygady`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `workshop_bus_gw`
--
ALTER TABLE `workshop_bus_gw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pojazdu` (`id_pojazdu`);

--
-- Indeksy dla tabeli `workshop_tram_gw`
--
ALTER TABLE `workshop_tram_gw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pojazdu` (`id_pojazdu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `buses_gw`
--
ALTER TABLE `buses_gw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT dla tabeli `timetables_bus_gw`
--
ALTER TABLE `timetables_bus_gw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `timetables_tram_gw`
--
ALTER TABLE `timetables_tram_gw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `trams_gw`
--
ALTER TABLE `trams_gw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `workshop_bus_gw`
--
ALTER TABLE `workshop_bus_gw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `workshop_tram_gw`
--
ALTER TABLE `workshop_tram_gw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `workshop_bus_gw`
--
ALTER TABLE `workshop_bus_gw`
  ADD CONSTRAINT `workshop_bus_gw_ibfk_1` FOREIGN KEY (`id_pojazdu`) REFERENCES `stock_gw` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
