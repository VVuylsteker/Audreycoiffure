-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 15 juin 2021 à 16:19
-- Version du serveur :  10.3.27-MariaDB-0+deb10u1
-- Version de PHP : 7.3.27-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `audre1561921`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie_portfolio`
--

CREATE TABLE `categorie_portfolio` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie_portfolio`
--

INSERT INTO `categorie_portfolio` (`id`, `nom`) VALUES
(1, 'Homme'),
(2, 'MariÃ©e'),
(3, 'Enfant'),
(4, 'Vitrine');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `mail` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `code_postal` int(10) NOT NULL,
  `date_inscription` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `cle_validation` varchar(50) NOT NULL,
  `valide` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `date_de_naissance`, `mail`, `mot_de_passe`, `ville`, `code_postal`, `date_inscription`, `phone`, `cle_validation`, `valide`) VALUES
(1, 'Vandenbroucke', 'Audrey', '1981-10-10', 'audrey.bels@orange.fr', '$2y$10$FCyxrw1ENoOAjxyZuly5Pul18XmfHNnzlDhR3r4i0zuw9m0cTMmCi', 'St Jans Cappel', 59270, '2021-03-17', '0688270505', 'G0lfvyPJnuRWepOQ8DBTk3n4lKXOHcQaG5iJ4TKjebS2JHw0v3', 1),
(3, 'Vuylsteker', 'Vincent', '2000-02-26', 'vvuylsteker99@gmail.com', '$2y$10$V8aP.70JpsvSpdI/Jn3iIegergTKGAAFkyhPTk0r2kmLXD0luiuCW', 'Houplines', 59116, '2021-03-17', '0645924196', 'XF3jSk5qJQ5ZOIMIRrNiIP749vLsvUCB7RlLt9W7Pc13FrDa6T', 1),
(5, 'Decool', 'Dylan', '2000-04-14', 'dylan.decool14@gmail.com', '$2y$10$wUlrQiOwE5lU/mv7aB5GpexR5e41ABi0OkXNdjYJAZg6K.t1kUmPO', 'Estaires', 59940, '2021-05-05', '0616868688', 'PdReERZasqewb6aphePJbjslhHqSjNZCK6b3Y3ZKmxJ72fjukl', 1);

-- --------------------------------------------------------

--
-- Structure de la table `personnalisation`
--

CREATE TABLE `personnalisation` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnalisation`
--

INSERT INTO `personnalisation` (`id`, `description`, `contenu`) VALUES
(1, 'titre_index', 'Audrey Coiffure'),
(2, 'description_index', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar luctus est eget congue. Nam auctor nisi est, nec tempus lacus viverra nec. Nullam cursus, neque non congue aliquam, mauris massa consequat sem, ut laoreet nisi erat et lectus.Nam auctor nisi est, nec tempus lacus viverra nec. Nullam cursus, neque non congue aliquam, mauris massa consequat sem, ut laoreet nisi erat et lectus.'),
(3, 'image_background', '../images/couverture.jpg'),
(4, 'background_homme', '../images/homme.png'),
(5, 'background_femme', '../images/femme.jpg'),
(6, 'background_enfant', '../images/enfant.jpg'),
(7, 'titre_rdv', 'PRENDRE RENDEZ-VOUS'),
(8, 'description_rdv', 'Votre demande est peut Ãªtre refusÃ©e . Ce rendez-vous ne correspond pas Ã  un jour de prÃ©sence de votre coiffeuse. Vous pouvez changer de jour ou opter pour une autre coiffeuse.\r\nAudrey Mardi Jeudi Vendredi et Samedi\r\nCaroline Lundi et Samedi\r\nEstelle Mardi Jeudi Vendredi et Samedi'),
(9, 'titre_equipe', 'RENCONTREZ NOS EXPERTS'),
(10, 'description_equipe', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar luctus est eget congue. Nam auctor nisi est, nec tempus lacus viverra nec. Nullam cursus, neque non congue aliquam, mauris massa consequat sem, ut laoreet nisi erat et lectus.Nam auctor nisi est, nec tempus lacus viverra nec. Nullam cursus, neque non congue aliquam, mauris massa consequat sem, ut laoreet nisi erat et lectus.'),
(11, 'system_rdv', '1'),
(12, 'titre_presentation', 'PrÃ©sentation'),
(13, 'description_presentation', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar luctus est eget congue. Nam auctor nisi est, nec tempus lacus viverra nec. Nullam cursus, neque non congue aliquam, mauris massa consequat sem, ut laoreet nisi erat et lectus. Nullam non neque eros. Pellentesque nec vulputate eros. Integer scelerisque lorem id massa accumsan, ut faucibus ante suscipit. Nunc tincidunt et ligula vitae pharetra. Fusce ut lobortis augue, eget volutpat felis.');

-- --------------------------------------------------------

--
-- Structure de la table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `titre` varchar(25) NOT NULL,
  `description` varchar(150) NOT NULL,
  `lien` varchar(100) NOT NULL,
  `categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `prestations`
