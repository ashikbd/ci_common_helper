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

-- Dumping structure for table dev_artdata.continent
CREATE TABLE IF NOT EXISTS `continent` (
  `continent_id` int(11) NOT NULL AUTO_INCREMENT,
  `continent_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `continent_createDate` datetime DEFAULT NULL,
  `continent_createdBy` int(11) DEFAULT NULL,
  `continent_createdFrom` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `continent_updateDate` datetime NOT NULL,
  `continent_updatedBy` int(11) DEFAULT NULL,
  `continent_updatedFrom` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `continent_status` tinyint(2) DEFAULT '1' COMMENT '0=inactive; 1=active',
  PRIMARY KEY (`continent_id`),
  FULLTEXT KEY `continent_name` (`continent_name`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev_artdata.continent: 10 rows
/*!40000 ALTER TABLE `continent` DISABLE KEYS */;
INSERT INTO `continent` (`continent_id`, `continent_name`, `continent_createDate`, `continent_createdBy`, `continent_createdFrom`, `continent_updateDate`, `continent_updatedBy`, `continent_updatedFrom`, `continent_status`) VALUES
	(1, 'Asia', '2013-10-07 13:24:04', 1, '127.0.0.1', '0000-00-00 00:00:00', 7, '62.48.59.57', 1),
	(2, 'Europe', '2013-10-07 13:24:04', 1, '127.0.0.1', '0000-00-00 00:00:00', 7, '62.48.59.57', 1),
	(3, 'Africa', '2013-10-07 13:24:04', 1, '127.0.0.1', '0000-00-00 00:00:00', 7, '62.48.59.57', 1),
	(4, 'North America', '2013-10-07 13:24:04', 1, '127.0.0.1', '0000-00-00 00:00:00', 7, '62.18.147.205', 1),
	(5, 'South America', '2013-10-07 13:24:04', 1, '127.0.0.1', '0000-00-00 00:00:00', 7, '62.48.59.57', 1),
	(6, 'Antarctica', '2013-10-07 13:24:04', 1, '127.0.0.1', '0000-00-00 00:00:00', 7, '62.48.59.57', 1),
	(7, 'Central America', '2013-11-07 05:45:40', 1, '::1', '0000-00-00 00:00:00', 7, '62.48.59.57', 1),
	(8, 'Caribbean', '2013-11-07 05:46:41', 1, '::1', '0000-00-00 00:00:00', 14, '188.217.90.97', 1),
	(9, 'Middle East', '2013-11-07 05:47:23', 1, '::1', '0000-00-00 00:00:00', 7, '62.48.59.57', 1),
	(10, 'Pacific', '2013-11-07 05:48:14', 1, '::1', '0000-00-00 00:00:00', 7, '62.48.59.57', 1);
/*!40000 ALTER TABLE `continent` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
