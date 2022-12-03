-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: artnature_db
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `daily_batch_report`
--

DROP TABLE IF EXISTS `daily_batch_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `daily_batch_report` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `task_date` varchar(100) DEFAULT NULL,
  `task_id` varchar(100) DEFAULT NULL,
  `batch_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daily_batch_report`
--

LOCK TABLES `daily_batch_report` WRITE;
/*!40000 ALTER TABLE `daily_batch_report` DISABLE KEYS */;
INSERT INTO `daily_batch_report` VALUES (19,23,'LAPSED','2022-11-23','JA392841',16),(20,25,'LAPSED','2022-11-23','UA314901',17),(21,27,'LAPSED','2022-11-23','4817100',18),(22,22,'LAPSED','2022-11-23','CS234245',17),(23,40,'LAPSED','2022-11-19','DDD2232',17),(24,40,'LAPSED','2022-11-20','DDD2232',17),(25,26,'LAPSED','2022-11-23','JA392SS',16),(26,38,'LAPSED','2022-11-23','KK09809',17),(27,37,'LAPSED','2022-11-23','KK239080',16),(28,41,'LAPSED','2022-11-23','LL23232W',17),(29,29,'LAPSED','2022-11-23','SS645637',16),(30,28,'LAPSED','2022-11-23','SSW4395',17),(31,27,'GOOD','2022-11-24','4817100',18),(32,27,'GOOD','2022-11-25','4817100',18),(33,22,'LAPSED','2022-11-24','CS234245',17),(34,22,'LAPSED','2022-11-25','CS234245',17),(35,22,'LAPSED','2022-11-26','CS234245',17),(36,22,'LAPSED','2022-11-27','CS234245',17),(37,26,'GOOD','2022-11-24','JA392SS',16),(38,26,'GOOD','2022-11-25','JA392SS',16),(39,26,'GOOD','2022-11-26','JA392SS',16),(40,26,'GOOD','2022-11-27','JA392SS',16),(41,38,'LAPSED','2022-11-24','KK09809',17),(42,38,'LAPSED','2022-11-25','KK09809',17),(43,38,'LAPSED','2022-11-26','KK09809',17),(44,38,'LAPSED','2022-11-27','KK09809',17),(45,37,'LAPSED','2022-11-24','KK239080',16),(46,37,'LAPSED','2022-11-25','KK239080',16),(47,37,'LAPSED','2022-11-26','KK239080',16),(48,37,'LAPSED','2022-11-27','KK239080',16),(49,41,'LAPSED','2022-11-24','LL23232W',17),(50,41,'LAPSED','2022-11-25','LL23232W',17),(51,41,'LAPSED','2022-11-26','LL23232W',17),(52,41,'LAPSED','2022-11-27','LL23232W',17),(53,33,'GOOD','2022-11-27','ORDER123',18),(54,22,'GOOD','2022-11-26','SD234526',16),(55,29,'LAPSED','2022-11-24','SS645637',16),(56,29,'LAPSED','2022-11-25','SS645637',16),(57,29,'LAPSED','2022-11-26','SS645637',16),(58,29,'LAPSED','2022-11-27','SS645637',16),(59,28,'LAPSED','2022-11-24','SSW4395',17),(60,28,'LAPSED','2022-11-25','SSW4395',17),(61,28,'LAPSED','2022-11-26','SSW4395',17),(62,28,'LAPSED','2022-11-27','SSW4395',17),(63,25,'LAPSED','2022-11-24','UA314901',17),(64,25,'LAPSED','2022-11-25','UA314901',17),(65,25,'LAPSED','2022-11-26','UA314901',17),(66,25,'LAPSED','2022-11-27','UA314901',17);
/*!40000 ALTER TABLE `daily_batch_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `location` (
  `location_id` int NOT NULL AUTO_INCREMENT,
  `address` varchar(255) NOT NULL,
  `status` int NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `driver_id` int NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES (1,'LIBMANAN, CAMARINES SUR',1,'2022-08-24 03:30:40',3),(2,'MABINI LIBMANAN CAMARINES SUR',0,'2022-11-07 08:40:04',3),(3,'NAGA CITY CAMARINES SUR',0,'2022-11-07 08:40:17',0),(4,'PILI CAMARINES SUR',0,'2022-11-07 08:40:32',0),(5,'RAGAY CAMARINES SUR',0,'2022-11-07 08:40:46',0);
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `msg_id` int NOT NULL AUTO_INCREMENT,
  `msg_from` int NOT NULL,
  `msg_to` int NOT NULL,
  `message` varchar(45) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL,
  PRIMARY KEY (`msg_id`),
  KEY `msg_from_idx` (`msg_from`,`msg_to`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (67,2,23,'GOODLUCK','2022-11-22 21:09:36',0),(68,2,25,'GOODLUCK','2022-11-22 21:13:06',0),(69,2,27,'GOODLUCK','2022-11-22 21:15:09',0),(70,2,22,'GDLUCK','2022-11-22 22:12:50',0),(71,2,24,'GOODLUCK','2022-11-22 22:13:31',0),(72,2,26,'Goodluck','2022-11-22 22:13:48',0),(73,2,29,'GOODLUCK','2022-11-22 22:14:23',0),(74,2,37,'Goodluck','2022-11-22 22:14:51',0),(75,2,38,'GD','2022-11-22 22:15:21',0),(76,2,28,'Gd','2022-11-22 22:15:41',0),(77,2,41,'DG','2022-11-22 22:16:16',0),(78,2,40,'GODLUCK','2022-11-22 23:34:31',0),(79,2,22,'.','2022-11-26 12:00:47',0),(80,2,33,'.','2022-11-27 10:16:39',0);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notification` (
  `notif_id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`notif_id`),
  UNIQUE KEY `notif_id_UNIQUE` (`notif_id`),
  UNIQUE KEY `description_UNIQUE` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=3989 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` VALUES (3650,'Your task has already been assigned by Artnature Admin. Gratitude and Goodluck to you! Order Number: JA392841',23,1),(3651,'Your task has already been assigned by Artnature Admin. Gratitude and Goodluck to you! Order Number: UA314901',25,0),(3652,'Angel Gonzales FAILED TO MEET THE EXPECTED PROCESS ON DAY 1',2,1),(3653,'The system detected that you didnt meet the expected percentage of task progress this 2022-11-23. Please allow extra time to finish the task. You have only 1 days remaining. Thank you!',23,1),(3654,'Lea Ascaraga FAILED TO MEET THE EXPECTED PROCESS ON DAY 1',2,1),(3655,'The system detected that you didnt meet the expected percentage of task progress this 2022-11-23. Please allow extra time to finish the task. You have only 5 days remaining. Thank you!',25,1),(3656,'Your task has already been assigned by Artnature Admin. Gratitude and Goodluck to you! Order Number: 4817100',27,1),(3657,'Trisha Cortes FAILED TO MEET THE EXPECTED PROCESS ON DAY 1',2,1),(3658,'The system detected that you didnt meet the expected percentage of task progress this 2022-11-23. Please allow extra time to finish the task. You have only 3 days remaining. Thank you!',27,1),(3717,'The admin praise your work. Order Number: 4817100',27,1),(3718,'Your task has already been assigned by Artnature Admin. Gratitude and Goodluck to you! Order Number: CS234245',22,0),(3719,'Your task has already been assigned by Artnature Admin. Gratitude and Goodluck to you! Order Number: JA392SS',24,0),(3721,'Your task has already been assigned by Artnature Admin. Gratitude and Goodluck to you! Order Number: SS645637',29,0),(3722,'Your task has already been assigned by Artnature Admin. Gratitude and Goodluck to you! Order Number: KK239080',37,0),(3723,'Your task has already been assigned by Artnature Admin. Gratitude and Goodluck to you! Order Number: KK09809',38,0),(3724,'Your task has already been assigned by Artnature Admin. Gratitude and Goodluck to you! Order Number: SSW4395',28,0),(3725,'Your task has already been assigned by Artnature Admin. Gratitude and Goodluck to you! Order Number: LL23232W',41,0),(3726,'Your task has already been assigned by Artnature Admin. Gratitude and Goodluck to you! Order Number: DDD2232',40,1),(3727,'Judy ann Comia FAILED TO MEET THE EXPECTED PROCESS ON DAY 1',2,0),(3731,'Mary Grace Sanches FAILED TO MEET THE EXPECTED PROCESS ON DAY 1',2,0),(3733,'Kimberly Bernal FAILED TO MEET THE EXPECTED PROCESS ON DAY 1',2,0),(3735,'Miko Mendez FAILED TO MEET THE EXPECTED PROCESS ON DAY 1',2,0),(3737,'Justin Merabreno FAILED TO MEET THE EXPECTED PROCESS ON DAY 1',2,0),(3739,'Rochelle Pabor FAILED TO MEET THE EXPECTED PROCESS ON DAY 1',2,0),(3741,'Lorievic Pasper FAILED TO MEET THE EXPECTED PROCESS ON DAY 1',2,1),(3889,'Your Order Number: CS234245, is Damage please message your manager for further information about your damage product. ASAP!',22,0),(3890,'Your Order Number: 4817100, is Damage please message your manager for further information about your damage product. ASAP!',27,0),(3891,'Your Order Number: JA392841, is Damage please message your manager for further information about your damage product. ASAP!',23,0),(3896,'',27,0),(3900,'Your task has already been assigned by Artnature Admin. Gratitude and Goodluck to you! Order Number: SD234526',22,0),(3901,'Your task has already been assigned by Artnature Admin. Gratitude and Goodluck to you! Order Number: ORDER123',33,0),(3902,'Judy ann Comia FAILED TO MEET THE EXPECTED PROCESS ON DAY 5',2,0),(3903,'The system detected that you didnt meet the expected percentage of task progress this 2022-11-27. Please allow extra time to finish the task. You have only 1 days remaining. Thank you!',22,0),(3904,'Kimberly Bernal FAILED TO MEET THE EXPECTED PROCESS ON DAY 5',2,0),(3906,'Miko Mendez FAILED TO MEET THE EXPECTED PROCESS ON DAY 5',2,0),(3908,'Justin Merabreno FAILED TO MEET THE EXPECTED PROCESS ON DAY 5',2,0),(3910,'Rochelle Pabor FAILED TO MEET THE EXPECTED PROCESS ON DAY 5',2,0),(3912,'Lorievic Pasper FAILED TO MEET THE EXPECTED PROCESS ON DAY 5',2,0),(3914,'Lea Ascaraga FAILED TO MEET THE EXPECTED PROCESS ON DAY 5',2,1),(3986,'incomplete ',0,0),(3988,'aaaa',33,1);
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reference_code`
--

DROP TABLE IF EXISTS `reference_code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reference_code` (
  `ref_id` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `ranking` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `group_name` varchar(45) NOT NULL,
  PRIMARY KEY (`ref_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reference_code`
--

LOCK TABLES `reference_code` WRITE;
/*!40000 ALTER TABLE `reference_code` DISABLE KEYS */;
INSERT INTO `reference_code` VALUES ('bstts1','New','1','Batch Status','bstts'),('bstts2','Production','2','Batch Status','bstts'),('bstts3','Done','3','Batch Status','bstts'),('bstts4','Archived','4','Batch Status','bstts'),('bstts5','Delivered','5','Batch Status','bstts'),('mdl1','ESNP','1','Wig Model','mdl'),('mdl2','NS','2','Wig Model','mdl'),('mdl3','HFL','3','Wig Model','mdl'),('mdl4','HPL','4','Wig Model','mdl'),('mdl5','NY','5','Wig Model ','mdl'),('sz1','1','1','Wig Size','sz'),('sz2','2','2','Wig Size','sz'),('sz3','3','3','Wig Size','sz'),('sz4','4','4','Wig Size ','sz'),('tstts1','New','1','Task Status','tstts'),('tstts2','Production','2','Task Status','tstts'),('tstts3','Done','3','Task Status','tstts'),('tstts4','Archived','4','Task Status','tstts'),('tstts5','Lapsed','5','Task Status','tstts'),('tstts6','Damage','6','Task Status','tstts'),('tstts7','On Time','7','Task Status','tstts'),('tstts8','Early','8','Task Status','tstts'),('typ1','Type 1','1','Wig Type','typ'),('typ2','Type 2','2','Wig Type','typ'),('typ3','Type 3','3','Wig Type ','typ'),('typ4','Type 4','4','Wig Type','typ'),('ur1','Admin','1','User Role','ur'),('ur2','Employee: On-Site','2','User Role','ur'),('ur3','Employee: Work-From-Home','3','User Role','ur'),('ur4','Driver','4','User Role','ur'),('ustts1','Pending','1','User Status','ustts'),('ustts2','Approved','2','User Status','ustts'),('ustts4','Archived','4','User Status','ustts'),('ustts5','Locked','5','User Status','ustts'),('ustts6','To Approved','6','User Status','ustts');
/*!40000 ALTER TABLE `reference_code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task_batch`
--

DROP TABLE IF EXISTS `task_batch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `task_batch` (
  `batch_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `progress` varchar(45) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `assigned_driver` int DEFAULT NULL,
  PRIMARY KEY (`batch_id`),
  UNIQUE KEY `batch_id_UNIQUE` (`batch_id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_batch`
--

LOCK TABLES `task_batch` WRITE;
/*!40000 ALTER TABLE `task_batch` DISABLE KEYS */;
INSERT INTO `task_batch` VALUES (16,'BATCH001','bstts2','56.25','2022-11-22 21:08:15',NULL),(17,'BATCH002','bstts1','0.00','2022-11-22 21:11:49',NULL),(18,'BATCH003','bstts5','100.00','2022-11-22 21:14:21',44);
/*!40000 ALTER TABLE `task_batch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task_batch_location`
--

DROP TABLE IF EXISTS `task_batch_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `task_batch_location` (
  `batch_location_id` int NOT NULL AUTO_INCREMENT,
  `location_id` int DEFAULT NULL,
  `batch_id` varchar(100) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`batch_location_id`),
  UNIQUE KEY `batch_location_id_UNIQUE` (`batch_location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_batch_location`
--

LOCK TABLES `task_batch_location` WRITE;
/*!40000 ALTER TABLE `task_batch_location` DISABLE KEYS */;
INSERT INTO `task_batch_location` VALUES (7,2,'BATCH003',44,'2022-11-23 01:20:02'),(8,3,'BATCH003',44,'2022-11-23 01:20:17'),(9,4,'BATCH003',44,'2022-11-23 01:20:46'),(10,5,'BATCH003',44,'2022-11-23 01:20:56');
/*!40000 ALTER TABLE `task_batch_location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task_progress_history`
--

DROP TABLE IF EXISTS `task_progress_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `task_progress_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `task_id` varchar(45) NOT NULL,
  `progress` int NOT NULL,
  `area_no` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=332 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_progress_history`
--

LOCK TABLES `task_progress_history` WRITE;
/*!40000 ALTER TABLE `task_progress_history` DISABLE KEYS */;
INSERT INTO `task_progress_history` VALUES (230,'img/history/wig-terms.jpg','2022-11-22 21:10:33','JA392841',0,'area_i'),(231,'img/history/wig-terms.jpg','2022-11-22 21:10:59','JA392841',0,'area_i'),(232,'img/history/wig-terms.jpg','2022-11-22 21:11:09','JA392841',0,'area_i'),(233,'img/history/wig-terms.jpg','2022-11-22 21:13:24','JA392841',0,'area_i'),(234,'img/history/wig-terms.jpg','2022-11-22 21:15:33','JA392841',0,'area_i'),(235,'img/history/wig-terms.jpg','2022-11-22 21:16:48','JA392841',0,'area_i'),(236,'img/history/wig-terms.jpg','2022-11-22 21:27:53','4817100',0,'area_i'),(237,'img/history/wig-terms.jpg','2022-11-22 21:28:07','4817100',0,'area_i'),(238,'img/history/wig-terms.jpg','2022-11-22 21:28:27','4817100',0,'area_i'),(239,'img/history/wig-terms.jpg','2022-11-22 21:28:43','4817100',0,'area_i'),(240,'img/history/wig-terms.jpg','2022-11-22 21:29:23','4817100',0,'area_ii'),(241,'img/history/wig-terms.jpg','2022-11-22 21:29:45','4817100',0,'area_ii'),(242,'img/history/wig-terms.jpg','2022-11-22 21:30:11','4817100',0,'area_ii'),(243,'img/history/wig-terms.jpg','2022-11-22 21:30:32','4817100',0,'area_ii'),(244,'img/history/wig-terms.jpg','2022-11-22 21:30:49','4817100',0,'area_iv'),(245,'img/history/wig-terms.jpg','2022-11-22 21:31:04','4817100',0,'area_iv'),(246,'img/history/images.jpg','2022-11-22 21:31:36','4817100',0,'area_iv'),(247,'img/history/wig-terms.jpg','2022-11-22 21:31:56','4817100',0,'area_iv'),(248,'img/history/wig-terms.jpg','2022-11-22 21:32:15','4817100',0,'area_iii'),(249,'img/history/wig-terms.jpg','2022-11-22 21:32:31','4817100',0,'area_iii'),(250,'img/history/wig-terms.jpg','2022-11-22 21:32:52','4817100',0,'area_iii'),(251,'img/history/wig-terms.jpg','2022-11-22 21:33:11','4817100',0,'area_iii'),(252,'img/history/wig-terms.jpg','2022-11-22 21:33:42','4817100',0,'area_i'),(253,'img/nopic.png','2022-11-22 21:34:19','4817100',100,'1'),(254,'img/nopic.png','2022-11-22 21:34:19','4817100',100,'2'),(255,'img/nopic.png','2022-11-22 21:34:19','4817100',100,'3'),(256,'img/nopic.png','2022-11-22 21:34:19','4817100',100,'4'),(257,'img/history/image-asset (1).jpeg','2022-11-22 23:13:09','CS234245',0,'area_i'),(258,'img/history/image-asset (1).jpeg','2022-11-22 23:13:41','CS234245',0,'area_i'),(259,'img/history/wigs-1633032698.png','2022-11-22 23:14:06','CS234245',0,'area_ii'),(260,'img/history/image-asset.jpeg','2022-11-22 23:14:30','CS234245',0,'area_i'),(261,'img/history/inbound8496972463232990848.jpg','2022-11-23 00:40:26','JA392841',0,'area_i'),(262,'img/history/inbound6612780868706456820.jpg','2022-11-23 00:41:19','JA392841',0,'area_i'),(263,'img/history/native pig.jpg','2022-11-23 00:46:05','JA392841',0,'area_i'),(264,'img/history/native pig.jpg','2022-11-23 00:49:12','JA392841',0,'area_i'),(265,'img/history/6df5260a-a761-4bcc-b4dd-5891d0442cdc.jpeg','2022-11-23 01:57:55','JA392841',0,'area_i'),(266,'img/history/6df5260a-a761-4bcc-b4dd-5891d0442cdc.jpeg','2022-11-23 21:48:16','JA392841',0,'area_i'),(267,'img/history/07b7ef9c-90a2-41f4-9e7c-9b258896c8b9.jpeg','2022-11-23 21:49:26','JA392841',0,'area_ii'),(268,'img/history/download (1).jpeg','2022-11-26 11:00:45','UA314901',0,'area_i'),(269,'img/nopic.png','2022-11-26 11:59:37','JA392SS',100,'1'),(270,'img/nopic.png','2022-11-26 11:59:37','JA392SS',100,'2'),(271,'img/nopic.png','2022-11-26 11:59:37','JA392SS',100,'3'),(272,'img/nopic.png','2022-11-26 11:59:37','JA392SS',100,'4'),(273,'img/nopic.png','2022-11-26 11:59:55','JA392SS',100,'1'),(274,'img/nopic.png','2022-11-26 11:59:55','JA392SS',100,'2'),(275,'img/nopic.png','2022-11-26 11:59:55','JA392SS',100,'3'),(276,'img/nopic.png','2022-11-26 11:59:55','JA392SS',100,'4'),(277,'img/nopic.png','2022-11-26 12:01:47','SD234526',100,'1'),(278,'img/nopic.png','2022-11-26 12:01:47','SD234526',100,'2'),(279,'img/nopic.png','2022-11-26 12:01:47','SD234526',100,'3'),(280,'img/nopic.png','2022-11-26 12:01:47','SD234526',100,'4'),(281,'img/nopic.png','2022-11-26 12:02:02','SD234526',100,'1'),(282,'img/nopic.png','2022-11-26 12:02:02','SD234526',100,'2'),(283,'img/nopic.png','2022-11-26 12:02:02','SD234526',100,'3'),(284,'img/nopic.png','2022-11-26 12:02:02','SD234526',100,'4'),(285,'img/history/download (1).jpeg','2022-11-27 10:19:24','ORDER123',0,'area_i'),(286,'img/history/download (1).jpeg','2022-11-27 10:19:42','ORDER123',0,'area_ii'),(287,'img/history/wigs-1633032698.png','2022-11-27 10:23:09','ORDER123',0,'area_i'),(288,'img/history/wigs-1633032698.png','2022-11-27 10:23:32','ORDER123',0,'area_i'),(289,'img/history/images (1).jpeg','2022-11-27 10:24:32','ORDER123',0,'area_i'),(290,'img/history/wigs-1633032698.png','2022-11-27 10:30:42','ORDER123',0,'area_i'),(291,'img/history/images (1).jpeg','2022-11-27 10:34:30','ORDER123',0,'area_i'),(292,'img/history/images (1).jpeg','2022-11-27 10:41:25','ORDER123',0,'area_i'),(293,'img/history/wigs-1633032698.png','2022-11-27 10:41:40','ORDER123',0,'area_i'),(294,'img/history/wigs-1633032698.png','2022-11-27 10:44:14','ORDER123',0,'area_i'),(295,'img/history/images (1).jpeg','2022-11-27 10:44:57','ORDER123',0,'area_i'),(296,'img/history/images (1).jpeg','2022-11-27 10:46:33','ORDER123',0,'area_i'),(297,'img/history/wigs-1633032698.png','2022-11-27 10:49:09','ORDER123',0,'area_i'),(298,'img/history/wigs-1633032698.png','2022-11-27 10:49:52','ORDER123',0,'area_i'),(299,'img/history/wigs-1633032698.png','2022-11-27 10:51:17','ORDER123',0,'area_i'),(300,'img/history/images (1).jpeg','2022-11-27 10:51:50','ORDER123',0,'area_i'),(301,'img/history/wigs-1633032698.png','2022-11-27 10:52:03','ORDER123',0,'area_i'),(302,'img/history/wigs-1633032698.png','2022-11-27 10:55:15','ORDER123',0,'area_i'),(303,'img/history/images (1).jpeg','2022-11-27 10:56:19','ORDER123',0,'area_i'),(304,'img/history/images (1).jpeg','2022-11-27 10:57:09','ORDER123',0,'area_i'),(305,'img/history/images (1).jpeg','2022-11-27 10:57:18','ORDER123',0,'area_i'),(306,'img/history/images (1).jpeg','2022-11-27 10:59:16','ORDER123',0,'area_i'),(307,'img/history/images (1).jpeg','2022-11-27 11:00:08','ORDER123',0,'area_i'),(308,'img/history/wigs-1633032698.png','2022-11-27 11:00:43','ORDER123',0,'area_ii'),(309,'img/history/Hbe9e969d6d4e4458a1b980387afe5161N.jpg','2022-11-27 11:02:25','ORDER123',0,'area_i'),(310,'img/history/image-asset.jpeg','2022-11-27 11:03:23','ORDER123',0,'area_iv'),(311,'img/history/Hbe9e969d6d4e4458a1b980387afe5161N.jpg','2022-11-27 11:03:43','ORDER123',0,'area_i'),(312,'img/history/images (1).jpeg','2022-11-27 11:05:03','ORDER123',0,'area_i'),(313,'img/history/wigs-1633032698.png','2022-11-27 11:05:14','ORDER123',0,'area_i'),(314,'img/history/Hbe9e969d6d4e4458a1b980387afe5161N.jpg','2022-11-27 11:05:45','ORDER123',0,'area_i'),(315,'img/history/image-asset (1).jpeg','2022-11-27 11:07:34','ORDER123',0,'area_i'),(316,'img/history/wigs-1633032698.png','2022-11-27 11:07:44','ORDER123',0,'area_i'),(317,'img/history/download (1).jpeg','2022-11-27 11:07:58','ORDER123',0,'area_i'),(318,'img/history/wigs-1633032698.png','2022-11-27 11:54:11','ORDER123',0,'area_iv'),(319,'img/history/Hbe9e969d6d4e4458a1b980387afe5161N.jpg','2022-11-27 11:58:47','ORDER123',0,'area_iv'),(320,'img/history/download (1).jpeg','2022-11-27 15:35:06','ORDER123',0,'area_ii'),(321,'img/history/wigs-1633032698.png','2022-11-27 15:35:16','ORDER123',0,'area_ii'),(322,'img/history/images (1).jpeg','2022-11-27 15:35:27','ORDER123',0,'area_ii'),(323,'img/history/Hbe9e969d6d4e4458a1b980387afe5161N.jpg','2022-11-27 15:35:37','ORDER123',0,'area_ii'),(324,'img/history/image-asset (1).jpeg','2022-11-27 15:35:48','ORDER123',0,'area_iii'),(325,'img/history/image-asset.jpeg','2022-11-27 15:35:59','ORDER123',0,'area_iii'),(326,'img/history/Hbe9e969d6d4e4458a1b980387afe5161N.jpg','2022-11-27 15:36:10','ORDER123',0,'area_iii'),(327,'img/history/download (1).jpeg','2022-11-27 15:36:23','ORDER123',0,'area_iv'),(328,'img/history/wigs-1633032698.png','2022-11-27 15:36:35','ORDER123',0,'area_iv'),(329,'img/history/image-asset (1).jpeg','2022-11-27 15:36:45','ORDER123',0,'area_iv'),(330,'img/history/Hbe9e969d6d4e4458a1b980387afe5161N.jpg','2022-11-27 15:36:55','ORDER123',0,'area_iv'),(331,'img/history/Hbe9e969d6d4e4458a1b980387afe5161N.jpg','2022-11-27 15:39:26','ORDER123',0,'area_iii');
/*!40000 ALTER TABLE `task_progress_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tasks` (
  `order_no` varchar(100) NOT NULL,
  `process` varchar(45) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `wig_model` varchar(100) NOT NULL,
  `wig_size` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` varchar(255) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `batch` varchar(45) NOT NULL,
  `no_of_days` int DEFAULT NULL,
  `wig_id` int DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`order_no`),
  UNIQUE KEY `order_no_UNIQUE` (`order_no`),
  KEY `wig_id_idx` (`wig_model`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES ('4817100','100',27,'mdl2','sz2','tstts3','2022-11-22 21:14:21','2022-11-24 03:27:25','SHORT HAIR','2022-11-23 10:14:00','2022-11-25 10:14:00','18',3,48,'Damage'),('CS234245','0',22,'mdl2','sz2','tstts6','2022-11-22 22:10:17','2022-11-24 02:51:41','LONG HAIR','2022-11-23 11:12:00','2022-11-27 11:12:00','17',5,54,'Damage'),('DDD2232','0',40,'mdl3','sz3','tstts5','2022-11-22 23:33:42','2022-11-27 07:42:38','SHORT','2022-11-19 12:34:00','2022-11-20 12:34:00','17',2,58,NULL),('JA392841','25',23,'mdl1','sz1','tstts5','2022-11-22 21:08:15','2022-11-27 07:43:52','LONG HAIR','2022-11-23 10:08:00','2022-10-23 10:12:00','16',1,46,'Damage'),('JA392SS','100',26,'mdl1','sz2','tstts8','2022-11-22 22:09:46','2022-11-26 03:59:37','SHORT HAIR','2022-11-23 11:13:00','2022-11-27 11:13:00','16',5,53,NULL),('KK09809','0',38,'mdl2','sz2','tstts2','2022-11-22 22:11:26','2022-11-23 03:15:21','SHORT HAIR','2022-11-23 11:15:00','2022-11-27 11:15:00','17',5,56,NULL),('KK239080','0',37,'mdl2','sz2','tstts4','2022-11-22 22:08:36','2022-11-23 03:27:38','LONG HAIR','2022-11-23 11:14:00','2022-11-27 11:14:00','16',5,51,NULL),('LL23232W','0',41,'mdl3','sz2','tstts2','2022-11-22 22:10:51','2022-11-23 03:16:16','SHORT HAIR','2022-11-23 11:16:00','2022-11-27 11:16:00','17',5,55,NULL),('ORDER123','100',33,'mdl1','sz1','tstts8','2022-11-27 10:16:10','2022-11-27 07:39:41','.','2022-11-27 10:16:00','2022-11-30 10:16:00','18',4,59,NULL),('SD234526','100',22,'mdl4','sz2','tstts7','2022-11-22 22:07:26','2022-11-26 04:01:47','LONG HAIR','2022-11-26 12:00:00','2022-11-26 12:00:00','16',1,49,NULL),('SS645637','0',29,'mdl1','sz4','tstts2','2022-11-22 22:08:06','2022-11-23 03:14:23','SHORT HAIR','2022-11-23 11:14:00','2022-11-27 11:14:00','16',5,50,NULL),('SSW4395','0',28,'mdl2','sz3','tstts2','2022-11-22 22:11:55','2022-11-23 03:15:41','SHORT HAIR','2022-11-23 11:15:00','2022-11-27 11:15:00','17',5,57,NULL),('UA314901','0',25,'mdl3','sz1','tstts2','2022-11-22 21:11:49','2022-11-23 02:13:06','SHORT HAIR','2022-11-23 10:12:00','2022-11-27 10:13:00','17',5,47,NULL);
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks_days`
--

DROP TABLE IF EXISTS `tasks_days`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tasks_days` (
  `noOfDays_id` int NOT NULL AUTO_INCREMENT,
  `dates` varchar(255) DEFAULT NULL,
  `task_id` varchar(100) DEFAULT NULL,
  `days_count` int DEFAULT NULL,
  `progress` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`noOfDays_id`),
  UNIQUE KEY `noOfDays_id_UNIQUE` (`noOfDays_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks_days`
--

LOCK TABLES `tasks_days` WRITE;
/*!40000 ALTER TABLE `tasks_days` DISABLE KEYS */;
INSERT INTO `tasks_days` VALUES (31,'2022-11-23','DK230923',0,'0'),(32,'2022-11-23','JA392841',0,'25'),(33,'2022-11-23','4817100',0,'93.75'),(34,'2022-11-23','4817100',0,'100'),(35,'2022-11-27','ORDER123',0,'100');
/*!40000 ALTER TABLE `tasks_days` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(45) NOT NULL,
  `birthday` datetime NOT NULL,
  `user_role` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `contact` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `code` varchar(45) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'ADMIN','ADMIN','A','Female','ADMIN','$2y$10$.AFLJha7UnzVvNuouWO/9O0LXt2Ct5HP9Dz4yfDdaqolCZZAnwmYG','admin@gmail.com','1992-04-05 00:00:00','ur1','MABINI, CAMARINES SUR','img/profile/6.jpg','09758781348','ustts2',''),(22,'Judy ann','Comia','S.','Female','JUDYANN','$2y$10$gjPZYlpfotF.x/CCf1uvhObzUNmU2L6HJ9UFBd6ZOkhog5.A5rPoy','judyann011@gmail.com','1999-04-08 00:00:00','ur3','MABINI LIBMANAN CAMARINES SUR','img/profile/2.jpg','09157481541','ustts2','211812'),(23,'Angel','Gonzales','P.','Female','ANGLE','$2y$10$nT8nqP/3Whf1kSTGjZ7zJusHjKCQ.G0dkKTZIWADDa83n2ezlwc6m','anglebre21@gmail.com','1999-12-04 00:00:00','ur3','MABINI LIBMANAN CAMARINES SUR','img/profile/3.jpg','09146315851','ustts5','899516'),(24,'Princess Mae','Nolasco','K.','Female','PRINCESS','$2y$10$gculZZ6g7QURayPIrTVKQeDnz1jcSrVoaaM1xV1f4TTRWylghz2NG','princess0113@gmail.com','2000-11-19 00:00:00','ur3','MABINI LIBMANAN CAMARINES SUR','img/profile/6.jpg','09652014075','ustts2','807638'),(25,'Lea','Ascaraga','K.','Female','LEA','$2y$10$4JJq9X85ZrCF2mLK1eItveXlU9YTGf8gb/t11ZnzEEOpWFj8xSXnq','lea024@gmail.com','2000-02-05 00:00:00','ur3','SIGAMOT LIBMANAN CAMARINES SUR','img/profile/8.jpg','09520120147','ustts2','127460'),(26,'Mary Grace','Sanches','O.','Female','MARYGRACE','$2y$10$BLuBNK5HgR7kpRYdAsVmLulEp0RvcNYlzYFw83B340QM9Z734qUOe','marygrace019a@gmail.com','1998-11-06 00:00:00','ur3','SAN ISIDRO LIBMANAN CAMARINES SUR','img/profile/19.jpg','09560140217','ustts2','669497'),(27,'Trisha','Cortes','P.','Female','TRISHA','$2y$10$VpkLDDFGARUu32fh7l1Gser9GQvF8q9/rO78iuUtIOAfuZZWLFT7O','trisha09d3@gmail.com','2000-02-11 00:00:00','ur3','MABINI LIBMANAN CAMARINES SUR','img/profile/FB_IMG_1580630197203.jpg','09630124057','ustts2','320844'),(28,'Lorievic','Pasper','O.','Male','LORIEVIC','$2y$10$432ynClrr6PnuzBsW9vcsOgXdUjb0LNJi1TIxrACyh159vLjyuxHu','lorievic093@gmail.com','1998-06-06 00:00:00','ur3','MABINI LIBMANAN CAMARINES SUR','img/profile/images.jpeg','09520141025','ustts2','248999'),(29,'Rochelle','Pabor','L.','Female','ROCHELLE','$2y$10$b7l0Gj8qqWHzkiWmRff0Qe4iYAR6MkQ21XnR7joAjTXIeXW89xXBi','rochelle94@gmail.com','1999-08-04 00:00:00','ur3','SIGAMOT LIBMANAN CAMARINES SUR','img/profile/FB_IMG_1580630197203.jpg','09521470252','ustts2','501243'),(30,'Aubre','Aco','L.','Female','AUBRE','$2y$10$979iigq4xt3UtxEvuBqLLOoxso4XLk8MR5TwtbEKPy.khclsphWKy','aubre024@gmail.com','1999-05-09 00:00:00','ur3','MABINI LIBMANAN CAMARINES SUR','img/profile/FB_IMG_1611188694684.jpg','09252016045','ustts2','986276'),(31,'Jamilla','Ofinda','K.','Female','JAMILLA','$2y$10$1E0PS//9lczzfBntzCkTbedxYL2xQX.kn5jTVS9hMaJp4/NHg3Bqi','jamilla2231@gamil.com','1998-02-05 00:00:00','ur3','SIGAMOT LIBMANAN CAMARINES SUR','img/profile/IMG_20210903_225325.jpg','09630178501','ustts2','114033'),(32,'Aira Mae','Cortez','L.','Female','AIRAMAE','$2y$10$GicQXkAC4CrIBd3ULv/ZAuACvaeeVob8m1jA2CXmQ3fWUpYlOrvIm','airamae033@gmail.com','1999-08-06 00:00:00','ur2','MABINI LIBMANAN CAMARINES SUR','img/profile/2.jpg','09854102471','ustts2','548256'),(33,'Ivy','Cortes','O.','Female','IVY','$2y$10$DWvR7kKzApeYrQYd.0.xI.l689GcWKvkOfyXIuKiyUcYZXMCyNEuG','ivymae090@gmail.com','1999-07-25 00:00:00','ur2','SAN ISIDRO LIBMANAN CAMARINES SUR','img/profile/3.jpg','09620145012','ustts2','735218'),(34,'RICA','Gabiasa','K.','Female','RICA','$2y$10$GAas5vEHSToHQMgEtmpfPuoNdI2if.u34MGKQL0AcE0mcdis85fNa','rIca033@gmail.com','1998-12-09 00:00:00','ur2','MABINI LIBMANAN CAMARINES SUR','img/profile/6.jpg','09652014750','ustts2','970846'),(35,'Maribel','Alvaro','L.','Female','MARIBEL','$2y$10$/Kyv169wSN7HBsNTHpvbp.CZlUk19qpTqGWepbknFAI/xkHKdJDpm','maribel93@gmail.com','1998-01-15 00:00:00','ur2','MABINI LIBMANAN CAMARINES SUR','img/profile/8.jpg','09620147025','ustts2','475172'),(36,'RICOJAY','Gonzales','P.','Male','RICOJAY','$2y$10$JUc2mM6frvv/jWeK/vkQ5uesWi1MLEVKJpHHhkp.226o/XgdOJicK','ricojay000@gamil.com','2000-05-05 00:00:00','ur2','MABINI LIBMANAN CAMARINES SUR','img/profile/images.jpeg','09560147021','ustts2','216100'),(37,'Miko','Mendez','S.','Male','MIKO','$2y$10$OtQH/6bguR.ByjMiSOtsv.ovsePGMeZriobSal2S.MNppIQyAvphe','miko989@gmail.com','1998-04-12 00:00:00','ur2','MABINI LIBMANAN CAMARINES SUR','img/profile/download.jpeg','09320154732','ustts2','248698'),(38,'Kimberly','Bernal','K.','Female','KIMBERLY','$2y$10$u2VWNQQ1uhFXC4RjNUkZ4eaVvDYkiYLLtdEAJySgdCdGIIs8eBTZO','kim644@gmail.com','2000-02-03 00:00:00','ur2','MABINI LIBMANAN CAMARINES SUR','img/profile/8.jpg','09520140753','ustts2','660091'),(39,'Roy','Noellana','P.','Male','ROY','$2y$10$25BvyDxglH9wFsuT0e18B.7pVQQjZ6f99.hnGyGzfKf8CCJ2b3hmK','royskie@gmail.com','1998-08-04 00:00:00','ur2','MABINI LIBMANAN CAMARINES SUR','img/profile/download.jpeg','09520471035','ustts2','891416'),(40,'Miguel','Merabreno','I.','Male','MIGUEL','$2y$10$CdSmELSHSnGejpXQdctUre6FiMhTZe4fcQ6bA7BbGqhdTCTvakwAy','miguelken2@gmail.com','1997-01-09 00:00:00','ur3','MABINI LIBMANAN CAMARINES SUR','img/profile/481e5ea281c9296a14f205adbc8ca0aba06f9a65r1-480-599v2_hq.jpg','09620540741','ustts6','838411'),(41,'Justin','Merabreno','G.','Male','JUSTIN','$2y$10$EaLTCkhF69yfzdSLNFJgaucaPQ.P8tnxOo83ibz3d0xLDwahUAP6m','justin231@gmail.com','1997-02-08 00:00:00','ur2','MABINI LIBMANAN CAMARINES SUR','img/profile/images.jpeg','09630514078','ustts2','397989'),(42,'Bernadette','Solayao','H.','Female','BERNA','$2y$10$gphv5BhX2Q/S2YsDU3ewj.L1ZCJpJxArbthJTxralMzTYx/5opeZC','berna221@gmail.com','1999-04-08 00:00:00','ur2','SIGAMOT LIBMANAN CAMARINES SUR','img/profile/19.jpg','09652031047','ustts2','657941'),(43,'Carlo','Modinao',' U.','Male','CARLO','$2y$10$LWJeVBdwLwf2ByQqNGAAsugjTOHgq7L19OWUx6cvmilogiYl/jEue','carlo022@gmail.com','1991-02-05 00:00:00','ur4','NAGA CITY CAMARINES SUR','img/profile/download.jpeg','09630140571','ustts2','287640'),(44,'Pacsual','Lonario','G.','Male','PASCUAL','$2y$10$T9yeqtgBTa/NNQ8alRw6/OSpsmlwVB/J2NZXotmK93cydS32fwyr2','pascual022@gmail.com','1992-12-11 00:00:00','ur4','Lobaloba Libamanan Cam sur','img/profile/32e6a9ffb27f18115fc99e3b6d74f0f4--cristo-quotes.jpg','09890976787','ustts2','587892'),(45,'Makino','Direk','D.','Male','MAKINO','$2y$10$4i0o6PCsueTVaGXxheGLZOFLCZs4EXODd1JUkF8GU04YJve3RJMlW','makino22@gmail.com','1992-03-11 00:00:00','ur4','Naga City Camarines Sur','img/profile/anime-boy-4k-xl.jpg','09231834131','ustts2','390393'),(46,'Max','Dramino','D.','Male','MAX','$2y$10$zrRht5v1kjFU3zVKKs3fSez61aDH.ZhSYvthYjaL0GGiwu4QTM8SS','max222@gmail.com','1899-10-31 00:00:00','ur4','Cabusao Camarines Sur','img/profile/cabusao-logo.png','09287361731','ustts1','301515'),(47,'Jose','MARCUS','p','Male','JOSE','$2y$10$T7Etu2U.f30prDUw/kpC.unHrBOt/1yM5zx.d81CGjzPvhMI4N2.O','jose@hmail.com','2022-12-31 00:00:00','ur2','LOBA','img/profile/avatar.png','09075464959','ustts6','513706');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wig`
--

DROP TABLE IF EXISTS `wig`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wig` (
  `wig_id` int NOT NULL AUTO_INCREMENT,
  `area_i` int DEFAULT NULL,
  `area_ii` int DEFAULT NULL,
  `area_iii` int DEFAULT NULL,
  `area_iv` int DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`wig_id`),
  UNIQUE KEY `wig_id_UNIQUE` (`wig_id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wig`
--

LOCK TABLES `wig` WRITE;
/*!40000 ALTER TABLE `wig` DISABLE KEYS */;
INSERT INTO `wig` VALUES (46,100,0,0,0,'2022-11-23 07:05:42','2022-11-22 21:08:15'),(47,NULL,NULL,NULL,NULL,'2022-11-23 02:11:49','2022-11-22 21:11:49'),(48,75,100,100,100,'2022-11-23 02:33:19','2022-11-22 21:14:21'),(49,NULL,NULL,NULL,NULL,'2022-11-23 03:07:26','2022-11-22 22:07:26'),(50,NULL,NULL,NULL,NULL,'2022-11-23 03:08:06','2022-11-22 22:08:06'),(51,NULL,NULL,NULL,NULL,'2022-11-23 03:08:36','2022-11-22 22:08:36'),(52,NULL,NULL,NULL,NULL,'2022-11-23 03:09:03','2022-11-22 22:09:03'),(53,NULL,NULL,NULL,NULL,'2022-11-23 03:09:46','2022-11-22 22:09:46'),(54,NULL,NULL,NULL,NULL,'2022-11-23 03:10:17','2022-11-22 22:10:17'),(55,NULL,NULL,NULL,NULL,'2022-11-23 03:10:51','2022-11-22 22:10:51'),(56,NULL,NULL,NULL,NULL,'2022-11-23 03:11:26','2022-11-22 22:11:26'),(57,NULL,NULL,NULL,NULL,'2022-11-23 03:11:55','2022-11-22 22:11:55'),(58,NULL,NULL,NULL,NULL,'2022-11-23 04:33:42','2022-11-22 23:33:42'),(59,100,100,100,100,'2022-11-27 07:39:41','2022-11-27 10:16:10');
/*!40000 ALTER TABLE `wig` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wig_picture`
--

DROP TABLE IF EXISTS `wig_picture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wig_picture` (
  `id` int NOT NULL AUTO_INCREMENT,
  `picture` varchar(255) DEFAULT NULL,
  `pic_status` varchar(45) DEFAULT NULL,
  `area_no` varchar(45) DEFAULT NULL,
  `picture_no` varchar(45) DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `task_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wig_picture`
--

LOCK TABLES `wig_picture` WRITE;
/*!40000 ALTER TABLE `wig_picture` DISABLE KEYS */;
INSERT INTO `wig_picture` VALUES (26,'img/history/wigs-1633032698.png','Approved','area_i','area_i_pic_one','2022-11-22 21:10:33','JA392841'),(27,'img/history/wigs-1633032698.png','Approved','area_i','area_i_pic_one','2022-11-22 21:10:59','JA392841'),(28,'img/history/images (1).jpeg','Approved','area_i','area_i_pic_two','2022-11-22 21:28:07','4817100'),(29,'img/history/wig-terms.jpg','Approved','area_i','area_i_pic_three','2022-11-22 21:28:27','4817100'),(30,'img/history/wig-terms.jpg','Approved','area_i','area_i_pic_four','2022-11-22 21:28:43','4817100'),(31,'img/history/wigs-1633032698.png','Approved','area_ii','area_ii_pic_one','2022-11-22 21:29:23','4817100'),(32,'img/history/wig-terms.jpg','Approved','area_ii','area_ii_pic_two','2022-11-22 21:29:45','4817100'),(33,'img/history/wig-terms.jpg','Approved','area_ii','area_ii_pic_three','2022-11-22 21:30:11','4817100'),(34,'img/history/wig-terms.jpg','Approved','area_ii','area_ii_pic_four','2022-11-22 21:30:32','4817100'),(35,'img/history/wig-terms.jpg','Approved','area_iv','area_iv_pic_one','2022-11-22 21:30:49','4817100'),(36,'img/history/wig-terms.jpg','Approved','area_iv','area_iv_pic_two','2022-11-22 21:31:04','4817100'),(37,'img/history/images.jpg','Approved','area_iv','area_iv_pic_four','2022-11-22 21:31:36','4817100'),(38,'img/history/wig-terms.jpg','Approved','area_iv','area_iv_pic_three','2022-11-22 21:31:56','4817100'),(39,'img/history/wig-terms.jpg','Approved','area_iii','area_iii_pic_one','2022-11-22 21:32:15','4817100'),(40,'img/history/wig-terms.jpg','Approved','area_iii','area_iii_pic_four','2022-11-22 21:32:31','4817100'),(41,'img/history/wig-terms.jpg','Approved','area_iii','area_iii_pic_three','2022-11-22 21:32:52','4817100'),(42,'img/history/wig-terms.jpg','Approved','area_iii','area_iii_pic_two','2022-11-22 21:33:11','4817100'),(43,'img/history/images (1).jpeg','Rejected','area_i','area_i_pic_two','2022-11-22 23:13:41','CS234245'),(44,'img/history/wigs-1633032698.png','Rejected','area_ii','area_ii_pic_one','2022-11-22 23:14:06','CS234245'),(45,'img/history/images (1).jpeg','Rejected','area_i','area_i_pic_two','2022-11-23 00:41:19','JA392841'),(46,'img/history/images (1).jpeg','Approved','area_i','area_i_pic_two','2022-11-23 00:46:05','JA392841'),(47,'img/history/images (1).jpeg','Rejected','area_i','area_i_pic_two','2022-11-23 00:49:12','JA392841'),(48,'img/history/6df5260a-a761-4bcc-b4dd-5891d0442cdc.jpeg','Approved','area_i','area_i_pic_three','2022-11-23 01:57:55','JA392841'),(49,'img/history/images (1).jpeg','Pending','area_i','area_i_pic_two','2022-11-23 21:48:16','JA392841'),(50,'img/history/wigs-1633032698.png','Pending','area_i','area_i_pic_one','2022-11-26 11:00:45','UA314901'),(51,'img/history/image-asset.jpeg','Rejected','area_iv','area_iv_pic_two','2022-11-27 11:03:23','ORDER123'),(52,'img/history/Hbe9e969d6d4e4458a1b980387afe5161N.jpg','Approved','area_i','area_i_pic_one','2022-11-27 11:05:03','ORDER123'),(53,'img/history/image-asset (1).jpeg','Approved','area_i','area_i_pic_two','2022-11-27 11:07:34','ORDER123'),(54,'img/history/wigs-1633032698.png','Approved','area_i','area_i_pic_three','2022-11-27 11:07:44','ORDER123'),(55,'img/history/download (1).jpeg','Approved','area_i','area_i_pic_four','2022-11-27 11:07:58','ORDER123'),(56,'img/history/wigs-1633032698.png','Rejected','area_iv','area_iv_pic_two','2022-11-27 11:54:11','ORDER123'),(57,'img/history/Hbe9e969d6d4e4458a1b980387afe5161N.jpg','Rejected','area_iv','area_iv_pic_two','2022-11-27 11:58:47','ORDER123'),(58,'img/history/download (1).jpeg','Approved','area_ii','area_ii_pic_one','2022-11-27 15:35:06','ORDER123'),(59,'img/history/wigs-1633032698.png','Approved','area_ii','area_ii_pic_two','2022-11-27 15:35:16','ORDER123'),(60,'img/history/images (1).jpeg','Approved','area_ii','area_ii_pic_three','2022-11-27 15:35:27','ORDER123'),(61,'img/history/Hbe9e969d6d4e4458a1b980387afe5161N.jpg','Approved','area_ii','area_ii_pic_four','2022-11-27 15:35:37','ORDER123'),(62,'img/history/image-asset (1).jpeg','Approved','area_iii','area_iii_pic_one','2022-11-27 15:35:48','ORDER123'),(63,'img/history/image-asset.jpeg','Approved','area_iii','area_iii_pic_two','2022-11-27 15:35:59','ORDER123'),(64,'img/history/Hbe9e969d6d4e4458a1b980387afe5161N.jpg','Approved','area_iii','area_iii_pic_three','2022-11-27 15:36:10','ORDER123'),(65,'img/history/download (1).jpeg','Approved','area_iv','area_iv_pic_one','2022-11-27 15:36:23','ORDER123'),(66,'img/history/wigs-1633032698.png','Approved','area_iv','area_iv_pic_two','2022-11-27 15:36:35','ORDER123'),(67,'img/history/image-asset (1).jpeg','Approved','area_iv','area_iv_pic_three','2022-11-27 15:36:45','ORDER123'),(68,'img/history/Hbe9e969d6d4e4458a1b980387afe5161N.jpg','Approved','area_iv','area_iv_pic_four','2022-11-27 15:36:55','ORDER123'),(69,'img/history/Hbe9e969d6d4e4458a1b980387afe5161N.jpg','Approved','area_iii','area_iii_pic_four','2022-11-27 15:39:26','ORDER123');
/*!40000 ALTER TABLE `wig_picture` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-27 16:28:18
