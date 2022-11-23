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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daily_batch_report`
--

LOCK TABLES `daily_batch_report` WRITE;
/*!40000 ALTER TABLE `daily_batch_report` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3510 DEFAULT CHARSET=latin1;
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
  PRIMARY KEY (`ref_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reference_code`
--

LOCK TABLES `reference_code` WRITE;
/*!40000 ALTER TABLE `reference_code` DISABLE KEYS */;
INSERT INTO `reference_code` VALUES ('bstts1','New','1','Batch Status','bstts'),('bstts2','Production','2','Batch Status','bstts'),('bstts3','Done','3','Batch Status','bstts'),('bstts4','Archived','4','Batch Status','bstts'),('bstts5','Delivered','5','Batch Status','bstts'),('mdl1','ESNP','1','Wig Model','mdl'),('mdl2','NS','2','Wig Model','mdl'),('mdl3','HFL','3','Wig Model','mdl'),('mdl4','HPL','4','Wig Model','mdl'),('mdl5','NY','5','Wig Model ','mdl'),('sz1','1','1','Wig Size','sz'),('sz2','2','2','Wig Size','sz'),('sz3','3','3','Wig Size','sz'),('sz4','4','4','Wig Size ','sz'),('tstts1','New','1','Task Status','tstts'),('tstts2','Production','2','Task Status','tstts'),('tstts3','Done','3','Task Status','tstts'),('tstts4','Archived','4','Task Status','tstts'),('tstts5','Lapsed','5','Task Status','tstts'),('tstts6','Damage','6','Task Status','tstts'),('typ1','Type 1','1','Wig Type','typ'),('typ2','Type 2','2','Wig Type','typ'),('typ3','Type 3','3','Wig Type ','typ'),('typ4','Type 4','4','Wig Type','typ'),('ur1','Admin','1','User Role','ur'),('ur2','Employee: On-Site','2','User Role','ur'),('ur3','Employee: Work-From-Home','3','User Role','ur'),('ur4','Driver','4','User Role','ur'),('ustts1','Pending','1','User Status','ustts'),('ustts2','Approved','2','User Status','ustts'),('ustts4','Archived','4','User Status','ustts'),('ustts5','Locked','5','User Status','ustts'),('ustts6','Unlocked','6','User Status','ustts');
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_batch`
--

