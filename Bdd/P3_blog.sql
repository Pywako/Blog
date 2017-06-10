-- phpMyAdmin SQL Dump
-- version 4.7.0
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

--
-- Structure de la table `t_chapitre`
--

CREATE TABLE `t_chapitre` (
  `CHAP_ID` int(11) NOT NULL,
  `CHAP_numero` float NOT NULL,
  `CHAP_titre` varchar(100) NOT NULL,
  `CHAP_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CHAP_contenu` varchar(10000) NOT NULL,
  `CHAP_nbcom` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_chapitre`
--

INSERT INTO `t_chapitre` (`CHAP_ID`, `CHAP_numero`, `CHAP_titre`, `CHAP_date`, `CHAP_contenu`, `CHAP_nbcom`) VALUES
(1, 0, 'Préface', '2017-05-29 10:23:32', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean blandit felis est. Quisque felis ipsum, placerat nec ullamcorper non, tempus sit amet turpis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent eu tempus mauris. Pellentesque tempus et justo at egestas. Praesent sit amet ornare magna. Nulla commodo urna et tincidunt ultricies. Praesent rhoncus commodo eros. Maecenas blandit facilisis ullamcorper. Suspendisse potenti. Nam sit amet massa orci. Mauris tincidunt scelerisque leo, eget vulputate odio tempus sed. Nulla ligula ex, tristique eget pellentesque nec, placerat vitae libero. Etiam eleifend purus massa, non facilisis metus laoreet ut.\r\n\r\nSed turpis orci, porttitor at diam vel, pellentesque ultricies mauris. Aenean mi purus, finibus in sollicitudin ut, gravida eu elit. Nam elementum leo felis, id consequat neque vehicula ut. Maecenas rutrum vel enim sed scelerisque. Aenean ipsum libero, varius vitae mauris et, feugiat venenatis sapien. Morbi viverra sapien diam, quis accumsan tortor luctus non. Morbi rutrum ac tellus ac luctus.\r\n\r\nDonec eu porta lorem. Quisque eget sapien nec ante commodo placerat in ac nulla. Donec posuere eu nisi in condimentum. Morbi pharetra nibh vitae felis congue pulvinar ac quis quam. Aliquam velit orci, pharetra in erat non, convallis efficitur enim. Aliquam erat volutpat. Etiam interdum tortor sed sollicitudin pretium. Etiam blandit finibus ex, sit amet pharetra ipsum sagittis at. Pellentesque porta at lorem a volutpat. Praesent vel lobortis sapien. Sed sit amet tempus neque. Ut blandit tempus tellus quis convallis. Vivamus fringilla imperdiet enim et congue. Fusce lectus quam, tincidunt eu interdum ut, pulvinar eget mauris.', 0),
(2, 1, 'Un début mouvementé ', '2017-05-29 10:24:13', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean blandit felis est. Quisque felis ipsum, placerat nec ullamcorper non, tempus sit amet turpis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent eu tempus mauris. Pellentesque tempus et justo at egestas. Praesent sit amet ornare magna. Nulla commodo urna et tincidunt ultricies. Praesent rhoncus commodo eros. Maecenas blandit facilisis ullamcorper. Suspendisse potenti. Nam sit amet massa orci. Mauris tincidunt scelerisque leo, eget vulputate odio tempus sed. Nulla ligula ex, tristique eget pellentesque nec, placerat vitae libero. Etiam eleifend purus massa, non facilisis metus laoreet ut.\r\n\r\nSed turpis orci, porttitor at diam vel, pellentesque ultricies mauris. Aenean mi purus, finibus in sollicitudin ut, gravida eu elit. Nam elementum leo felis, id consequat neque vehicula ut. Maecenas rutrum vel enim sed scelerisque. Aenean ipsum libero, varius vitae mauris et, feugiat venenatis sapien. Morbi viverra sapien diam, quis accumsan tortor luctus non. Morbi rutrum ac tellus ac luctus.\r\n\r\nDonec eu porta lorem. Quisque eget sapien nec ante commodo placerat in ac nulla. Donec posuere eu nisi in condimentum. Morbi pharetra nibh vitae felis congue pulvinar ac quis quam. Aliquam velit orci, pharetra in erat non, convallis efficitur enim. Aliquam erat volutpat. Etiam interdum tortor sed sollicitudin pretium. Etiam blandit finibus ex, sit amet pharetra ipsum sagittis at. Pellentesque porta at lorem a volutpat. Praesent vel lobortis sapien. Sed sit amet tempus neque. Ut blandit tempus tellus quis convallis. Vivamus fringilla imperdiet enim et congue. Fusce lectus quam, tincidunt eu interdum ut, pulvinar eget mauris.\r\n\r\nAenean non mi nec mi ornare fermentum et laoreet massa. Suspendisse ac orci dictum, consequat arcu eget, accumsan lacus. Cras blandit arcu in ipsum blandit tincidunt. Suspendisse porta vulputate mauris tincidunt vehicula. Mauris hendrerit, erat eu molestie tincidunt, urna orci accumsan urna, eget pretium tortor leo vitae orci. Sed accumsan eros rhoncus nisl consequat, eget tincidunt lorem auctor. Pellentesque cursus ultrices blandit. Quisque lacinia massa felis, vitae faucibus nibh bibendum vitae. Sed hendrerit semper est, at hendrerit neque pulvinar eu.\r\n\r\nSuspendisse eleifend nibh a ante sollicitudin, id gravida leo pulvinar. Sed vestibulum, tellus in blandit commodo, nibh arcu dignissim velit, quis fermentum arcu elit at nibh. Ut mollis imperdiet rhoncus. Sed gravida ut tortor quis scelerisque. Maecenas dignissim tellus non dictum luctus. Nam eget tortor ut neque mattis aliquet gravida et mi. Morbi sodales auctor arcu varius ultricies. Fusce varius sem magna. Quisque ultricies velit massa, nec sodales metus vulputate eu. Morbi eget mauris metus. Aliquam vel dui ut turpis pellentesque aliquam eget sed nibh.', 0),

-- --------------------------------------------------------

--
-- Structure de la table `t_commentaire`
--

CREATE TABLE `t_commentaire` (
  `COM_ID` int(11) NOT NULL,
  `COM_AUTEUR` varchar(100) NOT NULL,
  `COM_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `COM_CONTENU` varchar(200) NOT NULL,
  `COM_SIGNALEMENT` int(11) NOT NULL,
  `CHAP_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateur`
--

CREATE TABLE `t_utilisateur` (
  `UTIL_ID` int(11) NOT NULL,
  `UTIL_login` varchar(100) NOT NULL,
  `UTIL_mdp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_utilisateur`
--

INSERT INTO `t_utilisateur` (`UTIL_ID`, `UTIL_login`, `UTIL_mdp`) VALUES
(1, 'jeanForteroche', '$2y$10$fRJBDwwGA/5bMmqWoJfID.wvIgYFqSZaaHp4lYSX7gmIexz75gczu'),
(2, 'test', '$2y$10$XaxA.VCZkTvQr1PFXGaDT.BlGC.MSs0WWtWwyLQclWB0IB.nGJ0rq');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_chapitre`
--
ALTER TABLE `t_chapitre`
  ADD PRIMARY KEY (`CHAP_ID`);

--
-- Index pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  ADD PRIMARY KEY (`COM_ID`),
  ADD KEY `fk_com_chap` (`CHAP_ID`);

--
-- Index pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  ADD PRIMARY KEY (`UTIL_ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_chapitre`
--
ALTER TABLE `t_chapitre`
  MODIFY `CHAP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  MODIFY `COM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  MODIFY `UTIL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  ADD CONSTRAINT `fk_com_chap` FOREIGN KEY (`CHAP_ID`) REFERENCES `t_chapitre` (`CHAP_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
