-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 15 avr. 2020 à 10:28
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
(35, 'test', 'test', 'test@test.com', '$2y$10$c1DFe1yq4QigEfYhpfvpfecMU1YyWiVdHpqF4V2gkt2rCU0/fOih2', 0),
(37, 'admin', 'admin', 'admin@admin.com', '$2y$10$Jkb2Z0QkF.SmUbuktEFnuexKmPMXwtOwc5jS7AINHaJn9xotbnuYm', 1),
(38, 'user1', 'user1', 'user1@user1.com', '$2y$10$Vo6su6Cfm3ORtcjmV4KE3./rpZboUdn4mrHp2LpLDMrEE61zd5Bem', 0);

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
  MODIFY `perso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
