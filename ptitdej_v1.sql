-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 16 Octobre 2017 à 14:57
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ptitdej_v1`
--

-- --------------------------------------------------------

--
-- Structure de la table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `login` varchar(32) NOT NULL,
  `mdp` varchar(120) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tb_admin`
--

INSERT INTO `tb_admin` (`login`, `mdp`, `nom`, `prenom`) VALUES
('ALLAIN', '52f7da97859dd0bccc12aee30532e664', 'ALLAIN', 'Nicolas');

-- --------------------------------------------------------

--
-- Structure de la table `tb_aliment`
--

CREATE TABLE `tb_aliment` (
  `idAliment` int(1) NOT NULL,
  `libelleAliment` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tb_aliment`
--

INSERT INTO `tb_aliment` (`idAliment`, `libelleAliment`) VALUES
(1, 'Café'),
(2, 'Sucre'),
(3, 'Miel'),
(4, 'Lait'),
(5, 'Chocolat'),
(6, 'Biscuits');

-- --------------------------------------------------------

--
-- Structure de la table `tb_bonus`
--

CREATE TABLE `tb_bonus` (
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `coefficient` int(11) NOT NULL,
  `idAlimentBonus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tb_bonus`
--

INSERT INTO `tb_bonus` (`dateDebut`, `dateFin`, `coefficient`, `idAlimentBonus`) VALUES
('2017-10-16', '2017-11-16', 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `tb_classe`
--

CREATE TABLE `tb_classe` (
  `idClasse` int(11) NOT NULL,
  `libelleClasse` varchar(20) NOT NULL,
  `idClasseNiveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tb_classe`
--

INSERT INTO `tb_classe` (`idClasse`, `libelleClasse`, `idClasseNiveau`) VALUES
(1, '6ème GUTENBERG', 7),
(2, '6ème ARGOS', 7),
(4, '6ème DEMETER', 7),
(5, '6ème ARCHIMEDE', 7),
(6, '5ème GALAAD', 6),
(7, '5ème PERCEVAL', 6),
(8, '5ème LANCELOT', 6),
(9, '5ème MERLIN', 6),
(10, '4ème ORSAY', 5),
(11, '4ème LOUVRE', 5),
(12, '4ème VERSAILLES', 5),
(13, '4ème GIVERNY', 5),
(14, '3ème NEW-YORK', 4),
(15, '3ème ROME', 4),
(16, '3ème SYDNEY', 4),
(17, '3ème VENISE', 4),
(18, 'GS/CP', 1),
(19, 'CE1', 1),
(20, 'CE2', 1),
(21, 'CM1', 1),
(22, 'CM2', 1),
(23, 'Accueil', 3);

-- --------------------------------------------------------

--
-- Structure de la table `tb_donner`
--

CREATE TABLE `tb_donner` (
  `dateDon` date NOT NULL,
  `qteDon` int(11) NOT NULL,
  `pointDon` int(11) NOT NULL,
  `idDonnerAliment` int(11) NOT NULL,
  `idDonnerClasse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tb_donner`
--

INSERT INTO `tb_donner` (`dateDon`, `qteDon`, `pointDon`, `idDonnerAliment`, `idDonnerClasse`) VALUES
('2019-07-20', 300, 154, 1, 1),
('2017-10-13', 255, 255, 2, 2),
('2017-10-07', 150, 150, 2, 14),
('2017-10-10', 300, 150, 2, 14),
('2017-09-11', 14, 14, 5, 23);

-- --------------------------------------------------------

--
-- Structure de la table `tb_niveau`
--

CREATE TABLE `tb_niveau` (
  `idNiveau` int(11) NOT NULL,
  `libelleNiveau` varchar(20) NOT NULL,
  `idNiveauSecteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tb_niveau`
--

INSERT INTO `tb_niveau` (`idNiveau`, `libelleNiveau`, `idNiveauSecteur`) VALUES
(1, 'Primaire', 1),
(2, 'Lycée', 3),
(3, 'Accueil', 4),
(4, '3ème', 2),
(5, '4ème', 2),
(6, '5ème', 2),
(7, '6ème', 2);

-- --------------------------------------------------------

--
-- Structure de la table `tb_secteur`
--

CREATE TABLE `tb_secteur` (
  `idSecteur` int(11) NOT NULL,
  `libelleSecteur` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tb_secteur`
--

INSERT INTO `tb_secteur` (`idSecteur`, `libelleSecteur`) VALUES
(1, 'Primaire'),
(2, 'Collège'),
(3, 'Lycée'),
(4, 'Accueil');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`login`);

--
-- Index pour la table `tb_aliment`
--
ALTER TABLE `tb_aliment`
  ADD PRIMARY KEY (`idAliment`);

--
-- Index pour la table `tb_bonus`
--
ALTER TABLE `tb_bonus`
  ADD PRIMARY KEY (`dateDebut`,`idAlimentBonus`),
  ADD KEY `idAlimentBonus` (`idAlimentBonus`),
  ADD KEY `idAlimentBonus_2` (`idAlimentBonus`);

--
-- Index pour la table `tb_classe`
--
ALTER TABLE `tb_classe`
  ADD PRIMARY KEY (`idClasse`),
  ADD KEY `idNiveauClasse` (`idClasseNiveau`);

--
-- Index pour la table `tb_donner`
--
ALTER TABLE `tb_donner`
  ADD PRIMARY KEY (`idDonnerClasse`,`idDonnerAliment`,`dateDon`),
  ADD KEY `idDonnerAliment` (`idDonnerAliment`),
  ADD KEY `idClasseDonner` (`idDonnerClasse`);

--
-- Index pour la table `tb_niveau`
--
ALTER TABLE `tb_niveau`
  ADD PRIMARY KEY (`idNiveau`),
  ADD KEY `idSecteurNiveau` (`idNiveauSecteur`);

--
-- Index pour la table `tb_secteur`
--
ALTER TABLE `tb_secteur`
  ADD PRIMARY KEY (`idSecteur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `tb_classe`
--
ALTER TABLE `tb_classe`
  MODIFY `idClasse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `tb_bonus`
--
ALTER TABLE `tb_bonus`
  ADD CONSTRAINT `fk_alimentBonus` FOREIGN KEY (`idAlimentBonus`) REFERENCES `tb_aliment` (`idAliment`);

--
-- Contraintes pour la table `tb_classe`
--
ALTER TABLE `tb_classe`
  ADD CONSTRAINT `fk_niveau` FOREIGN KEY (`idClasseNiveau`) REFERENCES `tb_niveau` (`idNiveau`);

--
-- Contraintes pour la table `tb_donner`
--
ALTER TABLE `tb_donner`
  ADD CONSTRAINT `fk_aliment` FOREIGN KEY (`idDonnerAliment`) REFERENCES `tb_aliment` (`idAliment`),
  ADD CONSTRAINT `fk_classe` FOREIGN KEY (`idDonnerClasse`) REFERENCES `tb_classe` (`idClasse`);

--
-- Contraintes pour la table `tb_niveau`
--
ALTER TABLE `tb_niveau`
  ADD CONSTRAINT `fk_secteur` FOREIGN KEY (`idNiveauSecteur`) REFERENCES `tb_secteur` (`idSecteur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
