-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 13 avr. 2020 à 10:02
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pizza`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `art_id` int(11) NOT NULL,
  `art_nom` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `art_prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`art_id`, `art_nom`, `art_prix`) VALUES
(1, 'Original Pepperoni', 10),
(2, 'Reine', 10);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `cmd_id` int(11) NOT NULL,
  `cmd_date` date NOT NULL,
  `cmd_valide` int(11) NOT NULL,
  `perso_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `perso_id` int(11) NOT NULL,
  `perso_nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `perso_prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `perso_mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `perso_psw` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`perso_id`, `perso_nom`, `perso_prenom`, `perso_mail`, `perso_psw`, `role`) VALUES
(5, 'GELLAERTS', 'Emilien', 'gellaerts.e@gmail.com', '$2y$10$362o5XBJT6LYsH0lu6uaceTNoaJV3SZCsHkyIA30pbidmmbXJ0vly', 0),
(6, 'toto', 'titi', 'toto@toto.fr', '$2y$10$K6hrceTpMzQTne9j5hQRKOKNLWNv0Zt/wHrmgpZTvX.HNT9xdOnbm', 0),
(7, 'Jean', 'naymar', 'test@test.fr', '$2y$10$FheJGBtJCsfQdQM4jENF3.P5s6nHgLSpJoI8bz8zCzhJ8Y0A6rxlC', 0),
(28, 'titi', 'titi', 'titi@titi.fr', '$2y$10$fxUotcEpLxtRT4s.D1WE5exeirSV2B13huPByFHz0pP5pQbdCk9va', 0),
(31, 'dkfjo', 'kfjod', 'test2@test.fr', '$2y$10$UUSNG7VjGPjdNRxdmRoAtuDKo9zfc9Zr4LKl/8qoAD8Fo4OpWES1a', 0),
(32, 'test', 'test', 'test@test', '$2y$10$PMK3Cv3FqcHBhyLcMBYUBO69Su.HoAxKACYjkCr/ny/qPEjWJtR3u', 0),
(33, 'A', 'AA', 'AA1@AA.fr', '$2y$10$6lG1IwLSZ1v/9kfjkeE1z.MjHbFOTqB0ft6WgyFJol0q1qlNkt5Zi', 0),
(34, 'test', 'test', 'test@gmail.com', '$2y$10$u..xG0no69No5TmNGD0V2OQcel7pTRs9QlbcWCJQ3/yDNp94lHYsW', 0),
(35, 'test', 'test', 'test@test.com', '$2y$10$c1DFe1yq4QigEfYhpfvpfecMU1YyWiVdHpqF4V2gkt2rCU0/fOih2', 0),
(36, 'Admin', 'admin', 'admin@admin.fr', '$2y$10$Kkjt7ZeU343byoEwKSkW0uIR3zbsj7S4anBjqQema34r6AyiwIJw2', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`cmd_id`),
  ADD KEY `perso_id` (`perso_id`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`perso_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `cmd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `perso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_commande_perso_id` FOREIGN KEY (`perso_id`) REFERENCES `personne` (`perso_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
