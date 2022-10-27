-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 20 juil. 2022 à 03:59
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_ziyad`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

CREATE TABLE `candidat` (
  `id` int(11) NOT NULL,
  `NOM` varchar(255) NOT NULL,
  `PRENOM` varchar(255) NOT NULL,
  `MAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `FILIERE` varchar(255) NOT NULL,
  `ECOLE` varchar(255) NOT NULL,
  `DATE` varchar(255) NOT NULL,
  `ANNEE` varchar(255) NOT NULL,
  `CIN` varchar(255) NOT NULL,
  `CV` varchar(255) NOT NULL,
  `DEMANDE` varchar(255) NOT NULL,
  `LETTRE` varchar(255) NOT NULL,
  `PHOTO` varchar(255) NOT NULL DEFAULT 'images/Person.jpg',
  `STATUS` varchar(255) NOT NULL DEFAULT 'traitement'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `candidat`
--

INSERT INTO `candidat` (`id`, `NOM`, `PRENOM`, `MAIL`, `PASSWORD`, `FILIERE`, `ECOLE`, `DATE`, `ANNEE`, `CIN`, `CV`, `DEMANDE`, `LETTRE`, `PHOTO`, `STATUS`) VALUES
(5, 'baya', 'ziyad', 'chihabjoke@gmail.com', '', 'GI', 'EHTP', '2022-07-08', '12', '', '', '', '', 'images/Person.jpg', 'traitement'),
(6, 'baya', 'ziyad', 'ziyadbaya2000@gmail.com', '', 'GI', 'EHTP', '2022-07-15', '13', '', '', '', '', 'images/Person.jpg', 'traitement'),
(7, 'aaa', 'ziyad', '85a9315bb4@catdogmail.live', '', '', '', '', '12', 'IMG_0111_filtered.jpg', '', '', '', 'images/Person.jpg', 'traitement'),
(8, 'baya', 'azdza', 'chihab.baya@usmba.ac.ma', '', 'GI', 'EHTP', '2022-07-04', '13', 'IMG_0111_filtered.jpg', 'PXL_20220714_192954796-DeNoiseAI-clear.jpeg', 'PXL_20220714_192954796-DeNoiseAI-clear.jpeg', 'PXL_20220714_192954796-DeNoiseAI-clear-Modifier.tif', 'images/Person.jpg', 'traitement'),
(9, 'baya', 'ziyad', 'ziyadin@gmail.com', '', 'GI', 'EHTP', '2022-07-13', '13', 'PXL_20220714_192954796-DeNoiseAI-clear.jpeg', 'IMG_0111_filtered.jpg', 'IMG_0111_filtered.jpg', 'IMG_0111_filtered.jpg', 'images/Person.jpg', 'accepte'),
(10, 'chiko', 'salam', 'test@gmail.com', '', 'ge', 'emi', '2022-07-21', '12', 'photoshoq.jpg', 'PXL_20210806_190534349.jpg', '00000PORTRAIT_00000_BURST20190604234317116-DeNoiseAI-clear-Modifier.tif', '00000PORTRAIT_00000_BURST20190604234317116-DeNoiseAI-clear.jpg', 'IMG_0316.JPG', 'traitement'),
(11, 'ppp', 'lolo', 'test1@gmail.com', '', 'lol', 'mpo', '2022-07-16', '13', 'images/IMG_20190501_163832-Modifier.jpg', 'images/IMG_20190501_163832-Modifier.jpg', 'images/PXL_20220629_184251371-Modifier.jpg', 'images/PXL_20220626_170127702-Modifier.jpg', 'images/photoshoq.jpg', 'traitement');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`) VALUES
(10, 'chihabjoke@gmail.com', '74b87337454200d4d33f80c4663dc5e5', 'admin'),
(11, 'ziyadbaya2000@gmail.com', '74b87337454200d4d33f80c4663dc5e5', 'user'),
(12, '85a9315bb4@catdogmail.live', 'd7ee79f732135679d44c8252a5b3c9b8', 'user'),
(13, 'chihab.baya@usmba.ac.ma', '594f803b380a41396ed63dca39503542', 'user'),
(14, 'ziyadin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin'),
(15, 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user'),
(16, 'test1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `candidat`
--
ALTER TABLE `candidat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
