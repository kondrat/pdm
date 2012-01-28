# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.1.54-1ubuntu4
# Server OS:                    debian-linux-gnu
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2012-01-29 00:05:43
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
  `drwnbr` varchar(36) NOT NULL DEFAULT '',
  `name` varchar(36) DEFAULT NULL,
  `item_type_id` int(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Data exporting was unselected.


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

# Data exporting was unselected.


# Dumping structure for table pdm.items_items
DROP TABLE IF EXISTS `items_items`;
CREATE TABLE IF NOT EXISTS `items_items` (
  `id` varchar(36) NOT NULL DEFAULT '',
  `item_id` varchar(36) DEFAULT NULL,
  `sub_item_id` varchar(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Data exporting was unselected.


# Dumping structure for table pdm.items_projects
DROP TABLE IF EXISTS `items_projects`;
CREATE TABLE IF NOT EXISTS `items_projects` (
  `id` varchar(36) NOT NULL DEFAULT '',
  `item_id` varchar(36) DEFAULT NULL,
  `project_id` varchar(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

# Data exporting was unselected.


# Dumping structure for table pdm.item_types
DROP TABLE IF EXISTS `item_types`;
CREATE TABLE IF NOT EXISTS `item_types` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

# Data exporting was unselected.


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

# Data exporting was unselected.


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

# Data exporting was unselected.


# Dumping structure for table pdm.trds
DROP TABLE IF EXISTS `trds`;
CREATE TABLE IF NOT EXISTS `trds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Data exporting was unselected.
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
