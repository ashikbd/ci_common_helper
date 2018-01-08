-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.29-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table dev_artdata.language
CREATE TABLE IF NOT EXISTS `language` (
  `lang_id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_code` varchar(2) NOT NULL,
  `lang_name` varchar(30) NOT NULL,
  `lang_flag` varchar(60) NOT NULL,
  `lang_order` int(11) NOT NULL,
  `lang_status` tinyint(4) NOT NULL DEFAULT '1',
  `lang_createDate` datetime NOT NULL,
  `lang_updateDate` datetime NOT NULL,
  PRIMARY KEY (`lang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table dev_artdata.language: ~2 rows (approximately)
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` (`lang_id`, `lang_code`, `lang_name`, `lang_flag`, `lang_order`, `lang_status`, `lang_createDate`, `lang_updateDate`) VALUES
	(1, 'en', 'english', 'gb', 0, 1, '0000-00-00 00:00:00', '2015-04-01 06:27:58'),
	(2, 'it', 'italian', 'it', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `language` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
