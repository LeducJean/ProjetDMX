-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 23 mai 2024 à 14:53
-- Version du serveur : 10.5.21-MariaDB-0+deb11u1
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `testCodeDMX`
--

-- --------------------------------------------------------

--
-- Structure de la table `canaux`
--

CREATE TABLE `canaux` (
  `numCanal` int(11) NOT NULL,
  `idScene` int(11) NOT NULL,
  `valeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `canaux`
--

INSERT INTO `canaux` (`numCanal`, `idScene`, `valeur`) VALUES
(7, 6, 78),
(8, 6, 45),
(9, 6, 12),
(10, 6, 65),
(4, 6, 45),
(5, 6, 78),
(6, 6, 12),
(7, 6, 36),
(32, 2, 255),
(4, 4, 45),
(5, 4, 12),
(6, 4, 56),
(7, 4, 12),
(32, 4, 45),
(33, 4, 89),
(34, 4, 56),
(35, 4, 23),
(36, 4, 12),
(37, 4, 10),
(4, 6, 40),
(5, 6, 12),
(6, 6, 45),
(7, 6, 45),
(32, 6, 0),
(33, 6, 54),
(34, 6, 54),
(35, 6, 45),
(36, 6, 42),
(37, 6, 12),
(8, 4, 45),
(9, 4, 12),
(10, 4, 56),
(11, 4, 2),
(4, 42, 12),
(5, 42, 78),
(6, 42, 56),
(7, 42, 1),
(4, 43, 40),
(5, 43, 12),
(6, 43, 45),
(7, 43, 78),
(8, 43, 40),
(9, 43, 78),
(10, 43, 45),
(11, 43, 3),
(12, 43, 60),
(13, 43, 0),
(14, 43, 0),
(15, 43, 0),
(120, 43, 10),
(121, 43, 2),
(4, 44, 255),
(5, 44, 0),
(6, 44, 0),
(7, 44, 0),
(4, 45, 0),
(5, 45, 0),
(6, 45, 255),
(7, 45, 0),
(4, 46, 255),
(5, 46, 0),
(6, 46, 0),
(7, 46, 0),
(8, 46, 0),
(9, 46, 255),
(10, 46, 0),
(11, 46, 0),
(12, 46, 0),
(13, 46, 0),
(14, 46, 255),
(15, 46, 0),
(4, 5, 255),
(5, 5, 0),
(6, 5, 0),
(7, 5, 0),
(8, 5, 0),
(9, 5, 255),
(10, 5, 0),
(11, 5, 0),
(12, 5, 0),
(13, 5, 0),
(14, 5, 255),
(15, 5, 0),
(201, 86, 255),
(202, 86, 0),
(210, 86, 24),
(211, 86, 0),
(215, 90, 24),
(216, 90, 2),
(16, 91, 255),
(17, 91, 255),
(18, 91, 255),
(19, 91, 0),
(20, 91, 0),
(21, 91, 0),
(22, 91, 0),
(23, 91, 0),
(4, 91, 0),
(5, 91, 255),
(6, 91, 0),
(7, 91, 0),
(8, 91, 0),
(9, 91, 0),
(10, 91, 255),
(11, 91, 0),
(12, 91, 0),
(13, 91, 0),
(14, 91, 0),
(15, 91, 255),
(16, 91, 12),
(17, 91, 45),
(18, 91, 12),
(19, 91, 26),
(20, 91, 12),
(21, 91, 255),
(22, 91, 0),
(23, 91, 0),
(4, 91, 255),
(5, 91, 0),
(6, 91, 0),
(7, 91, 0),
(8, 91, 0),
(9, 91, 255),
(10, 91, 0),
(11, 91, 0),
(12, 91, 0),
(13, 91, 0),
(14, 91, 255),
(15, 91, 0);

-- --------------------------------------------------------

--
-- Structure de la table `champ`
--

CREATE TABLE `champ` (
  `id` int(11) NOT NULL,
  `idEquip` int(11) NOT NULL,
  `idNumCanal` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `champ`
--

INSERT INTO `champ` (`id`, `idEquip`, `idNumCanal`, `nom`) VALUES
(4, 6, 4, 'rouge'),
(5, 6, 5, 'vert'),
(6, 6, 6, 'bleu'),
(7, 6, 7, 'blanc'),
(8, 7, 8, 'rouge'),
(9, 7, 9, 'vert'),
(10, 7, 10, 'bleu'),
(11, 7, 11, 'blanc'),
(12, 8, 12, 'rouge'),
(13, 8, 13, 'vert'),
(14, 8, 14, 'bleu'),
(15, 8, 15, 'blanc'),
(16, 9, 16, 'intensite'),
(17, 9, 17, 'rouge'),
(18, 9, 18, 'vert'),
(19, 9, 19, 'bleu'),
(20, 9, 20, 'blanc'),
(21, 9, 21, 'strobo'),
(22, 9, 22, 'mode'),
(23, 9, 23, 'effets'),
(33, 11, 32, 'shutter'),
(34, 11, 33, 'gobo'),
(35, 11, 34, 'rota gobo'),
(36, 11, 35, 'couleur'),
(37, 11, 36, 'pan'),
(38, 11, 37, 'tilt'),
(43, 13, 78, 'rouge'),
(44, 13, 79, 'vert'),
(45, 13, 80, 'bleu'),
(46, 13, 81, 'blanc'),
(73, 34, 135, 'rouge'),
(74, 34, 136, 'vert'),
(79, 36, 65, 'rouge'),
(80, 37, 100, 'rouge'),
(81, 37, 101, 'vert'),
(88, 41, 120, 'rouge'),
(89, 41, 121, 'vert'),
(90, 42, 125, 'rouge'),
(91, 42, 126, 'vert'),
(105, 140, 156, ''),
(107, 141, 185, 'vbtrb'),
(108, 141, 186, 'iumolulu'),
(109, 142, 201, 'rouge'),
(110, 142, 202, 'vert'),
(111, 143, 206, 'blanc'),
(113, 144, 210, 'violle'),
(114, 144, 211, 'zgzethz'),
(115, 145, 215, 'rouge'),
(116, 145, 216, 'vert');

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

CREATE TABLE `equipement` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `adresse` int(11) NOT NULL,
  `nbCanal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `equipement`
--

INSERT INTO `equipement` (`id`, `nom`, `adresse`, `nbCanal`) VALUES
(6, 'saber1', 4, 4),
(7, 'saber2', 8, 4),
(8, 'saber3', 12, 4),
(9, 'ghost1', 16, 8),
(11, 'TWIST 152', 32, 6),
(13, 'coucou', 78, 4),
(34, 'fauqtin', 135, 2),
(36, 'didi', 65, 1),
(37, 'okok', 100, 2),
(41, 'tomtom', 120, 2),
(42, 'tommeeee', 126, 3),
(140, 'stnhre', 155, 2),
(141, 'zrghrzhbz', 184, 2),
(142, 'faustinnnnnnn', 200, 2),
(143, 'tibowwwww', 205, 2),
(144, 'tibowwwczeveaz', 210, 2),
(145, 'jeann', 215, 2);

-- --------------------------------------------------------

--
-- Structure de la table `lightBoard`
--

CREATE TABLE `lightBoard` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `onOff` int(1) NOT NULL DEFAULT 0,
  `idScene` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `lightBoard`
--

INSERT INTO `lightBoard` (`id`, `idUser`, `x`, `y`, `onOff`, `idScene`) VALUES
(4, 14, 0, 0, 0, 1),
(436, 12, 0, 0, 1, 45),
(438, 12, 1, 0, 0, 4),
(440, 12, 0, 1, 0, 90);

-- --------------------------------------------------------

--
-- Structure de la table `scene`
--

CREATE TABLE `scene` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `scene`
--

INSERT INTO `scene` (`id`, `nom`) VALUES
(91, '2saber+ghost'),
(86, 'faustincoucou'),
(90, 'jean'),
(2, 'laSceneBleue'),
(5, 'laSceneMusicale'),
(3, 'laSceneRouge'),
(4, 'laSceneVerte'),
(45, 'saber1bleu'),
(44, 'saber1juste'),
(6, 'SceneConcentre'),
(1, 'studio'),
(42, 'testdunescene'),
(43, 'testdunescene2'),
(87, 'tibowww'),
(46, 'tomLeCon');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `isAdmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `password`, `isAdmin`) VALUES
(1, 'lopes', 'damien', 'damienlopes@gmail.com', 'dadadu', 1),
(2, 'Leduc', 'Jean', 'jeanleduc@gmail.com', 'varna', 1),
(3, 'lopes', 'damien', 'damienlopes@gmail.com', 'dadadu', 1),
(4, 'lefevre', 'tom', 'tomlefevre@gmail.com', 'toto', 1),
(5, 'Gina', 'Laurent', 'Laurentgina@gmail.com', 'orangina', 0),
(6, 'Mentation', 'Ali', 'alimentation', 'corsair', 0),
(7, 'Lerdorf', 'Rasmus', 'Rasmuslerdorf', 'creatotphp@gmail.com', 0),
(8, 'lepretre', 'alexandre', 'lepretrealexandre@gmail.com', 'lepretre', 0),
(9, 'Senepart', 'mathias', 'blancdeblanc@gmail.com', 'messi', 0),
(10, 'tiennot', 'tibo', 'tibotiennot@gmail.com', 'OMBest', 0),
(11, 'Hautemaniere', 'Edouard', 'edouardhaute@gmail.com', 'doudou', 0),
(12, 'Briaux', 'simon', 'simonbriaux@gmail.com', 'briauxS', 0),
(13, 'admin', 'admin', 'admin@gmail.com', 'admin', 1),
(14, 'bilhaut', 'theo', 'Btheo@gmail.com', 'btheo', 0),
(15, 'tabary', 'hugo', 'hugotabary@gmail.com', 'hugot', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `canaux`
--
ALTER TABLE `canaux`
  ADD KEY `idScene` (`idScene`),
  ADD KEY `numCanal` (`numCanal`);

--
-- Index pour la table `champ`
--
ALTER TABLE `champ`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numCanal` (`idNumCanal`),
  ADD UNIQUE KEY `IdnumCanal` (`idNumCanal`),
  ADD UNIQUE KEY `IdNumCanal_2` (`idNumCanal`),
  ADD UNIQUE KEY `idNumCanal_3` (`idNumCanal`),
  ADD KEY `idcanaux` (`idEquip`);

--
-- Index pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `lightBoard`
--
ALTER TABLE `lightBoard`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idUser_2` (`idUser`,`x`,`y`),
  ADD UNIQUE KEY `idUser_3` (`idUser`,`idScene`),
  ADD KEY `idUser` (`idUser`,`idScene`),
  ADD KEY `idScene` (`idScene`);

--
-- Index pour la table `scene`
--
ALTER TABLE `scene`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `champ`
--
ALTER TABLE `champ`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT pour la table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT pour la table `lightBoard`
--
ALTER TABLE `lightBoard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=441;

--
-- AUTO_INCREMENT pour la table `scene`
--
ALTER TABLE `scene`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39477;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `canaux`
--
ALTER TABLE `canaux`
  ADD CONSTRAINT `canaux_ibfk_1` FOREIGN KEY (`idScene`) REFERENCES `scene` (`id`),
  ADD CONSTRAINT `canaux_ibfk_2` FOREIGN KEY (`numCanal`) REFERENCES `champ` (`idNumCanal`);

--
-- Contraintes pour la table `champ`
--
ALTER TABLE `champ`
  ADD CONSTRAINT `Champ_ibfk_1` FOREIGN KEY (`idEquip`) REFERENCES `equipement` (`id`);

--
-- Contraintes pour la table `lightBoard`
--
ALTER TABLE `lightBoard`
  ADD CONSTRAINT `lightBoard_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `lightBoard_ibfk_2` FOREIGN KEY (`idScene`) REFERENCES `scene` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
