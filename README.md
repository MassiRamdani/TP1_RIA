# TP1_RIA
  

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbprix`
--

-- --------------------------------------------------------

--
-- Structure de la table `evolutions`
--

DROP TABLE IF EXISTS `evolutions`;
CREATE TABLE IF NOT EXISTS `evolutions` (
  `id_evo` int(11) NOT NULL COMMENT 'clé',
  `id_produit` int(11) NOT NULL COMMENT 'clé étrangère',
  `date_up` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date de maj',
  `prix` float NOT NULL COMMENT 'prix maj'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