--

CREATE TABLE `prestations` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `temps` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `prestations`
--

INSERT INTO `prestations` (`id`, `nom`, `temps`) VALUES
(1, 'forfait homme', '1800'),
(2, 'Brushing', '2340');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

CREATE TABLE `rdv` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `couleur` varchar(7) DEFAULT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime DEFAULT NULL,
  `id_salaries` int(11) NOT NULL,
  `valide` int(11) NOT NULL,
  `id_client` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`id`, `titre`, `couleur`, `debut`, `fin`, `id_salaries`, `valide`, `id_client`) VALUES
(307, 'decool dylan | coupe | test unitaire', '#40E0D0', '2021-03-15 08:30:00', '2021-03-15 09:00:00', 1, 1, NULL),
(310, 'Decool Dylan | forfait homme | commentaire', '', '2021-03-18 14:00:00', '2021-03-18 14:30:00', 1, 2, 2),
(311, 'vandenbroucke audrey | forfait homme |       hgh', '', '2021-03-20 09:00:00', '2021-03-20 09:30:00', 1, 1, 1),
(314, 'Decool Dylan | forfait homme | test', '', '2021-05-07 15:00:00', '2021-05-07 15:30:00', 1, 0, 5);

-- --------------------------------------------------------

--
-- Structure de la table `salaries`
--

