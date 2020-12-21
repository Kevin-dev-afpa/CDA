----------------------------- // Creation de la base de donnée // ------------------------------------

DROP DATABASE IF EXISTS papyrus
CREATE DATABASE papyrus
USE DATABASE papyrus

----------------------------- // Mise en place des tables // ------------------------------------

-- --------------------------------------------------------

--
-- Structure de la table `Entcom`
--

CREATE TABLE `Entcom` (
  `NUMCOM` int NOT NULL,
  `DATCOM` date NOT NULL,
  `NUMFOU` varchar(25) DEFAULT NULL,
  `OBSCOM` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `figure`
--

CREATE TABLE `figure` (
  `NUMLIG` smallint NOT NULL,
  `NUMCOM` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Fournis`
--

CREATE TABLE `Fournis` (
  `NUMFOU` varchar(25) NOT NULL,
  `NOMFOU` varchar(25) NOT NULL,
  `RUEFOU` varchar(50) NOT NULL,
  `POSFOU` varchar(5) NOT NULL,
  `VILFOU` varchar(30) NOT NULL,
  `CONFOU` varchar(15) NOT NULL,
  `SATISF` smallint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Ligcom`
--

CREATE TABLE `Ligcom` (
  `NUMLIG` smallint NOT NULL,
  `QTECDE` smallint NOT NULL,
  `PRIUNI` varchar(50) NOT NULL,
  `QTELIV` smallint DEFAULT NULL,
  `DERLIV` datetime NOT NULL,
  `NUMCOM` smallint NOT NULL,
  `CODART` varchar(4) NOT NULL,
  `CODART_1` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `passe`
--

CREATE TABLE `passe` (
  `NUMCOM` int NOT NULL,
  `NUMFOU` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Produit`
--

CREATE TABLE `Produit` (
  `CODART` varchar(4) NOT NULL,
  `LIBART` varchar(30) NOT NULL,
  `STKALE` smallint NOT NULL,
  `STKPHY` smallint NOT NULL,
  `QTEANN` smallint NOT NULL,
  `UNIMES` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Vente`
--

CREATE TABLE `Vente` (
  `CODART_1` varchar(4) NOT NULL,
  `NUMFOU_1` varchar(25) NOT NULL,
  `DELLIV` smallint NOT NULL,
  `QTE1` smallint NOT NULL,
  `PRIX1` varchar(50) NOT NULL,
  `QTE2` smallint DEFAULT NULL,
  `PRIX2` varchar(50) DEFAULT NULL,
  `QTE3` smallint DEFAULT NULL,
  `PRIX3` varchar(50) DEFAULT NULL,
  `NUMFOU` varchar(25) NOT NULL,
  `CODART` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Entcom`
--
ALTER TABLE `Entcom`
  ADD PRIMARY KEY (`NUMCOM`);

--
-- Index pour la table `figure`
--
ALTER TABLE `figure`
  ADD PRIMARY KEY (`NUMLIG`,`NUMCOM`),
  ADD KEY `NUMCOM` (`NUMCOM`);

--
-- Index pour la table `Fournis`
--
ALTER TABLE `Fournis`
  ADD PRIMARY KEY (`NUMFOU`);

--
-- Index pour la table `Ligcom`
--
ALTER TABLE `Ligcom`
  ADD PRIMARY KEY (`NUMLIG`),
  ADD KEY `CODART_1` (`CODART_1`);

--
-- Index pour la table `passe`
--
ALTER TABLE `passe`
  ADD PRIMARY KEY (`NUMCOM`,`NUMFOU`),
  ADD KEY `NUMFOU` (`NUMFOU`);

--
-- Index pour la table `Produit`
--
ALTER TABLE `Produit`
  ADD PRIMARY KEY (`CODART`);

--
-- Index pour la table `Vente`
--
ALTER TABLE `Vente`
  ADD PRIMARY KEY (`CODART_1`,`NUMFOU_1`),
  ADD KEY `NUMFOU_1` (`NUMFOU_1`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Entcom`
--
ALTER TABLE `Entcom`
  MODIFY `NUMCOM` int NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `figure`
--
ALTER TABLE `figure`
  ADD CONSTRAINT `figure_ibfk_1` FOREIGN KEY (`NUMLIG`) REFERENCES `Ligcom` (`NUMLIG`),
  ADD CONSTRAINT `figure_ibfk_2` FOREIGN KEY (`NUMCOM`) REFERENCES `Entcom` (`NUMCOM`);

--
-- Contraintes pour la table `Ligcom`
--
ALTER TABLE `Ligcom`
  ADD CONSTRAINT `Ligcom_ibfk_1` FOREIGN KEY (`CODART_1`) REFERENCES `Produit` (`CODART`);

--
-- Contraintes pour la table `passe`
--
ALTER TABLE `passe`
  ADD CONSTRAINT `passe_ibfk_1` FOREIGN KEY (`NUMCOM`) REFERENCES `Entcom` (`NUMCOM`),
  ADD CONSTRAINT `passe_ibfk_2` FOREIGN KEY (`NUMFOU`) REFERENCES `Fournis` (`NUMFOU`);

--
-- Contraintes pour la table `Vente`
--
ALTER TABLE `Vente`
  ADD CONSTRAINT `Vente_ibfk_1` FOREIGN KEY (`CODART_1`) REFERENCES `Produit` (`CODART`),
  ADD CONSTRAINT `Vente_ibfk_2` FOREIGN KEY (`NUMFOU_1`) REFERENCES `Fournis` (`NUMFOU`);
COMMIT;