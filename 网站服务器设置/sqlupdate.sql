-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-12-29 15:26:24
-- 服务器版本： 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myweb`
--

-- --------------------------------------------------------

--
-- 表的结构 `mw_album`
--

CREATE TABLE IF NOT EXISTS `mw_album` (
  `albumid` int(11) NOT NULL COMMENT '相册自增id',
  `albumname` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '相册名称',
  `albumopen` tinyint(3) NOT NULL DEFAULT '0' COMMENT '相册公开,1公开，2自己可见',
  `albumcover` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '相册封面',
  `albumdesc` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '相册说明',
  `userid` int(11) unsigned DEFAULT NULL COMMENT '外键创建人ID',
  `cateid` int(11) unsigned DEFAULT NULL COMMENT '外键相册类型ID',
  `createtime` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '相册创建时间'
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='相册表';

--
-- 转存表中的数据 `mw_album`
--

INSERT INTO `mw_album` (`albumid`, `albumname`, `albumopen`, `albumcover`, `albumdesc`, `userid`, `cateid`, `createtime`) VALUES
(1, '默认相册', 1, 'nophoto.jpg', '上传的照片默认在此相册！', NULL, 1, '1449046405'),
(32, 'S.H.E is Beauty', 2, '1449046191_2368.jpg', 'Just pretty girl.', NULL, 67, '1449046191'),
(33, '猫咪', 1, '1449559715_2119.jpg', '猫咪专属相册', NULL, 79, '1449559715');

-- --------------------------------------------------------

--
-- 表的结构 `mw_albumcate`
--

CREATE TABLE IF NOT EXISTS `mw_albumcate` (
  `cateid` int(11) unsigned NOT NULL COMMENT '相册类型自增ID',
  `catename` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '相册类型名称',
  `createtime` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '相册类型创建时间'
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='相册类型表';

--
-- 转存表中的数据 `mw_albumcate`
--

INSERT INTO `mw_albumcate` (`cateid`, `catename`, `createtime`) VALUES
(1, '未分类', '1449046335'),
(18, '造型/美妆', '1448008799'),
(19, '唯美意境', '1448008799'),
(21, '运动', '1448008799'),
(22, '生活掠影', '1448008799'),
(23, '健身/舞蹈', '1448008893'),
(26, '旅行', '1448009056'),
(33, '秋游', '1448010635'),
(35, '湖边美景', '1448248466'),
(36, '老照片', '1448248466'),
(45, '冰雪世界', '1448248641'),
(52, '精彩瞬间', '1448250630'),
(53, '人在苏宁', '1448250646'),
(54, '环球之旅', '1448250658'),
(61, '毕业季', '1448257898'),
(64, '下雪了', '1448261033'),
(65, '我们的时代', '1448268560'),
(66, 'Sunshine', '1448497809'),
(67, '美女', '1448855048'),
(68, '动漫', '1449043689'),
(69, '摄影', '1449043689'),
(70, '风景', '1449043689'),
(71, '花花', '1449043689'),
(78, '我是逗比', '1449559451'),
(79, '喵星人', '1449559689');

-- --------------------------------------------------------

--
-- 表的结构 `mw_blog`
--

CREATE TABLE IF NOT EXISTS `mw_blog` (
  `id` int(11) unsigned NOT NULL COMMENT '自增id',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '标题',
  `content` text COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `status` tinyint(3) NOT NULL COMMENT '默认0不公开，1为公开',
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT '文章图片',
  `commentid` int(11) NOT NULL COMMENT '评论id',
  `categoryid` int(11) NOT NULL COMMENT '分类id',
  `asset` text COLLATE utf8_unicode_ci NOT NULL,
  `mind_time` int(11) NOT NULL COMMENT '文章手动显示时间',
  `create_time` int(11) NOT NULL COMMENT '添加时间',
  `uid` int(11) unsigned NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='文章表';

-- --------------------------------------------------------

--
-- 表的结构 `mw_config`
--

CREATE TABLE IF NOT EXISTS `mw_config` (
  `id` varchar(64) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mw_config`
--

