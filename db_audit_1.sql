-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 22 jan 2021 om 11:44
-- Serverversie: 5.7.24
-- PHP-versie: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_audit_1`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `acties`
--

CREATE TABLE `acties` (
  `id` int(11) NOT NULL,
  `datum_ontstaan` date DEFAULT NULL,
  `bron_detail` varchar(50) DEFAULT NULL,
  `audit_oordeel_ia` enum('voldoende','onvoldoende','slecht') DEFAULT NULL,
  `sector_id` int(11) DEFAULT NULL,
  `proces` text,
  `nr_bevindingen` int(11) DEFAULT NULL,
  `omschrijving` text,
  `situatie` text,
  `risicosoort_id` int(11) DEFAULT NULL,
  `risico_beschrijving` text,
  `risicoclassificatie_id` int(11) DEFAULT NULL,
  `oorzaak` text,
  `aanbeveling_internal_audit` text,
  `management_actie_plan` text,
  `datum_deadline` date DEFAULT NULL,
  `deadline_bijgesteld` date DEFAULT NULL,
  `voortgang` text,
  `probleem_eigenaar_id` bigint(20) UNSIGNED DEFAULT NULL,
  `actie_eigenaar_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `datum_gesloten` date DEFAULT NULL,
  `aantekening_ia` text,
  `oordeel_ia` text,
  `au_status` enum('AU-afgerond') DEFAULT NULL,
  `probleemeigenaar_status` enum('PE-afgerond','PE-teruggestuurd') DEFAULT NULL,
  `actie_eigenaar_status` enum('AE-afgerond','AE-teruggestuurd') DEFAULT NULL,
  `opmerking_actie_eigenaar` varchar(250) DEFAULT NULL,
  `opmerking_probleem_eigenaar` varchar(250) DEFAULT NULL,
  `opmerking_audit` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `acties`
--

