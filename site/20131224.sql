-- MySQL dump 10.13  Distrib 5.5.34, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: geblek
-- ------------------------------------------------------
-- Server version	5.5.34-0ubuntu0.12.04.1

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
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `tag` varchar(225) NOT NULL,
  `summary` varchar(500) NOT NULL,
  `blog_content` text NOT NULL,
  `status` enum('active','archive') NOT NULL DEFAULT 'active',
  `view_count` int(10) unsigned NOT NULL,
  `date_create` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog`
--

LOCK TABLES `blog` WRITE;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` VALUES (1,'The first blog post','blog, post, comma','CodeIgniter lets you creatively focus on your project by minimizing the amount of code needed for a given task. CodeIgniter is an Application Development Framework - a toolkit - for people who build web sites using PHP.','<p><img style=\"margin-right: 10px;\" src=\"http://localhost/job4career/admin/site/assets/images/blog/ci_logo_flame.jpg\" alt=\"\" width=\"150\" height=\"164\" align=\"left\" />CodeIgniter is an Application Development Framework - a toolkit - for people who build web sites using PHP. Its goal is to enable you to develop projects much faster than you could if you were writing code from scratch, by providing a rich set of libraries for commonly needed tasks, as well as a simple interface and logical structure to access these libraries. CodeIgniter lets you creatively focus on your project by minimizing the amount of code needed for a given task.</p>\r\n<p>Its goal is to enable you to develop projects much faster than you could if you were writing code from scratch, by providing a rich set of libraries for commonly needed tasks, as well as a simple interface and logical structure to access these libraries. CodeIgniter lets you creatively focus on your project by minimizing the amount of code needed for a given task.</p>\r\n<p>CodeIgniter lets you creatively focus on your project by minimizing the amount of code needed for a given task. CodeIgniter is an Application Development Framework - a toolkit - for people who build web sites using PHP.</p>','active',12,'2013-10-31 22:45:18','2013-11-29 03:30:37'),(2,'PHP Programmer','php, mysql, programmer','lorem ipsum dolor sit amet,,','<p>dsfg dsfg sdfgsdg dsfg sdfg sdgf sdfg sd sdg sd</p>\r\n<p>dfgkdhsfgk asdka\'skdfj</p>\r\n<p>SLDFLKSFKASDF;K ASDF;K ASDFKASGKNDFBMNK</p>','active',2,'2013-10-31 23:03:02','2013-11-09 08:17:52'),(3,'TODC-Bootstrap Getting started','bootstrap, google, gmail, css','Before downloading, be sure to have a code editor (we recommend Sublime Text 2) and some working knowledge of HTML and CSS. We won\'t walk through the source files here, but they are available for download. We\'ll focus on getting started with the compiled Bootstrap files.','<p>Before downloading, be sure to have a code editor (we recommend Sublime Text 2) and some working knowledge of HTML and CSS. We won\'t walk through the source files here, but they are available for download. We\'ll focus on getting started with the compiled Bootstrap files.</p>\r\n<p>Within the download you\'ll find the following file structure and contents, logically grouping common assets and providing both compiled and minified variations. This is the most basic form of Bootstrap: compiled files for quick drop-in usage in nearly any web project. We provide compiled CSS and JS (bootstrap.*), as well as compiled and minified CSS and JS (bootstrap.min.*). The image files are compressed using ImageOptim, a Mac app for compressing PNGs.&nbsp;Please note that all JavaScript plugins require jQuery to be included.</p>\r\n<p>Bootstrap comes equipped with HTML, CSS, and JS for all sorts of things, but they can be summarized with a handful of categories visible at the top of the Bootstrap documentation.</p>','active',77,'2013-11-05 08:34:22','2013-11-29 03:36:59');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `datecreate` datetime NOT NULL,
  `datemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `parent_id_name` (`parent_id`,`name`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,0,'Accounting','2013-09-03 00:00:00','2013-09-03 13:48:43'),(3,1,'Audit','2013-09-03 00:00:00','2013-09-03 13:48:43'),(4,1,'Banking','2013-09-03 00:00:00','2013-09-03 13:48:43'),(5,1,'Founding','2013-09-03 00:00:00','2013-09-03 13:48:43'),(6,1,'Investment','2013-09-03 00:00:00','2013-09-03 13:48:43'),(7,1,'Taxation','2013-09-03 00:00:00','2013-09-03 13:48:43'),(8,0,'Administration','2013-09-03 00:00:00','2013-09-03 13:48:43'),(10,8,'Personnel','2013-09-03 00:00:00','2013-09-03 13:48:43'),(11,8,'Secretary','2013-09-03 00:00:00','2013-09-03 13:48:43'),(12,8,'Staff','2013-09-03 00:00:00','2013-09-03 13:48:43'),(13,8,'Top Management','2013-09-03 00:00:00','2013-09-03 13:48:43'),(14,0,'Art, Media and Communication','2013-09-03 00:00:00','2013-09-03 13:48:43'),(16,14,'Advertisement','2013-09-03 00:00:00','2013-09-03 13:48:43'),(17,14,'Art/ Creative Design','2013-09-03 00:00:00','2013-09-03 13:48:43'),(18,14,'Entertainment','2013-09-03 00:00:00','2013-09-03 13:48:43'),(19,14,'Public Relation','2013-09-03 00:00:00','2013-09-03 13:48:43'),(20,0,'Building and Construction','2013-09-03 00:00:00','2013-09-03 13:48:43'),(22,20,'Architect/ Interior Design','2013-09-03 00:00:00','2013-09-03 13:48:43'),(23,20,'Civil/ Building Construction','2013-09-03 00:00:00','2013-09-03 13:48:43'),(24,20,'Property/ Real Estate','2013-09-03 00:00:00','2013-09-03 13:48:43'),(25,20,'Quantity Survey','2013-09-03 00:00:00','2013-09-03 13:48:43'),(26,0,'Computer/ IT','2013-09-03 00:00:00','2013-09-03 13:48:43'),(28,26,'Database Administrator','2013-09-03 00:00:00','2013-09-03 13:48:44'),(29,26,'Hardware Technician','2013-09-03 00:00:00','2013-09-03 13:48:44'),(30,26,'Network Administrator','2013-09-03 00:00:00','2013-09-03 13:48:44'),(31,26,'Software Engineer','2013-09-03 00:00:00','2013-09-03 13:48:44'),(32,26,'System Administrator','2013-09-03 00:00:00','2013-09-03 13:48:44'),(33,26,'Programmer','2013-09-03 00:00:00','2013-09-03 13:48:44'),(34,26,'Web-Masterweb','2013-09-03 00:00:00','2013-09-03 13:48:44'),(35,26,'Web-SEO','2013-09-03 00:00:00','2013-09-03 13:48:44'),(36,0,'Education/ Course','2013-09-03 00:00:00','2013-09-03 13:48:44'),(38,36,'Education','2013-09-03 00:00:00','2013-09-03 13:48:44'),(39,36,'Research &amp; Development','2013-09-03 00:00:00','2013-09-03 13:48:44'),(40,0,'Engineer','2013-09-03 00:00:00','2013-09-03 13:48:44'),(42,40,'Chemical Engineering','2013-09-03 00:00:00','2013-09-03 13:48:44'),(43,40,'Electrical Engineering','2013-09-03 00:00:00','2013-09-03 13:48:44'),(44,40,'Electronic Engineering','2013-09-03 00:00:00','2013-09-03 13:48:44'),(45,40,'Environmental Engineering','2013-09-03 00:00:00','2013-09-03 13:48:44'),(46,40,'Mechanic/ Automotive','2013-09-03 00:00:00','2013-09-03 13:48:44'),(47,40,'Petroleum Engineering','2013-09-03 00:00:00','2013-09-03 13:48:44'),(48,40,'Others','2013-09-03 00:00:00','2013-09-03 13:48:44'),(49,0,'Health','2013-09-03 00:00:00','2013-09-03 13:48:44'),(51,49,'Doctor/ Diagnosis','2013-09-03 00:00:00','2013-09-03 13:48:44'),(52,49,'Pharmacy','2013-09-03 00:00:00','2013-09-03 13:48:44'),(53,49,'Practiser/ Medical Assistant','2013-09-03 00:00:00','2013-09-03 13:48:44'),(54,0,'Hotel and Restaurant','2013-09-03 00:00:00','2013-09-03 13:48:44'),(56,54,'Hotel/ Tourism','2013-09-03 00:00:00','2013-09-03 13:48:44'),(57,54,'Restaurant Services','2013-09-03 00:00:00','2013-09-03 13:48:44'),(58,0,'Manufacture','2013-09-03 00:00:00','2013-09-03 13:48:44'),(60,58,'Maintenance','2013-09-03 00:00:00','2013-09-03 13:48:44'),(61,58,'Manufacture','2013-09-03 00:00:00','2013-09-03 13:48:44'),(62,58,'Material Management','2013-09-03 00:00:00','2013-09-03 13:48:44'),(63,58,'Proses Control','2013-09-03 00:00:00','2013-09-03 13:48:44'),(64,58,'QA','2013-09-03 00:00:00','2013-09-03 13:48:44'),(65,0,'Marketing','2013-09-03 00:00:00','2013-09-03 13:48:44'),(67,65,'Corporate','2013-09-03 00:00:00','2013-09-03 13:48:44'),(68,65,'Design Proses and Control','2013-09-03 00:00:00','2013-09-03 13:48:44'),(69,65,'Marketing','2013-09-03 00:00:00','2013-09-03 13:48:44'),(70,65,'Merchandising','2013-09-03 00:00:00','2013-09-03 13:48:44'),(71,65,'Telemarketing','2013-09-03 00:00:00','2013-09-03 13:48:44'),(72,0,'Knowledge','2013-09-03 00:00:00','2013-09-03 13:48:44'),(74,72,'Agriculture','2013-09-03 00:00:00','2013-09-03 13:48:44'),(75,72,'Biotechnology','2013-09-03 00:00:00','2013-09-03 13:48:44'),(76,72,'Chemical','2013-09-03 00:00:00','2013-09-03 13:48:44'),(77,72,'Flight','2013-09-03 00:00:00','2013-09-03 13:48:44'),(78,72,'Geology','2013-09-03 00:00:00','2013-09-03 13:48:44'),(79,72,'Geophysical','2013-09-03 00:00:00','2013-09-03 13:48:44'),(80,72,'Knowledge &amp; Technology','2013-09-03 00:00:00','2013-09-03 13:48:45'),(81,72,'Nutritionist','2013-09-03 00:00:00','2013-09-03 13:48:45'),(82,72,'Statistic','2013-09-03 00:00:00','2013-09-03 13:48:45'),(83,0,'Services','2013-09-03 00:00:00','2013-09-03 13:48:45'),(85,83,'General Services','2013-09-03 00:00:00','2013-09-03 13:48:45'),(86,83,'Health/ Beauty Care','2013-09-03 00:00:00','2013-09-03 13:48:45'),(87,83,'Logistic/ Network Distribution','2013-09-03 00:00:00','2013-09-03 13:48:45'),(88,83,'Law/ Legal','2013-09-03 00:00:00','2013-09-03 13:48:45'),(89,83,'Security/ Army','2013-09-03 00:00:00','2013-09-03 13:48:45'),(90,0,'Others','2013-09-03 00:00:00','2013-09-03 13:48:45'),(91,90,'Press/ Editor','2013-09-03 00:00:00','2013-09-03 13:48:45'),(92,90,'Publisher','2013-09-03 00:00:00','2013-09-03 13:48:45');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `company_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `industry` varchar(50) NOT NULL,
  `registrant_name` varchar(50) NOT NULL,
  `registrant_email` varchar(50) NOT NULL,
  `registrant_password` varchar(50) NOT NULL,
  `reg_code` varchar(255) NOT NULL,
  `status` enum('pending','active','block','other') NOT NULL,
  `date_create` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`company_id`),
  UNIQUE KEY `register_email_UNIQUE` (`registrant_email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'PT. Indoexim International','Furniture manufacturer and exporter','Jakarta','Jl. RS Fatmawati, Jakarta Selatan','Indonesia','021-7507501','','Basuki Kurniawan','basuki@yahoo.com','basuki','44e9302c03373cd12c48d4055d6ea2d8','active','2013-10-15 17:16:07','2013-10-15 13:11:39');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `experience`
--

DROP TABLE IF EXISTS `experience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `experience` (
  `experience_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `seeker_id` int(10) unsigned NOT NULL,
  `company_name` varchar(45) NOT NULL,
  `position` varchar(45) NOT NULL,
  `specialization` varchar(45) NOT NULL,
  `role` varchar(45) NOT NULL,
  `industry` varchar(45) NOT NULL,
  `month_salary` float unsigned NOT NULL,
  `work_desc` text NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `position_level` varchar(45) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`experience_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experience`
--

LOCK TABLES `experience` WRITE;
/*!40000 ALTER TABLE `experience` DISABLE KEYS */;
/*!40000 ALTER TABLE `experience` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interview_call`
--

DROP TABLE IF EXISTS `interview_call`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interview_call` (
  `interview_call_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `job_id` int(10) unsigned NOT NULL,
  `seeker_id` int(10) unsigned NOT NULL,
  `date_interview` datetime NOT NULL,
  `location` varchar(45) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`interview_call_id`),
  UNIQUE KEY `job_id_seeker_id` (`job_id`,`seeker_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interview_call`
--

LOCK TABLES `interview_call` WRITE;
/*!40000 ALTER TABLE `interview_call` DISABLE KEYS */;
/*!40000 ALTER TABLE `interview_call` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job` (
  `job_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `requirement` text NOT NULL,
  `experience` varchar(50) NOT NULL,
  `month_salary` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `job_type` enum('full_time','part_time','contract') NOT NULL DEFAULT 'full_time',
  `contract_duration` varchar(50) NOT NULL COMMENT 'when job_type is contract',
  `noj` varchar(3) NOT NULL COMMENT 'number of jobs',
  `date_close` date NOT NULL,
  `status` enum('publish','reject') NOT NULL DEFAULT 'publish',
  `date_create` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`job_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job`
--

LOCK TABLES `job` WRITE;
/*!40000 ALTER TABLE `job` DISABLE KEYS */;
INSERT INTO `job` VALUES (1,1,'PHP/ Web Programmer','Building web application','[\"PHP\",\"JavaScript\",\"CSS\",\"HTML\",\"MySQL\",\"CodeIgniter\"]','[\"3\",\"year\"]','6000000-10000000','Subang','Pawang Web','contract','1 tahun','4','2013-11-06','publish','2013-10-26 21:17:45','2013-11-09 09:06:00'),(2,1,'IT Staff','pemeliharaan komputer','[\"koputer hardware\",\"ms word, excel\"]','[\"1\",\"year\"]','3000000','Jakarta Raya','Web-Masterweb','full_time','0','1','2013-11-10','publish','2013-10-27 21:43:55','2013-11-09 09:05:41'),(3,1,'Java Programmer','Building java web applicattion','[\"java\",\"javascript\"]','[\"2\",\"year\"]','6000000-10000000','Jakarta Raya','Programmer','full_time','0','1','2013-11-07','publish','2013-10-29 22:13:31','2013-11-09 09:06:08');
/*!40000 ALTER TABLE `job` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_apply`
--

DROP TABLE IF EXISTS `job_apply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_apply` (
  `job_apply_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `seeker_id` int(10) unsigned NOT NULL,
  `job_id` int(10) unsigned NOT NULL,
  `date_create` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`job_apply_id`),
  UNIQUE KEY `seeker_id_job_id` (`seeker_id`,`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_apply`
--

LOCK TABLES `job_apply` WRITE;
/*!40000 ALTER TABLE `job_apply` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_apply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `language` (
  `language_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `seeker_id` int(10) unsigned NOT NULL,
  `language` varchar(45) NOT NULL,
  `spoken` smallint(5) unsigned NOT NULL DEFAULT '0',
  `written` smallint(5) unsigned NOT NULL DEFAULT '0',
  `date_create` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`language_id`),
  UNIQUE KEY `seeker_id_language` (`seeker_id`,`language`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language`
--

LOCK TABLES `language` WRITE;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` VALUES (3,5,'Bahasa Jawa',0,0,'2013-12-11 11:17:09','2013-12-11 04:17:09'),(4,5,'English',70,70,'2013-12-11 11:17:09','2013-12-11 04:17:09');
/*!40000 ALTER TABLE `language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `datecreate` datetime NOT NULL,
  `datemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `country_city` (`country`,`city`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES (1,'Indonesia','Aceh','2013-09-03 00:00:00','2013-09-03 14:12:49'),(2,'Indonesia','Bali','2013-09-03 00:00:00','2013-09-03 14:12:49'),(3,'Indonesia','Bangka Belitung','2013-09-03 00:00:00','2013-09-03 14:12:49'),(4,'Indonesia','Banten','2013-09-03 00:00:00','2013-09-03 14:12:49'),(5,'Indonesia','Bengkulu','2013-09-03 00:00:00','2013-09-03 14:12:49'),(6,'Indonesia','Gorontalo','2013-09-03 00:00:00','2013-09-03 14:12:49'),(7,'Indonesia','Jakarta Raya','2013-09-03 00:00:00','2013-09-03 14:12:49'),(8,'Indonesia','Jambi','2013-09-03 00:00:00','2013-09-03 14:12:49'),(9,'Indonesia','Jawa Barat','2013-09-03 00:00:00','2013-09-03 14:12:49'),(10,'Indonesia','Jawa Tengah','2013-09-03 00:00:00','2013-09-03 14:12:49'),(11,'Indonesia','Jawa Timur','2013-09-03 00:00:00','2013-09-03 14:12:49'),(12,'Indonesia','Kalimantan Barat','2013-09-03 00:00:00','2013-09-03 14:12:49'),(13,'Indonesia','Kalimantan Selatan','2013-09-03 00:00:00','2013-09-03 14:12:49'),(14,'Indonesia','Kalimantan Tengah','2013-09-03 00:00:00','2013-09-03 14:12:49'),(15,'Indonesia','Kalimantan Timur','2013-09-03 00:00:00','2013-09-03 14:12:49'),(16,'Indonesia','Kepulauan Riau','2013-09-03 00:00:00','2013-09-03 14:12:49'),(17,'Indonesia','Lampung','2013-09-03 00:00:00','2013-09-03 14:12:49'),(18,'Indonesia','Maluku','2013-09-03 00:00:00','2013-09-03 14:12:49'),(19,'Indonesia','Maluku Utara','2013-09-03 00:00:00','2013-09-03 14:12:49'),(20,'Indonesia','Nusa Tenggara Barat','2013-09-03 00:00:00','2013-09-03 14:12:49'),(21,'Indonesia','Nusa Tenggara Timur','2013-09-03 00:00:00','2013-09-03 14:12:49'),(22,'Indonesia','Papua','2013-09-03 00:00:00','2013-09-03 14:12:49'),(23,'Indonesia','Papua Barat','2013-09-03 00:00:00','2013-09-03 14:12:49'),(24,'Indonesia','Riau','2013-09-03 00:00:00','2013-09-03 14:12:49'),(25,'Indonesia','Sulawesi Barat','2013-09-03 00:00:00','2013-09-03 14:12:49'),(26,'Indonesia','Sulawesi Selatan','2013-09-03 00:00:00','2013-09-03 14:12:49'),(27,'Indonesia','Sulawesi Tengah','2013-09-03 00:00:00','2013-09-03 14:12:49'),(28,'Indonesia','Sulawesi Tenggara','2013-09-03 00:00:00','2013-09-03 14:12:49'),(29,'Indonesia','Sulawesi Utara','2013-09-03 00:00:00','2013-09-03 14:12:49'),(30,'Indonesia','Sumatera Barat','2013-09-03 00:00:00','2013-09-03 14:12:49'),(31,'Indonesia','Sumatera Selatan','2013-09-03 00:00:00','2013-09-03 14:12:49'),(32,'Indonesia','Sumatera Utara','2013-09-03 00:00:00','2013-09-03 14:12:49'),(33,'Indonesia','Yogyakarta','2013-09-03 00:00:00','2013-09-03 14:12:49'),(34,'Australia','Sydney','2013-09-04 19:26:08','2013-09-04 12:26:08'),(35,'Australia','Melbourne','2013-09-04 19:26:08','2013-09-04 12:26:08'),(36,'Australia','Brisbane','2013-09-04 19:26:08','2013-09-04 12:26:08'),(37,'Australia','Gold Coast','2013-09-04 19:26:08','2013-09-04 12:26:08'),(38,'Australia','Perth','2013-09-04 19:26:08','2013-09-04 12:26:08'),(39,'Australia','Adelaide','2013-09-04 19:26:08','2013-09-04 12:26:08'),(40,'Australia','Hobart','2013-09-04 19:26:08','2013-09-04 12:26:08'),(41,'Australia','Darwin','2013-09-04 19:26:08','2013-09-04 12:26:08'),(42,'Australia','Canberra','2013-09-04 19:26:08','2013-09-04 12:26:08');
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mailer`
--

DROP TABLE IF EXISTS `mailer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mailer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `send_to` varchar(100) NOT NULL,
  `message_tpl` varchar(50) NOT NULL,
  `param` varchar(500) NOT NULL,
  `status` enum('pending','sent','failure') NOT NULL,
  `date_create` datetime NOT NULL,
  `date_send` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mailer`
--

LOCK TABLES `mailer` WRITE;
/*!40000 ALTER TABLE `mailer` DISABLE KEYS */;
INSERT INTO `mailer` VALUES (1,'basuki@yahoo.com','company_registered','{\"name\":\"Basuki Kurniawan\",\"company\":\"PT. Indoexim International\",\"reg_code\":\"44e9302c03373cd12c48d4055d6ea2d8\"}','pending','2013-10-15 17:16:07','0000-00-00 00:00:00','2013-10-15 10:16:07'),(2,'nurhadijogja@gmail.com','registered','{\"first_name\":\"Nurhadi\",\"last_name\":\"Jogja\",\"reg_code\":\"95ec51b6d887d18428e9e5de24c20238\"}','pending','2013-11-28 11:25:41','0000-00-00 00:00:00','2013-11-28 04:25:41'),(3,'nurhadijogja@yahoo.com','registered','{\"first_name\":\"Nurhadi\",\"last_name\":\"Jogja\",\"reg_code\":\"2f8c4b0e97f4726ce8ba90d5135e64d9\"}','pending','2013-11-28 12:58:43','0000-00-00 00:00:00','2013-11-28 05:58:43'),(4,'nurhadijogja@gmail.com','registered','{\"first_name\":\"Nurhadi\",\"last_name\":\"Jogja\",\"reg_code\":\"e1f9d07563a8785cdb88d169f2b10265\"}','pending','2013-12-04 16:54:03','0000-00-00 00:00:00','2013-12-04 09:54:03');
/*!40000 ALTER TABLE `mailer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `datecreate` datetime NOT NULL,
  `datemodivied` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `position`
--

LOCK TABLES `position` WRITE;
/*!40000 ALTER TABLE `position` DISABLE KEYS */;
INSERT INTO `position` VALUES (2,'CEO/ GM/ Director/ Senior Manager','2013-09-04 19:33:24','2013-09-04 12:35:53'),(3,'Manager/ Assistant Manager','2013-09-04 19:33:39','2013-09-04 12:35:57'),(4,'Supervisor/ Coordinator','2013-09-04 19:33:55','2013-09-04 12:36:01'),(5,'Non-management &amp; Non-Supervisor','2013-09-04 19:35:33','2013-09-04 12:36:05'),(6,'Fresh Graduated/ 1 Year Experience','2013-09-04 19:35:43','2013-09-04 12:36:09');
/*!40000 ALTER TABLE `position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preference`
--

DROP TABLE IF EXISTS `preference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preference` (
  `preference_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `seeker_id` int(10) unsigned NOT NULL,
  `work_location` varchar(45) NOT NULL,
  `work_type` varchar(45) NOT NULL,
  `expected_salary` float unsigned NOT NULL,
  `date_create` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`preference_id`),
  UNIQUE KEY `seeker_id_work_location_work_type` (`seeker_id`,`work_location`,`work_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preference`
--

LOCK TABLES `preference` WRITE;
/*!40000 ALTER TABLE `preference` DISABLE KEYS */;
/*!40000 ALTER TABLE `preference` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qualification`
--

DROP TABLE IF EXISTS `qualification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qualification` (
  `qualification_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `seeker_id` int(10) unsigned NOT NULL,
  `qualification` varchar(45) NOT NULL,
  `gpa` float unsigned NOT NULL,
  `department` varchar(50) NOT NULL,
  `major` varchar(50) NOT NULL,
  `univ_name` varchar(255) NOT NULL,
  `date_graduated` date NOT NULL,
  `date_create` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`qualification_id`),
  UNIQUE KEY `seeker_id_qualification` (`seeker_id`,`qualification`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qualification`
--

LOCK TABLES `qualification` WRITE;
/*!40000 ALTER TABLE `qualification` DISABLE KEYS */;
/*!40000 ALTER TABLE `qualification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reference`
--

DROP TABLE IF EXISTS `reference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reference` (
  `reference_id` int(10) unsigned NOT NULL,
  `seeker_id` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `company` varchar(45) NOT NULL,
  `position` varchar(45) NOT NULL,
  `relationship` varchar(45) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`reference_id`),
  UNIQUE KEY `seeker_id_name` (`seeker_id`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reference`
--

LOCK TABLES `reference` WRITE;
/*!40000 ALTER TABLE `reference` DISABLE KEYS */;
/*!40000 ALTER TABLE `reference` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seeker`
--

DROP TABLE IF EXISTS `seeker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seeker` (
  `seeker_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `pics` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address_idcard` text NOT NULL,
  `dob` date NOT NULL,
  `pob` varchar(45) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `religion` varchar(45) NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `nationality` varchar(45) NOT NULL,
  `searchable` enum('1','2','3') NOT NULL,
  `status` enum('pending','active','blocked','other') NOT NULL,
  `reg_code` varchar(255) NOT NULL,
  `reg_platform` varchar(20) NOT NULL DEFAULT 'manual',
  `reg_platform_id` varchar(20) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`seeker_id`),
  UNIQUE KEY `UNIQ` (`email`,`reg_platform`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seeker`
--

LOCK TABLES `seeker` WRITE;
/*!40000 ALTER TABLE `seeker` DISABLE KEYS */;
INSERT INTO `seeker` VALUES (1,'Nurhadi','Jogja','nurhadijogja@gmail.com','','http://m.c.lnkd.licdn.com/mpr/mprx/0_z4FpDFTXxUjyf9zwUxh7DktFxYEKf9zwBs1_Dk-Z8UY8rtGIMOcr_XQnlro7uAqbqRLGGi8TAI93','Greater Jakarta Area, Indonesia','','','','0000-00-00','','M','',0,0,'','1','pending','95ec51b6d887d18428e9e5de24c20238','linkedin','2Fwvp0Znyn','2013-11-28 11:25:41','2013-11-28 04:25:41'),(5,'Nurhadi','Hadinegara','nurhadijogja@yahoo.com','','','Jakarta, Indonesia','-','087839100087','','1985-10-27','Bantul','M','Islam',170,67,'Indonesia','1','pending','2f8c4b0e97f4726ce8ba90d5135e64d9','facebook','1399911375','2013-11-28 12:58:43','2013-12-10 04:33:26'),(6,'Nurhadi','Jogja','nurhadijogja@gmail.com','','https://lh5.googleusercontent.com/-9FBF7cMOnnM/AAAAAAAAAAI/AAAAAAAAAMU/C2fJEZSuz3I/photo.jpg?sz=50','Jakarta','','','','0000-00-00','','M','',0,0,'','1','pending','e1f9d07563a8785cdb88d169f2b10265','googleplus','10876125712881941263','2013-12-04 16:54:03','2013-12-04 09:54:03');
/*!40000 ALTER TABLE `seeker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('3cbd0efc6f6b9d11ac107dd384afae77','127.0.0.1','Mozilla/5.0 (Linux; Android 4.1.2; Nexus 7 Build/JZ054K) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.166 Saf',1386731303,'a:2:{s:9:\"user_data\";s:0:\"\";s:11:\"private_key\";i:581;}'),('96855bae262334a38c5b8e942072e724','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36',1386737510,'a:7:{s:9:\"user_data\";s:0:\"\";s:8:\"login_id\";s:10:\"1399911375\";s:9:\"seeker_id\";s:1:\"5\";s:10:\"first_name\";s:7:\"Nurhadi\";s:9:\"last_name\";s:10:\"Hadinegara\";s:5:\"email\";s:22:\"nurhadijogja@yahoo.com\";s:12:\"reg_platform\";s:8:\"facebook\";}'),('e3238c21ab32d574dc2c89a0b8e25ce0','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36',1386731176,'a:7:{s:9:\"user_data\";s:0:\"\";s:8:\"login_id\";s:10:\"1399911375\";s:9:\"seeker_id\";s:1:\"5\";s:10:\"first_name\";s:7:\"Nurhadi\";s:9:\"last_name\";s:10:\"Hadinegara\";s:5:\"email\";s:22:\"nurhadijogja@yahoo.com\";s:12:\"reg_platform\";s:8:\"facebook\";}');
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skill`
--

DROP TABLE IF EXISTS `skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skill` (
  `skill_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `seeker_id` int(10) unsigned NOT NULL,
  `skill` varchar(50) NOT NULL,
  `proficiency` enum('beginer','intermediete','advanced') NOT NULL,
  `date_create` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`skill_id`),
  UNIQUE KEY `seeker_id_skill` (`seeker_id`,`skill`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skill`
--

LOCK TABLES `skill` WRITE;
/*!40000 ALTER TABLE `skill` DISABLE KEYS */;
INSERT INTO `skill` VALUES (1,5,'PHP','advanced','2013-12-11 10:51:45','2013-12-11 03:51:45');
/*!40000 ALTER TABLE `skill` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-12-24 15:36:44