INSERT INTO `mw_config` (`id`, `value`) VALUES
('page_takonomy', 'page'),
('page_taxonomy', 'page'),
('post_takonomy', 'post'),
('post_taxonomy', 'post'),
('sys_allow_register', '0'),
('sys_datetime_date_format', 'Y-m-d'),
('sys_datetime_pretty_format', '1'),
('sys_datetime_timezone', 'Etc/GMT-8'),
('sys_datetime_time_format', '24'),
('sys_date_format', ''),
('sys_date_format_custom', ''),
('sys_default_role', 'member_1'),
('sys_icp', 'aa'),
('sys_lang', 'zh-CN'),
('sys_seo_description', 'web description'),
('sys_seo_keywords', 'you-me,yii'),
('sys_seo_title', 'you-me'),
('sys_site_about', '网站说明'),
('sys_site_description', 'one private website'),
('sys_site_email', 'aw133e@163.com'),
('sys_site_name', 'YM'),
('sys_site_theme', 'blank'),
('sys_site_url', ''),
('sys_stat', 'bb'),
('sys_status', '1'),
('sys_theme_admin', ''),
('sys_theme_home', ''),
('sys_timezone', ''),
('sys_time_format', ''),
('sys_time_format_custom', ''),
('sys_utc', ''),
('test_data_theme', '');

-- --------------------------------------------------------

--
-- 表的结构 `mw_likeip`
--

