-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.1.40-community - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2012-03-28 19:25:08
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for pdm
DROP DATABASE IF EXISTS `pdm`;
CREATE DATABASE IF NOT EXISTS `pdm` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `pdm`;


-- Dumping structure for table pdm.items
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

-- Dumping data for table pdm.items: 6 rows
DELETE FROM `items`;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` (`id`, `tray_id`, `drwnbr`, `name`, `created`, `modified`) VALUES
	('4f21592e-4800-4ffc-ba89-0ca89be3e0a3', '2', 'A000', 'New Just Test 7', '2012-01-26 13:46:22', '2012-01-29 06:39:26'),
	('4f215754-3604-4a4f-a704-0ca89be3e0a3', '2', 'A000', 'New Just Test 541', '2012-01-26 13:38:28', '2012-01-26 13:59:03'),
	('4f214b57-fc4c-4095-9d9f-0ca89be3e0a3', '8', 'A_000_0_1899_200_a00', 'new Item', '2012-01-26 12:47:19', '2012-01-29 06:31:21'),
	('4f24e901-0e98-44c5-a451-0ca89be3e0a3', '5', 'B_000_0_C00', 'New Just Test 61', '2012-01-29 06:36:49', '2012-01-29 06:36:49'),
	('4f24ecbb-3ca4-4fe4-804a-0ca89be3e0a3', '6', 'B_000_0_G00', 'New Just Test 52', '2012-01-29 06:52:43', '2012-01-29 07:46:04'),
	('4f251285-dd24-457a-b190-0ca89be3e0a3', '3', 'A_000_0_1899_200_a01', 'New Just Test 63', '2012-01-29 09:33:57', '2012-01-29 09:33:57');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;


-- Dumping structure for table pdm.items_groups
DROP TABLE IF EXISTS `items_groups`;
CREATE TABLE IF NOT EXISTS `items_groups` (
  `id` varchar(36) NOT NULL DEFAULT '',
  `number` varchar(36) DEFAULT NULL,
  `name` varchar(36) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table pdm.items_groups: 0 rows
DELETE FROM `items_groups`;
/*!40000 ALTER TABLE `items_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `items_groups` ENABLE KEYS */;


