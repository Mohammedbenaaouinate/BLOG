-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 25 fév. 2024 à 18:02
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
-- Base de données : `pubp`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `ID` int(11) NOT NULL,
  `header` varchar(255) NOT NULL,
  `pub` text NOT NULL,
  `Date_pub` datetime NOT NULL,
  `User_ID` int(11) NOT NULL,
  `img_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`ID`, `header`, `pub`, `Date_pub`, `User_ID`, `img_path`) VALUES
(18, 'Comment l’intelligence artificielle va changer nos vies', 'À l’occasion du sommet sur l’intelligence artificielle qui se tient le jeudi 29 mars au Collège de France et à l’issue duquel le président de la République doit présenter la stratégie nationale dans ce domaine, (re)découvrez tous nos contenus sur cette technologie qui pourrait à terme « augmenter » presque chaque moment de notre vie. Reconnaissance faciale, assistant intelligent, voiture autonome, où en est l’intelligence artificielle ? Laisserons-nous ces systèmes interpréter nos scanners médicaux ou rendre la justice ? L\'automatisation du travail touchera-t-elle tout le monde ? Comment éviter les dérives éthiques ?', '2024-02-25 17:46:24', 27, 'img/55738539image1.jpg'),
(19, 'Comment profiter au maximum des avantages de la lecture ?', '\r\nPrivilégier un moment calme\r\nÉloignez votre esprit de toutes les perturbations de la vie quotidienne comme la télévision allumée, les cris des enfants ou l’envie irrésistible de suivre les réseaux sociaux. Il y a forcément un moment dans la journée qui soit propice, alors profitez-en. Ce peut être le soir avant de vous coucher, après le repas du midi ou dans un parc sous le bruissement des feuilles. À vous de choisir votre meilleur endroit. Évitez les lieux comme les transports en commun. Dans cet environnement bruyant et stressant, un livre ouvert permet certes de faire passer le temps, sans toutefois bénéficier des effets positifs de la lecture.\r\n\r\nS’installer dans un endroit confortable\r\nLa lecture est un plaisir intellectuel qui fait oublier le corps. Il est alors indispensable que vous trouviez une position où vous vous sentiez à l’aise. Allongez-vous sur votre lit, vautrez-vous sur un vieux fauteuil ou sur votre canapé. Vous pouvez ajouter quelques coussins derrière votre dos ou votre nuque pour ressentir un bien-être total. L’essentiel est de vous détendre pour profiter de ce petit moment que vous vous offrez', '2024-02-25 17:49:45', 27, 'img/83991824image2.jpg'),
(20, 'Football. Espagne ou Maroc ? Lamine Yamal, pépite du FC Barcelone, aurait fait son choix', '	\r\nIl vient à peine d’avoir 16 ans. Et pourtant, Lamine Yamal, attaquant du FC Barcelone, suscite déjà la convoitise des sélections marocaines et espagnoles. Plus jeune joueur de l’histoire à jouer un match de Liga, il pourrait également établir ce record de précocité avec la sélection espagnole dès la semaine prochaine lors de la trêve internationale.\r\n\r\nIl a choisi l’Espagne\r\nSelon Sport, le joueur né en Espagne et formé à la Macia, le centre d’entraînement des Blaugranas, a décidé de porter le maillot de la Roja et devrait être convoqué par Luis de la Fuente pour disputer les rencontres éliminatoires de l’Euro contre la Géorgie (8 septembre) et Chypre (12 septembre).\r\n\r\nPourtant, Walid Regragui, le sélectionneur du Maroc, a essayé de convaincre l’attaquant, dont le père est Marocain, de jouer pour les Lions de l’Atlas. Mais Lamine Yamal, qui est également éligible à la sélection de Guinée équatoriale, a décliné.', '2024-02-25 17:55:09', 28, 'img/985290606image3.avif'),
(21, 'Mohamed Boudrika dément être recherché par la Brigade nationale', 'Depuis quelques jours, Mohamed Boudrika fait l’objet de rumeurs selon lesquelles il serait recherché par la Brigade nationale. Le président du Raja Casablanca a tenu à mettre fin aux accusations émises à son encontre.\r\n\r\nMohamed Boudrika a été contraint de publier un communiqué suite à une rumeur lancée sur les réseaux sociaux par une page de supporters du Raja de Casablanca selon laquelle il serait recherché par la Brigade nationale.\r\n\r\nLe président du club vert est monté au créneau et a exprimé son mécontentement faisant état des fausses informations qui nuisent à sa réputation et celle de ses proches.\r\n\r\n“Ce qu’on voit sur les réseaux sociaux est douloureux et malheureux: lancer des rumeurs dans le but de faire le buzz, sans prendre en considération les conséquences de ces actes sur la personne et sur ses proches”, a-t-il regretté.\r\n\r\n“Une page proche des factions de supporters d’un des clubs a publié une information selon laquelle je fais l’objet d’un avis de recherche émis par la Brigade nationale. Je démens catégoriquement cette information”, a poursuivi le dirigeant rajaoui, avant de conclure :\r\n\r\n“A ma connaissance, il n’y a aucune plainte déposée contre moi auprès de la Brigade nationale. Et si c’est réellement le cas, je suis à leur disposition”.', '2024-02-25 17:57:51', 28, 'img/21747371image4.webp');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `ID_Article` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`ID`, `ID_User`, `ID_Article`, `comment`, `Date`) VALUES
(26, 28, 21, 'boudrika bon courage', '2024-02-25 17:59:31'),
(27, 28, 20, 'lamin 16 years old omg !!', '2024-02-25 18:00:12');

-- --------------------------------------------------------

--
-- Structure de la table `formulaire`
--

CREATE TABLE `formulaire` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `problem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `profil_image` varchar(255) NOT NULL,
  `Admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `Email`, `Fullname`, `profil_image`, `Admin`) VALUES
(27, 'mohammed', '1234', 'mohammedbenaaouinate18@gmail.com', 'mohammedbenaaouinate', '', 0),
(28, 'isam', '1234', 'isam@gmail.com', 'isam isam', '', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `article_ibfk_1` (`User_ID`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_constraint` (`ID_User`),
  ADD KEY `article_constraint` (`ID_Article`);

--
-- Index pour la table `formulaire`
--
ALTER TABLE `formulaire`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `formulaire`
--
ALTER TABLE `formulaire`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `article_constraint` FOREIGN KEY (`ID_Article`) REFERENCES `article` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_constraint` FOREIGN KEY (`ID_User`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
