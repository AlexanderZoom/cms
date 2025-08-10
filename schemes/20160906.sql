# SQL Manager for MySQL 5.5.1.45563
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : local_feed


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

SET FOREIGN_KEY_CHECKS=0;

DROP DATABASE IF EXISTS `local_feed`;

CREATE DATABASE `local_feed`
    CHARACTER SET 'utf8'
    COLLATE 'utf8_general_ci';

USE `local_feed`;

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
AUTO_INCREMENT=4 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
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
  (4,'general','main','',1,0,0,0,'2016-09-02 02:45:11','2016-09-02 02:45:11'),
  (4,'static_pages','main','',1,0,0,0,'2016-09-02 02:45:11','2016-09-02 02:45:11');
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
  (19,32);
COMMIT;

#
# Data for the `admin_session` table  (LIMIT 0,500)
#

INSERT INTO `admin_session` (`session_id`, `last_active`, `contents`) VALUES
  ('57b8b1c261d134-34029538',1471722600,'Y9cQQg6+qgk+M1Ddet7ElE7tToNQyJFr82NV5l/I6fsJuPYyYDlDCSYOoySFgx9mXlC9n4l3MKKSCdvEITHQxLvqmLKZ11L4e0XOgxfWOouxEzesL+v038KIX+fz52auC5+/mATbMkqtJ0VOjb6D/tnxoo3yfmhlvnkycGymGcfrPw=='),
  ('57bd5a9881eda0-22747784',1472027289,'Z/8VUCdPRwf5pcKfR2FQwKdgBoX16pdtx5osdHZn5I6kaoD/Ees8rAvgIyTW4qxflfZ1OWQiBr7LeZKyMIGLdHFnH7uJm5aZeVY='),
  ('57bd5ab37ab0f8-81073469',1472032296,'K1r3vOwqi+wdV8eDawXo0E6SA7YWUWthnh1S9aRNjZIIDoidPIP+yuwWiz73k87l5GqrpPkgQdL2c763qhDT8f//O9Zf8CQ2YEC8puzHPpvtc13npDAdZcJaDRoEhBb7+WddLFRjt3LIQKjFR0NYzdkgXCUXEIE4zvJJf34nnDkV7Q=='),
  ('57bd6eb5cccba6-66913462',1472032437,'pjR9V2aTinN+LBs6caQnZZzxPPqMFTuJiGI7EKqeMgL6ogOiK13xTJtNyLVSU/WC7lrAyCF+AZ1zQDamck6xtPBz9bKUExLEUq8='),
  ('57bda193626362-42940441',1472045467,'Wc78sYftCU2mLN2HWfy7oxR305Sh+V/11hpuXoxlcxKnZLeTzytkYmlnk9dNCnzlcC3Cq0GDK+ucKC9fKyJXroZFcO+tDjW/p579MkDI++hENJVTNs8NWfc1Wdcs2pMUdJmQWqEw2bGDQVeYt4uXaUwNS39vL7pkkASKLZ2XYpP2Lg=='),
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
  ('57cdea7098a0d2-53983039',1473115057,'4K5rgxxAoHvEAoCNZSNj2JyTNGxU7jyoZAvCC+FsQgrsH2XiTQOP7XU9peQPcmYvTK+iFQWwdMB4kj6HHz9Za1E/GEWSbuQ8KtfFjiDSnIqyEq1ROhedXkrmF09g0o08savrhEwhXFSlu/YD67sXQSn1EJ1CrDpKTL7BbIjNPOyG9w==');
COMMIT;

#
# Data for the `admin_user` table  (LIMIT 0,500)
#

