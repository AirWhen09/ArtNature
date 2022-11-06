-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: artnature_db
-- ------------------------------------------------------
-- Server version	8.0.29

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
INSERT INTO `location` VALUES (1,'LIBMANAN, CAMARINES SUR',1,'2022-08-24 03:30:40',3),(2,'Location 2',0,'2022-08-24 03:30:40',3),(3,'Location 3',0,'2022-08-21 03:15:06',0),(4,'Location 4',0,'2022-08-21 00:04:24',0),(5,'Location 5',0,'2022-08-21 00:04:24',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (33,2,21,'Add some color','2022-11-05 19:48:32',1);
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
  UNIQUE KEY `notif_id_UNIQUE` (`notif_id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` VALUES (67,'Your task has already been assigned by Artnature Admin. Gratitude and Goodluck to you! Order Number: OR1001',21,1),(68,'Sammie Frey FAILED TO MEET THE EXPECTED PROCESS ON DAY 1',2,0),(69,'Sammie Frey FAILED TO MEET THE EXPECTED PROCESS ON DAY 1',2,0),(70,'Sammie Frey FAILED TO MEET THE EXPECTED PROCESS ON DAY 1',2,0),(71,'Sammie Frey FAILED TO MEET THE EXPECTED PROCESS ON DAY 1',2,0),(72,'Sammie Frey FAILED TO MEET THE EXPECTED PROCESS ON DAY 1',2,0),(73,'Sammie Frey FAILED TO MEET THE EXPECTED PROCESS ON DAY 1',2,0),(74,'Sammie Frey FAILED TO MEET THE EXPECTED PROCESS ON DAY 1',2,0),(75,'Sammie Frey FAILED TO MEET THE EXPECTED PROCESS ON DAY 1',2,0),(76,'Sammie Frey FAILED TO MEET THE EXPECTED PROCESS ON DAY 1',2,0);
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
INSERT INTO `reference_code` VALUES ('bstts1','New','1','Batch Status','bstts'),('bstts2','Production','2','Batch Status','bstts'),('bstts3','Done','3','Batch Status','bstts'),('bstts4','Archived','4','Batch Status','bstts'),('bstts5','Delivered','5','Batch Status','bstts'),('mdl1','Model 1','1','Wig Model','mdl'),('mdl2','NS','2','Wig Model','mdl'),('mdl3','Model 3','3','Wig Model','mdl'),('mdl4','Model 4','4','Wig Model','mdl'),('mdl5','Model 5','5','Wig Model ','mdl'),('sz1','1','1','Wig Size','sz'),('sz2','2','2','Wig Size','sz'),('sz3','3','3','Wig Size','sz'),('sz4','4','4','Wig Size ','sz'),('tstts1','New','1','Task Status','tstts'),('tstts2','Production','2','Task Status','tstts'),('tstts3','Done','3','Task Status','tstts'),('tstts4','Archived','4','Task Status','tstts'),('tstts5','Lapsed','5','Task Status','tstts'),('typ1','Type 1','1','Wig Type','typ'),('typ2','Type 2','2','Wig Type','typ'),('typ3','Type 3','3','Wig Type ','typ'),('typ4','Type 4','4','Wig Type','typ'),('ur1','Admin','1','User Role','ur'),('ur2','Employee: On-Site','2','User Role','ur'),('ur3','Employee: Work-From-Home','3','User Role','ur'),('ur4','Driver','4','User Role','ur'),('ustts1','Pending','1','User Status','ustts'),('ustts2','Approved','2','User Status','ustts'),('ustts3','Rejected','3','User Status','ustts'),('ustts4','Archived','4','User Status','ustts');
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
  PRIMARY KEY (`batch_id`),
  UNIQUE KEY `batch_id_UNIQUE` (`batch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_batch`
--

LOCK TABLES `task_batch` WRITE;
/*!40000 ALTER TABLE `task_batch` DISABLE KEYS */;
INSERT INTO `task_batch` VALUES (9,'BATCH1','bstts1','0','2022-11-05 18:18:58');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_batch_location`
--

LOCK TABLES `task_batch_location` WRITE;
/*!40000 ALTER TABLE `task_batch_location` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_progress_history`
--

LOCK TABLES `task_progress_history` WRITE;
/*!40000 ALTER TABLE `task_progress_history` DISABLE KEYS */;
INSERT INTO `task_progress_history` VALUES (78,'img/history/6.jpg','2022-11-05 20:00:23','OR1001',25,'area_iii'),(79,'img/history/3.jpg','2022-11-05 20:00:36','OR1001',25,'area_i');
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
INSERT INTO `tasks` VALUES ('OR1001','12.5',21,'mdl1','sz1','tstts2','2022-11-05 18:18:58','2022-11-05 15:20:27','Add some description','2022-11-05 19:48:00','2022-11-05 19:48:00','9',1,10,'Good');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks_days`
--

LOCK TABLES `tasks_days` WRITE;
/*!40000 ALTER TABLE `tasks_days` DISABLE KEYS */;
INSERT INTO `tasks_days` VALUES (6,'2022-11-05','OR1001',0,'12.5'),(7,'2022-11-05','OR1001',0,'12.5');
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'ADMIN','ADMIN','A','Female','ADMIN','$2y$10$.AFLJha7UnzVvNuouWO/9O0LXt2Ct5HP9Dz4yfDdaqolCZZAnwmYG','admin@gmail.com','2022-08-28 00:00:00','ur1','SIPOCOT, CAMARINES SUR','img/profile/rangga-cahya-nugraha-LK9UBaUEEXk-unsplash.jpg','09758781348','ustts2',''),(21,'Sammie','Frey','F','Male','SAM','$2y$10$R0foAUlARr.xaqj8pwCDYu1iqWCKWhr93iHIbM.BLIi5C2EQz1q4u','sammie@gmail.com','2022-11-08 00:00:00','ur3','Libmanan, Camarines Sur','img/profile/8.jpg','09758781348','ustts2','385586');
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
  `area_i_pic` varchar(255) DEFAULT NULL,
  `area_ii_pic` varchar(255) DEFAULT NULL,
  `area_iii_pic` varchar(255) DEFAULT NULL,
  `area_iv_pic` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `area_i_pic_one` varchar(255) DEFAULT NULL,
  `area_i_pic_two` varchar(255) DEFAULT NULL,
  `area_i_pic_three` varchar(255) DEFAULT NULL,
  `area_i_pic_four` varchar(255) DEFAULT NULL,
  `area_ii_pic_one` varchar(255) DEFAULT NULL,
  `area_ii_pic_two` varchar(255) DEFAULT NULL,
  `area_ii_pic_three` varchar(255) DEFAULT NULL,
  `area_ii_pic_four` varchar(255) DEFAULT NULL,
  `area_iii_pic_one` varchar(255) DEFAULT NULL,
  `area_iii_pic_two` varchar(255) DEFAULT NULL,
  `area_iii_pic_three` varchar(255) DEFAULT NULL,
  `area_iii_pic_four` varchar(255) DEFAULT NULL,
  `area_iv_pic_one` varchar(255) DEFAULT NULL,
  `area_iv_pic_two` varchar(255) DEFAULT NULL,
  `area_iv_pic_three` varchar(255) DEFAULT NULL,
  `area_iv_pic_four` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`wig_id`),
  UNIQUE KEY `wig_id_UNIQUE` (`wig_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wig`
--

LOCK TABLES `wig` WRITE;
/*!40000 ALTER TABLE `wig` DISABLE KEYS */;
INSERT INTO `wig` VALUES (10,25,0,25,0,'img/nopic.png','img/nopic.png','img/nopic.png','img/nopic.png','2022-11-05 12:00:36','2022-11-05 18:18:58','img/history/3.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'img/history/6.jpg',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `wig` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-06 12:06:50
