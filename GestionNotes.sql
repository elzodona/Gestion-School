-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 07 juin 2023 à 18:46
-- Version du serveur : 8.0.33-0ubuntu0.22.04.2
-- Version de PHP : 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `GestionNotes`
--

-- --------------------------------------------------------

--
-- Structure de la table `Admin`
--

CREATE TABLE `Admin` (
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Admin`
--

INSERT INTO `Admin` (`username`, `password`) VALUES
('elzo', 'domerame');

-- --------------------------------------------------------

--
-- Structure de la table `Annees_Scolaires`
--

CREATE TABLE `Annees_Scolaires` (
  `id_annee_scolaire` int NOT NULL,
  `annee_scolaire` varchar(9) DEFAULT NULL,
  `actif` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'non'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Annees_Scolaires`
--

INSERT INTO `Annees_Scolaires` (`id_annee_scolaire`, `annee_scolaire`, `actif`) VALUES
(3, '2011-2012', 'non'),
(4, '2012-2013', 'non'),
(5, '2013-2014', 'non'),
(6, '2014-2015', 'non'),
(7, '2021-2022', 'non'),
(8, '2022-2023', 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `Archives_Annees`
--

CREATE TABLE `Archives_Annees` (
  `id` int NOT NULL,
  `annee` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Archives_Classes`
--

CREATE TABLE `Archives_Classes` (
  `id` int NOT NULL,
  `classe` varchar(10) NOT NULL,
  `niveau` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Archives_Eleves`
--

CREATE TABLE `Archives_Eleves` (
  `id` int NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `nom` varchar(10) NOT NULL,
  `numero` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Archives_Inscriptions`
--

CREATE TABLE `Archives_Inscriptions` (
  `id_insc` int NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `nom` varchar(15) NOT NULL,
  `type` varchar(10) NOT NULL,
  `classe` varchar(10) NOT NULL,
  `annee` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Archives_NIveaux`
--

CREATE TABLE `Archives_NIveaux` (
  `id` int NOT NULL,
  `nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Classes`
--

CREATE TABLE `Classes` (
  `id_classe` int NOT NULL,
  `nom_classe` varchar(50) NOT NULL,
  `niveau` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Classes`
--

INSERT INTO `Classes` (`id_classe`, `nom_classe`, `niveau`) VALUES
(1, 'CIA', 1),
(2, 'CP', 1),
(4, '6eA', 2),
(5, '5e', 2),
(7, '2ndS', 3),
(8, '2ndL', 3),
(10, 'CE1', 1),
(11, '4e', 2),
(12, '2ndSTEG', 3),
(13, 'CE2', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Discipline`
--

CREATE TABLE `Discipline` (
  `id` int NOT NULL,
  `nom` varchar(20) NOT NULL,
  `code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_groupe` int NOT NULL,
  `classe` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Discipline`
--

INSERT INTO `Discipline` (`id`, `nom`, `code`, `id_groupe`, `classe`) VALUES
(20, 'Grammaire', '(GRA)', 3, '2ndS'),
(31, 'Logique', '(LOG)', 1, '2ndS'),
(35, 'Dessin', '(DES)', 28, '2ndS'),
(39, 'Analyse', '(ANA)', 1, '2ndS'),
(41, 'Geometrie', '(GEO)', 1, '2ndS'),
(42, 'Vocabulaire', '(VOC)', 3, '2ndS'),
(44, 'Numerique', '(NUM)', 1, '2ndS');

-- --------------------------------------------------------

--
-- Structure de la table `Eleves`
--

CREATE TABLE `Eleves` (
  `id` int NOT NULL,
  `prenom` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom` varchar(20) NOT NULL,
  `date_born` varchar(20) NOT NULL,
  `lieu_born` varchar(30) NOT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `sexe` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `niveau` varchar(30) NOT NULL,
  `classe` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Eleves`
--

INSERT INTO `Eleves` (`id`, `prenom`, `nom`, `date_born`, `lieu_born`, `numero`, `sexe`, `niveau`, `classe`) VALUES
(1, 'Moussa', 'Sagna', '2023-05-26', 'Dakar', '1', 'masculin', '1', 'CI'),
(2, 'Elzo', 'Ndao', '2023-05-18', 'Thiès', '2', 'masculin', '1', 'CP'),
(13, 'Madiakho', 'Tambadou', '2023-05-26', 'Louga', '210', 'masculin', '2', '4e'),
(15, 'Seynabou', 'Diallo', '2023-05-26', 'Gambie', '212', 'feminin', '2', '5e'),
(18, 'Mouha', 'Diao', '2023-05-03', 'Mali', '215', 'masculin', '3', '2ndS'),
(22, 'Park', 'Solomon', '2023-05-29', 'Grand Yoff', '1001', 'masculin', '3', '2ndL'),
(27, 'Cheikh', 'Ndao', '2023-06-22', 'Dakar', '321', 'masculin', '2', '5');

-- --------------------------------------------------------

--
-- Structure de la table `Groupe_Disciplines`
--

CREATE TABLE `Groupe_Disciplines` (
  `id` int NOT NULL,
  `libelle` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `classe` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Groupe_Disciplines`
--

INSERT INTO `Groupe_Disciplines` (`id`, `libelle`, `classe`) VALUES
(1, 'Mathematiques', '2ndS'),
(3, 'Français', '2ndS'),
(22, 'Autres', '2ndS'),
(24, 'Langues', '2ndL'),
(26, 'Français', 'CP'),
(34, 'Art', '2ndS');

-- --------------------------------------------------------

--
-- Structure de la table `Inscription`
--

CREATE TABLE `Inscription` (
  `nom_eleve` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenom_eleve` varchar(30) NOT NULL,
  `type_eleve` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'externe',
  `classe` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `annee` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '2022-2023'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Niveaux`
--

CREATE TABLE `Niveaux` (
  `id_niveau` int NOT NULL,
  `nom_niveau` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Niveaux`
--

INSERT INTO `Niveaux` (`id_niveau`, `nom_niveau`) VALUES
(1, 'Elementaires'),
(2, 'Moyen'),
(3, 'Secondaire');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Annees_Scolaires`
--
ALTER TABLE `Annees_Scolaires`
  ADD PRIMARY KEY (`id_annee_scolaire`);

--
-- Index pour la table `Archives_Annees`
--
ALTER TABLE `Archives_Annees`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Archives_Classes`
--
ALTER TABLE `Archives_Classes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Archives_Eleves`
--
ALTER TABLE `Archives_Eleves`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Classes`
--
ALTER TABLE `Classes`
  ADD PRIMARY KEY (`id_classe`),
  ADD KEY `niveau` (`niveau`);

--
-- Index pour la table `Discipline`
--
ALTER TABLE `Discipline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_groupe` (`id_groupe`);

--
-- Index pour la table `Eleves`
--
ALTER TABLE `Eleves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `niveau` (`niveau`);

--
-- Index pour la table `Groupe_Disciplines`
--
ALTER TABLE `Groupe_Disciplines`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Inscription`
--
ALTER TABLE `Inscription`
  ADD KEY `id_annee` (`annee`),
  ADD KEY `id_classe` (`classe`),
  ADD KEY `id_eleve` (`nom_eleve`);

--
-- Index pour la table `Niveaux`
--
ALTER TABLE `Niveaux`
  ADD PRIMARY KEY (`id_niveau`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Annees_Scolaires`
--
ALTER TABLE `Annees_Scolaires`
  MODIFY `id_annee_scolaire` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `Archives_Annees`
--
ALTER TABLE `Archives_Annees`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Archives_Classes`
--
ALTER TABLE `Archives_Classes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Archives_Eleves`
--
ALTER TABLE `Archives_Eleves`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Classes`
--
ALTER TABLE `Classes`
  MODIFY `id_classe` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `Discipline`
--
ALTER TABLE `Discipline`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `Eleves`
--
ALTER TABLE `Eleves`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `Groupe_Disciplines`
--
ALTER TABLE `Groupe_Disciplines`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `Niveaux`
--
ALTER TABLE `Niveaux`
  MODIFY `id_niveau` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Classes`
--
ALTER TABLE `Classes`
  ADD CONSTRAINT `Classes_ibfk_1` FOREIGN KEY (`niveau`) REFERENCES `Niveaux` (`id_niveau`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
