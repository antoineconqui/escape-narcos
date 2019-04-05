-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2019 at 10:37 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escapenarcos`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `rules` varchar(10000) NOT NULL,
  `nbEnigme` int(11) NOT NULL,
  `delay_indices` varchar(10000) NOT NULL,
  `text_indices` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `name`, `title`, `text`, `rules`, `nbEnigme`, `delay_indices`, `text_indices`) VALUES
(1, 'pablo-house', 'Escape from Pablo\'s House', 'Pablo Escabar vous a enfermé dans sa maison. En tant qu\'agent de la DEA, vous devez vite vous en échapper !', 'Vous êtes un agent de la DEA et vous vous êtes infiltré dans la maison de Pablo Escobar grâce aux information d’une taupe. Cependant, le baron de la drogue a réussi à mettre la main sur vous et vous a enfermé dans le cachot de sa villa. Il a ensuite tué la taupe d’une balle dans la tête. <br>\r\n        Il s’est ensuite échappé par la sortie secrète cachée dans son bureau depuis laquelle il a pu rejoindre les égouts et s’échapper. <br>\r\n        Vous devez réussir à trouver comment Pablo Escobar s’est échappé afin de sortir de cet enfer.', 0, '[10,15]', '[\r\n    \"Trouvez l\'interrupteur.\",\r\n    \"Trouvez un moyen d\'ouvrir la porte.\"   \r\n]'),
(2, 'catedral', 'Escape from la Catedral', 'Aidez Pablo Escobar à s\'échapper de sa célèbre prison \"La Catedral\" !', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `team` int(11) DEFAULT NULL,
  `question` varchar(1000) DEFAULT NULL,
  `answer` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `date`, `team`, `question`, `answer`) VALUES
(26, '2019-03-29 01:03:02', 38, 'hey', 'whats up ?'),
(27, '2019-03-29 01:35:13', 40, 'hello', 'salut'),
(28, '2019-03-29 01:35:26', 40, 'comment faire ?', ''),
(29, '2019-03-29 01:35:49', 40, 's', 'hey'),
(30, '2019-03-29 01:39:44', 40, 'hello', 'hey'),
(31, '2019-03-29 01:39:54', 40, 'help', 'tu veux quoi ?'),
(32, '2019-03-29 01:40:26', 40, 'help me', 'raconte'),
(33, '2019-03-29 01:42:14', 41, 'hello', 'hello there'),
(34, '2019-03-29 01:42:29', 41, 'comment on avance ?', ''),
(35, '2019-03-30 11:40:38', 42, 'on fait quoi la ?', ''),
(36, '2019-03-30 11:45:59', 43, 'Help', ''),
(37, '2019-03-30 12:05:10', 43, 'Heloo', ''),
(38, '2019-03-30 12:12:00', 44, 'Hey', 'test'),
(39, '2019-03-30 12:16:34', 44, 'Question', 'Reponse'),
(40, '2019-03-30 12:23:59', 45, 'LoL', 'XD'),
(41, '2019-03-30 12:26:41', 45, 'Need help', ''),
(42, '2019-03-30 12:34:41', 46, 'Help', ''),
(43, '2019-03-30 12:36:01', 47, 'help', ''),
(44, '2019-03-30 12:42:53', 48, 'HELP', ''),
(45, '2019-03-30 12:53:57', 48, 'salut adrien', 'Hello'),
(46, '2019-03-30 13:24:57', 49, 'help', ''),
(47, '2019-03-30 13:27:07', 49, 'help', ''),
(48, '2019-03-30 13:27:25', 49, 'q', ''),
(49, '2019-03-30 13:28:13', 49, 'q', ''),
(50, '2019-03-30 13:29:52', 49, 'q', NULL),
(51, '2019-03-30 13:30:18', 49, 'q', NULL),
(52, '2019-03-30 13:33:13', 49, 'help', 'Suce'),
(53, '2019-03-30 13:34:56', 49, 'help', 'Suce ma beat'),
(54, '2019-03-30 13:36:03', 49, 'help me', ''),
(55, '2019-03-30 19:57:32', 50, 'help', 'Nique ta mère'),
(56, '2019-03-30 22:38:12', 53, 'oh mec', 'Oui ?'),
(57, '2019-03-30 22:39:03', 53, 'bien ou quoi', 'Ça va tranquille !'),
(58, '2019-03-30 22:40:54', 53, 'indice', 'Cherche fdp');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `game` int(11) NOT NULL,
  `player1` varchar(50) DEFAULT NULL,
  `player2` varchar(50) DEFAULT NULL,
  `player3` varchar(50) DEFAULT NULL,
  `player4` varchar(50) DEFAULT NULL,
  `playing` int(11) NOT NULL,
  `times` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `game`, `player1`, `player2`, `player3`, `player4`, `playing`, `times`) VALUES
(57, 1, 'aconqui', '', '', '', 0, '15 + 6');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `gmpass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`pseudo`, `password`, `gmpass`) VALUES
('aconqui', '1a1dc91c907325c69271ddf0c944bc72', '098f6bcd4621d373cade4e832627b4f6'),
('admin', '21232f297a57a5a743894a0e4a801fc3', ''),
('Adrigeek', 'b5e63e7eb40959dd45d37d46e2ac24e3', 'd41d8cd98f00b204e9800998ecf8427e'),
('bob', '1a1dc91c907325c69271ddf0c944bc72', ''),
('gamemaster', '1a1dc91c907325c69271ddf0c944bc72', '1037a1e80bee7fa2af374f64bf78ebdc'),
('john', '1a1dc91c907325c69271ddf0c944bc72', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`pseudo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