CREATE TABLE IF NOT EXISTS `mw_likeip` (
  `id` int(11) NOT NULL,
  `picid` int(11) NOT NULL,
  `ip` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `mw_likeip`
--

INSERT INTO `mw_likeip` (`id`, `picid`, `ip`) VALUES
(1, 26, '127.0.0.1'),
(2, 67, '127.0.0.1'),
(3, 68, '127.0.0.1'),
(4, 69, '127.0.0.1'),
(5, 68, '192.168.10.44'),
(6, 67, '192.168.10.44'),
(7, 46, '127.0.0.1'),
(8, 59, '127.0.0.1'),
(9, 70, '127.0.0.1'),
(10, 63, '127.0.0.1'),
(11, 57, '127.0.0.1'),
(12, 27, '127.0.0.1'),
(13, 69, '192.168.10.44'),
(14, 66, '192.168.10.44'),
(15, 64, '192.168.10.44'),
(16, 71, '127.0.0.1'),
(17, 59, '192.168.0.7'),
(18, 61, '192.168.0.88'),
(19, 65, '192.168.0.88'),
(20, 68, '192.168.0.88'),
(21, 62, '192.168.0.88'),
(22, 67, '192.168.0.7'),
(23, 58, '127.0.0.1'),
(24, 65, '192.168.10.44'),
(25, 70, '192.168.10.44'),
(26, 72, '127.0.0.1'),
(27, 65, '192.168.0.7'),
(28, 73, '127.0.0.1'),
(29, 28, '127.0.0.1'),
(30, 72, '::1'),
(31, 73, '::1'),
(32, 47, '127.0.0.1'),
(33, 50, '127.0.0.1'),
(34, 50, '192.168.0.7'),
(35, 51, '192.168.0.7'),
(36, 51, '127.0.0.1'),
(37, 43, '127.0.0.1'),
(38, 39, '127.0.0.1'),
(39, 69, '192.168.0.7'),
(40, 66, '192.168.0.7'),
(41, 61, '192.168.0.7'),
(42, 71, '192.168.10.44'),
(43, 65, '127.0.0.1'),
(44, 66, '127.0.0.1'),
(45, 62, '127.0.0.1'),
(46, 61, '127.0.0.1'),
(47, 64, '192.168.0.7'),
(48, 43, '192.168.0.7'),
(49, 30, '127.0.0.1'),
(50, 80, '192.168.0.7');

-- --------------------------------------------------------

--
-- 表的结构 `mw_photo`
--

CREATE TABLE IF NOT EXISTS `mw_photo` (
  `picid` int(11) NOT NULL COMMENT '照片自增id',
  `pictitle` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '照片标题',
  `picopen` int(11) NOT NULL DEFAULT '0' COMMENT '照片默认不公开，1为公开，0为不公开',
  `picUrl` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '照片地址',
  `smallPicUrl` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '小图地址',
  `picdesc` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '照片说明',
  `userid` int(11) unsigned DEFAULT NULL COMMENT '外键上传人ID',
  `albumid` int(11) unsigned DEFAULT NULL COMMENT '外键相册ID',
  `createtime` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '相册创建时间',
  `love` int(11) NOT NULL DEFAULT '0' COMMENT '赞数'
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='照片表';

--
-- 转存表中的数据 `mw_photo`
--

INSERT INTO `mw_photo` (`picid`, `pictitle`, `picopen`, `picUrl`, `smallPicUrl`, `picdesc`, `userid`, `albumid`, `createtime`, `love`) VALUES
(26, '', 1, '4860-20151202160841.jpeg', '', NULL, NULL, 1, '1449043721', 1),
(27, '', 1, '9253-20151202160843.jpeg', '', NULL, NULL, 1, '1449043723', 1),
(28, '', 1, '1002-20151202160843.jpeg', '', NULL, NULL, 32, '1449043723', 1),
(29, '', 1, '3304-20151202164405.jpg', '', NULL, NULL, 32, '1449045845', 0),
(30, '', 1, '7966-20151202171321.jpeg', '', NULL, NULL, 32, '1449047601', 1),
(31, '', 1, '5663-20151203092916.jpg', '', NULL, NULL, 1, '1449106156', 0),
(33, '', 1, '2307-20151203092916.jpg', '', NULL, NULL, 32, '1449106156', 0),
(36, '', 1, '7387-20151203093148.jpg', '', NULL, NULL, 1, '1449106308', 0),
(39, '', 1, '2789-20151203093423.jpg', '', NULL, NULL, 1, '1449106463', 1),
(43, '', 1, '4572-20151203145435.jpeg', '', NULL, NULL, 1, '1449125675', 2),
(44, '', 1, '6883-20151203145436.jpeg', '', NULL, NULL, 1, '1449125676', 0),
(45, '', 1, '8987-20151203145438.jpeg', '', NULL, NULL, 1, '1449125678', 0),
(46, '', 1, '6018-20151203145439.jpeg', '', NULL, NULL, 1, '1449125679', 1),
(47, '', 1, '6362-20151203145442.jpeg', '', NULL, NULL, 1, '1449125682', 1),
(48, '', 1, '2061-20151203145443.jpeg', '', NULL, NULL, 1, '1449125683', 0),
(49, '', 1, '4505-20151203145443.jpeg', '', NULL, NULL, 1, '1449125683', 0),
(50, '', 1, '3818-20151203145443.jpeg', '', NULL, NULL, 1, '1449125683', 2),
(51, '', 1, '8504-20151203145444.jpeg', '', NULL, NULL, 1, '1449125684', 2),
(52, '', 1, '8400-20151203145445.jpeg', '', NULL, NULL, 1, '1449125685', 0),
(53, '', 1, '8518-20151203145446.jpeg', '', NULL, NULL, 33, '1449125686', 0),
(55, '', 1, '643-20151204154546.jpg', '', NULL, NULL, 1, '1449215147', 0),
(56, 'cds', 1, '3891-20151204160844.jpg', '', NULL, NULL, 1, '1449216524', 0),
(57, '天空', 1, '3149-20151204160844.jpg', '', NULL, NULL, 1, '1449216524', 1),
(58, '夜景', 1, '5480-20151204160845.jpg', '', NULL, NULL, 1, '1449216525', 1),
(59, '猫咪', 1, '4265-20151204160845.jpg', '', NULL, NULL, 33, '1449216525', 2),
(60, '壁纸', 1, '355-20151204160845.jpg', '', NULL, NULL, 1, '1449216525', 0),
(61, '蓝天白云', 1, '6070-20151204160845.jpg', '', 'why sky', NULL, 1, '1449216526', 3),
(62, '奇地貌', 1, '870-20151204160846.jpg', '', '测试2', NULL, 1, '1449216526', 2),
(63, 'Apples', 1, '2508-20151204160846.jpg', '', NULL, NULL, 1, '1449216526', 1),
(64, '静美', 1, '698-20151204160846.jpg', '', NULL, NULL, 1, '1449216526', 2),
(65, '淡定', 1, '6025-20151204160847.jpg', '', '这是我的第一张摄影照片！', NULL, 1, '1449216527', 4),
(66, '海阔天空', 1, '3277-20151204160847.jpg', '', '蓝蓝的海洋～', NULL, 1, '1449216527', 3),
(67, '', 1, '3577-20151208114652.jpg', '', NULL, NULL, 1, '1449546412', 3),
(68, '', 0, '7623-20151208114652.jpg', '', NULL, NULL, 1, '1449546412', 3),
(69, '', 1, '5076-20151208114652.jpg', '', NULL, NULL, 1, '1449546412', 3),
(70, '', 1, '832-20151208114652.jpg', '', NULL, NULL, 1, '1449546412', 2),
(71, '', 1, '3493-20151209104307.jpg', '', NULL, NULL, 1, '1449628987', 2),
(72, '', 1, '8184-20151210155947.jpg', '', NULL, NULL, 1, '1449734387', 2),
(73, '', 1, '5753-20151211114447.jpg', '', '大峡谷', NULL, 1, '1449805487', 2),
(74, '', 1, '9443-20151229150441.jpg', '', NULL, NULL, 1, '1451372681', 0),
(75, '', 0, '142-20151229150441.jpg', '', NULL, NULL, 1, '1451372681', 0),
(76, '', 0, '9133-20151229150447.jpg', '', NULL, NULL, 1, '1451372687', 0),
(77, '', 1, '9056-20151229150447.jpg', '', NULL, NULL, 1, '1451372687', 0),
(78, '', 0, '1212-20151229150448.jpg', '', NULL, NULL, 1, '1451372688', 0),
(79, '', 0, '9092-20151229150448.jpg', '', NULL, NULL, 1, '1451372688', 0),
(80, '', 1, '5631-20151229150448.jpg', '', NULL, NULL, 1, '1451372688', 1);

-- --------------------------------------------------------

--
-- 表的结构 `mw_photocomment`
--

CREATE TABLE IF NOT EXISTS `mw_photocomment` (
  `id` int(11) NOT NULL COMMENT '照片评论自增id',
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '评论用户邮箱',
  `content` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '评论内容',
  `userid` int(11) unsigned DEFAULT NULL COMMENT '评论ID',
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '评论用户名称',
  `picid` int(11) unsigned DEFAULT NULL COMMENT '照片ID',
  `status` tinyint(1) NOT NULL COMMENT '审核状态',
  `createtime` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '评论时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='照片评论表';

-- --------------------------------------------------------

--
-- 表的结构 `mw_user`
--

CREATE TABLE IF NOT EXISTS `mw_user` (
  `userid` int(11) unsigned NOT NULL COMMENT '用户自增ID',
  `name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '用户名',
  `password` char(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '用户密码',
  `createtime` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '创建时间'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='用户表';

--
-- 转存表中的数据 `mw_user`
--

INSERT INTO `mw_user` (`userid`, `name`, `password`, `createtime`) VALUES
(16, 'aa', 'e10adc3949ba59abbe56e057f20f883e', '1446622109'),
(18, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1446688416'),
(19, 'zhangqiong', 'e10adc3949ba59abbe56e057f20f883e', '1447912117'),
(20, '以晴', 'e10adc3949ba59abbe56e057f20f883e', '1447983199'),
(21, 'zhangqiong2', 'e10adc3949ba59abbe56e057f20f883e', '1447988938'),
(22, 'dml', 'e10adc3949ba59abbe56e057f20f883e', '1449630450');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mw_album`
--
ALTER TABLE `mw_album`
  ADD PRIMARY KEY (`albumid`);

--
-- Indexes for table `mw_albumcate`
--
ALTER TABLE `mw_albumcate`
  ADD PRIMARY KEY (`cateid`);

--
-- Indexes for table `mw_blog`
--
ALTER TABLE `mw_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mw_config`
--
ALTER TABLE `mw_config`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `mw_likeip`
--
ALTER TABLE `mw_likeip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mw_photo`
--
ALTER TABLE `mw_photo`
  ADD PRIMARY KEY (`picid`);

--
-- Indexes for table `mw_photocomment`
--
ALTER TABLE `mw_photocomment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mw_user`
--
ALTER TABLE `mw_user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mw_album`
--
ALTER TABLE `mw_album`
  MODIFY `albumid` int(11) NOT NULL AUTO_INCREMENT COMMENT '相册自增id',AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `mw_albumcate`
--
ALTER TABLE `mw_albumcate`
  MODIFY `cateid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '相册类型自增ID',AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `mw_blog`
--
ALTER TABLE `mw_blog`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `mw_likeip`
--
ALTER TABLE `mw_likeip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `mw_photo`
--
ALTER TABLE `mw_photo`
  MODIFY `picid` int(11) NOT NULL AUTO_INCREMENT COMMENT '照片自增id',AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `mw_photocomment`
--
ALTER TABLE `mw_photocomment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '照片评论自增id';
--
-- AUTO_INCREMENT for table `mw_user`
--
ALTER TABLE `mw_user`
  MODIFY `userid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户自增ID',AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
