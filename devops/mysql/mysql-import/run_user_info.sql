# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.16)
# Database: bjsea
# Generation Time: 2017-09-06 08:33:43 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table run_user_info
# ------------------------------------------------------------

DROP TABLE IF EXISTS `run_user_info`;

CREATE TABLE `run_user_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户的user_id',
  `user_number` char(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '用户的会员号',
  `sex` enum('男','女','') COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '性别',
  `address` varchar(20) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '联系地址',
  `operator` varchar(20) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '负责人法人',
  `user_description` text COLLATE utf8_unicode_ci COMMENT '会员介绍',
  `member_level` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '会员等级',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `run_user_info` WRITE;
/*!40000 ALTER TABLE `run_user_info` DISABLE KEYS */;

INSERT INTO `run_user_info` (`id`, `user_id`, `user_number`, `sex`, `address`, `operator`, `user_description`, `member_level`, `created_at`, `updated_at`)
VALUES
	(1,14,'','','','','','','2015-08-05 10:16:01','2015-08-05 10:16:01'),
	(2,13,'','男','','','','','2015-07-29 15:27:05','2015-07-29 15:27:05'),
	(3,12,'','男','北京市朝阳区','杜易泽','','','2015-07-29 15:24:35','2015-07-29 15:24:35'),
	(4,15,'','','','','','','2015-08-06 12:38:51','2015-08-10 17:56:56'),
	(5,32,'PK20160202','男','','','跑酷俱乐部创建于2001年','','2015-11-25 10:27:40','2015-12-05 15:04:53'),
	(6,19,'','女','','','','','2015-08-08 06:14:04','2015-08-11 23:40:53'),
	(7,20,'','男','','','','','2015-08-08 19:56:59','2015-08-08 19:56:59'),
	(8,21,'','男','','','','','2015-08-09 22:50:39','2015-08-09 22:50:39'),
	(9,22,'','女','','','','','2015-08-10 09:38:10','2015-08-10 09:38:10'),
	(10,23,'','女','','','','','2015-08-10 10:36:13','2015-08-10 10:36:13'),
	(11,24,'','男','','','','','2015-08-11 17:08:54','2015-08-11 17:08:54'),
	(12,25,'','男','','','','','2015-08-11 23:00:45','2015-08-12 15:16:41'),
	(13,26,'','男','','','','','2015-08-12 07:44:03','2015-08-12 07:44:03'),
	(14,27,'','男','','','','','2015-08-12 09:23:27','2015-08-12 09:23:27'),
	(15,28,'','男','','','赵峰，','','2015-08-12 16:37:58','2015-08-12 16:37:58'),
	(16,29,'','女','','','','','2015-08-12 16:58:26','2015-08-12 16:58:26'),
	(17,30,'','男','','','','','2015-08-12 18:35:24','2015-08-12 18:35:24'),
	(18,33,'PK20160130','男','','','','','2016-01-19 14:31:22','2016-01-19 14:31:22'),
	(19,34,'PK199110101','男',NULL,NULL,'林光辉，性别男，程序员爱好篮球和跑步。','','2016-02-04 02:35:39','2016-02-04 02:35:39'),
	(20,35,'','男','','','','','2016-08-28 11:47:01','2016-08-28 11:47:01'),
	(21,36,'','男','','','','','2017-01-18 16:24:06','2017-01-18 16:24:06'),
	(22,37,'','','','','','','2017-02-02 01:15:14','2017-07-18 04:05:21'),
	(23,38,'','','','','','','2017-02-02 07:50:48','2017-02-02 07:50:48'),
	(24,39,'','','','','','','2017-03-03 14:38:03','2017-03-03 15:22:24'),
	(25,40,'','','','','','','2017-04-09 22:55:05','2017-04-09 22:55:05'),
	(26,41,'','','','','','','2017-04-16 02:32:26','2017-04-16 02:32:26'),
	(27,42,'','','','','','','2017-05-14 22:45:20','2017-07-17 13:53:04'),
	(28,43,'','','','','','','2017-05-19 22:25:00','2017-07-18 00:22:20'),
	(29,44,'','','','','','','2017-05-20 12:02:29','2017-05-20 12:02:29'),
	(30,45,'','','','','','','2017-05-27 09:26:47','2017-07-18 11:02:59'),
	(31,46,'','','','','','','2017-06-03 07:29:59','2017-07-18 06:33:45'),
	(32,47,'','','','','','','2017-06-03 08:59:12','2017-07-18 04:12:04');

/*!40000 ALTER TABLE `run_user_info` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
