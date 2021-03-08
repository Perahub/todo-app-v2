-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: localhost    Database: todo_db
-- ------------------------------------------------------
-- Server version	5.7.27-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acc_user_accounts`
--

DROP TABLE IF EXISTS `acc_user_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `acc_user_accounts` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(75) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `role_id` smallint(5) unsigned DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `lock_flag` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` smallint(5) unsigned NOT NULL,
  `last_modified_by` smallint(5) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acc_user_accounts`
--

LOCK TABLES `acc_user_accounts` WRITE;
/*!40000 ALTER TABLE `acc_user_accounts` DISABLE KEYS */;
INSERT INTO `acc_user_accounts` VALUES (1,'iamreverie','d2676c3ad175bc97899903eb08cd93510c625b59','zursion@gmail.com',NULL,1,1,1,1,'2020-06-12 00:00:00','2020-06-12 00:00:00'),(2,'administrator','0b8cde146d4f1e0e3610dce389ba0941420b02c9','administrator@gmail.com',NULL,1,0,1,1,'2021-03-05 04:57:01','2021-03-05 04:57:01');
/*!40000 ALTER TABLE `acc_user_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `options` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(200) NOT NULL,
  `option_label` varchar(100) NOT NULL,
  `option_value` longtext NOT NULL,
  `option_type` varchar(25) NOT NULL,
  `status` varchar(20) NOT NULL,
  `datestamp` date NOT NULL,
  `created_by` bigint(20) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified_by` bigint(20) unsigned NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `options`
--

LOCK TABLES `options` WRITE;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
INSERT INTO `options` VALUES (1,'site_name','Site Name','Pront Lyne','General','Active','2017-05-18',0,'2017-05-18 00:00:00',1,'2019-06-18 07:35:09'),(2,'site_tag_line','Tag Line','Fast. Easy. Reliable','General','Active','2017-05-18',0,'2017-05-18 00:00:00',1,'2019-06-18 07:35:09'),(3,'site_ga_code','Google Analytics Code','','Code','Disabled','2017-05-18',0,'2017-05-18 00:00:00',1,'2017-05-19 17:40:23'),(4,'site_fb_app_id','FB App Id','','Code','Disabled','2017-05-18',0,'2017-05-18 00:00:00',1,'2017-05-19 17:40:23'),(5,'site_admin_email','Admin Email','gyrodevops@gmail.com','General','Active','2017-05-18',0,'2017-05-18 00:00:00',1,'2019-06-18 07:35:09'),(6,'site_icon','Icon','','General','Disabled','2017-05-18',0,'2017-05-18 00:00:00',1,'2019-06-18 07:35:09'),(7,'site_logo','Logo','','General','Disabled','2017-05-18',0,'2017-05-18 00:00:00',1,'2019-06-18 07:35:09'),(8,'site_public','Search Engine Visibility','0','Reading','Active','2017-05-18',0,'2017-05-18 00:00:00',1,'2017-05-19 17:44:53'),(9,'site_post_display_count','Default Number of Post Displayed','7','Reading','Active','2017-05-19',0,'2017-05-19 00:00:00',1,'2017-05-19 17:44:53'),(10,'site_main_office','Main Office','Manila, Philippines','General','Disabled','2017-05-28',0,'2017-05-28 00:00:00',1,'2019-06-18 07:35:09'),(11,'site_contact_number','Contact Number','+63 977 851 4059','General','Disabled','2017-05-28',0,'2017-05-28 00:00:00',1,'2019-06-18 07:35:09');
/*!40000 ALTER TABLE `options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `set_todos`
--

DROP TABLE IF EXISTS `set_todos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `set_todos` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `todo_name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` smallint(5) NOT NULL,
  `modified` datetime NOT NULL,
  `last_modified_by` smallint(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `set_todos`
--

LOCK TABLES `set_todos` WRITE;
/*!40000 ALTER TABLE `set_todos` DISABLE KEYS */;
INSERT INTO `set_todos` VALUES (7,'test2',0,'2021-03-05 06:07:21',2,'2021-03-05 06:33:21',2),(8,'test',0,'2021-03-05 06:07:39',2,'2021-03-05 06:34:03',2),(9,'Check List 1',1,'2021-03-05 06:34:11',2,'2021-03-05 06:34:11',2);
/*!40000 ALTER TABLE `set_todos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-07  7:39:21
