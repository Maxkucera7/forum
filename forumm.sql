-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Úte 10. kvě 2022, 17:24
-- Verze serveru: 10.4.14-MariaDB
-- Verze PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `forumm`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_czech_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `text`, `user_id`) VALUES
(1, 1, 'dawdawdawdawd', '47'),
(2, 1, 'dawdawdawdaw', 'diex5five'),
(3, 1, 'Jaroušek', 'diex5five'),
(4, 1, 'jmenuji se jára', 'diex5five'),
(5, 1, 'jsem borec', 'diex5five'),
(6, 2, 'dawdwada', 'diex5five'),
(7, 2, 'dawdawdawdawd', NULL),
(8, 2, 'dawdawdawdawd', NULL),
(9, 3, 'dawdawda', 'petrbarta');

-- --------------------------------------------------------

--
-- Struktura tabulky `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user` varchar(60) COLLATE utf8mb4_czech_ci DEFAULT NULL,
  `nadpis` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `datum` date DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `posts`
--

INSERT INTO `posts` (`id`, `user`, `nadpis`, `text`, `datum`, `time`) VALUES
(1, 'petrbarta', 'TEst', 'Lorem ipsum je označení pro standardní pseudolatinský text užívaný v grafickém designu a navrhování jako demonstrativní výplňový text při vytváření pracovních ukázek grafických návrhů. Lipsum tak pracovně znázorňuje text v ukázkových maketách předtím, než', '0000-00-00', NULL),
(2, 'petrbarta', 'o8wPvzr1g0', 'Lorem ipsum je označení pro standardní pseudolatinský text užívaný v grafickém designu a navrhování jako demonstrativní výplňový text při vytváření pracovních ukázek grafických návrhů. Lipsum tak pracovně znázorňuje text v ukázkových maketách předtím, než', '2022-05-10', NULL),
(3, 'petrbarta', 'čokoláda', 'http://localhost/phpmyadmin/sql.php?server=1&db=forumm&table=users&pos=0', '2022-05-10', NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `role` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `answer`, `role`) VALUES
(45, 'petrbarta', 'maximus8@email.cz', '$2y$10$PrgCEnvY5Y87F7MF2iDtZ.SKlCE68QoaI8fnfTXpLIWcs5gAXiwq.', '12', NULL),
(47, 'diex5five', 'diexfive@gmail.com', '$2y$10$qmFf2Q2fyPhpqqTIN54G4uKJu0pCw.kPK5WL.cBs4s93y4XLcEeLG', 'w', 1);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pro tabulku `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
