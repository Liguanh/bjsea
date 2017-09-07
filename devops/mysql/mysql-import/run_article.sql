# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.16)
# Database: bjsea
# Generation Time: 2017-09-06 08:32:31 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table run_article
# ------------------------------------------------------------

DROP TABLE IF EXISTS `run_article`;

CREATE TABLE `run_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章表',
  `title` char(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '文章名称',
  `little_pic` char(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '文章缩略图片',
  `category_id` int(11) NOT NULL COMMENT '类别 category.id',
  `layout` char(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '模板布局',
  `flag` char(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '文章标示,头条，轮播等等',
  `writer` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '作者',
  `source` char(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '来源',
  `hits` int(11) NOT NULL DEFAULT '0' COMMENT '点击量',
  `sort_num` int(11) NOT NULL COMMENT '排序',
  `is_top` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否置顶',
  `type_id` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-app媒体资讯，2-文章资讯',
  `is_push` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否推送',
  `status` smallint(6) NOT NULL COMMENT '状态 100 未发布, 200 已发布',
  `create_by` char(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '创建人',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `run_article` WRITE;
/*!40000 ALTER TABLE `run_article` DISABLE KEYS */;

INSERT INTO `run_article` (`id`, `title`, `little_pic`, `category_id`, `layout`, `flag`, `writer`, `source`, `hits`, `sort_num`, `is_top`, `type_id`, `is_push`, `status`, `create_by`, `created_at`, `updated_at`)
VALUES
	(1,'极限运动简述','/uploads/160728/1-160HR13006392.png',1,'default','p','','北京市跑酷委员会',458,0,0,1,0,200,'','2016-07-28 22:01:55','2017-09-02 14:09:45'),
	(2,'北京市极限运动协会网站上线了！','/uploads/160728/1-160HR1134JM.jpg',17,'default','p','','北京市极限运动协会',194,1,0,1,0,200,'','2017-01-03 18:50:10','2017-01-03 18:50:10'),
	(3,'跑酷为生命的跳跃起步--你要不要一起来参与','/uploads/allimg/150604/1-1506040034430-L.jpg',17,'default','p','王洁','未知',155,2,0,1,0,200,'','2015-06-04 00:36:49','2017-09-01 10:51:24'),
	(4,'每一步跨越 都是一次超越','/uploads/150619/1-15061Z02I34Q.jpg',18,'default','p,f','王洁','Admin5',102,3,0,1,0,200,'','2015-11-03 23:39:10','2015-11-03 23:39:10'),
	(5,'阳光下跳跃更有型','/uploads/150619/1-15061Z02K9411.jpg',18,'default','p,f','王洁','未知',109,4,0,1,0,200,'','2015-11-03 23:39:51','2017-09-01 09:15:54'),
	(6,'跑酷导致过哪些事故？','/uploads/allimg/150604/005135E23-0-lp.jpg',17,'default','p','','北京市跑酷委员会',133,5,0,1,0,200,'','2015-11-21 22:14:23','2017-09-01 10:51:24'),
	(7,'伦敦建成跑酷专用场地 迎接奥运会','/uploads/allimg/150604/0052312253-0-lp.jpg',17,'default','p','王洁','未知',164,6,0,1,0,200,'','2015-11-21 22:22:08','2017-09-01 10:51:24'),
	(8,'跑酷本质探讨','/uploads/151121/1-15112122213GC.png',7,'default','p','','北京市跑酷委员会',206,7,0,1,0,200,'','2015-11-21 22:20:20','2015-11-21 22:20:20'),
	(9,'你玩过游戏《墨人跑酷》吗？','/uploads/allimg/150604/005512B94-0-lp.png',17,'default','p','酷跑管理员','未知',137,8,0,1,0,200,'','2015-06-04 00:54:46','2017-09-01 10:51:24'),
	(10,'跑酷需要哪些装备？','/uploads/151121/1-151121221J9415.png',24,'default','p','admin','北京跑酷委员会',100,9,0,1,0,200,'','2015-12-11 11:50:44','2015-12-11 11:50:44'),
	(11,'有关跑酷电影','',17,'default','','酷跑管理员','未知',176,10,0,1,0,200,'','2015-06-04 00:57:15','2015-06-04 00:57:15'),
	(12,'跑酷的来源','/uploads/allimg/150604/0100255200-0-lp.jpg',17,'default','h,p','酷跑管理员','未知',180,11,0,1,0,200,'','2015-06-04 00:59:59','2017-09-01 10:51:24'),
	(13,'跑酷骨折了怎么办？','/uploads/151121/1-15112122124Q10.png',24,'default','p','酷跑管理员','未知',200,12,0,1,0,200,'','2015-11-21 22:12:33','2015-11-21 22:12:33'),
	(14,'跑酷的哲学意义','/uploads/151121/1-151121220J6249.png',24,'default','p','酷跑管理员','未知',95,13,0,1,0,200,'','2015-11-21 22:07:23','2015-11-21 22:07:23'),
	(15,'金刚跳自学教程','/uploads/allimg/150604/010I5L62-0-lp.jpg',24,'default','p','酷跑管理员','未知',93,14,0,1,0,200,'','2015-06-04 01:06:44','2017-09-01 10:51:24'),
	(16,'2015红牛跑酷大赛开战在即 95后双胞胎兄弟提前踩','/uploads/allimg/150604/01111234T-0-lp.jpg',20,'default','p','','跑酷委员会',103,15,0,1,0,200,'','2015-11-20 15:02:02','2017-09-01 10:51:24'),
	(17,'“跑”起来，“酷”成蜘蛛侠','/uploads/allimg/150604/23042BS6-0-lp.jpg',17,'default','p','跑酷爱好者','北京市跑酷委员会',111,16,0,1,0,200,'','2015-12-11 11:48:47','2017-09-01 10:51:24'),
	(18,'联系我们','/uploads/160817/1-160QH04Q63D.png',1,'default','p','','北京市极限运动协会',790,17,0,1,0,200,'','2015-06-13 16:31:00','2017-09-02 16:06:00'),
	(19,'北京市极限运动协会章程','',1,'default','','','北京市极限运动协会',324,18,0,1,0,200,'','2016-07-28 22:02:42','2017-09-04 09:03:22'),
	(20,'协会宗旨','/uploads/161018/1-16101R0241TN.png',1,'default','p','','北京市极限运动协会',200,19,0,1,0,200,'','2016-10-18 20:24:27','2017-09-02 15:50:10'),
	(21,'组织机构','/uploads/allimg/151108/1-15110Q92GJ21-lp.png',1,'default','p','','北京市极限运动协会',232,20,0,1,0,200,'','2016-07-28 22:08:44','2017-09-02 14:10:01'),
	(22,'分支机构','/uploads/allimg/160728/1-160HR11635305-lp.png',1,'default','p','','北京市极限运动协会',311,21,0,1,0,200,'','2016-07-28 21:50:12','2017-09-02 17:17:01'),
	(23,'跑酷者在华南师范大学操场进行跑酷训练','/uploads/allimg/150705/144142BW-0-lp.jpg',17,'default','h,p','酷跑管理员','未知',112,22,0,1,0,200,'','2015-07-05 14:40:27','2017-09-01 10:51:24'),
	(24,'培训绩效下载','',27,'default','','酷跑管理员','未知',181,23,0,1,0,200,'','2015-07-05 19:43:21','2015-07-05 19:43:21'),
	(25,'加入北京市长跑俱乐部跑酷委员会流程','',34,'default','','admin','未知',148,24,0,1,0,200,'','2015-11-08 19:09:15','2015-11-08 19:09:15'),
	(26,'加入北京市极限运动协会申报流程','/uploads/160728/1-160HR12A1506.png',34,'default','h,p,f,s','','北京市极限运动协会',539,25,0,1,0,200,'','2015-11-19 16:33:00','2017-09-02 16:06:26'),
	(27,'演出合作','/uploads/160728/1-160HR22619530.png',30,'default','p','','北京市极限运动协会',232,26,0,1,0,200,'','2015-11-19 09:03:00','2015-11-19 09:03:00'),
	(28,'赛事合作','/uploads/160728/1-160HR2255R36.png',31,'default','p','','北京市极限运动协会',104,27,0,1,0,200,'','2015-11-19 09:03:00','2015-11-19 09:03:00'),
	(29,'项目合作','/uploads/160728/1-160HR225291F.png',32,'default','p','','北京市极限运动协会',135,28,0,1,0,200,'','2015-11-19 09:02:00','2015-11-19 09:02:00'),
	(30,'跑酷基础训练-轻体能跑酷训练课程ppt','/uploads/151121/1-1511212202244U.png',7,'default','p','admin','北京市跑酷委员会',180,29,0,1,0,200,'','2016-07-28 20:08:59','2016-07-28 20:08:59'),
	(31,'第三届欢乐谷跑酷争霸赛圆满落幕','/uploads/151205/1-151205203245304.png',20,'default','p,f,s','admin','北京市跑酷委员会',161,30,0,1,0,200,'','2015-12-05 20:30:57','2015-12-05 20:30:57'),
	(32,'北京市极限运动协会成立大会在北京圆满召开','/uploads/160607/1-16060GKA5M6.jpg',17,'default','h,p,f,s','admin','北京市极限运动协会',234,31,0,1,0,200,'','2016-07-28 22:05:12','2016-07-28 22:05:12'),
	(33,'北京市极限运动协会全国跑酷精英赛北京开展','/uploads/160728/1-160HR04500U4.png',20,'default','h,p,f,s','国家体育总局','国家体育总局',258,32,0,1,0,200,'','2017-01-03 18:45:46','2017-01-03 18:45:46'),
	(34,'北京市跑酷培训班火热进行中','/uploads/160818/1-160QQ22912115.jpg',7,'default','h,p,f,s','admin','北京市极限运动协会',174,33,0,1,0,200,'','2016-12-15 19:13:53','2016-12-15 19:13:53'),
	(35,'第二届北京SUP桨板公开赛在北京圆满落幕','/uploads/160923/1-160923202335511.jpg',20,'default','c,p','admin','北京市极限运动协会',154,34,0,1,0,200,'','2016-09-23 20:25:01','2016-09-23 20:25:01'),
	(36,'北京市极限运动协会 登记证书','/uploads/161109/1-16110915015G16.png',1,'default','p,f,s','admin','未知',258,35,0,1,0,200,'','2017-01-03 18:46:08','2017-01-03 18:46:08'),
	(37,'分支机构管理办法','/uploads/161018/1-16101R0232a31.png',1,'default','h,p,a','admin','北京市极限运动协会',107,36,0,1,0,200,'','2016-12-15 19:17:48','2016-12-15 19:17:48'),
	(38,'北京市极限运行协会 官方微信公共平台','/uploads/161019/1-16101910552TW.png',18,'default','p,f,s','admin','北京市极限运动协会',185,37,0,1,0,200,'','2017-01-03 18:44:04','2017-01-03 18:44:04'),
	(39,'北京市极限运动协会会费管理办法','/uploads/161019/1-161019120039240.png',29,'default','p','admin','北京市极限运动协会',199,38,0,1,0,200,'','2016-10-19 12:04:35','2016-10-19 12:04:35'),
	(40,'北京极限运动协会安全责任制度','/uploads/161019/1-161019120014158.png',29,'default','p','admin','北京市极限运动协会',74,39,0,1,0,200,'','2016-10-19 11:59:43','2016-10-19 11:59:43'),
	(41,'全国职业跑酷健身教练资格认证','/uploads/161024/1-161024140059322.jpg',7,'default','p','admin','北京市极限运动协会',228,40,0,1,0,200,'','2016-12-15 18:47:59','2016-12-15 18:47:59'),
	(42,'北京市极限运动协会与Uplift健身工作室授牌仪式','/uploads/allimg/161109/1-16110914263MD-lp.jpg',18,'default','h,p','admin','北京市极限运动协会',145,41,0,1,0,200,'','2017-01-03 18:46:22','2017-01-03 18:46:22'),
	(43,'金祖山第二届“纸箱哥”光猪爬山节','/uploads/allimg/161127/1-16112G35FL16-lp.jpg',18,'default','c,p,a','admin','北京市极限运动协会',129,42,0,1,0,200,'','2016-11-27 14:05:29','2017-09-02 11:22:36'),
	(44,'首届《专业跑酷体能教练》认证在京圆满收官','/uploads/161215/1-1612151ZT4241.jpg',18,'default','c,h,p,f,s','admin','北京市极限运动协会',237,43,0,1,0,200,'','2017-01-03 18:46:29','2017-09-02 08:22:51'),
	(45,'北京市极限运动协会与睿腾体能馆授牌仪式在京','/uploads/allimg/170103/1-1F1031R53J37-lp.png',18,'default','h,p','admin','北京极限运动协会',112,44,0,1,0,200,'','2017-01-03 18:46:35','2017-01-03 18:46:35'),
	(46,'齐浩强 BJESAPARKOUR110001201612031210','/uploads/allimg/170105/1-1F105152F3J7-lp.png',7,'default','p','admin','北京极限运动协会',73,45,0,1,0,200,'','2017-01-05 15:36:15','2017-01-05 15:36:15'),
	(47,'秦梓秋 BJESAPARKOUR110001201612032144','/uploads/allimg/170105/1-1F105153544360-lp.png',7,'default','p','admin','北京极限运动协会',169,46,0,1,0,200,'','2017-01-05 15:27:55','2017-01-05 15:27:55'),
	(48,'沈伟超 BJESAPARKOUR110001201612033016','/uploads/allimg/170105/1-1F105155155B1-lp.png',7,'default','p','admin','北京极限运动协会',109,47,0,1,0,200,'','2017-01-05 15:36:29','2017-01-05 15:36:29'),
	(49,'苏志远 BJESAPARKOUR110001201612036915','/uploads/allimg/170105/1-1F105155342F2-lp.png',7,'default','p','admin','北京极限运动协会',118,48,0,1,0,200,'','2017-01-05 15:52:24','2017-01-05 15:52:24'),
	(50,'苏志远 FREEGOPARKOUR110001201612036915','/uploads/allimg/170105/1-1F105155HR64-lp.png',7,'default','p','admin','北京极限运动协会',64,49,0,1,0,200,'','2017-01-05 15:56:34','2017-09-02 13:59:43'),
	(51,'王国靖 BJESAPARKOUR110001201612032012','/uploads/allimg/170105/1-1F105160015160-lp.png',7,'default','p','admin','北京极限运动协会',187,50,0,1,0,200,'','2017-01-05 15:57:38','2017-01-05 15:57:38'),
	(52,'王雷 BJESAPARKOUR110001201612032735','/uploads/allimg/170105/1-1F105160343357-lp.png',7,'default','p','admin','北京极限运动协会',71,51,0,1,0,200,'','2017-01-05 16:01:21','2017-01-05 16:01:21'),
	(53,'王雷 FREEGOPARKOUR110001201612032735','/uploads/allimg/170105/1-1F105160440517-lp.png',7,'default','p','admin','北京极限运动协会',151,52,0,1,0,200,'','2017-01-05 16:03:55','2017-01-05 16:03:55'),
	(54,'王珍珍 BJESAPARKOUR110001201612035542','/uploads/allimg/170105/1-1F1051605401M-lp.png',7,'default','p','admin','北京极限运动协会',187,53,0,1,0,200,'','2017-01-05 16:04:47','2017-01-05 16:04:47'),
	(55,'王珍珍 FREEGOPARKOUR110001201612035542','/uploads/allimg/170105/1-1F105160620591-lp.png',7,'default','p','admin','北京极限运动协会',152,54,0,1,0,200,'','2017-01-05 16:05:46','2017-01-05 16:05:46'),
	(56,'吴旋 BJESAPARKOUR110001201612034437','/uploads/allimg/170105/1-1F105160G1F8-lp.png',7,'default','p','admin','北京极限运动协会',121,55,0,1,0,200,'','2017-01-05 16:06:25','2017-01-05 16:06:25'),
	(57,'吴旋 FREEGOPARKOUR110001201612034437','/uploads/allimg/170105/1-1F105160J5E4-lp.png',7,'default','p','admin','北京极限运动协会',60,56,0,1,0,200,'','2017-01-05 16:07:16','2017-01-05 16:07:16'),
	(58,'夏天翊 BJESAPARKOUR110001201612034332','/uploads/allimg/170105/1-1F105160S01C-lp.png',7,'default','p','admin','北京极限运动协会',64,57,0,1,0,200,'','2017-01-05 16:07:51','2017-01-05 16:07:51'),
	(59,'夏天翊 FREEGOPARKOUR110001201612034332','/uploads/allimg/170105/1-1F105160921630-lp.png',7,'default','p','admin','北京极限运动协会',173,58,0,1,0,200,'','2017-01-05 16:08:35','2017-01-05 16:08:35'),
	(60,'徐朋辉 BJESAPARKOUR110001201612031819','/uploads/allimg/170105/1-1F10516105cV-lp.png',7,'default','p','admin','北京极限运动协会',189,59,0,1,0,200,'','2017-01-05 16:09:32','2017-09-02 13:59:36'),
	(61,'尹兰通 BJESAPARKOUR110001201612036617','/uploads/allimg/170105/1-1F105161253340-lp.png',7,'default','p','admin','北京极限运动协会',55,60,0,1,0,200,'','2017-01-05 16:11:13','2017-01-05 16:11:13'),
	(62,'尹兰通 FREEGOPARKOUR110001201612036617','/uploads/allimg/170105/1-1F10516134L91-lp.png',7,'default','p','admin','北京极限运动协会',60,61,0,1,0,200,'','2017-01-05 16:12:59','2017-01-05 16:12:59'),
	(63,'赵宏睿 BJESAPARKOUR110001201612031231','/uploads/allimg/170105/1-1F105161450501-lp.png',7,'default','p','admin','北京极限运动协会',69,62,0,1,0,200,'','2017-01-05 16:13:51','2017-01-05 16:13:51'),
	(64,'赵宏睿 FREEGOPARKOUR110001201612031231','/uploads/allimg/170105/1-1F10516153YD-lp.png',7,'default','p','admin','北京极限运动协会',84,63,0,1,0,200,'','2017-01-05 16:14:58','2017-09-02 13:59:26'),
	(65,'qqq','',1,'default','','admin','未知',135,64,0,1,0,200,'','2017-02-11 22:20:55','2017-02-11 22:20:55'),
	(66,'培训信息','',24,'default','','admin','未知',175,65,0,1,0,200,'','2017-02-11 18:50:42','2017-09-02 08:23:40'),
	(67,'正式成为北京市体育总会会员单位','/uploads/170330/1-1F330192T4332.jpg',18,'default','p,f,s','admin','北京市极限运动协会',140,66,0,1,0,200,'','2017-03-30 19:26:29','2017-09-02 13:48:09'),
	(68,'北京滑板队组建，备战全运会','/uploads/170331/1-1F331161141915.jpg',20,'default','h,p,f,s,a','admin','北京市极限运动协会',222,67,0,1,0,200,'','2017-03-31 18:29:11','2017-03-31 18:29:11'),
	(69,'第十三届全运会北京滑板队 选拔赛通知','/uploads/170428/1-1F42R33011G4.jpg',20,'default','p','admin','北京市极限运动协会',86,68,0,1,0,200,'','2017-04-28 20:44:00','2017-04-28 20:44:00'),
	(70,'第九届北京市体育大会新闻发布会暨启动仪式','/uploads/170505/1-1F5051T32LQ.jpg',20,'default','p,f,s','bjesa','北京市极限运动协会',143,69,0,1,0,200,'','2017-05-05 18:51:54','2017-05-05 18:51:54'),
	(71,'大型户外运动综艺节目 “街头之王”新闻发布会','/uploads/allimg/170608/1_170608202732_1-lp.jpg',20,'default','p,b','admin','北京市极限运动协会',147,70,0,1,0,200,'','2017-06-08 20:28:13','2017-06-08 20:28:13'),
	(72,'全运会北京滑板队选拔结果公布，十名队员进入','/uploads/allimg/170608/1_170608204255_1-lp.jpg',23,'default','h,p,b','admin','北京市极限运动协会',209,71,0,1,0,200,'','2017-06-08 20:43:53','2017-06-08 20:43:53'),
	(73,'全运会北京滑板队选拔结果公布，十名队员入围','/uploads/170608/1-1F60R0454H61.jpg',23,'default','p,f,s,a,b','admin','北京市极限运动协会',207,71,0,1,0,200,'','2017-06-08 18:45:00','2017-06-08 18:45:00'),
	(74,'全国滑板锦标赛暨全运会滑板项目预选赛结果公','/uploads/170626/1-1F626193135L8.jpg',23,'default','h,p,f,s','admin','未知',214,73,0,1,0,200,'','2017-06-26 19:31:25','2017-06-26 19:31:25'),
	(75,'ccc','',1,'default','','admin','未知',114,74,0,1,0,200,'','2017-07-19 09:32:37','2017-07-19 09:32:37'),
	(76,'北京一金二铜，全运会滑板项目决战成绩公布','',23,'default','','admin','北京市极限运动协会',149,75,0,1,0,200,'','2017-08-15 14:35:15','2017-08-15 14:35:15'),
	(77,'北京一金二铜，全运会滑板项目决战成绩公布','/uploads/allimg/170815/1_170815144630_1-lp.jpg',23,'default','h,p,f,s,b','admin','北京市极限运动协会',151,76,0,1,0,200,'','2017-08-15 14:42:08','2017-08-15 14:42:08'),
	(78,'北京一金二铜，全运会滑板项目决战成绩公布','/uploads/allimg/170815/1_170815144630_1-lp.jpg',6,'default','h,p,f,s,b','admin','北京市极限运动协会',128,77,0,1,0,200,'','2017-08-15 14:56:59','2017-08-15 14:56:59'),
	(79,'北京一金二铜，全运会滑板项目决战成绩公布','/uploads/allimg/170815/1_170815144630_1-lp.jpg',6,'default','h,p,f,s,b','admin','北京市极限运动协会',180,78,0,1,0,200,'','2017-08-15 14:57:08','2017-08-15 14:57:08'),
	(80,'北京一金二铜，全运会滑板项目决战成绩公布','/uploads/allimg/170815/1_170815144630_1-lp.jpg',20,'default','h,p,f,s,b','admin','北京市极限运动协会',161,79,0,1,0,200,'','2017-08-15 14:57:26','2017-08-15 14:57:26'),
	(81,'北京一金二铜，全运会滑板项目决战成绩公布','/uploads/allimg/170815/1_170815144630_1-lp.jpg',20,'default','h,p,f,s,b','admin','北京市极限运动协会',161,79,0,1,0,200,'','2017-08-15 14:57:26','2017-08-15 14:57:26'),
	(82,'北京一金二铜，全运会滑板项目决战成绩公布','/uploads/allimg/170815/1_170815144630_1-lp.jpg',23,'default','h,p,f,s,b','admin','北京市极限运动协会',89,81,0,1,0,200,'','2017-08-15 14:57:52','2017-08-15 14:57:52'),
	(83,'北京一金二铜，全运会滑板项目决战成绩公布','/uploads/allimg/170815/1_170815144630_1-lp.jpg',18,'default','h,p,f,s,b','admin','北京市极限运动协会',173,82,0,1,0,200,'','2017-08-15 14:58:47','2017-09-02 13:45:16'),
	(84,'北京一金二铜，全运会滑板项目决战成绩公布','/uploads/allimg/170815/1_170815144630_1-lp.jpg',17,'default','h,p,f,s,b','admin','北京市极限运动协会',216,83,0,1,0,200,'','2017-08-15 14:59:04','2017-09-01 18:19:29'),
	(85,'北京一金二铜，全运会滑板项目决战成绩公布','/uploads/allimg/170815/1_170815144630_1-lp.jpg',1,'default','h,p,f,s,b','admin','北京市极限运动协会',53,84,0,1,0,200,'','2017-08-15 14:59:21','2017-08-15 14:59:21'),
	(86,'北京一金二铜，全运会滑板项目决战成绩公布','/uploads/allimg/170815/1_170815144630_1-lp.jpg',6,'default','h,p,f,s,b','admin','北京市极限运动协会',115,85,0,1,0,200,'','2017-08-15 14:59:49','2017-08-15 14:59:49'),
	(87,'北京一金二铜，全运会滑板项目决战成绩公布','/uploads/allimg/170815/1_170815144630_1-lp.jpg',6,'default','h,p,f,s,b','admin','北京市极限运动协会',156,86,0,1,0,200,'','2017-08-15 14:59:57','2017-08-15 14:59:57'),
	(88,'北京一金二铜，全运会滑板项目决战成绩公布','/uploads/allimg/170815/1_170815144630_1-lp.jpg',6,'default','h,p,f,s,b','admin','北京市极限运动协会',157,87,0,1,0,200,'','2017-08-15 15:00:04','2017-08-15 15:00:04'),
	(89,'北京一金二铜，全运会滑板项目决战成绩公布','/uploads/allimg/170815/1_170815144630_1-lp.jpg',6,'default','h,p,f,s,b','admin','北京市极限运动协会',80,88,0,1,0,200,'','2017-08-15 19:59:30','2017-09-02 14:02:40');

/*!40000 ALTER TABLE `run_article` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;