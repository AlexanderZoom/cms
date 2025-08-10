# SQL Manager for MySQL 5.5.1.45563
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : local_feed


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

SET FOREIGN_KEY_CHECKS=0;

DROP DATABASE IF EXISTS `local_feed`;

CREATE DATABASE `local_feed`
    CHARACTER SET 'utf8'
    COLLATE 'utf8_general_ci';

USE `local_feed`;

#
# Structure for the `admin_cron` table :
#

CREATE TABLE `admin_cron` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `minute` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `hour` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `mday` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `month` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `wday` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `command` VARCHAR(255) COLLATE utf8_general_ci NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  `started_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `site_cron_idx1` (`minute`, `hour`, `mday`, `month`, `wday`, `command`) USING BTREE
) ENGINE=InnoDB
AUTO_INCREMENT=4 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `admin_group` table :
#

CREATE TABLE `admin_group` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `is_disabled` TINYINT(4) DEFAULT 0,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `code` (`code`) USING BTREE
) ENGINE=InnoDB
AUTO_INCREMENT=26 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `admin_group_access` table :
#

CREATE TABLE `admin_group_access` (
  `group_id` BIGINT(20) NOT NULL,
  `package` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
  `structure` VARCHAR(100) COLLATE utf8_general_ci DEFAULT NULL,
  `instance` VARCHAR(100) COLLATE utf8_general_ci DEFAULT NULL,
  `rights` BIGINT(20) NOT NULL,
  `except` TINYINT(4) NOT NULL DEFAULT 0,
  `instance_inherit` TINYINT(4) NOT NULL DEFAULT 0,
  `instance_invert` TINYINT(4) NOT NULL DEFAULT 0,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  UNIQUE KEY `admin_group_access_idx1` (`group_id`, `package`, `structure`, `instance`) USING BTREE
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `admin_group_user` table :
#

CREATE TABLE `admin_group_user` (
  `admin_group_id` BIGINT(20) UNSIGNED NOT NULL,
  `admin_user_id` BIGINT(20) UNSIGNED NOT NULL,
  UNIQUE KEY `admin_group_id` (`admin_group_id`, `admin_user_id`) USING BTREE
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `admin_notification` table :
#

CREATE TABLE `admin_notification` (
  `id` CHAR(36) COLLATE utf8_general_ci NOT NULL,
  `type` VARCHAR(20) COLLATE utf8_general_ci NOT NULL,
  `level` VARCHAR(20) COLLATE utf8_general_ci NOT NULL,
  `name` INTEGER(40) DEFAULT NULL,
  `subject` VARCHAR(200) COLLATE utf8_general_ci DEFAULT NULL,
  `message` TINYTEXT COLLATE utf8_general_ci NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `admin_notification_idx1` (`created_at`) USING BTREE
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `admin_notification_group` table :
#

CREATE TABLE `admin_notification_group` (
  `id` CHAR(36) COLLATE utf8_general_ci NOT NULL,
  `nid` CHAR(36) COLLATE utf8_general_ci DEFAULT NULL,
  `gid` BIGINT(20) DEFAULT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `admin_notification_group_idx1` (`nid`, `gid`) USING BTREE
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `admin_notification_user` table :
#

CREATE TABLE `admin_notification_user` (
  `id` CHAR(36) COLLATE utf8_general_ci NOT NULL,
  `nid` CHAR(36) COLLATE utf8_general_ci NOT NULL,
  `uid` BIGINT(20) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `admin_notification_visit` table :
#

CREATE TABLE `admin_notification_visit` (
  `id` CHAR(36) COLLATE utf8_general_ci NOT NULL,
  `nid` CHAR(36) COLLATE utf8_general_ci NOT NULL,
  `uid` BIGINT(20) NOT NULL,
  `visit` TINYINT(4) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `admin_notification_visit_idx1` (`nid`, `uid`) USING BTREE,
  KEY `admin_notification_visit_idx2` (`visit`) USING BTREE
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `admin_session` table :
#

CREATE TABLE `admin_session` (
  `session_id` VARCHAR(24) COLLATE utf8_general_ci NOT NULL,
  `last_active` INTEGER(10) UNSIGNED NOT NULL,
  `contents` TEXT COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`session_id`) USING BTREE,
  KEY `last_active` (`last_active`) USING BTREE
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `admin_user` table :
#

CREATE TABLE `admin_user` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
  `password` VARCHAR(32) COLLATE utf8_general_ci NOT NULL,
  `password_salt` VARCHAR(10) COLLATE utf8_general_ci NOT NULL,
  `is_disabled` TINYINT(4) NOT NULL DEFAULT 0,
  `last_login` DATETIME DEFAULT NULL,
  `last_ip` VARCHAR(15) COLLATE utf8_general_ci DEFAULT NULL,
  `last_ip_forward` VARCHAR(15) COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `email` (`login`) USING BTREE,
  UNIQUE KEY `login` (`login`) USING BTREE
) ENGINE=InnoDB
AUTO_INCREMENT=35 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `admin_user_token` table :
#

CREATE TABLE `admin_user_token` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT(20) UNSIGNED NOT NULL,
  `user_agent` VARCHAR(40) COLLATE utf8_general_ci NOT NULL,
  `token` VARCHAR(40) COLLATE utf8_general_ci NOT NULL,
  `type` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
  `created` INTEGER(10) UNSIGNED NOT NULL,
  `expires` INTEGER(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `uniq_token` (`token`) USING BTREE,
  KEY `fk_user_id` (`user_id`) USING BTREE
) ENGINE=InnoDB
AUTO_INCREMENT=2 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `media_storage_category` table :
#

CREATE TABLE `media_storage_category` (
  `code` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `type_data` VARCHAR(20) COLLATE utf8_general_ci NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`code`) USING BTREE
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `media_storage_data` table :
#

CREATE TABLE `media_storage_data` (
  `code` CHAR(70) COLLATE utf8_general_ci NOT NULL,
  `type` CHAR(10) COLLATE utf8_general_ci NOT NULL,
  `type_data` CHAR(20) COLLATE utf8_general_ci NOT NULL,
  `path` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
  `url` VARCHAR(150) COLLATE utf8_general_ci NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  UNIQUE KEY `code` (`code`) USING BTREE
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `media_storage_file` table :
#

CREATE TABLE `media_storage_file` (
  `id` CHAR(36) COLLATE utf8_general_ci NOT NULL,
  `data_code` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `category_code` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `path` VARCHAR(200) COLLATE utf8_general_ci NOT NULL,
  `path_data` VARCHAR(200) COLLATE utf8_general_ci NOT NULL,
  `file_name` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
  `file_extension` VARCHAR(10) COLLATE utf8_general_ci NOT NULL,
  `file_size` INTEGER(11) NOT NULL,
  `file_mime` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
  `name` VARCHAR(75) COLLATE utf8_general_ci NOT NULL,
  `type` INTEGER(11) UNSIGNED NOT NULL DEFAULT 10000,
  `status` VARCHAR(40) COLLATE utf8_general_ci NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `media_storage_file_idx1` (`category_code`, `path`, `name`) USING BTREE,
  UNIQUE KEY `media_storage_file_idx2` (`path_data`, `file_name`) USING BTREE
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `media_storage_file_extra` table :
#

CREATE TABLE `media_storage_file_extra` (
  `file_id` CHAR(36) COLLATE utf8_general_ci NOT NULL,
  `width` SMALLINT(6) DEFAULT NULL,
  `height` SMALLINT(6) DEFAULT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`file_id`) USING BTREE,
  KEY `created_at` (`created_at`) USING BTREE
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `news` table :
#

CREATE TABLE `news` (
  `id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `subject` VARCHAR(200) COLLATE utf8_general_ci NOT NULL,
  `text` MEDIUMTEXT COLLATE utf8_general_ci,
  `datetime` DATETIME NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `subject` (`subject`) USING BTREE
) ENGINE=InnoDB
AUTO_INCREMENT=10 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `old_media_storage_categories` table :
#

CREATE TABLE `old_media_storage_categories` (
  `code` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `hidden` VARCHAR(3) COLLATE utf8_general_ci NOT NULL DEFAULT 'no',
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`code`) USING BTREE
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `old_media_storage_file_extras` table :
#

CREATE TABLE `old_media_storage_file_extras` (
  `file_id` CHAR(36) COLLATE utf8_general_ci NOT NULL,
  `width` SMALLINT(6) DEFAULT NULL,
  `height` SMALLINT(6) DEFAULT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`file_id`) USING BTREE,
  KEY `created_at` (`created_at`) USING BTREE
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `old_media_storage_files` table :
#

