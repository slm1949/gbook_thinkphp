-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 12 月 31 日 22:07
-- 服务器版本: 5.5.28
-- PHP 版本: 5.4.6-1ubuntu1.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `gbook`
--

-- --------------------------------------------------------

--
-- 表的结构 `thinkphp_gbook`
--

CREATE TABLE IF NOT EXISTS `thinkphp_gbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(10) NOT NULL,
  `title` varchar(12) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `content` text NOT NULL,
  `re_id` int(11) DEFAULT NULL,
  `re_num` int(11) DEFAULT NULL,
  `re_time` datetime DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- 转存表中的数据 `thinkphp_gbook`
--

INSERT INTO `thinkphp_gbook` (`id`, `user`, `title`, `email`, `content`, `re_id`, `re_num`, `re_time`, `ip`) VALUES
(2, '宋利明', '第二天留言', NULL, '写一条留言用于测试', 0, 0, '2012-12-06 00:00:00', '192.168.1.100'),
(3, '周周', 'it''s me', NULL, 'hhh', NULL, NULL, '2012-12-24 22:36:52', '127.0.0.1'),
(4, 'songliming', '大家好', NULL, '7895', NULL, NULL, '2012-12-24 22:37:14', '127.0.0.1'),
(5, '鹏', '哈哈哈', NULL, 'gg', NULL, NULL, '2012-12-24 22:37:41', '127.0.0.1'),
(6, '我', '就是我', NULL, '还是我', NULL, NULL, '2012-12-24 22:38:11', '127.0.0.1'),
(7, '周周', '我也来试试', NULL, '你觉得呢？', NULL, NULL, '2012-12-24 22:38:49', '127.0.0.1'),
(8, '鹏', '主任', NULL, 'shibu', NULL, NULL, '2012-12-24 22:39:17', '127.0.0.1'),
(9, '鹏', '大家好', NULL, 'shijian', NULL, NULL, '2012-12-22 23:41:21', '127.0.0.1'),
(11, '鹏', '大家好', NULL, '新的添加，有的时间和IP', NULL, NULL, '2012-12-22 23:47:41', '127.0.0.1'),
(12, 'android', '手机用户', NULL, '我啊，明', NULL, NULL, '2012-12-22 23:50:31', '192.168.1.101'),
(14, '我', '我也来试试', NULL, '23', NULL, NULL, '2012-12-22 23:52:35', '127.0.0.1'),
(15, '周周', '我也来试试', NULL, '2235664', NULL, NULL, '2012-12-24 21:08:18', '127.0.0.1'),
(16, '我', '我也来试试', NULL, '我有意见', NULL, NULL, '2012-12-25 22:59:59', '127.0.0.1'),
(18, '周小勤', '哈哈哈', NULL, '你是》', NULL, NULL, '2012-12-25 23:13:41', '127.0.0.1'),
(25, '周小勤', '我也来试试', 'slm1949@163.com', 'haha', NULL, NULL, '2012-12-26 22:43:51', '127.0.0.1'),
(27, '周小勤', '大家好', 'slm1949@163.com', '琴妹妹', NULL, NULL, '2012-12-26 22:46:13', '127.0.0.1');

-- --------------------------------------------------------

--
-- 表的结构 `thinkphp_user`
--

CREATE TABLE IF NOT EXISTS `thinkphp_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `beizhu_1` varchar(20) DEFAULT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `thinkphp_user`
--

INSERT INTO `thinkphp_user` (`id`, `name`, `password`, `beizhu_1`) VALUES
(1, 'slm1949', '6515', '宋利明');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
