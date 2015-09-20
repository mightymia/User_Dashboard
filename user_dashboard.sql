-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: user_dashboard
-- ------------------------------------------------------
-- Server version	5.5.41-log

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `fk_comments_users_idx` (`user_id`),
  KEY `fk_comments_messages1_idx` (`message_id`),
  CONSTRAINT `fk_comments_messages1` FOREIGN KEY (`message_id`) REFERENCES `messages` (`message_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (10,'Is this working???','2015-09-20 11:30:02','2015-09-20 11:30:02',13,20,14),(11,'hi','2015-09-20 11:31:53','2015-09-20 11:31:53',13,20,13),(12,'I\'m good','2015-09-20 11:53:48','2015-09-20 11:53:48',14,19,14),(13,'Hi Squeaky!!!','2015-09-20 11:58:40','2015-09-20 11:58:40',14,18,14),(14,'I\'m good!','2015-09-20 12:31:30','2015-09-20 12:31:30',14,19,14),(15,'Hey Ripley you should post on my wall!','2015-09-20 13:44:58','2015-09-20 13:44:58',14,21,8);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `fk_messages_users1_idx` (`user_id`),
  CONSTRAINT `fk_messages_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,'Hi Bonnie!!!','2015-09-19 21:26:40','2015-09-19 21:26:40',9,0),(2,'What\'s up Bonnie?!?!?','2015-09-19 21:31:09','2015-09-19 21:31:09',9,0),(3,'What\'s up Bonnie?!?!?','2015-09-19 21:33:40','2015-09-19 21:33:40',9,0),(4,'What\'s up Bonnie?!?!?','2015-09-19 21:45:15','2015-09-19 21:45:15',9,0),(5,'What\'s up Bonnie?!?!?','2015-09-19 21:46:42','2015-09-19 21:46:42',9,0),(6,'Hi Bonnie!!!!','2015-09-19 21:47:16','2015-09-19 21:47:16',9,0),(7,'What\'s up Bonnie?!?!?','2015-09-19 21:49:58','2015-09-19 21:49:58',9,0),(8,'How are you Bonnie?!','2015-09-19 21:52:23','2015-09-19 21:52:23',9,0),(9,'How are you Bonnie?!','2015-09-19 21:52:53','2015-09-19 21:52:53',9,0),(10,'How are you Bonnie?!','2015-09-19 21:53:05','2015-09-19 21:53:05',9,0),(11,'How are you Bonnie?!','2015-09-19 21:54:01','2015-09-19 21:54:01',9,0),(12,'How are you Bonnie?!','2015-09-19 21:54:04','2015-09-19 21:54:04',9,0),(13,'How are you Bonnie?!','2015-09-19 21:54:22','2015-09-19 21:54:22',9,0),(14,'Hi Bonnie!!!','2015-09-19 21:54:51','2015-09-19 21:54:51',9,0),(15,'Hi Bonnie!!!','2015-09-19 21:55:17','2015-09-19 21:55:17',9,0),(16,'Hi Bonnie!!!','2015-09-19 21:55:33','2015-09-19 21:55:33',9,0),(17,'You\'re popular Bonnie!','2015-09-20 08:56:00','2015-09-20 08:56:00',8,0),(18,'Hi Bonnie it\'s #8','2015-09-20 09:09:16','2015-09-20 09:09:16',14,8),(19,'How\'s it going Bonnie?!?!','2015-09-20 09:24:30','2015-09-20 09:24:30',14,14),(20,'Hi Squeak!','2015-09-20 11:20:09','2015-09-20 11:20:09',13,14),(21,'Hi Bonnie, it\'s Ripley!','2015-09-20 13:44:23','2015-09-20 13:44:23',14,9),(22,'Hi I\'m Ethan!!','2015-09-20 13:49:36','2015-09-20 13:49:36',10,10);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `userlevel` int(11) DEFAULT NULL,
  `description` mediumtext,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (8,'Mia','Clapham','mia@mia.com','abcd1234','2015-09-16 14:52:13','2015-09-19 18:03:24',0,'0'),(9,'Ripley','Clapham','ripley@mia.com','abcd1234','2015-09-16 16:30:19','2015-09-19 20:00:50',9,'0'),(10,'Ethan','Clapham','ethan@mia.com','1234abcd','2015-09-16 16:33:04','2015-09-20 13:59:44',9,'I\'m rad!'),(12,'Sprout','Clapham','sprout@mia.com','1234abcd','2015-09-17 18:13:51','2015-09-17 18:13:51',0,'0'),(13,'Squeak','Clapham','squeak@mia.com','1234abcd','2015-09-19 19:48:57','2015-09-19 20:49:29',0,'Barftastic!!!'),(14,'Bonnie','Gallatin','Bonnie@mia.com','1234abcd','2015-09-19 20:16:37','2015-09-19 20:49:48',9,'Boninator');
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

-- Dump completed on 2015-09-20 14:09:20
