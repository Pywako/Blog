
-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Version du serveur :  10.1.22-MariaDB
-- Version de PHP :  7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `p3_blog`
--

-- --------------------------------------------------------
DROP TABLE IF EXISTS t_chapitre;
DROP TABLE IF EXISTS t_commentaire;
DROP TABLE IF EXISTS t_utilisateur;

-- --------------------------------------------------------

--
-- Structure de la table `t_chapitre`
--

CREATE TABLE `t_chapitre` (
  `chap_id` int(11) NOT NULL,
  `chap_numero` float NOT NULL,
  `chap_titre` varchar(100) NOT NULL,
  `chap_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `chap_contenu` varchar(10000) NOT NULL,
  `chap_nbcom` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_chapitre`
--

INSERT INTO `t_chapitre` (`chap_id`, `chap_numero`, `chap_titre`, `chap_date`, `chap_contenu`, `chap_nbcom`) VALUES
(1, 1, 'Préface', '2017-05-29 10:22:13', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean blandit felis est. Quisque felis ipsum, placerat nec ullamcorper non, tempus sit amet turpis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent eu tempus mauris. Pellentesque tempus et justo at egestas. Praesent sit amet ornare magna. Nulla commodo urna et tincidunt ultricies. Praesent rhoncus commodo eros. Maecenas blandit facilisis ullamcorper. Suspendisse potenti. Nam sit amet massa orci. Mauris tincidunt scelerisque leo, eget vulputate odio tempus sed. Nulla ligula ex, tristique eget pellentesque nec, placerat vitae libero. Etiam eleifend purus massa, non facilisis metus laoreet ut.\r\n\r\nSed turpis orci, porttitor at diam vel, pellentesque ultricies mauris. Aenean mi purus, finibus in sollicitudin ut, gravida eu elit. Nam elementum leo felis, id consequat neque vehicula ut. Maecenas rutrum vel enim sed scelerisque. Aenean ipsum libero, varius vitae mauris et, feugiat venenatis sapien. Morbi viverra sapien diam, quis accumsan tortor luctus non. Morbi rutrum ac tellus ac luctus.\r\n\r\nDonec eu porta lorem. Quisque eget sapien nec ante commodo placerat in ac nulla. Donec posuere eu nisi in condimentum. Morbi pharetra nibh vitae felis congue pulvinar ac quis quam. Aliquam velit orci, pharetra in erat non, convallis efficitur enim. Aliquam erat volutpat. Etiam interdum tortor sed sollicitudin pretium. Etiam blandit finibus ex, sit amet pharetra ipsum sagittis at. Pellentesque porta at lorem a volutpat. Praesent vel lobortis sapien. Sed sit amet tempus neque. Ut blandit tempus tellus quis convallis. Vivamus fringilla imperdiet enim et congue. Fusce lectus quam, tincidunt eu interdum ut, pulvinar eget mauris.\r\n\r\nAenean non mi nec mi ornare fermentum et laoreet massa. Suspendisse ac orci dictum, consequat arcu eget, accumsan lacus. Cras blandit arcu in ipsum blandit tincidunt. Suspendisse porta vulputate mauris tincidunt vehicula. Mauris hendrerit, erat eu molestie tincidunt, urna orci accumsan urna, eget pretium tortor leo vitae orci. Sed accumsan eros rhoncus nisl consequat, eget tincidunt lorem auctor. Pellentesque cursus ultrices blandit. Quisque lacinia massa felis, vitae faucibus nibh bibendum vitae. Sed hendrerit semper est, at hendrerit neque pulvinar eu.\r\n\r\nSuspendisse eleifend nibh a ante sollicitudin, id gravida leo pulvinar. Sed vestibulum, tellus in blandit commodo, nibh arcu dignissim velit, quis fermentum arcu elit at nibh. Ut mollis imperdiet rhoncus. Sed gravida ut tortor quis scelerisque. Maecenas dignissim tellus non dictum luctus. Nam eget tortor ut neque mattis aliquet gravida et mi. Morbi sodales auctor arcu varius ultricies. Fusce varius sem magna. Quisque ultricies velit massa, nec sodales metus vulputate eu. Morbi eget mauris metus. Aliquam vel dui ut turpis pellentesque aliquam eget sed nibh.', 0),
(2, 2, 'Un début mouvementé ', '2017-05-29 10:23:32', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean blandit felis est. Quisque felis ipsum, placerat nec ullamcorper non, tempus sit amet turpis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent eu tempus mauris. Pellentesque tempus et justo at egestas. Praesent sit amet ornare magna. Nulla commodo urna et tincidunt ultricies. Praesent rhoncus commodo eros. Maecenas blandit facilisis ullamcorper. Suspendisse potenti. Nam sit amet massa orci. Mauris tincidunt scelerisque leo, eget vulputate odio tempus sed. Nulla ligula ex, tristique eget pellentesque nec, placerat vitae libero. Etiam eleifend purus massa, non facilisis metus laoreet ut.\r\n\r\nSed turpis orci, porttitor at diam vel, pellentesque ultricies mauris. Aenean mi purus, finibus in sollicitudin ut, gravida eu elit. Nam elementum leo felis, id consequat neque vehicula ut. Maecenas rutrum vel enim sed scelerisque. Aenean ipsum libero, varius vitae mauris et, feugiat venenatis sapien. Morbi viverra sapien diam, quis accumsan tortor luctus non. Morbi rutrum ac tellus ac luctus.\r\n\r\nDonec eu porta lorem. Quisque eget sapien nec ante commodo placerat in ac nulla. Donec posuere eu nisi in condimentum. Morbi pharetra nibh vitae felis congue pulvinar ac quis quam. Aliquam velit orci, pharetra in erat non, convallis efficitur enim. Aliquam erat volutpat. Etiam interdum tortor sed sollicitudin pretium. Etiam blandit finibus ex, sit amet pharetra ipsum sagittis at. Pellentesque porta at lorem a volutpat. Praesent vel lobortis sapien. Sed sit amet tempus neque. Ut blandit tempus tellus quis convallis. Vivamus fringilla imperdiet enim et congue. Fusce lectus quam, tincidunt eu interdum ut, pulvinar eget mauris.', 0),
(3, 3, 'Le commencement', '2017-06-11 23:00:08', '<p>Duis commodo nulla ligula, at molestie sem vestibulum et. Pellentesque vitae neque arcu. Curabitur nec enim et sem malesuada commodo. Vivamus at elit mattis, imperdiet lacus facilisis, porta leo. Vestibulum eget ligula imperdiet massa tincidunt condimentum. Nunc nec orci lacus. Donec hendrerit lectus sem, ac vestibulum lectus convallis sed. Morbi id sem in odio maximus convallis. Nullam volutpat lacus non dui suscipit molestie. Nullam et feugiat nulla, sit amet elementum ante.</p>\r\n<p><strong>Cras bibendum lectus nec varius gravida. Duis a justo mollis, dignissim turpis eget, dapibus lorem. Ut vel ante sed turpis consectetur hendrerit vitae et orci. Donec tempor, augue ut blandit ultrices, diam risus facilisis erat, id feugiat diam massa quis ex. Integer eu sagittis justo. Sed purus dui, euismod sit amet purus et, lacinia interdum erat. Maecenas porta at augue vitae tempus. Pellentesque vestibulum facilisis augue in ullamcorper. Phasellus ac lacus fermentum, iaculis purus non, tristique mi.</strong></p>\r\n<p>Vestibulum turpis est, dignissim eget ullamcorper nec, venenatis vel quam. Donec id rhoncus elit. Nullam arcu lacus, molestie quis pulvinar at, lacinia id ipsum. Duis in ligula nec enim fermentum finibus. Nam pulvinar nec nisi sit amet dictum. Duis erat libero, viverra ut malesuada non, maximus sed ante. Duis non rutrum velit, vel feugiat nisi. Fusce molestie lorem massa, non laoreet mauris ullamcorper ultricies. Pellentesque finibus congue erat a eleifend. Pellentesque consequat convallis purus nec pellentesque. Donec consequat feugiat sodales. Donec id cursus tellus.</p>', 0);

-- --------------------------------------------------------

--
-- Structure de la table `t_commentaire`
--

CREATE TABLE `t_commentaire` (
  `com_id` int(11) NOT NULL,
  `com_auteur` varchar(100) NOT NULL,
  `com_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `com_contenu` varchar(200) NOT NULL,
  `com_signalement` int(11) NOT NULL,
  `chap_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `com_enfant` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_commentaire`
--


INSERT INTO `t_commentaire` (`com_id`, `com_auteur`, `com_date`, `com_contenu`, `com_signalement`, `chap_id`, `parent_id`, `com_enfant`) VALUES
(1, 'myrtille', '2017-06-26 11:57:42', 'Commentaire ', 0, 1, NULL, 0),
(2, 'Framboise', '2017-06-26 11:57:42', 'Réponse commentaire ', 0, 1, 1, 0);


-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateur`
--

CREATE TABLE `t_utilisateur` (
  `util_id` int(11) NOT NULL,
  `util_login` varchar(100) NOT NULL,
  `util_mdp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_utilisateur`
--

INSERT INTO `t_utilisateur` (`util_id`, `util_login`, `util_mdp`) VALUES
(1, 'jeanForteroche', '$2y$10$fRJBDwwGA/5bMmqWoJfID.wvIgYFqSZaaHp4lYSX7gmIexz75gczu'),
(2, 'test', '$2y$10$XaxA.VCZkTvQr1PFXGaDT.BlGC.MSs0WWtWwyLQclWB0IB.nGJ0rq');
--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_chapitre`
--
ALTER TABLE `t_chapitre`
  ADD PRIMARY KEY (`chap_id`);

--
-- Index pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `PARENT_ID` (`parent_id`),
  ADD KEY `CHAP_ID` (`chap_id`);

--
-- Index pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  ADD PRIMARY KEY (`util_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_chapitre`
--
ALTER TABLE `t_chapitre`
  MODIFY `chap_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  MODIFY `util_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  ADD CONSTRAINT `t_commentaire_ibfk_1` FOREIGN KEY (`PARENT_ID`) REFERENCES `t_commentaire` (`COM_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_commentaire_ibfk_2` FOREIGN KEY (`CHAP_ID`) REFERENCES `t_chapitre` (`CHAP_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
