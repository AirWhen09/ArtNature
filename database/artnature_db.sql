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
  PRIMARY KEY (`location_id`),
  UNIQUE KEY `location_id_UNIQUE` (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES (1,'Barangay Mabini, Libmanan, Camarines Sur',0,'2022-08-23 15:27:13',3),(2,'Barangay Loba-loba, Libmanan, Camarines Sur',1,'2022-08-23 15:29:57',3),(3,'Location 3',0,'2022-08-20 11:58:28',0),(4,'Location 4',0,'2022-08-20 11:58:28',0);
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
  `status` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`msg_id`),
  KEY `msg_from_idx` (`msg_from`,`msg_to`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (2,2,11,'Please do this tomorrow  ','2022-08-13 19:40:44',0),(3,11,2,'Noted po :) thanks','2022-08-13 19:50:52',0),(5,11,2,'Good Evening ma\'am','2022-08-13 20:20:05',0),(7,2,11,'Do it within 2 weeks','2022-08-13 20:32:09',0),(8,2,4,'Good Morning, please change your address ','2022-08-14 07:51:41',0),(9,2,8,'Don\'t be late tomorrow!','2022-08-14 09:54:36',0),(11,2,10,'need asap','2022-08-14 18:01:29',0),(12,2,4,'Need ASAP','2022-08-14 18:08:15',0),(13,2,5,'Need ASAP','2022-08-14 18:08:42',0),(14,2,9,'Need ASAP','2022-08-14 18:09:10',0),(15,2,4,'Need ASAP','2022-08-14 18:10:21',0),(16,2,7,'Need ASAP','2022-08-16 06:59:13',0),(17,2,9,'Need Asap','2022-08-16 07:00:12',0),(18,2,4,'this is a try','2022-08-27 11:04:16',0),(19,2,7,'a','2022-09-01 05:15:53',0);
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
  `description` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(45) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`notif_id`),
  UNIQUE KEY `idnotification_UNIQUE` (`notif_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
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
  PRIMARY KEY (`ref_id`),
  UNIQUE KEY `ref_id_UNIQUE` (`ref_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reference_code`
--

LOCK TABLES `reference_code` WRITE;
/*!40000 ALTER TABLE `reference_code` DISABLE KEYS */;
INSERT INTO `reference_code` VALUES ('bstts1','New','1','Batch Status','bstts'),('bstts2','Production','2','Batch Status','bstts'),('bstts3','Done','3','Batch Status','bstts'),('bstts4','Archived','4','Batch Status','bstts'),('mdl1','Model 1','1','Wig Model','mdl'),('mdl2','Model 2','2','Wig Model','mdl'),('mdl3','Model 3','3','Wig Model','mdl'),('mdl4','Model 4','4','Wig Model','mdl'),('mdl5','Model 5','5','Wig Model ','mdl'),('sz1','1','1','Wig Size','sz'),('sz2','2','2','Wig Size','sz'),('sz3','3','3','Wig Size','sz'),('sz4','4','4','Wig Size ','sz'),('tstts1','New','1','Task Status','tstts'),('tstts2','Production','2','Task Status','tstts'),('tstts3','Done','3','Task Status','tstts'),('tstts4','Archived','4','Task Status','tstts'),('tstts5','Lapsed','5','Task Status','tstts'),('typ1','Type 1','1','Wig Type','typ'),('typ2','Type 2','2','Wig Type','typ'),('typ3','Type 3','3','Wig Type ','typ'),('typ4','Type 4','4','Wig Type','typ'),('ur1','Admin','1','User Role','ur'),('ur2','Employee: On-Site','2','User Role','ur'),('ur3','Employee: Work-From-Home','3','User Role','ur'),('ur4','Driver','4','User Role','ur'),('ustts1','Pending','1','User Status','ustts'),('ustts2','Approved','2','User Status','ustts'),('ustts3','Rejected','3','User Status','ustts'),('ustts4','Archived','4','User Status','ustts');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_batch`
--

LOCK TABLES `task_batch` WRITE;
/*!40000 ALTER TABLE `task_batch` DISABLE KEYS */;
INSERT INTO `task_batch` VALUES (1,'B2022-1001','bstts2','70','2022-08-15 18:04:13'),(2,'B2022-1002','bstts3','30','2022-08-16 09:34:34'),(3,'B2022-1003','bstts1','0','2022-08-16 21:51:14'),(4,'B2022-1004','bstts1','0','2022-08-16 21:53:43'),(5,'B2022-1005','bstts1','0','2022-08-16 21:54:45');
/*!40000 ALTER TABLE `task_batch` ENABLE KEYS */;
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_progress_history`
--

LOCK TABLES `task_progress_history` WRITE;
/*!40000 ALTER TABLE `task_progress_history` DISABLE KEYS */;
INSERT INTO `task_progress_history` VALUES (1,'img/history/Wig-Making.jpg','2022-08-17 06:45:19','OR1004',58),(2,'img/history/Wig-Making.jpg','2022-08-17 06:45:30','OR1004',58),(3,'img/history/Wig-Making.jpg','2022-08-17 06:46:49','OR1004',58),(4,'img/history/Wig-Making.jpg','2022-08-17 06:47:08','OR1004',64),(5,'img/history/Wig-Making.jpg','2022-08-21 16:58:04','OR1004',100),(6,'img/nopic.png','2022-08-27 08:39:21','OR1002',83),(7,'img/nopic.png','2022-09-01 05:27:45','OR1018',6),(8,'img/nopic.png','2022-09-01 05:29:08','OR1011',100),(9,'img/nopic.png','2022-09-01 05:29:35','OR1018',100),(10,'img/nopic.png','2022-09-01 05:33:12','OR1012',100);
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
  `no_of_days` int NOT NULL,
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
INSERT INTO `tasks` VALUES ('OR1001','100',11,'mdl2','sz2','tstts3','2022-08-12 12:41:53','2022-08-31 21:38:01','rush po','2022-08-14 00:00:00','2022-08-20 00:00:00','1',7),('OR1002','83',5,'mdl3','sz2','tstts2','2022-08-12 13:17:02','2022-08-31 21:38:01','Need next month','2022-08-13 00:00:00','2022-08-13 00:00:00','1',1),('OR1003','83',10,'mdl2','sz2','tstts2','2022-08-12 13:19:34','2022-08-31 21:38:01','Need next month','2022-08-15 00:00:00','2022-08-19 00:00:00','1',5),('OR1004','100',11,'mdl3','sz1','tstts4','2022-08-12 20:32:20','2022-08-31 21:38:01','Need next month','2022-08-13 00:00:00','2022-08-27 00:00:00','1',15),('OR1005','58',10,'mdl3','sz2','tstts2','2022-08-12 20:36:01','2022-08-31 21:38:01','just do it','2022-08-14 18:00:00','2022-08-27 18:01:00','1',14),('OR1006','71',5,'mdl2','sz1','tstts2','2022-08-14 09:11:18','2022-08-31 21:38:01','Need ASAP','2022-08-14 18:08:00','2022-08-22 18:08:00','1',8),('OR1007','38',4,'mdl1','sz2','tstts2','2022-08-14 17:58:44','2022-08-31 21:38:01','for male','2022-08-14 18:08:00','2022-08-20 18:08:00','1',7),('OR1008','74',9,'mdl2','sz1','tstts2','2022-08-14 17:59:06','2022-08-31 21:38:01','for women','2022-08-15 18:09:00','2022-08-16 18:09:00','1',2),('OR1009','78',4,'mdl3','sz2','tstts2','2022-08-14 17:59:37','2022-08-31 21:38:01','for men','2022-08-14 18:10:00','2022-08-22 18:10:00','1',9),('OR1010','0',7,'mdl1','sz2','tstts2','2022-08-14 18:00:11','2022-08-31 21:38:01','for men','2022-08-16 06:58:00','2022-08-23 06:58:00','1',8),('OR1011','100',9,'mdl4','sz2','tstts3','2022-08-14 18:00:31','2022-08-31 21:38:01','for women','2022-08-26 06:59:00','2022-08-28 06:59:00','2',3),('OR1012','100',4,'mdl1','sz1','tstts3','2022-08-14 18:04:56','2022-08-31 21:38:01','Need ASAP','2022-08-27 11:03:00','2022-08-30 11:04:00','1',4),('OR1013',NULL,NULL,'mdl2','sz1','tstts1','2022-08-14 18:05:10','2022-08-15 02:04:45','Need ASAP',NULL,NULL,'1',0),('OR1014',NULL,NULL,'mdl2','sz3','tstts1','2022-08-14 18:05:41','2022-08-15 02:04:45','Need ASAP',NULL,NULL,'1',0),('OR1015',NULL,NULL,'mdl2','sz3','tstts1','2022-08-14 18:06:06','2022-08-15 02:04:45','Need ASAP',NULL,NULL,'1',0),('OR1016',NULL,NULL,'mdl2','sz2','tstts1','2022-08-14 18:06:50','2022-08-15 02:04:45','Need ASAP',NULL,NULL,'1',0),('OR1017',NULL,NULL,'mdl1','sz3','tstts1','2022-08-14 18:07:06','2022-08-15 02:04:45','Need ASAP',NULL,NULL,'1',0),('OR1018','100',7,'mdl2','sz1','tstts3','2022-08-16 21:41:01','2022-08-31 21:29:35','Something wrong with the keyboard','2022-09-12 05:15:00','2022-09-16 05:15:00','2',5),('OR1019',NULL,NULL,'mdl3','sz4','tstts1','2022-08-16 21:51:14','2022-08-16 05:55:04','do what you want',NULL,NULL,'3',0),('OR1020',NULL,NULL,'mdl3','sz2','tstts4','2022-08-16 21:53:43','2022-08-16 13:33:35','May pagbabago ka',NULL,NULL,'4',0),('OR1021',NULL,NULL,'mdl2','sz2','tstts1','2022-08-16 21:54:45','2022-08-16 05:54:45','hindi mo na ba hinahanap',NULL,NULL,'5',0);
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
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
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'ADMIN','ADMIN','ADMIN','Male','ADMIN','$2y$10$.AFLJha7UnzVvNuouWO/9O0LXt2Ct5HP9Dz4yfDdaqolCZZAnwmYG','admin@gmail.com','2022-08-08 00:00:00','ur1','SIPOCOT, CAMARINES SUR','img/profile/rangga-cahya-nugraha-LK9UBaUEEXk-unsplash.jpg','09758781348','ustts2'),(3,'Laura','smith','S','Female','JUNEL','$2y$10$8NfOBs27WAd.jYfSHdrxnemAwInKoSzWN7iZAj7S5eGz11UCQt3UW','teshunter1@fakegmail.com','2022-08-08 00:00:00','ur4','cam sur','img/profile/filipe-almeida-XHpgMMiOvuM-unsplash.jpg','12345678987','ustts2'),(4,'John','Depp','D','Male','John','$2y$10$HH5KQ4JytPJTNl.dGmNB8e0btuU5cpKK2zNzN.pnnDhnVPMQJiYEW','bhouse@gmail.com','2022-08-03 00:00:00','ur3','cam sur','img/profile/280609742_1737019729975745_1441563036804772206_n.jpg','12345678987','ustts2'),(5,'Joana','Nix','M','Female','JOANA','$2y$10$J4Q0QicKi1stWl7OFqrebeUsM/62D9V3uek0jTYrwn/jx7V1KSemW','joana@gmail.com','2013-06-12 00:00:00','ur3','SIPOCOT, CAMARINES SUR','img/profile/joanna-nix-walkup-h2pnXHMz8YM-unsplash.jpg','12345678987','ustts2'),(6,'Alex','Suprun','A','Male','ALEX','$2y$10$HafBOo5BYE8n0PSgmjDKiu4/aeE89Pc7hfpnerDg8oHteHwQkQBVK','alex@gmail.com','1998-12-01 00:00:00','ur4','LIBMANAN, CAMARINES SUR','img/profile/alex-suprun-ZHvM3XIOHoE-unsplash.jpg','09758781348','ustts1'),(7,'Hugo','Delauney','S','Male','HUGO','$2y$10$0iloltgNLf7Ul5pwGZ6D0uMLegVjjp7vQu31uHgZE7stiO7KKa2Vi','hugo@gmail.com','1992-07-04 00:00:00','ur2','LIBMANAN, CAMARINES SUR','img/profile/hugo-delauney-hukpWOHwF1Q-unsplash.jpg','09758781348','ustts1'),(8,'Miles','San','D','Female','MILES','$2y$10$2tLvTcmTuCZqOlqj7qSaDen8y3G.0q0tDslfrh2e2jQ2Oc9asWWRy','miles@gmail.com','1999-11-02 00:00:00','ur3','SIPOCOT, CAMARINES SUR','img/profile/mike-san-IU4Z5vVUO5E-unsplash.jpg','09075464959','ustts2'),(9,'Hayes','Potter','P','Female','HAYES','$2y$10$Vz4/nguM/4HK3uFaSmSIcuu1/8wgrOBNzkVO40SKXSXZ1V6zfQsbe','hayes@gmail.com','2000-04-05 00:00:00','ur2','LIBMANAN, CAMARINES SUR','img/profile/hayes-potter-Dcr2sFFopP8-unsplash.jpg','09758781348','ustts1'),(10,'Mich','Alfonso','A','Female','MICH','$2y$10$gK0J3S1WSshvPWxdeukAVucSqr/ZuHWtP9HrtURvNrt9Yofd0tGQG','mich@gmail.com','1999-07-06 00:00:00','ur3','LIBMANAN, CAMARINES SUR','img/profile/michael-afonso-3lbxyaAoXbU-unsplash.jpg','09758781348','ustts1'),(11,'Anya','Foger','I','Female','ANYA','$2y$10$dgLekyeq4uzgSdhwykQYM.Y6s3FfesSF.g.hhOQjX/Lms4en4UUkm','anya@gmail.com','1999-12-12 00:00:00','ur2','SIPOCOT, CAMARINES SUR','img/profile/anya.jpg','12345678987','ustts2');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wigs`
--

DROP TABLE IF EXISTS `wigs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wigs` (
  `model` varchar(100) NOT NULL,
  `type` varchar(45) NOT NULL,
  `size` varchar(45) NOT NULL,
  PRIMARY KEY (`model`),
  UNIQUE KEY `model_UNIQUE` (`model`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wigs`
--

LOCK TABLES `wigs` WRITE;
/*!40000 ALTER TABLE `wigs` DISABLE KEYS */;
INSERT INTO `wigs` VALUES ('mdl1','typ1','sz1'),('mdl2','typ2','sz2');
/*!40000 ALTER TABLE `wigs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-17 16:24:19
