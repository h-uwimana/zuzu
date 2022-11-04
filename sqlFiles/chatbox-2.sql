-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 04 nov 2022 om 21:18
-- Serverversie: 10.4.21-MariaDB
-- PHP-versie: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatbox`
--
CREATE DATABASE IF NOT EXISTS `chatbox` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `chatbox`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `chat`
--

CREATE TABLE `chat` (
  `klant_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `chat_regel` varchar(255) NOT NULL,
  `sender` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `chat`
--

INSERT INTO `chat` (`klant_id`, `service_id`, `id`, `chat_regel`, `sender`, `date`, `time`) VALUES
(89, 66, 321, 'tgfv', 89, '2022-11-02', '13:34:20'),
(89, 66, 322, 'reds', 66, '2022-11-02', '13:36:38'),
(89, 66, 323, '3eds', 89, '2022-11-02', '13:36:45'),
(89, 66, 324, 'hussein', 89, '2022-11-02', '13:37:05'),
(89, 66, 325, 'fivuhjkefd', 89, '2022-11-02', '13:38:02'),
(89, 66, 326, '54rfvdc', 66, '2022-11-02', '13:38:09'),
(89, 66, 327, '4tgrvfv', 66, '2022-11-02', '13:38:26'),
(89, 66, 328, 'trgftrvgf', 89, '2022-11-02', '13:38:40'),
(89, 66, 329, '54frdc', 66, '2022-11-02', '13:38:53'),
(89, 66, 330, '4f3red', 66, '2022-11-02', '13:39:46'),
(89, 66, 331, 'trvfd', 89, '2022-11-02', '13:39:50'),
(89, 66, 332, '34fred', 66, '2022-11-02', '13:39:53'),
(89, 66, 333, '54r', 89, '2022-11-02', '13:41:52'),
(89, 66, 334, '54rfed', 89, '2022-11-02', '13:42:24'),
(89, 66, 335, 'refedf', 89, '2022-11-02', '13:42:52'),
(89, 66, 336, 'ewfcds', 66, '2022-11-02', '13:42:58'),
(89, 66, 337, '65tgrf', 89, '2022-11-02', '13:44:34'),
(89, 66, 338, '4rfed', 89, '2022-11-02', '13:46:21'),
(89, 66, 339, 'ercdsx', 66, '2022-11-02', '13:46:25'),
(89, 66, 340, 'trgfuihjkvrf', 89, '2022-11-02', '13:47:31'),
(89, 66, 341, 'hello', 66, '2022-11-02', '13:47:41'),
(89, 66, 342, '54frefd', 89, '2022-11-02', '13:47:48'),
(89, 66, 343, 'hussein', 89, '2022-11-02', '13:49:23'),
(89, 66, 344, '4rfe', 89, '2022-11-02', '13:50:51'),
(89, 66, 345, 'rewfdsc', 66, '2022-11-02', '13:51:33'),
(89, 66, 346, 'rekfd', 89, '2022-11-02', '14:10:29'),
(89, 66, 347, 'efdkcm', 89, '2022-11-02', '14:10:38'),
(89, 66, 348, 'redksmx', 66, '2022-11-02', '14:10:47'),
(89, 66, 349, 'edcksl', 66, '2022-11-02', '14:10:54'),
(89, 66, 350, 'hrllo', 66, '2022-11-02', '14:12:38'),
(89, 66, 351, 'reodc', 89, '2022-11-02', '14:13:01'),
(89, 66, 352, 'hello', 89, '2022-11-02', '14:32:11'),
(89, 66, 353, 'alles goed', 66, '2022-11-02', '14:32:22'),
(89, 66, 354, 'goed met jou', 89, '2022-11-02', '14:32:33'),
(89, 66, 355, 'ja gaat lekker', 66, '2022-11-02', '14:32:45');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `chat` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `klant`
--

INSERT INTO `klant` (`id`, `naam`, `chat`) VALUES
(89, 'hussein', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `service`
--

INSERT INTO `service` (`id`, `naam`, `email`, `wachtwoord`, `rol`) VALUES
(66, 'hussein', 'admin@zuzu.nl', '$2y$10$6pKKdv.acEB.zmndZnkEQO4YF.rvUDYc7y8M6Tjp9e2aHRSzsdn6m', 'admin');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relation_1_klant_fk` (`klant_id`),
  ADD KEY `relation_1_service_fk` (`service_id`);

--
-- Indexen voor tabel `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;

--
-- AUTO_INCREMENT voor een tabel `klant`
--
ALTER TABLE `klant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT voor een tabel `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `relation_1_klant_fk` FOREIGN KEY (`klant_id`) REFERENCES `klant` (`id`),
  ADD CONSTRAINT `relation_1_service_fk` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
