-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 04 avr. 2025 à 07:08
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `les_bambins`
--

-- --------------------------------------------------------

--
-- Structure de la table `accompagnateur`
--

CREATE TABLE `accompagnateur` (
  `id_accompagnateur` varchar(6) NOT NULL,
  `specialite_accompagnateur` varchar(100) DEFAULT NULL,
  `id_personnel` char(6) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

CREATE TABLE `activite` (
  `id_activite` varchar(5) NOT NULL,
  `nom_activite` varchar(55) NOT NULL,
  `age_min_activite` int(2) NOT NULL,
  `age_max_activite` tinyint(2) NOT NULL,
  `type_activite` varchar(55) NOT NULL,
  `nb_places` tinyint(2) NOT NULL,
  `niveau_activite` enum('tous niveaux','debutant','intermediaire','avancé') DEFAULT 'tous niveaux',
  `prerequis` varchar(200) DEFAULT NULL,
  `tarif_activite` double NOT NULL,
  `description_activite` text NOT NULL,
  `img_activite` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`id_activite`, `nom_activite`, `age_min_activite`, `age_max_activite`, `type_activite`, `nb_places`, `niveau_activite`, `prerequis`, `tarif_activite`, `description_activite`, `img_activite`, `created_at`, `updated_at`) VALUES
('AC136', 'Atelier dessin', 3, 12, 'Art', 30, 'tous niveaux', 'Avoir de la peinture à disposition', 10, 'L’atelier de dessin est un espace créatif où les enfants peuvent exprimer leur imagination à travers le crayon et les couleurs. Encadrés par un animateur, ils découvrent différentes techniques de dessin (crayons, feutres, pastels) et développent leur sens artistique. Cet atelier favorise la concentration, la motricité fine et la confiance en soi tout en s’amusant ! ', 'public/images/images_activites/img-peinture.jpg', '2025-03-24 17:21:36', '2025-03-24 17:28:00'),
('AC755', 'Atelier Guitare', 8, 12, 'Musique', 15, 'intermediaire', 'Avoir une Guitare', 30, 'Apprenez à jouer de la guitare dans une ambiance ludique et motivante. Un programme adapté aux débutants comme aux plus expérimentés. Hac ita persuasione reducti intra moenia bellatores obseratis undique portarum aditibus, propugnaculis insistebant et pinnis, congesta undique saxa telaque habentes in promptu, ut si quis se proripuisset interius, multitudine missilium sterneretur et lapidum.', 'public/images/images_activites/img_67e18cd7072eb8.56322598.jpg', '2025-03-24 17:48:23', '2025-03-24 17:48:23');

-- --------------------------------------------------------

--
-- Structure de la table `activite_accompagnateur`
--

CREATE TABLE `activite_accompagnateur` (
  `id_activite_accompagnateur` int(11) NOT NULL,
  `id_accompagnateur` char(6) NOT NULL,
  `id_activite` varchar(6) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `activite_animateur`
--

CREATE TABLE `activite_animateur` (
  `id_activite_animateur` int(11) NOT NULL,
  `id_animateur` char(6) NOT NULL,
  `id_activite` varchar(6) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `activite_creneau`
--

CREATE TABLE `activite_creneau` (
  `id_activite_creneau` int(11) NOT NULL,
  `id_creneau` int(11) NOT NULL,
  `id_activite` varchar(6) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `activite_parcours`
--

CREATE TABLE `activite_parcours` (
  `id_activite_parcours` tinyint(4) NOT NULL,
  `id_parcours` varchar(5) NOT NULL,
  `id_activite` varchar(6) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `activite_parcours`
--

INSERT INTO `activite_parcours` (`id_activite_parcours`, `id_parcours`, `id_activite`, `created_at`, `updated_at`) VALUES
(3, 'PC102', 'AC136', '2025-03-25 22:46:55', '2025-03-25 22:46:55'),
(4, 'PC102', 'AC755', '2025-03-25 22:46:55', '2025-03-25 22:46:55');

-- --------------------------------------------------------

--
-- Structure de la table `animateur`
--

CREATE TABLE `animateur` (
  `id_animateur` char(6) NOT NULL,
  `id_personnel` char(6) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `animateur_competence`
--

CREATE TABLE `animateur_competence` (
  `id_animateur_competence` int(11) NOT NULL,
  `id_animateur` char(6) NOT NULL,
  `id_competence` int(11) NOT NULL,
  `type_competence` enum('centre d''intérêt','competence') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE `competence` (
  `id_competence` int(11) NOT NULL,
  `nom_competence` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `competence`
--

INSERT INTO `competence` (`id_competence`, `nom_competence`, `created_at`, `updated_at`) VALUES
(1, 'Musique', '2025-03-08 15:24:18', '2025-03-08 15:24:18'),
(2, 'Cuisine', '2025-03-08 15:24:18', '2025-03-08 15:24:18'),
(3, 'Sciences', '2025-03-08 15:24:18', '2025-03-08 15:24:18'),
(4, 'Puzzle & casse tête', '2025-03-08 15:24:18', '2025-03-08 15:24:18'),
(5, 'Sport de combat', '2025-03-08 15:24:18', '2025-03-08 15:24:18'),
(6, 'Théâtre', '2025-03-08 15:24:18', '2025-03-08 15:24:18'),
(7, 'Art', '2025-03-08 15:24:18', '2025-03-08 15:24:18'),
(8, 'Lecture', '2025-03-08 15:24:18', '2025-03-08 15:24:18'),
(9, 'Sport d\'équipe', '2025-03-08 15:24:18', '2025-03-08 15:24:18'),
(10, 'Culture du monde', '2025-03-08 15:24:18', '2025-03-08 15:24:18');

-- --------------------------------------------------------

--
-- Structure de la table `comportement`
--

CREATE TABLE `comportement` (
  `id_comportement` int(11) NOT NULL,
  `type_comportement` varchar(35) NOT NULL,
  `description_comportement` text DEFAULT NULL,
  `id_enfant` char(6) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `creneau`
--

CREATE TABLE `creneau` (
  `id_creneau` int(11) NOT NULL,
  `type_accueil` enum('mercredi','périscolaire','vacances','quantine') NOT NULL,
  `nom_vacances` enum('été','automne','hiver','printemps','noel') DEFAULT NULL,
  `tarif_creneau` double NOT NULL,
  `nb_place_accueil` tinyint(4) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `creneau`
--

INSERT INTO `creneau` (`id_creneau`, `type_accueil`, `nom_vacances`, `tarif_creneau`, `nb_place_accueil`, `created_at`, `updated_at`) VALUES
(1, 'périscolaire', NULL, 100, 40, '2025-03-14 11:40:53', '2025-03-14 11:40:53'),
(2, 'mercredi', NULL, 12, 40, '2025-03-26 01:37:24', '2025-03-26 01:37:24'),
(3, 'vacances', 'été', 100, 60, '2025-03-26 01:40:33', '2025-03-26 01:40:33'),
(4, 'vacances', 'automne', 25, 35, '2025-03-26 01:40:33', '2025-03-26 01:41:22'),
(5, 'vacances', 'hiver', 25, 35, '2025-03-26 01:43:26', '2025-03-26 01:43:26'),
(6, 'vacances', 'printemps', 20, 35, '2025-03-26 01:43:26', '2025-03-26 01:43:26'),
(7, 'vacances', 'noel', 35, 30, '2025-03-26 01:43:26', '2025-03-26 01:43:26'),
(8, 'quantine', NULL, 50, 50, '2025-03-26 01:43:26', '2025-03-26 01:43:26');

-- --------------------------------------------------------

--
-- Structure de la table `enfant`
--

CREATE TABLE `enfant` (
  `id_enfant` char(6) NOT NULL,
  `nom_enfant` varchar(35) NOT NULL,
  `prenom_enfant` varchar(35) NOT NULL,
  `sexe_enfant` enum('féminin','masculin','autre') NOT NULL,
  `date_naissance` date NOT NULL,
  `securite_sociale` varchar(13) DEFAULT NULL,
  `type_famille` enum('Monoparentale','nombreuse','simple','unique') NOT NULL DEFAULT 'simple',
  `fiche_medical` varchar(100) DEFAULT NULL,
  `type_repas` enum('halal','végétarien','aucun') DEFAULT 'aucun',
  `allergies` set('fruits à coque et arachides','produits laitiers','gluten','oeufs','poissons et fruits de mer','soja et légumineuses','sésame') DEFAULT NULL,
  `id_parent` char(6) NOT NULL,
  `numero_groupe` varchar(3) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enfant`
--

INSERT INTO `enfant` (`id_enfant`, `nom_enfant`, `prenom_enfant`, `sexe_enfant`, `date_naissance`, `securite_sociale`, `type_famille`, `fiche_medical`, `type_repas`, `allergies`, `id_parent`, `numero_groupe`, `created_at`, `updated_at`) VALUES
('CH2100', 'Fouelefack Wamba', 'Faquira', 'féminin', '2020-04-13', NULL, 'unique', NULL, 'aucun', NULL, 'PR4378', '3', '2025-03-27 09:50:56', '2025-03-27 09:50:56'),
('CH3096', 'Fouelefack Wamba', 'Faquira', 'féminin', '2020-09-21', NULL, 'unique', NULL, 'aucun', NULL, 'PR3804', '510', '2025-03-23 20:13:50', '2025-03-26 22:36:05'),
('CH3388', 'Fouelefack Wamba', 'Faquira', 'féminin', '2020-09-21', NULL, 'unique', NULL, 'aucun', NULL, 'PR2516', '510', '2025-03-23 20:01:01', '2025-03-26 22:35:48'),
('CH3704', 'Fouelefack Wamba', 'Faquira', 'féminin', '2020-04-20', NULL, 'unique', NULL, 'aucun', NULL, 'PR4243', '3', '2025-03-23 19:09:33', '2025-03-23 19:09:33'),
('CH4381', 'Fouelefack Wamba', 'Faquira', 'masculin', '2020-04-14', NULL, 'unique', NULL, 'aucun', NULL, 'PR7283', '3', '2025-03-23 18:59:12', '2025-03-23 18:59:12'),
('CH4953', 'Fouelefack Wamba', 'Faquira', 'féminin', '2020-09-21', NULL, 'unique', NULL, 'aucun', NULL, 'PR4183', '3', '2025-03-23 19:48:28', '2025-03-23 19:48:28'),
('CH6799', 'amma', 'lohes', 'féminin', '2020-04-14', NULL, 'Monoparentale', NULL, 'aucun', NULL, 'PR6335', '3', '2025-03-27 09:57:12', '2025-03-27 09:57:12'),
('CH8620', 'Fouelefack', 'Faquira', 'féminin', '2020-09-21', NULL, 'unique', NULL, 'aucun', NULL, 'PR2979', '3', '2025-03-23 18:50:46', '2025-03-23 18:50:46'),
('CH8950', 'Wamba', 'Faquira', 'féminin', '2020-03-24', NULL, 'Monoparentale', NULL, 'aucun', NULL, 'PR3304', '855', '2025-03-26 11:44:56', '2025-03-26 23:06:37'),
('CH9305', 'Fouelefack Wamba', 'Faquira', 'masculin', '2020-09-23', NULL, 'unique', NULL, 'aucun', NULL, 'PR9833', '3', '2025-03-23 19:05:48', '2025-03-23 19:05:48'),
('CH9429', 'Fouelefack Wamba', 'Faquira', 'féminin', '2020-09-21', NULL, 'unique', NULL, 'aucun', NULL, 'PR3532', '3', '2025-03-23 20:20:47', '2025-03-23 20:20:47');

-- --------------------------------------------------------

--
-- Structure de la table `enfant_competence`
--

CREATE TABLE `enfant_competence` (
  `id_enfant_competence` int(11) NOT NULL,
  `id_enfant` char(6) NOT NULL,
  `id_competence` int(11) NOT NULL,
  `type_competence` enum('centre d''intérêt','competence') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enfant_competence`
--

INSERT INTO `enfant_competence` (`id_enfant_competence`, `id_enfant`, `id_competence`, `type_competence`, `created_at`, `updated_at`) VALUES
(6, 'CH8620', 2, 'centre d\'intérêt', '2025-03-23 18:50:46', '2025-03-23 18:50:46'),
(7, 'CH8620', 8, 'centre d\'intérêt', '2025-03-23 18:50:46', '2025-03-23 18:50:46'),
(8, 'CH4381', 7, 'centre d\'intérêt', '2025-03-23 18:59:12', '2025-03-23 18:59:12'),
(9, 'CH9305', 2, 'centre d\'intérêt', '2025-03-23 19:05:48', '2025-03-23 19:05:48'),
(10, 'CH9305', 7, 'centre d\'intérêt', '2025-03-23 19:05:48', '2025-03-23 19:05:48'),
(11, 'CH3704', 2, 'centre d\'intérêt', '2025-03-23 19:09:33', '2025-03-23 19:09:33'),
(12, 'CH4953', 1, 'centre d\'intérêt', '2025-03-23 19:48:28', '2025-03-23 19:48:28'),
(13, 'CH4953', 2, 'centre d\'intérêt', '2025-03-23 19:48:28', '2025-03-23 19:48:28'),
(14, 'CH3388', 1, 'centre d\'intérêt', '2025-03-23 20:01:01', '2025-03-23 20:01:01'),
(15, 'CH3388', 2, 'centre d\'intérêt', '2025-03-23 20:01:01', '2025-03-23 20:01:01'),
(16, 'CH3096', 1, 'centre d\'intérêt', '2025-03-23 20:13:50', '2025-03-23 20:13:50'),
(17, 'CH3096', 2, 'centre d\'intérêt', '2025-03-23 20:13:50', '2025-03-23 20:13:50'),
(18, 'CH9429', 1, 'centre d\'intérêt', '2025-03-23 20:20:47', '2025-03-23 20:20:47'),
(19, 'CH9429', 2, 'centre d\'intérêt', '2025-03-23 20:20:47', '2025-03-23 20:20:47'),
(20, 'CH8950', 2, 'centre d\'intérêt', '2025-03-26 11:44:56', '2025-03-26 11:44:56'),
(21, 'CH8950', 4, 'centre d\'intérêt', '2025-03-26 11:44:56', '2025-03-26 11:44:56'),
(22, 'CH8950', 8, 'centre d\'intérêt', '2025-03-26 11:44:56', '2025-03-26 11:44:56'),
(23, 'CH8950', 10, 'centre d\'intérêt', '2025-03-26 11:44:56', '2025-03-26 11:44:56'),
(24, 'CH2100', 2, 'centre d\'intérêt', '2025-03-27 09:50:56', '2025-03-27 09:50:56'),
(25, 'CH2100', 9, 'centre d\'intérêt', '2025-03-27 09:50:56', '2025-03-27 09:50:56'),
(26, 'CH6799', 3, 'centre d\'intérêt', '2025-03-27 09:57:12', '2025-03-27 09:57:12'),
(27, 'CH6799', 7, 'centre d\'intérêt', '2025-03-27 09:57:12', '2025-03-27 09:57:12');

-- --------------------------------------------------------

--
-- Structure de la table `enfant_creneau`
--

CREATE TABLE `enfant_creneau` (
  `id_enfant_creneau` int(11) NOT NULL,
  `id_enfant` char(6) NOT NULL,
  `id_creneau` int(11) NOT NULL,
  `jour` enum('lundi','mardi','Mercredi','jeudi','vendredi','tous les jours') NOT NULL,
  `periode` enum('matin','repas','après-midi','soir','journée','semaine_1','semaine_2','tous') NOT NULL,
  `Etat` enum('attente','refusé','validé') NOT NULL DEFAULT 'attente',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enfant_creneau`
--

INSERT INTO `enfant_creneau` (`id_enfant_creneau`, `id_enfant`, `id_creneau`, `jour`, `periode`, `Etat`, `created_at`, `updated_at`) VALUES
(1, 'CH3096', 1, 'vendredi', 'soir', 'refusé', '2025-03-23 20:13:50', '2025-03-26 13:23:44'),
(2, 'CH3096', 1, 'tous les jours', 'matin', 'refusé', '2025-03-23 20:13:50', '2025-03-26 13:23:44'),
(3, 'CH3096', 1, 'mardi', 'soir', 'refusé', '2025-03-23 20:13:50', '2025-03-26 13:23:44'),
(4, 'CH9429', 1, 'Mercredi', 'soir', 'attente', '2025-03-23 20:20:47', '2025-03-23 20:20:47'),
(5, 'CH9429', 1, 'jeudi', 'matin', 'attente', '2025-03-23 20:20:47', '2025-03-23 20:20:47'),
(6, 'CH9429', 1, 'jeudi', 'soir', 'attente', '2025-03-23 20:20:47', '2025-03-23 20:20:47'),
(7, 'CH8950', 8, 'mardi', 'repas', 'validé', '2025-03-26 11:44:56', '2025-03-26 13:59:47'),
(8, 'CH8950', 8, 'Mercredi', 'repas', 'validé', '2025-03-26 11:44:56', '2025-03-26 13:59:47'),
(9, 'CH8950', 8, 'jeudi', 'repas', 'validé', '2025-03-26 11:44:56', '2025-03-26 13:59:47'),
(10, 'CH8950', 2, 'Mercredi', 'journée', 'validé', '2025-03-26 11:44:56', '2025-03-26 13:59:47'),
(11, 'CH2100', 1, 'lundi', 'matin', 'attente', '2025-03-27 09:50:56', '2025-03-27 09:50:56'),
(12, 'CH2100', 1, 'lundi', 'soir', 'attente', '2025-03-27 09:50:56', '2025-03-27 09:50:56'),
(13, 'CH2100', 1, 'mardi', 'après-midi', 'attente', '2025-03-27 09:50:56', '2025-03-27 09:50:56'),
(14, 'CH2100', 8, 'lundi', 'repas', 'attente', '2025-03-27 09:50:56', '2025-03-27 09:50:56'),
(15, 'CH2100', 8, 'vendredi', 'repas', 'attente', '2025-03-27 09:50:56', '2025-03-27 09:50:56'),
(16, 'CH6799', 8, 'mardi', 'repas', 'validé', '2025-03-27 09:57:12', '2025-03-27 11:02:02'),
(17, 'CH6799', 8, 'Mercredi', 'repas', 'validé', '2025-03-27 09:57:12', '2025-03-27 11:02:02');

-- --------------------------------------------------------

--
-- Structure de la table `enfant_parcours`
--

CREATE TABLE `enfant_parcours` (
  `id_enfant_parcours` int(11) NOT NULL,
  `id_enfant` char(6) NOT NULL,
  `id_parcours` varchar(5) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `numero_facture` varchar(10) NOT NULL,
  `montant` double NOT NULL,
  `date_facture` date NOT NULL,
  `id_enfant` char(6) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`numero_facture`, `montant`, `date_facture`, `id_enfant`, `created_at`, `updated_at`) VALUES
('FAC2267', 72, '2025-03-26', 'CH8950', '2025-03-26 13:59:47', '2025-03-27 01:39:43'),
('FAC5063', 50, '2025-03-27', 'CH6799', '2025-03-27 11:02:02', '2025-03-27 11:02:02');

-- --------------------------------------------------------

--
-- Structure de la table `groupe_enfant`
--

CREATE TABLE `groupe_enfant` (
  `numero_groupe` varchar(3) NOT NULL,
  `nb_enfant` tinyint(4) NOT NULL,
  `age_min_groupe` tinyint(2) NOT NULL,
  `age_max_groupe` tinyint(2) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `groupe_enfant`
--

INSERT INTO `groupe_enfant` (`numero_groupe`, `nb_enfant`, `age_min_groupe`, `age_max_groupe`, `created_at`, `updated_at`) VALUES
('3', 127, 3, 5, '2025-03-14 14:17:15', '2025-03-14 14:17:15'),
('510', 6, 8, 12, '2025-03-26 17:52:07', '2025-03-26 17:52:07'),
('6', 127, 6, 8, '2025-03-14 14:17:15', '2025-03-14 14:17:15'),
('854', 6, 8, 12, '2025-03-26 18:11:49', '2025-03-26 18:11:49'),
('855', 6, 3, 6, '2025-03-26 23:06:07', '2025-03-26 23:06:07'),
('9', 127, 9, 12, '2025-03-14 14:17:15', '2025-03-14 14:17:15'),
('947', 6, 8, 12, '2025-03-26 17:52:18', '2025-03-26 17:52:18'),
('963', 6, 8, 12, '2025-03-26 17:55:00', '2025-03-26 17:55:00');

-- --------------------------------------------------------

--
-- Structure de la table `groupe_enfant_animateur`
--

CREATE TABLE `groupe_enfant_animateur` (
  `id_groupe_animateur` int(11) NOT NULL,
  `id_animateur` char(6) NOT NULL,
  `numero_groupe` varchar(3) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inscription_activite`
--

CREATE TABLE `inscription_activite` (
  `id_inscription_activite` smallint(6) NOT NULL,
  `date_debut_activite` date NOT NULL,
  `date_fin_activite` date NOT NULL,
  `rabais` double DEFAULT NULL,
  `etat_file_attente` enum('in','out') NOT NULL DEFAULT 'in',
  `id_enfant` char(6) NOT NULL,
  `id_activite` varchar(5) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `inscription_activite`
--

INSERT INTO `inscription_activite` (`id_inscription_activite`, `date_debut_activite`, `date_fin_activite`, `rabais`, `etat_file_attente`, `id_enfant`, `id_activite`, `created_at`, `updated_at`) VALUES
(1, '2025-03-31', '2025-04-04', NULL, 'in', 'CH8950', 'AC136', '2025-03-27 01:39:43', '2025-03-27 01:39:43');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `type_message` enum('faq','message') NOT NULL,
  `description_message` text NOT NULL,
  `id_parent` char(6) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id_notification` int(11) NOT NULL,
  `titre_notification` varchar(55) NOT NULL,
  `description_notification` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `notification_utilisateur`
--

CREATE TABLE `notification_utilisateur` (
  `id_notification_parent` int(11) NOT NULL,
  `id_notification` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `id_paiement` int(11) NOT NULL,
  `mode_paiment` enum('carte bleu','espèce') NOT NULL,
  `numero_facture` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `parcours_activite`
--

CREATE TABLE `parcours_activite` (
  `id_parcours` varchar(5) NOT NULL,
  `titre_parcours` varchar(55) NOT NULL,
  `prix_parcours` double NOT NULL,
  `description_parcours` text DEFAULT NULL,
  `nb_places_parcours` tinyint(4) NOT NULL,
  `date_debut_parcours` date NOT NULL,
  `date_fin_parcours` date NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `parcours_activite`
--

INSERT INTO `parcours_activite` (`id_parcours`, `titre_parcours`, `prix_parcours`, `description_parcours`, `nb_places_parcours`, `date_debut_parcours`, `date_fin_parcours`, `created_at`, `updated_at`) VALUES
('PC102', 'Le Parcours Artistique', 25, '                                                                                    Developpez les compétences artistiques de vos enfants à travers la musique et le dessin                                                                                    ', 15, '2025-04-01', '2025-04-25', '2025-03-25 22:46:55', '2025-03-25 23:33:33');

-- --------------------------------------------------------

--
-- Structure de la table `parent`
--

CREATE TABLE `parent` (
  `id_parent` char(6) NOT NULL,
  `nom_parent` varchar(35) NOT NULL,
  `prenom_parent` varchar(35) NOT NULL,
  `telephone_parent` varchar(10) NOT NULL,
  `sexe_parent` enum('féminin','masculin','autre') DEFAULT NULL,
  `rue_parent` varchar(155) NOT NULL,
  `ville_parent` varchar(50) NOT NULL,
  `code_postal_parent` varchar(10) NOT NULL,
  `pays_parent` varchar(50) NOT NULL,
  `complément` varchar(155) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `parent`
--

INSERT INTO `parent` (`id_parent`, `nom_parent`, `prenom_parent`, `telephone_parent`, `sexe_parent`, `rue_parent`, `ville_parent`, `code_postal_parent`, `pays_parent`, `complément`, `user_id`, `created_at`, `updated_at`) VALUES
('PR2516', 'Fouelefack Wamba', 'Faquira', '652536561', 'féminin', '218 Avenue Paul Santy', 'Lyon', '69008', 'France', NULL, 57, '2025-03-23 20:01:01', '2025-03-23 20:01:01'),
('PR2979', 'Fouelefack Wamba', 'Faquira', '652536561', 'féminin', '218 Avenue Paul Santy', 'Lyon', '69008', 'France', NULL, 52, '2025-03-23 18:50:46', '2025-03-23 18:50:46'),
('PR3304', 'Hun', 'Laura', '0654637243', 'féminin', '43 terre de la vie', 'Lyon', '69300', 'France', NULL, 63, '2025-03-26 11:44:56', '2025-03-26 11:44:56'),
('PR3532', 'Fouelefack Wamba', 'Faquira', '652536561', 'féminin', '218 Avenue Paul Santy', 'Lyon', '69008', 'France', NULL, 59, '2025-03-23 20:20:47', '2025-03-23 20:20:47'),
('PR3804', 'Fouelefack Wamba', 'Faquira', '652536561', 'féminin', '218 Avenue Paul Santy', 'Lyon', '69008', 'France', NULL, 58, '2025-03-23 20:13:50', '2025-03-23 20:13:50'),
('PR4183', 'Fouelefack Wamba', 'Faquira', '652536561', 'féminin', '218 Avenue Paul Santy', 'Lyon', '69008', 'France', NULL, 56, '2025-03-23 19:48:27', '2025-03-23 19:48:27'),
('PR4243', 'Fouelefack Wamba', 'Faquira', '652536561', 'masculin', '218 Avenue Paul Santy', 'Lyon', '69008', 'France', NULL, 55, '2025-03-23 19:09:33', '2025-03-23 19:09:33'),
('PR4378', 'Fouelefack Wamba', 'Faquira', '652536561', 'féminin', '218 Avenue Paul Santy', 'Lyon', '69008', 'France', NULL, 65, '2025-03-27 09:50:56', '2025-03-27 09:50:56'),
('PR6335', 'Fouelefack Wamba', 'Faquira', '652536561', 'féminin', '218 Avenue Paul Santy', 'Lyon', '69008', 'France', NULL, 66, '2025-03-27 09:57:12', '2025-03-27 09:57:12'),
('PR7283', 'Fouelefack', 'Faquira', '0652536561', 'féminin', '218 Avenue Paul Santy', 'Lyon', '69008', 'France', NULL, 53, '2025-03-23 18:59:12', '2025-03-23 18:59:12'),
('PR9769', 'Fouelefack', 'Faquira', '0652536561', 'féminin', '218 Avenue Paul Santy', 'Lyon', '69008', 'France', NULL, 51, '2025-03-23 18:39:47', '2025-03-23 18:39:47'),
('PR9833', 'Fouelefack Wamba', 'Faquira', '652536561', 'masculin', '218 Avenue Paul Santy', 'Lyon', '69008', 'France', NULL, 54, '2025-03-23 19:05:48', '2025-03-23 19:05:48');

-- --------------------------------------------------------

--
-- Structure de la table `personnel_encadrant`
--

CREATE TABLE `personnel_encadrant` (
  `id_personnel` char(6) NOT NULL,
  `nom_personnel` varchar(35) NOT NULL,
  `prenom_personnel` varchar(35) NOT NULL,
  `telephone_personnel` varchar(10) NOT NULL,
  `rue_personnel` varchar(155) NOT NULL,
  `ville_personnel` varchar(50) NOT NULL,
  `code_postal_personnel` varchar(10) NOT NULL,
  `pays_personnel` varchar(50) NOT NULL,
  `complément_personnel` varchar(155) DEFAULT NULL,
  `role_personnel` enum('animateur','administrateur','accompagnateur') NOT NULL,
  `sexe_personnel` enum('féminin','masculin','autre') NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personnel_encadrant`
--

INSERT INTO `personnel_encadrant` (`id_personnel`, `nom_personnel`, `prenom_personnel`, `telephone_personnel`, `rue_personnel`, `ville_personnel`, `code_postal_personnel`, `pays_personnel`, `complément_personnel`, `role_personnel`, `sexe_personnel`, `user_id`, `created_at`, `updated_at`) VALUES
('AD2303', 'Moutsemo', 'Eunice', '654545454', '1C avenue des Frères Lumière', 'lyon', '69008', 'France', NULL, 'administrateur', 'féminin', 61, '2025-03-23 22:55:02', '2025-03-23 22:55:02'),
('PE2303', 'Badel', 'Mattéo', '654545454', '1C avenue des Frères Lumière', 'lyon', '69008', 'France', NULL, 'animateur', 'masculin', 60, '2025-03-23 22:55:02', '2025-03-23 22:55:02'),
('PE2603', 'LO', 'mame fatou', '667453278', '23 AVENUE LORE', 'LYON', '69003', 'France', NULL, 'accompagnateur', 'féminin', 62, '2025-03-26 11:38:11', '2025-03-26 11:38:11');

-- --------------------------------------------------------

--
-- Structure de la table `presence_activite`
--

CREATE TABLE `presence_activite` (
  `id_presence_activite` smallint(6) NOT NULL,
  `etat_presence_activite` enum('présent','absent') NOT NULL,
  `projet_realise` varchar(255) DEFAULT NULL,
  `id_inscription_activite` smallint(6) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `profil_pedagogique`
--

CREATE TABLE `profil_pedagogique` (
  `id_profil` int(11) NOT NULL,
  `type_profil` varchar(35) NOT NULL,
  `description_profil` text DEFAULT NULL,
  `id_enfant` char(6) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `profil_pedagogique`
--

INSERT INTO `profil_pedagogique` (`id_profil`, `type_profil`, `description_profil`, `id_enfant`, `created_at`, `updated_at`) VALUES
(5, 'Incident', 'blessur', 'CH8950', '2025-03-27 03:06:43', '2025-03-27 03:06:43');

-- --------------------------------------------------------

--
-- Structure de la table `reunion`
--

CREATE TABLE `reunion` (
  `id_reunion` tinyint(4) NOT NULL,
  `nom_reunion` varchar(255) NOT NULL,
  `date_reunion` date NOT NULL,
  `heure_reunion` time NOT NULL,
  `etat_reunion` enum('à venir','passée','annulée') DEFAULT 'à venir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reunion`
--

INSERT INTO `reunion` (`id_reunion`, `nom_reunion`, `date_reunion`, `heure_reunion`, `etat_reunion`) VALUES
(1, 'Le Projet Fil rouge', '2025-03-30', '13:40:00', 'à venir'),
(3, 'Le projettt', '2025-03-27', '10:30:00', 'à venir');

-- --------------------------------------------------------

--
-- Structure de la table `suivi_medical`
--

CREATE TABLE `suivi_medical` (
  `id_suivi` varchar(6) NOT NULL,
  `type_suivi` enum('incident','prise de traitement') NOT NULL,
  `description_suivi` text DEFAULT NULL,
  `id_enfant` char(6) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`user_id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(8, 'test@bambins.com', '$2y$10$RTuAqKxefL3a4gzTB2TKyerC2m98LizjQRfbufR4gbokvgzparZzO', '2025-03-05 16:12:13', '2025-03-05 16:12:13'),
(51, 'faquirawamba15@gmail.com', '$2y$10$n8jat2coWe2NXxrCgL5WQ.d.iZeckzs7MqdQV.RSLlGD6TYUs9tAy', '2025-03-23 18:39:47', '2025-03-23 18:39:47'),
(52, 'faquirawamba@gmail.com', '$2y$10$MPm5/8DVVQrzRQlsdJ/4M.PScEt1koFv05jCs7jlscbS2dmBqkPvC', '2025-03-23 18:50:46', '2025-03-23 18:50:46'),
(53, 'chef@gmail.com', '$2y$10$1WzStSyT8OHkjBaKrvcfN.W.MGHC/MvzedP5QL.vzdxSbE.YQk6sC', '2025-03-23 18:59:12', '2025-03-23 18:59:12'),
(54, 'test@gmail.com', '$2y$10$m9.kgSoHtOrVAcxpe5XALOwm3iSfey5tlpIje3plpagBdElzUHLAa', '2025-03-23 19:05:48', '2025-03-23 19:05:48'),
(55, 'test2@gmail.com', '$2y$10$oRQihNC2tFOJd0BFoHMclu/hu1yJR7pc6Ezwj1yASg7arHwh/rpD2', '2025-03-23 19:09:33', '2025-03-23 19:09:33'),
(56, 'test3@gmail.com', '$2y$10$fCUPVbY8y724uI9dwDHnX.H14sc9nxMKZHm9X35VhDPH8i36JwGK.', '2025-03-23 19:48:27', '2025-03-23 19:48:27'),
(57, 'test4@gmail.com', '$2y$10$TyhgrSdaza5fsNCE2DpZTOg8e9jHRPEbP6zDudvVysqtLgQiW4aga', '2025-03-23 20:01:01', '2025-03-23 20:01:01'),
(58, 'test5@gmail.com', '$2y$10$uCIgOFSD3mHwBQhhtmZePOM76EZa3OiudZke95UP7.OgjuF1Lp8K6', '2025-03-23 20:13:50', '2025-03-23 20:13:50'),
(59, 'test6@gmail.com', '$2y$10$M1FjxSmetgpD8gmJi.bUBugr/wqqbs0md8vSDKmF2vfhFq.Wfnj76', '2025-03-23 20:20:47', '2025-03-23 20:20:47'),
(60, 'animateur@bambins.fr', '$2y$10$EJ2bl31zoKcwdqFTj1v5PedSidd5fk.fE1lfd/eGT1MSE.GBQTV7S', '2025-03-23 22:43:42', '2025-03-23 22:43:42'),
(61, 'admin@bambins.fr', '$2y$10$GJONXArtRqCNXoAWLTEq8.rPIYxKW451mn2VcjgJ2yFit3wCL7mzm', '2025-03-23 22:44:53', '2025-03-23 22:44:53'),
(62, 'accompagnateur@bambins.fr', '$2y$10$RumLCKXY3EN7P8YBUkQkIuuyp0A3.yJnbxbeCiVCtBciOOFBQyXUa', '2025-03-26 11:31:31', '2025-03-26 11:31:31'),
(63, 'hunlaura@gmail.com', '$2y$10$uEl7cA2T9LdZJTF/2OWdqu/3ebjHvs7IpuAsqI5xejvZ8aU7iAt4a', '2025-03-26 11:44:56', '2025-03-26 12:06:03'),
(64, 'eunice@gmail.com', '$2y$10$14JKKWT4HGeOh41CFTdLCeltOIz/vfTmjSWgMnRDD6ojvOQcPn0xS', '2025-03-26 17:27:03', '2025-03-26 17:27:03'),
(65, 'mateo@gmail.com', '$2y$10$SzqV/U69NpZFWtE2SZtIpu2YMPAHVWuAAynTJRx0C2xwjYKebge1m', '2025-03-27 09:50:56', '2025-03-27 09:50:56'),
(66, 're@gmail.com', '$2y$10$2EGqpT6/PhpouGWETXkWPuUd7z35u4WVxw8yYlxt8hUq.ci6EXHoi', '2025-03-27 09:57:12', '2025-03-27 09:57:12');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `accompagnateur`
--
ALTER TABLE `accompagnateur`
  ADD PRIMARY KEY (`id_accompagnateur`),
  ADD KEY `id_personnel` (`id_personnel`);

--
-- Index pour la table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`id_activite`),
  ADD UNIQUE KEY `nom_activite` (`nom_activite`);

--
-- Index pour la table `activite_accompagnateur`
--
ALTER TABLE `activite_accompagnateur`
  ADD PRIMARY KEY (`id_activite_accompagnateur`),
  ADD KEY `id_activite` (`id_activite`),
  ADD KEY `id_accompagnateur` (`id_accompagnateur`);

--
-- Index pour la table `activite_animateur`
--
ALTER TABLE `activite_animateur`
  ADD PRIMARY KEY (`id_activite_animateur`),
  ADD KEY `id_activite` (`id_activite`),
  ADD KEY `id_animateur` (`id_animateur`);

--
-- Index pour la table `activite_creneau`
--
ALTER TABLE `activite_creneau`
  ADD PRIMARY KEY (`id_activite_creneau`),
  ADD KEY `id_activite` (`id_activite`),
  ADD KEY `id_creneau` (`id_creneau`);

--
-- Index pour la table `activite_parcours`
--
ALTER TABLE `activite_parcours`
  ADD PRIMARY KEY (`id_activite_parcours`),
  ADD KEY `id_activite` (`id_activite`),
  ADD KEY `id_parcours` (`id_parcours`);

--
-- Index pour la table `animateur`
--
ALTER TABLE `animateur`
  ADD PRIMARY KEY (`id_animateur`),
  ADD KEY `id_personnel` (`id_personnel`);

--
-- Index pour la table `animateur_competence`
--
ALTER TABLE `animateur_competence`
  ADD PRIMARY KEY (`id_animateur_competence`),
  ADD KEY `id_animateur` (`id_animateur`),
  ADD KEY `id_competence` (`id_competence`);

--
-- Index pour la table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`id_competence`),
  ADD UNIQUE KEY `nom_competence` (`nom_competence`);

--
-- Index pour la table `comportement`
--
ALTER TABLE `comportement`
  ADD PRIMARY KEY (`id_comportement`),
  ADD KEY `id_enfant` (`id_enfant`);

--
-- Index pour la table `creneau`
--
ALTER TABLE `creneau`
  ADD PRIMARY KEY (`id_creneau`);

--
-- Index pour la table `enfant`
--
ALTER TABLE `enfant`
  ADD PRIMARY KEY (`id_enfant`),
  ADD KEY `id_parent` (`id_parent`),
  ADD KEY `numero_groupe` (`numero_groupe`);

--
-- Index pour la table `enfant_competence`
--
ALTER TABLE `enfant_competence`
  ADD PRIMARY KEY (`id_enfant_competence`),
  ADD KEY `id_enfant` (`id_enfant`),
  ADD KEY `id_competence` (`id_competence`);

--
-- Index pour la table `enfant_creneau`
--
ALTER TABLE `enfant_creneau`
  ADD PRIMARY KEY (`id_enfant_creneau`),
  ADD KEY `id_enfant` (`id_enfant`),
  ADD KEY `id_creneau` (`id_creneau`);

--
-- Index pour la table `enfant_parcours`
--
ALTER TABLE `enfant_parcours`
  ADD PRIMARY KEY (`id_enfant_parcours`),
  ADD KEY `id_parcours` (`id_parcours`),
  ADD KEY `id_enfant` (`id_enfant`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`numero_facture`),
  ADD KEY `id_enfant` (`id_enfant`);

--
-- Index pour la table `groupe_enfant`
--
ALTER TABLE `groupe_enfant`
  ADD PRIMARY KEY (`numero_groupe`);

--
-- Index pour la table `groupe_enfant_animateur`
--
ALTER TABLE `groupe_enfant_animateur`
  ADD PRIMARY KEY (`id_groupe_animateur`),
  ADD KEY `numero_groupe` (`numero_groupe`),
  ADD KEY `id_animateur` (`id_animateur`);

--
-- Index pour la table `inscription_activite`
--
ALTER TABLE `inscription_activite`
  ADD PRIMARY KEY (`id_inscription_activite`),
  ADD KEY `id_enfant` (`id_enfant`),
  ADD KEY `id_activite` (`id_activite`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `id_parent` (`id_parent`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id_notification`);

--
-- Index pour la table `notification_utilisateur`
--
ALTER TABLE `notification_utilisateur`
  ADD PRIMARY KEY (`id_notification_parent`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_notification` (`id_notification`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`id_paiement`),
  ADD KEY `numero_facture` (`numero_facture`);

--
-- Index pour la table `parcours_activite`
--
ALTER TABLE `parcours_activite`
  ADD PRIMARY KEY (`id_parcours`);

--
-- Index pour la table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`id_parent`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Index pour la table `personnel_encadrant`
--
ALTER TABLE `personnel_encadrant`
  ADD PRIMARY KEY (`id_personnel`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Index pour la table `presence_activite`
--
ALTER TABLE `presence_activite`
  ADD PRIMARY KEY (`id_presence_activite`),
  ADD KEY `id_inscription_activite` (`id_inscription_activite`);

--
-- Index pour la table `profil_pedagogique`
--
ALTER TABLE `profil_pedagogique`
  ADD PRIMARY KEY (`id_profil`),
  ADD KEY `id_enfant` (`id_enfant`);

--
-- Index pour la table `reunion`
--
ALTER TABLE `reunion`
  ADD PRIMARY KEY (`id_reunion`);

--
-- Index pour la table `suivi_medical`
--
ALTER TABLE `suivi_medical`
  ADD PRIMARY KEY (`id_suivi`),
  ADD KEY `id_enfant` (`id_enfant`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activite_accompagnateur`
--
ALTER TABLE `activite_accompagnateur`
  MODIFY `id_activite_accompagnateur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `activite_animateur`
--
ALTER TABLE `activite_animateur`
  MODIFY `id_activite_animateur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `activite_creneau`
--
ALTER TABLE `activite_creneau`
  MODIFY `id_activite_creneau` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `activite_parcours`
--
ALTER TABLE `activite_parcours`
  MODIFY `id_activite_parcours` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `animateur_competence`
--
ALTER TABLE `animateur_competence`
  MODIFY `id_animateur_competence` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `competence`
--
ALTER TABLE `competence`
  MODIFY `id_competence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `comportement`
--
ALTER TABLE `comportement`
  MODIFY `id_comportement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `creneau`
--
ALTER TABLE `creneau`
  MODIFY `id_creneau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `enfant_competence`
--
ALTER TABLE `enfant_competence`
  MODIFY `id_enfant_competence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `enfant_creneau`
--
ALTER TABLE `enfant_creneau`
  MODIFY `id_enfant_creneau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `enfant_parcours`
--
ALTER TABLE `enfant_parcours`
  MODIFY `id_enfant_parcours` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `groupe_enfant_animateur`
--
ALTER TABLE `groupe_enfant_animateur`
  MODIFY `id_groupe_animateur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `inscription_activite`
--
ALTER TABLE `inscription_activite`
  MODIFY `id_inscription_activite` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id_notification` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `notification_utilisateur`
--
ALTER TABLE `notification_utilisateur`
  MODIFY `id_notification_parent` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `id_paiement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `presence_activite`
--
ALTER TABLE `presence_activite`
  MODIFY `id_presence_activite` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profil_pedagogique`
--
ALTER TABLE `profil_pedagogique`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `reunion`
--
ALTER TABLE `reunion`
  MODIFY `id_reunion` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `accompagnateur`
--
ALTER TABLE `accompagnateur`
  ADD CONSTRAINT `accompagnateur_ibfk_1` FOREIGN KEY (`id_personnel`) REFERENCES `personnel_encadrant` (`id_personnel`);

--
-- Contraintes pour la table `activite_accompagnateur`
--
ALTER TABLE `activite_accompagnateur`
  ADD CONSTRAINT `activite_accompagnateur_ibfk_1` FOREIGN KEY (`id_activite`) REFERENCES `activite` (`id_activite`),
  ADD CONSTRAINT `activite_accompagnateur_ibfk_2` FOREIGN KEY (`id_accompagnateur`) REFERENCES `accompagnateur` (`id_accompagnateur`);

--
-- Contraintes pour la table `activite_animateur`
--
ALTER TABLE `activite_animateur`
  ADD CONSTRAINT `activite_animateur_ibfk_1` FOREIGN KEY (`id_activite`) REFERENCES `activite` (`id_activite`),
  ADD CONSTRAINT `activite_animateur_ibfk_2` FOREIGN KEY (`id_animateur`) REFERENCES `animateur` (`id_animateur`);

--
-- Contraintes pour la table `activite_creneau`
--
ALTER TABLE `activite_creneau`
  ADD CONSTRAINT `activite_creneau_ibfk_1` FOREIGN KEY (`id_activite`) REFERENCES `activite` (`id_activite`),
  ADD CONSTRAINT `activite_creneau_ibfk_2` FOREIGN KEY (`id_creneau`) REFERENCES `creneau` (`id_creneau`);

--
-- Contraintes pour la table `activite_parcours`
--
ALTER TABLE `activite_parcours`
  ADD CONSTRAINT `activite_parcours_ibfk_1` FOREIGN KEY (`id_activite`) REFERENCES `activite` (`id_activite`),
  ADD CONSTRAINT `activite_parcours_ibfk_2` FOREIGN KEY (`id_parcours`) REFERENCES `parcours_activite` (`id_parcours`);

--
-- Contraintes pour la table `animateur`
--
ALTER TABLE `animateur`
  ADD CONSTRAINT `animateur_ibfk_1` FOREIGN KEY (`id_personnel`) REFERENCES `personnel_encadrant` (`id_personnel`);

--
-- Contraintes pour la table `animateur_competence`
--
ALTER TABLE `animateur_competence`
  ADD CONSTRAINT `animateur_competence_ibfk_1` FOREIGN KEY (`id_animateur`) REFERENCES `animateur` (`id_animateur`),
  ADD CONSTRAINT `animateur_competence_ibfk_2` FOREIGN KEY (`id_competence`) REFERENCES `competence` (`id_competence`);

--
-- Contraintes pour la table `comportement`
--
ALTER TABLE `comportement`
  ADD CONSTRAINT `comportement_ibfk_1` FOREIGN KEY (`id_enfant`) REFERENCES `enfant` (`id_enfant`);

--
-- Contraintes pour la table `enfant`
--
ALTER TABLE `enfant`
  ADD CONSTRAINT `enfant_ibfk_1` FOREIGN KEY (`id_parent`) REFERENCES `parent` (`id_parent`),
  ADD CONSTRAINT `enfant_ibfk_2` FOREIGN KEY (`numero_groupe`) REFERENCES `groupe_enfant` (`numero_groupe`);

--
-- Contraintes pour la table `enfant_competence`
--
ALTER TABLE `enfant_competence`
  ADD CONSTRAINT `enfant_competence_ibfk_1` FOREIGN KEY (`id_enfant`) REFERENCES `enfant` (`id_enfant`),
  ADD CONSTRAINT `enfant_competence_ibfk_2` FOREIGN KEY (`id_competence`) REFERENCES `competence` (`id_competence`);

--
-- Contraintes pour la table `enfant_creneau`
--
ALTER TABLE `enfant_creneau`
  ADD CONSTRAINT `enfant_creneau_ibfk_1` FOREIGN KEY (`id_enfant`) REFERENCES `enfant` (`id_enfant`),
  ADD CONSTRAINT `enfant_creneau_ibfk_2` FOREIGN KEY (`id_creneau`) REFERENCES `creneau` (`id_creneau`);

--
-- Contraintes pour la table `enfant_parcours`
--
ALTER TABLE `enfant_parcours`
  ADD CONSTRAINT `enfant_parcours_ibfk_1` FOREIGN KEY (`id_parcours`) REFERENCES `parcours_activite` (`id_parcours`),
  ADD CONSTRAINT `enfant_parcours_ibfk_2` FOREIGN KEY (`id_enfant`) REFERENCES `enfant` (`id_enfant`);

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`id_enfant`) REFERENCES `enfant` (`id_enfant`);

--
-- Contraintes pour la table `groupe_enfant_animateur`
--
ALTER TABLE `groupe_enfant_animateur`
  ADD CONSTRAINT `groupe_enfant_animateur_ibfk_1` FOREIGN KEY (`numero_groupe`) REFERENCES `groupe_enfant` (`numero_groupe`),
  ADD CONSTRAINT `groupe_enfant_animateur_ibfk_2` FOREIGN KEY (`id_animateur`) REFERENCES `animateur` (`id_animateur`);

--
-- Contraintes pour la table `inscription_activite`
--
ALTER TABLE `inscription_activite`
  ADD CONSTRAINT `inscription_activite_ibfk_1` FOREIGN KEY (`id_enfant`) REFERENCES `enfant` (`id_enfant`),
  ADD CONSTRAINT `inscription_activite_ibfk_2` FOREIGN KEY (`id_activite`) REFERENCES `activite` (`id_activite`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_parent`) REFERENCES `parent` (`id_parent`);

--
-- Contraintes pour la table `notification_utilisateur`
--
ALTER TABLE `notification_utilisateur`
  ADD CONSTRAINT `notification_utilisateur_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `utilisateur` (`user_id`),
  ADD CONSTRAINT `notification_utilisateur_ibfk_2` FOREIGN KEY (`id_notification`) REFERENCES `notification` (`id_notification`);

--
-- Contraintes pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `paiement_ibfk_1` FOREIGN KEY (`numero_facture`) REFERENCES `facture` (`numero_facture`);

--
-- Contraintes pour la table `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `parent_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `utilisateur` (`user_id`);

--
-- Contraintes pour la table `personnel_encadrant`
--
ALTER TABLE `personnel_encadrant`
  ADD CONSTRAINT `personnel_encadrant_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `utilisateur` (`user_id`);

--
-- Contraintes pour la table `presence_activite`
--
ALTER TABLE `presence_activite`
  ADD CONSTRAINT `presence_activite_ibfk_1` FOREIGN KEY (`id_inscription_activite`) REFERENCES `inscription_activite` (`id_inscription_activite`);

--
-- Contraintes pour la table `profil_pedagogique`
--
ALTER TABLE `profil_pedagogique`
  ADD CONSTRAINT `profil_pedagogique_ibfk_1` FOREIGN KEY (`id_enfant`) REFERENCES `enfant` (`id_enfant`);

--
-- Contraintes pour la table `suivi_medical`
--
ALTER TABLE `suivi_medical`
  ADD CONSTRAINT `suivi_medical_ibfk_1` FOREIGN KEY (`id_enfant`) REFERENCES `enfant` (`id_enfant`);

DELIMITER $$
--
-- Évènements
--
$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
