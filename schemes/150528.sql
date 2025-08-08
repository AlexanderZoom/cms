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
AUTO_INCREMENT=12 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
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
AUTO_INCREMENT=1 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `media_storage_categories` table : 
#

CREATE TABLE `media_storage_categories` (
  `code` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `hidden` VARCHAR(3) COLLATE utf8_general_ci NOT NULL DEFAULT 'no',
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`code`) USING BTREE
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `media_storage_file_extras` table : 
#

CREATE TABLE `media_storage_file_extras` (
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
# Structure for the `media_storage_files` table : 
#

CREATE TABLE `media_storage_files` (
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
# Structure for the `media_storage_reserved_size` table : 
#

CREATE TABLE `media_storage_reserved_size` (
  `location_code` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `size` BIGINT(20) NOT NULL DEFAULT 0,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`location_code`) USING BTREE
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `media_storage_vfolders` table : 
#

CREATE TABLE `media_storage_vfolders` (
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
  UNIQUE KEY `code` (`code`) USING BTREE
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Data for the `admin_group` table  (LIMIT 0,500)
#

INSERT INTO `admin_group` (`id`, `code`, `is_disabled`, `created_at`, `updated_at`) VALUES
  (1,'admin',0,'2013-11-30 10:15:28',NULL),
  (2,'member',1,'2013-11-30 10:15:28','2015-01-11 03:58:27'),
  (4,'member 2',0,'2014-08-08 19:37:54','2014-08-21 23:16:44'),
  (5,'qwe',1,'2014-08-08 21:12:29','2014-08-08 21:22:18'),
  (6,'asd',0,'2014-08-08 21:12:34',NULL),
  (7,'zxc',0,'2014-08-08 21:12:39',NULL),
  (11,'gbv',0,'2014-08-08 21:13:07',NULL);
COMMIT;

#
# Data for the `admin_group_access` table  (LIMIT 0,500)
#

INSERT INTO `admin_group_access` (`group_id`, `package`, `structure`, `instance`, `rights`, `except`, `created_at`, `updated_at`) VALUES
  (4,'general','main',NULL,1,0,'2014-08-26 21:02:40','2014-08-26 21:02:44'),
  (4,'static_pages','main',NULL,1,0,'2015-01-13 09:35:31','2015-01-13 09:35:35'),
  (4,'general','root',NULL,1,0,'2015-01-13 09:51:43','2015-01-13 09:51:47'),
  (4,'general','group_access_list',NULL,1,0,'2015-01-13 22:34:13','2015-01-13 22:34:16');
COMMIT;

#
# Data for the `admin_group_user` table  (LIMIT 0,500)
#

INSERT INTO `admin_group_user` (`admin_group_id`, `admin_user_id`) VALUES
  (1,1),
  (2,27),
  (2,31),
  (2,32),
  (2,34),
  (4,2),
  (4,34),
  (5,26),
  (6,26),
  (7,26),
  (11,26);
COMMIT;

#
# Data for the `admin_session` table  (LIMIT 0,500)
#

INSERT INTO `admin_session` (`session_id`, `last_active`, `contents`) VALUES
  ('553815e4a977f0-05843132',1429739618,'h5gen+HSwm0TG8ZwvH1HhBLVxyJCFOdtpD1Zi5VzTVda3T6Q00+4rPTgniniMn4ivrzSN1HRmy+jWd+PtyS+rCaELuirWksdyWry1y3hPCzFQ8zGiFDWHF5zufg83FkbpYa8xOWJQTLo9tt1G37f3pBerUV3ULGZZEt3mGgU2BUNFA=='),
  ('553838af1b5c54-20334382',1429747901,'SUCJciNlg3Tht4qEKge5lCR0mLY72119ZAoJYHhYSoBL9wTC1h8lmVgiib18nj6zv6xe2PLfx0YNr+ohTANQpltMKCEohTtBmxKVV65onPd1mGrYUAFyfdslQJd5KlbBZTe79li513I3TlD43cMf6nieNqslGNY6WByVYXvc9eHOcg=='),
  ('55385a5dce34e6-21240603',1429756510,'ojjYTjStwHj4/wRwiWa9HAbjILaTunab730ItWynpu6LlMF0VA+SvGhtIGkRm27dNHkY56U4ZgLzlRRdtBfMTlhMhjNmxEl79ys='),
  ('55385b2b368ee4-92929811',1429756733,'81lfeeNx77kS7VcumjRDARYoGNwzcLqNZPbg0CaAqJF98mM6rxNb0cqK8qnztIZ1R5Ni9NLOQfJ0G0LadeR7kZiOB1IXK3cM0hE='),
  ('553aa4135dad98-73982482',1429908723,'GOTaCpd5CaclWWnsnthbgBADP1VHI9CYo9kRkdaLJRAIrG4SnNVqYlfdZ4tDkdGhHPQH6bB2umkwfmnyRIdzLBMTIn81UH/4mqPsWoJ9ChTX2XSR4Y4XgZff5rjlx7vN3kFnwFpWeD2naFLh2RE5eEX9DOHQi0tFupw9qsc7DeMFgQ=='),
  ('553ac98d029606-00811776',1429923531,'4GzomMSjZF6mMN4FO8Bs/gMVYfAM5PTIqao709GVYgzngrU2VRtyycegeE+PLaSpbyzvYzs7wcbO5TpGR/VhFejMwgwyx1+WbIvDWT3l97U9CYqfGOXEDhtTQmPlIrKKekouqavglmxN0rx5pHkYAuD4aOsYsZzvjMLomD5Su4YveQ=='),
  ('553b3b6a5ebe32-66240512',1429945314,'8yf/qt3q/kvVtbUQCmXCgnFlnmAFCEckt7KtQnL7BUMQL6W1IFU4NIqFhbYXybOC9zTOm11OnNeyHBo9zjK3UbJ7mL0CbYUaJ7e4yAAXhr4ghSII8UwsIWkYOIlT7u0deWrpNpOLIYQJiw3BOjYvbYHDhKndZjeJrBoksBmuosZh5g=='),
  ('555a03e1c09862-15619146',1431963179,'lhoC+uRwXBf+V8WKYl7rtuHlKEI/t2q2LT+nSDkL0YhBCS9tbBW+RntgZ2qGwYLXXL1ZNs0C4vxYLsgbfyJ+HL2fSmVkrJtKExbyGHJxbC/1T8vbBcGWSzZBB6TLsAKBS/B6NMvE3Q2kk9qg816gHZtHHpAonfurjiMDkAnuyBe51g=='),
  ('5564dba93ab942-17762835',1432673194,'kwWBtWvAS9vaDabPaj3mzC1xvWv9wmo91MeDSSPfXA/tBFhn738kuI3sf9NJuPetEfKPGM9SNAM7KlOuEBa2o5CUH6sgfIBPxmo=');
COMMIT;

#
# Data for the `admin_user` table  (LIMIT 0,500)
#

INSERT INTO `admin_user` (`id`, `login`, `password`, `password_salt`, `is_disabled`, `created_at`, `updated_at`) VALUES
  (1,'zoomerev@gmail.com','5d573efa40477813cf62d1d4b27de3e2','f450551be3',0,'2013-11-30 10:15:28','0000-00-00 00:00:00'),
  (2,'geroyster@gmail.com','43204d50183ba87b8c36073a6d71db43','f602b5b337',0,'2013-11-30 10:15:28','2015-04-23 02:58:16'),
  (26,'alexazoom','72177960ef359b7a7536b70d59d63145','a19949ee63',0,'2014-06-03 18:32:41','0000-00-00 00:00:00'),
  (27,'zoomereve','a721beb0fb65c294460f3b16862c3749','2f5db12960',1,'2014-08-08 17:28:19','0000-00-00 00:00:00'),
  (31,'zoomerevev','be92dad8b1679162eabd019f253369a7','1b81de2e65',1,'2014-08-08 17:29:41','0000-00-00 00:00:00'),
  (32,'alexazooma','61a8018f912c2bfbde6b88f33c14d07e','1ead13b24a',1,'2014-08-08 17:31:06','0000-00-00 00:00:00'),
  (34,'aaa','de22da1567dc8d033542bdbb999d6a8e','302f96dd23',1,'2014-08-08 18:33:57','0000-00-00 00:00:00');
COMMIT;

#
# Data for the `media_storage_categories` table  (LIMIT 0,500)
#

INSERT INTO `media_storage_categories` (`code`, `hidden`, `created_at`, `updated_at`) VALUES
  ('files','no','2014-05-31 00:00:00',NULL),
  ('media','no','2013-11-28 09:16:19',NULL);
COMMIT;

#
# Data for the `media_storage_files` table  (LIMIT 0,500)
#

INSERT INTO `media_storage_files` (`id`, `location_code`, `category_code`, `vfolder_id`, `location_path`, `file_name`, `file_extension`, `file_size`, `file_mime`, `name`, `type`, `private`, `status`, `created_at`, `updated_at`) VALUES
  ('08e1184c-bcfc-443f-afb2-cfff22f69a98','main','media','','public/0/0','99elwu4da.gif','gif',4433369,'image/gif','7.gif',10000,'no','ok','2014-06-01 20:11:24',NULL),
  ('4e5817d5-ec1f-4cd8-922d-a328fb610943','private','media','','private/0/0','c1sow9zgw.jpg','jpg',170962,'image/jpeg','7B8Fny8Dlqc.jpg',10000,'yes','ok','2014-06-01 20:11:43',NULL),
  ('777fde91-9b81-45c0-8e83-1b27c1ab06ec','main','media','','public/0/0','sfug2rzi6.jpg','jpg',363212,'image/jpeg','new3.jpg',10000,'no','ok','2014-06-03 18:07:56',NULL),
  ('96c4aadd-d5b7-487a-9e28-bb92939047ad','main','media','','public/0/0','93vp5aqu7.jpg','jpg',357367,'image/jpeg','w_a5f8907f.jpg',10000,'no','ok','2014-05-31 18:42:24',NULL);
COMMIT;

#
# Data for the `media_storage_reserved_size` table  (LIMIT 0,500)
#

INSERT INTO `media_storage_reserved_size` (`location_code`, `size`, `created_at`, `updated_at`) VALUES
  ('main',8866738,'2013-11-28 09:17:20','2014-06-03 18:07:56'),
  ('private',0,'2013-11-28 09:19:55','2014-06-01 20:11:43');
COMMIT;

#
# Data for the `setting` table  (LIMIT 0,500)
#

INSERT INTO `setting` (`code`, `value`) VALUES
  ('site_description','FirstSite'),
  ('site_feedback_email','f@f.loc'),
  ('site_feedback_message','ddwwwsss'),
  ('site_feedback_subject','s'),
  ('site_keyword','site'),
  ('site_name','FirstSite');
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;