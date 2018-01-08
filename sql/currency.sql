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

-- Dumping structure for table dev_artdata.currency
CREATE TABLE IF NOT EXISTS `currency` (
  `currency_id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(25) DEFAULT NULL,
  `currency_code` varchar(5) DEFAULT NULL,
  `currency_symbol` varchar(45) DEFAULT NULL,
  `currency_order` int(11) NOT NULL,
  `currency_createDate` datetime DEFAULT NULL,
  `currency_status` tinyint(4) DEFAULT NULL,
  `currency_updateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`currency_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table dev_artdata.currency: ~2 rows (approximately)
/*!40000 ALTER TABLE `currency` DISABLE KEYS */;
INSERT INTO `currency` (`currency_id`, `currency_name`, `currency_code`, `currency_symbol`, `currency_order`, `currency_createDate`, `currency_status`, `currency_updateDate`) VALUES
	(1, 'US Dollar', 'USD', '$', 2, '2015-03-31 22:59:18', 1, '2015-05-07 08:15:27'),
	(2, 'Euro', 'EUR', '€', 1, '2015-05-07 08:15:19', 1, NULL);
/*!40000 ALTER TABLE `currency` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
