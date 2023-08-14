-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 14 août 2023 à 16:57
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `superbowl`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bets`
--

INSERT INTO `bets` (`bet_id`, `bet_date`, `user_id`, `match_id`, `match_date`, `team1_name`, `team2_name`, `date_match_name`, `team1_odds`, `draw_odds`, `team2_odds`, `team_name_bet`, `team1_bet`, `draw_bet`, `team2_bet`, `bet_status`, `potential_gain`, `bet_gain`, `bet_admin_status`) VALUES
(1, '2023-07-19', 1, 3, '2023-07-19', 'Houston', 'Kansas City', '2023-07-19 Houston - Kansas City', 0.00, 0.00, 1.27, 'Kansas City', 0.00, 0.00, 2.00, 'Gagné', 2.54, 2.54, 'closed'),
(5, '2023-08-10', 1, 22, '2023-08-10', 'Pittsburgh', 'LA Rams', '2023-08-10 Pittsburgh - LA Rams', 0.00, 0.00, 1.40, 'LA Rams', 0.00, 0.00, 4.00, 'Perdu', 5.60, 0.00, 'closed'),
(6, '2023-08-11', 1, 23, '2023-08-11', 'NY Jets', 'Minnesota', '2023-08-11 NY Jets - Minnesota', 1.56, 0.00, 0.00, 'NY Jets', 3.00, 0.00, 0.00, 'Gagné', 4.68, 4.68, 'closed'),
(7, '2023-08-11', 1, 24, '2023-08-11', 'Detroit', 'Baltimore', '2023-08-11 Detroit - Baltimore', 0.00, 0.00, 1.33, 'Baltimore', 0.00, 0.00, 1.50, 'Gagné', 2.00, 2.00, 'closed'),
(8, '2023-08-11', 1, 19, '2023-08-20', 'Washington', 'Buffalo', '2023-08-20 Washington - Buffalo', 1.90, 0.00, 0.00, 'Washington', 1.00, 0.00, 0.00, 'En cours', 1.90, 0.00, 'open'),
(9, '2023-08-12', 1, 27, '2023-08-12', 'Carolina', 'Houston', '2023-08-12 Carolina - Houston', 1.35, 0.00, 0.00, 'Carolina', 1.00, 0.00, 0.00, 'Gagné', 1.35, 1.35, 'closed'),
(10, '2023-08-12', 1, 28, '2023-08-12', 'Cleveland', 'Miami', '2023-08-12 Cleveland - Miami', 1.35, 0.00, 0.00, 'Cleveland', 2.00, 0.00, 0.00, 'Gagné', 2.70, 2.70, 'closed'),
(11, '2023-08-12', 1, 29, '2023-08-12', 'Denver', 'San Francisco', '2023-08-12 Denver - San Francisco', 1.28, 0.00, 0.00, 'Denver', 3.00, 0.00, 0.00, 'Gagné', 3.84, 3.84, 'closed'),
(12, '2023-08-12', 1, 30, '2023-08-12', 'Green Bay', 'Jacksonville', '2023-08-12 Green Bay - Jacksonville', 0.00, 0.00, 1.53, 'Jacksonville', 0.00, 0.00, 1.00, 'Gagné', 1.53, 1.53, 'closed'),
(13, '2023-08-12', 1, 31, '2023-08-12', 'Indianapolis', 'Minnesota', '2023-08-12 Indianapolis - Minnesota', 1.43, 0.00, 0.00, 'Indianapolis', 3.00, 0.00, 0.00, 'Gagné', 4.29, 4.29, 'closed'),
(14, '2023-08-12', 2, 32, '2023-08-12', 'Cincinnati', 'Tampa Bay', '2023-08-12 Cincinnati - Tampa Bay', 1.21, 0.00, 0.00, 'Cincinnati', 1.00, 0.00, 0.00, 'Gagné', 1.21, 1.21, 'closed'),
(15, '2023-08-12', 1, 32, '2023-08-12', 'Cincinnati', 'Tampa Bay', '2023-08-12 Cincinnati - Tampa Bay', 1.21, 0.00, 0.00, 'Cincinnati', 1.00, 0.00, 0.00, 'Gagné', 1.21, 1.21, 'closed'),
(16, '2023-08-12', 1, 33, '2023-08-12', 'Carolina', 'Atlanta', '2023-08-12 Carolina - Atlanta', 1.56, 0.00, 0.00, 'Carolina', 2.00, 0.00, 0.00, 'Gagné', 3.12, 3.12, 'closed'),
(17, '2023-08-14', 1, 36, '2023-08-14', 'Atlanta', 'New Orleans', '2023-08-14 Atlanta - New Orleans', 1.24, 0.00, 0.00, 'Atlanta', 1.00, 0.00, 0.00, 'Gagné', 1.24, 1.24, 'closed'),
(18, '2023-08-14', 1, 37, '2023-08-14', 'San Francisco', 'Baltimore', '2023-08-14 San Francisco - Baltimore', 0.00, 0.00, 1.18, 'Baltimore', 0.00, 0.00, 1.00, 'Perdu', 1.18, 0.00, 'closed'),
(19, '2023-08-14', 1, 39, '2023-08-14', 'Carolina', 'NY Jets', '2023-08-14 Carolina - NY Jets', 0.00, 0.00, 1.75, 'NY Jets', 0.00, 0.00, 1.00, 'Perdu', 1.75, 0.00, ''),
(20, '2023-08-14', 1, 40, '2023-08-14', 'Buffalo', 'Seattle', '2023-08-14 Buffalo - Seattle', 0.00, 17.00, 0.00, 'Match nul', 0.00, 1.00, 0.00, 'Perdu', 17.00, 0.00, ''),
(21, '2023-08-14', 1, 41, '2023-08-14', 'Indianapolis', 'Jacksonville', '2023-08-14 Indianapolis - Jacksonville', 1.47, 0.00, 0.00, 'Indianapolis', 1.00, 0.00, 0.00, 'Gagné', 1.47, 1.47, 'closed');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `matchs`
--

INSERT INTO `matchs` (`match_id`, `match_date`, `start_time`, `end_time`, `team1_name`, `team2_name`, `match_name`, `match_comment`, `date_match_name`, `team1_odds`, `draw_odds`, `team2_odds`, `team1_score`, `team2_score`, `team_winning_name`, `match_status`, `admin_status`) VALUES
(1, '2023-07-17', '20:30:00', '22:00:00', 'Atlanta', 'Kansas City', 'Atlanta - Kansas City', '', '2023-07-17 Atlanta - Kansas City', 1.53, 13.00, 1.47, 35, 40, 'Kansas City', 'terminé', 'closed'),
(3, '2023-07-19', '20:00:00', '21:30:00', 'Houston', 'Kansas City', 'Houston - Kansas City', '', '2023-07-19 Houston - Kansas City', 1.73, 14.00, 1.27, 35, 49, 'Kansas City', 'terminé', 'closed'),
(4, '2023-07-19', '20:30:00', '22:00:00', 'Indianapolis', 'Las Vegas', 'Indianapolis - Las Vegas', '', '2023-07-19 Indianapolis - Las Vegas', 1.47, 13.00, 1.53, 39, 26, 'Indianapolis', 'terminé', 'closed'),
(9, '2023-07-18', '20:00:00', '21:30:00', 'San Francisco', 'Tennessee', 'San Francisco - Tennessee', '', '2023-07-18 San Francisco - Tennessee', 1.33, 19.00, 1.67, 21, 32, 'Tennessee', 'terminé', 'closed'),
(12, '2023-07-27', '21:00:00', '22:30:00', 'Cleveland', 'New England', 'Cleveland - New England', '', '2023-07-27 Cleveland - New England', 1.35, 14.00, 1.65, 56, 47, 'Cleveland', 'terminé', 'closed'),
(13, '2023-07-20', '20:00:00', '21:30:00', 'Detroit', 'Carolina', 'Detroit - Carolina', '', '2023-07-20 Detroit - Carolina', 1.62, 13.00, 1.38, 21, 40, 'Carolina', 'terminé', 'closed'),
(14, '2023-07-20', '21:00:00', '22:30:00', 'Houston', 'Cleveland', 'Houston - Cleveland', 'Beau combat à venir !', '2023-07-20 Houston - Cleveland', 1.58, 13.00, 1.42, 35, 48, 'Cleveland', 'terminé', 'closed'),
(15, '2023-07-20', '20:30:00', '22:00:00', 'Jacksonville', 'Tennessee', 'Jacksonville - Tennessee', '', '2023-07-20 Jacksonville - Tennessee', 1.21, 21.00, 1.79, 21, 42, 'Tennessee', 'terminé', 'closed'),
(16, '2023-07-21', '20:00:00', '21:30:00', 'Miami', 'Pittsburgh', 'Miami - Pittsburgh', 'Beau combat à venir !', '2023-07-21 Miami - Pittsburgh', 1.44, 13.00, 1.56, 28, 46, 'Pittsburgh', 'terminé', 'closed'),
(17, '2023-07-21', '20:00:00', '21:30:00', 'LA Rams', 'LA Chargers', 'LA Rams - LA Chargers', '', '2023-07-21 LA Rams - LA Chargers', 1.50, 12.00, 1.50, 35, 28, 'LA Chargers', 'terminé', 'closed'),
(18, '2023-07-25', '20:00:00', '21:30:00', 'Houston', 'San Francisco', 'Houston - San Francisco', '', '2023-07-25 Houston - San Francisco', 1.33, 15.00, 1.67, 37, 45, 'San Francisco', 'terminé', 'closed'),
(19, '2023-08-20', '20:00:00', '21:30:00', 'Washington', 'Buffalo', 'Washington - Buffalo', 'Un match de titans !', '2023-08-20 Washington - Buffalo', 1.90, 23.00, 1.10, NULL, NULL, NULL, 'à venir', 'open'),
(20, '2023-09-02', '20:00:00', '21:30:00', 'Atlanta', 'Dallas', 'Atlanta - Dallas', 'Un très beau match en perspective ! Le match s\'annonce palpitant !', '2023-09-02 Atlanta - Dallas', 1.37, 13.00, 1.63, NULL, NULL, NULL, 'à venir', 'open'),
(22, '2023-08-10', '22:00:00', '23:30:00', 'Pittsburgh', 'LA Rams', 'Pittsburgh - LA Rams', 'Un très beau match en perspective ! Le match s\'annonce palpitant !', '2023-08-10 Pittsburgh - LA Rams', 1.60, 14.00, 1.40, 24, 36, 'LA Rams', 'terminé', 'closed'),
(23, '2023-08-11', '14:00:00', '15:30:00', 'NY Jets', 'Minnesota', 'NY Jets - Minnesota', 'Un très beau match en perspective !', '2023-08-11 NY Jets - Minnesota', 1.56, 13.00, 1.44, 42, 36, 'NY Jets', 'terminé', 'closed'),
(24, '2023-08-11', '16:00:00', '17:30:00', 'Detroit', 'Baltimore', 'Detroit - Baltimore', 'Beau combat à venir !', '2023-08-11 Detroit - Baltimore', 1.67, 14.00, 1.33, 20, 42, 'Baltimore', 'terminé', 'closed'),
(25, '2023-08-22', '20:00:00', '21:30:00', 'Denver', 'Miami', 'Denver - Miami', 'Beau combat à venir !', '2023-08-22 Denver - Miami', 1.37, 14.00, 1.63, NULL, NULL, NULL, 'à venir', 'open'),
(26, '2023-09-20', '20:00:00', '21:30:00', 'Cleveland', 'Jacksonville', 'Cleveland - Jacksonville', 'Beau combat à venir.', '2023-09-20 Cleveland - Jacksonville', 1.40, 14.00, 1.60, NULL, NULL, NULL, 'à venir', 'open'),
(27, '2023-08-12', '11:30:00', '13:00:00', 'Carolina', 'Houston', 'Carolina - Houston', 'Beau combat à venir !', '2023-08-12 Carolina - Houston', 1.35, 14.00, 1.65, 41, 28, 'Carolina', 'terminé', 'closed'),
(28, '2023-08-12', '14:00:00', '15:30:00', 'Cleveland', 'Miami', 'Cleveland - Miami', 'Un très beau match en perspective ! Le match s\'annonce palpitant !', '2023-08-12 Cleveland - Miami', 1.35, 14.00, 1.65, 45, 37, 'Cleveland', 'terminé', 'closed'),
(29, '2023-08-12', '16:00:00', '17:30:00', 'Denver', 'San Francisco', 'Denver - San Francisco', 'Un match de titans !', '2023-08-12 Denver - San Francisco', 1.28, 16.00, 1.72, 36, 25, 'Denver', 'terminé', 'closed'),
(30, '2023-08-12', '14:45:00', '16:15:00', 'Green Bay', 'Jacksonville', 'Green Bay - Jacksonville', '', '2023-08-12 Green Bay - Jacksonville', 1.47, 13.00, 1.53, 51, 75, 'Jacksonville', 'terminé', 'closed'),
(31, '2023-08-12', '15:00:00', '16:30:00', 'Indianapolis', 'Minnesota', 'Indianapolis - Minnesota', '', '2023-08-12 Indianapolis - Minnesota', 1.43, 13.00, 1.57, 42, 32, 'Indianapolis', 'terminé', 'closed'),
(32, '2023-08-12', '16:30:00', '18:00:00', 'Cincinnati', 'Tampa Bay', 'Cincinnati - Tampa Bay', 'Beau combat à venir.', '2023-08-12 Cincinnati - Tampa Bay', 1.21, 18.00, 1.79, 45, 36, 'Cincinnati', 'terminé', 'closed'),
(33, '2023-08-12', '16:45:00', '18:15:00', 'Carolina', 'Atlanta', 'Carolina - Atlanta', '', '2023-08-12 Carolina - Atlanta', 1.56, 13.00, 1.44, 35, 26, 'Carolina', 'terminé', 'closed'),
(34, '2023-08-14', '14:00:00', '15:30:00', 'Cincinnati', 'Tampa Bay', 'Cincinnati - Tampa Bay', '', '2023-08-14 Cincinnati - Tampa Bay', 1.21, 18.00, 1.79, 24, 36, 'Tampa Bay', 'terminé', 'closed'),
(35, '2023-08-14', '14:00:00', '15:30:00', 'New Orleans', 'Cleveland', 'New Orleans - Cleveland', '', '2023-08-14 New Orleans - Cleveland', 1.65, 14.00, 1.35, 48, 65, 'Cleveland', 'terminé', 'closed'),
(36, '2023-08-14', '15:30:00', '16:00:00', 'Atlanta', 'New Orleans', 'Atlanta - New Orleans', '', '2023-08-14 Atlanta - New Orleans', 1.24, 15.00, 1.76, 48, 26, 'Atlanta', 'terminé', 'closed'),
(37, '2023-08-14', '15:30:00', '16:00:00', 'San Francisco', 'Baltimore', 'San Francisco - Baltimore', '', '2023-08-14 San Francisco - Baltimore', 1.82, 17.00, 1.18, 31, 24, 'San Francisco', 'terminé', 'closed'),
(38, '2023-08-14', '14:45:00', '16:15:00', 'Kansas City', 'Las Vegas', 'Kansas City - Las Vegas', '', '2023-08-14 Kansas City - Las Vegas', 1.25, 15.00, 1.75, 40, 35, 'Kansas City', 'terminé', 'closed'),
(39, '2023-08-14', '15:00:00', '16:30:00', 'Carolina', 'NY Jets', 'Carolina - NY Jets', 'Beau match à venir !', '2023-08-14 Carolina - NY Jets', 1.25, 16.00, 1.75, 48, 42, 'Carolina', 'terminé', 'closed'),
(40, '2023-08-14', '15:00:00', '16:30:00', 'Buffalo', 'Seattle', 'Buffalo - Seattle', 'Un match de titans !', '2023-08-14 Buffalo - Seattle', 1.18, 17.00, 1.82, 41, 35, 'Buffalo', 'terminé', 'closed'),
(41, '2023-08-14', '15:00:00', '16:30:00', 'Indianapolis', 'Jacksonville', 'Indianapolis - Jacksonville', '', '2023-08-14 Indianapolis - Jacksonville', 1.47, 13.00, 1.53, 36, 24, 'Indianapolis', 'terminé', 'closed');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `teams`
--

INSERT INTO `teams` (`team_id`, `team_name`, `team_winning_odds`, `player1`, `player2`, `player3`, `player4`, `player5`, `player6`, `player7`, `player8`, `player9`, `player10`, `player11`, `comment`, `latest_news`) VALUES
(1, 'Kansas City', 1.06, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2023/2024!'),
(2, 'Arizona', 1.19, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Très belle équipe !', 'Qualifiée pour le Super Bowl 2023/2024!'),
(3, 'Atlanta', 1.22, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2023/2024!'),
(4, 'Baltimore', 1.25, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'En route pour la gloire !'),
(5, 'Buffalo', 1.32, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2023/2024!'),
(6, 'Carolina', 1.58, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2023/2024!'),
(7, 'Chicago', 1.58, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2023/2024!'),
(8, 'Cincinnati', 1.91, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2023/2024!'),
(9, 'Cleveland', 2.10, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2023/2024!'),
(10, 'Dallas', 2.10, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(11, 'Denver', 2.23, '', '', '', '', '', '', '', '', '', '', '', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(12, 'Detroit', 2.56, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(13, 'Green Bay', 2.88, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(14, 'Houston', 2.88, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(15, 'Indianapolis', 2.88, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(16, 'Jacksonville', 3.21, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(17, 'LA Chargers', 3.21, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(18, 'LA Rams', 3.21, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(19, 'Las Vegas', 3.21, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(20, 'Miami', 3.86, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(21, 'Minnesota', 3.86, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(22, 'New England', 3.86, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(23, 'NY Giants', 4.84, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(24, 'NY Jets', 4.84, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(25, 'Philadelphie', 4.84, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(26, 'Pittsburgh', 4.84, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(27, 'San Francisco', 5.82, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(28, 'Seattle', 5.82, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(29, 'Tampa Bay', 7.13, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(30, 'Tennessee', 12.02, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(31, 'Washington', 12.02, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!'),
(32, 'New Orleans', 3.86, 'John Doe1', 'John Doe2', 'John Doe3', 'John Doe4', 'John Doe5', 'John Doe6', 'John Doe7', 'John Doe8', 'John Doe9', 'John Doe10', 'John Doe11', 'Une équipe au top de sa forme!', 'Qualifiée pour le Super Bowl 2024!');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `birth_date`, `role`, `user_balance`) VALUES
(1, 'John', 'Doe', 'john@doe.com', '$2y$10$pNOImO7wC0RW5DJ2fKhcqO1FXQoRCYtORT.Sxt9UxZaJCmPl6dQ7O', '1971-07-16', 'user', -12.75),
(2, 'Tuyen', 'Nguyen', 'tuyen.nguyen.fr@gmail.com', '$2y$10$OB04TjAvT4IYVmlsAYf8tuCi18hRykgEaFNzqTXWjc4nb/SRVWOcG', '1971-07-16', 'admin', 0.21),
(3, 'Laure', 'Mondi', 'laure@mondi.com', '$2y$10$Nw/hIHVacODDDK/aymCIsel0NCSLVJszMlKazeS9Uk2DVaSP4sCy.', '1971-07-16', 'commentator', 0.00);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users_balance`
--

