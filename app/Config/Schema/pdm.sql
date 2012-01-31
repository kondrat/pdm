# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.1.40-community
# Server OS:                    Win32
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2012-01-31 19:51:27
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

# Dumping database structure for pdm
DROP DATABASE IF EXISTS `pdm`;
CREATE DATABASE IF NOT EXISTS `pdm` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `pdm`;


# Dumping structure for table pdm.items
DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` varchar(36) NOT NULL DEFAULT '',
  `tray_id` varchar(36) NOT NULL DEFAULT '',
  `drwnbr` varchar(36) NOT NULL DEFAULT '',
  `name` varchar(36) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table pdm.items: 6 rows
DELETE FROM `items`;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` (`id`, `tray_id`, `drwnbr`, `name`, `created`, `modified`) VALUES
	('4f21592e-4800-4ffc-ba89-0ca89be3e0a3', '5', 'A000', 'New Just Test 7', '2012-01-26 13:46:22', '2012-01-29 06:39:26'),
	('4f215754-3604-4a4f-a704-0ca89be3e0a3', '8', 'A000', 'New Just Test 541', '2012-01-26 13:38:28', '2012-01-26 13:59:03'),
	('4f214b57-fc4c-4095-9d9f-0ca89be3e0a3', '8', 'A_000_0_1899_200_a00', 'new Item', '2012-01-26 12:47:19', '2012-01-29 06:31:21'),
	('4f24e901-0e98-44c5-a451-0ca89be3e0a3', '5', 'B_000_0_C00', 'New Just Test 61', '2012-01-29 06:36:49', '2012-01-29 06:36:49'),
	('4f24ecbb-3ca4-4fe4-804a-0ca89be3e0a3', '6', 'B_000_0_G00', 'New Just Test 52', '2012-01-29 06:52:43', '2012-01-29 07:46:04'),
	('4f251285-dd24-457a-b190-0ca89be3e0a3', '3', 'A_000_0_1899_200_a01', 'New Just Test 63', '2012-01-29 09:33:57', '2012-01-29 09:33:57');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;


