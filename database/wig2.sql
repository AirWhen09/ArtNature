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
  `date_created` varchar(45) NOT NULL DEFAULT 'CURRENT_TIMESTAMP',
  PRIMARY KEY (`msg_id`),
  KEY `msg_from_idx` (`msg_from`,`msg_to`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reference_code`
--

LOCK TABLES `reference_code` WRITE;
/*!40000 ALTER TABLE `reference_code` DISABLE KEYS */;
INSERT INTO `reference_code` VALUES ('mdl1','Model 1','1','Wig Model','mdl'),('mdl2','Model 2','2','Wig Model','mdl'),('mdl3','Model 3','3','Wig Model','mdl'),('mdl4','Model 4','4','Wig Model','mdl'),('mdl5','Model 5','5','Wig Model ','mdl'),('sz1','1','1','Wig Size','sz'),('sz2','2','2','Wig Size','sz'),('sz3','3','3','Wig Size','sz'),('sz4','4','4','Wig Size ','sz'),('tstts1','New','1','Task Status','tstts'),('tstts2','Production','2','Task Status','tstts'),('tstts3','Done','3','Task Status','tstts'),('tstts4','Archived','4','Task Status','tstts'),('typ1','Type 1','1','Wig Type','typ'),('typ2','Type 2','2','Wig Type','typ'),('typ3','Type 3','3','Wig Type ','typ'),('typ4','Type 4','4','Wig Type','typ'),('ur1','Admin','1','User Role','ur'),('ur2','Employee: On-Site','2','User Role','ur'),('ur3','Employee: Work-From-Home','3','User Role','ur'),('ur4','Driver','4','User Role','ur'),('ustts1','Pending','1','User Status','ustts'),('ustts2','Approved','2','User Status','ustts'),('ustts3','Rejected','3','User Status','ustts');
/*!40000 ALTER TABLE `reference_code` ENABLE KEYS */;
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
  `wig_id` int NOT NULL,
  `status` varchar(45) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` varchar(255) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  PRIMARY KEY (`order_no`),
  UNIQUE KEY `order_no_UNIQUE` (`order_no`),
  KEY `wig_id_idx` (`wig_id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES ('#123qwerty','45',1,1,'tstts1','2022-02-02 00:00:00','2022-08-11 12:59:44','sample Data','2022-02-02 00:00:00','2022-02-02 00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Laura','smith','S','Female','laura','$2y$10$XbZKIKmb3wM5gv4E5AvXz.ICT3S1VRiSIb.GrUKcbdmvGphW8DVg6','laurasmith@fakegmail.com','2022-08-02 00:00:00','ur2','cam sur',NULL,'12345678987','ustts2'),(2,'ADMIN','ADMIN','ADMIN','Male','ADMIN','$2y$10$.AFLJha7UnzVvNuouWO/9O0LXt2Ct5HP9Dz4yfDdaqolCZZAnwmYG','admin@gmail.com','2022-08-08 00:00:00','ur1','SIPOCOT, CAMARINES SUR','img/profile/avatar.png','09758781348','ustts2'),(3,'Laura','smith','S','Female','JUNEL','$2y$10$8NfOBs27WAd.jYfSHdrxnemAwInKoSzWN7iZAj7S5eGz11UCQt3UW','teshunter1@fakegmail.com','2022-08-08 00:00:00','ur4','cam sur','img/profile/290838313_1069371227003040_4574736092704517186_n.jpg','12345678987','ustts2'),(4,'John','Depp','D','Male','John','$2y$10$HH5KQ4JytPJTNl.dGmNB8e0btuU5cpKK2zNzN.pnnDhnVPMQJiYEW','bhouse@gmail.com','2022-08-03 00:00:00','ur3','cam sur','img/profile/280609742_1737019729975745_1441563036804772206_n.jpg','12345678987','ustts2');
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

-- Dump completed on 2022-08-12  8:11:34