INSERT INTO `admin_user` (`id`, `login`, `password`, `password_salt`, `is_disabled`, `last_login`, `last_ip`, `last_ip_forward`, `created_at`, `updated_at`) VALUES
  (1,'zoomerev@gmail.com','5d573efa40477813cf62d1d4b27de3e2','f450551be3',0,NULL,NULL,NULL,'2013-11-30 10:15:28','2016-09-01 10:26:36'),
  (2,'geroyster@gmail.com','43204d50183ba87b8c36073a6d71db43','f602b5b337',1,NULL,NULL,NULL,'2013-11-30 10:15:28','2016-05-07 08:30:21'),
  (26,'alexazoom','657a858911194a22687a9c961f8ce43c','a19949ee63',0,NULL,NULL,NULL,'2014-06-03 18:32:41','2016-09-01 17:23:08'),
  (31,'zoomerevev','be92dad8b1679162eabd019f253369a7','1b81de2e65',1,NULL,NULL,NULL,'2014-08-08 17:29:41','0000-00-00 00:00:00'),
  (32,'alexazooma','61a8018f912c2bfbde6b88f33c14d07e','1ead13b24a',1,NULL,NULL,NULL,'2014-08-08 17:31:06','0000-00-00 00:00:00'),
  (34,'aaa','de22da1567dc8d033542bdbb999d6a8e','302f96dd23',0,NULL,NULL,NULL,'2014-08-08 18:33:57','2016-09-02 02:41:41');
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
  ('9f64862a-9877-4a2f-86c0-5af4985dd113','__DIR__','media','/qwe/','/qwe/__DIR__media','??? ?????','dir',0,'dir','??? ?????',0,'ok','2016-06-14 22:56:04','2016-06-14 22:56:04'),
  ('e432960c-a0af-404c-bf0f-d14562ec5d78','main','media','/','0/0','gniqm833d.jpg','jpg',80511,'image/jpeg','tbl.jpg',10000,'ok','2016-06-14 22:36:44','2016-06-14 22:36:44'),
  ('ee2708b2-855a-46ca-879a-930305f26a3b','__DIR__','media','/','/__DIR__media','1234','dir',0,'dir','1234',0,'ok','2016-08-20 22:39:21','2016-08-20 22:39:21'),
  ('f06aedb8-d1c7-4292-a9ce-3aec0e480756','main','media','/','0/0','dsf1wzhct.jpg','jpg',845941,'image/jpeg','Desert.jpg',10000,'ok','2016-06-08 00:54:24','2016-06-08 00:54:24');
COMMIT;

#
# Data for the `media_storage_file_extra` table  (LIMIT 0,500)
#

INSERT INTO `media_storage_file_extra` (`file_id`, `width`, `height`, `created_at`, `updated_at`) VALUES
  ('1b65f415-5c2d-4791-8b29-d2e30ea1cee8',411,807,'2016-06-14 22:36:44',NULL),
  ('48d640f3-5acd-4879-8ba0-62b13e0442d9',604,568,'2016-09-05 12:59:47',NULL),
  ('e432960c-a0af-404c-bf0f-d14562ec5d78',973,587,'2016-06-14 22:36:44',NULL),
  ('f06aedb8-d1c7-4292-a9ce-3aec0e480756',1024,768,'2016-06-08 00:54:24',NULL);
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
  ('9c0c0209-8202-4b28-a79d-11a56f945d26','private','private','','private/0/0','93ajb4060.jpg','jpg',110416,'image/jpeg','ÑÐ¾Ð·Ð²ÐµÐ·-Ð¸Ðµ-Ð¾ÑÐ¸Ð¾Ð½-29684644.jpg',10000,'yes','ok','2015-10-27 12:51:09',NULL),
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
  ('admin.module.pro.stat','2345667','2016-06-16 02:08:08','2016-09-06 01:36:42'),
  ('site.main.default_language','ru','2016-09-05 18:13:35','2016-09-05 18:13:35'),
  ('site.main.default_module','welcome','2016-09-05 15:02:56','2016-09-05 15:45:46'),
  ('site.main.description','My first site','2016-06-16 01:34:15','2016-06-16 01:34:15'),
  ('site.main.feedback_email','sfsdfsf@mail.rus','2016-06-16 02:05:07','2016-06-16 02:05:15'),
  ('site.main.name','Home Pagesss','2016-06-16 01:34:15','2016-08-24 12:12:21'),
  ('site.pages.default_path','/pages','2016-09-05 14:54:40','2016-09-05 14:55:01');
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
  (1,'_GLOBAL_','','',1,0,0,0,'2016-09-05 22:58:58','2016-09-05 22:58:58'),
  (3,'_GLOBAL_','','',1,0,0,0,'2016-09-05 23:18:37','2016-09-05 23:18:37'),
  (6,'_GLOBAL_','','',111,0,0,0,'2016-09-06 00:58:10','2016-09-06 00:58:10'),
  (4,'_GLOBAL_','','',47,0,0,0,'2016-09-06 00:58:39','2016-09-06 00:58:39');
