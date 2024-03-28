-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 28 mars 2024 à 15:26
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
-- Base de données : `DMX`
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
(1, 1, 143),
(2, 1, 123),
(3, 1, 200),
(4, 2, 200),
(5, 2, 241),
(6, 2, 201),
(7, 2, 100),
(8, 2, 40),
(9, 2, 255),
(10, 2, 31),
(11, 2, 155),
(12, 3, 255),
(13, 3, 0),
(14, 3, 100),
(15, 3, 110),
(16, 3, 200),
(17, 3, 0),
(18, 3, 0),
(19, 3, 100);

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
(1, 1, 1, 'rouge'),
(2, 1, 2, 'vert'),
(3, 1, 3, 'bleu'),
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
(24, 10, 24, 'intensite'),
(25, 10, 25, 'rouge'),
(26, 10, 26, 'vert'),
(27, 10, 27, 'bleu'),
(28, 10, 28, 'blanc'),
(29, 10, 29, 'strobo'),
(30, 10, 30, 'mode'),
(31, 10, 31, 'effets'),
(33, 11, 32, 'shutter'),
(34, 11, 33, 'gobo'),
(35, 11, 34, 'rota gobo'),
(36, 11, 35, 'couleur'),
(37, 11, 36, 'pan'),
(38, 11, 37, 'tilt');

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
(1, 'lampe', 1, 3),
(6, 'saber1', 4, 4),
(7, 'saber2', 8, 4),
(8, 'saber3', 12, 4),
(9, 'ghost1', 16, 8),
(10, 'ghost2', 24, 8),
(11, 'TWIST 152', 32, 6);

-- --------------------------------------------------------

--
-- Structure de la table `lightBoard`
--

CREATE TABLE `lightBoard` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `idScene` int(11) NOT NULL,
  `onOff` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `lightBoard`
--

INSERT INTO `lightBoard` (`id`, `idUser`, `x`, `y`, `idScene`, `onOff`) VALUES
(1, 12, 8, 11, 3, 0),
(2, 4, 41, 82, 4, 0),
(3, 12, 8, 7, 5, 0),
(4, 14, 9, 32, 1, 0),
(5, 5, 4, 1, 2, 0),
(6, 7, 7, 68, 3, 0),
(7, 12, 5, 8, 3, 0),
(8, 3, 6, 9, 4, 0),
(9, 3, 9, 6, 3, 0),
(10, 4, 8, 7, 1, 1);

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
(1, 'studio'),
(2, 'laSceneBleue'),
(3, 'laSceneRouge'),
(4, 'laSceneVerte'),
(5, 'laSceneMusicale'),
(6, 'SceneConcentre'),
(7, 'SceneFolie'),
(8, 'SceneDisco'),
(9, 'SceneFin'),
(10, 'SceneFamille');

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
  `isAdmin` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `password`, `isAdmin`) VALUES
(1, 'lopes', 'damien', 'damienlopes@gmail.com', 'dadadu', 1),
(2, 'Leduc', 'Jean', 'jeanleduc@gmail.com', 'v4rna', 1),
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
  ADD PRIMARY KEY (`numCanal`),
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
  ADD KEY `idcanaux` (`idEquip`);

--
-- Index pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lightBoard`
--
ALTER TABLE `lightBoard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`,`idScene`),
  ADD KEY `idScene` (`idScene`);

--
-- Index pour la table `scene`
--
ALTER TABLE `scene`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `lightBoard`
--
ALTER TABLE `lightBoard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `scene`
--
ALTER TABLE `scene`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39499;

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