LOCK TABLES `task_batch` WRITE;
/*!40000 ALTER TABLE `task_batch` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB AUTO_INCREMENT=190 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_progress_history`
--

LOCK TABLES `task_progress_history` WRITE;
/*!40000 ALTER TABLE `task_progress_history` DISABLE KEYS */;
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
INSERT INTO `tasks` VALUES ('BN44520102','25',22,'mdl2','sz1','tstts4','2022-11-07 16:00:49','2022-11-07 03:32:22','SHORT','2022-11-06 16:10:00','2022-11-15 16:11:00','10',10,25,'Damage'),('BU560224','18.75',23,'mdl3','sz2','tstts4','2022-11-07 15:56:13','2022-11-07 03:30:36','SHORT HAIR','2022-11-06 08:00:00','2022-11-15 16:00:00','10',10,14,'Damage'),('DW85600120','9.25',25,'mdl3','sz2','tstts4','2022-11-07 16:02:21','2022-11-07 03:33:10','SHORT HAIR','2022-11-05 08:00:00','2022-11-15 16:00:00','10',11,29,'Damage'),('GG4102301','12.5',33,'mdl3','sz3','tstts5','2022-11-07 16:04:30','2022-11-19 05:48:13','LONG HAIR','2022-11-05 08:00:00','2022-11-15 16:00:00','10',11,34,NULL),('GT1200474','12.5',27,'mdl4','sz1','tstts5','2022-11-07 15:58:35','2022-11-19 05:48:13','LONG HAIR','2022-11-05 16:52:00','2022-11-15 16:53:00','11',11,20,'Good'),('IT2514','100',39,'mdl4','sz1','tstts3','2022-11-07 19:04:23','2022-11-07 03:18:22','SHORT HAIR','2022-11-04 08:00:00','2022-11-07 16:00:00','12',4,35,NULL),('MN00145214','6.25',34,'mdl2','sz1','tstts5','2022-11-07 15:58:14','2022-11-07 01:57:52','SHORT HAIR','2022-11-01 17:54:00','2022-11-06 17:55:00','11',6,19,NULL),('MY779234','6.25',37,'mdl5','sz1','tstts5','2022-11-07 15:56:36','2022-11-19 05:48:13','LONG HAIR','2022-11-04 18:06:00','2022-11-12 18:06:00','11',9,15,NULL),('NS034875','6.25',30,'mdl1','sz2','tstts5','2022-11-07 15:55:37','2022-11-19 05:48:13','SHORT HAIR','2022-11-05 18:08:00','2022-11-10 18:09:00','11',6,13,'Damage'),('OU14020510','100',29,'mdl2','sz1','tstts3','2022-11-07 16:03:30','2022-11-07 03:00:38','LONG HAIR','2022-11-03 18:35:00','2022-11-05 18:35:00','11',5,31,NULL),('PO78401201','0',42,'mdl1','sz2','tstts5','2022-11-07 16:03:49','2022-11-07 03:50:41','SHORT HAIR','2022-11-03 19:50:00','2022-11-06 19:50:00','10',4,32,NULL),('QW45107410','0',39,'mdl2','sz3','tstts4','2022-11-07 15:59:16','2022-11-07 04:03:42','SHORT HAIR','2022-11-05 08:00:00','2022-11-07 16:00:00','10',3,22,NULL),('RG25201047','0',40,'mdl3','sz1','tstts5','2022-11-07 15:59:44','2022-11-19 05:48:13','LONG HAIR','2022-11-05 08:00:00','2022-11-12 16:00:00','10',8,23,NULL),('SA47402031','0',41,'mdl4','sz2','tstts5','2022-11-07 16:01:53','2022-11-07 03:53:35','CURLY HAIR','2022-11-02 19:52:00','2022-11-06 19:53:00','10',5,28,NULL),('SS14011010',NULL,NULL,'mdl3','sz2','tstts1','2022-11-07 15:58:58','2022-11-06 23:58:58','SHORT HAIR',NULL,NULL,'10',NULL,21,NULL),('TO356805',NULL,NULL,'mdl2','sz1','tstts1','2022-11-07 15:52:41','2022-11-06 23:52:41','LONG HAIR',NULL,NULL,'10',NULL,12,NULL),('TR45107412','0',26,'mdl1','sz1','tstts5','2022-11-07 16:00:16','2022-11-20 13:11:48','SHORT HAIR','2022-11-09 08:00:00','2022-11-20 20:09:00','10',12,24,NULL),('TT45120358','0',32,'mdl4','sz1','tstts5','2022-11-07 16:01:08','2022-11-19 05:48:13','LONG HAIR','2022-11-05 08:00:00','2022-11-15 16:00:00','10',11,26,NULL),('TTR45012030','0',35,'mdl1','sz1','tstts5','2022-11-07 16:03:09','2022-11-21 15:17:10','SHORT HAIR','2022-11-09 08:00:00','2022-11-21 16:00:00','11',13,30,NULL),('TY012041','25',24,'mdl4','sz3','tstts5','2022-11-07 15:57:02','2022-11-21 15:25:41','LONG HAIR','2022-11-09 08:00:00','2022-11-21 16:00:00','11',13,16,'Good'),('TY45855541','0',28,'mdl3','sz2','tstts5','2022-11-07 16:01:30','2022-11-21 15:17:10','SHORT HAIR','2022-11-09 08:00:00','2022-11-21 16:00:00','10',13,27,NULL),('UI102034',NULL,NULL,'mdl4','sz3','tstts1','2022-11-07 16:04:06','2022-11-07 00:04:06','LONG HAIR',NULL,NULL,'10',NULL,33,NULL),('WE454768','0',36,'mdl4','sz2','tstts5','2022-11-07 15:57:44','2022-11-19 05:48:13','LONG HAIR','2022-11-09 08:00:00','2022-11-15 16:00:00','11',7,18,NULL),('YT010257','0',38,'mdl4','sz2','tstts5','2022-11-07 15:57:21','2022-11-19 05:48:13','CURLY HAIR','2022-11-05 08:00:00','2022-11-12 16:05:00','10',8,17,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks_days`
--

LOCK TABLES `tasks_days` WRITE;
/*!40000 ALTER TABLE `tasks_days` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'ADMIN','ADMIN','A','Female','ADMIN','$2y$10$.AFLJha7UnzVvNuouWO/9O0LXt2Ct5HP9Dz4yfDdaqolCZZAnwmYG','admin@gmail.com','1992-04-05 00:00:00','ur1','MABINI, CAMARINES SUR','img/profile/6.jpg','09758781348','ustts2',''),(22,'Judy ann','Comia','S.','Female','JUDYANN','$2y$10$gjPZYlpfotF.x/CCf1uvhObzUNmU2L6HJ9UFBd6ZOkhog5.A5rPoy','judyann011@gmail.com','1999-04-08 00:00:00','ur3','MABINI LIBMANAN CAMARINES SUR','img/profile/2.jpg','09157481541','ustts5','211812'),(23,'Angel','Gonzales','P.','Female','ANGLE','$2y$10$nT8nqP/3Whf1kSTGjZ7zJusHjKCQ.G0dkKTZIWADDa83n2ezlwc6m','anglebre21@gmail.com','1999-12-04 00:00:00','ur3','MABINI LIBMANAN CAMARINES SUR','img/profile/3.jpg','09146315851','ustts5','899516'),(24,'Princess Mae','Nolasco','K.','Female','PRINCESS','$2y$10$gculZZ6g7QURayPIrTVKQeDnz1jcSrVoaaM1xV1f4TTRWylghz2NG','princess0113@gmail.com','2000-11-19 00:00:00','ur3','MABINI LIBMANAN CAMARINES SUR','img/profile/6.jpg','09652014075','ustts5','807638'),(25,'Lea','Ascaraga','K.','Female','LEA','$2y$10$4JJq9X85ZrCF2mLK1eItveXlU9YTGf8gb/t11ZnzEEOpWFj8xSXnq','lea024@gmail.com','2000-02-05 00:00:00','ur3','SIGAMOT LIBMANAN CAMARINES SUR','img/profile/8.jpg','09520120147','ustts5','127460'),(26,'Mary Grace','Sanches','O.','Female','MARYGRACE','$2y$10$BLuBNK5HgR7kpRYdAsVmLulEp0RvcNYlzYFw83B340QM9Z734qUOe','marygrace019a@gmail.com','1998-11-06 00:00:00','ur3','SAN ISIDRO LIBMANAN CAMARINES SUR','img/profile/19.jpg','09560140217','ustts5','669497'),(27,'Trisha','Cortes','P.','Female','TRISHA','$2y$10$VpkLDDFGARUu32fh7l1Gser9GQvF8q9/rO78iuUtIOAfuZZWLFT7O','trisha09d3@gmail.com','2000-02-11 00:00:00','ur3','MABINI LIBMANAN CAMARINES SUR','img/profile/FB_IMG_1580630197203.jpg','09630124057','ustts5','320844'),(28,'Lorievic','Pasper','O.','Male','LORIEVIC','$2y$10$432ynClrr6PnuzBsW9vcsOgXdUjb0LNJi1TIxrACyh159vLjyuxHu','lorievic093@gmail.com','1998-06-06 00:00:00','ur3','MABINI LIBMANAN CAMARINES SUR','img/profile/images.jpeg','09520141025','ustts5','248999'),(29,'Rochelle','Pabor','L.','Female','ROCHELLE','$2y$10$b7l0Gj8qqWHzkiWmRff0Qe4iYAR6MkQ21XnR7joAjTXIeXW89xXBi','rochelle94@gmail.com','1999-08-04 00:00:00','ur3','SIGAMOT LIBMANAN CAMARINES SUR','img/profile/FB_IMG_1580630197203.jpg','09521470252','ustts2','501243'),(30,'Aubre','Aco','L.','Female','AUBRE','$2y$10$979iigq4xt3UtxEvuBqLLOoxso4XLk8MR5TwtbEKPy.khclsphWKy','aubre024@gmail.com','1999-05-09 00:00:00','ur3','MABINI LIBMANAN CAMARINES SUR','img/profile/FB_IMG_1611188694684.jpg','09252016045','ustts5','986276'),(31,'Jamilla','Ofinda','K.','Female','JAMILLA','$2y$10$1E0PS//9lczzfBntzCkTbedxYL2xQX.kn5jTVS9hMaJp4/NHg3Bqi','jamilla2231@gamil.com','1998-02-05 00:00:00','ur3','SIGAMOT LIBMANAN CAMARINES SUR','img/profile/IMG_20210903_225325.jpg','09630178501','ustts2','114033'),(32,'Aira Mae','Cortez','L.','Female','AIRAMAE','$2y$10$GicQXkAC4CrIBd3ULv/ZAuACvaeeVob8m1jA2CXmQ3fWUpYlOrvIm','airamae033@gmail.com','1999-08-06 00:00:00','ur2','MABINI LIBMANAN CAMARINES SUR','img/profile/2.jpg','09854102471','ustts5','548256'),(33,'Ivy','Cortes','O.','Female','IVY','$2y$10$DWvR7kKzApeYrQYd.0.xI.l689GcWKvkOfyXIuKiyUcYZXMCyNEuG','ivymae090@gmail.com','1999-07-25 00:00:00','ur2','SAN ISIDRO LIBMANAN CAMARINES SUR','img/profile/3.jpg','09620145012','ustts5','735218'),(34,'RICA','Gabiasa','K.','Female','RICA','$2y$10$GAas5vEHSToHQMgEtmpfPuoNdI2if.u34MGKQL0AcE0mcdis85fNa','rIca033@gmail.com','1998-12-09 00:00:00','ur2','MABINI LIBMANAN CAMARINES SUR','img/profile/6.jpg','09652014750','ustts5','970846'),(35,'Maribel','Alvaro','L.','Female','MARIBEL','$2y$10$/Kyv169wSN7HBsNTHpvbp.CZlUk19qpTqGWepbknFAI/xkHKdJDpm','maribel93@gmail.com','1998-01-15 00:00:00','ur2','MABINI LIBMANAN CAMARINES SUR','img/profile/8.jpg','09620147025','ustts5','475172'),(36,'RICOJAY','Gonzales','P.','Male','RICOJAY','$2y$10$JUc2mM6frvv/jWeK/vkQ5uesWi1MLEVKJpHHhkp.226o/XgdOJicK','ricojay000@gamil.com','2000-05-05 00:00:00','ur2','MABINI LIBMANAN CAMARINES SUR','img/profile/images.jpeg','09560147021','ustts5','216100'),(37,'Miko','Mendez','S.','Male','MIKO','$2y$10$OtQH/6bguR.ByjMiSOtsv.ovsePGMeZriobSal2S.MNppIQyAvphe','miko989@gmail.com','1998-04-12 00:00:00','ur2','MABINI LIBMANAN CAMARINES SUR','img/profile/download.jpeg','09320154732','ustts5','248698'),(38,'Kimberly','Bernal','K.','Female','KIMBERLY','$2y$10$u2VWNQQ1uhFXC4RjNUkZ4eaVvDYkiYLLtdEAJySgdCdGIIs8eBTZO','kim644@gmail.com','2000-02-03 00:00:00','ur2','MABINI LIBMANAN CAMARINES SUR','img/profile/8.jpg','09520140753','ustts5','660091'),(39,'Roy','Noellana','P.','Male','ROY','$2y$10$25BvyDxglH9wFsuT0e18B.7pVQQjZ6f99.hnGyGzfKf8CCJ2b3hmK','royskie@gmail.com','1998-08-04 00:00:00','ur2','MABINI LIBMANAN CAMARINES SUR','img/profile/download.jpeg','09520471035','ustts5','891416'),(40,'Miguel','Merabreno','I.','Male','MIGUEL','$2y$10$CdSmELSHSnGejpXQdctUre6FiMhTZe4fcQ6bA7BbGqhdTCTvakwAy','miguelken2@gmail.com','1997-01-09 00:00:00','ur2','MABINI LIBMANAN CAMARINES SUR','img/profile/481e5ea281c9296a14f205adbc8ca0aba06f9a65r1-480-599v2_hq.jpg','09620540741','ustts5','838411'),(41,'Justin','Merabreno','G.','Male','JUSTIN','$2y$10$EaLTCkhF69yfzdSLNFJgaucaPQ.P8tnxOo83ibz3d0xLDwahUAP6m','justin231@gmail.com','1997-02-08 00:00:00','ur2','MABINI LIBMANAN CAMARINES SUR','img/profile/images.jpeg','09630514078','ustts5','397989'),(42,'Bernadette','Solayao','H.','Female','BERNA','$2y$10$gphv5BhX2Q/S2YsDU3ewj.L1ZCJpJxArbthJTxralMzTYx/5opeZC','berna221@gmail.com','1999-04-08 00:00:00','ur2','SIGAMOT LIBMANAN CAMARINES SUR','img/profile/19.jpg','09652031047','ustts5','657941'),(43,'Carlo','Modinao',' U.','Male','CARLO','$2y$10$LWJeVBdwLwf2ByQqNGAAsugjTOHgq7L19OWUx6cvmilogiYl/jEue','carlo022@gmail.com','1991-02-05 00:00:00','ur4','NAGA CITY CAMARINES SUR','img/profile/download.jpeg','09630140571','ustts2','287640');
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wig`
--

LOCK TABLES `wig` WRITE;
/*!40000 ALTER TABLE `wig` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wig_picture`
--

LOCK TABLES `wig_picture` WRITE;
/*!40000 ALTER TABLE `wig_picture` DISABLE KEYS */;
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

-- Dump completed on 2022-11-23  7:58:41