INSERT INTO `acties` (`id`, `datum_ontstaan`, `bron_detail`, `audit_oordeel_ia`, `sector_id`, `proces`, `nr_bevindingen`, `omschrijving`, `situatie`, `risicosoort_id`, `risico_beschrijving`, `risicoclassificatie_id`, `oorzaak`, `aanbeveling_internal_audit`, `management_actie_plan`, `datum_deadline`, `deadline_bijgesteld`, `voortgang`, `probleem_eigenaar_id`, `actie_eigenaar_id`, `status_id`, `datum_gesloten`, `aantekening_ia`, `oordeel_ia`, `au_status`, `probleemeigenaar_status`, `actie_eigenaar_status`, `opmerking_actie_eigenaar`, `opmerking_probleem_eigenaar`, `opmerking_audit`) VALUES
(10, '2020-12-14', 'Te laat komen tweede jaars studenten', 'onvoldoende', 1, 'proces', 67, 'Overvloed aan leerlingen in het tweede jaar die te laat komen', 'situatie', 1, 'risico beschrijving', 2, 'oorzaak', 'aanbeveling internal audit', 'management actie plan[', '2020-12-16', NULL, NULL, 17, 18, 1, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `actie_link`
--

CREATE TABLE `actie_link` (
  `id` int(11) NOT NULL,
  `actie_id` int(11) NOT NULL,
  `aanmaker_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `actie_link`
--

INSERT INTO `actie_link` (`id`, `actie_id`, `aanmaker_id`) VALUES
(4, 10, 16);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `risicoclassificatie`
--

CREATE TABLE `risicoclassificatie` (
  `id` int(11) NOT NULL,
  `actuele_risicoclassificatie_ia` enum('1','2','3','4') NOT NULL,
  `oorzaak_clasificatie` varchar(50) NOT NULL,
  `gerapporteerd_risico` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `risicoclassificatie`
--

INSERT INTO `risicoclassificatie` (`id`, `actuele_risicoclassificatie_ia`, `oorzaak_clasificatie`, `gerapporteerd_risico`) VALUES
(2, '3', 'Erge drukte', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `risicosoort`
--

CREATE TABLE `risicosoort` (
  `id` int(11) NOT NULL,
  `primair` varchar(50) NOT NULL,
  `secundair` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `risicosoort`
--

INSERT INTO `risicosoort` (`id`, `primair`, `secundair`) VALUES
(1, 'Sociaal Risico', 'Technologisch'),
(2, 'Filosofisch Risico', 'Bouwkundig Risico'),
(3, 'Financieel risico', 'Compliance risico');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` enum('Admin','Auditor','Probleem-Eigenaar','Actie-Eigenaar','Techneut','Leraar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `roles`
--

INSERT INTO `roles` (`id`, `user_id`, `role`) VALUES
(20, 16, 'Auditor'),
(21, 17, 'Probleem-Eigenaar'),
(22, 18, 'Actie-Eigenaar');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `sector`
--

CREATE TABLE `sector` (
  `id` int(11) NOT NULL,
  `sector` varchar(50) NOT NULL,
  `domein` varchar(50) NOT NULL,
  `keten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `sector`
--

INSERT INTO `sector` (`id`, `sector`, `domein`, `keten`) VALUES
(1, 'Techniek', 'Technologie', 'ICT'),
(2, 'M&O', '', ''),
(3, 'M&O', '', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `substatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `status`
--

INSERT INTO `status` (`id`, `status`, `substatus`) VALUES
(1, 'Bezig', 'Nog bezig!'),
(2, 'Afgemeld', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(16, 'auditor', 'auditor@curio', NULL, '$2y$10$zl75j1LTlbmG3H6Ieu1z.OqyMgnb3Ki42BqlZkj3vAPGIysPHcily', NULL, '2021-01-22 10:37:10', '2021-01-22 10:37:10'),
(17, 'probleem eigenaar', 'probleem@curio', NULL, '$2y$10$hXwOxC0sqCtZr/Nfm5rK4uBEm4QzLvSAKZnqK.jAyM71nRaYXccnu', NULL, '2021-01-22 10:37:38', '2021-01-22 10:37:38'),
(18, 'actie eigenaar', 'actie@curio', NULL, '$2y$10$KirVYRmW/WujeHfSF2ObI.4SKUNX54cVlWMbLpHBfQFyT95f7zFHq', NULL, '2021-01-22 10:38:24', '2021-01-22 10:38:24');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `acties`
--
ALTER TABLE `acties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sector` (`sector_id`),
  ADD KEY `primaire risicosoort` (`risicosoort_id`),
  ADD KEY `actie eigenaar` (`actie_eigenaar_id`),
  ADD KEY `probleem eigenaar` (`probleem_eigenaar_id`),
  ADD KEY `status` (`status_id`),
  ADD KEY `probleem_eigenaar_id` (`probleem_eigenaar_id`),
  ADD KEY `risicoclassificatie nr` (`risicoclassificatie_id`);

--
-- Indexen voor tabel `actie_link`
--
ALTER TABLE `actie_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actie_nr` (`actie_id`),
  ADD KEY `aanmaker_id` (`aanmaker_id`);

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `risicoclassificatie`
--
ALTER TABLE `risicoclassificatie`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `risicosoort`
--
ALTER TABLE `risicosoort`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexen voor tabel `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `acties`
--
ALTER TABLE `acties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT voor een tabel `actie_link`
--
ALTER TABLE `actie_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `risicoclassificatie`
--
ALTER TABLE `risicoclassificatie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `risicosoort`
--
ALTER TABLE `risicosoort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT voor een tabel `sector`
--
ALTER TABLE `sector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `acties`
--
ALTER TABLE `acties`
  ADD CONSTRAINT `acties_ibfk_1` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`),
  ADD CONSTRAINT `acties_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `acties_ibfk_4` FOREIGN KEY (`risicosoort_id`) REFERENCES `risicosoort` (`id`),
  ADD CONSTRAINT `acties_ibfk_5` FOREIGN KEY (`risicoclassificatie_id`) REFERENCES `risicoclassificatie` (`id`),
  ADD CONSTRAINT `acties_ibfk_6` FOREIGN KEY (`actie_eigenaar_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `acties_ibfk_7` FOREIGN KEY (`probleem_eigenaar_id`) REFERENCES `users` (`id`);

--
-- Beperkingen voor tabel `actie_link`
--
ALTER TABLE `actie_link`
  ADD CONSTRAINT `actie_link_ibfk_1` FOREIGN KEY (`actie_id`) REFERENCES `acties` (`id`),
  ADD CONSTRAINT `actie_link_ibfk_2` FOREIGN KEY (`aanmaker_id`) REFERENCES `users` (`id`);

--
-- Beperkingen voor tabel `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
