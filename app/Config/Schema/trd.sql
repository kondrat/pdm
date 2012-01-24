# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.1.40-community
# Server OS:                    Win32
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2012-01-24 17:52:29
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
  `trd_id` varchar(36) NOT NULL DEFAULT '',
  `name` varchar(36) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table pdm.items: 7 rows
DELETE FROM `items`;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` (`id`, `trd_id`, `name`, `type`, `created`, `modified`) VALUES
	('4e9693d5-25d4-4c9f-9fb1-08e89be3e0a3', '', 'assy124-000', NULL, '2011-10-13 07:31:33', '2012-01-18 06:01:05'),
	('4e9693e0-881c-4ecd-96ef-08e89be3e0a3', '', 'assy2', NULL, '2011-10-13 07:31:44', '2011-10-13 07:31:44'),
	('4e9693e9-d3b8-406c-ba59-08e89be3e0a3', '', 'assy3', NULL, '2011-10-13 07:31:53', '2011-10-13 07:31:53'),
	('4e9693fa-7348-49e5-8089-08e89be3e0a3', '', 'part1', NULL, '2011-10-13 07:32:10', '2011-10-13 07:32:10'),
	('4e969403-43dc-46e0-b858-08e89be3e0a3', '', 'part2', NULL, '2011-10-13 07:32:19', '2011-10-13 07:32:19'),
	('4e96941b-8b3c-4280-a526-08e89be3e0a3', '', 'part3', NULL, '2011-10-13 07:32:43', '2011-10-13 07:32:43'),
	('4e969456-6f40-4be6-a521-08e89be3e0a3', '', 'assy43', NULL, '2011-10-13 07:33:42', '2011-10-13 07:36:43'),
	('4f1e9cae-ccb0-4d60-a4b9-0ca89be3e0a3', '', 'my new name', 'assy', '2012-01-24 11:57:34', '2012-01-24 11:57:34');
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
	('4e96950b-e6c0-4deb-adab-08e89be3e0a3', '4e969456-6f40-4be6-a521-08e89be3e0a3', '4e96941b-8b3c-4280-a526-08e89be3e0a3'),
	('4e96950b-e080-4e51-b676-08e89be3e0a3', '4e969456-6f40-4be6-a521-08e89be3e0a3', '4e969403-43dc-46e0-b858-08e89be3e0a3'),
	('4e96950b-d464-45e5-8363-08e89be3e0a3', '4e969456-6f40-4be6-a521-08e89be3e0a3', '4e9693e0-881c-4ecd-96ef-08e89be3e0a3'),
	('4f1e9cae-ad4c-4adf-aae0-0ca89be3e0a3', '4f1e9cae-ccb0-4d60-a4b9-0ca89be3e0a3', '4e9693d5-25d4-4c9f-9fb1-08e89be3e0a3');
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

# Dumping data for table pdm.project_plans: ~3 rows (approximately)
DELETE FROM `project_plans`;
/*!40000 ALTER TABLE `project_plans` DISABLE KEYS */;
INSERT INTO `project_plans` (`id`, `project_id`, `name`, `location`, `created`, `modified`) VALUES
	('4f0c326b-fe98-459e-89a0-0b089be3e0a3', '4f0c0427-8918-46fe-9f1a-0b089be3e0a3', 'PP-Name01', 'get it 33', '2012-01-10 12:43:23', '2012-01-11 11:13:50'),
	('4f0c33f0-5be4-47e9-8cb8-0b089be3e0a3', '4f0c0427-8918-46fe-9f1a-0b089be3e0a3', 'prom ', 'brom', '2012-01-10 12:49:52', '2012-01-10 13:54:00'),
	('4f0c38d0-424c-442c-bb17-0b089be3e0a3', '4f0c1c04-e580-45b7-a5b2-0b089be3e0a3', 'what', 'novij povorot', '2012-01-10 13:10:40', '2012-01-10 13:54:10');
/*!40000 ALTER TABLE `project_plans` ENABLE KEYS */;


# Dumping structure for table pdm.trds
DROP TABLE IF EXISTS `trds`;
CREATE TABLE IF NOT EXISTS `trds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

# Dumping data for table pdm.trds: 26 rows
DELETE FROM `trds`;
/*!40000 ALTER TABLE `trds` DISABLE KEYS */;
INSERT INTO `trds` (`id`, `parent_id`, `lft`, `rght`, `name`) VALUES
	(1, NULL, 1, 42, 'Root Trd'),
	(2, 1, 2, 37, 'Rifles'),
	(3, 2, 3, 12, 'Barrels Assy'),
	(5, 3, 4, 9, 'Muzzle breaks'),
	(6, 2, 13, 34, 'Actions Assy'),
	(7, 6, 14, 21, 'Resivers'),
	(8, 6, 22, 33, 'Bolts'),
	(9, 1, 38, 41, 'Tools'),
	(10, 9, 39, 40, 'Crabs'),
	(28, 2, 35, 36, 'Stock Assy'),
	(29, 8, 23, 24, 'Bolt'),
	(30, 8, 25, 26, 'Bolt sleeve'),
	(32, 8, 27, 28, 'Bolt clamp'),
	(27, 3, 10, 11, 'Barrels'),
	(36, 7, 15, 16, 'Handle limit'),
	(34, 8, 31, 32, 'Bolt stop'),
	(33, 8, 29, 30, 'Firing Pin'),
	(39, 7, 17, 18, 'Thread insert'),
	(38, 5, 7, 8, 'Nut'),
	(37, 5, 5, 6, 'Muzzle break'),
	(40, 7, 19, 20, 'Resiver');
/*!40000 ALTER TABLE `trds` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