-- Dumping structure for table pdm.items_items
DROP TABLE IF EXISTS `items_items`;
CREATE TABLE IF NOT EXISTS `items_items` (
  `id` varchar(36) NOT NULL DEFAULT '',
  `item_id` varchar(36) DEFAULT NULL,
  `sub_item_id` varchar(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table pdm.items_items: 3 rows
DELETE FROM `items_items`;
/*!40000 ALTER TABLE `items_items` DISABLE KEYS */;
INSERT INTO `items_items` (`id`, `item_id`, `sub_item_id`) VALUES
	('4f215c27-c0b0-4b09-8eb1-0ca89be3e0a3', '4f215754-3604-4a4f-a704-0ca89be3e0a3', '4f21592e-4800-4ffc-ba89-0ca89be3e0a3'),
	('4f24f93c-eaf4-42b7-9fc5-0ca89be3e0a3', '4f24ecbb-3ca4-4fe4-804a-0ca89be3e0a3', '4f21592e-4800-4ffc-ba89-0ca89be3e0a3'),
	('4f24f93c-f51c-490e-a623-0ca89be3e0a3', '4f24ecbb-3ca4-4fe4-804a-0ca89be3e0a3', '4f215754-3604-4a4f-a704-0ca89be3e0a3');
/*!40000 ALTER TABLE `items_items` ENABLE KEYS */;


-- Dumping structure for table pdm.items_projects
DROP TABLE IF EXISTS `items_projects`;
CREATE TABLE IF NOT EXISTS `items_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` varchar(36) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table pdm.items_projects: 1 rows
DELETE FROM `items_projects`;
/*!40000 ALTER TABLE `items_projects` DISABLE KEYS */;
INSERT INTO `items_projects` (`id`, `item_id`, `project_id`) VALUES
	(1, '4f21592e-4800-4ffc-ba89-0ca89be3e0a3', 1);
/*!40000 ALTER TABLE `items_projects` ENABLE KEYS */;


-- Dumping structure for table pdm.item_types
DROP TABLE IF EXISTS `item_types`;
CREATE TABLE IF NOT EXISTS `item_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `suffix` varchar(256) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table pdm.item_types: ~4 rows (approximately)
DELETE FROM `item_types`;
/*!40000 ALTER TABLE `item_types` DISABLE KEYS */;
INSERT INTO `item_types` (`id`, `name`, `suffix`, `created`, `modified`) VALUES
	(1, 'Assy', '000', '2012-01-26 10:32:48', '2012-02-22 10:10:42'),
	(2, 'Part', '200', '2012-01-26 10:33:00', '2012-02-22 10:06:58'),
	(3, 'Std', 'std', '2012-01-26 10:33:20', '2012-02-20 23:13:20'),
	(6, 'EQpart', 'eqp', '2012-01-29 11:43:06', '2012-02-22 09:46:12');
/*!40000 ALTER TABLE `item_types` ENABLE KEYS */;


-- Dumping structure for table pdm.projects
DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `projectname` varchar(256) DEFAULT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table pdm.projects: ~2 rows (approximately)
DELETE FROM `projects`;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` (`id`, `projectname`, `description`, `created`, `modified`) VALUES
	(1, 'KS-11', 'Descr KM-11', '2012-03-11 13:30:14', '2012-03-21 12:55:13'),
	(2, 'KM-11', 'Desc KM-11', '2012-03-21 12:39:43', '2012-03-21 12:39:43');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;


-- Dumping structure for table pdm.project_plans
DROP TABLE IF EXISTS `project_plans`;
CREATE TABLE IF NOT EXISTS `project_plans` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `project_id` varchar(256) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `location` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table pdm.project_plans: ~0 rows (approximately)
DELETE FROM `project_plans`;
/*!40000 ALTER TABLE `project_plans` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_plans` ENABLE KEYS */;


-- Dumping structure for table pdm.trays
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
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

-- Dumping data for table pdm.trays: 22 rows
DELETE FROM `trays`;
/*!40000 ALTER TABLE `trays` DISABLE KEYS */;
INSERT INTO `trays` (`id`, `parent_id`, `lft`, `rght`, `name`, `item_type_id`, `project_id`, `ata_code`, `ata_cache`, `created`, `modified`) VALUES
	(1, NULL, 1, 44, 'Root Tray', 1, NULL, '', 'xxx', NULL, NULL),
	(2, 1, 2, 39, 'Rifles', 1, NULL, 'R', '000', NULL, '2012-01-31 06:04:30'),
	(3, 2, 3, 12, 'Barrels', 1, NULL, '1', '100', NULL, '2012-02-26 09:12:42'),
	(5, 3, 6, 11, 'MuzzleBreaks', 1, NULL, '6', '160', NULL, '2012-02-22 12:56:00'),
	(6, 2, 13, 34, 'Actions', 1, NULL, NULL, NULL, NULL, NULL),
	(7, 6, 14, 21, 'Resivers', 1, NULL, '1', NULL, NULL, '2012-01-31 15:49:42'),
	(8, 6, 22, 33, 'Bolts', 1, NULL, '', NULL, NULL, '2012-01-29 22:31:35'),
	(9, 1, 40, 43, 'Tools', 1, NULL, NULL, '000', NULL, NULL),
	(10, 9, 41, 42, 'Crabs', 0, NULL, NULL, NULL, NULL, NULL),
	(28, 2, 35, 36, 'Stocks', 1, NULL, '', NULL, NULL, '2012-01-29 21:47:54'),
	(29, 8, 23, 24, 'Bolt', 2, NULL, NULL, NULL, NULL, NULL),
	(30, 8, 25, 26, 'Bolt sleeve', 2, NULL, NULL, NULL, NULL, NULL),
	(32, 8, 27, 28, 'Bolt clamp', 2, NULL, '', NULL, NULL, '2012-01-29 22:33:17'),
	(27, 3, 4, 5, 'Barrel', 2, NULL, '5', '150', NULL, '2012-02-22 11:41:17'),
	(36, 7, 15, 16, 'Handle limit', 2, NULL, NULL, NULL, NULL, NULL),
	(34, 8, 31, 32, 'Bolt stop', 2, NULL, '', NULL, NULL, '2012-01-29 22:33:07'),
	(33, 8, 29, 30, 'Firing Pin', 2, NULL, '', NULL, NULL, '2012-01-29 22:32:59'),
	(39, 7, 17, 18, 'Thread insert', 2, NULL, NULL, NULL, NULL, NULL),
	(38, 5, 9, 10, 'Nut', 2, NULL, '2', '142', NULL, '2012-02-22 11:43:22'),
	(37, 5, 7, 8, 'Muzzle break', 2, NULL, '3', '143', NULL, '2012-02-22 11:41:47'),
	(40, 7, 19, 20, 'Resivers', 2, NULL, NULL, NULL, NULL, NULL),
	(44, 2, 37, 38, 'biPods', 1, NULL, '', NULL, NULL, '2012-01-29 22:34:38');
/*!40000 ALTER TABLE `trays` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