CREATE TABLE `salaries` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `identifiant` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `jour_de_travail` varchar(51) NOT NULL,
  `adresse` varchar(150) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `code_postal` int(10) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `telephone_secours` varchar(10) NOT NULL,
  `rang` int(1) NOT NULL,
  `actif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `salaries`
--

INSERT INTO `salaries` (`id`, `nom`, `prenom`, `identifiant`, `mot_de_passe`, `jour_de_travail`, `adresse`, `ville`, `code_postal`, `telephone`, `telephone_secours`, `rang`, `actif`) VALUES
(1, 'Vandenbroucke', 'audrey', 'audrey.bels@orange.fr', '$2y$10$4KZPa6IymIeOMlc6ZP9Ga.3oO8YSwiQiHosbAK9yYzh4zN4GCYCtC', 'mardi,jeudi,vendredi,samedi', 'route du parc 919', 'ST JANS CAPPEL', 59270, '0688270505', '0671736096', 1, 1),
(2, 'Decherf', 'Caroline', 'caroline', '$2y$10$.nigNEh/135XrpZBBrrrwOq50XLi7LcUk798OIgtcOMj4wjLdxdd2', 'lundi,samedi', '', 'Berthen', 59270, '', '', 1, 1),
(3, 'Docquois', 'Estelle', 'estelle', '$2y$10$S0y1HTHEiFdYCf9MdODk7.lSlDiBMH0k4GxBcqXs9PzjzatbRqs/W', 'mardi,jeudi,vendredi,samedi', '', 'Rexpoede', 0, '', '', 1, 1),
(4, 'admin', 'admin', 'admin', '$2y$10$dS0U6YalhF3mN.9R7jy3geKPFf3wsDw3TaK9KGZEwQfUmvzMBvGoS', '', '', 'Rexpoede', 0, '', '', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `visiteurs`
--

CREATE TABLE `visiteurs` (
  `date` varchar(150) NOT NULL,
  `n` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `visiteurs`
--

INSERT INTO `visiteurs` (`date`, `n`) VALUES
('2021-03-17', 39),
('2021-03-18', 3),
('2021-03-19', 2),
('2021-03-20', 5),
('2021-03-21', 3),
('2021-03-22', 4),
('2021-03-23', 4),
('2021-03-24', 5),
('2021-03-25', 3),
('2021-03-26', 16),
('2021-03-27', 4),
('2021-03-28', 2),
('2021-03-29', 2),
('2021-03-30', 11),
('2021-03-31', 2),
('2021-04-01', 1),
('2021-04-02', 3),
('2021-04-03', 2),
('2021-04-04', 4),
('2021-04-05', 3),
('2021-04-06', 5),
('2021-04-08', 6),
('2021-04-09', 4),
('2021-04-11', 1),
('2021-04-12', 5),
('2021-04-13', 2),
('2021-04-14', 1),
('2021-04-15', 2),
('2021-04-16', 5),
('2021-04-17', 4),
('2021-04-18', 3),
('2021-04-19', 1),
('2021-04-20', 9),
('2021-04-21', 2),
('2021-04-22', 5),
('2021-04-23', 6),
('2021-04-24', 1),
('2021-04-25', 3),
('2021-04-26', 5),
('2021-04-27', 4),
('2021-04-28', 19),
('2021-04-29', 8),
('2021-04-30', 12),
('2021-05-01', 2),
('2021-05-02', 5),
('2021-05-03', 7),
('2021-05-04', 14),
('2021-05-05', 12),
('2021-05-06', 5),
('2021-05-07', 1),
('2021-05-08', 1),
('2021-05-09', 1),
('2021-05-10', 4),
('2021-05-11', 3),
('2021-05-12', 1),
('2021-05-13', 9),
('2021-05-14', 1),
('2021-05-15', 5),
('2021-05-16', 5),
('2021-05-17', 6),
('2021-05-18', 6),
('2021-05-19', 10),
('2021-05-20', 4),
('2021-05-21', 7),
('2021-05-22', 2),
('2021-05-23', 6),
('2021-05-24', 6),
('2021-05-25', 18),
('2021-05-26', 7),
('2021-05-27', 9),
('2021-05-28', 8),
('2021-05-29', 9),
('2021-05-30', 1),
('2021-05-31', 3),
('2021-06-01', 4),
('2021-06-02', 3),
('2021-06-03', 5),
('2021-06-04', 3),
('2021-06-05', 2),
('2021-06-06', 4),
('2021-06-07', 5),
('2021-06-08', 5),
('2021-06-09', 1),
('2021-06-10', 3),
('2021-06-11', 4),
('2021-06-12', 6),
('2021-06-13', 1),
('2021-06-14', 4),
('2021-06-15', 21);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie_portfolio`
--
ALTER TABLE `categorie_portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personnalisation`
--
ALTER TABLE `personnalisation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie` (`categorie`);

--
-- Index pour la table `prestations`
--
ALTER TABLE `prestations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_salaries` (`id_salaries`);

--
-- Index pour la table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie_portfolio`
--
ALTER TABLE `categorie_portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `personnalisation`
--
ALTER TABLE `personnalisation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `prestations`
--
ALTER TABLE `prestations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `rdv`
--
ALTER TABLE `rdv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- AUTO_INCREMENT pour la table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `portfolio_ibfk_1` FOREIGN KEY (`categorie`) REFERENCES `categorie_portfolio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `rdv_ibfk_1` FOREIGN KEY (`id_salaries`) REFERENCES `salaries` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
