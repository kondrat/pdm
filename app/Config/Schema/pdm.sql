-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.1.40-community - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2012-06-14 17:45:37
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for pdm
DROP DATABASE IF EXISTS `pdm`;
CREATE DATABASE IF NOT EXISTS `pdm` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `pdm`;


-- Dumping structure for table pdm.acos
DROP TABLE IF EXISTS `acos`;
CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` varchar(36) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table pdm.acos: ~0 rows (approximately)
DELETE FROM `acos`;
/*!40000 ALTER TABLE `acos` DISABLE KEYS */;
/*!40000 ALTER TABLE `acos` ENABLE KEYS */;


-- Dumping structure for table pdm.aros
DROP TABLE IF EXISTS `aros`;
CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` varchar(36) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table pdm.aros: ~0 rows (approximately)
DELETE FROM `aros`;
/*!40000 ALTER TABLE `aros` DISABLE KEYS */;
/*!40000 ALTER TABLE `aros` ENABLE KEYS */;


-- Dumping structure for table pdm.aros_acos
DROP TABLE IF EXISTS `aros_acos`;
CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` varchar(36) NOT NULL,
  `aco_id` varchar(36) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table pdm.aros_acos: ~0 rows (approximately)
DELETE FROM `aros_acos`;
/*!40000 ALTER TABLE `aros_acos` DISABLE KEYS */;
/*!40000 ALTER TABLE `aros_acos` ENABLE KEYS */;


-- Dumping structure for table pdm.groups
DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table pdm.groups: ~6 rows (approximately)
DELETE FROM `groups`;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `modified`, `created`) VALUES
	(1, 'Root', '2012-05-21 14:08:50', '2012-05-21 18:06:03'),
	(2, 'Admin', '2012-05-21 14:08:54', '2012-05-21 18:05:42'),
	(3, 'Designer', '2012-05-21 14:08:59', '2012-05-21 18:05:50'),
	(4, 'Manufacture', '2012-05-21 14:09:04', '2012-05-21 18:05:54'),
	(5, 'Drafter', '2012-05-21 14:09:10', '2012-05-21 18:05:57'),
	(6, 'Worker', '2012-05-21 14:09:22', '2012-05-21 18:05:59');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


-- Dumping structure for table pdm.groups_users
DROP TABLE IF EXISTS `groups_users`;
CREATE TABLE IF NOT EXISTS `groups_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table pdm.groups_users: 9 rows
DELETE FROM `groups_users`;
/*!40000 ALTER TABLE `groups_users` DISABLE KEYS */;
INSERT INTO `groups_users` (`id`, `group_id`, `user_id`) VALUES
	(1, 1, 1),
	(2, 2, 1),
	(3, 3, 3),
	(4, 5, 4),
	(5, 6, 4),
	(6, 6, 5),
	(7, 5, 7),
	(8, 6, 7),
	(9, 5, 8);
/*!40000 ALTER TABLE `groups_users` ENABLE KEYS */;


-- Dumping structure for table pdm.itemissues
DROP TABLE IF EXISTS `itemissues`;
CREATE TABLE IF NOT EXISTS `itemissues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL DEFAULT '0',
  `issue` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `item_id_issue_number` (`item_id`,`issue`,`number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table pdm.itemissues: ~0 rows (approximately)
DELETE FROM `itemissues`;
/*!40000 ALTER TABLE `itemissues` DISABLE KEYS */;
/*!40000 ALTER TABLE `itemissues` ENABLE KEYS */;


