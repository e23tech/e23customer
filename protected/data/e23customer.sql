/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50133
Source Host           : localhost:3306
Source Database       : e23customer

Target Server Type    : MYSQL
Target Server Version : 50133
File Encoding         : 65001

Date: 2013-01-16 16:40:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ec_contract`
-- ----------------------------
DROP TABLE IF EXISTS `ec_contract`;
CREATE TABLE `ec_contract` (
  `cid` int(10) NOT NULL AUTO_INCREMENT COMMENT 'contractid',
  `contractno` varchar(10) NOT NULL,
  `customer` varchar(200) NOT NULL COMMENT 'customerid',
  `datesign` varchar(10) NOT NULL,
  `money` varchar(20) NOT NULL,
  `datemoney` varchar(10) DEFAULT '0',
  `contact` varchar(100) NOT NULL COMMENT 'contactid',
  `contact_phone` varchar(20) NOT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `datestart` varchar(10) NOT NULL,
  `dateend` varchar(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `gid` int(10) NOT NULL COMMENT 'groupid',
  `note` varchar(500) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ec_contract
-- ----------------------------
INSERT INTO `ec_contract` VALUES ('1', '1231', '2', '2012-11-02', '1000', '0', '1', '', null, '2012-11-08', '2012-11-16', '1', '1', 'h', '1');
INSERT INTO `ec_contract` VALUES ('2', '3465', '1', '2012-11-01', '20000', '2012-11-13', '2', '', null, '2012-11-14', '2012-11-22', '1', '1', '阿萨德发生地方', '1');
INSERT INTO `ec_contract` VALUES ('3', '123', '2', '2012-12-04', '12222', '0', '2', '', null, '2012-12-04', '2012-12-29', '4', '2', '123123', '0');
INSERT INTO `ec_contract` VALUES ('4', '541', '大明家居', '2013-01-05', '12324', '2013-01-11', '莫帅哥', '123523', 'we@a.com', '2013-01-05', '2013-01-19', '4', '2', 'as', '1');
INSERT INTO `ec_contract` VALUES ('5', '34', '大润发', '2013-01-16', '5000', '2013-01-16', '客户经理', '098', '79@12.com', '2013-01-16', '2013-01-31', '2', '1', '阿萨德飞哈地方', '1');

-- ----------------------------
-- Table structure for `ec_group`
-- ----------------------------
DROP TABLE IF EXISTS `ec_group`;
CREATE TABLE `ec_group` (
  `gid` int(10) NOT NULL AUTO_INCREMENT,
  `group` varchar(20) NOT NULL,
  `note` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ec_group
-- ----------------------------
INSERT INTO `ec_group` VALUES ('1', '经管部', null);
INSERT INTO `ec_group` VALUES ('2', '测试部门', '阿萨德1');

-- ----------------------------
-- Table structure for `ec_user`
-- ----------------------------
DROP TABLE IF EXISTS `ec_user`;
CREATE TABLE `ec_user` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `salt` varchar(6) NOT NULL,
  `realname` varchar(20) NOT NULL,
  `gid` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `role` tinyint(1) NOT NULL,
  `note` varchar(500) DEFAULT NULL,
  `scope` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ec_user
-- ----------------------------
INSERT INTO `ec_user` VALUES ('1', 'admin', '83664811117fe62bec7e7bba24e31a52', '54564b', '管理员', '1', '1', '1', '阿萨德飞', null);
INSERT INTO `ec_user` VALUES ('2', 'test', 'c4517f04c0a5294cda7da7011cbaac25', 'c36253', '测试员', '1', '1', '2', '阿萨德飞', null);
INSERT INTO `ec_user` VALUES ('4', 'test1', '5b55f4816cf073bfe294b99d4934665b', '4d39a1', '测试业务1', '1', '1', '4', '阿萨德1', null);
INSERT INTO `ec_user` VALUES ('5', 'test2', '088821d7f28c4f3f3e50bd89aa7f3453', '53acf2', '阿什顿12', '2', '1', '2', '阿萨德', null);
INSERT INTO `ec_user` VALUES ('6', 'test3', '62764e0e477248ed1b85ee3f57dc8e0a', '917b34', 'asd', '1', '1', '3', 'asd', null);
INSERT INTO `ec_user` VALUES ('7', 'test5', 'a1a1cfeec2bc0299bd40d1a3e610d7fd', '189a6a', 'sdf', '1', '0', '3', 'sdf', null);
INSERT INTO `ec_user` VALUES ('8', '王宝宝', 'c574cb6596eb5758f1343f290161e327', 'b4e6eb', '王宝宝', '1', '0', '3', '阿萨德', null);
INSERT INTO `ec_user` VALUES ('9', 'test6', 'd1518358948b7de997f773e519ed0a93', '0e4a19', 'asd', '1', '0', '4', 'a', null);
INSERT INTO `ec_user` VALUES ('10', 'asd', '388e43627845dc80d24b84f70496db26', '0c67e5', 'asdasd', '1', '1', '3', '', null);
INSERT INTO `ec_user` VALUES ('11', '阿萨德', 'b8e5f61b335af38d0dcf9bbbde5fe8f4', 'e57695', '阿萨德飞', '2', '1', '3', '', null);
