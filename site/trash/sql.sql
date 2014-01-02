-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.27 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.0.0.4396
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for job4career2
CREATE DATABASE IF NOT EXISTS `job4career2` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `job4career2`;


-- Dumping structure for table job4career2.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `datecreate` datetime NOT NULL,
  `datemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `parent_id_name` (`parent_id`,`name`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;

-- Dumping data for table job4career2.category: ~79 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `parent_id`, `name`, `datecreate`, `datemodified`) VALUES
	(1, 0, 'Accounting', '2013-09-03 00:00:00', '2013-09-03 20:48:43'),
	(3, 1, 'Audit', '2013-09-03 00:00:00', '2013-09-03 20:48:43'),
	(4, 1, 'Banking', '2013-09-03 00:00:00', '2013-09-03 20:48:43'),
	(5, 1, 'Founding', '2013-09-03 00:00:00', '2013-09-03 20:48:43'),
	(6, 1, 'Investment', '2013-09-03 00:00:00', '2013-09-03 20:48:43'),
	(7, 1, 'Taxation', '2013-09-03 00:00:00', '2013-09-03 20:48:43'),
	(8, 0, 'Administration', '2013-09-03 00:00:00', '2013-09-03 20:48:43'),
	(10, 8, 'Personnel', '2013-09-03 00:00:00', '2013-09-03 20:48:43'),
	(11, 8, 'Secretary', '2013-09-03 00:00:00', '2013-09-03 20:48:43'),
	(12, 8, 'Staff', '2013-09-03 00:00:00', '2013-09-03 20:48:43'),
	(13, 8, 'Top Management', '2013-09-03 00:00:00', '2013-09-03 20:48:43'),
	(14, 0, 'Art, Media and Communication', '2013-09-03 00:00:00', '2013-09-03 20:48:43'),
	(16, 14, 'Advertisement', '2013-09-03 00:00:00', '2013-09-03 20:48:43'),
	(17, 14, 'Art/ Creative Design', '2013-09-03 00:00:00', '2013-09-03 20:48:43'),
	(18, 14, 'Entertainment', '2013-09-03 00:00:00', '2013-09-03 20:48:43'),
	(19, 14, 'Public Relation', '2013-09-03 00:00:00', '2013-09-03 20:48:43'),
	(20, 0, 'Building and Construction', '2013-09-03 00:00:00', '2013-09-03 20:48:43'),
	(22, 20, 'Architect/ Interior Design', '2013-09-03 00:00:00', '2013-09-03 20:48:43'),
	(23, 20, 'Civil/ Building Construction', '2013-09-03 00:00:00', '2013-09-03 20:48:43'),
	(24, 20, 'Property/ Real Estate', '2013-09-03 00:00:00', '2013-09-03 20:48:43'),
	(25, 20, 'Quantity Survey', '2013-09-03 00:00:00', '2013-09-03 20:48:43'),
	(26, 0, 'Computer/ IT', '2013-09-03 00:00:00', '2013-09-03 20:48:43'),
	(28, 26, 'Database Administrator', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(29, 26, 'Hardware Technician', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(30, 26, 'Network Administrator', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(31, 26, 'Software Engineer', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(32, 26, 'System Administrator', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(33, 26, 'Programmer', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(34, 26, 'Web-Masterweb', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(35, 26, 'Web-SEO', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(36, 0, 'Education/ Course', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(38, 36, 'Education', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(39, 36, 'Research &amp; Development', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(40, 0, 'Engineer', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(42, 40, 'Chemical Engineering', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(43, 40, 'Electrical Engineering', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(44, 40, 'Electronic Engineering', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(45, 40, 'Environmental Engineering', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(46, 40, 'Mechanic/ Automotive', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(47, 40, 'Petroleum Engineering', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(48, 40, 'Others', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(49, 0, 'Health', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(51, 49, 'Doctor/ Diagnosis', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(52, 49, 'Pharmacy', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(53, 49, 'Practiser/ Medical Assistant', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(54, 0, 'Hotel and Restaurant', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(56, 54, 'Hotel/ Tourism', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(57, 54, 'Restaurant Services', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(58, 0, 'Manufacture', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(60, 58, 'Maintenance', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(61, 58, 'Manufacture', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(62, 58, 'Material Management', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(63, 58, 'Proses Control', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(64, 58, 'QA', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(65, 0, 'Marketing', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(67, 65, 'Corporate', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(68, 65, 'Design Proses and Control', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(69, 65, 'Marketing', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(70, 65, 'Merchandising', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(71, 65, 'Telemarketing', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(72, 0, 'Knowledge', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(74, 72, 'Agriculture', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(75, 72, 'Biotechnology', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(76, 72, 'Chemical', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(77, 72, 'Flight', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(78, 72, 'Geology', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(79, 72, 'Geophysical', '2013-09-03 00:00:00', '2013-09-03 20:48:44'),
	(80, 72, 'Knowledge &amp; Technology', '2013-09-03 00:00:00', '2013-09-03 20:48:45'),
	(81, 72, 'Nutritionist', '2013-09-03 00:00:00', '2013-09-03 20:48:45'),
	(82, 72, 'Statistic', '2013-09-03 00:00:00', '2013-09-03 20:48:45'),
	(83, 0, 'Services', '2013-09-03 00:00:00', '2013-09-03 20:48:45'),
	(85, 83, 'General Services', '2013-09-03 00:00:00', '2013-09-03 20:48:45'),
	(86, 83, 'Health/ Beauty Care', '2013-09-03 00:00:00', '2013-09-03 20:48:45'),
	(87, 83, 'Logistic/ Network Distribution', '2013-09-03 00:00:00', '2013-09-03 20:48:45'),
	(88, 83, 'Law/ Legal', '2013-09-03 00:00:00', '2013-09-03 20:48:45'),
	(89, 83, 'Security/ Army', '2013-09-03 00:00:00', '2013-09-03 20:48:45'),
	(90, 0, 'Others', '2013-09-03 00:00:00', '2013-09-03 20:48:45'),
	(91, 90, 'Press/ Editor', '2013-09-03 00:00:00', '2013-09-03 20:48:45'),
	(92, 90, 'Publisher', '2013-09-03 00:00:00', '2013-09-03 20:48:45');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;


-- Dumping structure for table job4career2.company
CREATE TABLE IF NOT EXISTS `company` (
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

-- Dumping data for table job4career2.company: ~1 rows (approximately)
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` (`company_id`, `name`, `description`, `city`, `address`, `country`, `phone`, `industry`, `registrant_name`, `registrant_email`, `registrant_password`, `reg_code`, `status`, `date_create`, `date_modified`) VALUES
	(1, 'PT. Indoexim International', 'Furniture manufacturer and exporter', 'Jakarta', 'Jl. RS Fatmawati, Jakarta Selatan', 'Indonesia', '021-7507501', '', 'Basuki Kurniawan', 'basuki@yahoo.com', 'basuki', '44e9302c03373cd12c48d4055d6ea2d8', 'active', '2013-10-15 17:16:07', '2013-10-15 20:11:39');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;


