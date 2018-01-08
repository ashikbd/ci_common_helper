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

-- Dumping structure for table dev_artdata.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL COMMENT 'login email',
  `user_password` varchar(60) NOT NULL COMMENT 'Blowfish algorithm will be used',
  `user_dob` date NOT NULL,
  `user_displayName` varchar(200) NOT NULL,
  `user_image` varchar(250) NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `city_id` int(10) unsigned NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_place` varchar(250) NOT NULL,
  `user_zip_code` varchar(20) NOT NULL,
  `user_latitude` varchar(50) NOT NULL,
  `user_longitude` varchar(50) NOT NULL,
  `user_currency` varchar(20) NOT NULL,
  `user_company` varchar(100) NOT NULL COMMENT 'compay name if reg type is company',
  `user_phone` varchar(50) NOT NULL,
  `user_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `user_createDate` datetime NOT NULL,
  `user_updateDate` datetime NOT NULL,
  `user_currencyCode` varchar(5) NOT NULL
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
