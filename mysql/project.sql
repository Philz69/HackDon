-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 14 Avril 2018 à 21:55
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hackdon`
--

-- --------------------------------------------------------

--
-- Structure de la table `accountorganisation`
--

CREATE TABLE `accountorganisation` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passwordHash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` blob NOT NULL,
  `bannerImg` blob,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `accountorganisation`
--

INSERT INTO `accountorganisation` (`ID`, `name`, `email`, `passwordHash`, `description`, `bannerImg`, `code`, `datetime`) VALUES
(1, 'CHUS', 'fondation@chus.org', '', 0x466f6e646174696f6e2064752043485553, NULL, 'qwerty', '2018-04-14 14:01:57'),
(2, 'asd', 'asd', '$2y$10$YeIEz8vVGST2RueCRe7GdeqZiJTPNOZz3yFS/ZaZUorw/3DAV8FwS', 0x0961736409090a0909, 0x6a686173646b6a617364, 'qwerty', '2018-04-14 14:19:01');

-- --------------------------------------------------------

--
-- Structure de la table `accountuser`
--

CREATE TABLE `accountuser` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passwordHash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `accountuser`
--

INSERT INTO `accountuser` (`ID`, `name`, `email`, `passwordHash`, `score`, `datetime`) VALUES
(1, 'bob', 'bob@bob.com', '', 0, '2018-04-14 14:01:57');

-- --------------------------------------------------------

--
-- Structure de la table `donations`
--

CREATE TABLE `donations` (
  `ID` int(11) NOT NULL,
  `accountID` smallint(6) DEFAULT NULL,
  `projectID` int(11) NOT NULL,
  `amount` smallint(6) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `donations`
--

INSERT INTO `donations` (`ID`, `accountID`, `projectID`, `amount`, `datetime`) VALUES
(1, NULL, 1, 33, '2018-04-14 16:08:12'),
(2, NULL, 1, 152, '2018-04-14 16:09:06'),
(3, NULL, 1, 9, '2018-04-14 16:21:59');

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `ID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isSeen` tinyint(1) NOT NULL DEFAULT '0',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

CREATE TABLE `project` (
  `ID` int(11) NOT NULL,
  `organisationID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` blob NOT NULL,
  `objective` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amountWanted` int(11) NOT NULL,
  `amountCollected` int(11) NOT NULL DEFAULT '0',
  `isCompleted` tinyint(1) NOT NULL DEFAULT '0',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `project`
--

INSERT INTO `project` (`ID`, `organisationID`, `name`, `description`, `objective`, `amountWanted`, `amountCollected`, `isCompleted`, `datetime`) VALUES
(1, 1, 'Cancer', 0x52616d6d6173736572206465206c27617267656e7420706f7572206169646572206c652063616e6365722e, '', 3000000, 0, 0, '2018-04-14 14:01:57'),
(2, 2, 'asd', 0x0961736409090a0909, 'asd', 234, 0, 0, '2018-04-14 14:19:59'),
(3, 1, 'Test1', 0x74657374, 'test', 3000, 0, 0, '2018-04-14 17:03:02');

-- --------------------------------------------------------

--
-- Structure de la table `publications`
--

CREATE TABLE `publications` (
  `ID` smallint(6) NOT NULL,
  `orgID` smallint(6) DEFAULT NULL,
  `projectID` smallint(6) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `publications`
--

INSERT INTO `publications` (`ID`, `orgID`, `projectID`, `message`, `datetime`) VALUES
(1, 1, 1, 'sda', '2018-04-14 17:42:11');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `accountorganisation`
--
ALTER TABLE `accountorganisation`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `accountuser`
--
ALTER TABLE `accountuser`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `accountID` (`accountID`),
  ADD KEY `projectID` (`projectID`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `accountID` (`accountID`),
  ADD KEY `projectID` (`projectID`);

--
-- Index pour la table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `organisationID` (`organisationID`);

--
-- Index pour la table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `accountorganisation`
--
ALTER TABLE `accountorganisation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `accountuser`
--
ALTER TABLE `accountuser`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `donations`
--
ALTER TABLE `donations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `project`
--
ALTER TABLE `project`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `publications`
--
ALTER TABLE `publications`
  MODIFY `ID` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_ibfk_2` FOREIGN KEY (`projectID`) REFERENCES `project` (`ID`) ON DELETE CASCADE;

--
-- Contraintes pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `accountuser` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`projectID`) REFERENCES `project` (`ID`) ON DELETE CASCADE;

--
-- Contraintes pour la table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`organisationID`) REFERENCES `accountorganisation` (`ID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
