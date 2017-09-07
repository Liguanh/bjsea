# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.16)
# Database: bjsea
# Generation Time: 2017-09-06 08:33:11 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table run_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `run_category`;

CREATE TABLE `run_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章分类表',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父分类ID',
  `name` char(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '文章分类名称',
  `sort_num` smallint(6) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` smallint(6) NOT NULL DEFAULT '100' COMMENT '状态 100:未发布, 200:已发布',
  `is_hidden` smallint(6) NOT NULL DEFAULT '1' COMMENT '是否隐藏: 1:显示 2:隐藏',
  `note` char(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '信息备注',
  `is_url` smallint(6) NOT NULL DEFAULT '0' COMMENT '是否链接',
  `http_url` char(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '栏目链接',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category_status_index` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `run_category` WRITE;
/*!40000 ALTER TABLE `run_category` DISABLE KEYS */;

INSERT INTO `run_category` (`id`, `parent_id`, `name`, `sort_num`, `status`, `is_hidden`, `note`, `is_url`, `http_url`, `created_at`, `updated_at`)
VALUES
	(1,0,'协会介绍',1,200,1,'sddssdsd',0,'','2017-07-23 11:02:09','2017-08-08 12:44:50'),
	(2,1,'协会背景',6,200,1,'',1,'/article/detail/1','2017-07-23 11:02:09','2017-09-02 14:00:33'),
	(3,1,'协会章程',7,200,1,'',1,'/article/detail/19','2017-07-23 11:02:09','2017-09-02 14:00:51'),
	(4,0,'会员专区',2,200,1,'',0,'','2017-07-23 11:02:09','2017-07-23 11:02:09'),
	(5,0,'新闻中心',3,200,1,'',0,'','2017-07-23 11:02:09','2017-07-23 11:02:09'),
	(6,0,'赛事专区',4,200,1,'',0,'','2017-07-23 11:02:09','2017-07-23 11:02:09'),
	(7,0,'培训交流',5,200,1,'',0,'','2017-07-23 11:02:09','2017-07-23 11:02:09'),
	(8,1,'协会宗旨',8,200,1,'',1,'/article/detail/20','2017-07-23 11:02:09','2017-09-02 14:01:05'),
	(10,1,'组织机构',10,200,1,'',1,'/article/detail/21','2017-07-23 11:02:09','2017-09-02 14:01:22'),
	(11,1,'分支机构',11,200,1,'',1,'/article/detail/22','2017-07-23 11:02:09','2017-09-02 14:01:32'),
	(12,4,'俱乐部会员',12,200,1,'',1,'/plus/list_member.php?mtype=3','2017-07-23 11:02:09','2017-07-23 11:02:09'),
	(13,4,'个人会员',13,200,1,'',1,'/plus/list_member.php?mtype=1','2017-07-23 11:02:09','2017-07-23 11:02:09'),
	(14,4,'企业会员',14,200,1,'',1,'/plus/list_member.php?mtype=2','2017-07-23 11:02:09','2017-07-23 11:02:09'),
	(15,4,'会员证查询',15,200,1,'',1,'/plus/list_member.php','2017-07-23 11:02:09','2017-07-23 11:02:09'),
	(17,5,'行业新闻',17,200,1,'',0,'','2017-07-23 11:02:09','2017-07-23 11:02:09'),
	(18,5,'协会动态',18,200,1,'',0,'','2017-07-23 11:02:09','2017-07-23 11:02:09'),
	(19,5,'政策法规',19,200,1,'',0,'','2017-07-23 11:02:09','2017-07-23 11:02:09'),
	(20,6,'赛事信息',20,200,1,'',0,'','2017-07-23 11:02:09','2017-07-23 11:02:09'),
	(21,6,'赛事计划',21,200,1,'',0,'','2017-07-23 11:02:09','2017-07-23 11:02:09'),
	(22,6,'比赛报名',22,200,1,'',1,'/plus/list_form.php?sign=1','2017-07-23 11:02:09','2017-07-23 11:02:09'),
	(23,6,'成绩公告',23,200,1,'',0,'','2017-07-23 11:02:09','2017-07-23 11:02:09'),
	(24,7,'培训信息',23,200,1,'',0,'','2017-07-23 11:02:09','2017-07-23 11:02:09'),
	(25,7,'交流计划',25,200,1,'',0,'','2017-07-23 11:02:09','2017-07-23 11:02:09'),
	(26,7,'证书查询',26,200,1,'',1,'/plus/list_ceritificate.php','2017-07-23 11:02:09','2017-07-23 11:02:09'),
	(27,7,'下载专区',27,200,1,'',0,'','2017-07-23 11:02:09','2017-07-23 11:02:09'),
	(28,0,'项目合作',50,100,1,'用户社区的活动',0,'','2017-07-23 11:02:09','2017-07-23 15:32:34'),
	(29,1,'规章制度',9,200,1,'',0,'','2017-07-23 11:02:09','2017-07-23 11:02:09'),
	(30,28,'演出合作',50,200,1,'',0,'','2017-07-23 11:02:09','2017-07-23 11:02:09'),
	(31,28,'赛事合作',50,200,1,'',0,'','2017-07-23 11:02:09','2017-07-23 11:02:09'),
	(32,28,'共同开发项目',50,200,1,'',0,'','2017-07-23 11:02:09','2017-07-23 11:02:09'),
	(33,7,'课程设置',24,200,1,'',0,'','2017-07-23 11:02:09','2017-07-23 11:02:09'),
	(34,4,'入会流程',50,200,1,'',0,'','2017-07-23 11:02:09','2017-07-23 11:02:09'),
	(35,0,'联系我们',6,200,1,'联系我们',1,'/article/detail/18','2017-09-02 15:11:39','2017-09-02 15:31:21');

/*!40000 ALTER TABLE `run_category` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
