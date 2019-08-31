-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 31. Aug 2019 um 13:31
-- Server-Version: 10.4.6-MariaDB
-- PHP-Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `streaming`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `DownloadList`
--

CREATE TABLE `DownloadList` (
  `id` int(11) UNSIGNED NOT NULL,
  `SeriesID` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) UNSIGNED NOT NULL,
  `SeriesID` int(11) UNSIGNED DEFAULT NULL,
  `EpisodeCount` int(11) DEFAULT NULL,
  `EName` int(11) DEFAULT NULL,
  `reference` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `FavouriteShow`
--

CREATE TABLE `FavouriteShow` (
  `id` int(11) UNSIGNED NOT NULL,
  `userID` bigint(20) UNSIGNED DEFAULT NULL,
  `SeriesID` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Genres`
--

CREATE TABLE `Genres` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Schedule`
--

CREATE TABLE `Schedule` (
  `id` int(11) UNSIGNED NOT NULL,
  `SeriesID` int(11) UNSIGNED DEFAULT NULL,
  `AirDay` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SeriesName` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `series`
--

CREATE TABLE `series` (
  `id` int(11) UNSIGNED NOT NULL,
  `seriesName` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `JapaneseName` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genres` varchar(2500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seriesStatus` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Description` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT 'No description Found',
  `episodeCount` int(5) DEFAULT NULL,
  `type` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT 'TV',
  `ImageURL` varchar(110) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LargeImageURL` varchar(110) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `malID` int(11) DEFAULT NULL,
  `trailer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `InDownloadList` tinyint(1) DEFAULT 0,
  `aired` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Status`
--

CREATE TABLE `Status` (
  `id` int(11) UNSIGNED NOT NULL,
  `UserID` bigint(20) UNSIGNED DEFAULT NULL,
  `SeriesID` int(11) UNSIGNED DEFAULT NULL,
  `Status` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Banner` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT 'StandardFile.jpg',
  `AutoWatch` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ViewedEpisodes`
--

CREATE TABLE `ViewedEpisodes` (
  `id` int(11) UNSIGNED NOT NULL,
  `UserID` bigint(20) UNSIGNED DEFAULT NULL,
  `EpisodeID` int(11) UNSIGNED DEFAULT NULL,
  `SeriesID` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `DownloadList`
--
ALTER TABLE `DownloadList`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `DownloadList_id_uindex` (`id`),
  ADD KEY `DownloadList_series_id_fk` (`SeriesID`);

--
-- Indizes für die Tabelle `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Episode_id_uindex` (`id`),
  ADD KEY `episodes_series_id_fk` (`SeriesID`);

--
-- Indizes für die Tabelle `FavouriteShow`
--
ALTER TABLE `FavouriteShow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FavouriteShow_users_id_fk` (`userID`),
  ADD KEY `FavouriteShow_series_id_fk` (`SeriesID`);

--
-- Indizes für die Tabelle `Genres`
--
ALTER TABLE `Genres`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indizes für die Tabelle `Schedule`
--
ALTER TABLE `Schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Schedule_series_id_fk` (`SeriesID`);

--
-- Indizes für die Tabelle `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `series_id_uindex` (`id`);

--
-- Indizes für die Tabelle `Status`
--
ALTER TABLE `Status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Status_series_id_fk` (`SeriesID`),
  ADD KEY `Status_users_id_fk` (`UserID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indizes für die Tabelle `ViewedEpisodes`
--
ALTER TABLE `ViewedEpisodes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ViewedEpisodes_id_uindex` (`id`),
  ADD KEY `EpisodeLink` (`EpisodeID`),
  ADD KEY `ViewedEpisodes_users_id_fk` (`UserID`),
  ADD KEY `ViewedEpisodes_series_id_fk` (`SeriesID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `DownloadList`
--
ALTER TABLE `DownloadList`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `FavouriteShow`
--
ALTER TABLE `FavouriteShow`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `Genres`
--
ALTER TABLE `Genres`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `Schedule`
--
ALTER TABLE `Schedule`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `Status`
--
ALTER TABLE `Status`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `ViewedEpisodes`
--
ALTER TABLE `ViewedEpisodes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `DownloadList`
--
ALTER TABLE `DownloadList`
  ADD CONSTRAINT `DownloadList_series_id_fk` FOREIGN KEY (`SeriesID`) REFERENCES `series` (`id`);

--
-- Constraints der Tabelle `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_series_id_fk` FOREIGN KEY (`SeriesID`) REFERENCES `series` (`id`);

--
-- Constraints der Tabelle `FavouriteShow`
--
ALTER TABLE `FavouriteShow`
  ADD CONSTRAINT `FavouriteShow_series_id_fk` FOREIGN KEY (`SeriesID`) REFERENCES `series` (`id`),
  ADD CONSTRAINT `FavouriteShow_users_id_fk` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constraints der Tabelle `Schedule`
--
ALTER TABLE `Schedule`
  ADD CONSTRAINT `Schedule_series_id_fk` FOREIGN KEY (`SeriesID`) REFERENCES `series` (`id`);

--
-- Constraints der Tabelle `Status`
--
ALTER TABLE `Status`
  ADD CONSTRAINT `Status_series_id_fk` FOREIGN KEY (`SeriesID`) REFERENCES `series` (`id`),
  ADD CONSTRAINT `Status_users_id_fk` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`);

--
-- Constraints der Tabelle `ViewedEpisodes`
--
ALTER TABLE `ViewedEpisodes`
  ADD CONSTRAINT `EpisodeLink` FOREIGN KEY (`EpisodeID`) REFERENCES `episodes` (`id`),
  ADD CONSTRAINT `ViewedEpisodes_series_id_fk` FOREIGN KEY (`SeriesID`) REFERENCES `series` (`id`),
  ADD CONSTRAINT `ViewedEpisodes_users_id_fk` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