-- Dumping structure for table job4career2.experience
CREATE TABLE IF NOT EXISTS `experience` (
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

-- Dumping data for table job4career2.experience: ~0 rows (approximately)
/*!40000 ALTER TABLE `experience` DISABLE KEYS */;
/*!40000 ALTER TABLE `experience` ENABLE KEYS */;


-- Dumping structure for table job4career2.interview_call
CREATE TABLE IF NOT EXISTS `interview_call` (
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

-- Dumping data for table job4career2.interview_call: ~0 rows (approximately)
/*!40000 ALTER TABLE `interview_call` DISABLE KEYS */;
/*!40000 ALTER TABLE `interview_call` ENABLE KEYS */;


-- Dumping structure for table job4career2.job
CREATE TABLE IF NOT EXISTS `job` (
  `job_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `requirement` text NOT NULL,
  `month_salary` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `job_type` enum('full_time','part_time','contract') NOT NULL DEFAULT 'full_time',
  `contract_duration` varchar(50) NOT NULL COMMENT 'when job_type is contract',
  `noj` varchar(3) NOT NULL COMMENT 'number of jobs',
  `date_close` date NOT NULL,
  `date_create` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`job_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table job4career2.job: ~0 rows (approximately)
/*!40000 ALTER TABLE `job` DISABLE KEYS */;
INSERT INTO `job` (`job_id`, `company_id`, `title`, `description`, `requirement`, `month_salary`, `location`, `category`, `job_type`, `contract_duration`, `noj`, `date_close`, `date_create`, `date_modified`) VALUES
	(1, 1, 'PHP Programmer', 'Building web application', '["PHP","JavaScript","CSS","HTML","MySQL","CodeIgniter"]', '6000000-10000000', 'Subang', 'Pawang Web', 'contract', '1 tahun', '4', '2013-11-10', '2013-10-26 21:17:45', '2013-10-27 16:58:16');
/*!40000 ALTER TABLE `job` ENABLE KEYS */;


-- Dumping structure for table job4career2.job_apply
CREATE TABLE IF NOT EXISTS `job_apply` (
  `job_apply_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `seeker_id` int(10) unsigned NOT NULL,
  `job_id` int(10) unsigned NOT NULL,
  `date_create` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`job_apply_id`),
  UNIQUE KEY `seeker_id_job_id` (`seeker_id`,`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table job4career2.job_apply: ~0 rows (approximately)
/*!40000 ALTER TABLE `job_apply` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_apply` ENABLE KEYS */;


-- Dumping structure for table job4career2.language
CREATE TABLE IF NOT EXISTS `language` (
  `language_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `seeker_id` int(10) unsigned NOT NULL,
  `language` varchar(45) NOT NULL,
  `spoken` smallint(6) NOT NULL,
  `written` smallint(6) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`language_id`),
  UNIQUE KEY `seeker_id_language` (`seeker_id`,`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table job4career2.language: ~0 rows (approximately)
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
/*!40000 ALTER TABLE `language` ENABLE KEYS */;


-- Dumping structure for table job4career2.location
CREATE TABLE IF NOT EXISTS `location` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `datecreate` datetime NOT NULL,
  `datemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `country_city` (`country`,`city`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- Dumping data for table job4career2.location: ~42 rows (approximately)
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` (`id`, `country`, `city`, `datecreate`, `datemodified`) VALUES
	(1, 'Indonesia', 'Aceh', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(2, 'Indonesia', 'Bali', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(3, 'Indonesia', 'Bangka Belitung', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(4, 'Indonesia', 'Banten', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(5, 'Indonesia', 'Bengkulu', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(6, 'Indonesia', 'Gorontalo', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(7, 'Indonesia', 'Jakarta Raya', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(8, 'Indonesia', 'Jambi', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(9, 'Indonesia', 'Jawa Barat', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(10, 'Indonesia', 'Jawa Tengah', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(11, 'Indonesia', 'Jawa Timur', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(12, 'Indonesia', 'Kalimantan Barat', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(13, 'Indonesia', 'Kalimantan Selatan', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(14, 'Indonesia', 'Kalimantan Tengah', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(15, 'Indonesia', 'Kalimantan Timur', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(16, 'Indonesia', 'Kepulauan Riau', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(17, 'Indonesia', 'Lampung', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(18, 'Indonesia', 'Maluku', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(19, 'Indonesia', 'Maluku Utara', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(20, 'Indonesia', 'Nusa Tenggara Barat', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(21, 'Indonesia', 'Nusa Tenggara Timur', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(22, 'Indonesia', 'Papua', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(23, 'Indonesia', 'Papua Barat', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(24, 'Indonesia', 'Riau', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(25, 'Indonesia', 'Sulawesi Barat', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(26, 'Indonesia', 'Sulawesi Selatan', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(27, 'Indonesia', 'Sulawesi Tengah', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(28, 'Indonesia', 'Sulawesi Tenggara', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(29, 'Indonesia', 'Sulawesi Utara', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(30, 'Indonesia', 'Sumatera Barat', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(31, 'Indonesia', 'Sumatera Selatan', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(32, 'Indonesia', 'Sumatera Utara', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(33, 'Indonesia', 'Yogyakarta', '2013-09-03 00:00:00', '2013-09-03 21:12:49'),
	(34, 'Australia', 'Sydney', '2013-09-04 19:26:08', '2013-09-04 19:26:08'),
	(35, 'Australia', 'Melbourne', '2013-09-04 19:26:08', '2013-09-04 19:26:08'),
	(36, 'Australia', 'Brisbane', '2013-09-04 19:26:08', '2013-09-04 19:26:08'),
	(37, 'Australia', 'Gold Coast', '2013-09-04 19:26:08', '2013-09-04 19:26:08'),
	(38, 'Australia', 'Perth', '2013-09-04 19:26:08', '2013-09-04 19:26:08'),
	(39, 'Australia', 'Adelaide', '2013-09-04 19:26:08', '2013-09-04 19:26:08'),
	(40, 'Australia', 'Hobart', '2013-09-04 19:26:08', '2013-09-04 19:26:08'),
	(41, 'Australia', 'Darwin', '2013-09-04 19:26:08', '2013-09-04 19:26:08'),
	(42, 'Australia', 'Canberra', '2013-09-04 19:26:08', '2013-09-04 19:26:08');
/*!40000 ALTER TABLE `location` ENABLE KEYS */;


-- Dumping structure for table job4career2.mailer
CREATE TABLE IF NOT EXISTS `mailer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `send_to` varchar(100) NOT NULL,
  `message_tpl` varchar(50) NOT NULL,
  `param` varchar(500) NOT NULL,
  `status` enum('pending','sent','failure') NOT NULL,
  `date_create` datetime NOT NULL,
  `date_send` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table job4career2.mailer: ~1 rows (approximately)
/*!40000 ALTER TABLE `mailer` DISABLE KEYS */;
INSERT INTO `mailer` (`id`, `send_to`, `message_tpl`, `param`, `status`, `date_create`, `date_send`, `date_modified`) VALUES
	(1, 'basuki@yahoo.com', 'company_registered', '{"name":"Basuki Kurniawan","company":"PT. Indoexim International","reg_code":"44e9302c03373cd12c48d4055d6ea2d8"}', 'pending', '2013-10-15 17:16:07', '0000-00-00 00:00:00', '2013-10-15 17:16:07');
/*!40000 ALTER TABLE `mailer` ENABLE KEYS */;


-- Dumping structure for table job4career2.position
CREATE TABLE IF NOT EXISTS `position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `datecreate` datetime NOT NULL,
  `datemodivied` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table job4career2.position: ~5 rows (approximately)
/*!40000 ALTER TABLE `position` DISABLE KEYS */;
INSERT INTO `position` (`id`, `name`, `datecreate`, `datemodivied`) VALUES
	(2, 'CEO/ GM/ Director/ Senior Manager', '2013-09-04 19:33:24', '2013-09-04 19:35:53'),
	(3, 'Manager/ Assistant Manager', '2013-09-04 19:33:39', '2013-09-04 19:35:57'),
	(4, 'Supervisor/ Coordinator', '2013-09-04 19:33:55', '2013-09-04 19:36:01'),
	(5, 'Non-management &amp; Non-Supervisor', '2013-09-04 19:35:33', '2013-09-04 19:36:05'),
	(6, 'Fresh Graduated/ 1 Year Experience', '2013-09-04 19:35:43', '2013-09-04 19:36:09');
/*!40000 ALTER TABLE `position` ENABLE KEYS */;


-- Dumping structure for table job4career2.preference
CREATE TABLE IF NOT EXISTS `preference` (
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

-- Dumping data for table job4career2.preference: ~0 rows (approximately)
/*!40000 ALTER TABLE `preference` DISABLE KEYS */;
/*!40000 ALTER TABLE `preference` ENABLE KEYS */;


-- Dumping structure for table job4career2.qualification
CREATE TABLE IF NOT EXISTS `qualification` (
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

-- Dumping data for table job4career2.qualification: ~0 rows (approximately)
/*!40000 ALTER TABLE `qualification` DISABLE KEYS */;
/*!40000 ALTER TABLE `qualification` ENABLE KEYS */;


-- Dumping structure for table job4career2.reference
CREATE TABLE IF NOT EXISTS `reference` (
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

-- Dumping data for table job4career2.reference: ~0 rows (approximately)
/*!40000 ALTER TABLE `reference` DISABLE KEYS */;
/*!40000 ALTER TABLE `reference` ENABLE KEYS */;


-- Dumping structure for table job4career2.seeker
CREATE TABLE IF NOT EXISTS `seeker` (
  `seeker_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `pics` varchar(45) NOT NULL,
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
  `date_create` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`seeker_id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table job4career2.seeker: ~1 rows (approximately)
/*!40000 ALTER TABLE `seeker` DISABLE KEYS */;
INSERT INTO `seeker` (`seeker_id`, `first_name`, `last_name`, `email`, `password`, `pics`, `address`, `phone`, `mobile`, `address_idcard`, `dob`, `pob`, `gender`, `religion`, `height`, `weight`, `nationality`, `searchable`, `status`, `reg_code`, `date_create`, `date_modified`) VALUES
	(1, 'Nurhadi', 'Jogja', 'nurhadijogja@gmail.com', 'merdeka', '', '', '', '', '', '2003-01-01', '', 'M', '', 0, 0, '', '1', 'active', '2afc5c50fb1d7a9c780a7838a9d6a020', '2013-10-13 20:23:17', '2013-10-13 23:50:37');
/*!40000 ALTER TABLE `seeker` ENABLE KEYS */;


-- Dumping structure for table job4career2.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table job4career2.sessions: ~2 rows (approximately)
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
	('ea04638572e5e58fabe6ba591a7a51f8', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.101 Safari/537.36', 1382867886, 'a:7:{s:9:"user_data";s:0:"";s:16:"company_login_id";s:32:"b4e364bb5eab14eedd9ae3d54437d52f";s:10:"company_id";s:1:"1";s:12:"company_name";s:26:"PT. Indoexim International";s:15:"registrant_name";s:16:"Basuki Kurniawan";s:16:"registrant_email";s:16:"basuki@yahoo.com";s:11:"private_key";i:856;}');
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;


-- Dumping structure for table job4career2.skill
CREATE TABLE IF NOT EXISTS `skill` (
  `skill_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `seeker_id` int(10) unsigned NOT NULL,
  `skill` varchar(50) NOT NULL,
  `proficiency` enum('beginer','intermediete','advanced') NOT NULL,
  `date_create` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`skill_id`),
  UNIQUE KEY `seeker_id_skill` (`seeker_id`,`skill`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table job4career2.skill: ~0 rows (approximately)
/*!40000 ALTER TABLE `skill` DISABLE KEYS */;
/*!40000 ALTER TABLE `skill` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
