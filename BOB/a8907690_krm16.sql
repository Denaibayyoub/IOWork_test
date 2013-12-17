SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a8907690_krm16`
--

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `age` int(2) NOT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `Formation` varchar(20) NOT NULL,
  `Hebergement` varchar(20) NOT NULL,
  PRIMARY KEY (`nom`,`prenom`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
