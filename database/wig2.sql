-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: artnature_db
-- ------------------------------------------------------
-- Server version	5.7.33

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
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `driver_id` int(11) NOT NULL,
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
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_from` int(11) NOT NULL,
  `msg_to` int(11) NOT NULL,
  `message` varchar(45) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`msg_id`),
  KEY `msg_from_idx` (`msg_from`,`msg_to`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (18,2,15,'Hi Hayes,\r\n\r\ngood luck','2022-08-27 13:43:03'),(19,2,13,'Hi joanna, good luck','2022-08-27 13:56:40');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reference_code`
--

LOCK TABLES `reference_code` WRITE;
/*!40000 ALTER TABLE `reference_code` DISABLE KEYS */;
INSERT INTO `reference_code` VALUES ('bstts1','New','1','Batch Status','bstts'),('bstts2','Production','2','Batch Status','bstts'),('bstts3','Done','3','Batch Status','bstts'),('bstts4','Archived','4','Batch Status','bstts'),('mdl1','Model 1','1','Wig Model','mdl'),('mdl2','NS','2','Wig Model','mdl'),('mdl3','Model 3','3','Wig Model','mdl'),('mdl4','Model 4','4','Wig Model','mdl'),('mdl5','Model 5','5','Wig Model ','mdl'),('sz1','1','1','Wig Size','sz'),('sz2','2','2','Wig Size','sz'),('sz3','3','3','Wig Size','sz'),('sz4','4','4','Wig Size ','sz'),('tstts1','New','1','Task Status','tstts'),('tstts2','Production','2','Task Status','tstts'),('tstts3','Done','3','Task Status','tstts'),('tstts4','Archived','4','Task Status','tstts'),('typ1','Type 1','1','Wig Type','typ'),('typ2','Type 2','2','Wig Type','typ'),('typ3','Type 3','3','Wig Type ','typ'),('typ4','Type 4','4','Wig Type','typ'),('ur1','Admin','1','User Role','ur'),('ur2','Employee: On-Site','2','User Role','ur'),('ur3','Employee: Work-From-Home','3','User Role','ur'),('ur4','Driver','4','User Role','ur'),('ustts1','Pending','1','User Status','ustts'),('ustts2','Approved','2','User Status','ustts'),('ustts3','Rejected','3','User Status','ustts'),('ustts4','Archived','4','User Status','ustts');
/*!40000 ALTER TABLE `reference_code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task_batch`
--

DROP TABLE IF EXISTS `task_batch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `task_batch` (
  `batch_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `progress` varchar(45) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`batch_id`),
  UNIQUE KEY `batch_id_UNIQUE` (`batch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_batch`
--

LOCK TABLES `task_batch` WRITE;
/*!40000 ALTER TABLE `task_batch` DISABLE KEYS */;
INSERT INTO `task_batch` VALUES (6,'B2022-1001','bstts1','0','2022-08-27 13:31:18'),(7,'B2022-1002','bstts1','0','2022-08-27 13:58:15');
/*!40000 ALTER TABLE `task_batch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task_progress_history`
--

DROP TABLE IF EXISTS `task_progress_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `task_progress_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `task_id` varchar(45) NOT NULL,
  `progress` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_progress_history`
--

LOCK TABLES `task_progress_history` WRITE;
/*!40000 ALTER TABLE `task_progress_history` DISABLE KEYS */;
INSERT INTO `task_progress_history` VALUES (6,'img/nopic.png','2022-08-27 13:44:27','OR1001',7),(7,'img/nopic.png','2022-08-27 18:55:09','OR1001',19),(8,'img/nopic.png','2022-08-27 18:55:16','OR1001',27),(9,'img/nopic.png','2022-08-28 06:32:07','OR1002',16);
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
  `user_id` int(11) DEFAULT NULL,
  `wig_model` varchar(100) NOT NULL,
  `wig_size` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` varchar(255) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `batch` varchar(45) NOT NULL,
  `no_of_days` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_no`),
  UNIQUE KEY `order_no_UNIQUE` (`order_no`),
  KEY `wig_id_idx` (`wig_model`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES ('OR1001','27',15,'mdl1','sz1','tstts2','2022-08-27 13:31:18','2022-08-27 10:55:16','for women','2022-08-28 13:42:00','2022-09-02 13:42:00','6',5),('OR1002','16',13,'mdl2','sz2','tstts2','2022-08-27 13:52:12','2022-08-27 22:32:06','For men','2022-08-29 13:55:00','2022-09-03 13:56:00','6',5),('OR1003',NULL,NULL,'mdl3','sz3','tstts1','2022-08-27 13:58:15','2022-08-27 05:58:15','Blonde',NULL,NULL,'7',NULL);
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'ADMIN','ADMIN','A','Male','ADMIN','$2y$10$.AFLJha7UnzVvNuouWO/9O0LXt2Ct5HP9Dz4yfDdaqolCZZAnwmYG','admin@gmail.com','2022-08-26 00:00:00','ur1','SIPOCOT, CAMARINES SUR','img/profile/rangga-cahya-nugraha-LK9UBaUEEXk-unsplash.jpg','09758781348','ustts2'),(12,'Mitch','San','M','Female','MITCH','$2y$10$MOV69Zcw1XlH3WVNc/wk1uKRy.S4fOZmCRUl8oCiSaveYF1y9vQJi','mitch@gmail.com','2022-08-10 00:00:00','ur2','SIPOCOT, CAMARINES SUR','img/profile/mike-san-IU4Z5vVUO5E-unsplash.jpg','09758781348','ustts1'),(13,'Joanna','Nix','J','Female','JOANNA','$2y$10$mA5.vTbhDKVQDwpwITyur.kTDb0SD7pj.OJmhSKFlT9NcSZPH0dkO','joanna@gmail.com','1999-02-02 00:00:00','ur3','LIBMANAN, CAMARINES SUR','img/profile/joanna-nix-walkup-h2pnXHMz8YM-unsplash.jpg','09758781348','ustts1'),(14,'Hugo','Delau','H','Male','HUGO','$2y$10$dnBkmKGxSnrhIfLsMoSNmeCvIJ0HaQv/6J60EpDusfN.A/xB.8Uy2','hugo@gmail.com','1998-03-03 00:00:00','ur2','SIPOCOT, CAMARINES SUR','img/profile/hugo-delauney-hukpWOHwF1Q-unsplash.jpg','09758781348','ustts1'),(15,'Hayes','Potter','H','Female','HAYES','$2y$10$p/AFrGu2LehTx5bOTTOzvejnviPog4zlsOrCSwlwMxQjPWPTESw5W','hayes@gmail.com','1999-09-04 00:00:00','ur3','SIPOCOT, CAMARINES SUR','img/profile/hayes-potter-Dcr2sFFopP8-unsplash.jpg','09758781348','ustts1'),(16,'Alex','Suprun','A','Male','ALEX','$2y$10$Huo.MM5N0MoXD.7lr2zI.ue6krAWm4eTe.mx7ppweZTRU9S9Nr2KW','alex@gmail.com','1998-07-06 00:00:00','ur4','LIBMANAN, CAMARINES SUR','img/profile/alex-suprun-ZHvM3XIOHoE-unsplash.jpg','09758781348','ustts1');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-28  7:54:28
