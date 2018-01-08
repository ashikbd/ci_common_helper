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

-- Dumping structure for table dev_artdata.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `set_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `set_value` text COLLATE utf8_unicode_ci NOT NULL,
  `settings_updateDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev_artdata.settings: ~33 rows (approximately)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`set_name`, `set_value`, `settings_updateDate`) VALUES
	('currency_code', 'EUR', '2017-02-20 09:59:24'),
	('email_protocol', 'mail', '2016-09-20 13:23:52'),
	('smtp_host', '10.12', '2016-09-20 13:23:52'),
	('smtp_user', '1', '2016-09-20 13:23:52'),
	('smtp_pass', '1', '2016-09-20 13:23:52'),
	('smtp_port', '1', '2016-09-20 13:23:52'),
	('email_from', 'info@example.com', '2016-09-20 13:23:52'),
	('email_from_name', 'Site Name', '2016-09-20 13:23:52')
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