INSERT INTO `users_balance` (`transaction_id`, `transaction_date`, `user_id`, `transaction_description`, `credit`, `debit`, `user_balance`) VALUES
(1, '2023-07-19', 1, 'Mise pari', 0.00, 2.00, -2.00),
(5, '2023-08-10', 1, 'Mise pari', 0.00, 4.00, -12.00),
(6, '2023-08-11', 1, 'Mise pari', 0.00, 3.00, -15.00),
(7, '2023-08-11', 1, 'Mise pari', 0.00, 1.50, -16.50),
(8, '2023-08-11', 1, 'Mise pari', 0.00, 1.00, -17.50),
(9, '2023-08-11', 1, 'Gain pari', 2.00, 0.00, -15.50),
(10, '2023-08-12', 1, 'Mise pari', 0.00, 1.00, -16.50),
(11, '2023-08-12', 1, 'Mise pari', 0.00, 2.00, -18.50),
(12, '2023-08-12', 1, 'Mise pari', 0.00, 3.00, -21.50),
(13, '2023-08-12', 1, 'Gain pari', 1.35, 0.00, -20.15),
(14, '2023-08-12', 1, 'Gain pari', 2.70, 0.00, -17.45),
(15, '2023-08-12', 1, 'Mise pari', 0.00, 1.00, -18.45),
(16, '2023-08-12', 1, 'Mise pari', 0.00, 3.00, -21.45),
(17, '2023-08-12', 1, 'Gain pari', 1.53, 0.00, -19.92),
(18, '2023-08-12', 1, 'Gain pari', 4.29, 0.00, -15.63),
(19, '2023-08-12', 1, 'Gain pari', 3.84, 0.00, -11.79),
(20, '2023-08-12', 2, 'Mise pari', 0.00, 1.00, -1.00),
(21, '2023-08-12', 1, 'Mise pari', 0.00, 1.00, -12.79),
(22, '2023-08-12', 1, 'Mise pari', 0.00, 2.00, -14.79),
(23, '2023-08-12', 2, 'Gain pari', 1.21, 0.00, 0.21),
(24, '2023-08-12', 1, 'Gain pari', 1.21, 0.00, -13.58),
(25, '2023-08-12', 1, 'Gain pari', 3.12, 0.00, -10.46),
(26, '2023-08-14', 1, 'Mise pari', 0.00, 1.00, -11.46),
(27, '2023-08-14', 1, 'Mise pari', 0.00, 1.00, -12.46),
(28, '2023-08-14', 1, 'Gain pari', 1.24, 0.00, -11.22),
(29, '2023-08-14', 1, 'Mise pari', 0.00, 1.00, -12.22),
(30, '2023-08-14', 1, 'Mise pari', 0.00, 1.00, -13.22),
(31, '2023-08-14', 1, 'Mise pari', 0.00, 1.00, -14.22),
(32, '2023-08-14', 1, 'Gain pari', 1.47, 0.00, -12.75);

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
  MODIFY `bet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `matchs`
--
ALTER TABLE `matchs`
  MODIFY `match_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users_balance`
--
ALTER TABLE `users_balance`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