CREATE TABLE `old_media_storage_files` (
  `id` CHAR(36) COLLATE utf8_general_ci NOT NULL,
  `location_code` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `category_code` VARCHAR(50) COLLATE utf8_general_ci DEFAULT NULL,
  `vfolder_id` VARCHAR(36) COLLATE utf8_general_ci NOT NULL,
  `location_path` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
  `file_name` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
  `file_extension` VARCHAR(10) COLLATE utf8_general_ci NOT NULL,
  `file_size` INTEGER(11) NOT NULL,
  `file_mime` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
  `name` VARCHAR(75) COLLATE utf8_general_ci NOT NULL,
  `type` INTEGER(11) UNSIGNED NOT NULL DEFAULT 10000,
  `private` VARCHAR(3) COLLATE utf8_general_ci NOT NULL DEFAULT 'no',
  `status` VARCHAR(40) COLLATE utf8_general_ci NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `uniqbyfilename` (`location_code`, `location_path`, `file_name`) USING BTREE,
  UNIQUE KEY `category_code` (`category_code`, `vfolder_id`, `name`) USING BTREE,
  KEY `created_at` (`created_at`) USING BTREE,
  KEY `updated_at` (`updated_at`) USING BTREE,
  KEY `media_storage_files_idx1` (`category_code`, `location_path`) USING BTREE
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `old_media_storage_reserved_size` table :
#

CREATE TABLE `old_media_storage_reserved_size` (
  `location_code` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `size` BIGINT(20) NOT NULL DEFAULT 0,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`location_code`) USING BTREE
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `old_media_storage_vfolders` table :
#

CREATE TABLE `old_media_storage_vfolders` (
  `id` CHAR(36) COLLATE utf8_general_ci NOT NULL,
  `category_code` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `name` VARCHAR(75) COLLATE utf8_general_ci NOT NULL,
  `parent_id` VARCHAR(36) COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `category_code` (`category_code`, `name`, `parent_id`) USING BTREE,
  KEY `created_at` (`created_at`) USING BTREE,
  KEY `updated_at` (`updated_at`) USING BTREE
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `setting` table :
#

CREATE TABLE `setting` (
  `code` VARCHAR(70) COLLATE utf8_general_ci DEFAULT NULL,
  `value` TEXT COLLATE utf8_general_ci,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  UNIQUE KEY `setting_idx1` (`code`) USING BTREE
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `site_cron` table :
#

CREATE TABLE `site_cron` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `minute` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `hour` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `mday` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `month` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `wday` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `command` VARCHAR(255) COLLATE utf8_general_ci NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  `started_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `site_cron_idx1` (`minute`, `hour`, `mday`, `month`, `wday`, `command`) USING BTREE
) ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `site_email_template` table :
#

CREATE TABLE `site_email_template` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `name` CHAR(100) COLLATE utf8_general_ci DEFAULT NULL,
  `title` CHAR(75) COLLATE utf8_general_ci NOT NULL,
  `text` LONGTEXT COLLATE utf8_general_ci NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `site_email_template_idx1` (`name`) USING BTREE
) ENGINE=InnoDB
AUTO_INCREMENT=9 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `site_group` table :
#

CREATE TABLE `site_group` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `is_disabled` TINYINT(4) DEFAULT 0,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `code` (`code`) USING BTREE
) ENGINE=InnoDB
AUTO_INCREMENT=7 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `site_group_access` table :
#

CREATE TABLE `site_group_access` (
  `group_id` BIGINT(20) NOT NULL,
  `package` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
  `structure` VARCHAR(100) COLLATE utf8_general_ci DEFAULT NULL,
  `instance` VARCHAR(100) COLLATE utf8_general_ci DEFAULT NULL,
  `rights` BIGINT(20) NOT NULL,
  `except` TINYINT(4) NOT NULL DEFAULT 0,
  `instance_inherit` TINYINT(4) NOT NULL DEFAULT 0,
  `instance_invert` TINYINT(4) NOT NULL DEFAULT 0,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  UNIQUE KEY `admin_group_access_idx1` (`group_id`, `package`, `structure`, `instance`) USING BTREE
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `site_group_user` table :
#

CREATE TABLE `site_group_user` (
  `site_group_id` BIGINT(20) UNSIGNED NOT NULL,
  `site_user_id` BIGINT(20) UNSIGNED NOT NULL,
  UNIQUE KEY `admin_group_id` (`site_group_id`, `site_user_id`) USING BTREE
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `site_menu` table :
#

CREATE TABLE `site_menu` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(40) COLLATE utf8_general_ci NOT NULL,
  `url` VARCHAR(255) COLLATE utf8_general_ci NOT NULL,
  `target` VARCHAR(20) COLLATE utf8_general_ci NOT NULL,
  `parent` BIGINT(20) DEFAULT NULL,
  `position` TINYINT(4) NOT NULL DEFAULT 1,
  `created_at` DATETIME DEFAULT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `site_menu_idx1` (`name`, `url`, `parent`) USING BTREE,
  KEY `site_menu_idx2` (`parent`) USING BTREE
) ENGINE=InnoDB
AUTO_INCREMENT=9 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `site_page` table :
#

CREATE TABLE `site_page` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `title` CHAR(75) COLLATE utf8_general_ci NOT NULL,
  `slug` CHAR(100) COLLATE utf8_general_ci DEFAULT NULL,
  `text` LONGTEXT COLLATE utf8_general_ci NOT NULL,
  `main` TINYINT(4) NOT NULL DEFAULT 0,
  `published_at` DATETIME DEFAULT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `site_page_idx2` (`slug`) USING BTREE,
  KEY `site_page_idx1` (`published_at`) USING BTREE
) ENGINE=InnoDB
AUTO_INCREMENT=7 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `site_session` table :
#

CREATE TABLE `site_session` (
  `session_id` VARCHAR(24) COLLATE utf8_general_ci NOT NULL,
  `last_active` INTEGER(10) UNSIGNED NOT NULL,
  `contents` TEXT COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`session_id`) USING BTREE,
  KEY `last_active` (`last_active`) USING BTREE
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `site_user` table :
#

CREATE TABLE `site_user` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
  `password` VARCHAR(32) COLLATE utf8_general_ci NOT NULL,
  `password_salt` VARCHAR(10) COLLATE utf8_general_ci NOT NULL,
  `is_disabled` TINYINT(4) NOT NULL DEFAULT 0,
  `nickname` VARCHAR(35) COLLATE utf8_general_ci DEFAULT NULL,
  `firstname` VARCHAR(40) COLLATE utf8_general_ci DEFAULT NULL,
  `lastname` VARCHAR(40) COLLATE utf8_general_ci DEFAULT NULL,
  `birthday` DATE DEFAULT NULL,
  `last_login` DATETIME DEFAULT NULL,
  `last_ip` VARCHAR(15) COLLATE utf8_general_ci DEFAULT NULL,
  `last_ip_forward` VARCHAR(15) COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `email` (`login`) USING BTREE,
  UNIQUE KEY `login` (`login`) USING BTREE
) ENGINE=InnoDB
AUTO_INCREMENT=15 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `site_user_token` table :
#

CREATE TABLE `site_user_token` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT(20) UNSIGNED NOT NULL,
  `user_agent` VARCHAR(40) COLLATE utf8_general_ci NOT NULL,
  `token` VARCHAR(40) COLLATE utf8_general_ci NOT NULL,
  `type` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
  `created` INTEGER(10) UNSIGNED NOT NULL,
  `expires` INTEGER(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `uniq_token` (`token`) USING BTREE,
  KEY `fk_user_id` (`user_id`) USING BTREE
) ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `site_user_verify` table :
#

CREATE TABLE `site_user_verify` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `uid` BIGINT(20) NOT NULL,
  `type` VARCHAR(20) COLLATE utf8_general_ci NOT NULL,
  `hash` VARCHAR(32) COLLATE utf8_general_ci NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `site_user_registration_idx1` (`uid`, `type`) USING BTREE
) ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `test` table :
#

CREATE TABLE `test` (
  `id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(20) COLLATE utf8_general_ci DEFAULT NULL,
  `date` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB
AUTO_INCREMENT=7 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Data for the `admin_group` table  (LIMIT 0,500)
#

INSERT INTO `admin_group` (`id`, `code`, `is_disabled`, `created_at`, `updated_at`) VALUES
  (1,'admin',0,'2013-11-30 10:15:28',NULL),
  (4,'member 2',0,'2014-08-08 19:37:54','2014-08-21 23:16:44'),
  (15,'user',0,'2016-05-15 09:40:43',NULL),
  (16,'moderator',0,'2016-05-15 09:40:52',NULL),
  (17,'power user',0,'2016-05-15 09:41:01',NULL),
  (19,'creator',0,'2016-05-15 09:41:23','2016-05-25 16:49:55'),
  (20,'support',0,'2016-05-15 09:41:28',NULL),
  (21,'editor',0,'2016-05-15 09:41:38',NULL),
  (23,'hacker',0,'2016-05-15 09:42:00',NULL),
  (25,'abc',0,'2016-05-26 10:06:15',NULL);
COMMIT;

#
# Data for the `admin_group_access` table  (LIMIT 0,500)
#

INSERT INTO `admin_group_access` (`group_id`, `package`, `structure`, `instance`, `rights`, `except`, `instance_inherit`, `instance_invert`, `created_at`, `updated_at`) VALUES
  (4,'general','main','',1,0,0,0,'2016-09-19 12:31:27','2016-09-19 12:31:27'),
  (4,'general','user','',1,0,1,0,'2016-09-19 12:31:27','2016-09-19 12:31:27'),
  (4,'SiteMenu','main','',1,0,0,0,'2016-09-19 12:31:27','2016-09-19 12:31:27'),
  (4,'SiteEmailTemplate','main','',1,0,0,0,'2016-09-19 12:31:27','2016-09-19 12:31:27'),
  (4,'static_pages','main','',1,0,0,0,'2016-09-19 12:31:27','2016-09-19 12:31:27'),
  (4,'general','user','34',13,0,0,0,'2016-09-19 12:32:31','2016-09-19 12:32:31');
COMMIT;

#
# Data for the `admin_group_user` table  (LIMIT 0,500)
#

INSERT INTO `admin_group_user` (`admin_group_id`, `admin_user_id`) VALUES
  (1,1),
  (4,2),
  (4,26),
  (4,32),
  (15,34),
  (19,32),
  (20,31);
COMMIT;

#
# Data for the `admin_session` table  (LIMIT 0,500)
#

INSERT INTO `admin_session` (`session_id`, `last_active`, `contents`) VALUES
  ('57c488fe7d7563-29169254',1472500002,'h06M5tXD+73WAyAY7QUz8882SYhne32xmM6YsoBodjpD/B++lzSRWJ6WY6yq1gzFgWKjqBVDTVJ1rNkAsDIqqV/UjJpb0EBK56NcIamumjoo6ad1qGP++jh0fpK2lt5oQA3RxSDkqpp56+7rX+xx1pYgwhvAIfEy/O0krONE9fYlvg=='),
  ('57c7d94ec6d6b3-98128199',1472727907,'8olMSmFuHzdV2Wj/TbIaiqDgxw1elEqJVZGMX6RLCAW+PwSMtnLbAY1dBcT24ERe7hfgKi0Xb7/VueFSQ1Oiz2Bh4F4z9KK4XMH8EeSfMDrrau88hLCEq4Q3U/iX3iXhDZSelSdGkRD3kWOmwngTgDYV'),
  ('57c80bba1ac903-45077624',1472728093,'BcRw1JEP0Clw/7oEBACQYu0n8d09An53BNaY4OD64WJSXfhIW/UW5dQmWiy2bEgb/XA0fSKzxH2y+AUAAYqj4p78jVb9faY6henNrk/FvOwoTvHEgYHxVihcwBz6Gy6FYEHj8taD3Mz4IExYq0/BgP/i'),
  ('57c80c5f2e1a77-18425350',1472728802,'AeN2rNVBlQKi00PVbGloie4hCHI/G8B2mv0V4CLtj9y350JyS3N4hMGLzUvr06ulE+x1o6BgGUBq5JYegXNTfMWoPe0fcdgMyV8yuc5c/dGlKAQKqGd98r/F+BnUncK+fVhsbfq+QN6YnP/g9mFrAM1/'),
  ('57c80f61b23463-88680470',1472728960,'jgSzls6LXX56zEkknrebkQNqxaZen/BcU6t/7Duk5UnOVhT8bDIeMPwH1D8aIUJIdEZ5AuGdmkNlsCBNWSxIYvQrTcBrpZcTjtMAg8SEPz7OwGxs+nSO6wSQporLoSUr0J/jOeTcyKmhpBMddnHfzIJr'),
  ('57c80f94041021-23252569',1472732562,'2TM542D5zpSidKa23WuHOGYaDZRzS23bRQCgmzNQMwA9TqfnZv/Cfz9O3EPURuDvC85kbZ2vltgdvlhuqOcIZfdViOZDm0e7wtl7QF2HFCA/DE76v1TtfHcdtS9mQ+ST274b89QZUyIbzj4FEJq5JwBR'),
  ('57c81dd9ed5bb6-41333595',1472732633,'LlvLCPnPA61zyd4enN7APCQox5x0ddL7k1zdM7i3ys6yhJX3grxAUgHRFexMWKBrvQdYBjdtKYeVYxl7GQicn7q9UIQkFvnY3ME='),
  ('57c81de0d4dad8-27032733',1472732640,'hAfabxiqu6ejdzuI5EN1gYYGny6NC+6hA+LVA/Nrr2ce/N3FQekbN54u0CNOBaBL2VAXY+GcGOzMCNmdlCWbBaJcmMX1oT0+dzWebpzgoMho6IAvMlWhqxXOYSjHPTaz8feMP+besHKFfDE5Zyu11C/E'),
  ('57c81eedee1c86-34499965',1472732915,'yjkInwTJnZN8stp5ew5PUpBjGhZtF+QpL0FmhDIUug3EI2/mnrdL6A9rMbeZDkqQXipx0Sln0TLIWjnd7qAkJmPkcIpgiZbitBflKFzzf/IKzuf7gDII663ecOjv2vZr98ozuBMEkF5aW2CaclMlNBDg'),
  ('57c81fc6c504f0-03218505',1472735847,'CUoJNj++75bmQS/kShS15j+v9EDKdfeJKNNIt29UytfbhaphLZK4QLAq8GUC8eUr4wpn8UP9jPqsU6CWMtUw7CmLtHpdBGB2RKGkBlSV/Zhf3oTFdF5UjsNHqX4b6XXwhmuqBpg7tuNHKXUbiXc0L5AB'),
  ('57c82a6e582636-54314476',1472735854,'t5dNaaWOmyAcmMN2Ukn7bkJwKCjcstgti/BTF+GbAXPxc7KQBl8c93IKLJjQg98TBR83PH4s/OKvaB2EGv+o3ZBQqY6AOoHByI8='),
  ('57c82a7bc16443-86658805',1472735944,'kTD0e2kGdSEKymZpm4OGXHwu6Ci0PWcaj8wd0idLD3EAGk8C0rnXfA+Sy5ti1SHstkGUbDB2JUYp/oyKtIN/HSwd0U8m/rqV+z5ogHMeOqqBrSBsJVdkXhqxhCXUFnJWg+57oSt26YBnNRIpAuJI//Yc'),
  ('57c82acdd3a496-05506593',1472736177,'jEjln37mfAtYmHNO2akGLUyejJ4bsf6huIbBkJbt6KwOA3P6BcRFLbOfv4xYwsDZav6j0bYhjpVY/u9s0dp+340sKPHdHrl0+c68/8KvlYkSZmVb4RNn1EMYIXutSLPkiwvPmGL8q491JhTrOab3UkFn'),
  ('57c82bbf2f2fc1-82816805',1472736204,'Sv55jEjTea/+AdZHHcdlrLNOWgJadz47Gi0zIg0Xd7EDKPD7wh6ogsWZnNgQgMlOSc/jFrUisZOSxSnlNcfZWBRjJx1Fea5R4FH4xANBDSQAFWbU4u3TVG/u18erEAs4oQq4vyxd02ljw7max6x4o4+e'),
  ('57c83b6d83c386-85272998',1472740212,'jgvNTmItSEKsxL67Ej05mj0Lqzuvt040QRS0eeDY7jjLA7FLwlYq6bVS77OrsC1taNA4qlch7lWg+cEarEDA5rDdrOIry3/y8BM='),
  ('57c83b73e61954-53885405',1472745611,'3NEhVJFPd38iztY5D26kavTTjyjRTHg6LrQTSKF9vF5ycIsKjLCiXB4CtEOQrkvuus0HimdnQTlYHShrI65a3o69Ee5h5X0F8UPstcrXbfBiYz+sY+YNIzLBYVlTq8Y0GZl2C3Wj5WKGr8eIMvQCesCuvmBYff+fb0QGzkXdUSW46rlR'),
  ('57c8884444b3b1-97823689',1472760930,'Rd0ZdsW5X3pJcad0QIHRawhcTOljhf1pQ/xoHrpyW236jD1MjoIyZlcCG0W6J9nXB3C4tWFdNPtTEXJxi2nPLcONdthN2JTteiQ='),
  ('57c89528aed940-42347201',1472763237,'cKM/k3aFufbLRqBrHvIunQTa5z5tHcBH+wSzKwRmHxTFVcpCJFiSd8kXt2PqcrSmLIoU28xH2FvKtJKmAzB+3oa2TerN5z4g1uYfkjAqfY8PSdHOetq4eNEkdnfrAAQOb/gcklxHFBZzST7haJfgaEWu2uZ055c6KoI0MRMhChzvI6A='),
  ('57c8bbb3283240-95162735',1472773511,'bvMFqm1HZ0pLYSB/VZGptccS9j7hBzV2o6O8z+zaNVJmbAmgg62HB346FcR3/fOCoqrMlxvsrWq72MgmEC40NK7wOihBS4W4euXjc4U7Kyn8rYOMETrPJOC14jXNn1WlmsetPimKeQnbRVa5VEsGyJaaZcQ+cN8tg+aGWch2ZeqjfA=='),
  ('57c8bbc5d39535-65072658',1472773519,'WtyEySEq8rHhA4hN6T/rQeWfuVTL+oSIxjFeu9Vaz6MBl9pkIQS65aij4ElFb5lNKD2WDsCfwjolHFrjnJq/l3oNwy2FjMj5ZKaZ8l7QJc34rNShZF5XPmuhyaJxcNVjrR7UrDO0xF44g9506Zk67E9O3EXpaOrvAQT4qfaa+bE2pjU='),
  ('57c900cf547613-52329017',1472791820,'nRTjwbd39EFOAtQfetE5ogbWehAhjFXszLG7CR4sqxSetUfWd512LogYOpABv7wDJ4HpR8bVLIDylWb8CnYTd86MZfLuB7S4XDWvdF9qorq3voUY/ZdPwWC5/b5A8d/oNdhzN1wKIVFL3P9qMPpg9QFAUFXtmaNJe5ovkmOKBP2G2w=='),
  ('57c90565f12938-25527113',1472791910,'4UvJU5Fc3XQb65GI8p78TyuoNG6fHJI3Ca1zP5CK2Z2sRuovTyhqLgm0BnZJSZ3ILUkwaCs+sscUXkdOpI9O/PFefhSQvxLw7oY1JS3959dMskU0S77LSoPjm954+GTbyft+pnfwCLYrPn6Ycp6YFiKT'),
  ('57c906edc77823-83633557',1472793859,'+n8KgEVWgphMyfyWHY67Fc1yWb/HpRYP9VP0H7rn7hAS8pXY0c2zkcNopyGaMMAhE1GUpHPRDRokjqgugyNlgQbgx5CLPva1dHX/drXWfSACLn4wcz8bT9R9mk6YsciRpI5rJHbAmMgCJaPF/2q2CIOq'),
  ('57c9be731786c3-03999544',1472839350,'yZt7bwUen5OdrR3TlCB3JxdY/X8ss4lYVrd30Bc3nLaR5qtxgyH/iOq2a8ohAu6SodjyU3aIq9MLSPAP7dDtGMomzpq7WveSeqIi2kf8vfm0Tjw75E70D5ZmxXVM35ncycvpe/hUetqH6xGCxj+Xv9dEZgD/d9Ir7rk32rIqx4jNkg=='),
  ('57cc93e992ddc4-84097681',1473025805,'UlLVHxo+FbSmV33hZ81BbStHNYbGzglW9xMBykZjLsnHpQb2TAp+Eva5R99ThXufS6SokYBxjGm8tj4N5ylAgWzZKpc2hIciXdmAeLQxXBqeov5Z0Ai4s93591ehXIseGnCGId9nwD+xjJFFIUtzC1Ht+VGU1PoGwmowy3cjmfWK8A=='),
  ('57cd201e899c41-72294541',1473060895,'82IBs5F/+PjWpoMq00hw00L2Mat5qByYvHz1uO04vUrsJj6z5TOrqYovGyIBFxdxOgc5lf5qS+FeQ46HWWsgGmLOWe8c413cpl8='),
  ('57cd202ea15208-61785581',1473065511,'NvWmf3uRaIjxkzpkgVWKdcDgwL/J1x44RR/2vE0gDFv8yEHNDQKiqYHorARkCD/sAGgOpcASTInf8y2r7n4ClnaZfgP/tZmmTSgGCr9FpP5f1BjejiLH4NaG8ylvbm5olzvo1QCE1/haKLiJBi3Jvp33wG0Ggo5tl9EHHeaN99X+fw=='),
  ('57cd34ea48a7e2-71710090',1473066218,'AgQgSlgI5KwIJzucQqWY7foelGJCNeB6emBd4nLnkN8VDb33rsVDjlaq6DBgrAGOnoGBUaLfbEbSMzYVAMhI2MW8CSXBAZdaMos='),
  ('57cd34f1d479e3-21447059',1473067006,'rzyNVeaQgMthW4h1llWOY6IY8pI5StMAqpeBvuhfm7p7BDp1hwD2Ha1RnEl0qNo99cL2n1Jg/1sgLwVvkXFp4nWqj3chGfIUQCv4d/HDbY8g6IZOshM0nLAsAkhwdo2F7OihIjSs8or+6QqU8BTlKLEV'),
  ('57cd39ed96d510-35372042',1473067501,'Go9AVddgYilvLfDX1xMYfHKWBHaT0HB/FArEv4nJog84eExsrGIm7JqjeVOh/9Fokc7AXjRgSSuQRHw3fqqB9OFHcgyyaq5RoXo='),
  ('57cd71900c09c6-12462766',1473109594,'YaGFY7+z47KaG6uZPmSpf+/cQQ/M3DmI5T98ctYTvBbQyOCgsOhlTTtr0+1yHBRafnHKU1w5Rlrq+NXSyEMT4TBsc0pn2fJV5936M4WMOZbs2kd4HUSV5LxoKuLo5iGHyk82SfTl/CjaMogR8nCcSwuyX+9R5HUxnuADGn6mJZ87yg=='),
  ('57cddee90ce964-03728616',1473109750,'slJFADCn4ALj91xCjcsOQg4Ggiz/3cA9SvPdTcScq1JTxB5dSN5+wHCSbtL85puxt0gYTVsyhR6KJPz8fEzGU6asmU6AZSYf/65DJoTd6ZD70o9X+Hgn6eOxlcovfx//tZIPGrLTcbenqfc4HAcH4hlP'),
  ('57cddf79e9e355-68956811',1473112603,'r5WjTjoOBmGZKsq19uYkEkh9F+7Ukk1aPOIyFQoiYRRKITuxEOZExQqiKPC5y1PxFl4wftmeHLZC9ULhCn3P6/aRh2aa01+xf4JWbC0voWvvLQKS3a+Bmu305IWd9v0PBd768TNIyg62iZQvrfZIWGTZ'),
  ('57cdea67669515-11184199',1473112679,'exFTQ/qKdE8Yr8YTYpo6mEnMI7RV/otdn9wBZj+RBPkkGEvSJzV7ZPln2ErowMaLKUSAaz7MbroLWEa3t4gEMVeiO0G/HrSj5vA7MkJ9buL4YQOhW9KBioV+mweSgRiTr7hgqxijszAeIOpVc6Mg2WHv'),
  ('57cdf7d9b08b71-01926657',1473119505,'D66Fund4zYNR72Ov0MGFInIl3x4oCm9kiIxJZriLCV5LgAFgpQdIWbkl21FsColsnspQ2GI/UdcRKvI2xrf62YkQ3v6GNFaEsCEN1auE1onezR3AFU9dAnqP6CXpNoWQRINgWIrMyc/sSRuWv2oE9wpbTtQlkAnXwMcilRZNaQWGBg=='),
  ('57ce46539a7da7-73898532',1473137717,'ST3IBDkp/O0f8baLNd9oLv/leC0YA4eLJJ6fqWrzJDzC4cPe1wnHbvhWc2hjOSehKB+nmmWT3DcKifqZRxO1w+03R/+FM93UYWnxr2FNIFLUjUXL8BLpGl0FEN5U9jCel+fXv7fnrcqG22wmL6fIRE656Zrig9d+l21vMgKVzVTyEA=='),
  ('57cf322c4ba148-59058664',1473196838,'6UF+cV1H2TtX2uLCZC3qyzlfoHjjFzHLAlv2fyr00kFelHAi645ljDJTG1Ghm7KBdfTxGVVEmdO6cdoQlfitBpmjOww8SMGK3BHBxM0pv2mnjbpTSUs6C2LLFOEiHNuEboYeFjuE4yELoK5Go+grIOYpXFKdcfRQRGFmgvmCm7/Pxg=='),
  ('57d00ac65015e9-37055162',1473252085,'ruohIJGhpQ+RNV2b73HhbJk7FSrCPkAjhGZULJ4YgPlHEmsjXptTf0GIKfx6ReZgojaCDgDofc82nVIX6+8Swq2zQOvjhbbrGBppsvE1g53ghLUZPkZ1cH7wdx4xv3NMWnaKIhT5m5q6UjyP0jgEIqMektvR8DpL1ngKj+xbK5T0SQ=='),
  ('57d06981c02114-67188954',1473280018,'YzKwvTFHtHgNXUCYG9lmyIA4nzqzvHsgF5UKi2NoRTb85rZmnUXFGgCD7cT6eejWve2t0ENoY8lX85g8uMkJzmyto1St8GpeGi8nNYucNoQzQdxSu4XwuVlkElcnvbgSv6KQOpWy2jws3HAliWkiqa2v'),
  ('57d18112ee3f81-34765510',1473347974,'iuKAxL/aRT+l61jjjLgwbJOILzhyO6HSak/UoBI6aFM5+Fp8pSa2+8TZhBP8y2Ho90f+zHJ+fbvidkpDwVeICQImR2DJfSV8b3K4Z/xaR9PhSWR7HC6z/WZ8dcIWswvBJepEZPIwrmQr3L8ufP80iBoHgZwWVKQwZ9L9ij9V9cwqkw=='),
  ('57d253fb1c8353-22605917',1473401868,'9JlBwxIT49uUlGCl+QdaMMRoBJok/mDVKdwKXvrAzp7mFMDcQdgo7mWRWeJ0JBEUh2UQ+j+Hz1qBEVbSYIMIX0SXLXpYwb2Pxt4='),
  ('57d28c19a1a342-36721917',1473458294,'2Oya9exUqOzhLRLUCo+M9s1SszNMLgfQTwrKytVsRw033lE77UexCplP9wKNJV4TGP8h1J1sy9fZGLK0/FHjcUA1U76U63YMHOkqvp0mwwn1Iey6G4WW3fGbsvSESXeIM0dZumL8XaQms4PZiIuxIlF8wZGv525DBQQ87hJrvVL10g=='),
  ('57d34e359d3371-48308245',1473467979,'M1jq1X2Bwl/qcesttE1pmEjNauqgq2W1Ar/jr8Rkjy8ree4yVwz2Y0Tp8/skMTNE+ciyeL7K/wBsIXeVFAo7C3KG2Frk7Ct2IRli+JpFv6vSmCIHSZuh+7zeRKmkqy/ja9XW+0vcsGbp7XkKkf+V8J+nKkcAhr0Sjq28jy/6J2vqoQ=='),
  ('57d35ae821a609-47177084',1473470641,'AjYoTMHIWPhX5TURgCMPEE3bcxIOcRZ1HjjkoTmPkB8i1/Bbiop1Yl2RFEhZU4sQdVqOCsGLVwiER3JT4WnOV/S2oHg8o+ZvVrOEJDcqiOMJ2GEhT4i0Qo8GJMs8S7CzuIgfl04sRCb7mKpIevD+l7HrD64vPvu0uCJASupfoKQneA=='),
  ('57d46c12ee4632-79832057',1473539887,'raFy/KnYDFD/GnMJDBAzOoFP/Q6zFxXTyfkdFBW5V29jn5M0t/7PHPO2zC1smd6vo9zluO37ECHPjz6YcXEPy7tcramsDi+/B7Ehc3KWZPA4V3c4g7uBjwS4wshZpWVOrMCgbPXKxruuZWnnrcFGXEE5m/KWKh9mbq2kipGEalDZUw=='),
  ('57d5ad1b0de8b6-96142214',1473639073,'1bl9GkJOKfaET4ZSCwbDrqEH87jYwlMnXsWMfD01302K5k3E4RpgGO5cPE1iUjONTaHaVMhVqZU9HEhA7vdrIiKWFT9MJDs5S7bkzyXzlZo6xS0t1IkmOuGL9mIkzfJKvAP3Khysg7teFjAbIh027wm4J2QlL3TDa9fqCOVirNATQA=='),
  ('57d70f65961238-13726432',1473711973,'TP4ZtLfGtETDBLV+DlHB9cVT3bOZwWoSEIIScrWMmKluEG8Zk7M/1almwtr7IlGUJPLxtSZXUJaBCpYBUbuLOrfME4pjlm8XLD8='),
  ('57d70f659bd9e2-43477132',1473712439,'zmaYRzpxg6peG8zHIa6bjKoi6V6f4yTbz6da+NZ64rAtQnX8c6EJ1dYHQpOCHMXuAjbJq8kgPHzzO4OXhj6FTuoD7myUcN/jD88='),
  ('57d7df6db46921-46734607',1473765232,'7v52RNQW0xhFqWecaiJfWPUms385e9BdaXGnidnqk3BoDV5EafXODowW9r1oAMkOdJQ1od6CDtQoLJCKuPzo80yVhK1xFPLz5XITpqXNawOO3/OnMVdVo3rUDEgWtRmQH4jICnT/fK1jg84V7G6uW6ykl/Y/1LwMoeC19MQlkoVhww=='),
  ('57d7f513592661-15439879',1473770771,'3ZEQhnETNf/V3nYzpAJ7eIQcrH5vFNgKHYipcvLU/asnybOwR0uhdufzWlD+tghlXOXeSYHPYNsxMzG4+3zxh1qG30Q5K1nc0r9qP68vMw8PDJD+xUQJ/aFlO8CStk2IANIaYPB2jizZxUMO9sbrybVl'),
  ('57d807f4abc553-06454834',1473775631,'iPSc7k5sk2pNIPG8If5U3pTc3G1DAwIpSoqgZDfqUCxxi3RwRT2axvl8nhdfDjzZlpyDnXNqIzO7JUj7ASsadDYA2pYTwPHF9rM11eRpSu2CSqQwcEqKp6nFJDJpnvxQXOJj/K6b3DXA/XFpRSGMCLHP'),
  ('57d8085c0e7f30-55619537',1473775718,'nFB2MpguqeSxWCVpjxylTzCIsUrV9ubFvPqTZkS5rbM6xZgzhqtJhn5o0d7rx2mql7OAwkD6ePmqvBpvcBtLJJvV+Stofa3tpD1Mvc+CPpDc535dmxTqrH5R3AoSAIeqhvgjoR7Bh7nI4jQgJ7qduj3g'),
  ('57d823ecea6112-13878600',1473782933,'m62+UjQyR3J8SGcIhpx97ggJCNCzvsUyTZDNOJwkCWHr1q5xSqhrXXTwn4/OfINvtrErOU4cPcq1sGxgGcY6Qlca1gXSxaBswKhx6aPeXm1CMp1SB1/0ZymxuVFLGGf5hjH/uanXitl+NgpZDBehMbb/'),
  ('57d828133156f4-53106181',1473809428,'tN4tLcQhRD70htxRkzDcY4wfqftFB/084v/+KNDiOqWks97eFVu08WvgHMDnrXwDyyzJ+Uhmvu78ISvHgzX9byhSB/LCQOuhgQz9FwKz2aZt4kKbWQ3KigPAYpW3JQUeELRd/iqUVTZewkNanlFc9+OIUSsuPwQjpv3KZx8LrNtzBQ=='),
  ('57d88c834cc4a8-52937809',1473809740,'/Dma1D2XhVYSRUW1BOhC6ODuJD64OzK17WwItIpGxwrDShEWTnjOQw0i6PfztavmdMhReLFlANylO/5LbGzGbHQcJ83ivezVWSToQrYi8tvZJ2yTjQDJmLNqhFJcaXe4T8+U5DRNM4VsEliyvYY7t4+QKuXDtQhMJe5rvFiLQmUj+Q=='),
  ('57d8901407e001-98681529',1473810452,'YKtF8H7DmI6IODS49UbUJmS4W/fPp6FbHxeVfF6QtEA0jDicjtePPQaUmm7a6iQuolHzxbnxGPmIJtTp5dzg82/y4kNymD3CKkU='),
  ('57d8901d1e3342-30928087',1473815365,'GqFOnhNWCFAkQep06FRmqLcivcx5S0nMPm8LzXv7xX/I5UuGBgyWpyAUbrk8vmTOArS6LS0uxBsYEi9/jaNGAeZCwnOxRKETpQUoNke+egyziuzqdrE8h+aaxL4c/+vAGcpBptk7wku+wPPn2c85nSP4'),
  ('57d8d93f527a99-80983803',1473829217,'+cT0SNeNfWGuQs35qWa8gzX02qJtfhey9VHihLUdXXUT4Ekxs73LFZ0N8xU4ZmmZBX/msq1jtuFd18ddwzYfo4uouPX45dq45ZfVHfL7bsycjaZvK88Awqzgz9k76sW/1nDA1dtdnhQsKUPWmeqLUwgTIv4TPqU7J0SdhUGcY43h8w=='),
  ('57d8db3eafa368-57631773',1473829694,'R3xwN5vSwgun7PdcQY1CksCBDG+US0rbQPsR3rCv03PIgcTj4xmDSMzJH/c+YyrpZZM9xW0z03xGng4zkB1vIlnbO+wduwpypks='),
  ('57d9a82da757b7-42128260',1473882161,'OdyOu+At0gs3Et5jTLiTC2q5mZOFXidmhQa0dXV1b9EGdkBxJM8HgMRmf/jUS4ckTnAutfOPN4rwrDThSZGwgDjejVSdmXdHk1fKjdWPjg/L63Ok9Z9ZJZfM3u4MgGIccfbVjf3janORo+a+py+YzYYtaRJnE/HfZYe30enhMhf9rA=='),
  ('57db1866b8dcf8-63494443',1473976568,'N73MTXlWhBmPhnMqqOQzzsD8DRblm1xpZi4g1oCFCRZT99m97+D3SqfATc1nHOXoqBTI1TT5IjWJhCZSSmMRG6aqcTF26DSNWB8a4WIi48spUuOYGA8D+AqmhoIymAo3EEdDMtPXe86dO+wyjRrMgyW+Q4rPisLXPI8pGv2VJtns9w=='),
  ('57dd178e2a5c32-69139194',1474122596,'rhQ2Qe5CkwAikCJddD3a56MBz6DH+p73eOsE79I+nUYi6ExJKXBcoaixbbAvItWKxltkMlmEtOdzHrZUfR2VG1DW2P30lxcGvDQfQIwHGPaV11wKBEXamyM38BzH66+gemZz31p3T44UNtTf6dbkq1Yew8q+1FVpn7wOnrw8kOLCGw=='),
  ('57dd554b6c0d70-82319224',1474123325,'Kzh3JPV5Bm3JrAnImbFVBEAaNUwiDVRjp0RfHd8XiKcnriLws13wMgT+bZct3YUsMspDb7sbfkI0yiDbAqqBRu1ZJWUt6Kxbxd1o/Jr89RC+1RMNualLBIroHGD7f+D8bWGtP0HMCamgTRzZQJvSl9YY60HTZHgWA/Pc03qCUp90Ig=='),
  ('57dd5682e40a00-05825333',1474123395,'ZVdhC6VBTWOeTIPg2L6TBU2zOq8tR7qlIilnYaqkEdZwx0hBu/VIEryLz+fijqHClhKSwNLLtb5Qsmg5szDhvCE+N23iaIqpKOivr0LngzSSdg7AwsY8P9WFNJEHuPpbPTGd1Uz6qfM4O0w+PL1zV87N'),
  ('57dd56900c5873-85941031',1474123526,'A59hJg5apqpZ8Teyl01SxxxxVIhwWZZdI1125p55BiGSm6G7TAH3Oi9rlbXhuBcGvUxVG3IsmF4SZKskZCfswCh48JtUIpJ9PJIVpHzy85II5uGBiUmYTafKV5IUcvQS7uhvONu3oan7m6xee3k1TDY/'),
  ('57dd75338b0754-19790719',1474134878,'MxPTbDMaEQTkn8nddaX/ZTSRSV6bse6XqNQvYec136MjWEUzPSYQkxJDaaF8NfF8icZ+FTuAyGsgY6Sf8ejDTdvhJeCyf2qXHfke7XwKHNE6lXgoSnmJqmhRokRjeoCTNvtMgkTwObNM+rKpJXSg0sEh'),
  ('57dd83a34806d8-43762575',1474135290,'S63SIgSGrtHrIAeT42nbJraR32IxWnRZN9ABTlXCV5ZaWR379NZsKhxFohOaLb1KXoNFkBgNIW8Z5fpIw7Ij3SlNGz0jtoFCWcfXToMKh7aMjrgob2Fz+lQ6BJBDjrI+MktFBIaWngPgg6sNVkpclzSRRN/3+w1zAUYd/4jLYaaUGg=='),
  ('57dd857579cfc7-53310408',1474135425,'rbai6LENAduzuCUOkFFlnfvO5PrZ//at0yjv2DLEABfzX6671M6cX9DGmOJ9uh9fMr7Z3Dp2RcNuHSuVsOu8pta2f+bgquzo6r7nJpi/k+av3nRAe/Y0JJvw2IOuajytH/HjbVr1DmhWSwsi9iPfZcIL'),
  ('57dd85d24a9de2-57309606',1474135535,'xurqmLOhrgdOcwOZUKXnPc40uGAcDjCqpLoZRBVd0HOUnFJNUGLJZvcDzEx75sBxKgHc5BNch9z30mt2cxh3TpazHv/g4mwP6YCtwW2smpGqK5Lf4pcEN2x3TCFvrqdZnYzWREEIt+/blCAHYbQz2UNDyPoiESscTQyFTfyYhNzohw=='),
  ('57dda854d0f5d4-83354897',1474156653,'mtosYq8GcGDnDjCET8Pa8VUxgh3coLF7Mnt4SGIPkVnDgZgwiSZn5WBc3snG2z4XEO3v0Ggess6K/VBV3+j8/hBY4nLs2v9h+8BxKN4dIjtoMbRWbfekN0RscxiWD+i5ChzXu1d1cDQzmB9moHyhBJPnFDNuXuTP85VOTjP7cY07iA=='),
  ('57dde10b10e4c6-53796942',1474175612,'be+Z7w7b2d36D87jXoIZ97yF6aUCw8RLnbgYtYhencFUe/NrNTbcHqFNwIHiUjruQoTq8mbXiN5QqkHrZrhoTu2gnzgDTu7ZDYHO4MKzQKyxxPwc6vqeKELW5HUQQRzVzcwLP2nuDotnb2wXvZYiO/wA'),
  ('57de2fa5a4bbd1-70375429',1474179718,'xoro4ne2GyvfDcF8h+PFF64wgfDO3ww4m8IlktCxUTU15LY8KZcmESXeXsSMRcsmnZJeYi7mPT02XpgxxjF30sPPheAE/aGr6vJvlOb3GKZW+/Ck0pip3EF/5djDTWqsjkCwsaANeT4peKVxwLGT5WRiwtEwwoWMwoiuj6prFSpeIQ=='),
  ('57de33395f7e02-95896712',1474180263,'aW47G/ErZ9qEiHPEcvxnl+xo6SpQiKjOpKupVnVRJhXOP9jrMwLBpnA+EdvbsvaFIXkzklqm6QMRXWoQgmOajHX5PQvq+PmLK3HZppx7ycgkG5Pqn2N2lLYtvlDbu72rtvwyFpv4yTXDs0vFess4+rNW'),
  ('57de34bcb84c42-77000833',1474180284,'awSOKo5Ip974/J7Jm76TuBgoFgkYKCnBNzZ832AZdDBPHr4c/Jv6tTk68tTMwgMuOuLkIoWwXnOp0i2at6hAdwALpczdDyZBUi8bU+CEByBa7rVKKE6noAwSOZ3J5qvWr1ES7AV799rgvwvELcgbbNkn'),
  ('57dea165de4126-82010996',1474209205,'1T52X6ouOVKsIXvcGqva0KlxEmcs1bT1KTcR1cM5CaxTidfVPlqZwrmCHA0fI5M3MzhrYytT1Cq3rvlXWh3lNjMIvuDtNgsF43N4vAz8EqnVR1UqjXPPXASXWWodLDml0eWt0Nw8Z8v6l5HutkbeF4PP+tG9orrCxAHlbzC3fWXldQ=='),
  ('57dee83fc55dd4-51330747',1474235514,'6es4K4/ZQwlGEfQTnagTDe4zJ9VTl9/3McRJvp/9RKgc1DqQqmimd53ODQbb09Z2SS69tspC0ZgVaWWQVjp+P83W8BWWyyVSd86Nh+bbeQMuhwIPgRihNtkbLzaYE9ZXJI8dwiRIwPe7DeCZ9w1NpJ2KP847hrXk4xxN82ykYFo30A=='),
  ('57df8561a96644-72642750',1474268640,'IaDoGRES4sksoUeUnsF0UAKrvMS96c4FrQnFmOkb6yVzEMhHUfqV+OfhqZvpnWC6L47yXBcgeFcaEQgGutiIlrSvIn9svMer4XoVxq8cJtxOO2y9DOwiVJTGB8e3jfEHJ8rQbCAUGU5VfplDbMTaPySIu4LJvt1+IooVYcPg9Em1Dw=='),
  ('57dfb19a191765-00492036',1474277786,'eqn8ReTtPbJSrsX/tShkt2NuISpNEo2CO08V2mnfQKInZuVOmqEdmwGT6k8K8ZWIRivK+IMZnz1u9IeK7DIbE/ysJ7jerxGn1vA='),
  ('57e0323ba603b2-55144659',1474313207,'PRr5aZ/cUu8S3GrvAuPkxu4sGo0RiduoUjnfdMo+hgX1B8wGQQorMgat9IlRxNttGedELuoKOgmwCYeBHf69+uF8+psAuKT1wp1ldR2Ho8ciKYkP6AU8Acbj4WVg/cN+bt2ECQT0WwamtpgZIU0q4HudxxiQ5tAdBN68eOcuhrhvgg=='),
  ('57e188a89a9744-12894903',1474398463,'VKdsX6hzGB2UwXqZTGtPWMwOcLgyQ0UaooLHY+1NndAtBLO7me4SeESLnQZomKIOpA/lIT26nsr0F1jAl3s0ex77LobAvWfHbUhA4Y9V0taEHGn5xgUVot0GaJazFGE7k1y56olvRpfI6l6GEkcImzJX5p7n1lgOVTdyVmZpvBuCqg=='),
  ('57e2eb48421bd6-43444634',1474489200,'508vYEQzqov586blkp+UhnA0kzxqUbWPGwSsTmd+14S2/DKMWUEcj6K117E1rSrVRA3Uzn/Ntcd5p9wWepvXNFc4c2Fn40uct6BadtU7Tjid6H15c/RDjwIXwiYiwgWOcAXY6QLnPMsiqdEktWIsiUF6LsXQ9QL9Qf4IWaWHZi/Utg=='),
  ('57e5a11bddb171-63537257',1474666779,'p2qcCu19us7BcL5o8Vl8SMrekjjQrtJGhDGrgJ50s55pUgM9TJC+msA4/GtkLUHN/IMTTbsb6Uv96hj8+Po6fnJ5Xpsrj2gFzPQ='),
  ('57e70ac6c825e6-23618880',1474759737,'hjKhz9T+eOTOSgu3XJkrfGzU13TuHIZy47YSa/xAZTiSoc+Pw8zV+iaCt5DWb0gi3273BCm8e6qbcJcA3iivLRdZmu1KybVO1GF5vn98g/gkVqcrLDRqoBim7t+O473KhoIzKhwlCBC5P7xDeRxxUvbBhYvZflNOvAXSwDqqjQxpmw=='),
  ('57e70bc4ed28b8-12967025',1474759620,'o7BgGoU3BC8pG2xCLaicjbrdU/tfML1Qj4i/AYMphBa7DtwSXSHgPmC1JXGmYBIx0zXbkE55D9zVj0ua+bz077uzLOBfGZ+8LRs='),
  ('57e7c06f2b0ce1-03082947',1474849387,'n42K3YYwi/TIOqWwd5ejFsDayuh9gcmS1iOYmrMMIBZl+0AWyHFBB4LGmz6KbF5IaB7Gf/SSso3a/gzKVHLfyEUVea6/HduqphlRHE6CL6HxwOUI+tviMAaWUu7pdE0WBlpxKDgWrjdG0sR+RXlwHCdBQRqsfbx2UJF7ClTpglxaag==');
COMMIT;

#
# Data for the `admin_user` table  (LIMIT 0,500)
#

INSERT INTO `admin_user` (`id`, `login`, `password`, `password_salt`, `is_disabled`, `last_login`, `last_ip`, `last_ip_forward`, `created_at`, `updated_at`) VALUES
  (1,'zoomerev@gmail.com','5d573efa40477813cf62d1d4b27de3e2','f450551be3',0,'2016-09-25 15:17:51','127.0.0.1','91.108.63.79','2013-11-30 10:15:28','2016-09-25 15:17:51'),
  (2,'geroyster@gmail.com','43204d50183ba87b8c36073a6d71db43','f602b5b337',1,NULL,NULL,NULL,'2013-11-30 10:15:28','2016-05-07 08:30:21'),
  (26,'alexazoom','72177960ef359b7a7536b70d59d63145','a19949ee63',0,'2016-09-19 12:32:49','127.0.0.1','178.71.205.148','2014-06-03 18:32:41','2016-09-19 12:32:49'),
  (31,'zoomerevev','be92dad8b1679162eabd019f253369a7','1b81de2e65',1,NULL,NULL,NULL,'2014-08-08 17:29:41','0000-00-00 00:00:00'),
  (32,'alexazooma','61a8018f912c2bfbde6b88f33c14d07e','1ead13b24a',1,NULL,NULL,NULL,'2014-08-08 17:31:06','0000-00-00 00:00:00'),
  (34,'aaa','de22da1567dc8d033542bdbb999d6a8e','302f96dd23',1,NULL,NULL,NULL,'2014-08-08 18:33:57','2016-09-19 00:34:02');
COMMIT;

#
# Data for the `admin_user_token` table  (LIMIT 0,500)
#

INSERT INTO `admin_user_token` (`id`, `user_id`, `user_agent`, `token`, `type`, `created`, `expires`) VALUES
  (1,1,'21b8892f102c2d762de2bbe50ededcdea8a6ee0e','4f87cacfaf1728723ac10820b6bf8b46f8f90454','',1465307500,1496843500);
COMMIT;

#
# Data for the `media_storage_category` table  (LIMIT 0,500)
#

INSERT INTO `media_storage_category` (`code`, `type_data`, `created_at`, `updated_at`) VALUES
  ('media','public','2016-06-03 22:32:52','2016-06-03 22:32:55');
COMMIT;

#
# Data for the `media_storage_data` table  (LIMIT 0,500)
#

INSERT INTO `media_storage_data` (`code`, `type`, `type_data`, `path`, `url`, `created_at`, `updated_at`) VALUES
  ('main','local','public','%www_dir%/media','%www_url%/media','2016-06-03 22:20:00','2016-06-03 22:20:10');
COMMIT;

#
# Data for the `media_storage_file` table  (LIMIT 0,500)
#

INSERT INTO `media_storage_file` (`id`, `data_code`, `category_code`, `path`, `path_data`, `file_name`, `file_extension`, `file_size`, `file_mime`, `name`, `type`, `status`, `created_at`, `updated_at`) VALUES
  ('0165148d-a39e-40ef-a460-6e3684a226f5','__DIR__','media','/','/__DIR__media','qwe','dir',0,'dir','qwe',0,'ok','2016-06-08 00:58:09','2016-06-08 01:00:16'),
  ('178857f6-92da-40e8-ba8e-3c81fac5915a','main','media','/','0/0','lqsou168a.pdf','pdf',6625295,'application/pdf','aspire_8951g.pdf',10000,'ok','2016-06-10 22:22:49','2016-06-10 22:22:49'),
  ('1b65f415-5c2d-4791-8b29-d2e30ea1cee8','main','media','/','0/0','zk2y8ihuz.jpg','jpg',57858,'image/jpeg','Vm8MHIvGJl4.jpg',10000,'ok','2016-06-14 22:36:44','2016-06-14 22:36:44'),
  ('3a564998-782b-477c-86ce-762de43346bd','main','media','/','0/0','ys2s1ycea.zip','zip',99897696,'application/zip','asd.zip',10000,'ok','2016-06-24 07:08:54','2016-08-20 22:48:24'),
  ('48d640f3-5acd-4879-8ba0-62b13e0442d9','main','media','/','0/0','iqdr7h2o0.jpg','jpg',18182,'image/jpeg','OPDdypFAouo.jpg',10000,'ok','2016-09-05 12:59:47','2016-09-05 12:59:47'),
  ('4ac4baea-ca6e-46b3-b82e-1864218fb97b','main','media','/','0/0','jmoz7s201.pdf','pdf',1232535,'application/pdf','prosto-o-vim.pdf',10000,'ok','2016-06-10 22:59:03','2016-06-10 22:59:03'),
  ('7ca45a26-b6db-4877-b696-46a7f886e053','main','media','/1234/','0/0','2obby3bbc.rar','rar',2936075,'application/x-rar','hotkeypro.4.5.45.rar',10000,'ok','2016-08-20 22:39:51','2016-08-20 22:39:51'),
  ('985c780e-de72-4933-8d74-89de08c6ca73','main','media','/','0/0','8iqig6vqr.zip','zip',481567,'application/zip','MyDownloader.zip',10000,'ok','2016-09-25 02:28:51','2016-09-25 15:18:33'),
  ('9f64862a-9877-4a2f-86c0-5af4985dd113','__DIR__','media','/qwe/','/qwe/__DIR__media','Моя папка','dir',0,'dir','Моя папка',0,'ok','2016-06-14 22:56:04','2016-06-14 22:56:04'),
  ('cb57fdfb-8e9f-40c8-93aa-d0d921f45b76','main','media','/','0/0','fo6tv6qbk.jpg','jpg',105801,'image/jpeg','butterfly.jpg',10000,'ok','2016-09-12 00:26:17','2016-09-12 00:26:17'),
  ('e432960c-a0af-404c-bf0f-d14562ec5d78','main','media','/','0/0','gniqm833d.jpg','jpg',80511,'image/jpeg','tbl.jpg',10000,'ok','2016-06-14 22:36:44','2016-06-14 22:36:44'),
  ('ee2708b2-855a-46ca-879a-930305f26a3b','__DIR__','media','/','/__DIR__media','1234','dir',0,'dir','1234',0,'ok','2016-08-20 22:39:21','2016-08-20 22:39:21'),
  ('f06aedb8-d1c7-4292-a9ce-3aec0e480756','main','media','/','0/0','dsf1wzhct.jpg','jpg',845941,'image/jpeg','Desert.jpg',10000,'ok','2016-06-08 00:54:24','2016-06-08 00:54:24'),
  ('f2eb3f0f-2dcb-4cc2-8dfd-4457b7c16322','main','media','/','0/0','w44bn1wyo.jpg','jpg',140615,'image/jpeg','3Cbec4R1M44.jpg',10000,'ok','2016-09-12 00:26:17','2016-09-12 00:26:17');
COMMIT;

#
# Data for the `media_storage_file_extra` table  (LIMIT 0,500)
#

INSERT INTO `media_storage_file_extra` (`file_id`, `width`, `height`, `created_at`, `updated_at`) VALUES
  ('1b65f415-5c2d-4791-8b29-d2e30ea1cee8',411,807,'2016-06-14 22:36:44',NULL),
  ('48d640f3-5acd-4879-8ba0-62b13e0442d9',604,568,'2016-09-05 12:59:47',NULL),
  ('cb57fdfb-8e9f-40c8-93aa-d0d921f45b76',600,607,'2016-09-12 00:26:17',NULL),
  ('e432960c-a0af-404c-bf0f-d14562ec5d78',973,587,'2016-06-14 22:36:44',NULL),
  ('f06aedb8-d1c7-4292-a9ce-3aec0e480756',1024,768,'2016-06-08 00:54:24',NULL),
  ('f2eb3f0f-2dcb-4cc2-8dfd-4457b7c16322',800,640,'2016-09-12 00:26:17',NULL);
COMMIT;

#
# Data for the `news` table  (LIMIT 0,500)
#

INSERT INTO `news` (`id`, `subject`, `text`, `datetime`) VALUES
  (8,'sswwwwwwwwww','dddddddddddddddddddddddddddddddddddddddddddddddd','2015-01-05 20:37:33'),
  (9,'wwwwwwwwwwwwwwwww','wwddddddddddddddddddddddddddd','2015-01-05 20:37:53');
COMMIT;

#
# Data for the `old_media_storage_categories` table  (LIMIT 0,500)
#

INSERT INTO `old_media_storage_categories` (`code`, `hidden`, `created_at`, `updated_at`) VALUES
  ('files','no','2014-05-31 00:00:00',NULL),
  ('media','no','2013-11-28 09:16:19',NULL),
  ('private','no','2016-06-03 17:41:33',NULL),
  ('userfiles','no','2016-06-03 17:42:24',NULL);
COMMIT;

#
# Data for the `old_media_storage_files` table  (LIMIT 0,500)
#

INSERT INTO `old_media_storage_files` (`id`, `location_code`, `category_code`, `vfolder_id`, `location_path`, `file_name`, `file_extension`, `file_size`, `file_mime`, `name`, `type`, `private`, `status`, `created_at`, `updated_at`) VALUES
  ('535ed5ca-141b-45ac-8f4c-5cb1d3c53c53','main','media','','public/0/0','p3n8kkxjn.jpg','jpg',780831,'image/jpeg','Koala.jpg',10000,'no','ok','2016-04-08 11:42:13',NULL),
  ('97eaaaf8-2ead-44d4-9974-e4d3091158f4','private','private','','private/0/0','t6vfpjyuo.jpg','jpg',18182,'image/jpeg','OPDdypFAouo.jpg',10000,'yes','ok','2016-05-07 08:42:07',NULL),
  ('9c0c0209-8202-4b28-a79d-11a56f945d26','private','private','','private/0/0','93ajb4060.jpg','jpg',110416,'image/jpeg','ÑÐ¾Ð·Ð²ÐµÐ·-Ð¸Ðµ-Ð¾Ñ€Ð¸Ð¾Ð½-29684644.jpg',10000,'yes','ok','2015-10-27 12:51:09',NULL),
  ('cfd0079d-a799-4e5b-9fa2-8a5af8e144d1','main','media','','public/0/0','8rdv3y9xa.jpg','jpg',777835,'image/jpeg','Penguins.jpg',10000,'no','ok','2015-10-27 12:51:36',NULL);
COMMIT;

#
# Data for the `old_media_storage_reserved_size` table  (LIMIT 0,500)
#

INSERT INTO `old_media_storage_reserved_size` (`location_code`, `size`, `created_at`, `updated_at`) VALUES
  ('main',0,'2013-11-28 09:17:20','2016-04-08 11:42:13'),
  ('private',0,'2013-11-28 09:19:55','2016-05-07 08:42:07');
COMMIT;

#
# Data for the `setting` table  (LIMIT 0,500)
#

INSERT INTO `setting` (`code`, `value`, `created_at`, `updated_at`) VALUES
  ('admin.module.pro.stat','2345667','2016-06-16 02:08:08','2016-09-25 19:25:36'),
  ('site.main.default_language','ru','2016-09-05 18:13:35','2016-09-05 18:13:35'),
  ('site.main.default_module','Home','2016-09-05 15:02:56','2016-09-07 21:17:24'),
  ('site.main.description','Сайт о сайте','2016-06-16 01:34:15','2016-09-19 22:26:47'),
  ('site.main.feedback_email','geroyster@gmail.com','2016-06-16 02:05:07','2016-09-17 14:48:27'),
  ('site.main.format_date','d-m-Y','2016-09-17 16:34:02','2016-09-17 16:34:02'),
  ('site.main.format_time','H:i:s','2016-09-17 16:34:02','2016-09-17 16:34:02'),
  ('site.main.name','Сайт','2016-06-16 01:34:15','2016-09-10 00:43:33'),
  ('site.main.name_separator','::','2016-09-07 15:39:11','2016-09-07 15:39:11'),
  ('site.main.register_type','verification','2016-09-14 02:16:48','2016-09-19 00:23:46'),
  ('site.main.url','http://cms.local/','2016-09-17 16:34:02','2016-09-17 16:34:02'),
  ('site.pages.default_path','/pages','2016-09-05 14:54:40','2016-09-05 14:55:01');
COMMIT;

#
# Data for the `site_email_template` table  (LIMIT 0,500)
#

INSERT INTO `site_email_template` (`id`, `name`, `title`, `text`, `created_at`, `updated_at`) VALUES
  (1,'site.register.success','Регистрация на %sitename%','Здравствуйте,&nbsp;%username%.<br /><br />Добро пожаловать на&nbsp;<a title=\"%sitename%\" href=\"%siteurl%\">%sitename%</a><br /><br />Ваши регистрационные данные:<br /><br /><strong>Логин:&nbsp;%login%</strong><br /><strong>Пароль:&nbsp;%password%<br /><br /><br /></strong>С наилучшими пожеланиями<br />команда сайта \"%sitename%\".','2016-09-17 16:31:39','2016-09-17 21:03:41'),
  (3,'site.register.verify','Подтверждение регистрации на %sitename%','Здравствуйте,&nbsp;%username%.<br /><br />Добро пожаловать на&nbsp;<a title=\"%sitename%\" href=\"%siteurl%\">%sitename%</a><br /><br /><strong><br /></strong>Для завершения регистрации пройдите по <a href=\"%verification_url%\">ссылке</a><strong><br /><br /></strong>С наилучшими пожеланиями<br />команда сайта \"%sitename%\".','2016-09-17 17:26:50','2016-09-17 17:28:25'),
  (5,'site.register.forgot','Сброс пароля на %sitename%','Здравствуйте,&nbsp;%username%.<br /><br />Вы или кто-то еще запросили сброс пароля на сайте&nbsp;<a href=\"%siteurl%\">%sitename%</a>.<br />Для сброса пароля пройдите по ссылке <a href=\"%verification_url%\">здесь</a><strong><br /><br /></strong>С наилучшими пожеланиями<br />команда сайта \"%sitename%\".','2016-09-18 02:52:00','2016-09-18 02:56:37'),
  (6,'site.register.confirm','Регистрация на %sitename%','Здравствуйте,&nbsp;%username%.<br /><br />Добро пожаловать на&nbsp;<a title=\"%sitename%\" href=\"%siteurl%\">%sitename%</a><br /><br />Для подтверждении регистрации пройдите по <a href=\"%verification_url%\">ссылке</a> <br /><br />Ваши регистрационные данные:<br /><br /><strong>Логин:&nbsp;%login%</strong><br /><strong>Пароль:&nbsp;%password%<br /><br /><br /></strong>С наилучшими пожеланиями<br />команда сайта \"%sitename%\".','2016-09-18 07:27:09','2016-09-18 07:27:09'),
  (7,'site.register.premoderate','Регистрация на %sitename%','Здравствуйте,&nbsp;%username%.<br /><br />На нашем сайте включена ручная проверка регистрационных данных. <br />После проверки данных Вам придет письмо о подтверждении регистрации.<br /><br />Ваши регистрационные данные:<br /><br /><strong>Логин:&nbsp;%login%</strong><br /><strong>Пароль:&nbsp;%password%<br /><br /><br /></strong>С наилучшими пожеланиями<br />команда сайта \"%sitename%\".','2016-09-18 07:31:19','2016-09-18 07:31:19'),
  (8,'site.register.premoderate.confirm','Подтверждение регистрации на %sitename%','Здравствуйте,&nbsp;%username%.<br /><br />Добро пожаловать на&nbsp;<a title=\"%sitename%\" href=\"%siteurl%\">%sitename%</a><br /><br />Ваши регистрационные данные прошли проверку.<br /><strong><br /></strong>С наилучшими пожеланиями<br />команда сайта \"%sitename%\".','2016-09-18 07:32:35','2016-09-18 07:32:35');
COMMIT;

#
# Data for the `site_group` table  (LIMIT 0,500)
#

INSERT INTO `site_group` (`id`, `code`, `is_disabled`, `created_at`, `updated_at`) VALUES
  (1,'everyone',0,'2016-09-05 21:58:07',NULL),
  (2,'banned',0,'2016-09-05 21:58:32',NULL),
  (3,'premoderate',0,'2016-09-05 21:58:44',NULL),
  (4,'user',0,'2016-09-05 21:58:52',NULL),
  (6,'moderator',0,'2016-09-06 00:50:08',NULL);
COMMIT;

#
# Data for the `site_group_access` table  (LIMIT 0,500)
#

INSERT INTO `site_group_access` (`group_id`, `package`, `structure`, `instance`, `rights`, `except`, `instance_inherit`, `instance_invert`, `created_at`, `updated_at`) VALUES
  (3,'_GLOBAL_','','',1,0,0,0,'2016-09-05 23:18:37','2016-09-05 23:18:37'),
  (6,'_GLOBAL_','','',111,0,0,0,'2016-09-06 00:58:10','2016-09-06 00:58:10'),
  (4,'_GLOBAL_','','',47,0,0,0,'2016-09-06 00:58:39','2016-09-06 00:58:39'),
  (1,'_GLOBAL_','','',1,0,0,0,'2016-09-12 23:25:07','2016-09-12 23:25:07');
COMMIT;

#
# Data for the `site_group_user` table  (LIMIT 0,500)
#

INSERT INTO `site_group_user` (`site_group_id`, `site_user_id`) VALUES
  (1,4),
  (4,1),
  (4,14);
COMMIT;

#
# Data for the `site_menu` table  (LIMIT 0,500)
#

INSERT INTO `site_menu` (`id`, `name`, `url`, `target`, `parent`, `position`, `created_at`, `updated_at`) VALUES
  (2,'home','/','self',3,1,'2016-09-09 20:04:15','2016-09-09 23:30:39'),
  (3,'TOPMENU','TOPMENU','self',NULL,1,'2016-09-09 22:31:34','2016-09-19 09:28:45'),
  (4,'blog','/blog','blank',3,2,'2016-09-09 23:38:30','2016-09-10 03:05:21'),
  (5,'photos','/photos','parent',3,3,'2016-09-09 23:39:00','2016-09-10 03:05:28'),
  (6,'about','/about','self',3,4,'2016-09-09 23:39:22','2016-09-09 23:39:22'),
  (7,'links','/links','self',3,5,'2016-09-09 23:39:58','2016-09-09 23:39:58'),
  (8,'contact','/contact','self',3,6,'2016-09-09 23:40:22','2016-09-10 00:42:07');
COMMIT;

#
# Data for the `site_page` table  (LIMIT 0,500)
#

INSERT INTO `site_page` (`id`, `title`, `slug`, `text`, `main`, `published_at`, `created_at`, `updated_at`) VALUES
  (2,'fdsf','fff','<p>dfsfsdfsdfsdfsdf</p>',1,'2016-09-07 00:00:00','2016-09-01 14:17:47','2016-09-07 00:17:02'),
  (6,'Рейтинг ELO в играх для двух игроков','asdasdasdasdas','Раньше наш рабочий процесс прерывался из-за ряда неразрешенных вопросов:<br /><br />\r\n<ul>\r\n<li>А кто из нас лучше всех играет в настольный футбол?</li>\r\n<li>С кем бы мне сейчас пойти поиграть?</li>\r\n<li>Кого надо уволить, потому что он не работает а только играет?</li>\r\n</ul>\r\n<img src=\"/media/0/0/dsf1wzhct.jpg\" width=\"471\" height=\"353\" /><a href=\"/media/0/0/lqsou168a.pdf\" target=\"_blank\">dddddddd<img src=\"/media/0/0/iqdr7h2o0.jpg\" width=\"375\" height=\"353\" /></a><br />Наш опыт решения данных вопросов с помощью системы рейтинга ELO будет рассмотрен в статье. А также ссылка на репозиторий и на сайт будут разбросаны по статье.<br /><a name=\"habracut\"></a><br />Когда компания маленькая, а игроков еще меньше, то вопрос лучшего решается простым проведением турнира в пятницу вечером раз в пару месяцев. &lt;совет&gt;Шикарнейший повод выпить за счет компании.&lt;/совет&gt;(Мы по неопытности это не сразу поняли. И сначала просто так играли.) Но компания растет, лига тоже увеличивается, и вот уже отыграть турнир, даже с учетом предварительного разбиения на группы, становится очень сложно. Это просто физически тяжело на большом футбольном столе провести 15 партий за вечер.<br /><br />На данном этапе опытные <s>игроки в онлайн игры</s> шахматисты подсказывают, что существует метод расчета относительной силы игроков ELO, которая как раз используется для оценки уровня шахматистов.<br /><br /><iframe src=\"//www.youtube.com/embed/88HwWY0sSvU\" width=\"607\" height=\"360\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe>',0,'2016-10-07 19:30:21','2016-09-02 08:15:21','2016-09-05 13:00:31');
COMMIT;

#
# Data for the `site_session` table  (LIMIT 0,500)
#

INSERT INTO `site_session` (`session_id`, `last_active`, `contents`) VALUES
  ('57d46ed8cf6fe5-25235724',1473539942,'47bwNhuYNf5Oly/EwELR7RrK/4HWMs6R8u/FY2AuHjYHT2ApRE4iXpgl5ijDtdNW38NEVyc3Zbgr2B6cklH8k9k3Hu+RZFCUexE='),
  ('57d5ad026d22f9-86941052',1473639025,'cvzZ2DmPUKMc2N3J+/3tZwhTPLjs58pou1+jVwyooLUZiOocyDH6+nxyOV6J/nkcc+c1uIF5Z7z9dOp169MTC25k1s/0aP43Gvo='),
  ('57d70f06404220-91064074',1473711952,'vGK+QJRn9pF8iuiRCtsYywCsYLd+ntBKkqp2+pyXaCquLZpaDchMoQCD7MYsTns4LFQ5vfMAlztdXd4ApkLZo2f/GgH2oMMb+ks='),
  ('57d7de39188ed7-25738230',1473768532,'cKLag0X1URl1trWxQfmz9w9I33qoU8NEPqV7B01TkasWp1fAYOPqpwLCRFlSHWhg3AvFn6QVlbDa0OJtETxV+Ja4cWL7KGUdfOI='),
  ('57d7ecdf78ab88-04055048',1473768674,'RQHhs4sI7aI2oZZONKJbt9r29dGsd7TbTk6B8p0ZmNd7Kv9sOL4Rc930SuJB08SQ9+VLWZqAmaboGa78YkR0DAbmn7U9/dVJsAA='),
  ('57d7f2741bfac1-04981207',1473770539,'1TbiaHVJ033+JH2rUChK6WYAcBS+P84uaKO6JtQkkdxBPgU6dRsD0N+fMeDhtMQ1DpDg3HfR1JUOABatW9kicCwrO6xz8T51eUo='),
  ('57d7f43f8c44b0-03903160',1473770559,'2RkJAjbBq5/TOCC1HKXBA1NqlbQrdAKnx7sxINU2Fw+h2abrDetEo1nnwMo1ssa5pxE5WpnP+iWv7uY9dbh4zujohGsanWchk1A='),
  ('57d7f47b402f10-70913613',1473770619,'RwWc6Z2IS0m5qo385N5q7nfCAZ0ObTpOKf7XputTVzMbKxjY9h7r3wOgIXMDZv8PacV0cg+3T8sa7N5q9w9Gmie3t5QGd38RDWc='),
  ('57d7f47c46e041-88250291',1473770715,'98Rf0zmxsbNChf3D2FQAdfIk67+qlVOGqtxB44KETvod/2KsrLJom7K1oGVrBfa56UkPg8PkfzzgR9xj5IeH5AHgRJpDpwTLHWg='),
  ('57d7f4ff279515-24519477',1473775450,'MrG63SivadADoxe/wZ3BKdxzGdrAtiU7HxFFrFAMPl9p9d5b7iedz9rN3Npqh9Ndvk/2cVezCQi0Ab4CHkDVJF8LmE/8q0dqKUE='),
  ('57d80824ef87b7-00952956',1473775654,'EjzpwAp1YH58OHsX2dRc8XXHceuFZaMVaPck8Bjdm9/CPyZdIIgAqekJyAAnUuRLsyV5wZZBaFfhdPslue5EA/7TpD4mog9ojtE='),
  ('57d80876aa0181-20300781',1473776195,'Q9GKpDA2mdsoiGllrA9LqziuVCbIV37dHVCQeQII/bJ2RPfYA2S5gtqTdjbjB0ZPmXaeO6Jg1SRyXMHzZlZW1rIZ8HMo5j6bAkMi2iLjUdkZBPxhBIegc87rKOYNjnkgcoN/huxsCcSvOW4='),
  ('57d80d1592a5b2-33374531',1473776917,'4jFh6qcrmhojMOcl/g/57HZbBotGHsNf5CcUuEHKf8bukW8Wx+iIkFEGoHAJNjf7VKY4CEZPm81vghOvGj2iRXbYL2KLQehc9l8='),
  ('57d80d4ef14982-25908793',1473781367,'7b5sq+oULHuROvFJJxD8mogNm8if6w8Ao7yEyD3LMRAyyVvhTBFc2BPwvc1+PTxShvVrKypCO1Nr2gohR+00uarHftz2tTgoYUs='),
  ('57d81ed2f27515-71639991',1473782113,'Mzkaknp+dp5TgRZdfoj/RBLAkGZiAJyRCyFdQ+JcUmUFs1BRIhUW3ACZE8GbyYctXAFHoSD1Mu0sW4UaJk5kXPQIQMqvT6mK1yY='),
  ('57d824b6ecbaf0-06104675',1473783184,'55J7NYW9bUxYttFIsZuucU+K+/3g0sRrwP1OqpqGaF+s6VSbDhEjeku4sZ/q7I81tV0oYGJ00gbk7dJXvA7eA4aSKr937XiOH38='),
  ('57d8277a247525-86069055',1473783705,'HqVJV/l1J6adTSg/hnebb/gVhbxEynoA/VUZPzvh5v7Pxp9LkeeH5tU9NsqlXncMTGf7uIBZUklv+zxtbcJm69fb92KVL0LXY4U='),
  ('57d828356e81d5-47739793',1473795480,'PyrL5G5d3wmhRBszhkizGo5s8BkD+t9vOoeiXKTuvmgbP0CXlq7sy2OLliraPQ1J7bV9F56Z/3Bd8IghQmr9mscfH8x6VDTz6Kc='),
  ('57d88d55478ec4-27550041',1473809899,'kdnv8GWQVULflOtsvH5hhQzklnzYiAYOT6/9ngT8Ugpesdbnd5zj9YbRPntduybJqDjRIEfL1jblfPV70RuL31yZGokJePEZyYk='),
  ('57d8a3581857e2-93685541',1473815411,'0RcZ7JtSJ5YpCmSg5xc4NvuYmrpSK3yOWU7dnLEYfQxhbhP2qyEY8q015oc+DQY+E8xqzD2T4Wfs8pkFA7xTc8a3ob0aTyQ8LY3A7tScvJn2Irld1rMi8JfKcxzm2jwPzeiUXQyfzJIGSKU='),
  ('57d8d20e244ae2-79745226',1473827342,'/snfZSDGYIuOARGZPaLu7yaxMrlC0qADYoZathBdfXRzljFXHgGQ9zzVikTZ1DB/pYAUQsFfKsJbkH4Ytr3xezlTOtQYZVvHH2g='),
  ('57d8d91e9d1d60-46416351',1473829150,'h3esWrxjh2qIMpkbGzPZsAlI69Wa960HdKYQK1lTh9tzfIkcX8N8Vc51jZuIr4x1EiQlUAZ2J2Ea7BsigV79kwX6t4dqOz3Y2FU='),
  ('57d8d9a7602188-73750998',1473829396,'+nW+I9/9CVTQ5AwNVCrkPtp+6Q/JrgbX7oDfMBP7P4S0YRPgBlH2rB8DG8UC006qsS8h2HEwO0sHDUx1Hl3p53GandKCHvKp1j50Lf22je4TY0jN5QmJJkqzhDeREOwgPqGJ5A3X8bq/nvs='),
  ('57d8da39952597-35521101',1473829450,'8q7nN708nud5M0zsXYw0AHNq2h9xyWBTYV/6CqDl8vdWaA8oZ7xYq0ahSOZtvBDGlZspnXwB3mN2dljo3py+DVhrAeVmyPUhdejlQcHXZGnCstt7rJVEy48ApHEGz1wzSTM6y/ifPBLHsyI='),
  ('57d8da4dc7aa01-63489048',1473829455,'KnC3QL33N6L8dTOyNsl7Qh9C/Gwh9uj6M93Q9umJZZqiToqytNjuGN7C6FVJIIp/qeYmUh4IibxUoH6WbaveyGlUL2CCc5OXO6c='),
  ('57d8db41b2c6e0-36145513',1473829807,'1jgl7DbPtRDkGY2lvzQZ0wgaQ1dg3mzLXSJ3NEMJ5wmCO5qpiZgcBL3sAQro/tREYbU6LCRmOVjBdTwQ+1+X7qNpzovMPslZTKA='),
  ('57d9a823073683-92512408',1473882147,'bSHJiu+2YpsQ/yyUhynkVUocugZpmcl4SMt4gDRrwPiqBzaWA1vz6lQJeK49LJsl/jhXiKwSqg0Mg529b4GvnNI/ZSQ3qdCfAyE='),
  ('57db09f118c8e1-59030302',1473972802,'cx88+ozuKd1bRBMjykt1z9I4YsG/RqGXvIKjRRx/DJNWEt9pSkymHS0eizmqLUOTPMXXe0QkDq8RgmfDzZ/XiQr8HO7omyD+DGA='),
  ('57db185b4e1df6-66594772',1473976411,'WuV8MJdn6lvj3xX4R036MbLqBc7Gq09RX9cazq/hwlp0HY+0G72osmLjKtT0VXPOFrXdwDZ7KhOvFAbd3w7yavjaoyWgXlj2pEE='),
  ('57dd1783ca2a97-83589699',1474121316,'26a8dCh96eRqsbnTdlzRrlBJt1p79ZWGznM3JAcYJDJe5gEmJ7RaPBec1QWWdLsZrj+6KCV4oOXnQE48exwmS7fn+uA12NlqLa4='),
  ('57dd5545a6c934-91461907',1474123077,'8frYTUFAyfA2QKze1yN1D6obPjS9dDkW22PMy2+MtY5ofgFphdTelXtg4B2qVcr/5ouTUNJo1TcEkZA5qoG+IJfpiZch+juevY0='),
  ('57dd57f1099616-87002029',1474123858,'k6iLL8K7ErM42dDV9icZihBccxqgLirXcQyVT0XPaykL6BidntIpgnCQqF1VY/edsEi5azPlxFnLwDQrSRIGMtSr4yc5VKObzmU='),
  ('57dd6fa05d1b38-70210001',1474129879,'ZwTuWfsM6ZMPFPOISOCUW9sEFmNUm2VWxVmW6MJO9Nz2i74MfaHIjDMKUi1ukTY1eK8uN6L4pjX/NhYoHivqMQwECaxx7FhV74c='),
  ('57dd6fe4e90576-51588803',1474129977,'Vo5iLePBs3pTNnm25K+5RBLu7UVHckwJQWjKmjGY8pzNyRuDUduOcVij/vgYwR4eEMR7twfI6kub+fnBsar5nrU1tcJIfOUUq2Y='),
  ('57dd71749b5131-16857775',1474130492,'OSfMMAlqsAHuxY+lJiS7Zvd+4AleST5HaGu40QCtIEFbDqviSFzs4W8VYgbY8U+70qAnsrvzBKyMA/TfUKdYxmT6SxhxtIB3IvY='),
  ('57dd727cc162c9-98211154',1474130556,'s/9KAKGtU0KiEVALAD4ZZcOi195xxXB4P7ji/3UUuyp7y+xiuNtywWQ/oX1OpTkXmjmk2nWExbZYe/r6zOzUveV8EY97axiCuNnfF7FG81Sq+r7TuVWm4yiMOtLubiD8SR43O6MhNKVydVg='),
  ('57dd8545c0bb68-07205839',1474135365,'z2csaZAv7i98PGf64HAQJgYpbVvjmGuVQdPThXPuj7iBOoN8RfPx3SXFh58COsSEsiUryHJaK2pTDZ5TpbianFFGgogkW3nlhKUNesHJbc6p0wJ03XjkB3XDh4b6tczKkc7vL4BSjeUCPQc='),
  ('57dd85f4707d23-78743025',1474142975,'hf47S2QY/3NVkwkQsbxUwEA0elkhbZdJskB5YWfrbIbdpol+wXnHN55Rxs+ai87ZhlekTP3QKDz4FBtJP+zd37VsVrYfY0Fle6g='),
  ('57dda39a311771-87454052',1474143138,'fEu1AsaTnz43ExXSZOICyXZb02p3M4ezOlmdWzkB59QpSa6je296tOEiLSoRvpfC4IZPdXpOsvsSH8Qj6ZFyg7SfNT0LLkeW5+o='),
  ('57dda7e154d839-77605633',1474152833,'AkfNcowK0HXxKmoa9qRZ9q1OOYDnaqVCiVpalmDDcIqrs8TPZpKKyuNatGVfbiV5WzVruxy1pRsHnPeGh9cUthcf+Yw6dxhR1TE='),
  ('57dddbdda0f9f0-06225899',1474158562,'L2pHbDLrvnZ+JCBa28QKWvAwLFgR/eC+qszfa76f9Hct9nUw+yTRlZxLQoCb/gCBeBS6PPJzfYy0+72HbVBBQoPIupAADkA3SZG1gnboMdfUyQOeK5m0qveGamfRrEL037UpmqFcqMTO1rSuuqiLPg=='),
  ('57dddfe3e21569-88733468',1474158563,'WaCPbUkGWuaX/j0zil027IZci/NZkAVXHkHumAWEp6cdpCV1z7Ly9XN+rMPseSQY0+7vxVo/voBZKibTZnHccISCWim+mYSjsFo='),
  ('57dde01355bf06-36939540',1474158611,'l2GYmrB8L41n3z5N27DNSDGFUmdhVJbQrOZTYTnsOPUHwjwWYMHg2Y+FzLavOMg0LQYKp4jLwNgfLX7itzvTVUT5uLJpAhVa9FnroqyKvA5lmxJPbyd9n/6moXkbmVz+k5eqFUtzF+dG02g='),
  ('57de22c69b0916-87133039',1474176844,'0B99jGekUPh48+FFNCKXky+IB4aun/PXCRoAhAGKngjcv5hTWlp8r2bk8idvmRKdn85LjyWrXgUstMpmm5K2uLibxACKsIuhlIDN6WelXPyo0exqNNi526lzaiLNKAhvEeO/6gPpJ4SYOJiovfnxVQo='),
  ('57de27ee3fa536-94574897',1474177011,'DCJ9UU89vPtCd/UtT9eclvo9r0HZXveWL4ulz6+edQPE9lBYPB3w5d2lfE178Pm9JFF0MBabttbiW6tJ9LEdbPY3w9K64CFsNGUogCNMZ2UQ6FLGjqHiWssCqWFVk56v2f2AO3kTHSpCJZwxavSBtw=='),
  ('57de27f52b8195-63621433',1474177241,'QlVFoBNR/2RWdvYpEwH3lSUeyLBkdIL5V8JqdrOtvf+Yjf4ZO4IJMSojCQ9Vc6rvTaJA5rEuOweDvULTwmFr9iDpzO/b0b+4UNbFebZsrJTFMly6WPbFbCMs7jvJad6/E/clv3dvll/QSnVlUDcV'),
  ('57de298991aa07-29964509',1474177417,'cgdTIyu31Xs/pjcXp9wbMm9adwAIiJL+nBq9MfBSS392LyGjVXmAsWbCJNWpbuaRG4ilPwXtEyf7y78XSPNWFI4iVvRvlBPErqj5xxZ6qm2kYUboG5Yix3SUPLQPpooAP700UaF5uyM+idVEETvGZL6sxUp+h6iFbUAsTEmSMJPHEen5a4p0Amm1HGRIvygCKQ=='),
  ('57de29953c9188-42100745',1474177429,'K8e/g0CLytMs/TuEXifP5F9K/NVkZdNcAZs0YqdiMm3YYZFB/Oe2eJOp3kkzj6NUh+sF4xhB2rWk3P88vhBFBChTSMoViOgmxfxAruKC+sCcZaMw9L0vuaCKoDRNCY+/dzxWc5WCWKMhOTUqM0+m'),
  ('57de29a8af7d12-01344860',1474177453,'rHBzxL0E8UHxmvPL7REn5sXP/RZfZEis611BjIaWXcdW/S5eOfSz3FSpP1eO7sKaXBJl6Ts35GDw/oVohD18NF5jGacB2IJIy/Ttipc3sfuyEzqM88igFp9HLOTI8HAn4csF5/d9TkjDRTY='),
  ('57de29b48c01d6-27503433',1474179662,'6Od1PWDU1pByDOI1lYcQQQ11SKA5mNx3kkUzm9bVGD1r9RTWXgAGw3GKJKXrAkgfME4aXRGlfXgEcaL3cMJLBh/JTTVN4Pv8rks607B1DMUl/9XzLFfj8vvfpcGib2M5DK3ll6by3FTmWjNmRRz+YQ=='),
  ('57dea149434819-58560919',1474208079,'XnyFFcGMbkAct9J7m+Nm6XB9bnYbtQD9B/dyfchGVzKjUyARFi9/V+BPDi6dprAyNvvocn37mGlt1aNrIL0btE3AeyKkMTnSugm8/Q5dC97tFg0f2KMYYAYAG2pEMmaGasUJ6IlJm2w4gIL55wAFj90='),
  ('57df080c7e0808-99160834',1474236434,'lsheet00+ta1Lfts1wOGFFp3A/dSdZfSmwehQNzh7YoIX/PY203SLHjlr2hZOmDZHF6Aa2PRpinDI7YP/owa5kR9BNaF9pDqu5M='),
  ('57df8519425901-42670443',1474266529,'eIEMxWmJR+FKb7ECu9bxYlixpYQRAaSinX5wTkFpZZGK/EbCWqxuRs28DTOm+WWS58lAxHR1unm2fFtAxY4/D44DmXJqOCB7H18='),
  ('57dfa17c895e70-71077696',1474273661,'afJPa6UyGRtMWirmDvHMoLXYE6E2BPgzX173NuixvjvhxQlpYX8XyHu74LI9HSc1fL/cOEMqUUknWGecpCd+DgLFVgXM7c21NZc='),
  ('57e0337033ff88-99828404',1474314263,'Bjc9vYg6DBXj8Oxqw076WGjNNNJjHgjJtXAnv+DdE3rgyROcaVWuHdGgTUStMOF7JTsRIVqMuYS3FOCbo9a73eCZAiyywTBAdQj5tdI8xEXYhe04GBqXbKLUD5AuiaPx5MoGK/gPuFfgf3g='),
  ('57e1887846dcf4-78656012',1474398328,'E3gtIuoQM4Etd9LocjCK0sKM5619YF/qcioSbDDpmayARZJAD8U+nwhjZsjYBJSW2dgEGDlRfRLwwMMi/UwP9zt7KAs3mFKYwgcB5qVqvUvS5cisA99J6r7KgWdIW+iQxZSEAlEr79P5ykBtI4rz5R4r+aU4OBo5JigfLaZeh4jWV2vGbEFFInKmND5yNUNM'),
  ('57e2eb39dbcfe8-51415466',1474489145,'MTto2OwlNyZAgsXwDT3SsyI6vHpu6E9Wud2ykL6Q1xE9BeIJ7v5ZrCvNAo9UF981C9RMB2cvBS8e33NUFcmIr+VAQ7TmYS+CaWI='),
  ('57e5d10c878761-56392850',1474679059,'tzD0ThoEAtwjWMRy3ymHQoqajk2UbeZTnsCoGkxDsYzaq6zKLmn//Wq9aqv2SgnjKlWF/1drJM3Dukr3EsgvP6XNkfp5QqrLQHf1yFtq1MGGY4oFRd2AOiy6ktSpUeXpCmfA05YWOrmuxk/P8PkfMpyhWjcp71Pov4tp31gZJ6gVi7Huw7A6wD4r7E3BuRrtiw=='),
  ('57e6e7a29ea541-41371351',1474750423,'pOj31wy+gByuyMA8X3rPhfRulRS//Oigh28ucyLGCD/zlR8sX1lg+nAK0Kui2Ta0qMBRoMoYluovzK/yrSrMR4cYBZ5oL+MCAlI+honYGp1Rcw2rtPj13AV8yqa7iDCd3RmFj1aLbo8yQ0k='),
  ('57e70aae0e3ae3-10336149',1474759346,'XGyUKYpaFwCkJ42s/Z0nsnRAj1TNoyP9dc6nGZk3Rpdq6furB0oDit94UauM8OFlmTyIKQwhgK17xamoNxyqVG4CSACs/S3Yv2M='),
  ('57e7c068b50ac7-19186658',1474805866,'NDFMF9hu03ttTmobnoSJThV6FESReTnTvYtotCzwRH/Vtg/D+HZBNgOfoVyWjMer8Uc/TWW8qdX9gbG0Fpjynn/soRbCKAoYXxs=');
COMMIT;

#
# Data for the `site_user` table  (LIMIT 0,500)
#

INSERT INTO `site_user` (`id`, `login`, `password`, `password_salt`, `is_disabled`, `nickname`, `firstname`, `lastname`, `birthday`, `last_login`, `last_ip`, `last_ip_forward`, `created_at`, `updated_at`) VALUES
  (1,'geroys','f7d2924a3d5e09da5fa5f9d3a0eeaeab','f8c78e0d3a',0,'AZoom','Alexander','Zoom','1982-06-12','2016-09-24 23:52:50','127.0.0.1','178.66.102.44','2016-09-06 00:11:56','2016-09-24 23:52:50'),
  (4,'anonymous','edd5fca4860e96b5194ae43a7154280a','cecde9d080',0,'anonymous','','','0000-00-00',NULL,NULL,NULL,'2016-09-06 07:34:32',NULL),
  (14,'geroyster@gmail.com','8d933db4d92a2fe1893fa12bc3bbc6b9','a800819363',0,'AZoom',NULL,NULL,NULL,'2016-09-19 00:32:41','127.0.0.1','178.71.205.148','2016-09-18 22:30:52','2016-09-19 09:53:23');
COMMIT;

#
# Data for the `test` table  (LIMIT 0,500)
#

INSERT INTO `test` (`id`, `name`, `date`) VALUES
  (2,'Petya','2014-06-18 23:42:08'),
  (3,'Vasya','2014-06-18 23:42:30'),
  (4,'Petya','2014-06-18 23:42:30'),
  (5,'Vasya','2014-06-18 23:42:43'),
  (6,'Petya','2014-06-18 23:42:43');
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;