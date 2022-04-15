-- --------------------------------------------------------
-- Host:                         apontejaj.com
-- Server version:               8.0.28-0ubuntu0.20.04.3 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for securesystems
DROP DATABASE IF EXISTS `securesystems`;
CREATE DATABASE IF NOT EXISTS `securesystems` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `securesystems`;

-- Dumping structure for table securesystems.forum
DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(50) DEFAULT NULL,
  `post` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table securesystems.forum: ~10 rows (approximately)
/*!40000 ALTER TABLE `forum` DISABLE KEYS */;
INSERT INTO `forum` (`date_posted`, `author`, `post`) VALUES
	('2022-04-10 19:29:17', 'Amilcar', 'This is one post. Really interesting info.'),
	('2022-04-10 19:29:49', 'Eoin ', 'Secure systems is the most important topic of your MSc.'),
	('2022-04-10 19:30:54', 'TUD', 'Technologica University Dublin is the best college ever,'),
	('2022-04-10 19:41:54', 'Amilcar', 'This is info that is being displayed in the forum'),
	('2022-04-10 20:29:29', 'Amilcar', 'Testing');
/*!40000 ALTER TABLE `forum` ENABLE KEYS */;

-- Dumping structure for table securesystems.hidden_table
DROP TABLE IF EXISTS `hidden_table`;
CREATE TABLE IF NOT EXISTS `hidden_table` (
  `id` int DEFAULT NULL,
  `content` varchar(250) DEFAULT NULL,
  `more_content` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table securesystems.hidden_table: ~2 rows (approximately)
/*!40000 ALTER TABLE `hidden_table` DISABLE KEYS */;
INSERT INTO `hidden_table` (`id`, `content`, `more_content`) VALUES
	(1, 'Secret Content', 'More secret content'),
	(2, 'You shouldn\'t see this', 'Forget about it');
/*!40000 ALTER TABLE `hidden_table` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
