# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.16)
# Database: bjsea
# Generation Time: 2017-09-06 08:34:34 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table run_friend_link
# ------------------------------------------------------------

DROP TABLE IF EXISTS `run_friend_link`;

CREATE TABLE `run_friend_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` char(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '链接地址',
  `url_name` char(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '友情链接名字',
  `note` char(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '备注',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `run_friend_link` WRITE;
/*!40000 ALTER TABLE `run_friend_link` DISABLE KEYS */;

INSERT INTO `run_friend_link` (`id`, `url`, `url_name`, `note`, `created_at`, `updated_at`)
VALUES
	(1,'http://www.bjtyzh.org/','北京市体育总会','','2017-08-20 15:17:08','2017-08-20 15:17:08'),
	(2,'http://www.gov.cn/','中华人民共和国中央人民政府门户网站','','2017-08-20 15:17:08','2017-08-20 15:17:08'),
	(3,'http://wushu.sport.org.cn/','中国武术协会','','2017-08-20 15:17:08','2017-08-20 15:17:08'),
	(4,'http://www.paoku.com.cn/','中国跑酷网','','2017-08-20 15:17:08','2017-08-20 15:17:08'),
	(5,'http://www.paokujie.com/','跑酷街','','2017-08-20 15:17:08','2017-08-20 15:17:08');

/*!40000 ALTER TABLE `run_friend_link` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
