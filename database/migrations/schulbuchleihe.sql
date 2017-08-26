-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 26. Aug 2017 um 18:41
-- Server-Version: 10.1.13-MariaDB
-- PHP-Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `schulbuchleihe`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `booklists`
--

CREATE TABLE `booklists` (
  `id` int(10) UNSIGNED NOT NULL,
  `jahrgang` int(11) NOT NULL,
  `schuljahr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `booklists`
--

INSERT INTO `booklists` (`id`, `jahrgang`, `schuljahr`, `created_at`, `updated_at`) VALUES
(1, 5, '2016/17', NULL, NULL),
(2, 6, '2016/17', NULL, NULL),
(3, 7, '2016/17', NULL, NULL),
(4, 8, '2016/17', NULL, NULL),
(5, 9, '2016/17', NULL, NULL),
(6, 10, '2016/17', NULL, NULL),
(7, 11, '2016/17', NULL, NULL),
(8, 12, '2016/17', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `booklist_booktitle`
--

CREATE TABLE `booklist_booktitle` (
  `booktitle_id` int(11) NOT NULL,
  `booklist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `booklist_booktitle`
--

INSERT INTO `booklist_booktitle` (`booktitle_id`, `booklist_id`) VALUES
(181, 1),
(200, 1),
(207, 2),
(214, 2),
(216, 2),
(219, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `anschaffungsjahr` int(11) NOT NULL,
  `booktitle_id` int(11) NOT NULL,
  `ausgeliehen` tinyint(1) NOT NULL,
  `leihgebuehr` decimal(4,2) NOT NULL,
  `neupreis` decimal(4,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `books`
--

INSERT INTO `books` (`id`, `anschaffungsjahr`, `booktitle_id`, `ausgeliehen`, `leihgebuehr`, `neupreis`, `created_at`, `updated_at`) VALUES
(1, 2005, 51, 0, '3.20', '16.50', NULL, NULL),
(2, 2000, 51, 1, '3.40', '34.95', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `booktitles`
--

CREATE TABLE `booktitles` (
  `id` int(10) UNSIGNED NOT NULL,
  `titel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verlag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preis` double(4,2) NOT NULL,
  `kennung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bestand` int(11) NOT NULL,
  `ausgeliehen` int(11) NOT NULL,
  `leihgebuehr` double(4,2) NOT NULL,
  `isbn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `booktitles`
--

INSERT INTO `booktitles` (`id`, `titel`, `verlag`, `preis`, `kennung`, `bestand`, `ausgeliehen`, `leihgebuehr`, `isbn`, `created_at`, `updated_at`) VALUES
(51, 'Grammatik des heutigen Französisch', 'Klett', 27.95, 'FR__03_02', 27, 0, 5.00, '521721-0', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(142, 'Grammatik des heutigen Englisch', 'Klett', 24.95, 'EN__03_02', 288, 223, 4.00, '505700-0', '2017-05-10 21:22:09', '2017-05-17 20:21:53'),
(152, 'Chemie heute S1 Gesamtband', 'Schroedel', 41.95, 'CH__02_02', 354, 111, 6.00, '86060-5', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(175, 'Green Line 2', 'Klett', 23.95, 'EN__06_03', 209, 120, 6.00, '547130-6', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(181, 'Diercke Erdkunde 9/10', 'Westermann', 25.50, 'EK__09_01', 340, 145, 4.00, '114579-3', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(191, 'Optimales Sportwissen', 'Spitta', 18.90, 'ST__03_02', 69, 31, 4.00, '938509-44-9', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(200, 'Green Line 3', 'Klett', 23.95, 'EN__07_02', 230, 120, 6.00, '547140-5', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(203, 'Elemente der Mathematik 10', 'Schroedel', 31.95, 'MA__10_01', 174, 134, 8.00, '87210-3', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(205, 'Impulse Physik 7/8', 'Klett', 21.95, 'PH__02_03', 270, 249, 4.00, '772447-9', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(207, 'Linea Verde 3', 'Klett', 22.95, 'SP__02_03', 38, 2, 3.00, '535780-8', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(210, 'Texte, Themen und Strukturen 10', 'Cornelsen', 27.75, 'DE__10_02', 190, 142, 7.00, '68060-5', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(211, 'BIOskop 5/6', 'Westermann', 28.50, 'BI__01_03', 253, 134, 5.00, '150500-9', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(214, 'Green Line, Schülerbuch Band 4', 'Klett', 23.95, 'EN__08_02', 177, 118, 6.00, '547150-4', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(215, 'Geschichte und Geschehen 1/2', 'Klett', 23.95, 'GE__01_02', 243, 128, 6.00, '443410-4', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(216, 'Geschichte und Geschehen 3', 'Klett', 23.95, 'GE__02_07', 138, 123, 6.00, '443420-3', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(217, 'Impulse Physik 9/10', 'Klett', 21.95, 'PH__02_04', 268, 248, 4.00, '772436-3', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(218, 'Diercke Weltatlas Neub 2008', 'Westermann', 33.95, 'EK__03_07', 43, 21, 8.00, '100700-8', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(219, 'Kursbuch Geschichte', 'Cornelsen', 39.25, 'GE__03_04', 330, 278, 6.00, '064736-1', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(222, 'Elemente der Mathematik Niedersachsen 11/12', 'Schroedel', 41.50, 'MA__03_03', 294, 258, 7.00, '3-507-87920-1', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(223, 'Geschichte und Geschehen 4', 'Klett', 23.95, 'GE__03_08', 155, 126, 6.00, '443430-2', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(226, 'Prima C Textband', 'Buchner', 27.60, 'LA__02_03', 16, 0, 4.00, '3-7661-7600-4', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(227, 'Prima C Begleitband', 'Buchner', 18.20, 'LA__02_04', 15, 0, 3.00, '3-7661-7601-1', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(228, 'Green Line, Schülerbuch Band 5', 'Klett', 23.95, 'EN__09_02', 130, 114, 6.00, '547160-3', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(229, 'Green Line, Schülerbuch Band 6 Transition', 'Klett', 23.95, 'EN__10_01', 161, 134, 6.00, '547170-2', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(230, 'Texte, Themen und Strukturen Ausgabe N', 'Cornelsen', 37.75, 'DE__10_03', 309, 264, 6.00, '3-464-69103-8', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(232, 'Litora - Lernvokabeln', 'Vandenhoek', 9.00, 'LA__03_01', 19, 15, 2.00, '525-71751-6', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(233, 'Litora - Textband', 'Vandenhoek', 33.00, 'LA__03_02', 18, 15, 5.00, '525-71750-6', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(234, 'Impulse Physik 11/12', 'klett', 31.95, 'PH__03_04', 72, 63, 5.00, '3-12-772640-4', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(235, 'Chemie heute S1', 'Schroedel', 39.95, 'CH__02_01', 385, 369, 6.00, '3-507-88006-1', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(236, 'Prima Nova Textband', 'Buchner', 29.50, 'La__01_04', 244, 214, 5.00, '3-7661-7970-8', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(237, 'Prima Nova Begleitband', 'Buchner', 21.80, 'LA__01_05', 250, 212, 4.00, '3-7661-7971-5', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(238, 'Oberstufengrammatik Französisch', 'Klett', 27.95, 'FR__03_03', 36, 21, 4.00, '3-12-520932-9', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(239, 'Green Line Oberstufe Niedersachsen', 'Klett', 26.25, 'EN__03_04', 268, 117, 4.00, '3-12-594006-2', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(240, 'Geschichte und Geschehen 5', 'Klett', 23.95, 'GE__03_09', 134, 127, 6.00, '3-12-443440-1', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(241, 'A_Tope.com', 'Cornelsen', 29.75, 'SN__02_01', 76, 37, 5.00, '3-464-20530-3', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(242, 'Litora Begleitgrammatik', 'Vandenhoek', 27.00, 'LA__03_03', 18, 15, 4.00, '3-525-71752-0', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(243, 'Elemente Chemie 11/12', 'Klett', 35.50, 'CH__03_05', 76, 61, 6.00, '3-12-756123-4', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(244, 'Découvertes 1, Série jaune, Schülerbuch', 'Klett', 18.95, 'FR__06_03', 81, 66, 5.00, '3-12-622011-8', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(245, 'Découvertes 1, Série jaune, Grammatisches Beiheft', 'Klett', 6.95, 'FR__06_04', 75, 61, 2.00, '3-12-622018-7', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(247, 'Politik & Co 2', 'Buchner', 27.40, 'PO__09_01', 140, 114, 5.00, '3-7661-6809-2', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(248, 'video Kurzgrammatik', 'Cornelsen', 16.25, 'LA__03_05', 178, 165, 3.00, '3-06-120153-1', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(249, 'Informatik Oberstufe 1', 'Oldenbourg', 24.50, 'IN__03_01', 47, 39, 4.00, '3-637-00160-2', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(250, 'Informatik Oberstufe 2', 'Oldenbourg', 24.50, 'IN__03_02', 48, 36, 4.00, '3-637-00830-4', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(251, 'Elektronisches Wörterbuch', 'Casio', 99.99, 'EN__03_05', 80, 10, 35.00, '', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(252, 'Englische Grammatik heute', 'Klett', 23.50, 'EN__03_06', 20, 5, 4.00, '3-12-505709-8', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(253, 'Encuentros - Edicion 3000 Band 1', 'Cornelsen', 22.50, 'SN__02_02', 39, 35, 4.00, '3-06-520333-3', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(254, 'Moment Mal ! (1)', 'Klett', 22.95, 'RE__01_01', 74, 60, 4.00, '3-12-006608-8', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(255, 'Moment Mal !(2)', 'Klett', 28.95, 'RE__02_01', 80, 67, 5.00, '3-12-006611-8', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(256, 'Mittendrin 5/6', 'Kösel', 18.25, 'RK__01_01', 200, 190, 3.00, '3-466-50762-7', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(257, 'Mittendrin 7/8', 'Kösel', 18.25, 'RK__02_01', 215, 193, 3.00, '3-466-50763-4', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(258, 'Mittendrin 9/10', 'Kösel', 18.25, 'RK__02_02', 233, 223, 3.00, '3-466-50764-1', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(259, 'Vernünftig glauben', 'Schoeningh', 26.95, 'RK__03_01', 180, 160, 5.00, '3-14-053565-6', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(260, 'Natura Oberstufe', 'Klett', 34.95, 'BI__03_01', 346, 339, 6.00, '3-12-045328-4', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(261, 'Deutschbuch 5', 'Cornelsen', 25.25, 'DE__05_01', 140, 123, 7.00, '978-3-06-062413-3', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(262, 'Deutschbuch 6', 'Cornelsen', 25.25, 'DE__06_02', 140, 134, 7.00, '978-3-06-0624414-0', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(264, 'Erdkunde7/8', 'Westermann', 21.95, 'EK__07_01', 135, 129, 6.00, '3-14-144675-3', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(265, 'Terra Erdkunde 2', 'Klett', 20.50, 'EK__07_02', 76, 75, 5.00, '3-12-104614-4', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(266, 'Découvertes 3, Serie jaune, Schülerbuch', 'Klett', 18.95, 'FR__08_03', 62, 59, 5.00, '3-12-622031-6', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(267, 'Découvertes 3, Serie jaune, Gramm. Beiheft', 'Klett', 6.95, 'FR__08_04', 63, 58, 2.00, '3-12-622038-5', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(268, 'Découvertes 4, Serie jaune, Schülerbuch', 'Klett', 18.95, 'FR__09_01', 55, 49, 5.00, '3-12-622041-5', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(269, 'Découvertes 4, Serie jaune, Gramm. Beiheft', 'Klett', 6.95, 'FR__09_02', 51, 42, 2.00, '3-12-622048-4', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(270, 'Phrases-clés pour l`écrit et l´oral', 'Klett', 9.99, 'FR__03_04', 35, 22, 2.00, '3-12-519568-4', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(271, 'Elemente der Mathematik 5 - G9', 'Schroedel', 22.95, 'MA__05_01', 130, 122, 6.00, '3-507-88580-6', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(274, 'Deutschbuch 7', 'Cornelsen', 25.25, 'DE__07_01', 131, 127, 7.00, '978-3-06-062415-7', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(275, 'Deutschbuch 8', 'Cornelsen', 25.25, 'DE__08_01', 163, 127, 7.00, '976-3-06-062416-7', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(276, 'natura 5/6', 'Klett', 25.50, 'BI__01_01', 125, 124, 4.00, '3-12-049301-3', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(277, 'natura 2', 'Klett', 32.95, 'BI__02_02', 262, 260, 5.00, '3-12-049121-7', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(278, 'Chemie heute SII', 'Schroedel', 42.95, 'CH__03_01', 61, 29, 7.00, '3-507-10652-9', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(279, 'Deutschbuch 9', 'Cornelsen', 25.25, 'DE__09_01', 171, 129, 7.00, '3-06-062417-1', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(280, 'Terra Erdkunde 1', 'Klett', 22.50, 'EK__05_01', 130, 125, 6.00, '3-12-104613-3', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(281, 'Terra Erdkunde 3', 'Klett', 22.50, 'EK__09_02', 135, 133, 4.00, '3-12-104615-7', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(282, 'Green Line 1', 'Klett', 19.95, 'EN__05_01', 125, 121, 5.00, '3-12-834210-8', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(283, 'Green Line Oberstufe', 'Klett', 23.50, 'EN__03_01', 127, 126, 4.00, '3-12-530406-2', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(284, 'Découvertes 5, Série jaune, Schülerbuch', 'Klett', 18.95, 'FR__10_01', 60, 55, 5.00, '3-12-622051-4', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(285, 'Découvertes 5, Série jaune, Grammatisches Beiheft', 'Klett', 6.95, 'FR__10_02', 55, 52, 2.00, '3-12-622058-3', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(286, 'Farbe', 'Klett', 19.75, 'KU__03_01', 120, 112, 5.00, '3-12-205119-8', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(287, 'Elemente der Mathematik 6 - G9', 'Schroedel', 22.95, 'MA__06_02', 135, 132, 6.00, '3-507-88587-5', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(288, 'Elemente der Mathematik 7 - G9', 'Schroedel', 22.95, 'MA__07_01', 127, 127, 6.00, '3-507-88594-3', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(289, 'Elemente der Mathematik 8 - G9', 'Schroedel', 22.95, 'MA__08_01', 125, 120, 6.00, '3-507-88601-8', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(290, 'Elemente der Mathematik 9 - G9', 'Schroedel', 22.95, 'MA__09_01', 128, 128, 6.00, '3-507-88608-7', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(291, 'Politik & Co 2 (2016)', 'Buchner', 28.90, 'PO__09_02', 161, 156, 5.00, '3-7661-6809-2', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(292, 'Moment Mal! (3)', 'Klett', 22.95, 'RE__02_02', 55, 54, 4.00, '3-12-006610-1', '2017-05-10 21:22:09', '0000-00-00 00:00:00'),
(293, 'Encuentros - Edicion 3000 - Band 2', 'Cornelsen', 22.50, 'SN__10_01', 20, 13, 4.00, '3-06-520334-0', '2017-05-10 21:22:09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(12, '2017_05_18_182338_create_booktitles_table', 1),
(13, '2017_05_18_185538_create_books_table', 1),
(14, '2017_06_04_192540_create_booklists_table', 2);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `booklists`
--
ALTER TABLE `booklists`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `booklist_booktitle`
--
ALTER TABLE `booklist_booktitle`
  ADD PRIMARY KEY (`booktitle_id`,`booklist_id`);

--
-- Indizes für die Tabelle `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `booktitles`
--
ALTER TABLE `booktitles`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `booklists`
--
ALTER TABLE `booklists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT für Tabelle `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `booktitles`
--
ALTER TABLE `booktitles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;
--
-- AUTO_INCREMENT für Tabelle `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