COMMIT;

#
# Data for the `site_group_user` table  (LIMIT 0,500)
#

INSERT INTO `site_group_user` (`site_group_id`, `site_user_id`) VALUES
  (3,2),
  (3,3),
  (4,1),
  (4,3);
COMMIT;

#
# Data for the `site_page` table  (LIMIT 0,500)
#

INSERT INTO `site_page` (`id`, `title`, `slug`, `text`, `main`, `published_at`, `created_at`, `updated_at`) VALUES
  (2,'fdsf','fff','<p>dfsfsdfsdfsdfsdf</p>',1,'2016-09-05 00:30:00','2016-09-01 14:17:47','2016-09-05 18:10:00'),
  (6,'??????? ELO ? ????? ??? ???? ???????','asdasdasdasdas','?????? ??? ??????? ??????? ?????????? ??-?? ???? ????????????? ????????:<br /><br />\r\n<ul>\r\n<li>? ??? ?? ??? ????? ???? ?????? ? ?????????? ???????</li>\r\n<li>? ??? ?? ??? ?????? ????? ?????????</li>\r\n<li>???? ???? ???????, ?????? ??? ?? ?? ???????? ? ?????? ???????</li>\r\n</ul>\r\n<img src=\"/media/0/0/dsf1wzhct.jpg\" width=\"471\" height=\"353\" /><a href=\"/media/0/0/lqsou168a.pdf\" target=\"_blank\">dddddddd<img src=\"/media/0/0/iqdr7h2o0.jpg\" width=\"375\" height=\"353\" /></a><br />??? ???? ??????? ?????? ???????? ? ??????? ??????? ???????? ELO ????? ?????????? ? ??????. ? ????? ?????? ?? ??????????? ? ?? ???? ????? ?????????? ?? ??????.<br /><a name=\"habracut\"></a><br />????? ???????? ?????????, ? ??????? ??? ??????, ?? ?????? ??????? ???????? ??????? ??????????? ??????? ? ??????? ??????? ??? ? ???? ???????. &lt;?????&gt;??????????? ????? ?????? ?? ???? ????????.&lt;/?????&gt;(?? ?? ??????????? ??? ?? ????? ??????. ? ??????? ?????? ??? ??????.) ?? ???????? ??????, ???? ???? ?????????????, ? ??? ??? ???????? ??????, ???? ? ?????? ???????????????? ????????? ?? ??????, ?????????? ????? ??????. ??? ?????? ????????? ?????? ?? ??????? ?????????? ????? ???????? 15 ?????? ?? ?????.<br /><br />?? ?????? ????? ??????? <s>?????? ? ?????? ????</s> ?????????? ????????????, ??? ?????????? ????? ??????? ????????????? ???? ??????? ELO, ??????? ??? ??? ???????????? ??? ?????? ?????? ???????????.<br /><br /><iframe src=\"//www.youtube.com/embed/88HwWY0sSvU\" width=\"607\" height=\"360\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe>',0,'2016-10-07 19:30:21','2016-09-02 08:15:21','2016-09-05 13:00:31');
COMMIT;

#
# Data for the `site_user` table  (LIMIT 0,500)
#

INSERT INTO `site_user` (`id`, `login`, `password`, `password_salt`, `is_disabled`, `nickname`, `firstname`, `lastname`, `birthday`, `last_login`, `last_ip`, `last_ip_forward`, `created_at`, `updated_at`) VALUES
  (1,'geroys','9e6f91ca67d8b39d2501684ec35090b1','f8c78e0d3a',0,'AZoom','Alexander','Zoom','1982-06-12',NULL,NULL,NULL,'2016-09-06 00:11:56','2016-09-06 00:46:28'),
  (2,'alexazoom','0f4a407aefd0404fea4bb6690b5c5897','1a876cb9e2',0,'','','','0000-00-00',NULL,NULL,NULL,'2016-09-06 00:47:46',NULL),
  (3,'1211','d766ac2422b1e8df8722cb0c8f82c6da','56192917b1',0,'1111','22222','fffff3333','1992-09-15',NULL,NULL,NULL,'2016-09-06 00:48:33','2016-09-06 00:49:14');
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