-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 27 sep. 2023 à 12:02
-- Version du serveur : 10.5.21-MariaDB
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `yngbgcth_superbowl`
--

-- --------------------------------------------------------

--
-- Structure de la table `bets`
--

CREATE TABLE `bets` (
  `bet_id` int(11) NOT NULL,
  `bet_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `match_date` date NOT NULL,
  `team1_name` varchar(255) NOT NULL,
  `team2_name` varchar(255) NOT NULL,
  `date_match_name` varchar(255) NOT NULL,
  `team1_odds` decimal(11,2) NOT NULL,
  `draw_odds` decimal(11,2) NOT NULL,
  `team2_odds` decimal(11,2) NOT NULL,
  `team_name_bet` varchar(255) NOT NULL,
  `team1_bet` decimal(11,2) NOT NULL,
  `draw_bet` decimal(11,2) NOT NULL,
  `team2_bet` decimal(11,2) NOT NULL,
  `bet_status` varchar(255) NOT NULL,
  `potential_gain` decimal(11,2) NOT NULL,
  `bet_gain` decimal(11,2) NOT NULL,
  `bet_admin_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bets`
--

INSERT INTO `bets` (`bet_id`, `bet_date`, `user_id`, `match_id`, `match_date`, `team1_name`, `team2_name`, `date_match_name`, `team1_odds`, `draw_odds`, `team2_odds`, `team_name_bet`, `team1_bet`, `draw_bet`, `team2_bet`, `bet_status`, `potential_gain`, `bet_gain`, `bet_admin_status`) VALUES
(62, '2023-09-16', 1, 64, '2023-09-16', 'Cincinnati', 'Cleveland', '2023-09-16 Cincinnati - Cleveland', '1.48', '0.00', '0.00', 'Cincinnati', '1.00', '0.00', '0.00', 'Gagné', '1.48', '1.48', 'closed'),
(63, '2023-09-16', 1, 59, '2023-09-16', 'Arizona', 'Atlanta', '2023-09-16 Arizona - Atlanta', '0.00', '0.00', '1.51', 'Atlanta', '0.00', '0.00', '2.00', 'Perdu', '3.02', '0.00', 'open');

-- --------------------------------------------------------

--
-- Structure de la table `matchs`
--

CREATE TABLE `matchs` (
  `match_id` int(11) NOT NULL,
  `match_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `team1_name` varchar(255) NOT NULL,
  `team2_name` varchar(255) NOT NULL,
  `match_name` varchar(255) NOT NULL,
  `match_comment` varchar(255) NOT NULL,
  `date_match_name` varchar(255) NOT NULL,
  `team1_odds` decimal(11,2) NOT NULL,
  `draw_odds` decimal(11,2) NOT NULL,
  `team2_odds` decimal(11,2) NOT NULL,
  `team1_score` int(11) DEFAULT NULL,
  `team2_score` int(11) DEFAULT NULL,
  `team_winning_name` varchar(255) DEFAULT NULL,
  `match_status` varchar(255) NOT NULL,
  `admin_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `matchs`
--

INSERT INTO `matchs` (`match_id`, `match_date`, `start_time`, `end_time`, `team1_name`, `team2_name`, `match_name`, `match_comment`, `date_match_name`, `team1_odds`, `draw_odds`, `team2_odds`, `team1_score`, `team2_score`, `team_winning_name`, `match_status`, `admin_status`) VALUES
(59, '2023-09-16', '14:00:00', '15:30:00', 'Arizona', 'Atlanta', 'Arizona - Atlanta', 'Un match de titans !', '2023-09-16 Arizona - Atlanta', '1.49', '13.00', '1.51', 48, 35, 'Arizona', 'terminé', 'closed'),
(60, '2023-09-17', '20:00:00', '21:30:00', 'Baltimore', 'Buffalo', 'Baltimore - Buffalo', 'Un match à ne pas manquer !', '2023-09-17 Baltimore - Buffalo', '1.49', '13.00', '1.51', 27, 34, 'Buffalo', 'terminé', 'closed'),
(61, '2023-09-18', '15:00:00', '16:30:00', 'Carolina', 'Chicago', 'Carolina - Chicago', 'Un matchs de titans !', '2023-09-18 Carolina - Chicago', '1.50', '12.00', '1.50', 28, 25, 'Carolina', 'terminé', 'closed'),
(64, '2023-09-16', '12:00:00', '13:30:00', 'Cincinnati', 'Cleveland', 'Cincinnati - Cleveland', 'Un match à ne pas manquer !', '2023-09-16 Cincinnati - Cleveland', '1.48', '13.00', '1.52', 41, 34, 'Cincinnati', 'terminé', 'closed'),
(65, '2023-09-17', '15:00:00', '16:30:00', 'Dallas', 'Denver', 'Dallas - Denver', 'Un match à ne pas manquer !', '2023-09-17 Dallas - Denver', '1.48', '13.00', '1.52', 34, 42, 'Denver', 'terminé', 'closed'),
(66, '2023-09-20', '20:00:00', '21:30:00', 'Detroit', 'Green Bay', 'Detroit - Green Bay', 'Un match à ne pas manquer !', '2023-09-20 Detroit - Green Bay', '1.47', '13.00', '1.53', 34, 36, 'Green Bay', 'terminé', 'closed'),
(67, '2023-09-22', '14:00:00', '15:30:00', 'Houston', 'Indianapolis', 'Houston - Indianapolis', 'Un match à ne pas manquer !', '2023-09-22 Houston - Indianapolis', '1.50', '12.00', '1.50', 48, 35, 'Houston', 'terminé', 'closed'),
(68, '2023-09-25', '18:00:00', '19:30:00', 'Jacksonville', 'Kansas City', 'Jacksonville - Kansas City', '', '2023-09-25 Jacksonville - Kansas City', '1.75', '15.00', '1.25', 34, 27, 'Jacksonville', 'terminé', 'closed'),
(69, '2023-09-27', '20:00:00', '21:30:00', 'LA Chargers', 'LA Rams', 'LA Chargers - LA Rams', 'Beau match à venir !', '2023-09-27 LA Chargers - LA Rams', '1.50', '12.00', '1.50', 0, 0, NULL, 'en cours', 'open'),
(70, '2023-09-28', '19:00:00', '20:30:00', 'Las Vegas', 'Miami', 'Las Vegas - Miami', 'Un combat de titans !', '2023-09-28 Las Vegas - Miami', '1.45', '13.00', '1.55', 0, 0, NULL, 'à venir', 'open'),
(71, '2023-10-02', '10:00:00', '11:30:00', 'Minnesota', 'New England', 'Minnesota - New England', 'Un match à ne pas manquer !', '2023-10-02 Minnesota - New England', '1.50', '12.00', '1.50', 0, 0, NULL, 'à venir', 'open'),
(72, '2023-10-04', '14:00:00', '15:30:00', 'New Orleans', 'NY Giants', 'New Orleans - NY Giants', 'Un combat de titans !', '2023-10-04 New Orleans - NY Giants', '1.44', '13.00', '1.56', 0, 0, NULL, 'à venir', 'open'),
(73, '2023-10-10', '15:00:00', '16:30:00', 'NY Jets', 'Philadelphie', 'NY Jets - Philadelphie', 'Un combat de titans !', '2023-10-10 NY Jets - Philadelphie', '1.50', '12.00', '1.50', 0, 0, NULL, 'à venir', 'open'),
(74, '2023-10-13', '16:00:00', '17:30:00', 'Pittsburgh', 'San Francisco', 'Pittsburgh - San Francisco', 'Un combat de titans !', '2023-10-13 Pittsburgh - San Francisco', '1.45', '13.00', '1.55', 0, 0, NULL, 'à venir', 'open'),
(75, '2023-10-18', '16:00:00', '17:30:00', 'Seattle', 'Tampa Bay', 'Seattle - Tampa Bay', 'Un combat de titans !', '2023-10-18 Seattle - Tampa Bay', '1.45', '14.00', '1.55', 0, 0, NULL, 'à venir', 'open'),
(76, '2023-10-25', '14:00:00', '15:30:00', 'Tennessee', 'Washington', 'Tennessee - Washington', 'Un combat de titans !', '2023-10-25 Tennessee - Washington', '1.50', '12.00', '1.50', 0, 0, NULL, 'à venir', 'open');

-- --------------------------------------------------------

--
-- Structure de la table `teams`
--

CREATE TABLE `teams` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `team_winning_odds` decimal(11,2) NOT NULL,
  `player1` varchar(255) NOT NULL,
  `player2` varchar(255) NOT NULL,
  `player3` varchar(255) NOT NULL,
  `player4` varchar(255) NOT NULL,
  `player5` varchar(255) NOT NULL,
  `player6` varchar(255) NOT NULL,
  `player7` varchar(255) NOT NULL,
  `player8` varchar(255) NOT NULL,
  `player9` varchar(255) NOT NULL,
  `player10` varchar(255) NOT NULL,
  `player11` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `latest_news` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `teams`
--

INSERT INTO `teams` (`team_id`, `team_name`, `team_winning_odds`, `player1`, `player2`, `player3`, `player4`, `player5`, `player6`, `player7`, `player8`, `player9`, `player10`, `player11`, `comment`, `latest_news`) VALUES
(1, 'Kansas City', '1.06', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2023/2024!'),
(2, 'Arizona', '1.19', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Très belle équipe !', 'Qualifiée pour le Super Bowl 2023/2024!'),
(3, 'Atlanta', '1.22', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2023/2024!'),
(4, 'Baltimore', '1.25', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'En route pour la gloire !'),
(5, 'Buffalo', '1.32', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2023/2024!'),
(6, 'Carolina', '1.58', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2023/2024!'),
(7, 'Chicago', '1.58', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2023/2024!'),
(8, 'Cincinnati', '1.91', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2023/2024!'),
(9, 'Cleveland', '2.10', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2023/2024!'),
(10, 'Dallas', '2.10', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(11, 'Denver', '2.23', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(12, 'Detroit', '2.56', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(13, 'Green Bay', '2.88', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(14, 'Houston', '2.88', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(15, 'Indianapolis', '2.88', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(16, 'Jacksonville', '3.21', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(17, 'LA Chargers', '3.21', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(18, 'LA Rams', '3.21', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(19, 'Las Vegas', '3.21', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(20, 'Miami', '3.86', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(21, 'Minnesota', '3.86', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(22, 'New England', '3.86', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(23, 'NY Giants', '4.84', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(24, 'NY Jets', '4.84', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(25, 'Philadelphie', '4.84', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(26, 'Pittsburgh', '4.84', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(27, 'San Francisco', '5.82', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(28, 'Seattle', '5.82', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(29, 'Tampa Bay', '7.13', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(30, 'Tennessee', '12.02', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(31, 'Washington', '12.02', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(32, 'New Orleans', '3.86', 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `role` varchar(255) NOT NULL,
  `user_balance` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `birth_date`, `role`, `user_balance`) VALUES
(1, 'John', 'Doe', 'john@doe.com', '$2y$10$iffTq6ycFUHXi5Vnk6MFm.r5AQVmiIoZgyBj8f0YvfMllRslQV.A.', '1971-07-16', 'user', '-1.52'),
(2, 'Tuyen', 'Nguyen', 'tuyen.nguyen.fr@gmail.com', '$2y$10$OB04TjAvT4IYVmlsAYf8tuCi18hRykgEaFNzqTXWjc4nb/SRVWOcG', '1971-07-16', 'admin', '0.00'),
(3, 'Laure', 'Mondi', 'laure@mondi.com', '$2y$10$Nw/hIHVacODDDK/aymCIsel0NCSLVJszMlKazeS9Uk2DVaSP4sCy.', '1971-07-16', 'commentator', '0.00'),
(4, 'John2', 'Doe2', 'john2@doe.com', '$2y$10$WE3KMKRQuCnZKXXHVds5SeORYSzpnf6IvAVgIz7rBq.f2J4dkCsOC', '1971-07-16', 'user', '0.00');

-- --------------------------------------------------------

--
-- Structure de la table `users_balance`
--

CREATE TABLE `users_balance` (
  `transaction_id` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_description` varchar(255) NOT NULL,
  `credit` decimal(11,2) NOT NULL,
  `debit` decimal(11,2) NOT NULL,
  `user_balance` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users_balance`
--

INSERT INTO `users_balance` (`transaction_id`, `transaction_date`, `user_id`, `transaction_description`, `credit`, `debit`, `user_balance`) VALUES
(80, '2023-09-16', 1, 'Mise pari', '0.00', '1.00', '-1.00'),
(81, '2023-09-16', 1, 'Mise pari', '0.00', '2.00', '-3.00'),
(82, '2023-09-16', 1, 'Gain pari', '1.48', '0.00', '-1.52');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bets`
--
ALTER TABLE `bets`
  ADD PRIMARY KEY (`bet_id`);

--
-- Index pour la table `matchs`
--
ALTER TABLE `matchs`
  ADD PRIMARY KEY (`match_id`);

--
-- Index pour la table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `users_balance`
--
ALTER TABLE `users_balance`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bets`
--
ALTER TABLE `bets`
  MODIFY `bet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `matchs`
--
ALTER TABLE `matchs`
  MODIFY `match_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT pour la table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users_balance`
--
ALTER TABLE `users_balance`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