-- Dumping structure for table pdm.items
DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tray_id` int(11) DEFAULT NULL,
  `item_type_id` int(11) DEFAULT NULL,
  `responscode_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `letter` varchar(36) NOT NULL DEFAULT '',
  `ata` varchar(36) NOT NULL DEFAULT '',
  `resp` varchar(36) NOT NULL DEFAULT '',
  `drwnbr` varchar(36) NOT NULL DEFAULT '',
  `name` varchar(36) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `letter_ata_resp_drwnbr` (`letter`,`ata`,`resp`,`drwnbr`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- Dumping data for table pdm.items: 13 rows
DELETE FROM `items`;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` (`id`, `tray_id`, `item_type_id`, `responscode_id`, `status_id`, `letter`, `ata`, `resp`, `drwnbr`, `name`, `created`, `modified`) VALUES
	(30, 27, 1, NULL, NULL, '', '', '', 'A00-second1-000', 'second1', '2012-04-23 09:46:26', '2012-05-29 11:28:09'),
	(29, 27, 1, NULL, NULL, '', '', '', 'first3', 'first3', '2012-04-23 09:44:23', '2012-04-23 09:57:33'),
	(28, 27, 1, NULL, NULL, '', '', '', 'forth1', 'forth1', '2012-04-22 11:25:58', '2012-04-22 11:34:52'),
	(27, 27, 1, NULL, NULL, '', '', '', 'third2', 'third2', '2012-04-22 11:23:32', '2012-04-22 11:23:32'),
	(26, 3, 1, NULL, NULL, '', '', '', 'third1', 'third1', '2012-04-19 13:33:34', '2012-04-22 11:26:14'),
	(25, 27, 1, NULL, NULL, '', '', '', 'first2', 'first2', '2012-04-19 13:22:23', '2012-04-23 09:57:13'),
	(24, 5, 1, NULL, NULL, '', '', '', 'first1', 'first1', '2012-04-19 13:22:05', '2012-04-23 09:53:20'),
	(23, 3, 1, NULL, NULL, '', '', '', 'root', 'root', '2012-04-19 13:21:45', '2012-04-23 09:52:52'),
	(31, 27, 1, NULL, NULL, '', '', '', 'second2', 'second2', '2012-04-23 09:46:43', '2012-04-23 09:46:43'),
	(32, 27, 1, NULL, NULL, '', '', '', 'second3', 'second3', '2012-04-23 09:47:02', '2012-04-23 09:47:02'),
	(33, 3, 1, NULL, NULL, '', '', '', 'sdf', '', '2012-05-31 11:09:04', '2012-05-31 11:09:04'),
	(34, 5, 1, NULL, NULL, '', '', '', 'asd', '', '2012-05-31 11:10:48', '2012-05-31 11:10:48'),
	(35, 27, 1, NULL, NULL, '', '', '', 'A-140-12456', 'sdfg22', '2012-05-31 11:13:38', '2012-05-31 11:13:38');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;


-- Dumping structure for table pdm.items_items
DROP TABLE IF EXISTS `items_items`;
CREATE TABLE IF NOT EXISTS `items_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `sub_item_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- Dumping data for table pdm.items_items: 17 rows
DELETE FROM `items_items`;
/*!40000 ALTER TABLE `items_items` DISABLE KEYS */;
INSERT INTO `items_items` (`id`, `item_id`, `sub_item_id`) VALUES
	(34, 24, 31),
	(32, 23, 24),
	(39, 25, 31),
	(38, 25, 30),
	(33, 24, 30),
	(19, 26, 28),
	(31, 23, 25),
	(30, 23, 29),
	(35, 24, 32),
	(43, 30, 26),
	(42, 30, 27),
	(40, 29, 31),
	(41, 29, 32),
	(44, 35, 30),
	(45, 35, 29),
	(46, 35, 28),
	(47, 35, 27);
/*!40000 ALTER TABLE `items_items` ENABLE KEYS */;


-- Dumping structure for table pdm.items_projects
DROP TABLE IF EXISTS `items_projects`;
CREATE TABLE IF NOT EXISTS `items_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table pdm.items_projects: 15 rows
DELETE FROM `items_projects`;
/*!40000 ALTER TABLE `items_projects` DISABLE KEYS */;
INSERT INTO `items_projects` (`id`, `item_id`, `project_id`) VALUES
	(15, 25, 1),
	(14, 24, 1),
	(13, 23, 1),
	(16, 26, 1),
	(17, 27, 1),
	(18, 28, 1),
	(19, 29, 1),
	(20, 30, 1),
	(21, 31, 1),
	(22, 32, 1),
	(23, 33, 1),
	(24, 34, 1),
	(25, 35, 1),
	(26, 25, 2),
	(27, 35, 2);
/*!40000 ALTER TABLE `items_projects` ENABLE KEYS */;


-- Dumping structure for table pdm.itemversions
DROP TABLE IF EXISTS `itemversions`;
CREATE TABLE IF NOT EXISTS `itemversions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL DEFAULT '0',
  `version` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table pdm.itemversions: ~2 rows (approximately)
DELETE FROM `itemversions`;
/*!40000 ALTER TABLE `itemversions` DISABLE KEYS */;
INSERT INTO `itemversions` (`id`, `item_id`, `version`, `created`, `modified`) VALUES
	(7, 35, 202, '2012-05-31 11:10:48', '2012-05-31 11:10:48'),
	(8, 35, 200, '2012-05-31 11:13:38', '2012-05-31 11:13:38');
/*!40000 ALTER TABLE `itemversions` ENABLE KEYS */;


-- Dumping structure for table pdm.itemversions_itemsversions
DROP TABLE IF EXISTS `itemversions_itemsversions`;
CREATE TABLE IF NOT EXISTS `itemversions_itemsversions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemver_id` int(11) DEFAULT NULL,
  `subitemver_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- Dumping data for table pdm.itemversions_itemsversions: 0 rows
DELETE FROM `itemversions_itemsversions`;
/*!40000 ALTER TABLE `itemversions_itemsversions` DISABLE KEYS */;
/*!40000 ALTER TABLE `itemversions_itemsversions` ENABLE KEYS */;


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


-- Dumping structure for table pdm.jobcards
DROP TABLE IF EXISTS `jobcards`;
CREATE TABLE IF NOT EXISTS `jobcards` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `originator_id` int(11) DEFAULT NULL,
  `worker_id` int(11) DEFAULT NULL,
  `material_id` int(11) DEFAULT NULL,
  `machine_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `description` text,
  `targetdate` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table pdm.jobcards: ~4 rows (approximately)
DELETE FROM `jobcards`;
/*!40000 ALTER TABLE `jobcards` DISABLE KEYS */;
INSERT INTO `jobcards` (`id`, `name`, `status`, `originator_id`, `worker_id`, `material_id`, `machine_id`, `quantity`, `description`, `targetdate`, `created`, `modified`) VALUES
	(13, NULL, NULL, 3, 3, 5, 1, 12, 'asdf asdf asdf', '2012-05-24', '2012-05-24 07:45:54', '2012-05-24 07:45:54'),
	(14, NULL, NULL, 3, 1, 5, 1, 12, 'Description 1', '2012-05-24', '2012-05-24 09:13:50', '2012-05-24 09:13:50'),
	(15, NULL, NULL, 3, 5, 5, 1, 12, 'descripton 12', '2012-05-24', '2012-05-24 09:19:28', '2012-05-24 09:19:28'),
	(16, NULL, NULL, 1, 7, 5, 1, 3, 'descr', '2012-05-24', '2012-05-24 09:21:19', '2012-05-24 09:21:19');
/*!40000 ALTER TABLE `jobcards` ENABLE KEYS */;


-- Dumping structure for table pdm.machines
DROP TABLE IF EXISTS `machines`;
CREATE TABLE IF NOT EXISTS `machines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table pdm.machines: ~4 rows (approximately)
DELETE FROM `machines`;
/*!40000 ALTER TABLE `machines` DISABLE KEYS */;
INSERT INTO `machines` (`id`, `name`, `modified`, `created`) VALUES
	(1, 'Saublin 1', '2012-05-22 13:29:55', '2012-05-22 13:29:48'),
	(2, 'You-Ji mil 3 axis', '2012-05-22 13:36:52', '2012-05-22 13:36:52'),
	(3, 'You-Ji mil 4 axis', '2012-05-22 13:37:04', '2012-05-22 13:37:04'),
	(4, 'You-Ji turn', '2012-05-22 13:37:29', '2012-05-22 13:37:14');
/*!40000 ALTER TABLE `machines` ENABLE KEYS */;


-- Dumping structure for table pdm.materials
DROP TABLE IF EXISTS `materials`;
CREATE TABLE IF NOT EXISTS `materials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table pdm.materials: ~3 rows (approximately)
DELETE FROM `materials`;
/*!40000 ALTER TABLE `materials` DISABLE KEYS */;
INSERT INTO `materials` (`id`, `name`, `modified`, `created`) VALUES
	(5, 'Al7075', '2012-05-23 10:03:13', '2012-05-23 10:03:13'),
	(6, 'steell420', '2012-05-23 10:03:35', '2012-05-23 10:03:35'),
	(7, 'Steel416', '2012-05-24 10:47:09', '2012-05-24 10:47:09');
/*!40000 ALTER TABLE `materials` ENABLE KEYS */;


-- Dumping structure for table pdm.pletter
DROP TABLE IF EXISTS `pletter`;
CREATE TABLE IF NOT EXISTS `pletter` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table pdm.pletter: ~4 rows (approximately)
DELETE FROM `pletter`;
/*!40000 ALTER TABLE `pletter` DISABLE KEYS */;
INSERT INTO `pletter` (`id`, `name`, `description`, `created`, `modified`) VALUES
	(4, 'A', 'Rifle drawings', '2012-05-29 12:00:53', '2012-05-29 12:02:17'),
	(5, 'R', 'R and D drowings', '2012-05-29 12:01:27', '2012-05-29 12:01:27'),
	(6, 'T', 'tooling drawing', '2012-05-29 12:01:43', '2012-05-29 12:01:43'),
	(7, 'M', 'Manufacture drawings', '2012-05-30 12:29:06', '2012-05-30 12:29:06');
/*!40000 ALTER TABLE `pletter` ENABLE KEYS */;


-- Dumping structure for table pdm.pletter_projects
DROP TABLE IF EXISTS `pletter_projects`;
CREATE TABLE IF NOT EXISTS `pletter_projects` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `project_id` int(10) DEFAULT NULL,
  `pletter_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table pdm.pletter_projects: ~10 rows (approximately)
DELETE FROM `pletter_projects`;
/*!40000 ALTER TABLE `pletter_projects` DISABLE KEYS */;
INSERT INTO `pletter_projects` (`id`, `project_id`, `pletter_id`) VALUES
	(1, 1, 4),
	(2, 2, 4),
	(3, 3, 4),
	(4, 1, 5),
	(5, 2, 5),
	(6, 3, 5),
	(7, 4, 6),
	(8, 1, 7),
	(9, 2, 7),
	(10, 3, 7);
/*!40000 ALTER TABLE `pletter_projects` ENABLE KEYS */;


-- Dumping structure for table pdm.projects
DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `tray_id` int(11) DEFAULT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table pdm.projects: ~4 rows (approximately)
DELETE FROM `projects`;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` (`id`, `name`, `tray_id`, `description`, `created`, `modified`) VALUES
	(1, 'KS-11', 2, 'Descr KM-11', '2012-03-11 13:30:14', '2012-04-01 10:50:18'),
	(2, 'KM-11', 2, 'Desc KM-11', '2012-03-21 12:39:43', '2012-04-01 10:54:43'),
	(3, 'TR-11', 2, 'Tactical rifle', '2012-04-01 10:49:17', '2012-04-01 10:49:17'),
	(4, 'TOOL', 9, 'Tooling dev', '2012-05-29 06:59:49', '2012-05-29 07:00:24');
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


-- Dumping structure for table pdm.responscode
DROP TABLE IF EXISTS `responscode`;
CREATE TABLE IF NOT EXISTS `responscode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table pdm.responscode: ~4 rows (approximately)
DELETE FROM `responscode`;
/*!40000 ALTER TABLE `responscode` DISABLE KEYS */;
INSERT INTO `responscode` (`id`, `name`, `description`, `created`, `modified`) VALUES
	(1, '0', 'TADS in house', '2012-06-04 11:06:16', '2012-06-04 11:06:16'),
	(2, '1', 'TPI responsable', '2012-06-04 11:06:47', '2012-06-04 11:06:47'),
	(3, '2', 'Outside, in UAE', '2012-06-04 11:07:13', '2012-06-04 11:07:13'),
	(4, '3', 'Outside UAE', '2012-06-04 11:07:25', '2012-06-04 11:07:25');
/*!40000 ALTER TABLE `responscode` ENABLE KEYS */;


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
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

-- Dumping data for table pdm.trays: 23 rows
DELETE FROM `trays`;
/*!40000 ALTER TABLE `trays` DISABLE KEYS */;
INSERT INTO `trays` (`id`, `parent_id`, `lft`, `rght`, `name`, `item_type_id`, `project_id`, `ata_code`, `ata_cache`, `created`, `modified`) VALUES
	(1, NULL, 1, 46, 'Root Tray', 1, NULL, '', 'xxx', NULL, NULL),
	(2, 1, 2, 41, 'Rifles', 1, NULL, 'R', '000', NULL, '2012-01-31 06:04:30'),
	(3, 2, 3, 14, 'Barrels', 1, NULL, '1', '100', NULL, '2012-02-26 09:12:42'),
	(5, 3, 6, 11, 'MuzzleBreaks', 1, NULL, '6', '160', NULL, '2012-02-22 12:56:00'),
	(6, 2, 15, 36, 'Actions', 1, NULL, NULL, NULL, NULL, NULL),
	(7, 6, 16, 23, 'Resivers', 1, NULL, '1', NULL, NULL, '2012-01-31 15:49:42'),
	(8, 6, 24, 35, 'Bolts', 1, NULL, '', NULL, NULL, '2012-01-29 22:31:35'),
	(9, 1, 42, 45, 'Tools', 1, NULL, NULL, '000', NULL, NULL),
	(10, 9, 43, 44, 'Crabs', 0, NULL, NULL, NULL, NULL, NULL),
	(28, 2, 37, 38, 'Stocks', 1, NULL, '', NULL, NULL, '2012-01-29 21:47:54'),
	(29, 8, 25, 26, 'Bolt', 2, NULL, NULL, NULL, NULL, NULL),
	(30, 8, 27, 28, 'Bolt sleeve', 2, NULL, NULL, NULL, NULL, NULL),
	(32, 8, 29, 30, 'Bolt clamp', 2, NULL, '', NULL, NULL, '2012-01-29 22:33:17'),
	(27, 3, 4, 5, 'Barrel', 2, NULL, '5', '150', NULL, '2012-02-22 11:41:17'),
	(36, 7, 17, 18, 'Handle limit', 2, NULL, NULL, NULL, NULL, NULL),
	(34, 8, 33, 34, 'Bolt stop', 2, NULL, '', NULL, NULL, '2012-01-29 22:33:07'),
	(33, 8, 31, 32, 'Firing Pin', 2, NULL, '', NULL, NULL, '2012-01-29 22:32:59'),
	(39, 7, 19, 20, 'Thread insert', 2, NULL, NULL, NULL, NULL, NULL),
	(38, 5, 9, 10, 'Nut', 2, NULL, '2', '142', NULL, '2012-02-22 11:43:22'),
	(37, 5, 7, 8, 'Muzzle break', 2, NULL, '3', '143', NULL, '2012-02-22 11:41:47'),
	(40, 7, 21, 22, 'Resivers', 2, NULL, NULL, NULL, NULL, NULL),
	(44, 2, 39, 40, 'biPods', 1, NULL, '', NULL, NULL, '2012-01-29 22:34:38'),
	(74, 3, 12, 13, 'Misc', 1, NULL, '4', '14X', '2012-04-23 13:37:05', '2012-04-23 13:37:05');
/*!40000 ALTER TABLE `trays` ENABLE KEYS */;


-- Dumping structure for table pdm.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table pdm.users: ~6 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `group_id`, `password`, `name`, `email`, `last_login`, `created`, `modified`) VALUES
	(1, NULL, '1234', 'AlexeyKondratyev', 'aa@mm.ru', NULL, '2012-05-21 09:39:04', '2012-05-21 09:39:04'),
	(3, NULL, '1234', 'aa2', 'aa2@mm.ru', NULL, '2012-05-21 11:12:33', '2012-05-21 11:12:33'),
	(4, NULL, '1234', 'aa3', 'aa3@mm.ru', NULL, '2012-05-22 06:34:01', '2012-05-22 06:34:01'),
	(5, NULL, '1234', 'worker1', '', NULL, '2012-05-24 09:17:39', '2012-05-24 09:17:39'),
	(7, NULL, '1234', 'worker2', 'worker2@mm.ru', NULL, '2012-05-24 09:18:32', '2012-05-24 09:18:32'),
	(8, NULL, '1234', 'drafter1', 'drafter1@mm.ru', NULL, '2012-05-24 10:18:37', '2012-05-24 10:18:37');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
