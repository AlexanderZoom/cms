-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: local_feed
-- ------------------------------------------------------
-- Server version	5.5.44-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `local_feed`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `local_feed` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `local_feed`;

--
-- Table structure for table `admin_group`
--

DROP TABLE IF EXISTS `admin_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_group` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `is_disabled` tinyint(4) DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_group`
--

LOCK TABLES `admin_group` WRITE;
/*!40000 ALTER TABLE `admin_group` DISABLE KEYS */;
INSERT INTO `admin_group` VALUES (1,'admin',0,'2013-11-30 10:15:28',NULL),(2,'member',1,'2013-11-30 10:15:28','2015-01-11 03:58:27'),(4,'member 2',0,'2014-08-08 19:37:54','2014-08-21 23:16:44'),(5,'qwe',1,'2014-08-08 21:12:29','2014-08-08 21:22:18'),(6,'asd',0,'2014-08-08 21:12:34',NULL),(7,'zxc',0,'2014-08-08 21:12:39',NULL),(11,'gbv',0,'2014-08-08 21:13:07',NULL);
/*!40000 ALTER TABLE `admin_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_group_access`
--

DROP TABLE IF EXISTS `admin_group_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_group_access` (
  `group_id` bigint(20) NOT NULL,
  `package` varchar(100) NOT NULL,
  `structure` varchar(100) DEFAULT NULL,
  `instance` varchar(100) DEFAULT NULL,
  `rights` bigint(20) NOT NULL,
  `except` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  UNIQUE KEY `admin_group_access_idx1` (`group_id`,`package`,`structure`,`instance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_group_access`
--

LOCK TABLES `admin_group_access` WRITE;
/*!40000 ALTER TABLE `admin_group_access` DISABLE KEYS */;
INSERT INTO `admin_group_access` VALUES (4,'general','main',NULL,1,0,'2014-08-26 21:02:40','2014-08-26 21:02:44'),(4,'static_pages','main',NULL,1,0,'2015-01-13 09:35:31','2015-01-13 09:35:35'),(4,'general','root',NULL,1,0,'2015-01-13 09:51:43','2015-01-13 09:51:47'),(4,'general','group_access_list',NULL,1,0,'2015-01-13 22:34:13','2015-01-13 22:34:16');
/*!40000 ALTER TABLE `admin_group_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_group_user`
--

DROP TABLE IF EXISTS `admin_group_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_group_user` (
  `admin_group_id` bigint(20) unsigned NOT NULL,
  `admin_user_id` bigint(20) unsigned NOT NULL,
  UNIQUE KEY `admin_group_id` (`admin_group_id`,`admin_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_group_user`
--

LOCK TABLES `admin_group_user` WRITE;
/*!40000 ALTER TABLE `admin_group_user` DISABLE KEYS */;
INSERT INTO `admin_group_user` VALUES (1,1),(2,27),(2,31),(2,32),(2,34),(4,2),(4,34),(5,26),(6,26),(7,26),(11,26);
/*!40000 ALTER TABLE `admin_group_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_session`
--

DROP TABLE IF EXISTS `admin_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_session` (
  `session_id` varchar(24) NOT NULL,
  `last_active` int(10) unsigned NOT NULL,
  `contents` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_active` (`last_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_session`
--

LOCK TABLES `admin_session` WRITE;
/*!40000 ALTER TABLE `admin_session` DISABLE KEYS */;
INSERT INTO `admin_session` VALUES ('553815e4a977f0-05843132',1429739618,'h5gen+HSwm0TG8ZwvH1HhBLVxyJCFOdtpD1Zi5VzTVda3T6Q00+4rPTgniniMn4ivrzSN1HRmy+jWd+PtyS+rCaELuirWksdyWry1y3hPCzFQ8zGiFDWHF5zufg83FkbpYa8xOWJQTLo9tt1G37f3pBerUV3ULGZZEt3mGgU2BUNFA=='),('553838af1b5c54-20334382',1429747901,'SUCJciNlg3Tht4qEKge5lCR0mLY72119ZAoJYHhYSoBL9wTC1h8lmVgiib18nj6zv6xe2PLfx0YNr+ohTANQpltMKCEohTtBmxKVV65onPd1mGrYUAFyfdslQJd5KlbBZTe79li513I3TlD43cMf6nieNqslGNY6WByVYXvc9eHOcg=='),('55385a5dce34e6-21240603',1429756510,'ojjYTjStwHj4/wRwiWa9HAbjILaTunab730ItWynpu6LlMF0VA+SvGhtIGkRm27dNHkY56U4ZgLzlRRdtBfMTlhMhjNmxEl79ys='),('55385b2b368ee4-92929811',1429756733,'81lfeeNx77kS7VcumjRDARYoGNwzcLqNZPbg0CaAqJF98mM6rxNb0cqK8qnztIZ1R5Ni9NLOQfJ0G0LadeR7kZiOB1IXK3cM0hE='),('553aa4135dad98-73982482',1429908723,'GOTaCpd5CaclWWnsnthbgBADP1VHI9CYo9kRkdaLJRAIrG4SnNVqYlfdZ4tDkdGhHPQH6bB2umkwfmnyRIdzLBMTIn81UH/4mqPsWoJ9ChTX2XSR4Y4XgZff5rjlx7vN3kFnwFpWeD2naFLh2RE5eEX9DOHQi0tFupw9qsc7DeMFgQ=='),('553ac98d029606-00811776',1429923531,'4GzomMSjZF6mMN4FO8Bs/gMVYfAM5PTIqao709GVYgzngrU2VRtyycegeE+PLaSpbyzvYzs7wcbO5TpGR/VhFejMwgwyx1+WbIvDWT3l97U9CYqfGOXEDhtTQmPlIrKKekouqavglmxN0rx5pHkYAuD4aOsYsZzvjMLomD5Su4YveQ=='),('553b3b6a5ebe32-66240512',1429945314,'8yf/qt3q/kvVtbUQCmXCgnFlnmAFCEckt7KtQnL7BUMQL6W1IFU4NIqFhbYXybOC9zTOm11OnNeyHBo9zjK3UbJ7mL0CbYUaJ7e4yAAXhr4ghSII8UwsIWkYOIlT7u0deWrpNpOLIYQJiw3BOjYvbYHDhKndZjeJrBoksBmuosZh5g=='),('555a03e1c09862-15619146',1431963179,'lhoC+uRwXBf+V8WKYl7rtuHlKEI/t2q2LT+nSDkL0YhBCS9tbBW+RntgZ2qGwYLXXL1ZNs0C4vxYLsgbfyJ+HL2fSmVkrJtKExbyGHJxbC/1T8vbBcGWSzZBB6TLsAKBS/B6NMvE3Q2kk9qg816gHZtHHpAonfurjiMDkAnuyBe51g=='),('5564dba93ab942-17762835',1432673194,'kwWBtWvAS9vaDabPaj3mzC1xvWv9wmo91MeDSSPfXA/tBFhn738kuI3sf9NJuPetEfKPGM9SNAM7KlOuEBa2o5CUH6sgfIBPxmo='),('5564e2d25a5057-32436548',1432675026,'63RyksmubSdrcDbC6G6B5/aHJkMVY+VMreNQITaIR3breQAJLBntGgZ87RCCdttrxPlzEq61/OctJrXNF8Il3teM3GfFCc5YSk8='),('55832ecf2a57b5-24944323',1434660630,'Zbd5brheaV4k6eS95TReQjYCRrcQXjAG2C/F3w5xslqwlb3z3kOrL7WZ0IVrKGS1l3oJVFHGhqjZSkEc/iOJeVjPt/utCMSWlQeOVEaFzzVXTYqRgWD331aDM7zHxO/FJL5TbugEbP2VZp1sXraXEHONsfpBKrKi0++V6RSFIUNMFg=='),('558351008a87d7-13411515',1434669312,'W88+mAVwxIBxPpTNwu3TBsqsHg5Cig5vDdu3TMXO3mbq7Zk3wjmc0kyLiBxN2VUiwUrj/zn1glGS4o3xnm2BYdeUHGtksHyDB8s='),('55b7e6d6440786-83235785',1438115543,'iaCdOIT2wHbMSlyXBiih+sax33LIuF1u0QWkcQvG+EqtrdjiBMV95TWMO8ZIiWfbZ5k/4MO4LeqLlN3A3OoEHfOBhkSFQqKI+oc='),('55c6743cd1fa30-01767211',1439069246,'mRN+5ZKwgvsjgOFD9j7byAOtj4gYrjEYSMCgzM7BjrIRRkRDlur0MPpwOlpnOs/Ei+eFl4MC4Ii5Pt47maMLpJ8iifEF8ILK6sc='),('55f89bf8d0fe73-95887361',1442357828,'Gnl6YKqAvKCGqI3IE9WFU9ebj+v8z0UT8j5qJe0K2QYONirSbb9Er/ytkdgkldM6zQPAG/vx4bBr0jR9FSZ5fU5Tqmn8Sb/457s='),('55f89e1c8cde05-07490062',1442356764,'FTu6HCQT9HZntpy6qCAi0pvfOl9E1LbQD30qVtdNE9MGTwzq3f06Sr5Rp+qDWc94ofCR/yisSxVz+UEnC5hdY64s9cKytlNR4fc='),('55f89f0d0c92d5-13584438',1442357005,'zi7kA6dHz+ctZ6V2EsLB43XW4hN5obom8kVI6fuhUFWj9+kczS64G/DoPUr2Jsrl6MNohTHdOozAt5sFTU18JjRQEiyS4PJDUOk='),('55f89f23d66880-95793370',1442357027,'yrX1iG/RL6nR43N7E3MAAO/TlESbJo3U3eGop6K2dhymG4LoJN7mu90YA4IIEjJHuU3paKGouRlXZtDl+ZIjjPSIJnIdcADASnk='),('55f8a00352bba2-50666586',1442357251,'AgFzXI1jTntekXWU7CX2dR2m/4EREZadUuYamoBmsBv/IihvEccvmN7kRhiBWYCeVUeT/fyxReZ9+o/k4KUAz6BYa39brnXyYWQ='),('55f8a073d90a88-38199419',1442357363,'jzPphvFBOF2PkeWYq9o6W0lePpIdBxAyeLG4dFwXjRQnoDb2Oe2enwv3m3rujOcZP/CHOBgbsLeE8/pCDost+qcO/rnbm3cCGkA='),('55f8a08d35fa54-37046116',1442357389,'bDjzEVvTtzG9vaUZ3b9SRZNBS3whu555exRqF4qqf0klTHpIdwUcO/Oic/+pgq4So5qgyUtMscvuCT2WYzuj4w+JW+C4NkOb+bI='),('55f8a13add7034-42787117',1442357562,'5lxKVSqcIMIBdLoO2cnXQzcLo5HqEqnBrxHKndlGTR/ds9kQn1zKKFt2oqqCf9gl/I11a5xVcQmANybP88RdVZ1iZASvOfzpzHU='),('55f8a1a9970e46-05192498',1442357673,'KovV2/j90ZyeWXfSHa9Cj9D4/aUN7mYqS1dRRLycBIq1V5/GzG+Ara2pECIZeuWOpqZ2XqWEKxqpuBZ8CdQw0HaW0x9zth/JwwY='),('55f8a63f5ef535-45360721',1442358847,'iMn49VoG1ZSchvkYxFTBlyPnwu4AHmj5+6YE9YIlHMnFLNqWWOI5P5Fm+wdAStl4EJ5rjmm+AZIDo1/pHPjyR0+3bZ86h/1mLIU='),('562d23c9e58502-16398433',1445798859,'EGpWBMKDbUq+0SvwtgLx5t+MFmFFyGvyd3VhkODAAcjL5ri7WlTNjuVpz7TGcvMWgEdWUHiZR1FKBVh3g1EGJZky7LJ4Yq58H5I=');
/*!40000 ALTER TABLE `admin_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_user`
--

DROP TABLE IF EXISTS `admin_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `password_salt` varchar(10) NOT NULL,
  `is_disabled` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`login`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_user`
--

LOCK TABLES `admin_user` WRITE;
/*!40000 ALTER TABLE `admin_user` DISABLE KEYS */;
INSERT INTO `admin_user` VALUES (1,'zoomerev@gmail.com','5d573efa40477813cf62d1d4b27de3e2','f450551be3',0,'2013-11-30 10:15:28','0000-00-00 00:00:00'),(2,'geroyster@gmail.com','43204d50183ba87b8c36073a6d71db43','f602b5b337',0,'2013-11-30 10:15:28','2015-04-23 02:58:16'),(26,'alexazoom','72177960ef359b7a7536b70d59d63145','a19949ee63',0,'2014-06-03 18:32:41','0000-00-00 00:00:00'),(27,'zoomerev','7130cbf4ea1e16e4f1b55e12b9f7b4a9','2f5db12960',1,'2014-08-08 17:28:19','2015-06-18 23:48:51'),(31,'zoomerevev','be92dad8b1679162eabd019f253369a7','1b81de2e65',1,'2014-08-08 17:29:41','0000-00-00 00:00:00'),(32,'alexazooma','61a8018f912c2bfbde6b88f33c14d07e','1ead13b24a',1,'2014-08-08 17:31:06','0000-00-00 00:00:00'),(34,'aaa','de22da1567dc8d033542bdbb999d6a8e','302f96dd23',1,'2014-08-08 18:33:57','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `admin_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_user_token`
--

DROP TABLE IF EXISTS `admin_user_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_user_token` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_user_token`
--

LOCK TABLES `admin_user_token` WRITE;
/*!40000 ALTER TABLE `admin_user_token` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_user_token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_storage_categories`
--

DROP TABLE IF EXISTS `media_storage_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_storage_categories` (
  `code` varchar(50) NOT NULL,
  `hidden` varchar(3) NOT NULL DEFAULT 'no',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_storage_categories`
--

LOCK TABLES `media_storage_categories` WRITE;
/*!40000 ALTER TABLE `media_storage_categories` DISABLE KEYS */;
INSERT INTO `media_storage_categories` VALUES ('files','no','2014-05-31 00:00:00',NULL),('media','no','2013-11-28 09:16:19',NULL);
/*!40000 ALTER TABLE `media_storage_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_storage_file_extras`
--

DROP TABLE IF EXISTS `media_storage_file_extras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_storage_file_extras` (
  `file_id` char(36) NOT NULL,
  `width` smallint(6) DEFAULT NULL,
  `height` smallint(6) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`file_id`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_storage_file_extras`
--

LOCK TABLES `media_storage_file_extras` WRITE;
/*!40000 ALTER TABLE `media_storage_file_extras` DISABLE KEYS */;
/*!40000 ALTER TABLE `media_storage_file_extras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_storage_files`
--

DROP TABLE IF EXISTS `media_storage_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_storage_files` (
  `id` char(36) NOT NULL,
  `location_code` varchar(50) NOT NULL,
  `category_code` varchar(50) DEFAULT NULL,
  `vfolder_id` varchar(36) NOT NULL,
  `location_path` varchar(100) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_extension` varchar(10) NOT NULL,
  `file_size` int(11) NOT NULL,
  `file_mime` varchar(100) NOT NULL,
  `name` varchar(75) NOT NULL,
  `type` int(11) unsigned NOT NULL DEFAULT '10000',
  `private` varchar(3) NOT NULL DEFAULT 'no',
  `status` varchar(40) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqbyfilename` (`location_code`,`location_path`,`file_name`),
  UNIQUE KEY `category_code` (`category_code`,`vfolder_id`,`name`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `media_storage_files_idx1` (`category_code`,`location_path`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_storage_files`
--

LOCK TABLES `media_storage_files` WRITE;
/*!40000 ALTER TABLE `media_storage_files` DISABLE KEYS */;
INSERT INTO `media_storage_files` VALUES ('08e1184c-bcfc-443f-afb2-cfff22f69a98','main','media','','public/0/0','99elwu4da.gif','gif',4433369,'image/gif','7.gif',10000,'no','ok','2014-06-01 20:11:24',NULL),('4e5817d5-ec1f-4cd8-922d-a328fb610943','private','media','','private/0/0','c1sow9zgw.jpg','jpg',170962,'image/jpeg','7B8Fny8Dlqc.jpg',10000,'yes','ok','2014-06-01 20:11:43',NULL),('777fde91-9b81-45c0-8e83-1b27c1ab06ec','main','media','','public/0/0','sfug2rzi6.jpg','jpg',363212,'image/jpeg','new3.jpg',10000,'no','ok','2014-06-03 18:07:56',NULL),('96c4aadd-d5b7-487a-9e28-bb92939047ad','main','media','','public/0/0','93vp5aqu7.jpg','jpg',357367,'image/jpeg','w_a5f8907f.jpg',10000,'no','ok','2014-05-31 18:42:24',NULL);
/*!40000 ALTER TABLE `media_storage_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_storage_reserved_size`
--

DROP TABLE IF EXISTS `media_storage_reserved_size`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_storage_reserved_size` (
  `location_code` varchar(50) NOT NULL,
  `size` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`location_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_storage_reserved_size`
--

LOCK TABLES `media_storage_reserved_size` WRITE;
/*!40000 ALTER TABLE `media_storage_reserved_size` DISABLE KEYS */;
INSERT INTO `media_storage_reserved_size` VALUES ('main',8866738,'2013-11-28 09:17:20','2014-06-03 18:07:56'),('private',0,'2013-11-28 09:19:55','2014-06-01 20:11:43');
/*!40000 ALTER TABLE `media_storage_reserved_size` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_storage_vfolders`
--

DROP TABLE IF EXISTS `media_storage_vfolders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_storage_vfolders` (
  `id` char(36) NOT NULL,
  `category_code` varchar(50) NOT NULL,
  `name` varchar(75) NOT NULL,
  `parent_id` varchar(36) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_code` (`category_code`,`name`,`parent_id`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_storage_vfolders`
--

LOCK TABLES `media_storage_vfolders` WRITE;
/*!40000 ALTER TABLE `media_storage_vfolders` DISABLE KEYS */;
/*!40000 ALTER TABLE `media_storage_vfolders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(200) NOT NULL,
  `text` mediumtext,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subject` (`subject`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 PACK_KEYS=0;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (8,'sswwwwwwwwww','dddddddddddddddddddddddddddddddddddddddddddddddd','2015-01-05 20:37:33'),(9,'wwwwwwwwwwwwwwwww','wwddddddddddddddddddddddddddd','2015-01-05 20:37:53');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting` (
  `code` varchar(70) DEFAULT NULL,
  `value` text,
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES ('site_name','FirstSite'),('site_keyword','site'),('site_description','FirstSite'),('site_feedback_email','f@f.loc'),('site_feedback_subject','s'),('site_feedback_message','ddwwwsss');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 PACK_KEYS=0;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` VALUES (2,'Petya','2014-06-18 23:42:08'),(3,'Vasya','2014-06-18 23:42:30'),(4,'Petya','2014-06-18 23:42:30'),(5,'Vasya','2014-06-18 23:42:43'),(6,'Petya','2014-06-18 23:42:43');
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-25 22:04:14
