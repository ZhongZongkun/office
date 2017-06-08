/*
Navicat MySQL Data Transfer

Source Server         : wamp
Source Server Version : 50520
Source Host           : 127.0.0.1:3306
Source Database       : office1

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2017-06-08 22:46:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for of_file
-- ----------------------------
DROP TABLE IF EXISTS `of_file`;
CREATE TABLE `of_file` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `huiyiid` int(11) DEFAULT NULL,
  `yitiid` int(11) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `filepdf` varchar(20) DEFAULT NULL,
  `time` int(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of of_file
-- ----------------------------

-- ----------------------------
-- Table structure for of_huiyi
-- ----------------------------
DROP TABLE IF EXISTS `of_huiyi`;
CREATE TABLE `of_huiyi` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `huiyiname` varchar(255) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of of_huiyi
-- ----------------------------
INSERT INTO `of_huiyi` VALUES ('9', '广汉市人民政府第十八届-第9次常务会议', '1484012485');

-- ----------------------------
-- Table structure for of_img
-- ----------------------------
DROP TABLE IF EXISTS `of_img`;
CREATE TABLE `of_img` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `huiyiid` int(11) DEFAULT NULL,
  `yitiid` int(11) DEFAULT NULL,
  `filename` varchar(50) DEFAULT NULL,
  `file` varchar(50) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `ord` int(2) DEFAULT NULL,
  `yong` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of of_img
-- ----------------------------

-- ----------------------------
-- Table structure for of_users
-- ----------------------------
DROP TABLE IF EXISTS `of_users`;
CREATE TABLE `of_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `level` bit(1) DEFAULT NULL,
  `master` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of of_users
-- ----------------------------
INSERT INTO `of_users` VALUES ('1', 'admin', '202cb962ac59075b964b07152d234b70', '测试', '', '');

-- ----------------------------
-- Table structure for of_yiti
-- ----------------------------
DROP TABLE IF EXISTS `of_yiti`;
CREATE TABLE `of_yiti` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `huiyiid` int(11) DEFAULT NULL,
  `xuhao` varchar(255) DEFAULT NULL,
  `yitiname` varchar(255) DEFAULT NULL,
  `tiyiren` varchar(255) DEFAULT NULL,
  `huibaodanwei` varchar(255) DEFAULT NULL,
  `huibaoren` varchar(255) DEFAULT NULL,
  `liexidanwei` varchar(255) DEFAULT NULL,
  `liexiren` varchar(255) DEFAULT NULL,
  `pdf` varchar(40) DEFAULT NULL,
  `imagedir` varchar(30) DEFAULT NULL,
  `imagecount` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of of_yiti
-- ----------------------------
INSERT INTO `of_yiti` VALUES ('12', '9', '1', '学习《四川省行政处罚听证程序规定》', '张俊懿', '法制办', '胡羽宇', '环保局、工商质监局、住建局、食药监局、安监局、公安局', '曾勇、钟昌涛、刘刚、李雁、向祖德、谢跃东', '1491379184', '1491379184', '9');
INSERT INTO `of_yiti` VALUES ('13', '9', '2', '学习《德阳市政府债务风险化解规划》', '张俊懿', '财政局', '燕太斌', '金融办、发改局、审计局、司法局、公安局', '张跃辉、刘雪莲、兰俊、陶永东、刘文', '1491438327', '1491438327', '6');
INSERT INTO `of_yiti` VALUES ('14', '9', '3', '审议人事任免事项', '张俊懿', '人社局', '吕  波', '', '', null, null, null);
INSERT INTO `of_yiti` VALUES ('15', '9', '4', '审议《关于调整德阳市企业应急转贷专项资金支持企业名单的函（送审稿）》', '王居中', '金融办', '张跃辉', '经信局、科技商务局、人社局、安监局、环保局、工商质监局、法院、人行', '张路、洪池、吕波、向祖德、曾勇、钟昌涛、唐辉、黄晓斌', '1491438544', '1491438544', '18');
INSERT INTO `of_yiti` VALUES ('16', '9', '5', '审议《2017年主要经济社会发展指标任务分解（送审稿）》', '王居中', '目督办', '唐  勇', '发改局、经信局、科技商务局、财政局、人社局、住建局、统计局、农办、高新东区', '刘雪莲、张路、洪池、燕太斌、吕波、刘刚、龙守坤、曾洪波、尹健（邀请）', '1491438627', '1491438627', '13');
INSERT INTO `of_yiti` VALUES ('17', '9', '6', '审议《关于广汉市农村商业银行流动资金贷款展期的请示》', '王居中', '广鑫公司', '谢  强', '', '', '1491438753', '1491438753', '3');
INSERT INTO `of_yiti` VALUES ('18', '9', '7', '审议《广汉市“四好”幸福美丽新村示范带建设实施方案（送审稿）》', '梁筱萍', '农  办', '曾洪波', '发改局、财政局、住建局、农业局、旅游局、文明办', '刘雪莲、燕太斌、刘刚、胡智、朱家可、向勇（邀请）', '1491438813', '1491438813', '18');
INSERT INTO `of_yiti` VALUES ('19', '9', '8', '审议《关于报送&lt;广汉市2017年省级财政现代农业发展工程项目农业社会化服务体系建设任务实施方案&gt;的请示》', '梁筱萍', '农业局', '胡  智', '财政局', '燕太斌', null, null, null);
INSERT INTO `of_yiti` VALUES ('20', '9', '9', '审议《关于安排2016年秋冬季退役士兵经济补助经费的请示》', '毛  毅', '民政局', '黄  畅', '财政局', '燕太斌', '1491438872', '1491438872', '6');