# Dumping structure for table pdm.items_groups
DROP TABLE IF EXISTS `items_groups`;
CREATE TABLE IF NOT EXISTS `items_groups` (
  `id` varchar(36) NOT NULL DEFAULT '',
  `number` varchar(36) DEFAULT NULL,
  `name` varchar(36) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

# Dumping data for table pdm.items_groups: 0 rows
DELETE FROM `items_groups`;
/*!40000 ALTER TABLE `items_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `items_groups` ENABLE KEYS */;


# Dumping structure for table pdm.items_items
DROP TABLE IF EXISTS `items_items`;
CREATE TABLE IF NOT EXISTS `items_items` (
  `id` varchar(36) NOT NULL DEFAULT '',
  `item_id` varchar(36) DEFAULT NULL,
  `sub_item_id` varchar(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table pdm.items_items: 3 rows
DELETE FROM `items_items`;
/*!40000 ALTER TABLE `items_items` DISABLE KEYS */;
INSERT INTO `items_items` (`id`, `item_id`, `sub_item_id`) VALUES
	('4f215c27-c0b0-4b09-8eb1-0ca89be3e0a3', '4f215754-3604-4a4f-a704-0ca89be3e0a3', '4f21592e-4800-4ffc-ba89-0ca89be3e0a3'),
	('4f24f93c-eaf4-42b7-9fc5-0ca89be3e0a3', '4f24ecbb-3ca4-4fe4-804a-0ca89be3e0a3', '4f21592e-4800-4ffc-ba89-0ca89be3e0a3'),
	('4f24f93c-f51c-490e-a623-0ca89be3e0a3', '4f24ecbb-3ca4-4fe4-804a-0ca89be3e0a3', '4f215754-3604-4a4f-a704-0ca89be3e0a3');
/*!40000 ALTER TABLE `items_items` ENABLE KEYS */;


# Dumping structure for table pdm.items_projects
DROP TABLE IF EXISTS `items_projects`;
CREATE TABLE IF NOT EXISTS `items_projects` (
  `id` varchar(36) NOT NULL DEFAULT '',
  `item_id` varchar(36) DEFAULT NULL,
  `project_id` varchar(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

# Dumping data for table pdm.items_projects: 0 rows
DELETE FROM `items_projects`;
/*!40000 ALTER TABLE `items_projects` DISABLE KEYS */;
/*!40000 ALTER TABLE `items_projects` ENABLE KEYS */;


# Dumping structure for table pdm.item_types
DROP TABLE IF EXISTS `item_types`;
CREATE TABLE IF NOT EXISTS `item_types` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

# Dumping data for table pdm.item_types: ~6 rows (approximately)
DELETE FROM `item_types`;
/*!40000 ALTER TABLE `item_types` DISABLE KEYS */;
INSERT INTO `item_types` (`id`, `name`, `created`, `modified`) VALUES
	(1, 'Assy', '2012-01-26 10:32:48', '2012-01-31 15:49:42'),
	(2, 'Part', '2012-01-26 10:33:00', '2012-01-31 15:50:03'),
	(3, 'Std', '2012-01-26 10:33:20', '2012-01-29 22:34:38'),
	(6, 'EQpart', '2012-01-29 11:43:06', '2012-01-29 21:25:03'),
	(10, NULL, '2012-01-29 21:46:39', '2012-01-29 21:46:39'),
	(11, NULL, '2012-01-29 21:46:57', '2012-01-29 21:46:57');
/*!40000 ALTER TABLE `item_types` ENABLE KEYS */;


# Dumping structure for table pdm.projects
DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` varchar(36) NOT NULL DEFAULT '',
  `projectname` varchar(256) DEFAULT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

# Dumping data for table pdm.projects: ~4 rows (approximately)
DELETE FROM `projects`;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` (`id`, `projectname`, `description`, `created`, `modified`) VALUES
	('4f0c0427-8918-46fe-9f1a-0b089be3e0a3', 'ss-113', 'sdf sadf sadf', '2012-01-10 09:25:59', '2012-01-10 11:10:07'),
	('4f0c1654-a998-4068-ad63-0b089be3e0a3', 'TT-909', 'New description ', '2012-01-10 10:43:32', '2012-01-11 11:15:36'),
	('4f0c1c04-e580-45b7-a5b2-0b089be3e0a3', 'TT-118', 'test is just. hello 33', '2012-01-10 11:07:48', '2012-01-11 11:14:28'),
	('4f0d6f8a-2218-4903-9e09-0b089be3e0a3', 'TT-222', 'Just a tt 222', '2012-01-11 11:16:26', '2012-01-11 11:16:26');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;


# Dumping structure for table pdm.project_plans
DROP TABLE IF EXISTS `project_plans`;
CREATE TABLE IF NOT EXISTS `project_plans` (
  `id` varchar(36) NOT NULL DEFAULT '',
  `project_id` varchar(256) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `location` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

# Dumping data for table pdm.project_plans: ~4 rows (approximately)
DELETE FROM `project_plans`;
/*!40000 ALTER TABLE `project_plans` DISABLE KEYS */;
INSERT INTO `project_plans` (`id`, `project_id`, `name`, `location`, `created`, `modified`) VALUES
	('4f0c326b-fe98-459e-89a0-0b089be3e0a3', '4f0c0427-8918-46fe-9f1a-0b089be3e0a3', 'PP-Name01', 'get it 33', '2012-01-10 12:43:23', '2012-01-11 11:13:50'),
	('4f0c33f0-5be4-47e9-8cb8-0b089be3e0a3', '4f0c0427-8918-46fe-9f1a-0b089be3e0a3', 'prom ', 'brom', '2012-01-10 12:49:52', '2012-01-10 13:54:00'),
	('4f0c38d0-424c-442c-bb17-0b089be3e0a3', '4f0c1c04-e580-45b7-a5b2-0b089be3e0a3', 'what', 'novij povorot', '2012-01-10 13:10:40', '2012-01-10 13:54:10'),
	('4f27e117-b674-476e-9d91-0ca89be3e0a3', '4f0c0427-8918-46fe-9f1a-0b089be3e0a3', 'Hey', 'To del', '2012-01-31 12:39:51', '2012-01-31 12:39:51');
/*!40000 ALTER TABLE `project_plans` ENABLE KEYS */;


# Dumping structure for table pdm.trays
DROP TABLE IF EXISTS `trays`;
CREATE TABLE IF NOT EXISTS `trays` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT '',
  `item_type_id` int(10) DEFAULT NULL,
  `project_id` int(10) DEFAULT NULL,
  `ata_code` char(5) DEFAULT NULL,
  `ata_cache` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

# Dumping data for table pdm.trays: 23 rows
DELETE FROM `trays`;
/*!40000 ALTER TABLE `trays` DISABLE KEYS */;
INSERT INTO `trays` (`id`, `parent_id`, `lft`, `rght`, `name`, `item_type_id`, `project_id`, `ata_code`, `ata_cache`, `created`, `modified`) VALUES
	(1, NULL, 1, 58, 'Root Trd', 0, NULL, NULL, NULL, NULL, NULL),
	(2, 1, 2, 53, 'Rifles', 1, NULL, 'R', NULL, NULL, '2012-01-31 06:04:30'),
	(3, 2, 3, 16, 'Barrels', 1, NULL, '1', NULL, NULL, '2012-01-30 13:53:41'),
	(5, 3, 6, 15, 'Muzzle breaks', 1, NULL, '4', NULL, NULL, '2012-01-31 15:46:11'),
	(6, 2, 17, 48, 'Actions', 1, NULL, NULL, NULL, NULL, NULL),
	(7, 6, 18, 27, 'Resivers', 1, NULL, '1', NULL, NULL, '2012-01-31 15:49:42'),
	(8, 6, 28, 47, 'Bolts', 1, NULL, '', NULL, NULL, '2012-01-29 22:31:35'),
	(9, 1, 54, 57, 'Tools', 0, NULL, NULL, NULL, NULL, NULL),
	(10, 9, 55, 56, 'Crabs', 0, NULL, NULL, NULL, NULL, NULL),
	(28, 2, 49, 50, 'Stocks', 1, NULL, '', NULL, NULL, '2012-01-29 21:47:54'),
	(29, 8, 29, 30, 'Bolt', 2, NULL, NULL, NULL, NULL, NULL),
	(30, 8, 31, 32, 'Bolt sleeve', 2, NULL, NULL, NULL, NULL, NULL),
	(32, 8, 33, 34, 'Bolt clamp', 2, NULL, '', NULL, NULL, '2012-01-29 22:33:17'),
	(27, 3, 4, 5, 'Barrels', 2, NULL, '3', NULL, NULL, '2012-01-31 15:45:09'),
	(36, 7, 19, 20, 'Handle limit', 2, NULL, NULL, NULL, NULL, NULL),
	(34, 8, 37, 38, 'Bolt stop', 2, NULL, '', NULL, NULL, '2012-01-29 22:33:07'),
	(33, 8, 35, 36, 'Firing Pin', 2, NULL, '', NULL, NULL, '2012-01-29 22:32:59'),
	(39, 7, 21, 22, 'Thread insert', 2, NULL, NULL, NULL, NULL, NULL),
	(38, 5, 9, 10, 'Nut', 2, NULL, '2', NULL, NULL, '2012-01-30 13:55:21'),
	(37, 5, 7, 8, 'Muzzle break', 2, NULL, '3', NULL, NULL, '2012-01-31 15:46:21'),
	(40, 7, 23, 24, 'Resivers', 2, NULL, NULL, NULL, NULL, NULL),
	(44, 2, 51, 52, 'biPods', 3, NULL, '', NULL, NULL, '2012-01-29 22:34:38'),
	(58, 8, 39, 44, 'to del', 1, NULL, NULL, '', '2012-01-31 15:31:15', '2012-01-31 15:31:15'),
	(62, 5, 11, 14, 'Just ro tel', 1, NULL, '8', '148', '2012-01-31 15:48:00', '2012-01-31 15:48:00'),
	(59, 8, 45, 46, 'to del', 1, NULL, NULL, '', '2012-01-31 15:31:43', '2012-01-31 15:31:43'),
	(60, 58, 40, 43, 'hz1', 1, NULL, NULL, '', '2012-01-31 15:32:04', '2012-01-31 15:32:04'),
	(61, 60, 41, 42, 'hz2', 1, NULL, NULL, '', '2012-01-31 15:32:15', '2012-01-31 15:32:15'),
	(63, 62, 12, 13, 'More just rotel', 2, NULL, NULL, '148', '2012-01-31 15:48:29', '2012-01-31 15:48:29'),
	(64, 7, 25, 26, 'fsdg 234', 2, NULL, '9', '19', '2012-01-31 15:50:03', '2012-01-31 15:50:03');
/*!40000 ALTER TABLE `trays` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
