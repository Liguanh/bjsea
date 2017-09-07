# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.16)
# Database: bjsea
# Generation Time: 2017-09-06 08:33:27 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table run_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `run_users`;

CREATE TABLE `run_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '账号',
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `real_name` char(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '姓名',
  `email` char(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '邮箱',
  `phone` char(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '手机号',
  `mtype` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '个人' COMMENT '会员类型',
  `identity_card` char(25) COLLATE utf8_unicode_ci NOT NULL COMMENT '身份证号',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `run_users` WRITE;
/*!40000 ALTER TABLE `run_users` DISABLE KEYS */;

INSERT INTO `run_users` (`id`, `username`, `password`, `real_name`, `email`, `phone`, `mtype`, `identity_card`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(12,'Young','ab244795339868d6e9d35ed7e7de7e3b','北京跑酷俱乐部','yize@126.com','13241751522','俱乐部会员','103434199109147890',NULL,'2015-07-29 15:24:35','2015-07-29 15:24:35'),
	(13,'company','e10adc3949ba59abbe56e057f20f883e','北京市长跑有限公司','root@qq.com','13241751522','企业','103434199109147890',NULL,'2015-07-29 15:27:05','2015-07-29 15:27:05'),
	(14,'qcti62dbas','21c36b9ec5bca143d25de8e138156d15','9RMGcJ6QJI7W','2981466867@qq.com','','个人','',NULL,'2015-08-05 10:16:01','2015-08-05 10:16:01'),
	(15,'cyyi605x2b6','57de79c1d56756b525b5c2e28f525f51','翟慧峰','postmodern18034156@163.com','','个人','',NULL,'2015-08-06 12:38:51','2015-08-10 17:56:56'),
	(19,'vcanuhog9ue','7ee7e16158fb01e212eecf79dc71f289','王虹','zhuishi71099@163.com','','个人','',NULL,'2015-08-08 06:14:04','2015-08-11 23:40:53'),
	(20,'nvb5nmkjkr','cac623880beb9b16b00e40f99da89987','林晖','zwrmmkqs36763169@163.com','','个人','',NULL,'2015-08-08 19:56:59','2015-08-08 19:56:59'),
	(21,'whfoi9hdfe','84dcd6ed5e82ab87ce370230a55a8551','周翔','youfanpo266273@163.com','','个人','',NULL,'2015-08-09 22:50:39','2015-08-09 22:50:39'),
	(22,'srxs80cwen','7c8fad9db0989d04ef670142c5dcb7f5','伊丽莎白.晴','3256534@qq.com','','个人','',NULL,'2015-08-10 09:38:10','2015-08-10 09:38:10'),
	(23,'hyfq43jxne','ce4d4731d892dc95d7a14d4b29971767','修月','1410107691@qq.com','','个人','',NULL,'2015-08-10 10:36:13','2015-08-10 10:36:13'),
	(24,'gzfx99olqq','6a3679973237963b7592361682d01b20','姜伟','3257656534@qq.com','','个人','',NULL,'2015-08-11 17:08:54','2015-08-11 17:08:54'),
	(25,'azxs7wehdc','cac623880beb9b16b00e40f99da89987','曹健健','csjlmlan350180808@163.com','','个人','',NULL,'2015-08-11 23:00:45','2015-08-12 15:16:41'),
	(26,'8jvcegprtyj','7ee7e16158fb01e212eecf79dc71f289','刘永健','zhanfu5049546@163.com','','个人','',NULL,'2015-08-12 07:44:03','2015-08-12 07:44:03'),
	(27,'edlxcoleo','7c13b9cc254a5759115308c3ec4c9dbf','王宝山','entaqwlc674002667@163.com','','个人','',NULL,'2015-08-12 09:23:27','2015-08-12 09:23:27'),
	(28,'qnfk43srnf','21c36b9ec5bca143d25de8e138156d15','赵峰','2981466867_bak@qq.com','','个人','',NULL,'2015-08-12 16:37:58','2015-08-12 16:37:58'),
	(29,'xhqt32qrvr','21c36b9ec5bca143d25de8e138156d15','王云云','3243916254@qq.com','','个人','',NULL,'2015-08-12 16:58:26','2015-08-12 16:58:26'),
	(30,'c1kor5830m','f3ff94d6c6732ba028cec881ed5ac4b4','李强','500433@163@qq.com','','个人','',NULL,'2015-08-12 18:35:24','2015-08-12 18:35:24'),
	(32,'跑酷','15fbc5ee879f06b63ac281a13a0e8533','安利会','an_parkour@126.com','13718956029','个人','110109198307183118',NULL,'2015-11-25 10:27:40','2015-12-05 15:04:53'),
	(33,'周昊琛','debce2337baf2a6a21c441670f57c303','周昊琛','531584692@qq.com','18379165006','个人','360122199908260010',NULL,'2016-01-19 14:31:22','2016-01-19 14:31:22'),
	(34,'lgh189491','0f872b6b479921f84d75c003f33d5b17','林光辉','lgh189491@163.com','15501191752','个人','410927199110108116',NULL,'2016-02-04 02:35:39','2016-02-04 02:35:39'),
	(35,'萧萧猪小猪','6e9f8b496a103615d90af203feae78ee','许嘉伟','834706036@qq.com','18710252570','个人','530102199903033712',NULL,'2016-08-28 11:47:01','2016-08-28 11:47:01'),
	(36,'candleberry','eb630c523b202624bfcd0f89ecd488e7','金腾辉','candleberry@sina.com','15011525770','个人','110105199008195310',NULL,'2017-01-18 16:24:06','2017-01-18 16:24:06'),
	(37,'vqz47zm9','bed7a15566781ecfaf686259fb1e49c9','向芳剛','xinji.a.fu.xq.k.jb.am.v@gmail.com','','个人','',NULL,'2017-02-02 01:15:14','2017-07-18 04:05:21'),
	(38,'','bed7a15566781ecfaf686259fb1e49c9','莘韋慈','a.l.in.guant.i.ng@gmail.com','','个人','',NULL,'2017-02-02 07:50:48','2017-02-02 07:50:48'),
	(39,'w7hbq4uw41','7ed8ed74fffd2fc3f49698f6384dba2e','入看','dtclzn@163.com','','个人','',NULL,'2017-03-03 14:38:03','2017-03-03 15:22:24'),
	(40,'','8e544541d6e6256dc8231e7e95f1397d','赵青','hao53963706@sohu.com','','个人','',NULL,'2017-04-09 22:55:05','2017-04-09 22:55:05'),
	(41,'','8e544541d6e6256dc8231e7e95f1397d','陈瑞','gongliao2yao@sohu.com','','个人','',NULL,'2017-04-16 02:32:26','2017-04-16 02:32:26'),
	(42,'ib4ow93a','ab0ea9e682d99af2a460843ea7838b7c','都良信','xin.j.iaf.uxq.kj.b.a.m.v@googlemail.com','','个人','',NULL,'2017-05-14 22:45:20','2017-07-17 13:53:04'),
	(43,'yi51339314','8e544541d6e6256dc8231e7e95f1397d','陈睿','yi51339314@sohu.com','','个人','',NULL,'2017-05-19 22:25:00','2017-07-18 00:22:20'),
	(44,'duvy9t18w','620e949474ce31b27cb07bd4763a359b','WangeLeiw','yuguhun55@hotmail.com','','个人','',NULL,'2017-05-20 12:02:29','2017-05-20 12:02:29'),
	(45,'duwy4t14a','620e949474ce31b27cb07bd4763a359b','WangiLeij','yuguhun1@126.com','','个人','',NULL,'2017-05-27 09:26:47','2017-07-18 11:02:59'),
	(46,'uf0kx9a9','ab3be9c354b887546620133d4f920b1d','賈海辰','nwyw@techie.com','','个人','',NULL,'2017-06-03 07:29:59','2017-07-18 06:33:45'),
	(47,'wne5qw0h9','873b46f78392a9a951b404e0b03f25de','冀蘭宏','x.in.jiafu.xq.kjb.a.m.v@gmail.com','','个人','',NULL,'2017-06-03 08:59:12','2017-07-18 04:12:04');

/*!40000 ALTER TABLE `run_users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
