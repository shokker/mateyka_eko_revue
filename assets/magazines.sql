-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Hostiteľ: localhost:3306
-- Čas generovania: So 07.Jan 2017, 10:37
-- Verzia serveru: 5.5.49-log
-- Verzia PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `eko_revue`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `magazines`
--

CREATE TABLE IF NOT EXISTS `magazines` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_slovak_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_slovak_ci NOT NULL,
  `body` varchar(255) COLLATE utf8_slovak_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_slovak_ci NOT NULL,
  `featured_image` varchar(255) COLLATE utf8_slovak_ci NOT NULL,
  `status` int(11) NOT NULL,
  `published_at` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `magazines`
--
ALTER TABLE `magazines`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `magazines`
--
ALTER TABLE `magazines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
