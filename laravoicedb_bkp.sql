-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: localhost    Database: laravoicedb
-- ------------------------------------------------------
-- Server version	5.7.30-0ubuntu0.18.04.1

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
-- Table structure for table `Table_1_2`
--

DROP TABLE IF EXISTS `Table_1_2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Table_1_2` (
  `ID` int(11) NOT NULL,
  `Student_Name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Fuzzy_Name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Mark` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Table_1_2`
--

LOCK TABLES `Table_1_2` WRITE;
/*!40000 ALTER TABLE `Table_1_2` DISABLE KEYS */;
INSERT INTO `Table_1_2` VALUES (1,'Morgan, Berry','null',87),(2,'Sydney, Besoain','null',NULL),(3,'Geneva, Boudro','null',23),(4,'Luna, Buchin','null',67),(5,'Kaydence, Champlin','null',82),(6,'Jaden, Cramer','null',82),(7,'Anderson, Croy','null',23),(8,'Gavin, Custer','null',34),(9,'Tucker, Deala','null',NULL),(10,'Cindy, Emerick','null',NULL),(11,'Jackson, Farmer','null',NULL),(12,'Miranda, Greenhalgh','null',NULL),(13,'Jenna, Justice','null',NULL),(14,'Race, Krueger','null',NULL),(15,'Abigail, Lafazio','null',NULL),(16,'Shelby, Lang','null',NULL),(17,'Tristen, Mason','null',NULL),(18,'Gauge, Murray','null',NULL),(19,'Emily, Pelayo','null',NULL),(20,'Garrett, Pindell','null',NULL),(21,'Payton, Rodriguez','null',NULL),(22,'Kaia, Scroggins','null',NULL),(23,'Abigail, Smith','null',NULL),(24,'Amena, Smith','null',NULL),(25,'Jerrad, Solis','null',NULL),(26,'Gage, Stacher','null',NULL),(27,'Brandon, Thom','null',NULL),(28,'Ember, Thomson','null',NULL),(29,'Kamden, Warren','null',NULL),(30,'Lakota, Wyatt','null',NULL);
/*!40000 ALTER TABLE `Table_1_2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Table_2_3`
--

DROP TABLE IF EXISTS `Table_2_3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Table_2_3` (
  `ID` int(11) NOT NULL,
  `Student_Name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Fuzzy_Name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Mark` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Table_2_3`
--

LOCK TABLES `Table_2_3` WRITE;
/*!40000 ALTER TABLE `Table_2_3` DISABLE KEYS */;
INSERT INTO `Table_2_3` VALUES (1,'Abbott, Allan James','null',NULL),(2,'Baca, Jason Steven','null',NULL),(3,'Brown, Gloria A','null',NULL),(4,'Calucag, Thais J','null',NULL),(5,'Elhadary, Brian M','null',NULL),(6,'Flores, Desiree R','null',NULL),(7,'Godina, Jennifer','null',NULL),(8,'Gonzalez, Steve','null',NULL),(9,'Gotto, James Roy','null',NULL),(10,'Gruettner, Jesse','null',NULL),(11,'Guzman, Leticia M','null',NULL),(12,'Kalil, Stacey I','null',NULL),(13,'Leos, Christine Marie','null',NULL),(14,'Lewis, Ernest Alexander','null',NULL),(15,'Miranda, Ruben Angel','null',NULL),(16,'Negrete, Justin J','null',NULL),(17,'Parslow, Jonathan','null',NULL),(18,'Perez, Sarah Ivette','null',NULL),(19,'Shields, Cristine','null',NULL);
/*!40000 ALTER TABLE `Table_2_3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tables`
--

DROP TABLE IF EXISTS `Tables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tables` (
  `ID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Table_Owner` int(11) DEFAULT NULL,
  `Table_Name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tables`
--

LOCK TABLES `Tables` WRITE;
/*!40000 ALTER TABLE `Tables` DISABLE KEYS */;
INSERT INTO `Tables` VALUES ('2',1,'Roster names in order.csv','2020-07-13 15:05:36'),('3',2,'Developer Gradebook to match Acosta 1st period demo.csv','2020-07-17 06:26:36');
/*!40000 ALTER TABLE `Tables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` int(11) DEFAULT NULL,
  `data` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_06_26_102625_create_tables_table',1),(5,'2020_06_26_102829_create_ci_sessions_table',1),(6,'2020_07_01_101240_add_google_id_column',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT '0',
  `is_confirmed` int(11) NOT NULL DEFAULT '0',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Asa Robinson','work.asarobinson@gmail.com','2020-07-13 14:29:44','$2y$10$/pR2Q9WdM1QYsNCVfk.80e7K5ST5FkQM.lGTHeu9dlYdzoulOfTp6',0,0,0,NULL,'2020-07-13 14:24:10','2020-07-13 14:29:44','111897122852714845724'),(2,'Asa Robinson','arobinson@svusd.us','2020-07-13 15:31:07','$2y$10$a80iPAVLgPr6BvKlvRMZReLPtpkcAyjqWaRM7oTuBFw573IONP7mm',0,0,0,NULL,'2020-07-13 15:26:23','2020-07-13 15:31:07',NULL),(3,'Creative Team','ehsanulhaqkm@gmail.com',NULL,'$2y$10$gSZ/xYc1FPnO0gzeSyUDLuc5xSlks.uCls1.G8gByNEC5GIA2/xVa',0,0,0,NULL,'2020-07-14 18:30:16','2020-07-14 18:30:16','100568082653653185082'),(4,'Sandro Mtchedlidze','s.mchedlidze2004@gmail.com',NULL,'$2y$10$aHV.hc6Gtmro7lo9aJAd5OkFQ.bBh1b9rgPOYNC.2Rs/BaNd1rAVq',0,0,0,NULL,'2020-07-14 19:58:50','2020-07-14 19:58:50','115082760756667461264'),(5,'Cristian Urdea','cristianurdea94@gmail.com',NULL,'$2y$10$qpsDZO8YSiRSA2Xn1fDP6uRehzUffrvcW7qmTh9ID79xeT0LAwdHO',0,0,0,NULL,'2020-07-15 16:28:48','2020-07-15 16:28:48','100946329694081510432');
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

-- Dump completed on 2020-07-24  8:25:01
