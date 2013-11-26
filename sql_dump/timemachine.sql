# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.13)
# Database: timemachine
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table clockinouts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `clockinouts`;

CREATE TABLE `clockinouts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `clockinouts` WRITE;
/*!40000 ALTER TABLE `clockinouts` DISABLE KEYS */;

INSERT INTO `clockinouts` (`id`, `employee_id`, `start`, `end`)
VALUES
	(1,1,'2013-10-18 00:40:44','2013-10-18 00:42:03'),
	(2,1,'2013-10-18 00:40:44','2013-10-18 00:43:05'),
	(3,1,'2013-10-18 00:43:17','2013-10-18 00:44:36'),
	(4,1,'2013-10-18 00:45:37','2013-10-18 00:46:42'),
	(5,1,'2013-10-18 00:48:13','2013-10-18 00:48:54'),
	(6,1,'2013-10-18 00:59:04','2013-10-18 01:04:01'),
	(7,1,'2013-10-18 01:07:11','2013-10-18 01:11:32'),
	(8,1,'2013-10-18 01:11:41','2013-10-18 01:22:43'),
	(9,1,'2013-10-18 01:23:03','2013-10-18 01:45:18'),
	(10,2,'2013-10-18 01:44:41','2013-10-18 01:45:29'),
	(11,1,'2013-10-18 01:46:53','2013-10-18 08:13:26'),
	(12,1,'2013-10-18 08:14:38','2013-10-18 08:19:21'),
	(13,2,'2013-10-18 08:15:03',NULL),
	(14,1,'2013-10-18 08:19:45','2013-10-18 08:20:37');

/*!40000 ALTER TABLE `clockinouts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table employees
# ------------------------------------------------------------

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT '0' COMMENT '1=admin,0=non-admin',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `is_admin`)
VALUES
	(1,'Admin','istrator',1),
	(2,'John','Doe',0),
	(3,'Jane','Smith',0);

/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
